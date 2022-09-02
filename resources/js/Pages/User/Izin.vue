<script>
    import MainLayout from "@/Layouts/Main.vue"
    import { Head as HeadInertia } from "@inertiajs/inertia-vue3"
    import getNav from "@/Pages/User/NavUser.js"

    export default {
        components: {
            MainLayout,
            HeadInertia,
        },
        data() {
            return {
                nav: getNav("pengajuan", "izin"),
            }
        },
    }
</script>

<template>
    <HeadInertia title="Izin" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content">form permohonan izin</div>
        <div class="mb-4">yang bertanda tangan dibawah ini :</div>
        <div class="grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="name" class="mb-2 block">Nama</label>
                <input type="text" name="name" id="name" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="npk" class="mb-2 block">NPK</label>
                <input type="text" name="npk" id="npk" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="departemen" class="mb-2 block">Bagian</label>
                <input type="text" name="departemen" id="departemen" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-6 lg:col-span-2 lg:col-start-1 lg:row-start-1">
                <label for="jenis_izin" class="mb-2 block">Jenis Izin</label>
                <select name="jenis_izin" id="jenis_izin" class="input-text">
                    <option selected disabled>Pilih jenis izin</option>
                    <option value="1">Izin Mendapat Upah</option>
                    <option value="2">Izin Tidak dapat Upah</option>
                    <option value="3">Izin Sakit</option>
                    <option value="4">Izin Dinas Luar</option>
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2 lg:col-start-1 lg:row-start-2">
                <label for="tgl_awal" class="mb-2 block">Tanggal Mulai Izin</label>
                <input type="date" name="tgl_awal" id="tgl_awal" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2 lg:col-start-1 lg:row-start-3">
                <label for="tgl_akhir" class="mb-2 block">Tanggal Akhir Izin</label>
                <input type="date" name="tgl_akhir" id="tgl_akhir" class="input-text" />
            </div>

            <div class="col-span-6 lg:col-span-4">
                <label for="nama" class="mb-2 block">Alasan</label>
                <textarea
                    rows="3"
                    class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                ></textarea>
            </div>

            <div
                class="col-span-6 h-48 w-full rounded bg-primary lg:col-span-2 lg:col-end-7 lg:row-span-3 lg:row-start-1 lg:h-auto"
            ></div>

            <div class="col-span-6 flex items-center justify-between lg:col-span-2 lg:flex-col lg:justify-end">
                <button class="max-w-48 btn w-[calc(50%_-_.75rem)] lg:mb-3 lg:w-full">Reset</button>
                <button class="max-w-48 btn btn-primary w-[calc(50%_-_.75rem)] lg:w-full">Ajukan Data</button>
            </div>
        </div>
    </MainLayout>
</template>
