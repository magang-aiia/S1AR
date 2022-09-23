<script>
    import MainLayout from "@/Layouts/Main.vue"
    import { Head as HeadInertia } from "@inertiajs/inertia-vue3"
    import getNav from "@/Pages/User/NavUser.js"
    import moment from "moment"

    const route = window.route

    export default {
        components: {
            MainLayout,
            HeadInertia,
        },
        props: {
            isAtasan: Boolean,
            absensi: {
                type: Object,
                default: () => {},
            },
            date: {
                type: String,
                default: () => {},
            },
            shift: {
                type: Object,
                default: () => {},
            },
            status: {
                type: Object,
                default: () => {},
            },
            range_tanggal: {
                type: Object,
                default: () => {},
            },
        },
        data() {
            return {
                nav: [],
                data: [],
                selectedDate: null,
                isMounted: false,
                sortBy: "tanggal",
                sortDesc: true,
                search: "",
                slice: 30,
                page: 1,
                modalFilter: false,
                filter: {
                    shift: "",
                    status: "",
                },
                rangeMonth: null,
            }
        },
        mounted() {
            moment.locale("id")
            this.isMounted = true
            this.nav = getNav("absensi", undefined, this.isAtasan)
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
                this.$inertia.visit(route("absensi"), {
                    method: "get",
                    data: { date: this.selectedDate },
                    preserveState: true,
                    preserveScroll: true,
                })
            },
        },
        computed: {
            monthYearRangeList() {
                const list = []
                if (this.rangeMonth !== null) {
                    const range = {
                        start: moment(this.rangeMonth.min),
                        end: moment(this.rangeMonth.max),
                    }
                    list.push({
                        value: range.start.format("YYYY-MM"),
                        text: range.start.format("MMMM YYYY"),
                    })
                    while (range.start <= range.end) {
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
                return this.data.map((item) => {
                    item.tanggalSemantic = moment(item.tanggal).format("DD MMMM YYYY")
                    item.nama = item.user.name
                    item.npk = item.user.npk
                    item.shiftType = item.shift.nama
                    item.jamMasuk = moment(item.jam_masuk, "HH:mm:ss").format("HH:mm")
                    item.jamPulang = moment(item.jam_pulang, "HH:mm:ss").format("HH:mm")
                    return item
                })
            },
            searchData() {
                return this.transformData.filter((item) => {
                    if (this.isMounted) {
                        return (
                            item.shiftType.toLowerCase().indexOf(this.filter.shift.toLowerCase()) === 0 &&
                            item.status.toLowerCase().indexOf(this.filter.status.toLowerCase()) === 0
                        )
                    } else {
                        return true
                    }
                })
            },
            dataSorted() {
                const data = this.searchData.slice()
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
            slice() {
                if (this.page > this.totalPage) this.page = this.totalPage
            },
            isMounted() {
                this.data = this.absensi
                this.rangeMonth = this.range_tanggal
                this.selectedDate = moment(this.date, "YYYY-MM-DD").format("YYYY-MM")
            },
            absensi: {
                deep: true,
                handler(val, oldVal) {
                    this.data = this.absensi
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
    <HeadInertia title="Absensi" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content" @click="log(selectedDate)">
            absensi
        </div>
        <div class="mb-4 grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-3">
                <label for="modal-filter" class="btn btn-info mr-2">filter</label>
            </div>
            <div class="col-span-6 flex items-center sm:col-span-3 lg:col-span-2 lg:col-end-7">
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
                        <th class="sticky left-6 cursor-pointer select-none" @click="sorted('shiftType')">
                            <div class="flex items-center">
                                Shift
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'shiftType'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'shiftType'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('jamMasuk')">
                            <div class="flex items-center">
                                Jam masuk
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'jamMasuk'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'jamMasuk'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('jamPulang')">
                            <div class="flex items-center">
                                Jam pulang
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'jamPulang'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'jamPulang'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('tanggal')">
                            <div class="flex items-center">
                                Tanggal
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
                        <th class="cursor-pointer select-none" @click="sorted('status')">
                            <div class="flex items-center">
                                Status
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
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="absen in dataByPage" :key="absen.index">
                        <th>{{ absen.index }}</th>
                        <td>{{ absen.shiftType }}</td>
                        <td>{{ absen.jamMasuk }}</td>
                        <td>{{ absen.jamPulang }}</td>
                        <td>{{ absen.tanggalSemantic }}</td>
                        <td>{{ absen.status }}</td>
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

    <input type="checkbox" id="modal-filter" class="modal-toggle" v-model="modalFilter" />
    <label for="modal-filter" class="modal modal-bottom cursor-pointer transition-all ease-in-out sm:modal-middle">
        <Transition name="bounce">
            <label for="" v-if="modalFilter" class="modal-box relative">
                <div class="text-center text-2xl font-bold">Filter tabel</div>
                <div class="grid grid-cols-1 gap-y-4">
                    <div class="col-span-1">
                        <label>Tampilan baris : </label>
                        <input type="number" v-model="slice" class="input-text" />
                    </div>
                    <div class="col-span-1">
                        <label for="name" class="mb-2 block">Shift : </label>
                        <select class="input-text" v-model="filter.shift">
                            <option value="">All</option>
                            <option :value="item" v-for="item in shift" :key="item">{{ item }}</option>
                        </select>
                    </div>
                    <div class="col-span-1">
                        <label for="name" class="mb-2 block">Status : </label>
                        <select class="input-text" v-model="filter.status">
                            <option value="">All</option>
                            <option :value="item" v-for="item in status" :key="item">{{ item }}</option>
                        </select>
                    </div>
                </div>
            </label>
        </Transition>
    </label>
</template>
