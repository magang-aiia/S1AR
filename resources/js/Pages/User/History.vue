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
            isAtasan: Boolean,
        },
        data() {
            return {
                nav: [],
                sortBy: "tanggal",
                sortDesc: true,
                search: "",
                showType: "all",
                filteredShowType: ["all", "izin", "cuti", "data diri"],
                slice: 5,
                page: 1,
                isMounted: false,
                data: [
                    {
                        kode: "CUTI-2021-0001",
                        tanggal: "2021-01-01",
                        nama: "Budi Suherman",
                        npk: "00789",
                        type: "Cuti",
                        typeOther: "Cuti tahunan",
                        status1: "Menunggu",
                        status2: "Disetujui",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0002",
                        tanggal: "2021-01-02",
                        nama: "Andi Sulaeman",
                        npk: "00788",
                        type: "Cuti",
                        typeOther: "Cuti Istimewa",
                        status1: "Disetujui",
                        status2: "Disetujui",
                        status3: "Ditolak",
                    },
                    {
                        kode: "CUTI-2021-0003",
                        tanggal: "2021-01-03",
                        nama: "Cahyo Widya Kusuma",
                        npk: "00785",
                        type: "Cuti",
                        typeOther: "Cuti tahunan",
                        status1: "Disetujui",
                        status2: "Menunggu",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0004",
                        tanggal: "2021-01-04",
                        nama: "Erlaangga Setiabudi",
                        npk: "00783",
                        type: "Cuti",
                        typeOther: "Cuti Istimewa",
                        status1: "Ditolak",
                        status2: "Disetujui",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0005",
                        tanggal: "2021-01-05",
                        nama: "Santoso Ali",
                        npk: "00787",
                        type: "Izin",
                        typeOther: "Sakit",
                        status1: "Disetujui",
                        status2: "Menunggu",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0006",
                        tanggal: "2021-01-06",
                        nama: "Budi Suherman",
                        npk: "00789",
                        type: "Data diri",
                        typeOther: "Data diri",
                        status1: "Menunggu",
                        status2: "Disetujui",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0007",
                        tanggal: "2021-01-07",
                        nama: "Angga Wijaya",
                        npk: "00785",
                        type: "Data diri",
                        typeOther: "Data diri",
                        status1: "Ditolak",
                        status2: "Ditolak",
                        status3: "Ditolak",
                    },
                    {
                        kode: "CUTI-2021-0008",
                        tanggal: "2021-01-08",
                        nama: "Umam Ardi Pratama",
                        npk: "00786",
                        type: "Izin",
                        typeOther: "Dinas Luar",
                        status1: "Disetujui",
                        status2: "Ditolak",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0009",
                        tanggal: "2021-01-09",
                        nama: "Budi Suherman",
                        npk: "00789",
                        type: "Izin",
                        typeOther: "Sakit",
                        status1: "Disetujui",
                        status2: "Disetujui",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0010",
                        tanggal: "2021-01-10",
                        nama: "Arya Saputra",
                        npk: "00790",
                        type: "Izin",
                        typeOther: "Sakit",
                        status1: "Ditolak",
                        status2: "Disetujui",
                        status3: "Disetujui",
                    },
                ],
            }
        },
        mounted() {
            this.isMounted = true
            this.nav = getNav("history", undefined, this.isAtasan)
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
        },
        computed: {
            filterData() {
                return this.data.filter((item) => {
                    if (this.showType === "all") {
                        return true
                    } else {
                        return item.type.toLowerCase() === this.showType
                    }
                })
            },
            transformData() {
                return this.filterData.map((data) => {
                    data.tanggalSemantic = moment(data.tanggal).format("DD MMMM YYYY")
                    return data
                })
            },
            searchData() {
                return this.transformData.filter((data) => {
                    if (this.isMounted)
                        return Object.keys(data).some((key) => {
                            return String(data[key]).toLowerCase().includes(this.search.toLowerCase())
                        })
                    else return data
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
            showType() {
                this.page = 1
            },
            slice() {
                if (this.page > this.totalPage) this.page = this.totalPage
            },
        },
    }
</script>

<template>
    <HeadInertia title="History" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content">History</div>
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
            <div class="col-span-6 !col-end-7 flex items-end lg:col-span-2">
                <input
                    type="text"
                    name="search"
                    id="search"
                    placeholder="Cari"
                    v-model="search"
                    class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                />
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
                        <th class="cursor-pointer select-none" @click="sorted('status1')">
                            <div class="flex items-center">
                                status approval 1
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'status1'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'status1'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('status2')">
                            <div class="flex items-center">
                                status approval 2
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'status2'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'status2'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('status3')">
                            <div class="flex items-center">
                                status HR
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'status3'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'status3'"
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
                        <td>{{ item.type }}</td>
                        <td
                            class="font-bold"
                            :class="{
                                'text-success': item.status1 === 'Disetujui',
                                'text-error': item.status1 === 'Ditolak',
                                'text-warning': item.status1 === 'Menunggu',
                            }"
                        >
                            {{ item.status1 }}
                        </td>
                        <td
                            class="font-bold"
                            :class="{
                                'text-success': item.status2 === 'Disetujui',
                                'text-error': item.status2 === 'Ditolak',
                                'text-warning': item.status2 === 'Menunggu',
                            }"
                        >
                            {{ item.status2 }}
                        </td>
                        <td
                            class="font-bold"
                            :class="{
                                'text-success': item.status3 === 'Disetujui',
                                'text-error': item.status3 === 'Ditolak',
                                'text-warning': item.status3 === 'Menunggu',
                            }"
                        >
                            {{ item.status3 }}
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
    <ModalCuzia />
</template>
