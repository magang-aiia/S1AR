<script>
    import MainLayout from "@/Layouts/Main.vue"
    import { Head as HeadInertia } from "@inertiajs/inertia-vue3"
    import getNav from "@/Pages/Admin/NavAdmin.js"
    import moment from "moment"
    import ModalCuzia from "@/Components/ModalCuzia.vue"

    const route = window.route

    export default {
        components: {
            MainLayout,
            HeadInertia,
            ModalCuzia,
        },
        props: {
            karyawan: {
                type: Object,
                default: () => {},
            },
            departemen: Object,
            kontrak: Object,
        },
        data() {
            return {
                nav: getNav("karyawan"),
                isMounted: false,
                data: [],
                karyawanCheklist: [],
                isAllChecked: false,
                selectedKaryawan: null,
                file: {
                    excel: null,
                    foto: null,
                    replace: false,
                },
                isLoading: false,
                loadingBy: null,
                errors: {},
                sortBy: "npk",
                isNew: false,
                sortDesc: false,
                slice: 30,
                page: 1,
                modalFilter: false,
                modalUpload: false,
                filter: {
                    nama: "",
                    npkfrom: "",
                    npkto: "",
                    tglfrom: "",
                    tglto: "",
                    email: "",
                    no_hp: "",
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
            uniqeData(key) {
                return [...new Set(this.data.map((item) => item[key]))]
            },
            columnType(key) {
                if (moment(this.data[0][key]).isValid()) {
                    return "date"
                } else if (!isNaN(this.data[0][key])) {
                    return "number"
                } else {
                    return "string"
                }
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
            checkAll() {
                this.isAllChecked = !this.isAllChecked
                this.karyawanCheklist = this.isAllChecked ? this.dataSorted.map((item) => item.user_id) : []
            },
            updateStatus(id) {
                this.$inertia.post(
                    route("admin.karyawan.update_status", id),
                    {},
                    {
                        preserveState: true,
                        preserveScroll: true,
                        onStart: () => {
                            this.isLoading = true
                            this.loadingBy = id
                        },
                        onFinish: () => {
                            this.isLoading = false
                            this.loadingBy = null
                        },
                    }
                )
            },
            aktifStatus() {
                this.$inertia.post(
                    route("admin.karyawan.aktif_status"),
                    {
                        karyawan_list: this.karyawanCheklist,
                    },
                    {
                        preserveState: true,
                        preserveScroll: true,
                        onStart: () => {
                            this.isLoading = true
                            this.loadingBy = "aktif"
                        },
                        onFinish: () => {
                            this.isLoading = false
                            this.loadingBy = null
                        },
                    }
                )
            },
            nonaktifStatus() {
                this.$inertia.post(
                    route("admin.karyawan.nonaktif_status"),
                    {
                        karyawan_list: this.karyawanCheklist,
                    },
                    {
                        preserveState: true,
                        preserveScroll: true,
                        onStart: () => {
                            this.isLoading = true
                            this.loadingBy = "nonaktif"
                        },
                        onFinish: () => {
                            this.isLoading = false
                            this.loadingBy = null
                        },
                    }
                )
            },
            export_excel() {
                window.open(route("admin.karyawan.export"))
            },
            import_excel() {
                this.$inertia.post(route("admin.karyawan.import"), this.file, {
                    preserveState: true,
                    preserveScroll: true,
                    forceFormData: true,
                    onStart: () => {
                        this.isLoading = true
                        this.loadingBy = "import"
                    },
                    onError: (error) => {
                        this.errors = error
                        this.loadingBy = null
                        this.modalUpload = false
                    },
                    onSuccess: () => {
                        this.file.excel = null
                        this.file.replace = false
                        this.isLoading = false
                        this.loadingBy = null
                        this.modalUpload = false
                    },
                    onFinish: () => {
                        this.isLoading = false
                        this.loadingBy = null
                    },
                })
            },
        },
        computed: {
            columnKeys() {
                return Object.keys(this.data[0])
            },
            transformData() {
                return this.data.map((data) => {
                    data.tgl_bergabung_semantic = moment(data.tgl_bergabung).format("DD MMMM YYYY")
                    data.nama = data.user.name
                    data.email = data.user.email
                    data.npk = data.user.npk
                    return data
                })
            },
            filterData() {
                return this.transformData.filter((item) => {
                    if (this.isMounted) {
                        return (
                            item.nama.toLowerCase().includes(this.filter.nama.toLowerCase()) &&
                            this.filterNumber(item.npk, this.filter.npkfrom, this.filter.npkto) &&
                            this.filterDate(item.tgl_bergabung, this.filter.tglfrom, this.filter.tglto) &&
                            item.email.toLowerCase().includes(this.filter.email.toLowerCase()) &&
                            item.no_hp.toLowerCase().includes(this.filter.no_hp.toLowerCase()) &&
                            item.status.toLowerCase().indexOf(this.filter.status.toLowerCase()) === 0
                        )
                    } else {
                        return true
                    }
                })
            },
            dataSorted() {
                return this.filterData
                    .slice(0)
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
            selectedDataKaryawan() {
                if (!this.isNew) return this.dataSorted.filter((item) => this.selectedKaryawan === item.id)[0]
                else return {}
            },
        },
        watch: {
            totalPage() {
                if (this.page > this.totalPage) this.page = this.totalPage
            },
            isMounted() {
                this.data = this.karyawan
            },
            karyawan: {
                deep: true,
                handler(val, oldVal) {
                    this.data = this.karyawan
                },
            },
        },
    }
</script>

<template>
    <HeadInertia title="Data Karyawan" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content" @click="log($page.props.auth)">
            Data Karyawan
        </div>
        <div class="mb-4 grid grid-cols-6 gap-x-6 gap-y-4 overflow-hidden">
            <div class="lg:col-span 2 col-span-6 flex flex-wrap items-center sm:col-span-3">
                <label for="modal-filter" class="btn btn-info mr-2">FIlter</label>
                <label for="add-detail-datadiri" class="btn btn-primary mr-2" @click="isNew = true">Tambah</label>
                <label for="modal-upload" class="btn btn-primary mr-2">Upload</label>
                <button @click="export_excel()" class="btn btn-primary">Export</button>
            </div>
            <Transition name="bounce">
                <div
                    class="col-span-6 !col-end-7 grid grid-cols-2 items-end gap-x-2 sm:col-span-3 lg:col-span-2"
                    v-if="karyawanCheklist.length > 0"
                >
                    <button
                        @click="aktifStatus()"
                        class="btn btn-info"
                        :class="{ loading: isLoading && loadingBy == 'aktif' }"
                    >
                        aktif checked
                    </button>
                    <button
                        @click="nonaktifStatus()"
                        class="btn btn-error"
                        :class="{ loading: isLoading && loadingBy == 'nonaktif' }"
                    >
                        nonaktif checked
                    </button>
                </div>
            </Transition>
        </div>
        <div class="mb-4 overflow-x-auto">
            <table class="table-compact table w-full">
                <thead>
                    <tr>
                        <th>
                            <div class="form-control">
                                <label class="label cursor-pointer justify-start">
                                    <input
                                        type="checkbox"
                                        :checked="isAllChecked"
                                        @click="checkAll"
                                        class="checkbox checkbox-primary checkbox-sm mr-2"
                                    />
                                </label>
                            </div>
                        </th>
                        <th></th>
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
                                nama
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
                        <th class="cursor-pointer select-none" @click="sorted('tgl_bergabung')">
                            <div class="flex items-center">
                                tanggal bergabung
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'tgl_bergabung'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'tgl_bergabung'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('email')">
                            <div class="flex items-center">
                                email
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'email'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'email'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('no_hp')">
                            <div class="flex items-center">
                                no hp
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'no_hp'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'no_hp'"
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in dataByPage" :key="index">
                        <th class="text-center">
                            <div class="form-control">
                                <label class="label cursor-pointer justify-start">
                                    <input
                                        type="checkbox"
                                        v-model="karyawanCheklist"
                                        :value="item.user_id"
                                        class="checkbox checkbox-primary checkbox-sm mr-2"
                                    />
                                </label>
                            </div>
                        </th>
                        <th class="text-center">{{ item.index }}</th>
                        <td>{{ item.npk }}</td>
                        <td>{{ item.nama }}</td>
                        <td>{{ item.tgl_bergabung_semantic }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.no_hp }}</td>
                        <td>
                            <button
                                @click="updateStatus(item.user_id)"
                                :class="{ 'btn-info': item.status == 'aktif', 'btn-error': item.status == 'nonaktif' }"
                                class="btn btn-sm w-32"
                            >
                                {{ item.status }}
                            </button>
                        </td>
                        <td>
                            <label
                                for="edit-detail-datadiri"
                                class="btn btn-primary btn-sm mr-3"
                                @click=";(selectedKaryawan = item.id), (isNew = false)"
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

    <ModalCuzia :modalEditDetailDatadiriData="selectedDataKaryawan" :departemen="departemen" :kontrak="kontrak" />

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
                        <label for="name" class="mb-2 block">Tanggal Bergabung : </label>
                        <div class="grid grid-cols-2 gap-x-4">
                            <input type="date" placeholder="dari" v-model="filter.tglfrom" class="input-text" />
                            <input type="date" placeholder="sampai" v-model="filter.tglto" class="input-text" />
                        </div>
                    </div>
                    <div class="col-span-1">
                        <label for="name" class="mb-2 block">Email : </label>
                        <input type="text" placeholder="search email" v-model="filter.email" class="input-text" />
                    </div>
                    <div class="col-span-1">
                        <label for="name" class="mb-2 block">No Hp : </label>
                        <input type="text" placeholder="search no hp" v-model="filter.no_hp" class="input-text" />
                    </div>
                    <div class="col-span-1">
                        <label for="name" class="mb-2 block">Status : </label>
                        <select class="input-text" v-model="filter.status">
                            <option value="">All</option>
                            <option value="aktif">Active</option>
                            <option value="nonaktif">Nonactive</option>
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
                <div class="text-center text-2xl font-bold">Upload data Karyawan</div>
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
                    <div class="col-span-1">
                        <label for="name" class="mb-2 block">Foto Upload : </label>
                        <input
                            type="file"
                            class="input-text h-11 border file:mr-4 file:h-full file:border-0 file:bg-blue-50 file:py-2 file:px-4 hover:file:bg-blue-100"
                        />
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
</template>
