"use strict"
;(self["webpackChunk"] = self["webpackChunk"] || []).push([
    ["resources_js_Pages_User_NavUser_js"],
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
    },
])
