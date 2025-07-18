@section('title', __(''))
<x-layouts.app :title="__('')">
    @push('styles')
        <link href="https://unpkg.com/tabulator-tables@5.6.0/dist/css/tabulator.min.css" rel="stylesheet">
        <style>
            .tabulator-wrapper {
                overflow-x: auto;
            }

            .toast-success {
                background-color: #28a745;
            }

            .toast-error {
                background-color: #dc3545;
            }

            #example-table {
                word-wrap: break-word;
                white-space: normal;
                background-color: white;
                min-width: 800px;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .tabulator-paginator {
                display: flex !important;
                justify-content: flex-start !important;
                flex-wrap: wrap;
                justify-content: flex-start;
                align-items: center;
                padding-left: 10px;
                gap: 8px;
            }

            .tabulator-cell {
                font-size: 14px;
            }

            .card {
                margin-top: 20px;
            }

            .tab-scroll-wrapper {
                border-bottom: 1px solid #dee2e6;
                padding-bottom: 5px;
            }

            .tab-scroll-wrapper {
                display: inline-block;
                /* display: flex; */
                align-items: center;
                overflow-x: hidden;
                max-width: 100%;
                padding-bottom: 5px;
                border-bottom: 1px solid #dee2e6;
                white-space: nowrap;
                position: relative;
            }

            .tabulator .tabulator-cell {
                white-space: normal !important;
                word-wrap: break-word;
            }


            #tabSwitcher .btn {
                border-radius: 0;
                font-size: 14px;
                border-bottom: 2px solid transparent;
                color: #495057;
                padding: 6px 10px;
                background-color: transparent;
            }

            #tabSwitcher .btn.active {
                font-weight: bold;
                color: #007bff;
                border-bottom: 2px solid #007bff;
            }

            .dropdown-menu .dropdown-item.active {
                font-weight: bold;
                color: #007bff;
                background-color: #e9ecef;
            }

            /* modall */
            .modal {
                display: none;
                position: fixed;
                z-index: 1050;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.4);
                padding: 1rem;
            }

            .modal-content {
                background-color: #fff;
                margin: 5% auto;
                padding: 20px;
                width: 100%;
                max-width: 600px;
                border-radius: 10px;
                position: relative;
                z-index: 9999;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                cursor: pointer;
            }

            .close:hover {
                color: red;
            }

            #search-input,
            button {
                height: 40px;
            }


            @media screen and (max-width: 768px) {
                .tabulator .tabulator-header {
                    font-size: 12px;
                }

                .tabulator .tabulator-cell {
                    font-size: 12px;
                }
            }
        </style>
    @endpush

    <div class="card">
        <div class="card-body d-flex flex-column">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                <h5 class="card-title mb-3 mb-md-0">Rencana Pemeliharaan SOR 2 2025</h5>
                <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                    <input id="search-input" type="text" class="form-control" placeholder="Search data..."
                        style="max-width: 200px;">
                    <button class="btn btn-outline-secondary h-100" type="button"
                        onclick="clearSearch()">Clear</button>
                    <button class="btn btn-primary px-4 py-2" id="download-xlsx" style="white-space: nowrap;">
                        Export Excel
                    </button>
                </div>
            </div>

            <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                <button onclick="openModal()" class="btn btn-primary px-4 py-2" style="white-space: nowrap;">
                    Create Data
                </button>

                <div class="dropdown me-2 position-relative" style="z-index: 1050;">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="tabDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Navigasi
                    </button>
                    <ul class="dropdown-menu" id="tabDropdownList" style="max-height: 300px; overflow-y: auto;">
                        @foreach ($tabs as $tab)
                            <li>
                                <a class="dropdown-item {{ $tab['active'] ? 'active' : '' }}"
                                    href="{{ $tab['route'] }}">
                                    {{ $tab['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-scroll-wrapper d-flex align-items-center flex-grow-1 overflow-auto"
                    style="scroll-behavior: smooth;" id="tabContainer">
                    <div class="btn-group" role="group" id="tabSwitcher" style="white-space: nowrap;">
                        @foreach ($tabs as $tab)
                            <a href="{{ $tab['route'] }}"
                                class="btn btn-outline-secondary {{ $tab['active'] ? 'active' : '' }}">
                                {{ $tab['title'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="mainTable"></div>

            <div class="tabulator-wrapper mt-4">
                <div id="example-table"></div>
            </div>
        </div>
    </div>

    <div id="createModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Tambah Rencana Pemeliharaan Besar SOR 2</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">

                <div class="mb-3">
                    <label for="jumlah_row" class="form-label">Jumlah Row yang ingin dibuat</label>
                    <input type="number" name="jumlah_row" id="jumlah_row" class="form-control" min="1"
                        value="1" required>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>


        </div>
    </div>


    <div id="toastNotification"
        style="display:none; position: fixed; top: 20px; right: 20px; z-index: 9999; padding: 15px 20px; border-radius: 8px; color: white; font-weight: bold;">
    </div>
    @push('scripts')
        <script src="https://unpkg.com/tabulator-tables@5.6.0/dist/js/tabulator.min.js"></script>
        <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

        <script>
            const BASE_URL = "{{ config('app.url') }}";

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`rencana-pemeliharaan-besar-sor2/${id}`, {
                            method: "DELETE",
                            headers: {
                                "Accept": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                            }
                        })
                        .then(res => res.json())
                        .then(result => {
                            showToast(result.message || "Data berhasil disimpan", "success");
                            loadData();
                        })
                        .catch(err => {
                            console.error("Gagal hapus data:", err);
                            showToast("Terjadi kesalahan saat mengirim data.", "error");
                        });
                }
            }

            document.getElementById("search-input").addEventListener("input", function(e) {
                const keyword = e.target.value;
                table.setFilter([
                    [{
                            title: "No",
                            formatter: function(cell) {
                                const row = cell.getRow();
                                const table = cell.getTable();
                                const sortedData = table.getRows("active").map(r => r.getData());
                                const index = sortedData.findIndex(data => data.id === row.getData().id);
                                return index + 1;
                            },
                            hozAlign: "center",
                            width: 60,
                            headerSort: false,
                        },
                        {
                            title: "Periode",
                            field: "periode",
                            editor: "input",
                            headerFilter: "select",
                            headerFilterParams: {
                                values: [{
                                        value: "01",
                                        label: "Januari"
                                    },
                                    {
                                        value: "02",
                                        label: "Februari"
                                    },
                                    {
                                        value: "03",
                                        label: "Maret"
                                    },
                                    {
                                        value: "04",
                                        label: "April"
                                    },
                                    {
                                        value: "05",
                                        label: "Mei"
                                    },
                                    {
                                        value: "06",
                                        label: "Juni"
                                    },
                                    {
                                        value: "07",
                                        label: "Juli"
                                    },
                                    {
                                        value: "08",
                                        label: "Agustus"
                                    },
                                    {
                                        value: "09",
                                        label: "September"
                                    },
                                    {
                                        value: "10",
                                        label: "Oktober"
                                    },
                                    {
                                        value: "11",
                                        label: "November"
                                    },
                                    {
                                        value: "12",
                                        label: "Desember"
                                    }
                                ]
                            },
                            headerFilterPlaceholder: "Pilih Bulan",
                            headerFilterFunc: function(headerValue, rowValue) {
                                if (!headerValue) return true;
                                if (!rowValue) return false;

                                const periode = rowValue.toLowerCase();

                                const bulanTextMap = {
                                    "01": ["jan", "january"],
                                    "02": ["feb", "february"],
                                    "03": ["mar", "march"],
                                    "04": ["apr", "april"],
                                    "05": ["may", "mei"],
                                    "06": ["jun", "june"],
                                    "07": ["jul", "july"],
                                    "08": ["aug", "august"],
                                    "09": ["sep", "september"],
                                    "10": ["oct", "october"],
                                    "11": ["nov", "november"],
                                    "12": ["dec", "december"]
                                };

                                const keywords = bulanTextMap[headerValue];
                                return keywords.some(keyword => periode.includes(keyword)) || periode
                                    .includes(`-${headerValue}`);
                            }
                        },
                        {
                            field: "no",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "company",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "lokasi",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "program_kerja",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kategori_maintenance",
                            type: "like",
                            value: keyword,
                        },
                        {
                            field: "besar_phasing",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "remark",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "jan",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "feb",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "mar",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "apr",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "may",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "jun",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "jul",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "aug",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "sep",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "oct",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "nov",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "dec",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "biaya_kerugian",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "keterangan_kerugian",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "penyebab",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kendala",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "tindak_lanjut",
                            type: "like",
                            value: keyword
                        }
                    ]
                ]);
            });

            function clearSearch() {
                document.getElementById("search-input").value = "";
                table.clearFilter();
            }

            function loadData() {
                fetch(`${BASE_URL}/monev/shg/input-data/rencana-pemeliharaan-besar-sor2/data`, {
                        headers: {
                            "Accept": "application/json"
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        const cleaned = data.map(row => {
                            const cleanedRow = {};
                            for (const [key, value] of Object.entries(row)) {
                                const valStr = String(value).trim().toLowerCase();
                                cleanedRow[key] = (
                                    value === null ||
                                    value === undefined ||
                                    valStr === "null" ||
                                    valStr === "undefined"
                                ) ? "" : value;
                            }
                            return cleanedRow;
                        });

                        table.setData(cleaned);
                    })
                    .catch(err => console.error("Gagal load data:", err));
            }

            document.addEventListener("DOMContentLoaded", function() {
                const columnMap = {
                    "rencana-pemeliharaan-besar-sor2": [{
                            title: "No",
                            formatter: "rownum",
                            hozAlign: "center",
                            width: 60,
                            donwload: false
                        },
                        {
                            title: "ID",
                            field: "id",
                            visible: false
                        },
                        {
                            title: "Periode",
                            field: "periode",
                            editor: "input",
                            headerFilter: "select",
                            headerFilterParams: {
                                values: (() => {
                                    const years = [];
                                    years.push({
                                        value: "",
                                        label: "Pilih Tahun"
                                    });
                                    for (let year = 2020; year <= new Date().getFullYear() +
                                        5; year++) {
                                        years.push({
                                            value: String(year),
                                            label: String(year)
                                        });
                                    }
                                    return years;
                                })()
                            }
                        },
                        {
                            title: "No",
                            field: "no",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Company",
                            field: "company",
                            editor: "input"
                        },
                        {
                            title: "Lokasi",
                            field: "lokasi",
                            editor: "input"
                        },
                        {
                            title: "Program Kerja",
                            field: "program_kerja",
                            editor: "input",
                            width: 450
                        },
                        {
                            title: "Kategori Maintenance",
                            field: "kategori_maintenance",
                            editor: "input",
                            width: 200
                        },
                        {
                            title: "Besar Phasing",
                            field: "besar_phasing",
                            hozAlign: "right",
                            formatter: function(cell) {
                                let rawValue = cell.getValue();
                                if (rawValue === null || rawValue === undefined || rawValue === "") {
                                    return "0.00";
                                }

                                let cleanValue = rawValue.toString().replace(/[^0-9.-]+/g, '');
                                let value = parseFloat(cleanValue);

                                if (!isNaN(value)) {
                                    return value.toLocaleString("en-US", {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    });
                                }

                                return "0.00";
                            },
                            editor: "input"
                        },
                        {
                            title: "Remark",
                            field: "remark",
                            editor: "input"
                        },
                        {
                            title: "Bulan",
                            columns: [{
                                    title: "Jan",
                                    field: "jan",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "Feb",
                                    field: "feb",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "Mar",
                                    field: "mar",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "Apr",
                                    field: "apr",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "May",
                                    field: "may",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "Jun",
                                    field: "jun",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "Jul",
                                    field: "jul",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "Aug",
                                    field: "aug",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "Sep",
                                    field: "sep",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "Oct",
                                    field: "oct",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "Nov",
                                    field: "nov",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                                {
                                    title: "Dec",
                                    field: "dec",
                                    editor: "number",
                                    hozAlign: "center"
                                },
                            ]
                        },
                        {
                            title: "Biaya Kerugian (USD)",
                            field: "biaya_kerugian",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Keterangan Kerugian",
                            field: "keterangan_kerugian",
                            editor: "input"
                        },
                        {
                            title: "Penyebab",
                            field: "penyebab",
                            editor: "input"
                        },
                        {
                            title: "Kendala",
                            field: "kendala",
                            editor: "input"
                        },
                        {
                            title: "Tindak Lanjut",
                            field: "tindak_lanjut",
                            editor: "input"
                        },
                        {
                            title: "Aksi",
                            download: false,
                            hozAlign: "center",
                            width: 150,
                            formatter: (cell) => {
                                const row = cell.getData();
                                return `
            <button onclick='deleteData("${row.id}")'
                class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i> Hapus
            </button>
        `;
                            }
                        }
                    ]
                };

                window.table = new Tabulator("#example-table", {
                    layout: "fitDataTable",
                    responsiveLayout: "collapse",
                    autoResize: true,
                    columns: columnMap["rencana-pemeliharaan-besar-sor2"],
                    virtualDom: true,
                    height: "700px",

                    selectableRange: 1,
                    selectableRangeColumns: true,
                    selectableRangeRows: true,
                    selectableRangeClearCells: true,
                    editTriggerEvent: "dblclick",

                    pagination: "local",
                    paginationSize: 20,
                    paginationSizeSelector: [40, 60, 80, 100],
                    paginationCounter: "rows",

                    movableColumns: true,

                    clipboard: true,
                    clipboardCopyStyled: false,
                    clipboardCopyConfig: {
                        rowHeaders: false,
                        columnHeaders: false,
                    },
                    clipboardCopyRowRange: "range",
                    clipboardPasteParser: "range",
                    clipboardPasteAction: "range",
                    clipboardPasteRow: true,

                    columnDefaults: {
                        headerSort: true,
                        headerHozAlign: "center",
                        editor: "input",
                        resizable: "header",
                    },
                });

                document.getElementById("download-xlsx").addEventListener("click", function() {
                    window.table.download("xlsx", "rencana-pemeliharaan-besar-sor2.xlsx", {
                        sheetName: "rencana-pemeliharaan-besar-sor2",
                        columnHeaders: true,
                        downloadDataFormatter: function(data) {
                            return data.map(row => {
                                const cleanedRow = {};
                                for (const [key, value] of Object.entries(row)) {
                                    const valStr = String(value).trim().toLowerCase();
                                    cleanedRow[key] = (
                                        value === null ||
                                        value === undefined ||
                                        value === "" ||
                                        valStr === "null" ||
                                        valStr === "undefined"
                                    ) ? "" : value;
                                }
                                return cleanedRow;
                            });
                        }
                    });
                });

                let previousData = [];
                table.on("dataLoaded", function(newData) {
                    previousData = JSON.parse(JSON.stringify(newData));
                });

                function getChangedRows(newData, oldData) {
                    const changes = [];
                    newData.forEach((row, index) => {
                        if (!row.id) return;
                        const oldRow = oldData[index];
                        if (!oldRow) return;

                        const isDifferent = Object.keys(row).some(key => row[key] !== oldRow[key]);
                        if (isDifferent) {
                            changes.push(row);
                        }
                    });
                    return changes;
                }

                function isValidPeriodeFormat(value) {
                    const regex = /^[A-Za-z]{3}-\d{2}$/;
                    return regex.test(value);
                }

                function isValidAngkaBulan(value) {
                    const angka = parseFloat(value);
                    return !isNaN(angka) && angka >= 0;
                }
                const bulanFields = [
                    "jan", "feb", "mar", "apr", "may", "jun",
                    "jul", "aug", "sep", "oct", "nov", "dec"
                ];

                table.on("cellEdited", function(cell) {
                    const updatedData = cell.getRow().getData();
                    const id = updatedData.id;

                    if (!id) return;

                    const field = cell.getField();
                    const value = cell.getValue();

                    if (field === "periode" && !isValidPeriodeFormat(value)) {
                        showToast("Format Periode tidak valid! Gunakan format: Sep-24", "error");
                        cell.restoreOldValue();
                        return;
                    }

                    const bulanFields = [
                        "jan", "feb", "mar", "apr", "may", "jun",
                        "jul", "aug", "sep", "oct", "nov", "dec"
                    ];

                    if (bulanFields.includes(field) && !isValidAngkaBulan(value)) {
                        showToast(`Nilai bulan ${field.toUpperCase()} tidak valid! Harus berupa angka Numerik`,
                            "error");
                        cell.restoreOldValue();
                        return;
                    }


                    fetch(`rencana-pemeliharaan-besar-sor2/${id}`, {
                            method: "PUT",
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content")
                            },
                            body: JSON.stringify(updatedData)
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                showToast("Update berhasil!", "success");
                            } else {
                                showToast("Update gagal: " + data.message, "error");
                            }
                        })
                        .catch(err => {
                            console.error("Gagal update:", err);
                            showToast("Terjadi kesalahan saat update!", "error");
                        });
                });


                table.on("dataChanged", function(newData) {
                    const changedRows = getChangedRows(newData, previousData);
                    console.log("Baris yang berubah:", changedRows);

                    changedRows.forEach((rowData, index) => {
                        const id = rowData.id;
                        if (!id) return;

                        const oldRow = previousData.find(r => r.id === id);
                        if (!oldRow) return;

                        if (rowData.periode !== oldRow.periode && !isValidPeriodeFormat(rowData
                                .periode)) {
                            showToast(
                                `"${rowData.periode}" Format Periode tidak valid! Gunakan format: Jan-25`,
                                "error");

                            rowData.periode = oldRow.periode;
                            table.updateData([{
                                id: rowData.id,
                                periode: oldRow.periode
                            }]);
                            return;
                        }

                        for (const bulan of bulanFields) {
                            if (rowData[bulan] !== oldRow[bulan] && !isValidAngkaBulan(rowData[
                                    bulan])) {
                                showToast(
                                    `Nilai bulan ${bulan.toUpperCase()} tidak valid! Harus angka Numerik`,
                                    "error");

                                rowData[bulan] = oldRow[bulan];
                                const updatePayload = {
                                    id: rowData.id
                                };
                                updatePayload[bulan] = oldRow[bulan];
                                table.updateData([updatePayload]);
                                return;
                            }
                        }

                        fetch(`rencana-pemeliharaan-besar-sor2/${rowData.id}`, {
                                method: "PUT",
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json",
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content")
                                },
                                body: JSON.stringify(rowData)
                            })
                            .then(res => res.json())
                            .then(response => {
                                if (response.success) {
                                    showToast(`Data berhasil disimpan`, "success");
                                } else {
                                    showToast(
                                        `Format Periode tidak valid! Gunakan format: Jan-25 : ${response.message}`,
                                        "error");
                                }
                            })
                            .catch(err => {
                                console.error("Gagal menyimpan hasil paste:", err);
                                showToast(`Kesalahan pada ID ${id}`, "error");
                            });
                    });

                    previousData = JSON.parse(JSON.stringify(newData));
                });

                loadData();
            });
        </script>

        {{-- create data  --}}
        <script>
            function showToast(message, type = "success") {
                const toast = document.getElementById("toastNotification");
                toast.textContent = message;
                toast.className = "";
                toast.classList.add(type === "success" ? "toast-success" : "toast-error");
                toast.style.display = "block";

                setTimeout(() => {
                    toast.style.display = "none";
                }, 3500);
            }

            function openModal() {
                document.getElementById("createModal").style.display = "block";
            }

            function closeModal() {
                document.getElementById("createForm").reset();
                document.getElementById("form-id").value = "";
                document.getElementById("createModal").style.display = "none";
            }

            document.getElementById("createForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const data = Object.fromEntries(formData.entries());

                const jumlahRow = parseInt(data.jumlah_row);

                const payloadArray = [];

                for (let i = 0; i < jumlahRow; i++) {
                    payloadArray.push({
                        periode: data.periode,
                        company: data.company,
                        no: data[`no_${i}`],
                        lokasi: data[`lokasi_${i}`],
                        program_kerja: data[`program_kerja_${i}`],
                        kategori_maintenance: data[`kategori_maintenance_${i}`],
                        besar_phasing: data[`besar_phasing_${i}`],
                        remark: data[`remark_${i}`],
                        jan: data[`jan_${i}`],
                        feb: data[`feb_${i}`],
                        mar: data[`mar_${i}`],
                        apr: data[`apr_${i}`],
                        may: data[`may_${i}`],
                        jun: data[`jun_${i}`],
                        jul: data[`jul_${i}`],
                        aug: data[`aug_${i}`],
                        sep: data[`sep_${i}`],
                        oct: data[`oct_${i}`],
                        nov: data[`nov_${i}`],
                        dec: data[`dec_${i}`],
                        biaya_kerugian: data[`biaya_kerugian_${i}`],
                        keterangan_kerugian: data[`keterangan_kerugian_${i}`],
                        penyebab: data[`penyebab_${i}`],
                        kendala: data[`kendala_${i}`],
                        tindak_lanjut: data[`tindak_lanjut_${i}`]
                    });
                }

                Promise.all(payloadArray.map(dataItem => {
                        return fetch("rencana-pemeliharaan-besar-sor2", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute(
                                        "content")
                            },
                            body: JSON.stringify(dataItem)
                        }).then(res => res.json());
                    }))
                    .then(results => {
                        const gagal = results.filter(r => !r.success);
                        if (gagal.length === 0) {
                            showToast(`${jumlahRow} baris data berhasil buat`, "success");
                        } else {
                            showToast(`${gagal.length} data gagal disimpan`, "error");
                        }

                        table.setData(`${BASE_URL}/monev/shg/input-data/rencana-pemeliharaan-besar-sor2/data`);
                        document.getElementById("createForm").reset();
                        closeModal();
                    })
                    .catch(error => {
                        console.error("Error saat submit:", error);
                        showToast("Terjadi kesalahan saat mengirim data.", "error");
                    });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabButtons = document.querySelectorAll('#tabSwitcher a');
                const dropdownListItems = document.querySelectorAll('#tabDropdownList a');
                const tabContainer = document.getElementById('tabContainer');

                function scrollToActiveTab() {
                    const activeTab = document.querySelector('#tabSwitcher a.active');
                    if (activeTab) {
                        const tabX = activeTab.offsetLeft;
                        const tabW = activeTab.offsetWidth;
                        const containerW = tabContainer.clientWidth;

                        tabContainer.scrollTo({
                            left: tabX - (containerW / 2) + (tabW / 2),
                            behavior: 'smooth'
                        });
                    }
                }

                dropdownListItems.forEach((dropdownItem, i) => {
                    dropdownItem.addEventListener('click', function(e) {
                        e.preventDefault();
                        const targetHref = this.href;
                        sessionStorage.setItem('scrollToActiveTab', 'yes');
                        window.location.href = targetHref;
                    });
                });

                tabButtons.forEach((tabBtn) => {
                    tabBtn.addEventListener('click', function(e) {
                        sessionStorage.setItem('scrollToActiveTab', 'yes');
                    });
                });

                // Ketika halaman reload setelah klik, cek dan scroll otomatis
                if (sessionStorage.getItem('scrollToActiveTab') === 'yes') {
                    scrollToActiveTab();
                    sessionStorage.removeItem('scrollToActiveTab');
                }
            });
        </script>
    @endpush
</x-layouts.app>
