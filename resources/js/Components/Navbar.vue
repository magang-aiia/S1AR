<script setup>
    import { Link, useForm } from "@inertiajs/inertia-vue3"
    import { ref } from "vue"

    defineProps({
        nav: {
            type: Array,
            default: null,
        },
        sidebar: {
            type: Boolean,
            default: false,
        },
    })

    const route = window.route

    const modalpass = ref(false)

    const form = useForm({
        old_password: "",
        new_password: "",
        confirm_password: "",
    })

    const submit = () => {
        console.log(form.old_password)
        console.log(form.new_password)
        console.log(form.confirm_password)
        form.reset("old_password")
        form.reset("new_password")
        form.reset("confirm_password")
        modalpass.value = false
    }
</script>

<template>
    <div class="navbar mb-3 rounded-xl bg-base-100 shadow-lg" v-if="!sidebar">
        <div class="navbar-start">
            <label for="sidedrawer" class="btn btn-ghost btn-square lg:hidden">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </label>
            <Link
                :href="route('root')"
                class="btn btn-ghost hidden text-xl font-black normal-case lg:inline-flex"
                v-if="$slots.brand"
            >
                <slot name="brand" />
            </Link>
        </div>
        <div class="navbar-center flex">
            <Link
                :href="route('root')"
                class="btn btn-ghost text-xl font-black normal-case lg:hidden"
                v-if="$slots.brand"
            >
                <slot name="brand" />
            </Link>
            <ul class="menu menu-horizontal hidden p-0 lg:inline-flex" v-if="nav != null">
                <template v-for="navitem in nav" :key="navitem.name">
                    <li v-if="navitem.child.length > 0" tabindex="0">
                        <a :class="{ 'bg-primary hover:bg-primary/75': navitem.active }">
                            <box-icon :type="navitem.iconType" :name="navitem.icon" class="fill-current"></box-icon>
                            {{ navitem.name }}
                            <svg
                                class="fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                            >
                                <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                            </svg>
                        </a>
                        <ul class="bg-base-100 p-2 shadow">
                            <li v-for="navchild in navitem.child" :key="navchild.name">
                                <Link
                                    :href="navchild.to != null ? route(navchild.to) : '#'"
                                    :class="{ 'bg-primary hover:bg-primary/75': navchild.active }"
                                    >{{ navchild.name }}</Link
                                >
                            </li>
                        </ul>
                    </li>
                    <li v-else>
                        <Link
                            :href="navitem.to != null ? route(navitem.to) : '#'"
                            :class="{ 'bg-primary hover:bg-primary/75': navitem.active }"
                        >
                            <box-icon :type="navitem.iconType" :name="navitem.icon" class="fill-current"></box-icon>
                            {{ navitem.name }}
                        </Link>
                    </li>
                </template>
            </ul>
        </div>
        <div class="navbar-end">
            <Link
                :href="route('notification')"
                class="btn btn-ghost btn-circle mr-3"
                :class="{ 'bg-primary': route().current('notification') }"
            >
                <div class="indicator">
                    <box-icon type="regular" name="bell" class="fill-current"></box-icon>
                    <span
                        class="badge indicator-item badge-xs text-base-100"
                        :class="{
                            'badge-info': route().current('notification'),
                            'badge-primary': !route().current('notification'),
                        }"
                        >10</span
                    >
                </div>
            </Link>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="avatar btn btn-ghost btn-circle mr-2">
                    <div class="w-10 rounded-full">
                        <img src="/img/avatar.jpg" />
                    </div>
                </label>
                <ul
                    tabindex="0"
                    class="dropdown-content menu rounded-box menu-compact mt-3 w-52 bg-base-100 p-2 shadow"
                >
                    <li class="py-3 px-4 text-xs text-base-content">
                        {{ $page.props.auth.user.name }}
                    </li>
                    <li>
                        <label for="changepass"> Ubah Password </label>
                    </li>
                    <li><Link :href="route('logout')" method="post" as="button">Logout</Link></li>
                </ul>
            </div>
        </div>
    </div>
    <ul class="menu w-80 overflow-y-auto bg-base-100 p-4" v-else>
        <template v-for="navitem in nav" :key="navitem.name">
            <li v-if="navitem.child.length > 0">
                <a
                    href="#"
                    @click="navitem.active = !navitem.active"
                    :class="{ 'bg-primary hover:bg-primary/75': navitem.active }"
                >
                    <span class="flex w-full items-center">
                        <box-icon :type="navitem.iconType" :name="navitem.icon" class="mr-3 fill-current"></box-icon>
                        {{ navitem.name }}
                        <span
                            class="ml-auto transition-transform duration-300 ease-in-out"
                            :class="{ 'rotate-90': navitem.active, 'rotate-0': !navitem.active }"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </span>
                    </span>
                </a>
                <div class="cursor-default bg-transparent" v-show="navitem.active">
                    <ul class="w-full">
                        <li v-for="navchild in navitem.child" :key="navchild.name">
                            <Link
                                :href="navchild.to != null ? route(navchild.to) : '#'"
                                :class="{ 'bg-primary hover:bg-primary/75': navchild.active }"
                            >
                                {{ navchild.name }}
                            </Link>
                        </li>
                    </ul>
                </div>
            </li>
            <li v-else>
                <Link
                    :href="navitem.to != null ? route(navitem.to) : '#'"
                    :class="{ 'bg-primary hover:bg-primary/75': navitem.active }"
                >
                    <box-icon :type="navitem.iconType" :name="navitem.icon" class="fill-current"></box-icon>
                    {{ navitem.name }}
                </Link>
            </li>
        </template>
    </ul>

    <input type="checkbox" id="changepass" class="modal-toggle" v-model="modalpass" />
    <label
        for="changepass"
        id="modal"
        class="modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out"
    >
        <Transition name="bounce">
            <label for="" class="modal-box relative w-11/12 max-w-2xl" v-if="modalpass">
                <label for="changepass" class="btn btn-circle btn-sm absolute right-4 top-4">✕</label>
                <div class="mb-2 text-2xl font-bold">Form Ubah Password</div>
                <div class="alert alert-warning mb-2 shadow-lg">
                    <div>
                        <box-icon name="error" class="fill-yellow-800"></box-icon>
                        <span>pastikan anda ingat password lama dan baru</span>
                    </div>
                </div>
                <form @submit.prevent="submit">
                    <div class="mb-2">
                        <label for="old_password" class="mb-2 block">Password Lama</label>
                        <input type="password" v-model="form.old_password" id="old_password" class="input-text" />
                    </div>
                    <div class="mb-2">
                        <label for="new_password" class="mb-2 block">Password Baru</label>
                        <input type="password" v-model="form.new_password" id="new_password" class="input-text" />
                    </div>
                    <div class="mb-2">
                        <label for="confirm_password" class="mb-2 block">Konfirmasi Password</label>
                        <input
                            type="password"
                            v-model="form.confirm_password"
                            id="confirm_password"
                            class="input-text"
                        />
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 w-full">Ubah Password</button>
                </form>
            </label>
        </Transition>
    </label>
</template>
