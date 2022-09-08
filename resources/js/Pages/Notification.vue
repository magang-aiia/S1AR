<script>
    import MainLayout from "@/Layouts/Main.vue"
    import { Head as HeadInertia, Link as LinkInertia } from "@inertiajs/inertia-vue3"
    import getNavUser from "@/Pages/User/NavUser.js"
    import getNavAdmin from "@/Pages/Admin/NavAdmin.js"
    import moment from "moment"

    export default {
        components: {
            MainLayout,
            HeadInertia,
            LinkInertia,
        },
        data() {
            return {
                navadmin: getNavAdmin(),
                navuser: getNavUser(),
                sortBy: "tanggal",
                sortDesc: true,
                search: "",
                slice: 5,
                page: 1,
                isMounted: false,
                data: [
                    {
                        kode: "CUTI-2021-0001",
                        tanggal: "2022-08-01",
                        nama: "Budi Suherman",
                        avatar: "avatar.jpg",
                        npk: "00789",
                        type: "Cuti",
                        typeOther: "Cuti tahunan",
                        status1: "Menunggu",
                        status2: "Disetujui",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0002",
                        tanggal: "2022-08-02",
                        nama: "Andi Sulaeman",
                        avatar: "avatar1.png",
                        npk: "00788",
                        type: "Cuti",
                        typeOther: "Cuti Istimewa",
                        status1: "Disetujui",
                        status2: "Disetujui",
                        status3: "Ditolak",
                    },
                    {
                        kode: "CUTI-2021-0003",
                        tanggal: "2022-08-03",
                        nama: "Cahyo Widya Kusuma",
                        avatar: "avatar2.png",
                        npk: "00785",
                        type: "Cuti",
                        typeOther: "Cuti tahunan",
                        status1: "Disetujui",
                        status2: "Menunggu",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0004",
                        tanggal: "2022-08-04",
                        nama: "Erlaangga Setiabudi",
                        avatar: "avatar5.png",
                        npk: "00783",
                        type: "Cuti",
                        typeOther: "Cuti Istimewa",
                        status1: "Ditolak",
                        status2: "Disetujui",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0005",
                        tanggal: "2022-08-05",
                        nama: "Santoso Ali",
                        avatar: "avatar6.png",
                        npk: "00787",
                        type: "Izin",
                        typeOther: "Sakit",
                        status1: "Disetujui",
                        status2: "Menunggu",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0006",
                        tanggal: "2022-08-06",
                        nama: "Budi Suherman",
                        avatar: "avatar3.jpg",
                        npk: "00789",
                        type: "Data diri",
                        typeOther: "Data diri",
                        status1: "Menunggu",
                        status2: "Disetujui",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0007",
                        tanggal: "2022-08-07",
                        nama: "Angga Wijaya",
                        avatar: "avatar2.png",
                        npk: "00785",
                        type: "Data diri",
                        typeOther: "Data diri",
                        status1: "Ditolak",
                        status2: "Ditolak",
                        status3: "Ditolak",
                    },
                    {
                        kode: "CUTI-2021-0008",
                        tanggal: "2022-08-08",
                        nama: "Umam Ardi Pratama",
                        avatar: "avatar3.jpg",
                        npk: "00786",
                        type: "Izin",
                        typeOther: "Dinas Luar",
                        status1: "Disetujui",
                        status2: "Ditolak",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0009",
                        tanggal: "2022-08-09",
                        nama: "Budi Suherman",
                        avatar: "avatar6.png",
                        npk: "00789",
                        type: "Izin",
                        typeOther: "Sakit",
                        status1: "Disetujui",
                        status2: "Disetujui",
                        status3: "Menunggu",
                    },
                    {
                        kode: "CUTI-2021-0010",
                        tanggal: "2022-08-10",
                        nama: "Arya Saputra",
                        avatar: "avatar1.png",
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
        setup() {
            moment.locale("id")
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
            message(status, type) {
                if (status === "Menunggu") {
                    return "Menunggu permohonan " + type.toLowerCase() + " anda."
                } else if (status === "Disetujui") {
                    return "Menyetujui permohonan " + type.toLowerCase() + " anda."
                } else if (status === "Ditolak") {
                    return "Menolak permohonan " + type.toLowerCase() + " anda."
                }
            },
        },
        computed: {
            transformData() {
                return this.data.map((data) => {
                    data.tanggalSemantic = moment(data.tanggal).fromNow()
                    data.message = this.message(data.status1, data.type)
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
            slice() {
                if (this.page > this.totalPage) this.page = this.totalPage
            },
        },
    }
</script>

<template>
    <HeadInertia title="Notification" />

    <MainLayout :nav="$page.props.auth.user.name === 'Admin' ? navadmin : navuser">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content">Notifikasi</div>
        <div class="mb-4 grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-2 lg:col-auto">
                <label class="mr-3 block">Tampilan per : </label>
                <input type="number" v-model="slice" class="w-full flex-1 rounded-lg bg-base-100" />
            </div>
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-2">
                <label class="mr-3 block">Urutkan berdasar : </label>
                <select class="w-full flex-1 rounded-lg bg-base-100" v-model="sortDesc">
                    <option :value="true">Terbaru</option>
                    <option :value="false">Terlama</option>
                </select>
            </div>

            <div class="col-span-6 !col-end-7 flex items-end lg:col-span-2">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari"
                    v-model="search"
                    class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                />
            </div>
        </div>
        <div class="mb-4 grid grid-cols-1 gap-y-4">
            <div
                class="flex flex-wrap items-center overflow-hidden rounded-lg shadow-md"
                v-for="item in dataByPage"
                :key="item.index"
            >
                <div class="mr-4 h-16 w-16 md:h-20 md:w-20">
                    <img :src="'/img/' + item.avatar" alt="avatar" class="h-full w-full object-cover" />
                </div>
                <div class="flex flex-1 flex-col justify-start">
                    <div class="md:text-lg -sm:text-sm">
                        <div class="inline font-bold">{{ item.nama }}</div>
                        {{ item.message }}
                        (<LinkInertia
                            href=""
                            class="text-sm text-indigo-600 hover:text-indigo-800 dark:text-indigo-200 dark:hover:text-indigo-400"
                            >{{ item.kode }}</LinkInertia
                        >)
                    </div>
                    <div class="text-xs text-base-content/50 md:text-sm">{{ item.tanggalSemantic }}</div>
                </div>
                <div
                    v-if="item.status1 == 'Disetujui'"
                    class="mx-4 flex h-12 w-12 items-center justify-center rounded-full bg-success md:h-14 md:w-14"
                >
                    <box-icon
                        name="check-circle"
                        class="scale-125 fill-current dark:fill-base-300 md:scale-150"
                    ></box-icon>
                </div>
                <div
                    v-else-if="item.status1 == 'Menunggu'"
                    class="mx-4 flex h-12 w-12 items-center justify-center rounded-full bg-warning md:h-14 md:w-14"
                >
                    <box-icon name="time" class="scale-125 fill-current dark:fill-base-300 md:scale-150"></box-icon>
                </div>
                <div
                    v-else-if="item.status1 == 'Ditolak'"
                    class="mx-4 flex h-12 w-12 items-center justify-center rounded-full bg-error md:h-14 md:w-14"
                >
                    <box-icon name="x-circle" class="scale-125 fill-current dark:fill-base-300 md:scale-150"></box-icon>
                </div>
            </div>
            <div v-if="dataByPage.length < 1" class="w-full py-4 text-center font-bold">Tidak Ada Notifikasi</div>
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
</template>
