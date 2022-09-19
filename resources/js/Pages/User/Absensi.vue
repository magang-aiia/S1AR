<script>
import MainLayout from "@/Layouts/Main.vue";
import { Head as HeadInertia } from "@inertiajs/inertia-vue3";
import getNav from "@/Pages/User/NavUser.js";
import moment from "moment";

export default {
    components: {
        MainLayout,
        HeadInertia,
    },
    props: {
        isAtasan: Boolean,
    },
    data() {
        return {
            nav: [],
            data: [
                {
                    shift: "Shift 1",
                    absenAwal: "08:00",
                    absenAkhir: "16:00",
                    tanggal: "2021-08-01",
                    status: "Hadir",
                },
                {
                    shift: "Shift 2",
                    absenAwal: "16:00",
                    absenAkhir: "00:00",
                    tanggal: "2021-08-01",
                    status: "Hadir",
                },
                {
                    shift: "Shift 3",
                    absenAwal: "00:00",
                    absenAkhir: "08:00",
                    tanggal: "2021-08-01",
                    status: "Hadir",
                },
                {
                    shift: "Shift 1",
                    absenAwal: "08:00",
                    absenAkhir: "16:00",
                    tanggal: "2021-08-02",
                    status: "Hadir",
                },
                {
                    shift: "Shift 2",
                    absenAwal: "16:00",
                    absenAkhir: "00:00",
                    tanggal: "2021-08-02",
                    status: "Hadir",
                },
                {
                    shift: "Shift 1",
                    absenAwal: "-",
                    absenAkhir: "-",
                    tanggal: "2021-08-02",
                    status: "Alpha",
                },
                {
                    shift: "Shift 3",
                    absenAwal: "00:00",
                    absenAkhir: "08:00",
                    tanggal: "2021-08-02",
                    status: "Hadir",
                },
                {
                    shift: "Shift 1",
                    absenAwal: "08:10",
                    absenAkhir: "16:00",
                    tanggal: "2021-08-03",
                    status: "Terlambat",
                },
                {
                    shift: "Shift 2",
                    absenAwal: "16:00",
                    absenAkhir: "00:00",
                    tanggal: "2021-08-03",
                    status: "Hadir",
                },
                {
                    shift: "Shift 3",
                    absenAwal: "00:00",
                    absenAkhir: "08:00",
                    tanggal: "2021-08-03",
                    status: "Hadir",
                },
                {
                    shift: "Shift 1",
                    absenAwal: "08:00",
                    absenAkhir: "16:00",
                    tanggal: "2021-08-04",
                    status: "Hadir",
                },
                {
                    shift: "Shift 2",
                    absenAwal: "16:30",
                    absenAkhir: "00:00",
                    tanggal: "2021-08-04",
                    status: "Terlambat",
                },
                {
                    shift: "Shift 3",
                    absenAwal: "00:09",
                    absenAkhir: "08:00",
                    tanggal: "2021-08-04",
                    status: "Terlambat",
                },
                {
                    shift: "Shift 1",
                    absenAwal: "08:00",
                    absenAkhir: "16:00",
                    tanggal: "2021-08-05",
                    status: "Hadir",
                },
                {
                    shift: "Shift 2",
                    absenAwal: "16:00",
                    absenAkhir: "00:00",
                    tanggal: "2021-08-05",
                    status: "Hadir",
                },
                {
                    shift: "Shift 3",
                    absenAwal: "00:00",
                    absenAkhir: "08:00",
                    tanggal: "2021-08-05",
                    status: "Hadir",
                },
                {
                    shift: "Shift 1",
                    absenAwal: "08:00",
                    absenAkhir: "16:00",
                    tanggal: "2021-08-06",
                    status: "Hadir",
                },
                {
                    shift: "Shift 2",
                    absenAwal: "16:08",
                    absenAkhir: "00:00",
                    tanggal: "2021-08-06",
                    status: "Terlambat",
                },
                {
                    shift: "Shift 3",
                    absenAwal: "-",
                    absenAkhir: "-",
                    tanggal: "2021-08-06",
                    status: "Alpha",
                },
                {
                    shift: "Shift 1",
                    absenAwal: "08:00",
                    absenAkhir: "16:00",
                    tanggal: "2021-07-31",
                    status: "Hadir",
                },
                {
                    shift: "Shift 2",
                    absenAwal: "16:00",
                    absenAkhir: "00:00",
                    tanggal: "2021-07-31",
                    status: "Hadir",
                },
                {
                    shift: "Shift 3",
                    absenAwal: "00:00",
                    absenAkhir: "08:00",
                    tanggal: "2021-07-31",
                    status: "Hadir",
                },
            ],
            isMounted: false,
            sortBy: "tanggal",
            sortDesc: true,
            search: "",
            slice: 10,
            page: 1,
        };
    },
    mounted() {
        this.isMounted = true;
        this.nav = getNav("absensi", undefined, this.isAtasan);
    },
    unmounted() {
        this.isMounted = false;
    },
    methods: {
        sorted(by) {
            if (this.sortBy === by) {
                this.sortDesc = !this.sortDesc;
            } else {
                this.sortBy = by;
            }
        },
        log(data) {
            console.log(data);
        },
    },
    computed: {
        transformData() {
            return this.data.map((data) => {
                data.tanggalSemantic = moment(data.tanggal).format("DD MMMM YYYY");
                return data;
            });
        },
        searchData() {
            return this.transformData.filter((data) => {
                if (this.isMounted)
                    return Object.keys(data).some((key) => {
                        return String(data[key]).toLowerCase().includes(this.search.toLowerCase());
                    });
                else return data;
            });
        },
        dataSorted() {
            const data = this.searchData.slice();
            return data
                .sort((a, b) => {
                    if (this.sortDesc) {
                        return a[this.sortBy] < b[this.sortBy] ? 1 : -1;
                    } else {
                        return a[this.sortBy] > b[this.sortBy] ? 1 : -1;
                    }
                })
                .map((data, index) => {
                    data.index = index + 1;
                    return data;
                });
        },
        totalPage() {
            return Math.ceil(this.dataSorted.length / this.slice);
        },
        dataByPage() {
            return this.dataSorted.slice((this.page - 1) * this.slice, this.page * this.slice);
        },
        paginateIndex() {
            const index = [];
            if (this.totalPage < 7)
                for (let i = 1; i <= this.totalPage; i++) {
                    index.push(i);
                }
            else {
                if (this.page < 5) {
                    for (let i = 1; i <= 5; i++) {
                        index.push(i);
                    }
                    index.push("...");
                    index.push(this.totalPage);
                } else if (this.page > this.totalPage - 4) {
                    index.push(1);
                    index.push("...");
                    for (let i = this.totalPage - 4; i <= this.totalPage; i++) {
                        index.push(i);
                    }
                } else {
                    index.push(1);
                    index.push("...");
                    for (let i = this.page - 1; i <= this.page + 1; i++) {
                        index.push(i);
                    }
                    index.push("...");
                    index.push(this.totalPage);
                }
            }
            return index;
        },
    },
    watch: {
        search() {
            this.page = 1;
        },
        slice() {
            if (this.page > this.totalPage) this.page = this.totalPage;
        },
    },
};
</script>

<template>
    <HeadInertia title="Absensi" />

    <MainLayout :nav="nav">
        <div class="py-4 text-center text-3xl font-black uppercase text-base-content">absensi</div>
        <div class="mb-4 grid grid-cols-6 gap-x-6 gap-y-4">
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-3 lg:col-auto">
                <label class="mr-3 block">Tampilan baris : </label>
                <input type="number" v-model="slice" class="w-full flex-1 rounded-lg bg-base-100" />
            </div>
            <div class="col-span-6 flex flex-wrap items-center sm:col-span-3 lg:col-auto">
                <label class="mr-3 block">Bulan : </label>
                <select class="w-full flex-1 rounded-lg bg-base-100">
                    <option>Juli</option>
                    <option>Agustus</option>
                </select>
            </div>
            <div class="col-span-6 !col-end-7 flex items-end lg:col-span-2">
                <input
                    type="text"
                    name="search"
                    id="search"
                    placeholder="Cari"
                    v-model="search"
                    class="block w-full rounded-lg bg-base-100 disabled:cursor-not-allowed disabled:bg-base-300 dark:disabled:bg-black/70"
                />
            </div>
        </div>

        <div class="mb-4 overflow-x-auto">
            <table class="table-compact table w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th class="sticky left-6 cursor-pointer select-none" @click="sorted('shift')">
                            <div class="flex items-center">
                                Shift
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'shift'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'shift'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('absenAwal')">
                            <div class="flex items-center">
                                Absen Awal
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'absenAwal'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'absenAwal'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('absenAkhir')">
                            <div class="flex items-center">
                                Absen Pulang
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'absenAkhir'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'absenAkhir'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('tanggal')">
                            <div class="flex items-center">
                                Tanggal
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'tanggal'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'tanggal'"
                                ></box-icon>
                            </div>
                        </th>
                        <th class="cursor-pointer select-none" @click="sorted('status')">
                            <div class="flex items-center">
                                Status
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-up"
                                    v-if="!sortDesc && sortBy === 'status'"
                                ></box-icon>
                                <box-icon
                                    class="ml-2 fill-current"
                                    name="caret-down"
                                    v-if="sortDesc && sortBy === 'status'"
                                ></box-icon>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="absen in dataByPage" :key="absen.index">
                        <th>{{ absen.index }}</th>
                        <td class="sticky left-7">{{ absen.shift }}</td>
                        <td>{{ absen.absenAwal }}</td>
                        <td>{{ absen.absenAkhir }}</td>
                        <td>{{ absen.tanggalSemantic }}</td>
                        <td>{{ absen.status }}</td>
                    </tr>
                </tbody>
            </table>
            <div v-if="dataByPage.length < 1" class="w-full py-4 text-center font-bold">Tidak Ada Data</div>
        </div>

        <div class="flex justify-center" v-if="dataByPage.length > 0">
            <div class="btn-group">
                <button class="btn" :class="{ 'btn-disabled': page === 1 }" @click="page !== 1 ? page-- : ''">«</button>
                <button
                    class="btn"
                    :class="{ 'btn-active': i === page }"
                    v-for="i in paginateIndex"
                    :key="i"
                    @click="i === '...' ? (i > page ? page-- : page++) : (page = i)"
                >
                    {{ i }}
                </button>
                <button
                    class="btn"
                    :class="{ 'btn-disabled': page === totalPage }"
                    @click="page !== totalPage ? page++ : ''"
                >
                    »
                </button>
            </div>
        </div>
    </MainLayout>
</template>
