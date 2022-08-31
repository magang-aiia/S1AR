<script>
    import MainLayout from "@/Layouts/Main.vue"
    import { Head as HeadInertia, Link as LinkInertia } from "@inertiajs/inertia-vue3"
    import getNav from "@/Pages/User/NavUser.js"

    export default {
        components: {
            MainLayout,
            HeadInertia,
            LinkInertia,
        },
        data() {
            return {
                nav: getNav("dashboard"),
            }
        },
    }
</script>

<template>
    <HeadInertia title="Dashboard" />

    <MainLayout :nav="nav">
        <div class="flex flex-wrap">
            <div class="mb-6 w-[calc(50%_-_0.5rem)] md:mr-2 -md:w-full">
                <div class="mb-3 w-full text-3xl font-bold">S1AR!</div>
                <div class="w-full">
                    S1AR adalah Sistem 1 Atap HR untuk memudahkan karyawan AIIA mengurus administrasi terkait HR dengan
                    lebih cepat, ringkas dan terdigitalisasi untuk transformasi era Revolusi Industri 4.0
                </div>
            </div>
            <div class="mb-6 grid w-[calc(50%_-_0.5rem)] grid-cols-2 place-items-center gap-x-6 md:ml-2 -md:w-full">
                <div
                    class="flex h-28 w-full flex-col rounded-2xl bg-purple-500 text-center text-base-100 dark:bg-purple-700 dark:text-base-content"
                >
                    <div class="flex flex-[1_0] flex-col justify-center text-5xl font-bold">12</div>
                    <div class="rounded-b-2xl bg-purple-700 py-1 text-xl dark:bg-purple-900">Cuti Tahunan</div>
                </div>
                <div
                    class="flex h-28 w-full flex-col rounded-2xl bg-pink-500 text-center text-base-100 dark:bg-pink-700 dark:text-base-content"
                >
                    <div class="flex flex-[1_0] flex-col justify-center text-5xl font-bold">6</div>
                    <div class="rounded-b-2xl bg-pink-700 py-1 text-xl dark:bg-pink-900">Cuti Istimewa</div>
                </div>
            </div>
            <div class="grid w-full grid-cols-6 gap-6">
                <LinkInertia
                    :href="route('datadiri')"
                    class="group relative col-span-2 h-60 w-full overflow-hidden rounded-2xl shadow-lg hover:shadow-lg -lg:col-span-6"
                >
                    <img
                        src="/img/datadiri.jpg"
                        alt="datadiri"
                        class="absolute top-1/2 left-1/2 min-h-full min-w-full -translate-x-1/2 -translate-y-1/2 object-cover transition-all ease-in-out group-hover:scale-125"
                    />
                    <div
                        class="relative flex h-full w-full items-end justify-center bg-black/50 transition-all ease-in-out group-hover:bg-black/20"
                    >
                        <div
                            class="flex h-11 w-full items-center justify-between bg-emerald-500/60 py-2 px-3 text-xl font-bold text-emerald-900 transition-all ease-in-out group-hover:h-16"
                        >
                            <span>Ajukan Data Diri</span>
                            <box-icon name="chevron-right" class="fill-current"></box-icon>
                        </div>
                    </div>
                </LinkInertia>
                <LinkInertia
                    :href="route('cuti')"
                    class="group relative col-span-2 h-60 w-full overflow-hidden rounded-2xl shadow-lg hover:shadow-lg -lg:col-span-3 -sm:col-span-6"
                >
                    <img
                        src="/img/cuti.jpg"
                        alt="cuti"
                        class="absolute top-1/2 left-1/2 min-h-full min-w-full -translate-x-1/2 -translate-y-1/2 object-cover transition-all ease-in-out group-hover:scale-125"
                    />
                    <div
                        class="relative flex h-full w-full items-end justify-center bg-black/50 transition-all ease-in-out group-hover:bg-black/20"
                    >
                        <div
                            class="flex h-11 w-full items-center justify-between bg-sky-500/60 py-2 px-3 text-xl font-bold text-sky-900 transition-all ease-in-out group-hover:h-16"
                        >
                            <span>Ajukan Cuti</span>
                            <box-icon name="chevron-right" class="fill-current"></box-icon>
                        </div>
                    </div>
                </LinkInertia>
                <LinkInertia
                    :href="route('izin')"
                    class="group relative col-span-2 h-60 w-full overflow-hidden rounded-2xl shadow-lg hover:shadow-lg -lg:col-span-3 -sm:col-span-6"
                >
                    <img
                        src="/img/izin.jpg"
                        alt="izin"
                        class="absolute top-1/2 left-1/2 min-h-full min-w-full -translate-x-1/2 -translate-y-1/2 object-cover transition-all ease-in-out group-hover:scale-125"
                    />
                    <div
                        class="relative flex h-full w-full items-end justify-center bg-black/50 transition-all ease-in-out group-hover:bg-black/20"
                    >
                        <div
                            class="flex h-11 w-full items-center justify-between bg-amber-500/60 py-2 px-3 text-xl font-bold text-amber-900 transition-all ease-in-out group-hover:h-16"
                        >
                            <span>Ajukan Izin</span>
                            <box-icon name="chevron-right" class="fill-current"></box-icon>
                        </div>
                    </div>
                </LinkInertia>
            </div>
        </div>
    </MainLayout>
</template>
