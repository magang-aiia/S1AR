function getNav(parentActive = "", childActive = "", isAtasan = false) {
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

export default getNav
