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
                nav: getNav(),
                sortBy: "tanggal",
                sortDesc: true,
                search: "",
                slice: 5,
                page: 1,
                isMounted: false,
            }
        },
    }
</script>

<template>
    <HeadInertia title="Notification" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content">Notifikasi</div>
        <div class="mb-4 grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-2">
                <label class="mr-3 block">Urutkan berdasar : </label>
                <select class="w-full flex-1 rounded-lg bg-base-100">
                    <option>Terbaru</option>
                    <option>Terlama</option>
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
    </MainLayout>
</template>
