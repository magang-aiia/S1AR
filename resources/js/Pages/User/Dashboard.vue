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
                modalCutiTahunan: false,
                modalCutiIstimewa: false,
            }
        },
    }
</script>
@ro
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
                <label
                    for="saldo-cuti-tahunan"
                    class="group flex h-28 w-full cursor-pointer select-none flex-col overflow-hidden rounded-2xl bg-purple-500 text-center text-base-100 hover:shadow-lg dark:bg-purple-700 dark:text-base-content"
                >
                    <div class="flex flex-[1_0] flex-col justify-center text-5xl font-bold group-hover:animate-ping">
                        23
                    </div>
                    <div class="truncate rounded-b-2xl bg-purple-700 py-1 px-2 text-xl dark:bg-purple-900">
                        Saldo Cuti Tahunan
                    </div>
                </label>
                <label
                    for="saldo-cuti-istimewa"
                    class="group flex h-28 w-full cursor-pointer select-none flex-col overflow-hidden rounded-2xl bg-pink-500 text-center text-base-100 hover:shadow-lg dark:bg-pink-700 dark:text-base-content"
                >
                    <div class="flex flex-[1_0] flex-col justify-center text-5xl font-bold group-hover:animate-ping">
                        25
                    </div>
                    <div class="truncate rounded-b-2xl bg-pink-700 py-1 px-2 text-xl dark:bg-pink-900">
                        Saldo Cuti Istimewa
                    </div>
                </label>
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

    <input type="checkbox" id="saldo-cuti-tahunan" class="modal-toggle" v-model="modalCutiTahunan" />
    <label for="saldo-cuti-tahunan" class="modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out">
        <Transition name="bounce">
            <label v-if="modalCutiTahunan" for="" class="modal-box relative w-11/12 max-w-4xl">
                <label for="saldo-cuti-tahunan" class="btn btn-circle btn-sm absolute right-4 top-4">✕</label>
                <div class="mb-2 text-2xl font-bold">Saldo Cuti Tahunan</div>
                <div class="mb-2">berikut saldo cuti tahunan anda :</div>
                <div class="overflow-x-auto">
                    <table class="table-compact table w-full">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Rekening</th>
                                <th>Hak Cuti</th>
                                <th>Debit</th>
                                <th>Saldo</th>
                                <th>Tenggat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>rekcut78922203708</td>
                                <td>12</td>
                                <td>4</td>
                                <td>8</td>
                                <td>22 Mei 2021</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>rekcut78922205901</td>
                                <td>12</td>
                                <td>9</td>
                                <td>3</td>
                                <td>22 November 2022</td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>rekcut78922203748</td>
                                <td>12</td>
                                <td>0</td>
                                <td>12</td>
                                <td>22 Mei 2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </label>
        </Transition>
    </label>

    <input type="checkbox" id="saldo-cuti-istimewa" class="modal-toggle" v-model="modalCutiIstimewa" />
    <label for="saldo-cuti-istimewa" class="modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out">
        <Transition name="bounce">
            <label v-if="modalCutiIstimewa" for="" class="modal-box relative w-11/12 max-w-4xl">
                <label for="saldo-cuti-istimewa" class="btn btn-circle btn-sm absolute right-4 top-4">✕</label>
                <div class="mb-2 text-2xl font-bold">Saldo Cuti Istimewa</div>
                <div class="mb-2">berikut saldo cuti istimewa anda :</div>
                <div class="overflow-x-auto">
                    <table class="table-compact table w-full">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Rekening</th>
                                <th>Hak Cuti</th>
                                <th>Debit</th>
                                <th>Saldo</th>
                                <th>Tenggat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>rekcus78922203708</td>
                                <td>30</td>
                                <td>5</td>
                                <td>25</td>
                                <td>22 Mei 2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </label>
        </Transition>
    </label>
</template>
