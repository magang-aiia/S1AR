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
            karyawan: {
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
        },
        data() {
            return {
                nav: [],
                errors: {},
                avatar: null,
                avatarUrl: null,
                editKaryawan: {},
                files: [],
                isMounted: false,
                isDroped: false,
            }
        },
        mounted() {
            this.nav = getNav("pengajuan", "datadiri", this.isAtasan)
            this.isMounted = true
            moment.locale("id")
        },
        methods: {
            log(data) {
                console.log(data)
            },
            changeAvatar(event) {
                this.avatar = event.target.files[0]
                this.editKaryawan.avatar = this.avatar
                this.avatarUrl = URL.createObjectURL(event.target.files[0])
            },
            changeData() {
                this.editKaryawan.avatar = this.editKaryawan.user.avatar
                this.editKaryawan.nama = this.editKaryawan.user.name
                this.editKaryawan.email = this.editKaryawan.user.email
                this.editKaryawan.npk = this.editKaryawan.user.npk
                this.editKaryawan.jabatan_id = this.editKaryawan.user.bagian.jabatan_id
                this.editKaryawan.jabatan = this.editKaryawan.user.bagian.jabatan.nama
                this.editKaryawan.bagian_id = this.editKaryawan.user.bagian_id
                this.editKaryawan.bagian = this.editKaryawan.user.bagian.nama
                this.editKaryawan.nama_kontrak = this.editKaryawan.kontrak.nama_kontrak
            },
            habisKontrak(tglGabung, lamaBulan) {
                return moment(tglGabung).add(lamaBulan, "months").format("YYYY-MM-DD")
            },
            lamaKontrak(kontrakId) {
                return this.kontrak.find((item) => item.id === kontrakId).lama_kontrak
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
                        this.avatar = null
                        this.avatarUrl = null
                    },
                })
            },
            onFileChange(e) {
                ;[...e.target.files].forEach((file) => {
                    this.files.push(file)
                })
            },
            deleteFile(index) {
                this.files.splice(index, 1)
            },
            roundSizeBytes(size) {
                return size > 1024
                    ? size > 1048576
                        ? Math.round(size / 1048576) + " MB"
                        : Math.round(size / 1024) + " KB"
                    : size + " B"
            },
            dragFile(e) {
                ;[...e.dataTransfer.files].forEach((file) => {
                    this.files.push(file)
                })
            },
            dragEnter() {
                // this.isDroped = true;
                console.log("enter")
            },
            dragLeave() {
                // this.isDroped = false;
                console.log("leave")
            },
        },
        computed: {
            uploadedFiles() {
                const data = this.files
                return data.map((file) => {
                    return {
                        isImage: file.type.startsWith("image/"),
                        name: file.name,
                        size: this.roundSizeBytes(file.size),
                        url: URL.createObjectURL(file),
                    }
                })
            },
        },
        watch: {
            isMounted() {
                this.editKaryawan = this.karyawan
                this.changeData()
            },
            karyawan: {
                deep: true,
                handler(val, oldVal) {
                    this.editKaryawan = this.karyawan
                },
            },
        },
    }
</script>

<template>
    <HeadInertia title="Data Diri" />

    <MainLayout :nav="nav">
        <div class="mb-6 flex flex-wrap items-center -md:flex-col -md:justify-center">
            <div class="relative mr-3 w-36 -md:mb-3 -md:w-48">
                <div
                    class="relative flex h-36 w-36 items-center overflow-hidden rounded-full border-4 border-gray-300 dark:border-gray-800 -md:h-48 -md:w-48"
                >
                    <img class="absolute min-h-full min-w-full blur" :src="avatarUrl" v-if="avatar" />
                    <img
                        class="absolute min-h-full min-w-full blur"
                        :src="'/assets/image/' + editKaryawan.avatar"
                        v-else
                    />
                    <img class="z-[1]" :src="avatarUrl" v-if="avatar" />
                    <img class="z-[1]" :src="'/assets/image/' + editKaryawan.avatar" v-else />
                </div>
                <label
                    class="btn btn-primary absolute -bottom-1 -right-1 z-[2] h-12 w-12 rounded-full border-4 border-base-100 p-0 hover:border-base-100"
                >
                    <box-icon name="edit" class="fill-base-content" size="sm"></box-icon>
                    <input type="file" class="hidden" @input="changeAvatar($event)" />
                </label>
            </div>
            <div class="max-w-[calc(100%_-_11rem)] -md:max-w-sm -md:text-center">
                <div class="max-w-full truncate text-2xl font-bold md:text-4xl" @click="log(files)">
                    {{ editKaryawan.nama }}
                </div>
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
                <input type="text" v-model="editKaryawan.npk" id="npk" class="input-text" disabled />
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
                <input
                    type="date"
                    v-model="editKaryawan.tgl_bergabung"
                    id="tgl_bergabung"
                    class="input-text"
                    disabled
                />
                <div class="mt-2 text-sm text-error" v-if="errors.tgl_bergabung">
                    {{ errors.tgl_bergabung }}
                </div>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="jabatan" class="mb-2 block">Jabatan</label>
                <input type="text" v-model="editKaryawan.jabatan" id="tgl_bergabung" class="input-text" disabled />
                <div class="mt-2 text-sm text-error" v-if="errors.jabatan_id">
                    {{ errors.jabatan_id }}
                </div>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="bagian" class="mb-2 block">Bagian</label>
                <input type="text" v-model="editKaryawan.bagian" id="tgl_bergabung" class="input-text" disabled />

                <div class="mt-2 text-sm text-error" v-if="errors.bagian_id">
                    {{ errors.bagian_id }}
                </div>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="kontrak_id" class="mb-2 block">Kontrak</label>
                <input type="text" v-model="editKaryawan.nama_kontrak" id="tmp_lahir" class="input-text" disabled />
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
                <input type="text" v-model="editKaryawan.gol" id="gol" class="input-text" disabled />
                <div class="mt-2 text-sm text-error" v-if="errors.gol">{{ errors.gol }}</div>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="sta_kerja" class="mb-2 block">Status Kerja</label>
                <input type="text" v-model="editKaryawan.sta_kerja" id="sta_kerja" class="input-text" disabled />
                <div class="mt-2 text-sm text-error" v-if="errors.sta_kerja">{{ errors.sta_kerja }}</div>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="sta_nikah" class="mb-2 block">Status Nikah</label>
                <input type="text" v-model="editKaryawan.sta_nikah" id="sta_nikah" class="input-text" disabled />
                <div class="mt-2 text-sm text-error" v-if="errors.sta_nikah">{{ errors.sta_nikah }}</div>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="sta_pajak" class="mb-2 block">Status Pajak</label>
                <input type="text" v-model="editKaryawan.sta_pajak" id="sta_pajak" class="input-text" disabled />
                <div class="mt-2 text-sm text-error" v-if="errors.sta_pajak">{{ errors.sta_pajak }}</div>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="no_bpjs_tk" class="mb-2 block">No. BPJS TK</label>
                <input type="text" v-model="editKaryawan.no_bpjs_tk" id="no_bpjs_tk" class="input-text" disabled />
                <div class="mt-2 text-sm text-error" v-if="errors.no_bpjs_tk">{{ errors.no_bpjs_tk }}</div>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="no_bpjs_kes" class="mb-2 block">No. BPJS Kesahatan</label>
                <input type="text" v-model="editKaryawan.no_bpjs_kes" id="no_bpjs_kes" class="input-text" disabled />
                <div class="mt-2 text-sm text-error" v-if="errors.no_bpjs_kes">{{ errors.no_bpjs_kes }}</div>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="no_dpa" class="mb-2 block">No.DPA</label>
                <input type="text" v-model="editKaryawan.no_dpa" id="no_dpa" class="input-text" disabled />
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
            <div
                class="col-span-6 !col-end-7 flex w-full flex-col flex-wrap sm:col-span-3 sm:row-span-3 sm:row-start-[13] lg:col-span-2 lg:row-start-[8] -sm:h-64"
            >
                <label
                    class="relative mb-4 flex w-full flex-1 cursor-pointer items-center justify-center overflow-hidden rounded-xl border-2 border-dashed border-base-300"
                    @dragover.prevent
                    @drop.prevent
                    @drop="dragFile"
                    @dragenter="dragEnter()"
                    @dragleave="dragLeave()"
                >
                    <div class="btn btn-primary btn-sm">
                        <box-icon name="cloud-upload" class="mr-2 fill-current"></box-icon>
                        upload file
                        <input type="file" class="hidden" multiple @change="onFileChange($event)" />
                    </div>
                    <div
                        :class="{ hidden: !isDroped }"
                        class="absolute top-0 left-0 flex h-full w-full animate-tada items-center justify-center rounded-xl bg-base-100 text-xl font-bold animate-infinite"
                    >
                        Jatuhkan file mu cuy
                    </div>
                </label>
                <div class="flex h-36 w-full flex-col">
                    <div class="text-bold mb-2 w-full">File akan diupload :</div>
                    <div class="flex-1 overflow-hidden">
                        <div class="flex w-max" v-if="uploadedFiles.length > 0" v-drag:x>
                            <template v-for="(i, index) in uploadedFiles" :key="index">
                                <div
                                    class="group relative mr-4 mb-4 h-24 w-24 overflow-hidden rounded bg-primary shadow"
                                    v-if="i.isImage"
                                >
                                    <img :src="i.url" alt="-" class="min-h-full min-w-full object-cover" />
                                    <div
                                        class="absolute top-0 left-0 hidden h-full w-full bg-black/50 p-2 group-hover:block -md:block"
                                    >
                                        <div class="truncate text-white">
                                            {{ i.name }}
                                        </div>
                                        <div class="mb-3 text-sm text-white/70">{{ i.size }}</div>
                                        <box-icon
                                            name="trash"
                                            class="cursor-pointer fill-white/80 hover:fill-white"
                                            @click="deleteFile(index)"
                                        ></box-icon>
                                    </div>
                                </div>
                                <div
                                    class="group relative mr-4 mb-4 h-24 w-24 rounded bg-base-content p-2 shadow"
                                    v-else
                                >
                                    <div class="truncate text-white">
                                        {{ i.name }}
                                    </div>
                                    <div class="mb-3 text-sm text-white/70">{{ i.size }}</div>
                                    <box-icon
                                        name="trash"
                                        class="cursor-pointer fill-white/80 hover:fill-white"
                                        @click="deleteFile(index)"
                                    ></box-icon>
                                </div>
                            </template>
                        </div>
                        <div class="flex h-full flex-col items-center justify-center" v-else>
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
                    </div>
                </div>
            </div>
            <div class="col-span-6 flex items-end justify-between sm:col-span-3 lg:col-span-2 lg:col-start-3">
                <button class="btn btn-primary w-full" @click="updateKaryawan()">Ajukan Data</button>
            </div>
        </div>
    </MainLayout>
</template>
