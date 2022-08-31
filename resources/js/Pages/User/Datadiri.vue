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
        <div class="mb-6 flex flex-wrap items-center -md:flex-col -md:justify-center">
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
        <div class="grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 sm:col-span-3 lg:col-span-2" v-for="i in 23" :key="i">
                <label for="nama" class="mb-2 block">Nama Lengkap</label>
                <input
                    type="text"
                    name="nama"
                    id="nama"
                    value="Budi Suherman"
                    class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                    :disabled="randomBool()"
                />
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
