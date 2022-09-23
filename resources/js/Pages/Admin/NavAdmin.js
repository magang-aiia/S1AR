function getNav(parentActive = "", childActive = "") {
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

export default getNav
