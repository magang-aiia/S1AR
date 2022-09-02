<script>
    import MainLayout from "@/Layouts/Main.vue"
    import { Head as HeadInertia } from "@inertiajs/inertia-vue3"
    import getNav from "@/Pages/Admin/NavAdmin.js"

    export default {
        components: {
            MainLayout,
            HeadInertia,
        },
        data() {
            return {
                nav: getNav("pengajuan", "datadiri"),
            }
        },
        methods: {
            randomBool() {
                const data = Math.random() >= 0.5
                console.log(data)
                return data
            },
        },
    }
</script>

<template>
    <HeadInertia title="Data Diri" />

    <MainLayout :nav="nav">
        <div class="flex flex-wrap-reverse items-center lg:flex-wrap">
            <div class="mb-6 flex w-full flex-wrap items-center lg:w-3/4 -md:flex-col -md:justify-center">
                <div
                    class="mr-3 w-36 overflow-hidden rounded-full border-4 border-gray-300 dark:border-gray-800 -md:mb-3 -md:w-48"
                >
                    <img src="/img/avatar.jpg" />
                </div>
                <div class="max-w-[calc(100%_-_11rem)] -md:max-w-sm -md:text-center">
                    <div class="max-w-full truncate text-2xl font-bold md:text-4xl">Budi Suherman</div>
                    <div class="text-md max-w-full truncate opacity-60 md:text-lg">budi.suherman@aiia.co.id</div>
                </div>
            </div>
            <div class="w-full lg:w-1/4">
                <div class="py-4 text-center text-3xl font-black uppercase text-base-content">Data diri via admin</div>
            </div>
        </div>

        <div class="grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="name" class="mb-2 block">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="email" class="mb-2 block">Email</label>
                <input type="email" name="email" id="email" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="npk" class="mb-2 block">NPK</label>
                <input type="text" name="npk" id="npk" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="no_hp" class="mb-2 block">No. Hp</label>
                <input type="text" name="no_hp" id="no_hp" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="tmp_lahir" class="mb-2 block">Tempat Lahir</label>
                <input type="text" name="tmp_lahir" id="tmp_lahir" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="tgl_lahir" class="mb-2 block">Tanggal Lahir</label>
                <input type="text" name="tgl_lahir" id="tgl_lahir" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="departemen" class="mb-2 block">Departemen</label>
                <input type="text" name="departemen" id="departemen" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="gol" class="mb-2 block">Golongan</label>
                <input type="text" name="gol" id="gol" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="sta_kerja" class="mb-2 block">Status Kerja</label>
                <input type="text" name="sta_kerja" id="sta_kerja" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="sta_nikah" class="mb-2 block">Status Nikah</label>
                <input type="text" name="sta_nikah" id="sta_nikah" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="sta_pajak" class="mb-2 block">Status Pajak</label>
                <input type="text" name="sta_pajak" id="sta_pajak" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="no_bpjs_tk" class="mb-2 block">No. BPJS TK</label>
                <input type="text" name="no_bpjs_tk" id="no_bpjs_tk" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="no_bpjs_kes" class="mb-2 block">No. BPJS Kesahatan</label>
                <input type="text" name="no_bpjs_kes" id="no_bpjs_kes" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="no_dpa" class="mb-2 block">No.DPA</label>
                <input type="text" name="no_dpa" id="no_dpa" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="no_npwp" class="mb-2 block">No. NPWP</label>
                <input type="text" name="no_npwp" id="no_npwp" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="no_ktp" class="mb-2 block">No. KTP</label>
                <input type="text" name="no_ktp" id="no_ktp" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="alamat_dom" class="mb-2 block">Alamat Domisili</label>
                <input type="text" name="alamat_dom" id="alamat_dom" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="alamat_ktp" class="mb-2 block">Alamat KTP</label>
                <input type="text" name="alamat_ktp" id="alamat_ktp" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="nama_istri" class="mb-2 block">Nama Istri</label>
                <input type="text" name="nama_istri" id="nama_istri" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="jml_anak" class="mb-2 block">Jumlah Anak</label>
                <input type="text" name="jml_anak" id="jml_anak" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="nama_anak_1" class="mb-2 block">Nama Anak Ke 1</label>
                <input type="text" name="nama_anak_1" id="nama_anak_1" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="nama_anak_2" class="mb-2 block">Nama Anak Ke 2</label>
                <input type="text" name="nama_anak_2" id="nama_anak_2" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="nama_anak_3" class="mb-3 block">Nama Anak Ke 3</label>
                <input type="text" name="nama_anak_3" id="nama_anak_3" class="input-text" />
            </div>
            <div
                class="col-span-6 !col-end-7 w-full rounded bg-primary sm:col-span-3 sm:row-span-3 sm:row-start-[11] lg:col-span-2 lg:row-start-6 -sm:h-48"
            ></div>
            <div class="col-span-6 flex items-end justify-between lg:col-span-2">
                <button class="max-w-48 btn w-[calc(50%_-_.75rem)]">Reset</button>
                <button class="max-w-48 btn btn-primary w-[calc(50%_-_.75rem)]">Ajukan Data</button>
            </div>
        </div>
    </MainLayout>
</template>
