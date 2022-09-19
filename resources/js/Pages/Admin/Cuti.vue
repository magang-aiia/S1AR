<script>
import MainLayout from "@/Layouts/Main.vue";
import { Head as HeadInertia } from "@inertiajs/inertia-vue3";
import getNav from "@/Pages/Admin/NavAdmin.js";

export default {
    components: {
        MainLayout,
        HeadInertia,
    },
    data() {
        return {
            nav: getNav("pengajuan"),
        };
    },
    methods: {},
};
</script>

<template>
    <HeadInertia title="Cuti" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content">
            form permohonan cuti via admin
        </div>
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
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="hak_cuti" class="mb-2 block">Hak Cuti</label>
                <input type="text" name="hak_cuti" id="hak_cuti" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="tlh_ambil_cuti" class="mb-2 block">Cuti Telah Diambil</label>
                <input type="text" name="tlh_ambil_cuti" id="tlh_ambil_cuti" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="saldo_cuti" class="mb-2 block">Saldo Cuti</label>
                <input type="text" name="saldo_cuti" id="saldo_cuti" class="input-text" disabled />
            </div>
            <div class="col-span-6 sm:col-span-6 lg:col-span-2 lg:col-start-1 lg:row-start-1">
                <label for="jenis_cuti" class="mb-2 block">Jenis Cuti</label>
                <select name="jenis_cuti" id="jenis_cuti" class="input-text">
                    <option selected disabled>Pilih jenis cuti</option>
                    <option value="1">Cuti Tahunan</option>
                    <option value="2">Cuti Istimewa</option>
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2 lg:col-start-1 lg:row-start-2">
                <label for="tgl_awal" class="mb-2 block">Tanggal Mulai Cuti</label>
                <input type="date" name="tgl_awal" id="tgl_awal" class="input-text" />
            </div>
            <div class="col-span-6 sm:col-span-3 lg:col-span-2 lg:col-start-1 lg:row-start-3">
                <label for="tgl_akhir" class="mb-2 block">Tanggal Akhir Cuti</label>
                <input type="date" name="tgl_akhir" id="tgl_akhir" class="input-text" />
            </div>
            <div class="col-span-6 lg:col-span-4">
                <label for="nama" class="mb-2 block">Alasan</label>
                <textarea
                    rows="3"
                    class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                ></textarea>
            </div>
            <div class="col-span-6 flex items-center justify-between lg:col-span-2 lg:flex-col lg:justify-end">
                <button class="max-w-48 btn w-[calc(50%_-_.75rem)] lg:mb-3 lg:w-full">Reset</button>
                <button class="max-w-48 btn btn-primary w-[calc(50%_-_.75rem)] lg:w-full">Ajukan Data</button>
            </div>
        </div>
    </MainLayout>
</template>
