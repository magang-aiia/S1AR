<script setup>
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeCheckbox from "@/Components/Checkbox.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const route = window.route;

const form = useForm({
    npk: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Login" />
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row">
            <div class="mx-5 text-center lg:w-[50vw] lg:text-right">
                <h1 class="text-5xl font-bold">Login S1AR!</h1>
                <p class="py-6">
                    S1AR adalah Sistem 1 Atap HR untuk memudahkan karyawan AIIA mengurus administrasi terkait HR dengan
                    lebih cepat, ringkas dan terdigitalisasi untuk transformasi era Revolusi Industri 4.0
                </p>
            </div>
            <div class="card w-full max-w-sm flex-shrink-0 bg-base-100 shadow-2xl">
                <form @submit.prevent="submit" class="card-body">
                    <BreezeValidationErrors class="mb-2" />

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">NPK</span>
                        </label>
                        <input
                            type="text"
                            placeholder="npk"
                            v-model="form.npk"
                            class="input input-bordered"
                            required
                            autofocus
                        />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input
                            type="password"
                            placeholder="password"
                            v-model="form.password"
                            class="input input-bordered"
                            required
                        />
                    </div>
                    <div class="mt-4 block">
                        <label class="flex items-center">
                            <BreezeCheckbox name="remember" v-model:checked="form.remember" />
                            <span class="ml-2 text-sm text-gray-600">Simpan info login</span>
                        </label>
                    </div>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
