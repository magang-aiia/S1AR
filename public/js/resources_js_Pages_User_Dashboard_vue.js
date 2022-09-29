"use strict"
;(self["webpackChunk"] = self["webpackChunk"] || []).push([
    ["resources_js_Pages_User_Dashboard_vue"],
    {
        /***/ "./resources/js/Pages/User/NavUser.js":
            /*!********************************************!*\
  !*** ./resources/js/Pages/User/NavUser.js ***!
  \********************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () => __WEBPACK_DEFAULT_EXPORT__,
                    /* harmony export */
                })
                function getNav() {
                    var parentActive = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : ""
                    var childActive = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : ""
                    var isAtasan = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false
                    if (isAtasan)
                        return [
                            {
                                name: "Dashboard",
                                active: parentActive === "dashboard",
                                to: "dashboard",
                                icon: "home",
                                iconType: "regular",
                                child: [],
                            },
                            {
                                name: "Pengajuan",
                                active: parentActive === "pengajuan",
                                to: null,
                                icon: "message-alt-edit",
                                iconType: "regular",
                                child: [
                                    {
                                        name: "Datadiri",
                                        active: childActive === "datadiri",
                                        to: "datadiri",
                                    },
                                    {
                                        name: "Cuti",
                                        active: childActive === "cuti",
                                        to: "cuti",
                                    },
                                    {
                                        name: "Izin",
                                        active: childActive === "izin",
                                        to: "izin",
                                    },
                                ],
                            },
                            {
                                name: "Absensi",
                                active: parentActive === "absensi",
                                to: "absensi",
                                icon: "calendar-check",
                                iconType: "regular",
                                child: [],
                            },
                            {
                                name: "Approval",
                                active: parentActive === "approval",
                                to: "approval",
                                icon: "pen",
                                iconType: "regular",
                                child: [],
                            },
                            {
                                name: "History",
                                active: parentActive === "history",
                                to: "history",
                                icon: "history",
                                iconType: "regular",
                                child: [],
                            },
                        ]
                    else
                        return [
                            {
                                name: "Dashboard",
                                active: parentActive === "dashboard",
                                to: "dashboard",
                                icon: "home",
                                iconType: "regular",
                                child: [],
                            },
                            {
                                name: "Pengajuan",
                                active: parentActive === "pengajuan",
                                to: null,
                                icon: "message-alt-edit",
                                iconType: "regular",
                                child: [
                                    {
                                        name: "Datadiri",
                                        active: childActive === "datadiri",
                                        to: "datadiri",
                                    },
                                    {
                                        name: "Cuti",
                                        active: childActive === "cuti",
                                        to: "cuti",
                                    },
                                    {
                                        name: "Izin",
                                        active: childActive === "izin",
                                        to: "izin",
                                    },
                                ],
                            },
                            {
                                name: "Absensi",
                                active: parentActive === "absensi",
                                to: "absensi",
                                icon: "calendar-check",
                                iconType: "regular",
                                child: [],
                            },
                            {
                                name: "History",
                                active: parentActive === "history",
                                to: "history",
                                icon: "history",
                                iconType: "regular",
                                child: [],
                            },
                        ]
                }

                /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = getNav

                /***/
            },

        /***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Footer.vue?vue&type=script&setup=true&lang=js":
            /*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Footer.vue?vue&type=script&setup=true&lang=js ***!
  \***********************************************************************************************************************************************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () => __WEBPACK_DEFAULT_EXPORT__,
                    /* harmony export */
                })
                /* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
                    /*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js"
                )

                /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = {
                    __name: "Footer",
                    setup: function setup(__props, _ref) {
                        var expose = _ref.expose
                        expose()
                        var year = (0, vue__WEBPACK_IMPORTED_MODULE_0__.ref)(new Date().getFullYear())
                        var __returned__ = {
                            year: year,
                            ref: vue__WEBPACK_IMPORTED_MODULE_0__.ref,
                        }
                        Object.defineProperty(__returned__, "__isScriptSetup", {
                            enumerable: false,
                            value: true,
                        })
                        return __returned__
                    },
                }

                /***/
            },

        /***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Navbar.vue?vue&type=script&setup=true&lang=js":
            /*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Navbar.vue?vue&type=script&setup=true&lang=js ***!
  \***********************************************************************************************************************************************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () => __WEBPACK_DEFAULT_EXPORT__,
                    /* harmony export */
                })
                /* harmony import */ var _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
                    /*! @inertiajs/inertia-vue3 */ "./node_modules/@inertiajs/inertia-vue3/dist/index.js"
                )
                /* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(
                    /*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js"
                )

                /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = {
                    __name: "Navbar",
                    props: {
                        nav: {
                            type: Array,
                            default: null,
                        },
                        sidebar: {
                            type: Boolean,
                            default: false,
                        },
                    },
                    setup: function setup(__props, _ref) {
                        var expose = _ref.expose
                        expose()
                        var route = window.route
                        var modalpass = (0, vue__WEBPACK_IMPORTED_MODULE_1__.ref)(false)
                        var form = (0, _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__.useForm)({
                            old_password: "",
                            new_password: "",
                            confirm_password: "",
                        })

                        var submit = function submit() {
                            console.log(form.old_password)
                            console.log(form.new_password)
                            console.log(form.confirm_password)
                            form.reset("old_password")
                            form.reset("new_password")
                            form.reset("confirm_password")
                            modalpass.value = false
                        }

                        var __returned__ = {
                            route: route,
                            modalpass: modalpass,
                            form: form,
                            submit: submit,
                            Link: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__.Link,
                            useForm: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_0__.useForm,
                            ref: vue__WEBPACK_IMPORTED_MODULE_1__.ref,
                        }
                        Object.defineProperty(__returned__, "__isScriptSetup", {
                            enumerable: false,
                            value: true,
                        })
                        return __returned__
                    },
                }

                /***/
            },

        /***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Layouts/Main.vue?vue&type=script&setup=true&lang=js":
            /*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Layouts/Main.vue?vue&type=script&setup=true&lang=js ***!
  \******************************************************************************************************************************************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () => __WEBPACK_DEFAULT_EXPORT__,
                    /* harmony export */
                })
                /* harmony import */ var _Components_Navbar_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
                    /*! @/Components/Navbar.vue */ "./resources/js/Components/Navbar.vue"
                )
                /* harmony import */ var _Components_Footer_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(
                    /*! @/Components/Footer.vue */ "./resources/js/Components/Footer.vue"
                )

                /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = {
                    __name: "Main",
                    props: {
                        nav: {
                            type: Array,
                            default: function _default() {
                                return [
                                    {
                                        name: "Dashboard",
                                        active: false,
                                        to: "dashboard",
                                        icon: "home",
                                        iconType: "regular",
                                        child: [],
                                    },
                                    {
                                        name: "Izin",
                                        active: false,
                                        to: null,
                                        icon: "log-out-circle",
                                        iconType: "regular",
                                        child: [
                                            {
                                                name: "Cuti",
                                                active: false,
                                                to: null,
                                            },
                                            {
                                                name: "Izin IMU/ITU",
                                                active: false,
                                                to: null,
                                            },
                                            {
                                                name: "Dinas Luar",
                                                active: false,
                                                to: null,
                                            },
                                            {
                                                name: "Sakit",
                                                active: false,
                                                to: null,
                                            },
                                        ],
                                    },
                                    {
                                        name: "Profile",
                                        active: false,
                                        to: null,
                                        icon: "user-circle",
                                        iconType: "regular",
                                        child: [],
                                    },
                                ]
                            },
                        },
                    },
                    setup: function setup(__props, _ref) {
                        var expose = _ref.expose
                        expose()
                        var __returned__ = {
                            Navbar: _Components_Navbar_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
                            Footer: _Components_Footer_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
                        }
                        Object.defineProperty(__returned__, "__isScriptSetup", {
                            enumerable: false,
                            value: true,
                        })
                        return __returned__
                    },
                }

                /***/
            },

        /***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/User/Dashboard.vue?vue&type=script&lang=js":
            /*!***************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/User/Dashboard.vue?vue&type=script&lang=js ***!
  \***************************************************************************************************************************************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () => __WEBPACK_DEFAULT_EXPORT__,
                    /* harmony export */
                })
                /* harmony import */ var _Layouts_Main_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
                    /*! @/Layouts/Main.vue */ "./resources/js/Layouts/Main.vue"
                )
                /* harmony import */ var _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(
                    /*! @inertiajs/inertia-vue3 */ "./node_modules/@inertiajs/inertia-vue3/dist/index.js"
                )
                /* harmony import */ var _Pages_User_NavUser_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(
                    /*! @/Pages/User/NavUser.js */ "./resources/js/Pages/User/NavUser.js"
                )

                /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = {
                    components: {
                        MainLayout: _Layouts_Main_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
                        HeadInertia: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__.Head,
                        LinkInertia: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_1__.Link,
                    },
                    props: {
                        isAtasan: Boolean,
                    },
                    data: function data() {
                        return {
                            nav: [],
                            modalCutiTahunan: false,
                            modalCutiIstimewa: false,
                        }
                    },
                    mounted: function mounted() {
                        this.nav = (0, _Pages_User_NavUser_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
                            "dashboard",
                            undefined,
                            this.isAtasan
                        )
                    },
                }

                /***/
            },

        /***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Footer.vue?vue&type=template&id=3c0d6e26":
            /*!****************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Footer.vue?vue&type=template&id=3c0d6e26 ***!
  \****************************************************************************************************************************************************************************************************************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ render: () => /* binding */ render,
                    /* harmony export */
                })
                /* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
                    /*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js"
                )

                var _hoisted_1 = {
                    class: "footer place-content-center rounded-xl bg-base-100 p-4 text-base-content shadow-lg",
                }
                var _hoisted_2 = {
                    class: "grid-flow-col items-center",
                }

                var _hoisted_3 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "svg",
                    {
                        width: "36",
                        height: "36",
                        viewBox: "0 0 24 24",
                        xmlns: "http://www.w3.org/2000/svg",
                        "fill-rule": "evenodd",
                        "clip-rule": "evenodd",
                        class: "fill-current",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
                            d: "M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z",
                        }),
                    ],
                    -1
                    /* HOISTED */
                )

                function render(_ctx, _cache, $props, $setup, $data, $options) {
                    return (
                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("footer", _hoisted_1, [
                            (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [
                                _hoisted_3,
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                    "p",
                                    null,
                                    "Copyright © " +
                                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.year) +
                                        " - TIM ITD AIIA",
                                    1
                                    /* TEXT */
                                ),
                            ]),
                        ])
                    )
                }

                /***/
            },

        /***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Navbar.vue?vue&type=template&id=4a80dbca":
            /*!****************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Navbar.vue?vue&type=template&id=4a80dbca ***!
  \****************************************************************************************************************************************************************************************************************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ render: () => /* binding */ render,
                    /* harmony export */
                })
                /* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
                    /*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js"
                )

                var _hoisted_1 = {
                    key: 0,
                    class: "navbar mb-3 rounded-xl bg-base-100 shadow-lg",
                }
                var _hoisted_2 = {
                    class: "navbar-start",
                }

                var _hoisted_3 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "label",
                    {
                        for: "sidedrawer",
                        class: "btn btn-ghost btn-square lg:hidden",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "svg",
                            {
                                xmlns: "http://www.w3.org/2000/svg",
                                class: "h-5 w-5",
                                fill: "none",
                                viewBox: "0 0 24 24",
                                stroke: "currentColor",
                            },
                            [
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
                                    "stroke-linecap": "round",
                                    "stroke-linejoin": "round",
                                    "stroke-width": "2",
                                    d: "M4 6h16M4 12h16M4 18h7",
                                }),
                            ]
                        ),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_4 = {
                    class: "navbar-center flex",
                }
                var _hoisted_5 = {
                    key: 1,
                    class: "menu menu-horizontal hidden p-0 lg:inline-flex",
                }
                var _hoisted_6 = {
                    key: 0,
                    tabindex: "0",
                }
                var _hoisted_7 = ["type", "name"]

                var _hoisted_8 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "svg",
                    {
                        class: "fill-current",
                        xmlns: "http://www.w3.org/2000/svg",
                        width: "20",
                        height: "20",
                        viewBox: "0 0 24 24",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
                            d: "M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z",
                        }),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_9 = {
                    class: "bg-base-100 p-2 shadow",
                }
                var _hoisted_10 = {
                    key: 1,
                }
                var _hoisted_11 = ["type", "name"]
                var _hoisted_12 = {
                    class: "navbar-end",
                }
                var _hoisted_13 = {
                    class: "indicator",
                }

                var _hoisted_14 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "box-icon",
                    {
                        type: "regular",
                        name: "bell",
                        class: "fill-current",
                    },
                    null,
                    -1
                    /* HOISTED */
                )

                var _hoisted_15 = {
                    class: "dropdown dropdown-end",
                }
                var _hoisted_16 = {
                    tabindex: "0",
                    class: "avatar btn btn-ghost btn-circle mr-2",
                }
                var _hoisted_17 = {
                    class: "w-10 rounded-full",
                }
                var _hoisted_18 = ["src"]
                var _hoisted_19 = {
                    tabindex: "0",
                    class: "dropdown-content menu rounded-box menu-compact mt-3 w-52 bg-base-100 p-2 shadow",
                }
                var _hoisted_20 = {
                    class: "py-3 px-4 text-xs text-base-content",
                }

                var _hoisted_21 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "li",
                    null,
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "label",
                            {
                                for: "changepass",
                            },
                            " Ubah Password "
                        ),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_22 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Logout")

                var _hoisted_23 = {
                    key: 1,
                    class: "menu w-80 overflow-y-auto bg-base-100 p-4",
                }
                var _hoisted_24 = {
                    key: 0,
                }
                var _hoisted_25 = ["onClick"]
                var _hoisted_26 = {
                    class: "flex w-full items-center",
                }
                var _hoisted_27 = ["type", "name"]

                var _hoisted_28 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "svg",
                    {
                        xmlns: "http://www.w3.org/2000/svg",
                        class: "h-4 w-4",
                        fill: "none",
                        viewBox: "0 0 24 24",
                        stroke: "currentColor",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
                            "stroke-linecap": "round",
                            "stroke-linejoin": "round",
                            "stroke-width": "2",
                            d: "M9 5l7 7-7 7",
                        }),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_29 = [_hoisted_28]
                var _hoisted_30 = {
                    class: "cursor-default bg-transparent",
                }
                var _hoisted_31 = {
                    class: "w-full",
                }
                var _hoisted_32 = {
                    key: 1,
                }
                var _hoisted_33 = ["type", "name"]
                var _hoisted_34 = {
                    for: "changepass",
                    id: "modal",
                    class: "modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out",
                }
                var _hoisted_35 = {
                    key: 0,
                    for: "",
                    class: "modal-box relative w-11/12 max-w-2xl",
                }

                var _hoisted_36 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "label",
                    {
                        for: "changepass",
                        class: "btn btn-circle btn-sm absolute right-4 top-4",
                    },
                    "✕",
                    -1
                    /* HOISTED */
                )

                var _hoisted_37 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "mb-2 text-2xl font-bold",
                    },
                    "Form Ubah Password",
                    -1
                    /* HOISTED */
                )

                var _hoisted_38 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "alert alert-warning mb-2 shadow-lg",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [
                            /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("box-icon", {
                                name: "error",
                                class: "fill-yellow-800",
                            }),
                            /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                "span",
                                null,
                                "pastikan anda ingat password lama dan baru"
                            ),
                        ]),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_39 = ["onSubmit"]
                var _hoisted_40 = {
                    class: "mb-2",
                }

                var _hoisted_41 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "label",
                    {
                        for: "old_password",
                        class: "mb-2 block",
                    },
                    "Password Lama",
                    -1
                    /* HOISTED */
                )

                var _hoisted_42 = {
                    class: "mb-2",
                }

                var _hoisted_43 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "label",
                    {
                        for: "new_password",
                        class: "mb-2 block",
                    },
                    "Password Baru",
                    -1
                    /* HOISTED */
                )

                var _hoisted_44 = {
                    class: "mb-2",
                }

                var _hoisted_45 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "label",
                    {
                        for: "confirm_password",
                        class: "mb-2 block",
                    },
                    "Konfirmasi Password",
                    -1
                    /* HOISTED */
                )

                var _hoisted_46 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "button",
                    {
                        type: "submit",
                        class: "btn btn-primary mt-2 w-full",
                    },
                    "Ubah Password",
                    -1
                    /* HOISTED */
                )

                function render(_ctx, _cache, $props, $setup, $data, $options) {
                    return (
                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                            vue__WEBPACK_IMPORTED_MODULE_0__.Fragment,
                            null,
                            [
                                !$props.sidebar
                                    ? ((0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                      (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [
                                          (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [
                                              _hoisted_3,
                                              _ctx.$slots.brand
                                                  ? ((0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(
                                                        $setup["Link"],
                                                        {
                                                            key: 0,
                                                            href: $setup.route("root"),
                                                            class: "btn btn-ghost hidden text-xl font-black normal-case lg:inline-flex",
                                                        },
                                                        {
                                                            default: (0, vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                                function () {
                                                                    return [
                                                                        (0,
                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(
                                                                            _ctx.$slots,
                                                                            "brand"
                                                                        ),
                                                                    ]
                                                                }
                                                            ),
                                                            _: 3,
                                                            /* FORWARDED */
                                                        },
                                                        8,
                                                        /* PROPS */
                                                        ["href"]
                                                    ))
                                                  : (0, vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(
                                                        "v-if",
                                                        true
                                                    ),
                                          ]),
                                          (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [
                                              _ctx.$slots.brand
                                                  ? ((0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(
                                                        $setup["Link"],
                                                        {
                                                            key: 0,
                                                            href: $setup.route("root"),
                                                            class: "btn btn-ghost text-xl font-black normal-case lg:hidden",
                                                        },
                                                        {
                                                            default: (0, vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                                function () {
                                                                    return [
                                                                        (0,
                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(
                                                                            _ctx.$slots,
                                                                            "brand"
                                                                        ),
                                                                    ]
                                                                }
                                                            ),
                                                            _: 3,
                                                            /* FORWARDED */
                                                        },
                                                        8,
                                                        /* PROPS */
                                                        ["href"]
                                                    ))
                                                  : (0, vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(
                                                        "v-if",
                                                        true
                                                    ),
                                              $props.nav != null
                                                  ? ((0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                        "ul",
                                                        _hoisted_5,
                                                        [
                                                            ((0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true),
                                                            (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                                vue__WEBPACK_IMPORTED_MODULE_0__.Fragment,
                                                                null,
                                                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.renderList)(
                                                                    $props.nav,
                                                                    function (navitem) {
                                                                        return (
                                                                            (0,
                                                                            vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                                            (0,
                                                                            vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                                                vue__WEBPACK_IMPORTED_MODULE_0__.Fragment,
                                                                                {
                                                                                    key: navitem.name,
                                                                                },
                                                                                [
                                                                                    navitem.child.length > 0
                                                                                        ? ((0,
                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                                                          (0,
                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                                                              "li",
                                                                                              _hoisted_6,
                                                                                              [
                                                                                                  (0,
                                                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                                      "a",
                                                                                                      {
                                                                                                          class: (0,
                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(
                                                                                                              {
                                                                                                                  "bg-primary hover:bg-primary/75":
                                                                                                                      navitem.active,
                                                                                                              }
                                                                                                          ),
                                                                                                      },
                                                                                                      [
                                                                                                          (0,
                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                                              "box-icon",
                                                                                                              {
                                                                                                                  type: navitem.iconType,
                                                                                                                  name: navitem.icon,
                                                                                                                  class: "fill-current",
                                                                                                              },
                                                                                                              null,
                                                                                                              8,
                                                                                                              /* PROPS */
                                                                                                              _hoisted_7
                                                                                                          ),
                                                                                                          (0,
                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(
                                                                                                              " " +
                                                                                                                  (0,
                                                                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(
                                                                                                                      navitem.name
                                                                                                                  ) +
                                                                                                                  " ",
                                                                                                              1
                                                                                                              /* TEXT */
                                                                                                          ),
                                                                                                          _hoisted_8,
                                                                                                      ],
                                                                                                      2
                                                                                                      /* CLASS */
                                                                                                  ),
                                                                                                  (0,
                                                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                                      "ul",
                                                                                                      _hoisted_9,
                                                                                                      [
                                                                                                          ((0,
                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(
                                                                                                              true
                                                                                                          ),
                                                                                                          (0,
                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                                                                              vue__WEBPACK_IMPORTED_MODULE_0__.Fragment,
                                                                                                              null,
                                                                                                              (0,
                                                                                                              vue__WEBPACK_IMPORTED_MODULE_0__.renderList)(
                                                                                                                  navitem.child,
                                                                                                                  function (
                                                                                                                      navchild
                                                                                                                  ) {
                                                                                                                      return (
                                                                                                                          (0,
                                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                                                                                          (0,
                                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                                                                                              "li",
                                                                                                                              {
                                                                                                                                  key: navchild.name,
                                                                                                                              },
                                                                                                                              [
                                                                                                                                  (0,
                                                                                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                                                                                                                      $setup[
                                                                                                                                          "Link"
                                                                                                                                      ],
                                                                                                                                      {
                                                                                                                                          href:
                                                                                                                                              navchild.to !=
                                                                                                                                              null
                                                                                                                                                  ? $setup.route(
                                                                                                                                                        navchild.to
                                                                                                                                                    )
                                                                                                                                                  : "#",
                                                                                                                                          class: (0,
                                                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(
                                                                                                                                              {
                                                                                                                                                  "bg-primary hover:bg-primary/75":
                                                                                                                                                      navchild.active,
                                                                                                                                              }
                                                                                                                                          ),
                                                                                                                                      },
                                                                                                                                      {
                                                                                                                                          default:
                                                                                                                                              (0,
                                                                                                                                              vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                                                                                                                  function () {
                                                                                                                                                      return [
                                                                                                                                                          (0,
                                                                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(
                                                                                                                                                              (0,
                                                                                                                                                              vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(
                                                                                                                                                                  navchild.name
                                                                                                                                                              ),
                                                                                                                                                              1
                                                                                                                                                              /* TEXT */
                                                                                                                                                          ),
                                                                                                                                                      ]
                                                                                                                                                  }
                                                                                                                                              ),
                                                                                                                                          _: 2,
                                                                                                                                          /* DYNAMIC */
                                                                                                                                      },
                                                                                                                                      1032,
                                                                                                                                      /* PROPS, DYNAMIC_SLOTS */
                                                                                                                                      [
                                                                                                                                          "href",
                                                                                                                                          "class",
                                                                                                                                      ]
                                                                                                                                  ),
                                                                                                                              ]
                                                                                                                          )
                                                                                                                      )
                                                                                                                  }
                                                                                                              ),
                                                                                                              128
                                                                                                              /* KEYED_FRAGMENT */
                                                                                                          )),
                                                                                                      ]
                                                                                                  ),
                                                                                              ]
                                                                                          ))
                                                                                        : ((0,
                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                                                          (0,
                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                                                              "li",
                                                                                              _hoisted_10,
                                                                                              [
                                                                                                  (0,
                                                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                                                                                      $setup["Link"],
                                                                                                      {
                                                                                                          href:
                                                                                                              navitem.to !=
                                                                                                              null
                                                                                                                  ? $setup.route(
                                                                                                                        navitem.to
                                                                                                                    )
                                                                                                                  : "#",
                                                                                                          class: (0,
                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(
                                                                                                              {
                                                                                                                  "bg-primary hover:bg-primary/75":
                                                                                                                      navitem.active,
                                                                                                              }
                                                                                                          ),
                                                                                                      },
                                                                                                      {
                                                                                                          default: (0,
                                                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                                                                              function () {
                                                                                                                  return [
                                                                                                                      (0,
                                                                                                                      vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                                                          "box-icon",
                                                                                                                          {
                                                                                                                              type: navitem.iconType,
                                                                                                                              name: navitem.icon,
                                                                                                                              class: "fill-current",
                                                                                                                          },
                                                                                                                          null,
                                                                                                                          8,
                                                                                                                          /* PROPS */
                                                                                                                          _hoisted_11
                                                                                                                      ),
                                                                                                                      (0,
                                                                                                                      vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(
                                                                                                                          " " +
                                                                                                                              (0,
                                                                                                                              vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(
                                                                                                                                  navitem.name
                                                                                                                              ),
                                                                                                                          1
                                                                                                                          /* TEXT */
                                                                                                                      ),
                                                                                                                  ]
                                                                                                              }
                                                                                                          ),
                                                                                                          _: 2,
                                                                                                          /* DYNAMIC */
                                                                                                      },
                                                                                                      1032,
                                                                                                      /* PROPS, DYNAMIC_SLOTS */
                                                                                                      ["href", "class"]
                                                                                                  ),
                                                                                              ]
                                                                                          )),
                                                                                ],
                                                                                64
                                                                                /* STABLE_FRAGMENT */
                                                                            )
                                                                        )
                                                                    }
                                                                ),
                                                                128
                                                                /* KEYED_FRAGMENT */
                                                            )),
                                                        ]
                                                    ))
                                                  : (0, vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(
                                                        "v-if",
                                                        true
                                                    ),
                                          ]),
                                          (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_12, [
                                              (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                                  $setup["Link"],
                                                  {
                                                      href: $setup.route("notification"),
                                                      class: (0, vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)([
                                                          "btn btn-ghost btn-circle mr-3",
                                                          {
                                                              "bg-primary": $setup.route().current("notification"),
                                                          },
                                                      ]),
                                                  },
                                                  {
                                                      default: (0, vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                          function () {
                                                              return [
                                                                  (0,
                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                      "div",
                                                                      _hoisted_13,
                                                                      [
                                                                          _hoisted_14,
                                                                          (0,
                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                              "span",
                                                                              {
                                                                                  class: (0,
                                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(
                                                                                      [
                                                                                          "badge indicator-item badge-xs text-base-100",
                                                                                          {
                                                                                              "badge-info": $setup
                                                                                                  .route()
                                                                                                  .current(
                                                                                                      "notification"
                                                                                                  ),
                                                                                              "badge-primary": !$setup
                                                                                                  .route()
                                                                                                  .current(
                                                                                                      "notification"
                                                                                                  ),
                                                                                          },
                                                                                      ]
                                                                                  ),
                                                                              },
                                                                              "10",
                                                                              2
                                                                              /* CLASS */
                                                                          ),
                                                                      ]
                                                                  ),
                                                              ]
                                                          }
                                                      ),
                                                      _: 1,
                                                      /* STABLE */
                                                  },
                                                  8,
                                                  /* PROPS */
                                                  ["href", "class"]
                                              ),
                                              (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                  "div",
                                                  _hoisted_15,
                                                  [
                                                      (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                          "label",
                                                          _hoisted_16,
                                                          [
                                                              (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                  "div",
                                                                  _hoisted_17,
                                                                  [
                                                                      (0,
                                                                      vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                          "img",
                                                                          {
                                                                              src:
                                                                                  "/assets/image/" +
                                                                                  _ctx.$page.props.auth.user.avatar,
                                                                          },
                                                                          null,
                                                                          8,
                                                                          /* PROPS */
                                                                          _hoisted_18
                                                                      ),
                                                                  ]
                                                              ),
                                                          ]
                                                      ),
                                                      (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                          "ul",
                                                          _hoisted_19,
                                                          [
                                                              (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                  "li",
                                                                  _hoisted_20,
                                                                  (0, vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(
                                                                      _ctx.$page.props.auth.user.name
                                                                  ),
                                                                  1
                                                                  /* TEXT */
                                                              ),
                                                              _hoisted_21,
                                                              (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                  "li",
                                                                  null,
                                                                  [
                                                                      (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                                                          $setup["Link"],
                                                                          {
                                                                              href: $setup.route("logout"),
                                                                              method: "post",
                                                                              as: "button",
                                                                          },
                                                                          {
                                                                              default: (0,
                                                                              vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                                                  function () {
                                                                                      return [_hoisted_22]
                                                                                  }
                                                                              ),
                                                                              _: 1,
                                                                              /* STABLE */
                                                                          },
                                                                          8,
                                                                          /* PROPS */
                                                                          ["href"]
                                                                      ),
                                                                  ]
                                                              ),
                                                          ]
                                                      ),
                                                  ]
                                              ),
                                          ]),
                                      ]))
                                    : ((0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                      (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("ul", _hoisted_23, [
                                          ((0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true),
                                          (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                              vue__WEBPACK_IMPORTED_MODULE_0__.Fragment,
                                              null,
                                              (0, vue__WEBPACK_IMPORTED_MODULE_0__.renderList)(
                                                  $props.nav,
                                                  function (navitem) {
                                                      return (
                                                          (0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                          (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                              vue__WEBPACK_IMPORTED_MODULE_0__.Fragment,
                                                              {
                                                                  key: navitem.name,
                                                              },
                                                              [
                                                                  navitem.child.length > 0
                                                                      ? ((0,
                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                                        (0,
                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                                            "li",
                                                                            _hoisted_24,
                                                                            [
                                                                                (0,
                                                                                vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                    "a",
                                                                                    {
                                                                                        href: "#",
                                                                                        onClick: function onClick(
                                                                                            $event
                                                                                        ) {
                                                                                            return (navitem.active =
                                                                                                !navitem.active)
                                                                                        },
                                                                                        class: (0,
                                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(
                                                                                            {
                                                                                                "bg-primary hover:bg-primary/75":
                                                                                                    navitem.active,
                                                                                            }
                                                                                        ),
                                                                                    },
                                                                                    [
                                                                                        (0,
                                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                            "span",
                                                                                            _hoisted_26,
                                                                                            [
                                                                                                (0,
                                                                                                vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                                    "box-icon",
                                                                                                    {
                                                                                                        type: navitem.iconType,
                                                                                                        name: navitem.icon,
                                                                                                        class: "mr-3 fill-current",
                                                                                                    },
                                                                                                    null,
                                                                                                    8,
                                                                                                    /* PROPS */
                                                                                                    _hoisted_27
                                                                                                ),
                                                                                                (0,
                                                                                                vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(
                                                                                                    " " +
                                                                                                        (0,
                                                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(
                                                                                                            navitem.name
                                                                                                        ) +
                                                                                                        " ",
                                                                                                    1
                                                                                                    /* TEXT */
                                                                                                ),
                                                                                                (0,
                                                                                                vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                                    "span",
                                                                                                    {
                                                                                                        class: (0,
                                                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(
                                                                                                            [
                                                                                                                "ml-auto transition-transform duration-300 ease-in-out",
                                                                                                                {
                                                                                                                    "rotate-90":
                                                                                                                        navitem.active,
                                                                                                                    "rotate-0":
                                                                                                                        !navitem.active,
                                                                                                                },
                                                                                                            ]
                                                                                                        ),
                                                                                                    },
                                                                                                    _hoisted_29,
                                                                                                    2
                                                                                                    /* CLASS */
                                                                                                ),
                                                                                            ]
                                                                                        ),
                                                                                    ],
                                                                                    10,
                                                                                    /* CLASS, PROPS */
                                                                                    _hoisted_25
                                                                                ),
                                                                                (0,
                                                                                vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)(
                                                                                    (0,
                                                                                    vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                        "div",
                                                                                        _hoisted_30,
                                                                                        [
                                                                                            (0,
                                                                                            vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                                "ul",
                                                                                                _hoisted_31,
                                                                                                [
                                                                                                    ((0,
                                                                                                    vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(
                                                                                                        true
                                                                                                    ),
                                                                                                    (0,
                                                                                                    vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.Fragment,
                                                                                                        null,
                                                                                                        (0,
                                                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.renderList)(
                                                                                                            navitem.child,
                                                                                                            function (
                                                                                                                navchild
                                                                                                            ) {
                                                                                                                return (
                                                                                                                    (0,
                                                                                                                    vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                                                                                    (0,
                                                                                                                    vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                                                                                        "li",
                                                                                                                        {
                                                                                                                            key: navchild.name,
                                                                                                                        },
                                                                                                                        [
                                                                                                                            (0,
                                                                                                                            vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                                                                                                                $setup[
                                                                                                                                    "Link"
                                                                                                                                ],
                                                                                                                                {
                                                                                                                                    href:
                                                                                                                                        navchild.to !=
                                                                                                                                        null
                                                                                                                                            ? $setup.route(
                                                                                                                                                  navchild.to
                                                                                                                                              )
                                                                                                                                            : "#",
                                                                                                                                    class: (0,
                                                                                                                                    vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(
                                                                                                                                        {
                                                                                                                                            "bg-primary hover:bg-primary/75":
                                                                                                                                                navchild.active,
                                                                                                                                        }
                                                                                                                                    ),
                                                                                                                                },
                                                                                                                                {
                                                                                                                                    default:
                                                                                                                                        (0,
                                                                                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                                                                                                            function () {
                                                                                                                                                return [
                                                                                                                                                    (0,
                                                                                                                                                    vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(
                                                                                                                                                        (0,
                                                                                                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(
                                                                                                                                                            navchild.name
                                                                                                                                                        ),
                                                                                                                                                        1
                                                                                                                                                        /* TEXT */
                                                                                                                                                    ),
                                                                                                                                                ]
                                                                                                                                            }
                                                                                                                                        ),
                                                                                                                                    _: 2,
                                                                                                                                    /* DYNAMIC */
                                                                                                                                },
                                                                                                                                1032,
                                                                                                                                /* PROPS, DYNAMIC_SLOTS */
                                                                                                                                [
                                                                                                                                    "href",
                                                                                                                                    "class",
                                                                                                                                ]
                                                                                                                            ),
                                                                                                                        ]
                                                                                                                    )
                                                                                                                )
                                                                                                            }
                                                                                                        ),
                                                                                                        128
                                                                                                        /* KEYED_FRAGMENT */
                                                                                                    )),
                                                                                                ]
                                                                                            ),
                                                                                        ],
                                                                                        512
                                                                                        /* NEED_PATCH */
                                                                                    ),
                                                                                    [
                                                                                        [
                                                                                            vue__WEBPACK_IMPORTED_MODULE_0__.vShow,
                                                                                            navitem.active,
                                                                                        ],
                                                                                    ]
                                                                                ),
                                                                            ]
                                                                        ))
                                                                      : ((0,
                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                                        (0,
                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                                            "li",
                                                                            _hoisted_32,
                                                                            [
                                                                                (0,
                                                                                vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                                                                    $setup["Link"],
                                                                                    {
                                                                                        href:
                                                                                            navitem.to != null
                                                                                                ? $setup.route(
                                                                                                      navitem.to
                                                                                                  )
                                                                                                : "#",
                                                                                        class: (0,
                                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(
                                                                                            {
                                                                                                "bg-primary hover:bg-primary/75":
                                                                                                    navitem.active,
                                                                                            }
                                                                                        ),
                                                                                    },
                                                                                    {
                                                                                        default: (0,
                                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                                                            function () {
                                                                                                return [
                                                                                                    (0,
                                                                                                    vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                                        "box-icon",
                                                                                                        {
                                                                                                            type: navitem.iconType,
                                                                                                            name: navitem.icon,
                                                                                                            class: "fill-current",
                                                                                                        },
                                                                                                        null,
                                                                                                        8,
                                                                                                        /* PROPS */
                                                                                                        _hoisted_33
                                                                                                    ),
                                                                                                    (0,
                                                                                                    vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(
                                                                                                        " " +
                                                                                                            (0,
                                                                                                            vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(
                                                                                                                navitem.name
                                                                                                            ),
                                                                                                        1
                                                                                                        /* TEXT */
                                                                                                    ),
                                                                                                ]
                                                                                            }
                                                                                        ),
                                                                                        _: 2,
                                                                                        /* DYNAMIC */
                                                                                    },
                                                                                    1032,
                                                                                    /* PROPS, DYNAMIC_SLOTS */
                                                                                    ["href", "class"]
                                                                                ),
                                                                            ]
                                                                        )),
                                                              ],
                                                              64
                                                              /* STABLE_FRAGMENT */
                                                          )
                                                      )
                                                  }
                                              ),
                                              128
                                              /* KEYED_FRAGMENT */
                                          )),
                                      ])),
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)(
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                        "input",
                                        {
                                            type: "checkbox",
                                            id: "changepass",
                                            class: "modal-toggle",
                                            "onUpdate:modelValue":
                                                _cache[0] ||
                                                (_cache[0] = function ($event) {
                                                    return ($setup.modalpass = $event)
                                                }),
                                        },
                                        null,
                                        512
                                        /* NEED_PATCH */
                                    ),
                                    [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $setup.modalpass]]
                                ),
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", _hoisted_34, [
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                        vue__WEBPACK_IMPORTED_MODULE_0__.Transition,
                                        {
                                            name: "bounce",
                                        },
                                        {
                                            default: (0, vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
                                                return [
                                                    $setup.modalpass
                                                        ? ((0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                          (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                              "label",
                                                              _hoisted_35,
                                                              [
                                                                  _hoisted_36,
                                                                  _hoisted_37,
                                                                  _hoisted_38,
                                                                  (0,
                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                      "form",
                                                                      {
                                                                          onSubmit: (0,
                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(
                                                                              $setup.submit,
                                                                              ["prevent"]
                                                                          ),
                                                                      },
                                                                      [
                                                                          (0,
                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                              "div",
                                                                              _hoisted_40,
                                                                              [
                                                                                  _hoisted_41,
                                                                                  (0,
                                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)(
                                                                                      (0,
                                                                                      vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                          "input",
                                                                                          {
                                                                                              type: "password",
                                                                                              "onUpdate:modelValue":
                                                                                                  _cache[1] ||
                                                                                                  (_cache[1] =
                                                                                                      function (
                                                                                                          $event
                                                                                                      ) {
                                                                                                          return ($setup.form.old_password =
                                                                                                              $event)
                                                                                                      }),
                                                                                              id: "old_password",
                                                                                              class: "input-text",
                                                                                          },
                                                                                          null,
                                                                                          512
                                                                                          /* NEED_PATCH */
                                                                                      ),
                                                                                      [
                                                                                          [
                                                                                              vue__WEBPACK_IMPORTED_MODULE_0__.vModelText,
                                                                                              $setup.form.old_password,
                                                                                          ],
                                                                                      ]
                                                                                  ),
                                                                              ]
                                                                          ),
                                                                          (0,
                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                              "div",
                                                                              _hoisted_42,
                                                                              [
                                                                                  _hoisted_43,
                                                                                  (0,
                                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)(
                                                                                      (0,
                                                                                      vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                          "input",
                                                                                          {
                                                                                              type: "password",
                                                                                              "onUpdate:modelValue":
                                                                                                  _cache[2] ||
                                                                                                  (_cache[2] =
                                                                                                      function (
                                                                                                          $event
                                                                                                      ) {
                                                                                                          return ($setup.form.new_password =
                                                                                                              $event)
                                                                                                      }),
                                                                                              id: "new_password",
                                                                                              class: "input-text",
                                                                                          },
                                                                                          null,
                                                                                          512
                                                                                          /* NEED_PATCH */
                                                                                      ),
                                                                                      [
                                                                                          [
                                                                                              vue__WEBPACK_IMPORTED_MODULE_0__.vModelText,
                                                                                              $setup.form.new_password,
                                                                                          ],
                                                                                      ]
                                                                                  ),
                                                                              ]
                                                                          ),
                                                                          (0,
                                                                          vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                              "div",
                                                                              _hoisted_44,
                                                                              [
                                                                                  _hoisted_45,
                                                                                  (0,
                                                                                  vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)(
                                                                                      (0,
                                                                                      vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                                                          "input",
                                                                                          {
                                                                                              type: "password",
                                                                                              "onUpdate:modelValue":
                                                                                                  _cache[3] ||
                                                                                                  (_cache[3] =
                                                                                                      function (
                                                                                                          $event
                                                                                                      ) {
                                                                                                          return ($setup.form.confirm_password =
                                                                                                              $event)
                                                                                                      }),
                                                                                              id: "confirm_password",
                                                                                              class: "input-text",
                                                                                          },
                                                                                          null,
                                                                                          512
                                                                                          /* NEED_PATCH */
                                                                                      ),
                                                                                      [
                                                                                          [
                                                                                              vue__WEBPACK_IMPORTED_MODULE_0__.vModelText,
                                                                                              $setup.form
                                                                                                  .confirm_password,
                                                                                          ],
                                                                                      ]
                                                                                  ),
                                                                              ]
                                                                          ),
                                                                          _hoisted_46,
                                                                      ],
                                                                      40,
                                                                      /* PROPS, HYDRATE_EVENTS */
                                                                      _hoisted_39
                                                                  ),
                                                              ]
                                                          ))
                                                        : (0, vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(
                                                              "v-if",
                                                              true
                                                          ),
                                                ]
                                            }),
                                            _: 1,
                                            /* STABLE */
                                        }
                                    ),
                                ]),
                            ],
                            64
                            /* STABLE_FRAGMENT */
                        )
                    )
                }

                /***/
            },

        /***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Layouts/Main.vue?vue&type=template&id=6be77c86":
            /*!***********************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Layouts/Main.vue?vue&type=template&id=6be77c86 ***!
  \***********************************************************************************************************************************************************************************************************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ render: () => /* binding */ render,
                    /* harmony export */
                })
                /* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
                    /*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js"
                )

                var _hoisted_1 = {
                    class: "drawer",
                }

                var _hoisted_2 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "input",
                    {
                        id: "sidedrawer",
                        type: "checkbox",
                        class: "drawer-toggle",
                    },
                    null,
                    -1
                    /* HOISTED */
                )

                var _hoisted_3 = {
                    class: "drawer-content flex flex-col flex-wrap bg-base-300",
                }
                var _hoisted_4 = {
                    class: "h-screen w-full p-3",
                }

                var _hoisted_5 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("S1AR")

                var _hoisted_6 = {
                    class: "mb-3 h-[calc(100vh_-_11.2rem)] overflow-y-auto rounded-xl bg-base-100 p-4 shadow-lg",
                }
                var _hoisted_7 = {
                    class: "drawer-side",
                }

                var _hoisted_8 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "label",
                    {
                        for: "sidedrawer",
                        class: "drawer-overlay",
                    },
                    null,
                    -1
                    /* HOISTED */
                )

                function render(_ctx, _cache, $props, $setup, $data, $options) {
                    return (
                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [
                            _hoisted_2,
                            (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" navbar  "),
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                        $setup["Navbar"],
                                        {
                                            nav: $props.nav,
                                        },
                                        {
                                            brand: (0, vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
                                                return [_hoisted_5]
                                            }),
                                            _: 1,
                                            /* STABLE */
                                        },
                                        8,
                                        /* PROPS */
                                        ["nav"]
                                    ),
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" content  "),
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_6, [
                                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(_ctx.$slots, "default"),
                                    ]),
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" footer  "),
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup["Footer"]),
                                ]),
                            ]),
                            (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [
                                _hoisted_8,
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Sidebar content here "),
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                    $setup["Navbar"],
                                    {
                                        nav: $props.nav,
                                        sidebar: true,
                                    },
                                    null,
                                    8,
                                    /* PROPS */
                                    ["nav"]
                                ),
                            ]),
                        ])
                    )
                }

                /***/
            },

        /***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/User/Dashboard.vue?vue&type=template&id=49ea5719":
            /*!*******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/User/Dashboard.vue?vue&type=template&id=49ea5719 ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ render: () => /* binding */ render,
                    /* harmony export */
                })
                /* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
                    /*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js"
                )

                var _hoisted_1 = {
                    class: "flex flex-wrap",
                }

                var _hoisted_2 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "mb-6 w-[calc(50%_-_0.5rem)] md:mr-2 -md:w-full",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "div",
                            {
                                class: "mb-3 w-full text-3xl font-bold",
                            },
                            "S1AR!"
                        ),
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "div",
                            {
                                class: "w-full",
                            },
                            " S1AR adalah Sistem 1 Atap HR untuk memudahkan karyawan AIIA mengurus administrasi terkait HR dengan lebih cepat, ringkas dan terdigitalisasi untuk transformasi era Revolusi Industri 4.0 "
                        ),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_3 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "mb-6 grid w-[calc(50%_-_0.5rem)] grid-cols-2 place-items-center gap-x-6 md:ml-2 -md:w-full",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "label",
                            {
                                for: "saldo-cuti-tahunan",
                                class: "group flex h-28 w-full cursor-pointer select-none flex-col overflow-hidden rounded-2xl bg-purple-500 text-center text-base-100 hover:shadow-lg dark:bg-purple-700 dark:text-base-content",
                            },
                            [
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                    "div",
                                    {
                                        class: "group-hover:animate-ping flex flex-[1_0] flex-col justify-center text-5xl font-bold",
                                    },
                                    " 23 "
                                ),
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                    "div",
                                    {
                                        class: "truncate rounded-b-2xl bg-purple-700 py-1 px-2 text-xl dark:bg-purple-900",
                                    },
                                    " Saldo Cuti Tahunan "
                                ),
                            ]
                        ),
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "label",
                            {
                                for: "saldo-cuti-istimewa",
                                class: "group flex h-28 w-full cursor-pointer select-none flex-col overflow-hidden rounded-2xl bg-pink-500 text-center text-base-100 hover:shadow-lg dark:bg-pink-700 dark:text-base-content",
                            },
                            [
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                    "div",
                                    {
                                        class: "group-hover:animate-ping flex flex-[1_0] flex-col justify-center text-5xl font-bold",
                                    },
                                    " 25 "
                                ),
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                    "div",
                                    {
                                        class: "truncate rounded-b-2xl bg-pink-700 py-1 px-2 text-xl dark:bg-pink-900",
                                    },
                                    " Saldo Cuti Istimewa "
                                ),
                            ]
                        ),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_4 = {
                    class: "grid w-full grid-cols-6 gap-6",
                }

                var _hoisted_5 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "img",
                    {
                        src: "/img/datadiri.jpg",
                        alt: "datadiri",
                        class: "absolute top-1/2 left-1/2 min-h-full min-w-full -translate-x-1/2 -translate-y-1/2 object-cover transition-all ease-in-out group-hover:scale-125",
                    },
                    null,
                    -1
                    /* HOISTED */
                )

                var _hoisted_6 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "relative flex h-full w-full items-end justify-center bg-black/50 transition-all ease-in-out group-hover:bg-black/20",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "div",
                            {
                                class: "flex h-11 w-full items-center justify-between bg-emerald-500/60 py-2 px-3 text-xl font-bold text-emerald-900 transition-all ease-in-out group-hover:h-16",
                            },
                            [
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                    "span",
                                    null,
                                    "Ajukan Data Diri"
                                ),
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("box-icon", {
                                    name: "chevron-right",
                                    class: "fill-current",
                                }),
                            ]
                        ),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_7 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "img",
                    {
                        src: "/img/cuti.jpg",
                        alt: "cuti",
                        class: "absolute top-1/2 left-1/2 min-h-full min-w-full -translate-x-1/2 -translate-y-1/2 object-cover transition-all ease-in-out group-hover:scale-125",
                    },
                    null,
                    -1
                    /* HOISTED */
                )

                var _hoisted_8 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "relative flex h-full w-full items-end justify-center bg-black/50 transition-all ease-in-out group-hover:bg-black/20",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "div",
                            {
                                class: "flex h-11 w-full items-center justify-between bg-sky-500/60 py-2 px-3 text-xl font-bold text-sky-900 transition-all ease-in-out group-hover:h-16",
                            },
                            [
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                    "span",
                                    null,
                                    "Ajukan Cuti"
                                ),
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("box-icon", {
                                    name: "chevron-right",
                                    class: "fill-current",
                                }),
                            ]
                        ),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_9 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "img",
                    {
                        src: "/img/izin.jpg",
                        alt: "izin",
                        class: "absolute top-1/2 left-1/2 min-h-full min-w-full -translate-x-1/2 -translate-y-1/2 object-cover transition-all ease-in-out group-hover:scale-125",
                    },
                    null,
                    -1
                    /* HOISTED */
                )

                var _hoisted_10 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "relative flex h-full w-full items-end justify-center bg-black/50 transition-all ease-in-out group-hover:bg-black/20",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "div",
                            {
                                class: "flex h-11 w-full items-center justify-between bg-amber-500/60 py-2 px-3 text-xl font-bold text-amber-900 transition-all ease-in-out group-hover:h-16",
                            },
                            [
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                    "span",
                                    null,
                                    "Ajukan Izin"
                                ),
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("box-icon", {
                                    name: "chevron-right",
                                    class: "fill-current",
                                }),
                            ]
                        ),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_11 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" lala ")

                var _hoisted_12 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" lala ")

                var _hoisted_13 = {
                    for: "saldo-cuti-tahunan",
                    class: "modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out",
                }
                var _hoisted_14 = {
                    key: 0,
                    for: "",
                    class: "modal-box relative w-11/12 max-w-4xl",
                }

                var _hoisted_15 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "label",
                    {
                        for: "saldo-cuti-tahunan",
                        class: "btn btn-circle btn-sm absolute right-4 top-4",
                    },
                    "✕",
                    -1
                    /* HOISTED */
                )

                var _hoisted_16 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "mb-2 text-2xl font-bold",
                    },
                    "Saldo Cuti Tahunan",
                    -1
                    /* HOISTED */
                )

                var _hoisted_17 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "mb-2",
                    },
                    "berikut saldo cuti tahunan anda :",
                    -1
                    /* HOISTED */
                )

                var _hoisted_18 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "overflow-x-auto",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "table",
                            {
                                class: "table-compact table w-full",
                            },
                            [
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("thead", null, [
                                    /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th"),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "Rekening"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "Hak Cuti"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "Debit"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "Saldo"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "Tenggat"
                                        ),
                                    ]),
                                ]),
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tbody", null, [
                                    /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "1"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "rekcut78922203708"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "12"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "4"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "8"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "22 Mei 2021"
                                        ),
                                    ]),
                                    /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "2"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "rekcut78922205901"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "12"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "9"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "3"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "22 November 2022"
                                        ),
                                    ]),
                                    /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "3"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "rekcut78922203748"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "12"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "0"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "12"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "22 Mei 2023"
                                        ),
                                    ]),
                                ]),
                            ]
                        ),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_19 = [_hoisted_15, _hoisted_16, _hoisted_17, _hoisted_18]
                var _hoisted_20 = {
                    for: "saldo-cuti-istimewa",
                    class: "modal cursor-pointer bg-black/50 backdrop-blur transition-all ease-in-out",
                }
                var _hoisted_21 = {
                    key: 0,
                    for: "",
                    class: "modal-box relative w-11/12 max-w-4xl",
                }

                var _hoisted_22 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "label",
                    {
                        for: "saldo-cuti-istimewa",
                        class: "btn btn-circle btn-sm absolute right-4 top-4",
                    },
                    "✕",
                    -1
                    /* HOISTED */
                )

                var _hoisted_23 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "mb-2 text-2xl font-bold",
                    },
                    "Saldo Cuti Istimewa",
                    -1
                    /* HOISTED */
                )

                var _hoisted_24 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "mb-2",
                    },
                    "berikut saldo cuti istimewa anda :",
                    -1
                    /* HOISTED */
                )

                var _hoisted_25 = /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                    "div",
                    {
                        class: "overflow-x-auto",
                    },
                    [
                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                            "table",
                            {
                                class: "table-compact table w-full",
                            },
                            [
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("thead", null, [
                                    /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th"),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "Rekening"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "Hak Cuti"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "Debit"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "Saldo"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "Tenggat"
                                        ),
                                    ]),
                                ]),
                                /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tbody", null, [
                                    /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "th",
                                            null,
                                            "1"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "rekcus78922203708"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "30"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "5"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "25"
                                        ),
                                        /*#__PURE__*/ (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                            "td",
                                            null,
                                            "22 Mei 2025"
                                        ),
                                    ]),
                                ]),
                            ]
                        ),
                    ],
                    -1
                    /* HOISTED */
                )

                var _hoisted_26 = [_hoisted_22, _hoisted_23, _hoisted_24, _hoisted_25]
                function render(_ctx, _cache, $props, $setup, $data, $options) {
                    var _component_HeadInertia = (0, vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("HeadInertia")

                    var _component_LinkInertia = (0, vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("LinkInertia")

                    var _component_file_viewer = (0, vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("file-viewer")

                    var _component_MainLayout = (0, vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("MainLayout")

                    return (
                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                            vue__WEBPACK_IMPORTED_MODULE_0__.Fragment,
                            null,
                            [
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_HeadInertia, {
                                    title: "Dashboard",
                                }),
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                    _component_MainLayout,
                                    {
                                        nav: $data.nav,
                                    },
                                    {
                                        default: (0, vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
                                            return [
                                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                    "div",
                                                    _hoisted_1,
                                                    [
                                                        _hoisted_2,
                                                        _hoisted_3,
                                                        (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                                            "div",
                                                            _hoisted_4,
                                                            [
                                                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                                                    _component_LinkInertia,
                                                                    {
                                                                        href: _ctx.route("datadiri"),
                                                                        class: "group relative col-span-2 h-60 w-full overflow-hidden rounded-2xl shadow-lg hover:shadow-lg -lg:col-span-6",
                                                                    },
                                                                    {
                                                                        default: (0,
                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                                            function () {
                                                                                return [_hoisted_5, _hoisted_6]
                                                                            }
                                                                        ),
                                                                        _: 1,
                                                                        /* STABLE */
                                                                    },
                                                                    8,
                                                                    /* PROPS */
                                                                    ["href"]
                                                                ),
                                                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                                                    _component_LinkInertia,
                                                                    {
                                                                        href: _ctx.route("cuti"),
                                                                        class: "group relative col-span-2 h-60 w-full overflow-hidden rounded-2xl shadow-lg hover:shadow-lg -lg:col-span-3 -sm:col-span-6",
                                                                    },
                                                                    {
                                                                        default: (0,
                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                                            function () {
                                                                                return [_hoisted_7, _hoisted_8]
                                                                            }
                                                                        ),
                                                                        _: 1,
                                                                        /* STABLE */
                                                                    },
                                                                    8,
                                                                    /* PROPS */
                                                                    ["href"]
                                                                ),
                                                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                                                    _component_LinkInertia,
                                                                    {
                                                                        href: _ctx.route("izin"),
                                                                        class: "group relative col-span-2 h-60 w-full overflow-hidden rounded-2xl shadow-lg hover:shadow-lg -lg:col-span-3 -sm:col-span-6",
                                                                    },
                                                                    {
                                                                        default: (0,
                                                                        vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(
                                                                            function () {
                                                                                return [_hoisted_9, _hoisted_10]
                                                                            }
                                                                        ),
                                                                        _: 1,
                                                                        /* STABLE */
                                                                    },
                                                                    8,
                                                                    /* PROPS */
                                                                    ["href"]
                                                                ),
                                                            ]
                                                        ),
                                                    ]
                                                ),
                                                _hoisted_11,
                                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                                    _component_file_viewer,
                                                    {
                                                        id: "file-viewer2",
                                                        filename: "Sample-Sales-Data.xlsx",
                                                        url: "https://go.microsoft.com/fwlink/?LinkID=521962",
                                                    }
                                                ),
                                                _hoisted_12,
                                            ]
                                        }),
                                        _: 1,
                                        /* STABLE */
                                    },
                                    8,
                                    /* PROPS */
                                    ["nav"]
                                ),
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)(
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                        "input",
                                        {
                                            type: "checkbox",
                                            id: "saldo-cuti-tahunan",
                                            class: "modal-toggle",
                                            "onUpdate:modelValue":
                                                _cache[0] ||
                                                (_cache[0] = function ($event) {
                                                    return ($data.modalCutiTahunan = $event)
                                                }),
                                        },
                                        null,
                                        512
                                        /* NEED_PATCH */
                                    ),
                                    [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.modalCutiTahunan]]
                                ),
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", _hoisted_13, [
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                        vue__WEBPACK_IMPORTED_MODULE_0__.Transition,
                                        {
                                            name: "bounce",
                                        },
                                        {
                                            default: (0, vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
                                                return [
                                                    $data.modalCutiTahunan
                                                        ? ((0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                          (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                              "label",
                                                              _hoisted_14,
                                                              _hoisted_19
                                                          ))
                                                        : (0, vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(
                                                              "v-if",
                                                              true
                                                          ),
                                                ]
                                            }),
                                            _: 1,
                                            /* STABLE */
                                        }
                                    ),
                                ]),
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)(
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(
                                        "input",
                                        {
                                            type: "checkbox",
                                            id: "saldo-cuti-istimewa",
                                            class: "modal-toggle",
                                            "onUpdate:modelValue":
                                                _cache[1] ||
                                                (_cache[1] = function ($event) {
                                                    return ($data.modalCutiIstimewa = $event)
                                                }),
                                        },
                                        null,
                                        512
                                        /* NEED_PATCH */
                                    ),
                                    [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelCheckbox, $data.modalCutiIstimewa]]
                                ),
                                (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", _hoisted_20, [
                                    (0, vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(
                                        vue__WEBPACK_IMPORTED_MODULE_0__.Transition,
                                        {
                                            name: "bounce",
                                        },
                                        {
                                            default: (0, vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
                                                return [
                                                    $data.modalCutiIstimewa
                                                        ? ((0, vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(),
                                                          (0, vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(
                                                              "label",
                                                              _hoisted_21,
                                                              _hoisted_26
                                                          ))
                                                        : (0, vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(
                                                              "v-if",
                                                              true
                                                          ),
                                                ]
                                            }),
                                            _: 1,
                                            /* STABLE */
                                        }
                                    ),
                                ]),
                            ],
                            64
                            /* STABLE_FRAGMENT */
                        )
                    )
                }

                /***/
            },

        /***/ "./resources/js/Components/Footer.vue":
            /*!********************************************!*\
  !*** ./resources/js/Components/Footer.vue ***!
  \********************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () => __WEBPACK_DEFAULT_EXPORT__,
                    /* harmony export */
                })
                /* harmony import */ var _Footer_vue_vue_type_template_id_3c0d6e26__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! ./Footer.vue?vue&type=template&id=3c0d6e26 */ "./resources/js/Components/Footer.vue?vue&type=template&id=3c0d6e26"
                    )
                /* harmony import */ var _Footer_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ =
                    __webpack_require__(
                        /*! ./Footer.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Components/Footer.vue?vue&type=script&setup=true&lang=js"
                    )
                /* harmony import */ var C_Users_itd_magang01_Projects_S1AR_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ =
                    __webpack_require__(
                        /*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js"
                    )

                const __exports__ = /*#__PURE__*/ (0,
                C_Users_itd_magang01_Projects_S1AR_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__[
                    "default"
                ])(_Footer_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [
                    ["render", _Footer_vue_vue_type_template_id_3c0d6e26__WEBPACK_IMPORTED_MODULE_0__.render],
                    ["__file", "resources/js/Components/Footer.vue"],
                ])
                /* hot reload */
                if (false) {
                }

                /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = __exports__

                /***/
            },

        /***/ "./resources/js/Components/Navbar.vue":
            /*!********************************************!*\
  !*** ./resources/js/Components/Navbar.vue ***!
  \********************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () => __WEBPACK_DEFAULT_EXPORT__,
                    /* harmony export */
                })
                /* harmony import */ var _Navbar_vue_vue_type_template_id_4a80dbca__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! ./Navbar.vue?vue&type=template&id=4a80dbca */ "./resources/js/Components/Navbar.vue?vue&type=template&id=4a80dbca"
                    )
                /* harmony import */ var _Navbar_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ =
                    __webpack_require__(
                        /*! ./Navbar.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Components/Navbar.vue?vue&type=script&setup=true&lang=js"
                    )
                /* harmony import */ var C_Users_itd_magang01_Projects_S1AR_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ =
                    __webpack_require__(
                        /*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js"
                    )

                const __exports__ = /*#__PURE__*/ (0,
                C_Users_itd_magang01_Projects_S1AR_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__[
                    "default"
                ])(_Navbar_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [
                    ["render", _Navbar_vue_vue_type_template_id_4a80dbca__WEBPACK_IMPORTED_MODULE_0__.render],
                    ["__file", "resources/js/Components/Navbar.vue"],
                ])
                /* hot reload */
                if (false) {
                }

                /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = __exports__

                /***/
            },

        /***/ "./resources/js/Layouts/Main.vue":
            /*!***************************************!*\
  !*** ./resources/js/Layouts/Main.vue ***!
  \***************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () => __WEBPACK_DEFAULT_EXPORT__,
                    /* harmony export */
                })
                /* harmony import */ var _Main_vue_vue_type_template_id_6be77c86__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! ./Main.vue?vue&type=template&id=6be77c86 */ "./resources/js/Layouts/Main.vue?vue&type=template&id=6be77c86"
                    )
                /* harmony import */ var _Main_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ =
                    __webpack_require__(
                        /*! ./Main.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Layouts/Main.vue?vue&type=script&setup=true&lang=js"
                    )
                /* harmony import */ var C_Users_itd_magang01_Projects_S1AR_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ =
                    __webpack_require__(
                        /*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js"
                    )

                const __exports__ = /*#__PURE__*/ (0,
                C_Users_itd_magang01_Projects_S1AR_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__[
                    "default"
                ])(_Main_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [
                    ["render", _Main_vue_vue_type_template_id_6be77c86__WEBPACK_IMPORTED_MODULE_0__.render],
                    ["__file", "resources/js/Layouts/Main.vue"],
                ])
                /* hot reload */
                if (false) {
                }

                /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = __exports__

                /***/
            },

        /***/ "./resources/js/Pages/User/Dashboard.vue":
            /*!***********************************************!*\
  !*** ./resources/js/Pages/User/Dashboard.vue ***!
  \***********************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () => __WEBPACK_DEFAULT_EXPORT__,
                    /* harmony export */
                })
                /* harmony import */ var _Dashboard_vue_vue_type_template_id_49ea5719__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! ./Dashboard.vue?vue&type=template&id=49ea5719 */ "./resources/js/Pages/User/Dashboard.vue?vue&type=template&id=49ea5719"
                    )
                /* harmony import */ var _Dashboard_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ =
                    __webpack_require__(
                        /*! ./Dashboard.vue?vue&type=script&lang=js */ "./resources/js/Pages/User/Dashboard.vue?vue&type=script&lang=js"
                    )
                /* harmony import */ var C_Users_itd_magang01_Projects_S1AR_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ =
                    __webpack_require__(
                        /*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js"
                    )

                const __exports__ = /*#__PURE__*/ (0,
                C_Users_itd_magang01_Projects_S1AR_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__[
                    "default"
                ])(_Dashboard_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [
                    ["render", _Dashboard_vue_vue_type_template_id_49ea5719__WEBPACK_IMPORTED_MODULE_0__.render],
                    ["__file", "resources/js/Pages/User/Dashboard.vue"],
                ])
                /* hot reload */
                if (false) {
                }

                /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = __exports__

                /***/
            },

        /***/ "./resources/js/Components/Footer.vue?vue&type=script&setup=true&lang=js":
            /*!*******************************************************************************!*\
  !*** ./resources/js/Components/Footer.vue?vue&type=script&setup=true&lang=js ***!
  \*******************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () =>
                        /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Footer_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__[
                            "default"
                        ],
                    /* harmony export */
                })
                /* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Footer_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Footer.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Footer.vue?vue&type=script&setup=true&lang=js"
                    )

                /***/
            },

        /***/ "./resources/js/Components/Navbar.vue?vue&type=script&setup=true&lang=js":
            /*!*******************************************************************************!*\
  !*** ./resources/js/Components/Navbar.vue?vue&type=script&setup=true&lang=js ***!
  \*******************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () =>
                        /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Navbar_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__[
                            "default"
                        ],
                    /* harmony export */
                })
                /* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Navbar_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Navbar.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Navbar.vue?vue&type=script&setup=true&lang=js"
                    )

                /***/
            },

        /***/ "./resources/js/Layouts/Main.vue?vue&type=script&setup=true&lang=js":
            /*!**************************************************************************!*\
  !*** ./resources/js/Layouts/Main.vue?vue&type=script&setup=true&lang=js ***!
  \**************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () =>
                        /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Main_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__[
                            "default"
                        ],
                    /* harmony export */
                })
                /* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Main_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Main.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Layouts/Main.vue?vue&type=script&setup=true&lang=js"
                    )

                /***/
            },

        /***/ "./resources/js/Pages/User/Dashboard.vue?vue&type=script&lang=js":
            /*!***********************************************************************!*\
  !*** ./resources/js/Pages/User/Dashboard.vue?vue&type=script&lang=js ***!
  \***********************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () =>
                        /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Dashboard_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__[
                            "default"
                        ],
                    /* harmony export */
                })
                /* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Dashboard_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Dashboard.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/User/Dashboard.vue?vue&type=script&lang=js"
                    )

                /***/
            },

        /***/ "./resources/js/Components/Footer.vue?vue&type=template&id=3c0d6e26":
            /*!**************************************************************************!*\
  !*** ./resources/js/Components/Footer.vue?vue&type=template&id=3c0d6e26 ***!
  \**************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ render: () =>
                        /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Footer_vue_vue_type_template_id_3c0d6e26__WEBPACK_IMPORTED_MODULE_0__.render,
                    /* harmony export */
                })
                /* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Footer_vue_vue_type_template_id_3c0d6e26__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Footer.vue?vue&type=template&id=3c0d6e26 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Footer.vue?vue&type=template&id=3c0d6e26"
                    )

                /***/
            },

        /***/ "./resources/js/Components/Navbar.vue?vue&type=template&id=4a80dbca":
            /*!**************************************************************************!*\
  !*** ./resources/js/Components/Navbar.vue?vue&type=template&id=4a80dbca ***!
  \**************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ render: () =>
                        /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Navbar_vue_vue_type_template_id_4a80dbca__WEBPACK_IMPORTED_MODULE_0__.render,
                    /* harmony export */
                })
                /* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Navbar_vue_vue_type_template_id_4a80dbca__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Navbar.vue?vue&type=template&id=4a80dbca */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Navbar.vue?vue&type=template&id=4a80dbca"
                    )

                /***/
            },

        /***/ "./resources/js/Layouts/Main.vue?vue&type=template&id=6be77c86":
            /*!*********************************************************************!*\
  !*** ./resources/js/Layouts/Main.vue?vue&type=template&id=6be77c86 ***!
  \*********************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ render: () =>
                        /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Main_vue_vue_type_template_id_6be77c86__WEBPACK_IMPORTED_MODULE_0__.render,
                    /* harmony export */
                })
                /* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Main_vue_vue_type_template_id_6be77c86__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Main.vue?vue&type=template&id=6be77c86 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Layouts/Main.vue?vue&type=template&id=6be77c86"
                    )

                /***/
            },

        /***/ "./resources/js/Pages/User/Dashboard.vue?vue&type=template&id=49ea5719":
            /*!*****************************************************************************!*\
  !*** ./resources/js/Pages/User/Dashboard.vue?vue&type=template&id=49ea5719 ***!
  \*****************************************************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ render: () =>
                        /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Dashboard_vue_vue_type_template_id_49ea5719__WEBPACK_IMPORTED_MODULE_0__.render,
                    /* harmony export */
                })
                /* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Dashboard_vue_vue_type_template_id_49ea5719__WEBPACK_IMPORTED_MODULE_0__ =
                    __webpack_require__(
                        /*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Dashboard.vue?vue&type=template&id=49ea5719 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/User/Dashboard.vue?vue&type=template&id=49ea5719"
                    )

                /***/
            },
    },
])
