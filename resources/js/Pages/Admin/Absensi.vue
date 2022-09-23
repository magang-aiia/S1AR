<script>
    import MainLayout from "@/Layouts/Main.vue"
    import { Head as HeadInertia } from "@inertiajs/inertia-vue3"
    import getNav from "@/Pages/Admin/NavAdmin.js"
    import moment from "moment"

    import FullCalendar from "@fullcalendar/vue3"
    import dayGridPlugin from "@fullcalendar/daygrid"
    import interactionPlugin from "@fullcalendar/interaction"

    const route = window.route

    export default {
        components: {
            MainLayout,
            HeadInertia,
            FullCalendar,
        },
        props: {
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
        },
        data() {
            return {
                nav: getNav("absensi"),
                calendarOptions: {
                    plugins: [dayGridPlugin, interactionPlugin],
                    initialView: "dayGridMonth",
                    selectable: true,
                    select: this.handleDateSelect,
                    locale: "id",
                },
                data: [],
                file: {
                    excel: null,
                    replace: false,
                },
                export_excel: {
                    tglfrom: "",
                    tglto: "",
                },
                errors: {},
                selectedDate: "",
                isLoading: false,
                loadingBy: null,
                isMounted: false,
                sortBy: "npk",
                sortDesc: false,
                search: "",
                slice: 10,
                page: 1,
                modalFilter: false,
                modalUpload: false,
                modalExport: false,
                filter: {
                    nama: "",
                    npkfrom: "",
                    npkto: "",
                    shift: "",
                    status: "",
                },
            }
        },
        mounted() {
            this.isMounted = true
            moment.locale("id")
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
            filterNumber(number, from, to) {
                if (from && to) {
                    return number >= from && number <= to
                } else if (from) {
                    return number >= from
                } else if (to) {
                    return number <= to
                } else {
                    return true
                }
            },
            filterDate(date, from, to) {
                if (from && to) {
                    return moment(date).isBetween(from, to)
                } else if (from) {
                    return moment(date).isSameOrAfter(from)
                } else if (to) {
                    return moment(date).isSameOrBefore(to)
                } else {
                    return true
                }
            },
            handleDateSelect(selectInfo) {
                this.export_excel.tglfrom = selectInfo.startStr
                this.export_excel.tglto = moment(selectInfo.endStr).subtract(1, "days").format("YYYY-MM-DD")
            },
            handleExportExcel() {
                this.modalExport = false
                window.open(route("admin.absensi.export", this.export_excel), "_blank")
            },
            import_excel() {
                this.$inertia.post(route("admin.absensi.import"), this.file, {
                    preserveState: true,
                    preserveScroll: true,
                    forceFormData: true,
                    onStart: () => {
                        this.isLoading = true
                        this.loadingBy = "import"
                    },
                    onError: (error) => {
                        this.errors = error
                        this.isLoading = false
                        this.loadingBy = null
                    },
                    onSuccess: () => {
                        this.file.excel = null
                        this.file.replace = false
                        this.isLoading = false
                        this.loadingBy = null
                        this.modalUpload = false
                        this.errors = {}
                    },
                    onFinish: () => {
                        this.isLoading = false
                        this.loadingBy = null
                    },
                })
            },
        },
        computed: {
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
            filterData() {
                return this.transformData.filter((item) => {
                    if (this.isMounted) {
                        return (
                            item.nama.toLowerCase().includes(this.filter.nama.toLowerCase()) &&
                            this.filterNumber(item.npk, this.filter.npkfrom, this.filter.npkto) &&
                            item.shiftType.toLowerCase().indexOf(this.filter.shift.toLowerCase()) === 0 &&
                            item.status.toLowerCase().indexOf(this.filter.status.toLowerCase()) === 0
                        )
                    } else {
                        return true
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
            slice() {
                if (this.page > this.totalPage) this.page = this.totalPage
            },
            isMounted() {
                this.data = this.absensi
                this.selectedDate = this.date
            },
            absensi: {
                deep: true,
                handler(val, oldVal) {
                    this.data = this.absensi
                },
            },
            selectedDate: {
                deep: true,
                handler(val, oldVal) {
                    if (oldVal !== "")
                        this.$inertia.get(
                            route("admin.absensi"),
                            { date: this.selectedDate },
                            { preserveState: true, preserveScroll: true }
                        )
                },
            },
        },
    }
</script>

<template>
    <HeadInertia title="Absensi" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content" @click="log(shift)">absensi</div>
        <div class="mb-4 grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-3">
                <label for="modal-filter" class="btn btn-info mr-2">FIlter</label>
                <label for="modal-upload" class="btn btn-primary mr-2">Upload</label>
                <label for="modal-export" class="btn btn-primary">
                    <box-icon name="book-content" class="mr-2 fill-current"></box-icon>Export
                </label>
            </div>
            <div class="col-span-6 flex items-center sm:col-span-3 lg:col-span-2 lg:col-end-7">
                <label class="mr-3 block">Tanggal : </label>
                <input type="date" class="w-full flex-1 rounded-lg bg-base-100" v-model="selectedDate" />
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
                        <th class="sticky left-6 cursor-pointer select-none" @click="sorted('npk')">
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
                        <th class="sticky left-6 cursor-pointer select-none" @click="sorted('nama')">
                            <div class="flex items-center">
                                Nama
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
                        <td>{{ absen.npk }}</td>
                        <td>{{ absen.nama }}</td>
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
                        <label for="name" class="mb-2 block">Nama : </label>
                        <input type="text" placeholder="search nama" v-model="filter.nama" class="input-text" />
                    </div>
                    <div class="col-span-1">
                        <label for="name" class="mb-2 block">NPK : </label>
                        <div class="grid grid-cols-2 gap-x-4">
                            <input type="number" placeholder="dari" v-model="filter.npkfrom" class="input-text" />
                            <input type="number" placeholder="sampai" v-model="filter.npkto" class="input-text" />
                        </div>
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

    <input type="checkbox" id="modal-upload" class="modal-toggle" v-model="modalUpload" />
    <label for="modal-upload" class="modal modal-bottom cursor-pointer transition-all ease-in-out sm:modal-middle">
        <Transition name="bounce">
            <label for="" v-if="modalUpload" class="modal-box relative">
                <div class="text-center text-2xl font-bold">Upload Data Absen</div>
                <div class="grid grid-cols-1 gap-y-4">
                    <div class="col-span-1">
                        <label for="name" class="mb-2 block">Data Upload : </label>
                        <input
                            type="file"
                            @input="file.excel = $event.target.files[0]"
                            class="input-text h-11 border file:mr-4 file:h-full file:border-0 file:bg-blue-50 file:py-2 file:px-4 hover:file:bg-blue-100"
                        />
                        <div class="mt-2 text-sm text-error" v-if="errors.excel">{{ errors.excel }}</div>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start">
                            <input
                                type="checkbox"
                                v-model="file.replace"
                                class="checkbox checkbox-primary checkbox-sm mr-2"
                            />
                            <span class="label-text">Ganti seluruh data</span>
                        </label>
                    </div>
                    <div class="col-span-1 flex items-center justify-between md:flex-wrap-reverse">
                        <label for="modal-upload" class="max-w-48 btn w-[calc(50%_-_.75rem)]">Batal</label>
                        <button
                            @click="import_excel()"
                            class="max-w-48 btn btn-primary w-[calc(50%_-_.75rem)]"
                            :class="{ loading: isLoading && loadingBy == 'import' }"
                        >
                            Upload
                        </button>
                    </div>
                </div>
            </label>
        </Transition>
    </label>

    <input type="checkbox" id="modal-export" class="modal-toggle" v-model="modalExport" />
    <label for="modal-export" class="modal modal-bottom cursor-pointer transition-all ease-in-out sm:modal-middle">
        <label for="" class="modal-box relative">
            <div class="grid grid-cols-1 gap-y-4">
                <div class="col-span-1">
                    <FullCalendar :options="calendarOptions" />
                </div>
                <div class="col-span-1 flex items-center justify-between md:flex-wrap-reverse">
                    <label for="modal-export" class="max-w-48 btn w-[calc(50%_-_.75rem)]">Batal</label>
                    <button
                        @click="handleExportExcel()"
                        class="max-w-48 btn btn-primary w-[calc(50%_-_.75rem)]"
                        :class="{ loading: isLoading && loadingBy == 'import' }"
                    >
                        Export
                    </button>
                </div>
            </div>
        </label>
    </label>
</template>
