<script>
    import moment from "moment"

    const route = window.route

    export default {
        name: "ModalDatadiri",
        inheritAttrs: false,
        props: {
            modalEditDetailDatadiriData: {
                type: Object,
                default: () => ({}),
            },
            jabatan: Object,
            kontrak: Object,
            isApprovable: {
                type: Boolean,
                default: false,
            },
        },
        data() {
            return {
                modalConfirm: false,
                modalAddDetailDatadiri: false,
                modalEditDetailDatadiri: false,
                editKaryawan: {},
                errors: {},
                avatar: null,
                avatarUrl: null,
            }
        },
        methods: {
            reset() {
                setTimeout(() => {
                    this.modalDetailCuti = false
                    this.modalDetailIzin = false
                    this.modalDetailDatadiri = false
                }, 300)
            },
            habisKontrak(tglGabung, lamaBulan) {
                return moment(tglGabung).add(lamaBulan, "months").format("YYYY-MM-DD")
            },
            log(data) {
                console.log(data)
            },
            changeAvatar(event) {
                this.avatar = event.target.files[0]
                this.editKaryawan.avatar = this.avatar
                this.avatarUrl = URL.createObjectURL(event.target.files[0])
            },
            lamaKontrak(kontrakId) {
                return this.kontrak.find((item) => item.id === kontrakId).lama_kontrak
            },
            tambahKaryawan() {
                this.$inertia.post(route("admin.karyawan.store"), this.editKaryawan, {
                    preserveScroll: true,
                    preserveState: true,
                    forceFormData: true,
                    onError: (page) => {
                        this.errors = page
                    },
                    onSuccess: () => {
                        this.errors = {}
                        this.editKaryawan = {}
                        this.modalAddDetailDatadiri = false
                        this.avatar = null
                        this.avatarUrl = null
                    },
                })
            },
            updateKaryawan() {
                this.$inertia.post(route("admin.karyawan.update", this.editKaryawan.id), this.editKaryawan, {
                    preserveScroll: true,
                    preserveState: true,
                    forceFormData: true,
                    onError: (page) => {
                        this.errors = page
                    },
                    onSuccess: () => {
                        this.errors = {}
                        this.editKaryawan = {}
                        this.modalEditDetailDatadiri = false
                        this.avatar = null
                        this.avatarUrl = null
                    },
                })
            },
        },
        computed: {
            bagian() {
                return this.jabatan.find((item) => item.id === this.editKaryawan.jabatan_id) !== undefined
                    ? this.jabatan.find((item) => item.id === this.editKaryawan.jabatan_id).bagian
                    : []
            },
        },
        watch: {
            modalEditDetailDatadiriData: {
                handler() {
                    this.editKaryawan = this.modalEditDetailDatadiriData
                },
                deep: true,
            },
        },
    }
</script>

<template>
    <input type="checkbox" id="konfirmasi" class="modal-toggle" v-model="modalConfirm" />
    <div class="modal modal-bottom cursor-pointer transition-all ease-in-out sm:modal-middle">
        <Transition name="bounce">
            <div class="modal-box" v-if="modalConfirm">
                <div class="text-center text-2xl font-bold text-error">Konfirmasi Penolakan!</div>
                <div class="my-4 text-lg">apakah anda akan benar-benar menolak permohonan ini?</div>
                <div class="grid grid-cols-2 place-content-center gap-x-4">
                    <label for="konfirmasi" class="btn btn-md">Kembali</label>
                    <label for="konfirmasi" @click="reset()" class="btn btn-error btn-md">Tolak</label>
                </div>
            </div>
        </Transition>
    </div>

    <input type="checkbox" id="add-detail-datadiri" class="modal-toggle" v-model="modalAddDetailDatadiri" />
    <label for="add-detail-datadiri" class="modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out">
        <Transition name="bounce">
            <label for="" v-if="modalAddDetailDatadiri" class="modal-box relative w-11/12 max-w-6xl">
                <div
                    class="mb-3 text-center text-3xl font-semibold"
                    @click="log(jabatan), log(editKaryawan), log(bagian)"
                >
                    Tambah Data Karyawan
                </div>
                <div class="mb-6 flex flex-wrap items-center -md:flex-col -md:justify-center">
                    <div class="relative mr-3 w-36 -md:mb-3 -md:w-48">
                        <div
                            class="relative flex h-36 w-36 items-center overflow-hidden rounded-full border-4 border-gray-300 dark:border-gray-800 -md:h-48 -md:w-48"
                        >
                            <img class="absolute min-h-full min-w-full blur" :src="avatarUrl" v-if="avatar" />
                            <img class="absolute min-h-full min-w-full blur" src="/assets/image/avatar.jpg" v-else />
                            <img class="z-[1]" :src="avatarUrl" v-if="avatar" />
                            <img class="z-[1]" src="/assets/image/avatar.jpg" v-else />
                        </div>
                        <label
                            class="btn btn-primary absolute -bottom-1 -right-1 z-[2] h-12 w-12 rounded-full border-4 border-base-100 p-0 hover:border-base-100"
                        >
                            <box-icon name="edit" class="fill-base-content" size="sm"></box-icon>
                            <input type="file" class="hidden" @input="changeAvatar($event)" />
                        </label>
                    </div>
                    <div class="max-w-[calc(100%_-_11rem)] -md:max-w-sm -md:text-center">
                        <div class="max-w-full truncate text-2xl font-bold md:text-4xl">{{ editKaryawan.nama }}</div>
                        <div class="text-md max-w-full truncate opacity-60 md:text-lg">{{ editKaryawan.email }}</div>
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-x-6 gap-y-4">
                    <div class="col-span-6 lg:col-span-2">
                        <label for="nama" class="mb-2 block">Nama Lengkap</label>
                        <input type="text" v-model="editKaryawan.nama" id="nama" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.nama">{{ errors.nama }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="email" class="mb-2 block">Email</label>
                        <input type="email" v-model="editKaryawan.email" id="email" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.email">{{ errors.email }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="npk" class="mb-2 block">NPK</label>
                        <input type="text" v-model="editKaryawan.npk" id="npk" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.npk">{{ errors.npk }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_hp" class="mb-2 block">No. Hp</label>
                        <input type="text" v-model="editKaryawan.no_hp" id="no_hp" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_hp">{{ errors.no_hp }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tmp_lahir" class="mb-2 block">Tempat Lahir</label>
                        <input type="text" v-model="editKaryawan.tmp_lahir" id="tmp_lahir" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.tmp_lahir">{{ errors.tmp_lahir }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tgl_lahir" class="mb-2 block">Tanggal Lahir</label>
                        <input type="date" v-model="editKaryawan.tgl_lahir" id="tgl_lahir" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.tgl_lahir">{{ errors.tgl_lahir }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tgl_bergabung" class="mb-2 block">Tanggal Bergabung</label>
                        <input type="date" v-model="editKaryawan.tgl_bergabung" id="tgl_bergabung" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.tgl_bergabung">
                            {{ errors.tgl_bergabung }}
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="jabatan" class="mb-2 block">Jabatan</label>
                        <select class="w-full flex-1 rounded-lg bg-base-100" v-model="editKaryawan.jabatan_id">
                            <option value="" disabled>Pilih jabatan</option>
                            <option v-for="item in jabatan" :key="item.id" :value="item.id">{{ item.nama }}</option>
                        </select>
                        <div class="mt-2 text-sm text-error" v-if="errors.jabatan_id">
                            {{ errors.jabatan_id }}
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="bagian" class="mb-2 block">Bagian</label>
                        <select class="w-full flex-1 rounded-lg bg-base-100" v-model="editKaryawan.bagian_id">
                            <option value="" disabled>Pilih bagian</option>
                            <option v-for="item in bagian" :key="item.id" :value="item.id">{{ item.nama }}</option>
                        </select>
                        <div class="mt-2 text-sm text-error" v-if="errors.bagian_id">
                            {{ errors.bagian_id }}
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="kontrak_id" class="mb-2 block">Kontrak</label>
                        <select class="w-full flex-1 rounded-lg bg-base-100" v-model="editKaryawan.kontrak_id">
                            <option value="" disabled>Pilih kontrak</option>
                            <option v-for="item in kontrak" :key="item.id" :value="item.id">
                                {{ item.nama_kontrak }}
                            </option>
                        </select>
                        <div class="mt-2 text-sm text-error" v-if="errors.kontrak_id">{{ errors.kontrak_id }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="habis_kontrak" class="mb-2 block">Habis Kontrak</label>
                        <input
                            :type="
                                editKaryawan.kontrak_id
                                    ? lamaKontrak(editKaryawan.kontrak_id) == '0'
                                        ? 'text'
                                        : 'date'
                                    : 'text'
                            "
                            id="habis_kontrak"
                            class="input-text"
                            readonly
                            :value="
                                editKaryawan.kontrak_id
                                    ? lamaKontrak(editKaryawan.kontrak_id) == '0'
                                        ? '-'
                                        : habisKontrak(editKaryawan.tgl_bergabung, lamaKontrak(editKaryawan.kontrak_id))
                                    : '-'
                            "
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="gol" class="mb-2 block">Golongan</label>
                        <input type="text" v-model="editKaryawan.gol" id="gol" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.gol">{{ errors.gol }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="sta_kerja" class="mb-2 block">Status Kerja</label>
                        <input type="text" v-model="editKaryawan.sta_kerja" id="sta_kerja" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.sta_kerja">{{ errors.sta_kerja }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="sta_nikah" class="mb-2 block">Status Nikah</label>
                        <input type="text" v-model="editKaryawan.sta_nikah" id="sta_nikah" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.sta_nikah">{{ errors.sta_nikah }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="sta_pajak" class="mb-2 block">Status Pajak</label>
                        <input type="text" v-model="editKaryawan.sta_pajak" id="sta_pajak" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.sta_pajak">{{ errors.sta_pajak }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_bpjs_tk" class="mb-2 block">No. BPJS TK</label>
                        <input type="text" v-model="editKaryawan.no_bpjs_tk" id="no_bpjs_tk" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_bpjs_tk">{{ errors.no_bpjs_tk }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_bpjs_kes" class="mb-2 block">No. BPJS Kesahatan</label>
                        <input type="text" v-model="editKaryawan.no_bpjs_kes" id="no_bpjs_kes" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_bpjs_kes">{{ errors.no_bpjs_kes }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_dpa" class="mb-2 block">No.DPA</label>
                        <input type="text" v-model="editKaryawan.no_dpa" id="no_dpa" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_dpa">{{ errors.no_dpa }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_npwp" class="mb-2 block">No. NPWP</label>
                        <input type="text" v-model="editKaryawan.no_npwp" id="no_npwp" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_npwp">{{ errors.no_npwp }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_ktp" class="mb-2 block">No. KTP</label>
                        <input type="text" v-model="editKaryawan.no_ktp" id="no_ktp" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_ktp">{{ errors.no_ktp }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="alamat_dom" class="mb-2 block">Alamat Domisili</label>
                        <input type="text" v-model="editKaryawan.alamat_dom" id="alamat_dom" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.alamat_dom">{{ errors.alamat_dom }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="alamat_ktp" class="mb-2 block">Alamat KTP</label>
                        <input type="text" v-model="editKaryawan.alamat_ktp" id="alamat_ktp" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.alamat_ktp">{{ errors.alamat_ktp }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_istri" class="mb-2 block">Nama Istri</label>
                        <input type="text" v-model="editKaryawan.nama_istri" id="nama_istri" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.nama_istri">{{ errors.nama_istri }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="jml_anak" class="mb-2 block">Jumlah Anak</label>
                        <input type="text" v-model="editKaryawan.jml_anak" id="jml_anak" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.jml_anak">{{ errors.jml_anak }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_anak1" class="mb-2 block">Nama Anak Ke 1</label>
                        <input type="text" v-model="editKaryawan.nama_anak1" id="nama_anak1" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.nama_anak1">{{ errors.nama_anak1 }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_anak2" class="mb-2 block">Nama Anak Ke 2</label>
                        <input type="text" v-model="editKaryawan.nama_anak2" id="nama_anak2" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.nama_anak2">{{ errors.nama_anak2 }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_anak3" class="mb-3 block">Nama Anak Ke 3</label>
                        <input type="text" v-model="editKaryawan.nama_anak3" id="nama_anak3" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.nama_anak3">{{ errors.nama_anak3 }}</div>
                    </div>
                    <div class="col-span-6 flex items-center justify-between md:flex-wrap-reverse">
                        <label for="add-detail-datadiri" class="max-w-48 btn w-[calc(50%_-_.75rem)]">batal</label>
                        <button @click="tambahKaryawan()" class="max-w-48 btn btn-primary w-[calc(50%_-_.75rem)]">
                            Tambah
                        </button>
                    </div>
                </div>
            </label>
        </Transition>
    </label>

    <input type="checkbox" id="edit-detail-datadiri" class="modal-toggle" v-model="modalEditDetailDatadiri" />
    <label for="edit-detail-datadiri" class="modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out">
        <Transition name="bounce">
            <label for="" v-if="modalEditDetailDatadiri" class="modal-box relative w-11/12 max-w-6xl">
                <div class="mb-3 text-center text-3xl font-semibold" @click="log(jabatan), log(bagian)">
                    Edit Data Karyawan
                </div>
                <div class="mb-6 flex flex-wrap items-center -md:flex-col -md:justify-center">
                    <div class="relative mr-3 w-36 -md:mb-3 -md:w-48">
                        <div
                            class="relative flex h-36 w-36 items-center overflow-hidden rounded-full border-4 border-gray-300 dark:border-gray-800 -md:h-48 -md:w-48"
                        >
                            <img class="absolute min-h-full min-w-full blur" :src="avatarUrl" v-if="avatar" />
                            <img
                                class="absolute min-h-full min-w-full blur"
                                :src="'/assets/image/' + editKaryawan.user.avatar"
                                v-else
                            />
                            <img class="z-[1]" :src="avatarUrl" v-if="avatar" />
                            <img class="z-[1]" :src="'/assets/image/' + editKaryawan.user.avatar" v-else />
                        </div>
                        <label
                            class="btn btn-primary absolute -bottom-1 -right-1 z-[2] h-12 w-12 rounded-full border-4 border-base-100 p-0 hover:border-base-100"
                        >
                            <box-icon name="edit" class="fill-base-content" size="sm"></box-icon>
                            <input type="file" class="hidden" @input="changeAvatar($event)" />
                        </label>
                    </div>
                    <div class="max-w-[calc(100%_-_11rem)] -md:max-w-sm -md:text-center">
                        <div class="max-w-full truncate text-2xl font-bold md:text-4xl">{{ editKaryawan.nama }}</div>
                        <div class="text-md max-w-full truncate opacity-60 md:text-lg">{{ editKaryawan.email }}</div>
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-x-6 gap-y-4">
                    <div class="col-span-6 lg:col-span-2">
                        <label for="nama" class="mb-2 block">Nama Lengkap</label>
                        <input type="text" v-model="editKaryawan.nama" id="nama" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.nama">{{ errors.nama }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="email" class="mb-2 block">Email</label>
                        <input type="email" v-model="editKaryawan.email" id="email" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.email">{{ errors.email }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="npk" class="mb-2 block">NPK</label>
                        <input type="text" v-model="editKaryawan.npk" id="npk" class="input-text" readonly />
                        <div class="mt-2 text-sm text-error" v-if="errors.npk">{{ errors.npk }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_hp" class="mb-2 block">No. Hp</label>
                        <input type="text" v-model="editKaryawan.no_hp" id="no_hp" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_hp">{{ errors.no_hp }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tmp_lahir" class="mb-2 block">Tempat Lahir</label>
                        <input type="text" v-model="editKaryawan.tmp_lahir" id="tmp_lahir" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.tmp_lahir">{{ errors.tmp_lahir }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tgl_lahir" class="mb-2 block">Tanggal Lahir</label>
                        <input type="date" v-model="editKaryawan.tgl_lahir" id="tgl_lahir" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.tmp_lahir">{{ errors.tmp_lahir }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tgl_bergabung" class="mb-2 block">Tanggal Bergabung</label>
                        <input type="date" v-model="editKaryawan.tgl_bergabung" id="tgl_bergabung" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.tgl_bergabung">
                            {{ errors.tgl_bergabung }}
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="jabatan" class="mb-2 block">Jabatan</label>
                        <select class="w-full flex-1 rounded-lg bg-base-100" v-model="editKaryawan.jabatan_id">
                            <option value="" disabled>Pilih jabatan</option>
                            <option v-for="item in jabatan" :key="item.id" :value="item.id">{{ item.nama }}</option>
                        </select>
                        <div class="mt-2 text-sm text-error" v-if="errors.jabatan_id">
                            {{ errors.jabatan_id }}
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="bagian" class="mb-2 block">Bagian</label>
                        <select class="w-full flex-1 rounded-lg bg-base-100" v-model="editKaryawan.bagian_id">
                            <option value="" disabled>Pilih bagian</option>
                            <option v-for="item in bagian" :key="item.id" :value="item.id">{{ item.nama }}</option>
                        </select>
                        <div class="mt-2 text-sm text-error" v-if="errors.bagian_id">
                            {{ errors.bagian_id }}
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="kontrak_id" class="mb-2 block">Kontrak</label>
                        <select class="w-full flex-1 rounded-lg bg-base-100" v-model="editKaryawan.kontrak_id">
                            <option value="" disabled>Pilih kontrak</option>
                            <option v-for="item in kontrak" :key="item.id" :value="item.id">
                                {{ item.nama_kontrak }}
                            </option>
                        </select>
                        <div class="mt-2 text-sm text-error" v-if="errors.kontrak_id">{{ errors.kontrak_id }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="habis_kontrak" class="mb-2 block">Habis Kontrak</label>
                        <input
                            :type="
                                editKaryawan.kontrak_id
                                    ? lamaKontrak(editKaryawan.kontrak_id) == '0'
                                        ? 'text'
                                        : 'date'
                                    : 'text'
                            "
                            id="habis_kontrak"
                            class="input-text"
                            readonly
                            :value="
                                editKaryawan.kontrak_id
                                    ? lamaKontrak(editKaryawan.kontrak_id) == '0'
                                        ? '-'
                                        : habisKontrak(editKaryawan.tgl_bergabung, lamaKontrak(editKaryawan.kontrak_id))
                                    : '-'
                            "
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="gol" class="mb-2 block">Golongan</label>
                        <input type="text" v-model="editKaryawan.gol" id="gol" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.gol">{{ errors.gol }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="sta_kerja" class="mb-2 block">Status Kerja</label>
                        <input type="text" v-model="editKaryawan.sta_kerja" id="sta_kerja" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.sta_kerja">{{ errors.sta_kerja }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="sta_nikah" class="mb-2 block">Status Nikah</label>
                        <input type="text" v-model="editKaryawan.sta_nikah" id="sta_nikah" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.sta_nikah">{{ errors.sta_nikah }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="sta_pajak" class="mb-2 block">Status Pajak</label>
                        <input type="text" v-model="editKaryawan.sta_pajak" id="sta_pajak" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.sta_pajak">{{ errors.sta_pajak }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_bpjs_tk" class="mb-2 block">No. BPJS TK</label>
                        <input type="text" v-model="editKaryawan.no_bpjs_tk" id="no_bpjs_tk" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_bpjs_tk">{{ errors.no_bpjs_tk }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_bpjs_kes" class="mb-2 block">No. BPJS Kesahatan</label>
                        <input type="text" v-model="editKaryawan.no_bpjs_kes" id="no_bpjs_kes" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_bpjs_kes">{{ errors.no_bpjs_kes }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_dpa" class="mb-2 block">No.DPA</label>
                        <input type="text" v-model="editKaryawan.no_dpa" id="no_dpa" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_dpa">{{ errors.no_dpa }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_npwp" class="mb-2 block">No. NPWP</label>
                        <input type="text" v-model="editKaryawan.no_npwp" id="no_npwp" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_npwp">{{ errors.no_npwp }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_ktp" class="mb-2 block">No. KTP</label>
                        <input type="text" v-model="editKaryawan.no_ktp" id="no_ktp" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.no_ktp">{{ errors.no_ktp }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="alamat_dom" class="mb-2 block">Alamat Domisili</label>
                        <input type="text" v-model="editKaryawan.alamat_dom" id="alamat_dom" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.alamat_dom">{{ errors.alamat_dom }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="alamat_ktp" class="mb-2 block">Alamat KTP</label>
                        <input type="text" v-model="editKaryawan.alamat_ktp" id="alamat_ktp" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.alamat_ktp">{{ errors.alamat_ktp }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_istri" class="mb-2 block">Nama Istri</label>
                        <input type="text" v-model="editKaryawan.nama_istri" id="nama_istri" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.nama_istri">{{ errors.nama_istri }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="jml_anak" class="mb-2 block">Jumlah Anak</label>
                        <input type="text" v-model="editKaryawan.jml_anak" id="jml_anak" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.jml_anak">{{ errors.jml_anak }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_anak1" class="mb-2 block">Nama Anak Ke 1</label>
                        <input type="text" v-model="editKaryawan.nama_anak1" id="nama_anak1" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.nama_anak1">{{ errors.nama_anak1 }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_anak2" class="mb-2 block">Nama Anak Ke 2</label>
                        <input type="text" v-model="editKaryawan.nama_anak2" id="nama_anak2" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.nama_anak2">{{ errors.nama_anak2 }}</div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_anak3" class="mb-3 block">Nama Anak Ke 3</label>
                        <input type="text" v-model="editKaryawan.nama_anak3" id="nama_anak3" class="input-text" />
                        <div class="mt-2 text-sm text-error" v-if="errors.nama_anak3">{{ errors.nama_anak3 }}</div>
                    </div>
                    <div class="col-span-6 flex items-center justify-between md:flex-wrap-reverse">
                        <label for="edit-detail-datadiri" class="max-w-48 btn w-[calc(50%_-_.75rem)]">batal</label>
                        <button @click="updateKaryawan()" class="max-w-48 btn btn-primary w-[calc(50%_-_.75rem)]">
                            Edit
                        </button>
                    </div>
                </div>
            </label>
        </Transition>
    </label>
</template>
