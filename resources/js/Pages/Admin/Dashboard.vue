<script>
import MainLayout from "@/Layouts/Main.vue";
import { Head as HeadInertia, Link as LinkInertia } from "@inertiajs/inertia-vue3";
import getNav from "@/Pages/Admin/NavAdmin.js";
import VueApexCharts from "vue3-apexcharts";

export default {
    components: {
        MainLayout,
        HeadInertia,
        LinkInertia,
        apexchart: VueApexCharts,
    },
    data() {
        return {
            nav: getNav("dashboard"),
            isMounted: false,
            series: [
                {
                    name: "Cuti",
                    data: [31, 40, 28, 51, 42, 67, 90],
                },
                {
                    name: "Izin",
                    data: [11, 32, 45, 32, 34, 52, 41],
                },
                {
                    name: "Data diri",
                    data: [16, 9, 21, 18, 29, 36, 32],
                },
            ],
            series2: [1367, 128, 23],
            chartOptions: {
                chart: {
                    type: "area",
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    curve: "smooth",
                },
                xaxis: {
                    type: "datetime",
                    categories: [
                        "2022-01-19",
                        "2022-02-20",
                        "2022-03-21",
                        "2022-04-22",
                        "2022-05-23",
                        "2022-06-24",
                        "2022-07-25",
                    ],
                },
                tooltip: {
                    x: {
                        format: "dd MMMM yyyy",
                    },
                },
            },
            chartOptions2: {
                chart: {
                    type: "donut",
                },
                colors: ["#36d399", "#f87272", "#fbbd23"],
                dataLabels: {
                    enabled: true,
                },
                labels: ["Ajuan Disetujui", "Ajuan Ditolak", "Ajuan Menunggu"],
            },
        };
    },
    mounted() {
        this.isMounted = true;
    },
    unmounted() {
        this.isMounted = false;
    },
    computed: {
        theme() {
            if (this.isMounted) {
                if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
                    return "dark";
                } else {
                    return "light";
                }
            } else return null;
        },
        chartOptionsComputed() {
            const x = this.chartOptions;
            x.theme = { mode: this.theme };
            return x;
        },
        chartOptions2Computed() {
            const x = this.chartOptions2;
            x.theme = { mode: this.theme };
            return x;
        },
    },
};
</script>

<template>
    <HeadInertia title="Dashboard" />

    <MainLayout :nav="nav">
        <div class="flex flex-wrap">
            <div class="mb-6 grid w-full grid-cols-4 place-items-center gap-6 md:ml-2 -md:w-full">
                <LinkInertia
                    :href="route('admin.cuzia')"
                    class="col-span-4 flex h-28 w-full flex-col rounded-2xl bg-purple-500 text-center text-base-100 dark:bg-purple-700 dark:text-base-content sm:col-span-2 lg:col-auto"
                >
                    <div class="flex flex-[1_0] flex-col justify-center text-5xl font-bold">1346</div>
                    <div class="rounded-b-2xl bg-purple-700 py-1 text-xl dark:bg-purple-900">Total Ajuan Data diri</div>
                </LinkInertia>
                <LinkInertia
                    :href="route('admin.cuzia')"
                    class="col-span-4 flex h-28 w-full flex-col rounded-2xl bg-pink-500 text-center text-base-100 dark:bg-pink-700 dark:text-base-content sm:col-span-2 lg:col-auto"
                >
                    <div class="flex flex-[1_0] flex-col justify-center text-5xl font-bold">674</div>
                    <div class="rounded-b-2xl bg-pink-700 py-1 text-xl dark:bg-pink-900">Total Ajuan Cuti</div>
                </LinkInertia>
                <LinkInertia
                    :href="route('admin.cuzia')"
                    class="col-span-4 flex h-28 w-full flex-col rounded-2xl bg-teal-500 text-center text-base-100 dark:bg-teal-700 dark:text-base-content sm:col-span-2 lg:col-auto"
                >
                    <div class="flex flex-[1_0] flex-col justify-center text-5xl font-bold">498</div>
                    <div class="rounded-b-2xl bg-teal-700 py-1 text-xl dark:bg-teal-900">Total Ajuan Izin</div>
                </LinkInertia>
                <LinkInertia
                    :href="route('admin.cuzia')"
                    class="col-span-4 flex h-28 w-full flex-col rounded-2xl bg-orange-500 text-center text-base-100 dark:bg-orange-700 dark:text-base-content sm:col-span-2 lg:col-auto"
                >
                    <div class="flex flex-[1_0] flex-col justify-center text-5xl font-bold">174</div>
                    <div class="rounded-b-2xl bg-orange-700 py-1 text-xl dark:bg-orange-900">Total Ajuan Datadiri</div>
                </LinkInertia>
            </div>
            <div class="grid w-full gap-6 md:grid-cols-6 lg:grid-cols-11 -md:overflow-auto">
                <apexchart
                    :options="chartOptionsComputed"
                    :series="series"
                    class="md:col-span-3 lg:col-span-6"
                ></apexchart>
                <apexchart
                    :options="chartOptions2Computed"
                    :series="series2"
                    class="md:col-span-3 lg:col-span-5"
                ></apexchart>
            </div>
        </div>
    </MainLayout>
</template>
