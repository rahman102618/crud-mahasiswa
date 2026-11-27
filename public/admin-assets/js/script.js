
/**
 * NESATECH - ADMIN DASHBOARD
 * JavaScript frontend Laravel
 *
 * Data masih contoh (demo).
 * Belum terhubung ke database MySQL.
 */

// Grafik
let currentRevenueChart = null;
let currentReportChart = null;

// Mencegah input HTML masuk ke tabel
function escapeHtml(value) {
    return String(value ?? "").replace(/[&<>"']/g, function (ch) {
        return {
            "&": "&amp;",
            "<": "&lt;",
            ">": "&gt;",
            '"': "&quot;",
            "'": "&#39;"
        }[ch];
    });
}

// Download CSV
function downloadCsv(filename, lines) {
    const blob = new Blob(
        ["\uFEFF" + lines.join("\r\n")],
        { type: "text/csv;charset=utf-8;" }
    );

    const url = URL.createObjectURL(blob);
    const link = document.createElement("a");

    link.href = url;
    link.download = filename;

    document.body.appendChild(link);
    link.click();
    link.remove();

    setTimeout(function () {
        URL.revokeObjectURL(url);
    }, 1000);
}


// ========================================
// NAVIGASI ADMIN
// ========================================

function setActiveMenu(pageName) {
    const page = pageName || document.body.dataset.page || "";

    document.querySelectorAll(".nav-link-custom[data-page]")
        .forEach(function (link) {
            link.classList.toggle(
                "active",
                link.dataset.page === page
            );
        });
}


// ========================================
// DASHBOARD STATISTIK
// ========================================

function initRevenueChart() {
    const canvas = document.getElementById("revenueChart");

    if (!canvas || typeof Chart === "undefined") {
        return;
    }

    if (currentRevenueChart) {
        currentRevenueChart.destroy();
        currentRevenueChart = null;
    }

    const labels = [
        "1", "3", "5", "7", "9", "11",
        "13", "15", "17", "19", "21", "23"
    ];

    const data = [
        26, 36, 25, 52, 43, 68,
        54, 76, 64, 82, 72, 90
    ];

    const nominals = [
        750000, 1050000, 720000, 1500000,
        1250000, 1950000, 1550000, 2200000,
        1850000, 3650000, 3400000, 4980000
    ];

    const bgColors = labels.map(function (_, i) {
        return i >= 9 ? "#2563eb" : "#cdd9fe";
    });

    const hoverColors = labels.map(function (_, i) {
        return i >= 9 ? "#1d4ed8" : "#b8c9fb";
    });

    currentRevenueChart = new Chart(canvas.getContext("2d"), {
        type: "bar",

        data: {
            labels: labels,

            datasets: [{
                data: data,
                backgroundColor: bgColors,
                hoverBackgroundColor: hoverColors,
                borderRadius: 5,
                borderSkipped: false,
                barPercentage: 0.62,
                categoryPercentage: 0.82
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            animation: {
                duration: 350
            },

            plugins: {
                legend: {
                    display: false
                },

                tooltip: {
                    backgroundColor: "#0f172a",
                    titleColor: "#fff",
                    bodyColor: "#e2e8f0",
                    padding: 10,
                    cornerRadius: 6,
                    displayColors: false,

                    callbacks: {
                        title: function (items) {
                            return `Tanggal ${items[0].label} Nov 2026`;
                        },

                        label: function (ctx) {
                            return "Rp " +
                                nominals[ctx.dataIndex]
                                    .toLocaleString("id-ID");
                        }
                    }
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    },

                    ticks: {
                        color: "#94a3b8",
                        font: {
                            size: 11
                        }
                    }
                },

                y: {
                    display: false,
                    beginAtZero: true
                }
            }
        }
    });
}


// ========================================
// PENCARIAN TABEL
// ========================================

function initTableFilter(inputId, tableId) {
    const input = document.getElementById(inputId);
    const table = document.getElementById(tableId);

    if (!input || !table) {
        return;
    }

    input.addEventListener("input", function () {
        const keyword = input.value.toLowerCase().trim();

        table.querySelectorAll("tbody tr").forEach(function (row) {
            const matches = row.textContent
                .toLowerCase()
                .includes(keyword);

            row.style.display = matches ? "" : "none";
        });
    });
}


// ========================================
// CRUD TEMPLATE
// ========================================

window.initCrudTemplateApp = function () {

    let templates = [
        {
            id: 1,
            name: "Modern Sage",
            category: "Pernikahan",
            price: "Rp149.000",
            usage: "128 undangan",
            status: "Aktif"
        },
        {
            id: 2,
            name: "Royal Navy",
            category: "Pernikahan",
            price: "Rp199.000",
            usage: "86 undangan",
            status: "Aktif"
        },
        {
            id: 3,
            name: "Blush Minimal",
            category: "Pernikahan",
            price: "Rp149.000",
            usage: "64 undangan",
            status: "Aktif"
        },
        {
            id: 4,
            name: "Celebration",
            category: "Ulang tahun",
            price: "Rp99.000",
            usage: "32 undangan",
            status: "Aktif"
        },
        {
            id: 5,
            name: "Corporate Blue",
            category: "Acara bisnis",
            price: "Rp199.000",
            usage: "18 undangan",
            status: "Draft"
        }
    ];

    const totalDatasetCount = 48;

    const tableBody = document.getElementById("crudTableBody");
    const searchInput = document.getElementById("crudSearchInput");
    const categoryFilter = document.getElementById("crudCategoryFilter");

    const templateForm = document.getElementById("templateForm");
    const editIndexField = document.getElementById("editIndex");

    const inputNama = document.getElementById("inputNamaTemplate");
    const selectKategori = document.getElementById("selectKategoriTemplate");
    const inputHarga = document.getElementById("inputHargaTemplate");
    const selectStatus = document.getElementById("selectStatusTemplate");

    const btnCancel = document.getElementById("btnCancelEdit");
    const btnSubmit = document.getElementById("btnSubmitForm");
    const btnScrollTambah = document.getElementById("btnScrollTambah");

    const formCard = document.getElementById("formTemplateCard");

    const toast = document.getElementById("crudToast");
    const toastMsg = document.getElementById("crudToastMsg");

    if (!tableBody || !templateForm) {
        return;
    }

    function showToast(message) {
        if (!toast || !toastMsg) return;

        toastMsg.textContent = message;
        toast.classList.add("show");

        setTimeout(function () {
            toast.classList.remove("show");
        }, 3000);
    }

    function updateStats() {
        const aktif = templates.filter(function (item) {
            return item.status === "Aktif";
        }).length;

        const draft = templates.filter(function (item) {
            return item.status === "Draft";
        }).length;

        const semuaEl = document.getElementById("statSemuaTemplate");
        const aktifEl = document.getElementById("statTemplateAktif");
        const draftEl = document.getElementById("statTemplateDraft");

        if (semuaEl) {
            semuaEl.textContent = totalDatasetCount + (templates.length - 5);
        }

        if (aktifEl) {
            aktifEl.textContent = 42 + (aktif - 4);
        }

        if (draftEl) {
            draftEl.textContent = 6 + (draft - 1);
        }
    }

    function renderTable() {
        const keyword = searchInput
            ? searchInput.value.toLowerCase().trim()
            : "";

        const category = categoryFilter
            ? categoryFilter.value.toLowerCase()
            : "";

        tableBody.innerHTML = "";

        const filtered = templates.filter(function (item) {
            const matchesName = item.name
                .toLowerCase()
                .includes(keyword);

            const matchesCategory = !category ||
                item.category.toLowerCase() === category;

            return matchesName && matchesCategory;
        });

        if (filtered.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        Tidak ada template yang sesuai.
                    </td>
                </tr>
            `;
        }

        filtered.forEach(function (item) {
            const badgeClass = item.status === "Aktif"
                ? "badge-status-aktif"
                : "badge-status-draft";

            const row = document.createElement("tr");

            row.innerHTML = `
                <td>
                    <span class="tpl-link-name" data-id="${item.id}">
                        ${escapeHtml(item.name)}
                    </span>
                </td>

                <td>
                    <span class="tpl-category">
                        ${escapeHtml(item.category)}
                    </span>
                </td>

                <td>
                    <span class="tpl-price">
                        ${escapeHtml(item.price)}
                    </span>
                </td>

                <td>
                    <span class="tpl-usage">
                        ${escapeHtml(item.usage)}
                    </span>
                </td>

                <td>
                    <span class="badge-status-pill ${badgeClass}">
                        ${escapeHtml(item.status)}
                    </span>
                </td>

                <td>
                    <a href="#" class="action-link-item action-btn-edit"
                       data-id="${item.id}">Edit</a>

                    <span class="action-separator">-</span>

                    <a href="#" class="action-link-item action-link-del action-btn-del"
                       data-id="${item.id}">Hapus</a>
                </td>
            `;

            tableBody.appendChild(row);
        });

        const countEl = document.getElementById("crudDataCount");

        if (countEl) {
            const total = totalDatasetCount + (templates.length - 5);

            countEl.textContent = filtered.length
                ? `Menampilkan 1–${filtered.length} dari ${total} data`
                : "Menampilkan 0 data";
        }
    }

    function resetForm() {
        if (editIndexField) editIndexField.value = "-1";

        templateForm.reset();

        if (selectKategori) selectKategori.value = "Pernikahan";
        if (selectStatus) selectStatus.value = "Aktif";
        if (btnSubmit) btnSubmit.textContent = "Simpan template";

        if (btnCancel) {
            btnCancel.classList.add("d-none");
        }
    }

    function editTemplate(id) {
        const item = templates.find(function (template) {
            return template.id === id;
        });

        if (!item) return;

        editIndexField.value = item.id;
        inputNama.value = item.name;
        selectKategori.value = item.category;
        inputHarga.value = item.price;
        selectStatus.value = item.status;

        btnSubmit.textContent = "Simpan perubahan";
        btnCancel.classList.remove("d-none");

        formCard.scrollIntoView({
            behavior: "smooth",
            block: "center"
        });

        inputNama.focus();
    }

    tableBody.addEventListener("click", function (event) {
        const editButton = event.target.closest(
            ".action-btn-edit, .tpl-link-name"
        );

        const deleteButton = event.target.closest(".action-btn-del");

        if (editButton) {
            event.preventDefault();
            editTemplate(Number(editButton.dataset.id));
        }

        if (deleteButton) {
            event.preventDefault();

            const id = Number(deleteButton.dataset.id);
            const item = templates.find(t => t.id === id);

            if (!item) return;

            const confirmed = confirm(
                `Yakin ingin menghapus template "${item.name}"?`
            );

            if (!confirmed) return;

            templates = templates.filter(t => t.id !== id);

            renderTable();
            updateStats();
            showToast("Template berhasil dihapus (demo).");

            if (Number(editIndexField.value) === id) {
                resetForm();
            }
        }
    });

    templateForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const nama = inputNama.value.trim();
        const kategori = selectKategori.value;
        let harga = inputHarga.value.trim();
        const status = selectStatus.value;

        if (!nama || !harga) {
            alert("Nama dan harga template wajib diisi.");
            return;
        }

        if (!harga.startsWith("Rp")) {
            harga = "Rp" + harga;
        }

        const currentId = Number(editIndexField.value);

        if (currentId > 0) {
            const item = templates.find(t => t.id === currentId);

            if (item) {
                item.name = nama;
                item.category = kategori;
                item.price = harga;
                item.status = status;
            }

            showToast("Template berhasil diperbarui (demo).");
        } else {
            const nextId = templates.length
                ? Math.max(...templates.map(t => t.id)) + 1
                : 1;

            templates.unshift({
                id: nextId,
                name: nama,
                category: kategori,
                price: harga,
                usage: "0 undangan",
                status: status
            });

            showToast("Template berhasil ditambahkan (demo).");
        }

        resetForm();
        renderTable();
        updateStats();

        document.querySelector(".crud-card")?.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
    });

    if (btnCancel) {
        btnCancel.addEventListener("click", resetForm);
    }

    if (btnScrollTambah) {
        btnScrollTambah.addEventListener("click", function () {
            resetForm();

            formCard.scrollIntoView({
                behavior: "smooth",
                block: "center"
            });

            inputNama.focus();
        });
    }

    if (searchInput) {
        searchInput.addEventListener("input", renderTable);
    }

    if (categoryFilter) {
        categoryFilter.addEventListener("change", renderTable);
    }

    renderTable();
    updateStats();
};


// ========================================
// KELOLA PESANAN
// ========================================

window.initPesananApp = function () {

    let orders = [
        {
            id: "INV-0326",
            customer: "Ardi Pratama",
            template: "Modern Sage",
            package: "Modern Sage - Premium",
            total: "Rp149.000",
            status: "Lunas",
            method: "BCA Virtual Account",
            paymentInfo: "Bank transfer - Dibayar 21 November 2026"
        },
        {
            id: "INV-0325",
            customer: "Nadia Putri",
            template: "Royal Navy",
            package: "Royal Navy - Exclusive",
            total: "Rp199.000",
            status: "Pending",
            method: "Mandiri Virtual Account",
            paymentInfo: "Menunggu pembayaran"
        },
        {
            id: "INV-0324",
            customer: "Rizky Aditya",
            template: "Blush Minimal",
            package: "Blush Minimal - Premium",
            total: "Rp149.000",
            status: "Lunas",
            method: "QRIS",
            paymentInfo: "Pembayaran QRIS - 20 November 2026"
        },
        {
            id: "INV-0323",
            customer: "Sinta Maharani",
            template: "Celebration",
            package: "Celebration - Standard",
            total: "Rp99.000",
            status: "Lunas",
            method: "GoPay / E-Wallet",
            paymentInfo: "Pembayaran GoPay"
        },
        {
            id: "INV-0322",
            customer: "Dimas Saputra",
            template: "Modern Sage",
            package: "Modern Sage - Premium",
            total: "Rp149.000",
            status: "Dibatalkan",
            method: "BCA Virtual Account",
            paymentInfo: "Pembayaran dibatalkan"
        }
    ];

    let selectedOrder = orders[0];

    let statLunas = 268;
    let statPending = 42;
    let statBatal = 16;
    let statTotal = 326;

    const tbody = document.getElementById("ordersTableBody");
    const search = document.getElementById("orderSearchInput");
    const statusFilter = document.getElementById("orderStatusFilter");
    const methodFilter = document.getElementById("orderMethodFilter");

    const exportButton = document.getElementById("btnExportCsv");
    const invoiceButton = document.getElementById("btnDownloadInvoice");

    const toast = document.getElementById("orderToast");
    const toastMsg = document.getElementById("orderToastMsg");

    if (!tbody) return;

    function showToast(message) {
        if (!toast || !toastMsg) return;

        toastMsg.textContent = message;
        toast.classList.add("show");

        setTimeout(function () {
            toast.classList.remove("show");
        }, 3000);
    }

    function updateStats() {
        const values = {
            statPembayaranLunas: statLunas,
            statMenungguBayar: statPending,
            statDibatalkan: statBatal,
            statTotalPesanan: statTotal
        };

        Object.keys(values).forEach(function (id) {
            const element = document.getElementById(id);

            if (element) {
                element.textContent = values[id];
            }
        });
    }

    function selectOrder(order) {
        selectedOrder = order;

        const fields = {
            detailHeading: `#${order.id} / ${order.customer}`,
            detailSubtitle: order.paymentInfo,
            detailPackage: order.package,
            detailSubtotal: order.total,
            detailTotal: order.total
        };

        Object.keys(fields).forEach(function (id) {
            const element = document.getElementById(id);

            if (element) {
                element.textContent = fields[id];
            }
        });
    }

    function renderOrders() {
        const keyword = search
            ? search.value.toLowerCase().trim()
            : "";

        const status = statusFilter
            ? statusFilter.value.toLowerCase()
            : "";

        const method = methodFilter
            ? methodFilter.value.toLowerCase()
            : "";

        tbody.innerHTML = "";

        const filtered = orders.filter(function (item) {
            const matchesKeyword = [
                item.id,
                item.customer,
                item.template
            ].some(value =>
                value.toLowerCase().includes(keyword)
            );

            const matchesStatus = !status ||
                item.status.toLowerCase() === status;

            const matchesMethod = !method ||
                item.method.toLowerCase() === method;

            return matchesKeyword && matchesStatus && matchesMethod;
        });

        if (!filtered.length) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-4">
                        Tidak ada pesanan yang sesuai.
                    </td>
                </tr>
            `;
        }

        filtered.forEach(function (item) {
            let badgeClass = "badge-status-lunas";

            if (item.status === "Pending") {
                badgeClass = "badge-status-pending";
            }

            if (item.status === "Dibatalkan") {
                badgeClass = "badge-status-batal";
            }

            const action = item.status === "Pending"
                ? `<a href="#" class="action-konfirmasi-link action-confirm-btn"
                       data-id="${item.id}">Konfirmasi</a>`
                : `<a href="#" class="action-order-link action-detail-btn"
                       data-id="${item.id}">Detail ↗</a>`;

            const row = document.createElement("tr");

            row.dataset.id = item.id;

            if (selectedOrder?.id === item.id) {
                row.classList.add("active-row");
            }

            row.innerHTML = `
                <td>
                    <span class="order-id-link action-select-order"
                          data-id="${item.id}">
                        #${escapeHtml(item.id)}
                    </span>
                </td>

                <td>
                    <span class="order-customer">
                        ${escapeHtml(item.customer)}
                    </span>
                </td>

                <td>
                    <span class="order-template">
                        ${escapeHtml(item.template)}
                    </span>
                </td>

                <td>
                    <span class="order-total-price">
                        ${escapeHtml(item.total)}
                    </span>
                </td>

                <td>
                    <span class="badge-order-status ${badgeClass}">
                        ${escapeHtml(item.status)}
                    </span>
                </td>

                <td>${action}</td>
            `;

            tbody.appendChild(row);
        });

        const count = document.getElementById("orderDataCount");

        if (count) {
            count.textContent = filtered.length
                ? `Menampilkan 1–${filtered.length} dari ${statTotal} data`
                : "Menampilkan 0 data";
        }
    }

    tbody.addEventListener("click", function (event) {
        const confirmButton = event.target.closest(".action-confirm-btn");

        const detailButton = event.target.closest(
            ".action-detail-btn, .action-select-order"
        );

        if (confirmButton) {
            event.preventDefault();

            const order = orders.find(
                item => item.id === confirmButton.dataset.id
            );

            if (!order) return;

            order.status = "Lunas";
            order.paymentInfo = "Pembayaran dikonfirmasi (demo)";

            statLunas++;
            statPending--;

            selectOrder(order);
            updateStats();
            renderOrders();

            showToast("Status pembayaran diubah (demo saja).");
        }

        if (detailButton) {
            event.preventDefault();

            const order = orders.find(
                item => item.id === detailButton.dataset.id
            );

            if (!order) return;

            selectOrder(order);
            renderOrders();

            document.getElementById("orderDetailCard")
                ?.scrollIntoView({
                    behavior: "smooth",
                    block: "center"
                });
        }
    });

    if (exportButton) {
        exportButton.addEventListener("click", function () {
            const headers = [
                "ID Pesanan",
                "Pelanggan",
                "Template",
                "Paket",
                "Total",
                "Status",
                "Metode Pembayaran"
            ];

            const rows = orders.map(function (item) {
                return [
                    item.id,
                    item.customer,
                    item.template,
                    item.package,
                    item.total,
                    item.status,
                    item.method
                ].map(value =>
                    '"' + String(value).replace(/"/g, '""') + '"'
                ).join(",");
            });

            downloadCsv(
                "laporan_pesanan_nesatech.csv",
                [headers.join(","), ...rows]
            );

            showToast("Data demo berhasil diekspor ke CSV.");
        });
    }

    if (invoiceButton) {
        invoiceButton.addEventListener("click", function () {
            showToast("Download invoice belum tersedia.");
        });
    }

    if (search) search.addEventListener("input", renderOrders);

    if (statusFilter) {
        statusFilter.addEventListener("change", renderOrders);
    }

    if (methodFilter) {
        methodFilter.addEventListener("change", renderOrders);
    }

    updateStats();
    renderOrders();
    selectOrder(orders[0]);
};


// ========================================
// KELOLA PENGGUNA
// ========================================

window.initPenggunaApp = function () {

    let users = [
        {
            id: 1,
            name: "Ardi Pratama",
            email: "ardi@email.com",
            role: "Customer",
            joined: "12 Nov 2026",
            status: "Aktif"
        },
        {
            id: 2,
            name: "Nadia Putri",
            email: "nadia@email.com",
            role: "Customer",
            joined: "14 Nov 2026",
            status: "Aktif"
        },
        {
            id: 3,
            name: "Rizky Aditya",
            email: "rizky@email.com",
            role: "Customer",
            joined: "15 Nov 2026",
            status: "Aktif"
        },
        {
            id: 4,
            name: "Sinta Maharani",
            email: "sinta@email.com",
            role: "Customer",
            joined: "17 Nov 2026",
            status: "Aktif"
        },
        {
            id: 5,
            name: "Rani Admin",
            email: "rani@nesatech.test",
            role: "Admin",
            joined: "01 Nov 2026",
            status: "Aktif"
        }
    ];

    const tbody = document.getElementById("usersTableBody");
    const search = document.getElementById("userSearchInput");
    const roleFilter = document.getElementById("userRoleFilter");

    const saveButton = document.getElementById("btnSaveUser");
    const addButton = document.getElementById("btnAddUser");

    const modalElement = document.getElementById("userModal");

    const toast = document.getElementById("userToast");
    const toastMsg = document.getElementById("userToastMsg");

    if (!tbody) return;

    function showToast(message) {
        if (!toast || !toastMsg) return;

        toastMsg.textContent = message;
        toast.classList.add("show");

        setTimeout(function () {
            toast.classList.remove("show");
        }, 3000);
    }

    function renderUsers() {
        const keyword = search
            ? search.value.toLowerCase().trim()
            : "";

        const role = roleFilter
            ? roleFilter.value.toLowerCase()
            : "";

        tbody.innerHTML = "";

        const filtered = users.filter(function (item) {
            const matchesKeyword =
                item.name.toLowerCase().includes(keyword) ||
                item.email.toLowerCase().includes(keyword);

            const matchesRole = !role ||
                item.role.toLowerCase() === role;

            return matchesKeyword && matchesRole;
        });

        if (!filtered.length) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-4">
                        Tidak ada pengguna yang sesuai.
                    </td>
                </tr>
            `;
        }

        filtered.forEach(function (item) {
            const row = document.createElement("tr");

            row.innerHTML = `
                <td>
                    <a href="#" class="user-name-link"
                       data-id="${item.id}">
                        ${escapeHtml(item.name)}
                    </a>
                </td>

                <td>
                    <span class="user-email-text">
                        ${escapeHtml(item.email)}
                    </span>
                </td>

                <td>
                    <span class="user-role-text">
                        ${escapeHtml(item.role)}
                    </span>
                </td>

                <td>
                    <span class="user-join-date">
                        ${escapeHtml(item.joined)}
                    </span>
                </td>

                <td>
                    <span class="badge-status-pill badge-status-aktif">
                        ${escapeHtml(item.status)}
                    </span>
                </td>

                <td>
                    <a href="#" class="action-order-link btn-user-detail"
                       data-id="${item.id}">Detail</a>

                    <span> · </span>

                    <a href="#" class="action-order-link btn-user-edit"
                       data-id="${item.id}">Edit</a>
                </td>
            `;

            tbody.appendChild(row);
        });

        const count = document.getElementById("userDataCount");

        if (count) {
            count.textContent = filtered.length
                ? `Menampilkan 1–${filtered.length} dari 1248 data`
                : "Menampilkan 0 data";
        }
    }

    function resetUserForm() {
        const id = document.getElementById("editUserId");
        const name = document.getElementById("inputUserName");
        const email = document.getElementById("inputUserEmail");
        const role = document.getElementById("selectUserRole");
        const title = document.getElementById("userModalTitle");

        if (id) id.value = "";
        if (name) name.value = "";
        if (email) email.value = "";
        if (role) role.value = "Customer";
        if (title) title.textContent = "Tambah Pengguna Baru";
    }

    tbody.addEventListener("click", function (event) {
        const detailButton = event.target.closest(
            ".btn-user-detail, .user-name-link"
        );

        const editButton = event.target.closest(".btn-user-edit");

        if (detailButton) {
            event.preventDefault();

            const user = users.find(
                item => item.id === Number(detailButton.dataset.id)
            );

            if (user) {
                showToast(`Profil ${user.name} - ${user.role}`);
            }
        }

        if (editButton) {
            event.preventDefault();

            const user = users.find(
                item => item.id === Number(editButton.dataset.id)
            );

            if (!user) return;

            document.getElementById("editUserId").value = user.id;
            document.getElementById("inputUserName").value = user.name;
            document.getElementById("inputUserEmail").value = user.email;
            document.getElementById("selectUserRole").value = user.role;
            document.getElementById("userModalTitle").textContent =
                "Edit Pengguna";

            if (modalElement && typeof bootstrap !== "undefined") {
                bootstrap.Modal
                    .getOrCreateInstance(modalElement)
                    .show();
            }
        }
    });

    if (saveButton) {
        saveButton.addEventListener("click", function () {
            const idInput = document.getElementById("editUserId");
            const nameInput = document.getElementById("inputUserName");
            const emailInput = document.getElementById("inputUserEmail");
            const roleInput = document.getElementById("selectUserRole");

            if (!nameInput || !emailInput || !roleInput) return;

            const name = nameInput.value.trim();
            const email = emailInput.value.trim();
            const role = roleInput.value;

            if (!name || !email) {
                alert("Nama dan email wajib diisi.");
                return;
            }

            const id = Number(idInput?.value || 0);

            if (id) {
                const user = users.find(item => item.id === id);

                if (user) {
                    user.name = name;
                    user.email = email;
                    user.role = role;
                }

                showToast("Pengguna berhasil diperbarui (demo).");
            } else {
                users.unshift({
                    id: Date.now(),
                    name: name,
                    email: email,
                    role: role,
                    joined: new Date().toLocaleDateString("id-ID"),
                    status: "Aktif"
                });

                showToast("Pengguna berhasil ditambahkan (demo).");
            }

            if (modalElement && typeof bootstrap !== "undefined") {
                bootstrap.Modal
                    .getInstance(modalElement)
                    ?.hide();
            }

            resetUserForm();
            renderUsers();
        });
    }

    if (addButton) {
        addButton.addEventListener("click", resetUserForm);
    }

    if (search) search.addEventListener("input", renderUsers);

    if (roleFilter) {
        roleFilter.addEventListener("change", renderUsers);
    }

    renderUsers();
};


// ========================================
// LAPORAN
// ========================================

window.initLaporanApp = function () {

    const canvas = document.getElementById("reportRevenueChart");

    if (canvas && typeof Chart !== "undefined") {
        if (currentReportChart) {
            currentReportChart.destroy();
            currentReportChart = null;
        }

        const labels = [
            "1", "3", "5", "7", "9", "11",
            "13", "15", "17", "19", "21", "23"
        ];

        const data = [
            26, 36, 25, 52, 43, 68,
            54, 76, 64, 82, 72, 90
        ];

        currentReportChart = new Chart(
            canvas.getContext("2d"),
            {
                type: "bar",

                data: {
                    labels: labels,

                    datasets: [{
                        data: data,
                        backgroundColor: "#cdd9fe",
                        hoverBackgroundColor: "#2563eb",
                        borderRadius: 5
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    plugins: {
                        legend: {
                            display: false
                        }
                    },

                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },

                        y: {
                            display: false,
                            beginAtZero: true
                        }
                    }
                }
            }
        );
    }

    const toast = document.getElementById("reportToast");
    const toastMsg = document.getElementById("reportToastMsg");

    function showToast(message) {
        if (!toast || !toastMsg) return;

        toastMsg.textContent = message;
        toast.classList.add("show");

        setTimeout(function () {
            toast.classList.remove("show");
        }, 3000);
    }

    const pdfButton = document.getElementById(
        "btnDownloadPdfReport"
    );

    if (pdfButton) {
        pdfButton.addEventListener("click", function () {
            showToast("Ekspor PDF belum tersedia pada versi demo.");
        });
    }

    const csvButton = document.getElementById(
        "btnExportCsvReport"
    );

    if (csvButton) {
        csvButton.addEventListener("click", function () {
            const rows = [
                "Kategori,Pesanan,Lunas,Pendapatan,Status",
                '"Pernikahan",254,210,"Rp20.850.000","Selesai"',
                '"Ulang tahun",48,38,"Rp2.500.000","Selesai"',
                '"Acara bisnis",24,20,"Rp1.500.000","Selesai"'
            ];

            downloadCsv(
                "laporan_nesatech.csv",
                rows
            );

            showToast("Laporan demo berhasil diekspor ke CSV.");
        });
    }

    document.querySelectorAll(".report-category-action")
        .forEach(function (button) {
            button.addEventListener("click", function (event) {
                event.preventDefault();

                showToast(
                    "Rincian kategori belum tersedia pada versi demo."
                );
            });
        });
};


// ========================================
// MENJALANKAN HALAMAN ADMIN
// ========================================

function initPage(pageName) {
    setActiveMenu(pageName);

    if (pageName === "dashboard") {
        initRevenueChart();

        initTableFilter(
            "searchInput",
            "recentOrdersTable"
        );
    }

    if (pageName === "crud-template") {
        window.initCrudTemplateApp();
    }

    if (pageName === "pesanan") {
        window.initPesananApp();
    }

    if (pageName === "pengguna") {
        window.initPenggunaApp();
    }

    if (pageName === "laporan") {
        window.initLaporanApp();
    }

    // Bootstrap Tooltip
    if (typeof bootstrap !== "undefined") {
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
            .forEach(function (element) {
                new bootstrap.Tooltip(element);
            });
    }
}


// ========================================
// SAAT HALAMAN SELESAI DIMUAT
// ========================================

document.addEventListener("DOMContentLoaded", function () {
    const page = document.body.dataset.page || "dashboard";

    initPage(page);
});
