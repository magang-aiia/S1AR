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
                nav: getNav("pengajuan", "cuti"),
            }
        },
        methods: {},
    }
</script>

<template>
    <HeadInertia title="Cuti" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content">form permohonan cuti</div>
        <div class="mb-4">yang bertanda tangan dibawah ini :</div>
        <div class="grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 sm:col-span-3 lg:col-span-2" v-for="i in 6" :key="i">
                <label for="nama" class="mb-2 block">Nama Lengkap</label>
                <input
                    type="text"
                    name="nama"
                    id="nama"
                    value="Budi Suherman"
                    class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                    disabled
                />
            </div>
            <div
                class="col-span-6 sm:col-span-3 lg:col-span-2 lg:col-start-1"
                :class="{
                    'sm:col-span-6 lg:row-start-1': i === 1,
                    'lg:row-start-2': i === 2,
                    'lg:row-start-3': i === 3,
                }"
                v-for="i in 3"
                :key="i"
            >
                <label for="nama" class="mb-2 block">Nama</label>
                <input
                    type="text"
                    name="nama"
                    id="nama"
                    value="Budi Suherman"
                    class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                />
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
