"use strict"
;(self["webpackChunk"] = self["webpackChunk"] || []).push([
    ["resources_js_Pages_Admin_NavAdmin_js"],
    {
        /***/ "./resources/js/Pages/Admin/NavAdmin.js":
            /*!**********************************************!*\
  !*** ./resources/js/Pages/Admin/NavAdmin.js ***!
  \**********************************************/
            /***/ (__unused_webpack_module, __webpack_exports__, __webpack_require__) => {
                __webpack_require__.r(__webpack_exports__)
                /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */ default: () => __WEBPACK_DEFAULT_EXPORT__,
                    /* harmony export */
                })
                function getNav() {
                    var parentActive = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : ""
                    var childActive = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : ""
                    return [
                        {
                            name: "Dashboard",
                            active: parentActive === "dashboard",
                            to: "admin.dashboard",
                            icon: "home",
                            iconType: "regular",
                            child: [],
                        },
                        {
                            name: "Cuzia",
                            active: parentActive === "cuzia",
                            to: "admin.cuzia",
                            icon: "book-content",
                            iconType: "regular",
                            child: [],
                        },
                        {
                            name: "Absensi",
                            active: parentActive === "absensi",
                            to: "admin.absensi",
                            icon: "calendar-check",
                            iconType: "regular",
                            child: [],
                        },
                        {
                            name: "Karyawan",
                            active: parentActive === "karyawan",
                            to: "admin.karyawan",
                            icon: "user",
                            iconType: "regular",
                            child: [],
                        },
                    ]
                }

                /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = getNav

                /***/
            },
    },
])
