<script>
    import MainLayout from "@/Layouts/Main.vue"
    import ModalCuzia from "@/Components/ModalCuzia.vue"
    import { Head as HeadInertia } from "@inertiajs/inertia-vue3"
    import getNav from "@/Pages/User/NavUser.js"
    import moment from "moment"

    export default {
        components: {
            MainLayout,
            HeadInertia,
            ModalCuzia,
        },
        props: {
            pengajuanDatadiri: Object,
            kontrak: {
                type: Object,
                default: () => ({}),
            },
            jabatan: {
                type: Object,
                default: () => ({}),
            },
        },
        data() {
            return {
                nav: getNav("approval", undefined, true),
                sortBy: "tanggal",
                sortDesc: true,
                search: "",
                showType: "all",
                filteredShowType: ["all", "izin", "cuti", "data diri"],
                slice: 5,
                page: 1,
                isMounted: false,
                selectedData: {},
                data: [],
            }
        },
        mounted() {
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
            selectData(kode) {
                this.selectedData = this.dataSorted.filter((item) => item.kode === kode)[0]
            },
        },
        computed: {
            transformData() {
                const id = this.$page.props.auth.user.id
                return this.data.map((data) => {
                    data.tanggal = new Date(data.created_at)
                    data.tanggalSemantic = moment(data.tanggal).format("DD MMMM YYYY")
                    data.nama_pengaju = data.user.name
                    data.type = "data diri"
                    data.status =
                        data.approval1_id === id
                            ? data.approval1_status
                            : data.approval2_id === id
                            ? data.approval2_status
                            : null
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
            },
            pengajuanDatadiri: {
                deep: true,
                handler(val, oldVal) {
                    this.data = this.pengajuanDatadiri
                },
            },
        },
    }
</script>

<template>
    <HeadInertia title="Approval" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content">Approval</div>
        <div class="mb-4 grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-2 lg:col-auto">
                <label class="mr-3 block">Tampilan baris : </label>
                <input type="number" v-model="slice" class="w-full flex-1 rounded-lg bg-base-100" />
            </div>
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-4 lg:col-span-2">
                <label class="mr-3 block">Tampilkan : </label>
                <div class="btn-group">
                    <div
                        class="btn h-[42px]"
                        :class="{ 'btn-active': showType === item }"
                        @click="showType = item"
                        v-for="item in filteredShowType"
                        :key="item"
                    >
                        {{ item }}
                    </div>
                </div>
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
                        <th class="cursor-pointer select-none" @click="sorted('nama_pengaju')">
                            <div class="flex items-center">
                                nama pengaju
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'nama_pengaju'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'nama_pengaju'"
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
                        <th class="cursor-pointer select-none" @click="sorted('status')">
                            <div class="flex items-center">
                                status
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'status'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'status'"
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
                        <td>{{ item.nama_pengaju }}</td>
                        <td>{{ item.type }}</td>
                        <td
                            class="font-bold"
                            :class="{
                                'text-success': item.status === 'approved',
                                'text-error': item.status === 'rejected',
                                'text-warning': item.status === 'pending',
                            }"
                        >
                            {{ item.status }}
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
                    v-for="(i, index) in paginateIndex"
                    :key="i"
                    @click="i === '...' ? (index === 1 ? page-- : page++) : (page = i)"
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
    <ModalCuzia :isApprovable="true" :datadiri="selectedData" :kontrak="kontrak" :jabatan="jabatan" />
</template>
