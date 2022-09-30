<script>
    import moment from "moment"
    const route = window.route
    export default {
        name: "ModalCuzia",
        inheritAttrs: false,
        props: {
            modalDetailCutiData: {
                type: Object,
                default: () => ({}),
            },
            modalDetailIzinData: {
                type: Object,
                default: () => ({}),
            },
            modalDetailDatadiriData: {
                type: Object,
                default: () => ({}),
            },
            datadiri: {
                type: Object,
                default: () => ({}),
            },
            kontrak: {
                type: Object,
                default: () => ({}),
            },
            jabatan: {
                type: Object,
                default: () => ({}),
            },
            isApprovable: {
                type: Boolean,
                default: false,
            },
            isAdmin: {
                type: Boolean,
                default: false,
            },
        },
        data() {
            return {
                modalDetailCuti: false,
                modalDetailIzin: false,
                modalDetailDatadiri: false,
                modalConfirm: false,
                modalAddDetailDatadiri: false,
                modalEditDetailDatadiri: false,
                editKaryawan: {},
                errors: {},
                avatar: null,
                avatarUrl: null,
                ket: "-",
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
            lamaKontrak(kontrakId) {
                return this.kontrak.find((item) => item.id === kontrakId).lama_kontrak
            },
            approveDatadiri(id) {
                this.$inertia.post(
                    route("approve"),
                    { id, type: "datadiri" },
                    {
                        preserveState: true,
                        preserveScroll: true,
                        onSuccess: () => {
                            this.modalDetailDatadiri = false
                        },
                    }
                )
            },
            rejectedDatadiri(id) {
                this.$inertia.post(
                    route("rejected"),
                    { id, type: "datadiri", ket: this.ket },
                    {
                        preserveState: true,
                        preserveScroll: true,
                        onError(page) {
                            console.log(page)
                        },
                        onSuccess: () => {
                            this.modalConfirm = false
                            this.modalDetailDatadiri = false
                        },
                    }
                )
            },
            alasanPenolakan(id) {
                return this.editKaryawan.rejected.length
                    ? this.editKaryawan.rejected.filter((item) => item.user_id === id)[0] !== undefined
                        ? this.editKaryawan.rejected.filter((item) => item.user_id === id)[0].keterangan
                        : ""
                    : ""
            },
            isImage(filename) {
                const ext = filename.split(".").pop().toLowerCase()
                return ["jpg", "jpeg", "png", "svg"].includes(ext)
            },
            isPdf(filename) {
                return filename.split(".").pop().toLowerCase() === "pdf"
            },
        },
        watch: {
            datadiri: {
                handler() {
                    this.editKaryawan = this.datadiri
                    this.editKaryawan.bagian = this.editKaryawan.user.bagian.nama
                    this.editKaryawan.jabatan = this.editKaryawan.user.bagian.jabatan.nama
                    this.editKaryawan.nama_kontrak = this.editKaryawan.kontrak.nama_kontrak
                    this.editKaryawan.newAvatar = this.editKaryawan.avatar !== this.editKaryawan.user.avatar
                },
                deep: true,
            },
        },
    }
</script>

<template>
    <input type="checkbox" id="detail-cuti" v-model="modalDetailCuti" class="modal-toggle" />
    <label
        :for="isApprovable ? '' : 'detail-cuti'"
        class="modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out"
    >
        <Transition name="bounce">
            <label v-if="modalDetailCuti" for="" class="modal-box relative w-11/12 max-w-4xl">
                <div class="mb-2 text-2xl font-semibold">
                    Detail cuti (<span class="font-extrabold">cxu9923829892</span>)
                </div>
                <div class="grid grid-cols-4 gap-x-6 gap-y-4">
                    <div class="col-span-4 lg:col-span-2">
                        <label for="name" class="mb-2 block">Nama</label>
                        <input type="text" name="name" id="name" class="input-text" disabled />
                    </div>
                    <div class="col-span-4 lg:col-span-2">
                        <label for="npk" class="mb-2 block">NPK</label>
                        <input type="text" name="npk" id="npk" class="input-text" disabled />
                    </div>
                    <div class="col-span-4 lg:col-span-2">
                        <label for="departemen" class="mb-2 block">Bagian</label>
                        <input type="text" name="departemen" id="departemen" class="input-text" disabled />
                    </div>
                    <div class="col-span-4 lg:col-span-2 lg:col-start-1 lg:row-start-1">
                        <label for="jenis_cuti" class="mb-2 block">Jenis Cuti</label>
                        <input type="text" name="jenis_cuti" id="jenis_cuti" class="input-text" />
                    </div>
                    <div class="col-span-4 lg:col-span-2 lg:col-start-1 lg:row-start-2">
                        <label for="tgl_awal" class="mb-2 block">Tanggal Mulai Cuti</label>
                        <input type="date" name="tgl_awal" id="tgl_awal" class="input-text" />
                    </div>
                    <div class="col-span-4 lg:col-span-2 lg:col-start-1 lg:row-start-3">
                        <label for="tgl_akhir" class="mb-2 block">Tanggal Akhir Cuti</label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="input-text" />
                    </div>
                    <div class="col-span-4">
                        <label for="nama" class="mb-2 block">Alasan</label>
                        <textarea
                            rows="3"
                            class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                        ></textarea>
                    </div>
                    <div class="col-span-4" v-if="isApprovable">
                        <label for="nama" class="mb-2 block">Alasan Penolakan</label>
                        <textarea
                            rows="3"
                            class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                        ></textarea>
                    </div>
                    <div
                        class="col-span-4 flex items-center"
                        :class="isApprovable ? 'justify-between md:flex-wrap-reverse' : 'justify-center'"
                    >
                        <label
                            for="konfirmasi"
                            v-if="isApprovable"
                            class="max-w-48 btn btn-error w-[calc(50%_-_.75rem)]"
                            >Tolak</label
                        >
                        <label
                            for="detail-cuti"
                            v-if="isApprovable"
                            class="max-w-48 btn btn-primary w-[calc(50%_-_.75rem)]"
                            >Setujui</label
                        >
                        <label
                            for="detail-cuti"
                            v-if="!isApprovable"
                            class="md:max-w-48 btn btn-primary w-full md:w-[calc(50%_-_.75rem)]"
                            >Kembali</label
                        >
                    </div>
                </div>
            </label>
        </Transition>
    </label>

    <input type="checkbox" id="detail-izin" v-model="modalDetailIzin" class="modal-toggle" />
    <label
        :for="isApprovable ? '' : 'detail-izin'"
        class="modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out"
    >
        <Transition name="bounce">
            <label for="" v-if="modalDetailIzin" class="modal-box relative w-11/12 max-w-6xl">
                <div class="mb-2 text-2xl font-semibold">
                    Detail izin (<span class="font-extrabold">cxu9923829892</span>)
                </div>
                <div class="grid grid-cols-6 gap-x-6 gap-y-4">
                    <div class="col-span-6 row-span-6 h-[30rem] lg:col-span-4 lg:h-auto">
                        <div class="h-full w-full rounded-lg bg-base-content"></div>
                    </div>
                    <div class="col-span-3 lg:col-span-2 lg:col-end-7">
                        <label for="name" class="mb-2 block">Nama</label>
                        <input type="text" name="name" id="name" class="input-text" disabled />
                    </div>
                    <div class="col-span-3 lg:col-span-2 lg:col-end-7">
                        <label for="npk" class="mb-2 block">NPK</label>
                        <input type="text" name="npk" id="npk" class="input-text" disabled />
                    </div>
                    <div class="col-span-3 lg:col-span-2 lg:col-end-7">
                        <label for="departemen" class="mb-2 block">Bagian</label>
                        <input type="text" name="departemen" id="departemen" class="input-text" disabled />
                    </div>
                    <div class="col-span-3 lg:col-span-2 lg:col-end-7">
                        <label for="jenis_izin" class="mb-2 block">Jenis Izin</label>
                        <input type="text" name="jenis_izin" id="jenis_izin" class="input-text" />
                    </div>
                    <div class="col-span-3 lg:col-span-2 lg:col-end-7">
                        <label for="tgl_awal" class="mb-2 block">Tanggal Mulai Izin</label>
                        <input type="date" name="tgl_awal" id="tgl_awal" class="input-text" />
                    </div>
                    <div class="col-span-3 lg:col-span-2 lg:col-end-7">
                        <label for="tgl_akhir" class="mb-2 block">Tanggal Akhir Izin</label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="input-text" />
                    </div>
                    <div class="col-span-6">
                        <label for="nama" class="mb-2 block">Alasan</label>
                        <textarea
                            rows="3"
                            class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                        ></textarea>
                    </div>
                    <div
                        class="col-span-6 flex items-center"
                        :class="isApprovable ? 'justify-between md:flex-wrap-reverse' : 'justify-center'"
                    >
                        <label
                            for="konfirmasi"
                            v-if="isApprovable"
                            class="max-w-48 btn btn-error w-[calc(50%_-_.75rem)]"
                            >Tolak</label
                        >
                        <label
                            for="detail-izin"
                            v-if="isApprovable"
                            class="max-w-48 btn btn-primary w-[calc(50%_-_.75rem)]"
                            >Setujui</label
                        >
                        <label
                            for="detail-izin"
                            v-if="!isApprovable"
                            class="md:max-w-48 btn btn-primary w-full md:w-[calc(50%_-_.75rem)]"
                            >Kembali</label
                        >
                    </div>
                </div>
            </label>
        </Transition>
    </label>

    <input type="checkbox" id="detail-datadiri" class="modal-toggle" v-model="modalDetailDatadiri" />
    <label for="detail-datadiri" class="modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out">
        <Transition name="bounce">
            <label for="" v-if="modalDetailDatadiri" class="modal-box relative w-11/12 max-w-6xl">
                <div class="mb-2 text-2xl font-semibold" @click="log(editKaryawan)">
                    Detail datadiri (<span class="font-extrabold">{{ editKaryawan.kode }}</span
                    >)
                </div>
                <div class="mb-6 flex flex-wrap items-center -md:flex-col -md:justify-center">
                    <div
                        class="relative mr-3 flex h-36 w-36 items-center overflow-hidden rounded-full border-4 border-gray-300 dark:border-gray-800 -md:h-48 -md:w-48"
                    >
                        <img
                            class="absolute min-h-full min-w-full blur"
                            :src="
                                editKaryawan.newAvatar
                                    ? 'assets/pengajuan/datadiri/avatar/' + editKaryawan.avatar
                                    : 'assets/image/' + editKaryawan.avatar
                            "
                        />
                        <img
                            class="z-[1]"
                            :src="
                                editKaryawan.newAvatar
                                    ? '/assets/pengajuan/datadiri/avatar/' + editKaryawan.avatar
                                    : '/assets/image/' + editKaryawan.avatar
                            "
                        />
                    </div>
                    <div class="max-w-[calc(100%_-_11rem)] -md:max-w-sm -md:text-center">
                        <div class="max-w-full truncate text-2xl font-bold md:text-4xl">{{ editKaryawan.name }}</div>
                        <div class="text-md max-w-full truncate opacity-60 md:text-lg">{{ editKaryawan.email }}</div>
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-x-6 gap-y-4">
                    <div class="col-span-6 lg:col-span-2">
                        <label for="name" class="mb-2 block">Nama Lengkap</label>
                        <input type="text" readonly v-model="editKaryawan.name" id="name" class="input-text" />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="email" class="mb-2 block">Email</label>
                        <input type="email" readonly v-model="editKaryawan.email" id="email" class="input-text" />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="npk" class="mb-2 block">NPK</label>
                        <input type="text" readonly v-model="editKaryawan.npk" id="npk" class="input-text" disabled />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_hp" class="mb-2 block">No. Hp</label>
                        <input type="text" readonly v-model="editKaryawan.no_hp" id="no_hp" class="input-text" />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tmp_lahir" class="mb-2 block">Tempat Lahir</label>
                        <input
                            type="text"
                            readonly
                            v-model="editKaryawan.tmp_lahir"
                            id="tmp_lahir"
                            class="input-text"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tgl_lahir" class="mb-2 block">Tanggal Lahir</label>
                        <input
                            type="date"
                            readonly
                            v-model="editKaryawan.tgl_lahir"
                            id="tgl_lahir"
                            class="input-text"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tgl_bergabung" class="mb-2 block">Tanggal Bergabung</label>
                        <input
                            type="date"
                            v-model="editKaryawan.tgl_bergabung"
                            id="tgl_bergabung"
                            class="input-text"
                            disabled
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="jabatan" class="mb-2 block">Jabatan</label>
                        <input
                            type="text"
                            v-model="editKaryawan.jabatan"
                            id="tgl_bergabung"
                            class="input-text"
                            disabled
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="bagian" class="mb-2 block">Bagian</label>
                        <input
                            type="text"
                            v-model="editKaryawan.bagian"
                            id="tgl_bergabung"
                            class="input-text"
                            disabled
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="kontrak_id" class="mb-2 block">Kontrak</label>
                        <input
                            type="text"
                            v-model="editKaryawan.nama_kontrak"
                            id="tmp_lahir"
                            class="input-text"
                            disabled
                        />
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
                            disabled
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
                        <input type="text" readonly v-model="editKaryawan.gol" id="gol" class="input-text" disabled />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="sta_kerja" class="mb-2 block">Status Kerja</label>
                        <input
                            type="text"
                            v-model="editKaryawan.sta_kerja"
                            id="sta_kerja"
                            class="input-text"
                            disabled
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="sta_nikah" class="mb-2 block">Status Nikah</label>
                        <input
                            type="text"
                            v-model="editKaryawan.sta_nikah"
                            id="sta_nikah"
                            class="input-text"
                            disabled
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="sta_pajak" class="mb-2 block">Status Pajak</label>
                        <input
                            type="text"
                            v-model="editKaryawan.sta_pajak"
                            id="sta_pajak"
                            class="input-text"
                            disabled
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_bpjs_tk" class="mb-2 block">No. BPJS TK</label>
                        <input
                            type="text"
                            v-model="editKaryawan.no_bpjs_tk"
                            id="no_bpjs_tk"
                            class="input-text"
                            disabled
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_bpjs_kes" class="mb-2 block">No. BPJS Kesahatan</label>
                        <input
                            type="text"
                            v-model="editKaryawan.no_bpjs_kes"
                            id="no_bpjs_kes"
                            class="input-text"
                            disabled
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_dpa" class="mb-2 block">No.DPA</label>
                        <input
                            type="text"
                            readonly
                            v-model="editKaryawan.no_dpa"
                            id="no_dpa"
                            class="input-text"
                            disabled
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_npwp" class="mb-2 block">No. NPWP</label>
                        <input type="text" readonly v-model="editKaryawan.no_npwp" id="no_npwp" class="input-text" />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="no_ktp" class="mb-2 block">No. KTP</label>
                        <input type="text" readonly v-model="editKaryawan.no_ktp" id="no_ktp" class="input-text" />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="alamat_dom" class="mb-2 block">Alamat Domisili</label>
                        <input
                            type="text"
                            readonly
                            v-model="editKaryawan.alamat_dom"
                            id="alamat_dom"
                            class="input-text"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="alamat_ktp" class="mb-2 block">Alamat KTP</label>
                        <input
                            type="text"
                            readonly
                            v-model="editKaryawan.alamat_ktp"
                            id="alamat_ktp"
                            class="input-text"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_istri" class="mb-2 block">Nama Istri</label>
                        <input
                            type="text"
                            readonly
                            v-model="editKaryawan.nama_istri"
                            id="nama_istri"
                            class="input-text"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="jml_anak" class="mb-2 block">Jumlah Anak</label>
                        <input
                            type="number"
                            readonly
                            v-model="editKaryawan.jml_anak"
                            id="jml_anak"
                            class="input-text"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_anak1" class="mb-2 block">Nama Anak Ke 1</label>
                        <input
                            type="text"
                            readonly
                            v-model="editKaryawan.nama_anak1"
                            id="nama_anak1"
                            class="input-text"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_anak2" class="mb-2 block">Nama Anak Ke 2</label>
                        <input
                            type="text"
                            readonly
                            v-model="editKaryawan.nama_anak2"
                            id="nama_anak2"
                            class="input-text"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_anak3" class="mb-3 block">Nama Anak Ke 3</label>
                        <input
                            type="text"
                            readonly
                            v-model="editKaryawan.nama_anak3"
                            id="nama_anak3"
                            class="input-text"
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2" v-if="!isApprovable">
                        <label for="nama" class="mb-2 block">Status Approval 1</label>
                        <div
                            class="block h-24 w-full overflow-y-auto rounded-lg border border-[#6b7280] bg-base-100 px-3 py-2 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                        >
                            <span class="font-bold">Approval : </span>{{ editKaryawan.approval1.name }} <br />
                            <span class="font-bold">Status : </span>
                            <span
                                :class="{
                                    'text-warning': editKaryawan.approval1_status === 'pending',
                                    'text-error': editKaryawan.approval1_status === 'rejected',
                                    'text-success': editKaryawan.approval1_status === 'approved',
                                }"
                            >
                                {{ editKaryawan.approval1_status }}
                            </span>
                            <br />
                            <span class="font-bold">Alasan : </span>{{ alasanPenolakan(editKaryawan.approval1_id) }}
                            <br />
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3 lg:col-span-2" v-if="!isApprovable">
                        <label for="nama" class="mb-2 block">Status Approval 2</label>
                        <div
                            class="block h-24 w-full overflow-y-auto rounded-lg border border-[#6b7280] bg-base-100 px-3 py-2 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                        >
                            <span class="font-bold">Approval : </span>{{ editKaryawan.approval2.name }} <br />
                            <span class="font-bold">Status : </span>
                            <span
                                :class="{
                                    'text-warning': editKaryawan.approval2_status === 'pending',
                                    'text-error': editKaryawan.approval2_status === 'rejected',
                                    'text-success': editKaryawan.approval2_status === 'approved',
                                }"
                            >
                                {{ editKaryawan.approval2_status }}
                            </span>
                            <br />
                            <span class="font-bold">Alasan : </span>{{ alasanPenolakan(editKaryawan.approval2_id) }}
                            <br />
                        </div>
                    </div>
                    <div class="col-span-6 lg:col-span-2" v-if="!isApprovable">
                        <label for="nama" class="mb-2 block">Status HR</label>
                        <div
                            class="block h-24 w-full overflow-y-auto rounded-lg border border-[#6b7280] bg-base-100 px-3 py-2 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                        >
                            <span class="font-bold">Approval : </span>HR <br />
                            <span class="font-bold">Status : </span>
                            <span
                                :class="{
                                    'text-warning': editKaryawan.hr_confirm === 'pending',
                                    'text-error': editKaryawan.hr_confirm === 'rejected',
                                    'text-success': editKaryawan.hr_confirm === 'approved',
                                }"
                            >
                                {{ editKaryawan.hr_confirm }}
                            </span>
                            <br />
                            <span class="font-bold">Alasan : </span>{{ alasanPenolakan(1) }} <br />
                        </div>
                    </div>
                    <div class="col-span-6">
                        <label for="nama" class="mb-2 block">File Data Dukung</label>
                        <div class="flex flex-col items-center justify-center" v-if="editKaryawan.file.length == 0">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="48"
                                height="48"
                                viewBox="0 0 24 24"
                                class="fill-current"
                                style="transform: ; msfilter: "
                            >
                                <path
                                    d="M19.937 8.68c-.011-.032-.02-.063-.033-.094a.997.997 0 0 0-.196-.293l-6-6a.997.997 0 0 0-.293-.196c-.03-.014-.062-.022-.094-.033a.991.991 0 0 0-.259-.051C13.04 2.011 13.021 2 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9c0-.021-.011-.04-.013-.062a.99.99 0 0 0-.05-.258zM16.586 8H14V5.414L16.586 8zM6 20V4h6v5a1 1 0 0 0 1 1h5l.002 10H6z"
                                ></path>
                            </svg>
                            <div>Tidak ada file</div>
                        </div>
                        <div class="flex w-max" v-drag:x v-else>
                            <template v-for="file in editKaryawan.file" :key="file.id">
                                <div
                                    v-if="isImage(file.nama_file)"
                                    class="relative mr-3 flex h-80 w-96 items-center overflow-hidden rounded-lg shadow dark:border-gray-800 -md:h-48 -md:w-48"
                                >
                                    <img
                                        class="absolute min-h-full min-w-full opacity-30 blur"
                                        :src="'/assets/pengajuan/datadiri/file/' + file.nama_file"
                                    />
                                    <img
                                        class="z-[1] mx-auto max-h-full max-w-full"
                                        :src="'/assets/pengajuan/datadiri/file/' + file.nama_file"
                                    />
                                </div>
                            </template>
                        </div>
                        <template v-for="file in editKaryawan.file" :key="file.id">
                            <div v-if="isPdf(file.nama_file)" class="relative mt-3 w-full">
                                <object
                                    :data="'/assets/pengajuan/datadiri/file/' + file.nama_file"
                                    class="h-[80vh] w-full"
                                ></object>
                            </div>
                        </template>
                    </div>
                    <div class="col-span-6" v-if="isApprovable">
                        <label for="nama" class="mb-2 block">Alasan Penolakan</label>
                        <textarea
                            rows="3"
                            v-model="ket"
                            class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                        ></textarea>
                    </div>
                    <div
                        class="col-span-6 flex items-center"
                        :class="
                            isApprovable && editKaryawan.status == 'pending'
                                ? 'justify-between md:flex-wrap-reverse'
                                : 'justify-center'
                        "
                    >
                        <label
                            for="konfirmasi"
                            v-if="isApprovable && editKaryawan.status == 'pending'"
                            class="max-w-48 btn btn-error w-[calc(50%_-_.75rem)]"
                            >Tolak</label
                        >
                        <label
                            for="detail-datadiri"
                            v-else
                            class="md:max-w-48 btn btn-primary w-full md:w-[calc(50%_-_.75rem)]"
                            >Kembali</label
                        >
                        <label
                            v-if="isApprovable && editKaryawan.status == 'pending'"
                            @click="approveDatadiri(editKaryawan.id)"
                            class="max-w-48 btn btn-primary w-[calc(50%_-_.75rem)]"
                            >Setujui</label
                        >
                    </div>
                </div>
            </label>
        </Transition>
    </label>

    <input type="checkbox" id="konfirmasi" class="modal-toggle" v-model="modalConfirm" />
    <div class="modal modal-bottom cursor-pointer transition-all ease-in-out sm:modal-middle">
        <Transition name="bounce">
            <div class="modal-box" v-if="modalConfirm">
                <div class="text-center text-2xl font-bold text-error">Konfirmasi Penolakan!</div>
                <div class="my-4 text-lg">apakah anda akan benar-benar menolak pengajuan ini?</div>
                <div class="grid grid-cols-2 place-content-center gap-x-4">
                    <label for="konfirmasi" class="btn btn-md">Kembali</label>
                    <label @click="rejectedDatadiri(editKaryawan.id)" class="btn btn-error btn-md">Tolak</label>
                </div>
            </div>
        </Transition>
    </div>
</template>
