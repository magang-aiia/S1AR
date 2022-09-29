<script>
    import MainLayout from "@/Layouts/Main.vue"
    import ModalCuzia from "@/Components/ModalCuzia.vue"
    import { Head as HeadInertia } from "@inertiajs/inertia-vue3"
    import getNav from "@/Pages/Admin/NavAdmin.js"
    import moment from "moment"

    const route = window.route

    export default {
        components: {
            MainLayout,
            HeadInertia,
            ModalCuzia,
        },
        props: {
            pengajuanDatadiri: Object,
            date: String,
            range_tanggal: Object,
            kontrak: Object,
            jabatan: Object,
        },
        data() {
            return {
                nav: getNav("cuzia"),
                selectedDate: null,
                selectedData: {},
                rangeMonth: null,
                sortBy: "tanggal",
                sortDesc: true,
                search: "",
                showType: "all",
                filteredShowType: ["all", "izin", "cuti", "data diri"],
                slice: 5,
                page: 1,
                isMounted: false,
                data: [],
            }
        },
        mounted() {
            moment.locale("id")
            this.isMounted = true
        },
        unmounted() {
            this.isMounted = false
        },
        methods: {
            sorted(by) {
                if (this.sortBy === by) {
                    this.sortDesc = !this.sortDesc
                } else {
                    this.sortBy = by
                }
            },
            log(data) {
                console.log(data)
            },
            handleChangeMonth() {
                this.$inertia.visit(route("admin.cuzia"), {
                    method: "get",
                    data: { date: this.selectedDate },
                    preserveState: true,
                    preserveScroll: true,
                })
            },
            selectData(kode) {
                this.selectedData = this.dataSorted.filter((item) => item.kode === kode)[0]
            },
        },
        computed: {
            monthYearRangeList() {
                const list = []
                if (this.rangeMonth !== null) {
                    const range = {
                        start: moment(this.rangeMonth.min).startOf("month"),
                        end: moment(this.rangeMonth.max).startOf("month"),
                    }
                    list.push({
                        value: range.start.format("YYYY-MM"),
                        text: range.start.format("MMMM YYYY"),
                    })
                    while (range.start < range.end) {
                        const x = range.start.add(1, "month")
                        list.push({
                            value: x.format("YYYY-MM"),
                            text: x.format("MMMM YYYY"),
                        })
                    }
                }
                return list
            },
            transformData() {
                return this.data.map((data) => {
                    data.tanggal = new Date(data.created_at)
                    data.tanggalSemantic = moment(data.tanggal).format("DD MMMM YYYY")
                    data.nama = data.user.name
                    data.type = "data diri"
                    return data
                })
            },
            filterData() {
                return this.transformData.filter((item) => {
                    if (this.showType === "all") {
                        return true
                    } else {
                        return item.type.toLowerCase() === this.showType
                    }
                })
            },
            dataSorted() {
                const data = this.filterData.slice()
                return data
                    .sort((a, b) => {
                        if (this.sortDesc) {
                            return a[this.sortBy] < b[this.sortBy] ? 1 : -1
                        } else {
                            return a[this.sortBy] > b[this.sortBy] ? 1 : -1
                        }
                    })
                    .map((data, index) => {
                        data.index = index + 1
                        return data
                    })
            },
            totalPage() {
                return Math.ceil(this.dataSorted.length / this.slice)
            },
            dataByPage() {
                return this.dataSorted.slice((this.page - 1) * this.slice, this.page * this.slice)
            },
            paginateIndex() {
                const index = []
                if (this.totalPage < 7)
                    for (let i = 1; i <= this.totalPage; i++) {
                        index.push(i)
                    }
                else {
                    if (this.page < 5) {
                        for (let i = 1; i <= 5; i++) {
                            index.push(i)
                        }
                        index.push("...")
                        index.push(this.totalPage)
                    } else if (this.page > this.totalPage - 4) {
                        index.push(1)
                        index.push("...")
                        for (let i = this.totalPage - 4; i <= this.totalPage; i++) {
                            index.push(i)
                        }
                    } else {
                        index.push(1)
                        index.push("...")
                        for (let i = this.page - 1; i <= this.page + 1; i++) {
                            index.push(i)
                        }
                        index.push("...")
                        index.push(this.totalPage)
                    }
                }
                return index
            },
        },
        watch: {
            search() {
                this.page = 1
            },
            showType() {
                this.page = 1
            },
            slice() {
                if (this.page > this.totalPage) this.page = this.totalPage
            },
            isMounted() {
                this.data = this.pengajuanDatadiri
                this.rangeMonth = this.range_tanggal
                this.selectedDate = moment(this.date, "YYYY-MM-DD").format("YYYY-MM")
            },
            pengajuanDatadiri: {
                deep: true,
                handler(val, oldVal) {
                    this.data = this.pengajuanDatadiri
                },
            },
            range_tanggal: {
                deep: true,
                handler(val, oldVal) {
                    this.rangeMonth = this.range_tanggal
                },
            },
            date: {
                deep: true,
                handler(val, oldVal) {
                    this.selectedDate = moment(this.date, "YYYY-MM-DD").format("YYYY-MM")
                },
            },
        },
    }
</script>

<template>
    <HeadInertia title="Cuzia" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content" @click="log(monthYearRangeList)">
            Cuzia
        </div>
        <div class="mb-4 grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-2 lg:col-auto">
                <div class="btn btn-primary mr-3">
                    <box-icon name="book-content" class="mr-2 fill-current"></box-icon>Report
                </div>
                <input type="number" v-model="slice" class="w-full flex-1 rounded-lg bg-base-100" />
            </div>
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-4 lg:col-span-2">
                <label class="mr-3 block">Tampilkan : </label>
                <div class="btn-group flex-auto">
                    <div
                        class="btn flex-auto"
                        :class="{ 'btn-active': showType === item }"
                        @click="showType = item"
                        v-for="item in filteredShowType"
                        :key="item"
                    >
                        {{ item }}
                    </div>
                </div>
            </div>
            <div class="col-span-6 !col-end-7 flex items-center lg:col-span-2">
                <label class="mr-3 block">Bulan : </label>
                <select v-model="selectedDate" class="input-text flex-1" @change="handleChangeMonth()">
                    <option v-for="(month, index) in monthYearRangeList" :key="index" :value="month.value">
                        {{ month.text }}
                    </option>
                </select>
            </div>
        </div>

        <div class="mb-4 overflow-x-auto">
            <table class="table-compact table w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th class="cursor-pointer select-none" @click="sorted('tanggal')">
                            <div class="flex items-center">
                                tanggal
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'tanggal'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'tanggal'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('kode')">
                            <div class="flex items-center">
                                kode pengajuan
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'kode'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'kode'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('npk')">
                            <div class="flex items-center">
                                npk
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'npk'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'npk'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('nama')">
                            <div class="flex items-center">
                                nama pengajuan
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'nama'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'nama'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('type')">
                            <div class="flex items-center">
                                type
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'type'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'type'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('approval1_status')">
                            <div class="flex items-center">
                                status approval 1
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'approval1_status'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'approval1_status'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('approval2_status')">
                            <div class="flex items-center">
                                status approval 2
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'approval2_status'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'approval2_status'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('hr_confirm')">
                            <div class="flex items-center">
                                status HR
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'hr_confirm'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'hr_confirm'"
                                ></box-icon>
                            </div>
                        </th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in dataByPage" :key="item.index">
                        <th>{{ item.index }}</th>
                        <td>{{ item.tanggalSemantic }}</td>
                        <td>{{ item.kode }}</td>
                        <td>{{ item.npk }}</td>
                        <td>{{ item.nama }}</td>
                        <td>{{ item.type }}</td>
                        <td
                            class="font-bold"
                            :class="{
                                'text-warning': item.approval1_status === 'pending',
                                'text-error': item.approval1_status === 'rejected',
                                'text-success': item.approval1_status === 'approved',
                            }"
                        >
                            {{ item.approval1_status }}
                        </td>
                        <td
                            class="font-bold"
                            :class="{
                                'text-warning': item.approval2_status === 'pending',
                                'text-error': item.approval2_status === 'rejected',
                                'text-success': item.approval2_status === 'approved',
                            }"
                        >
                            {{ item.approval2_status }}
                        </td>
                        <td
                            class="font-bold"
                            :class="{
                                'text-warning': item.hr_confirm === 'pending',
                                'text-error': item.hr_confirm === 'rejected',
                                'text-success': item.hr_confirm === 'approved',
                            }"
                        >
                            {{ item.hr_confirm }}
                        </td>
                        <td>
                            <label
                                :for="
                                    item.type == 'Cuti'
                                        ? 'detail-cuti'
                                        : item.type == 'Izin'
                                        ? 'detail-izin'
                                        : 'detail-datadiri'
                                "
                                @click="selectData(item.kode)"
                                class="btn btn-primary btn-sm"
                                >detail</label
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-if="dataByPage.length < 1" class="w-full py-4 text-center font-bold">Tidak Ada Data</div>
        </div>

        <div class="flex justify-center" v-if="dataByPage.length > 0">
            <div class="btn-group">
                <button class="btn" :class="{ 'btn-disabled': page === 1 }" @click="page !== 1 ? page-- : ''">«</button>
                <button
                    class="btn"
                    :class="{ 'btn-active': i === page }"
                    v-for="i in paginateIndex"
                    :key="i"
                    @click="i === '...' ? (i > page ? page-- : page++) : (page = i)"
                >
                    {{ i }}
                </button>
                <button
                    class="btn"
                    :class="{ 'btn-disabled': page === totalPage }"
                    @click="page !== totalPage ? page++ : ''"
                >
                    »
                </button>
            </div>
        </div>
    </MainLayout>
    <ModalCuzia :datadiri="selectedData" :kontrak="kontrak" :jabatan="jabatan" :isAdmin="true" />
</template>
