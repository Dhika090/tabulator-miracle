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

            .tabulator .tabulator-cell {
                white-space: normal !important;
                word-wrap: break-word;
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

            input {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                margin-bottom: 10px;
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
                <h5 class="card-title mb-3 mb-md-0">Status Asset 2025 AI Jawa 1 Regas</h5>
                <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                    <input id="search-input" type="text" class="form-control" placeholder="Search data..."
                        style="max-width: 200px;">
                    <button class="btn btn-outline-secondary ms-2 h-100 mt-1 d" type="button"
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
            <h3>Create New Data Status Asset 2025 AI Jawa 1 Regas</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">

                <div>
                    <label>Periode</label>
                    <input type="month" name="periode" id="periode">
                </div>

                <div>
                    <label>Subholding</label>
                    <input type="text" name="subholding" id="subholding">
                </div>

                <label for="company">Company:</label>
                <select name="company" id="company" class="form-select">
                    <option value="">-- Pilih Company --</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company }}">{{ $company }}</option>
                    @endforeach
                </select>

                <div>
                    <label>Unit</label>
                    <input type="text" name="unit" id="unit">
                </div>

                <div>
                    <label>Asset Group</label>
                    <input type="text" name="asset_group" id="asset_group">
                </div>

                <div>
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" step="0.01">
                </div>

                <!-- SECE -->
                <h4>SECE</h4>
                <div><label>Low Integrity - Breakdown</label><input type="number" id="sece_low_integrity_breakdown"
                        step="0.01">
                </div>
                <div><label>Medium - Due Date Inspection</label><input type="number"
                        id="sece_medium_due_date_inspection" step="0.01"></div>
                <div><label>Medium - Low Condition</label><input type="number" id="sece_medium_low_condition"
                        step="0.01"></div>
                <div><label>Medium - Low Performance</label><input type="number" id="sece_medium_low_performance"
                        step="0.01">
                </div>
                <div><label>High Integrity</label><input type="number" id="sece_high_integrity" step="0.01"></div>

                <!-- PCE -->
                <h4>PCE</h4>
                <div><label>Low Integrity - Breakdown</label><input type="number" id="pce_low_integrity_breakdown"
                        step="0.01">
                </div>
                <div><label>Medium - Due Date Inspection</label><input type="number"
                        id="pce_medium_due_date_inspection" step="0.01"></div>
                <div><label>Medium - Low Condition</label><input type="number" id="pce_medium_low_condition"
                        step="0.01"></div>
                <div><label>Medium - Low Performance</label><input type="number" id="pce_medium_low_performance"
                        step="0.01"></div>
                <div><label>High Integrity</label><input type="number" id="pce_high_integrity" step="0.01"></div>

                <!-- IMPORTANT -->
                <h4>IMPORTANT</h4>
                <div><label>Low Integrity - Breakdown</label><input type="number"
                        id="important_low_integrity_breakdown" step="0.01"></div>
                <div><label>Medium - Due Date Inspection</label><input type="number"
                        id="important_medium_due_date_inspection" step="0.01"></div>
                <div><label>Medium - Low Condition</label><input type="number" id="important_medium_low_condition"
                        step="0.01">
                </div>
                <div><label>Medium - Low Performance</label><input type="number"
                        id="important_medium_low_performance" step="0.01">
                </div>
                <div><label>High Integrity</label><input type="number" id="important_high_integrity" step="0.01">
                </div>

                <!-- SECONDARY -->
                <h4>SECONDARY</h4>
                <div><label>Low Integrity - Breakdown</label><input type="number"
                        id="secondary_low_integrity_breakdown" step="0.01"></div>
                <div><label>Medium - Due Date Inspection</label><input type="number"
                        id="secondary_medium_due_date_inspection" step="0.01"></div>
                <div><label>Medium - Low Condition</label><input type="number" id="secondary_medium_low_condition"
                        step="0.01">
                </div>
                <div><label>Medium - Low Performance</label><input type="number"
                        id="secondary_medium_low_performance" step="0.01">
                </div>
                <div><label>High Integrity</label><input type="number" id="secondary_high_integrity" step="0.01">
                </div>

                <!-- Tambahan Informasi -->
                <div>
                    <label>Kegiatan Penurunan Low</label>
                    <input type="text" id="kegiatan_penurunan_low">
                </div>

                <div>
                    <label>Kegiatan Penurunan Med</label>
                    <input type="text" id="kegiatan_penurunan_med">
                </div>

                <div>
                    <label>Informasi Penyebab Low Integrity</label>
                    <input id="informasi_penyebab_low_integrity"></input>
                </div>

                <div>
                    <label>Informasi Penambahan Jumlah Aset</label>
                    <input id="informasi_penambahan_jumlah_aset"></input>
                </div>

                <div>
                    <label>Informasi Naik Turun Low Integrity</label>
                    <input id="informasi_naik_turun_low_integrity"></input>
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
            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`jawa1regas/${id}`, {
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
                            field: "periode",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "subholding",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "company",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "unit",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "asset_group",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "jumlah",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kegiatan_penurunan_low",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kegiatan_penurunan_med",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "informasi_penyebab_low",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "informasi_penambahan_jumlah_aset",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "informasi_naik_turun_low",
                            type: "like",
                            value: keyword
                        },
                    ]
                ]);
            });

            function clearSearch() {
                document.getElementById("search-input").value = "";
                table.clearFilter();
            }

            function loadData() {
                fetch("/monev/shpnre/input-data/jawa1regas/data", {
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
                    "jawa1regas": [{
                            title: "No",
                            hozAlign: "center",
                            width: 60,
                            download: false,
                            formatter: function(cell) {
                                const row = cell.getRow();
                                const table = row.getTable();

                                const pageSize = table.getPageSize();
                                const currentPage = table.getPage();
                                const rowIndex = row
                                    .getPosition();

                                return ((currentPage - 1) * pageSize) + rowIndex;
                            }
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
                            title: "Subholding",
                            field: "subholding",
                            editor: "input"
                        },
                        {
                            title: "Company",
                            field: "company",
                            editor: "input"
                        },
                        {
                            title: "Unit",
                            field: "unit",
                            editor: "input"
                        },
                        {
                            title: "Asset Group",
                            field: "asset_group",
                            editor: "input"
                        },
                        {
                            title: "Jumlah",
                            field: "jumlah",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SECE Low Integrity - Breakdown",
                            field: "sece_low_integrity_breakdown",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SECE Medium Integrity - Due Date Inspection",
                            field: "sece_medium_due_date_inspection",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SECE Medium Integrity - Low Condition",
                            field: "sece_medium_low_condition",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SECE Medium Integrity - Low Performance",
                            field: "sece_medium_low_performance",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SECE High Integrity",
                            field: "sece_high_integrity",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "PCE Low Integrity - Breakdown",
                            field: "pce_low_integrity_breakdown",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "PCE Medium Integrity - Due Date Inspection",
                            field: "pce_medium_due_date_inspection",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "PCE Medium Integrity - Low Condition",
                            field: "pce_medium_low_condition",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "PCE Medium Integrity - Low Performance",
                            field: "pce_medium_low_performance",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "PCE High Integrity",
                            field: "pce_high_integrity",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "IMPORTANT Low Integrity - Breakdown",
                            field: "important_low_integrity_breakdown",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "IMPORTANT Medium Integrity - Due Date Inspection",
                            field: "important_medium_due_date_inspection",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "IMPORTANT Medium Integrity - Low Condition",
                            field: "important_medium_low_condition",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "IMPORTANT Medium Integrity - Low Performance",
                            field: "important_medium_low_performance",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "IMPORTANT High Integrity",
                            field: "important_high_integrity",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SECONDARY Low Integrity - Breakdown",
                            field: "secondary_low_integrity_breakdown",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SECONDARY Medium Integrity - Due Date Inspection",
                            field: "secondary_medium_due_date_inspection",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SECONDARY Medium Integrity - Low Condition",
                            field: "secondary_medium_low_condition",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SECONDARY Medium Integrity - Low Performance",
                            field: "secondary_medium_low_performance",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SECONDARY High Integrity",
                            field: "secondary_high_integrity",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "Kegiatan Penurunan Low",
                            field: "kegiatan_penurunan_low",
                            editor: "input"
                        },
                        {
                            title: "Kegiatan Penurunan Med",
                            field: "kegiatan_penurunan_med",
                            editor: "input"
                        },
                        {
                            title: "Informasi Penyebab Low Integrity",
                            field: "informasi_penyebab_low_integrity",
                            editor: "input",
                            width: 450
                        },
                        {
                            title: "Informasi Penambahan Jumlah Aset",
                            field: "informasi_penambahan_jumlah_aset",
                            editor: "input"
                        },
                        {
                            title: "Informasi Naik Turun low Integrity",
                            field: "informasi_naik_turun_low_integrity",
                            editor: "input",
                            width: 450
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
                    columns: columnMap["jawa1regas"],
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
                    window.table.download("xlsx", "status-asset-sor3.xlsx", {
                        sheetName: "Data Pelatihan",
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

                table.on("cellEdited", function(cell) {
                    const updatedData = cell.getRow().getData();
                    const id = updatedData.id;

                    if (!id) return;

                    fetch(`jawa1regas/${id}`, {
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
                        .then(data => console.log("Update berhasil:", data))
                        .catch(err => console.error("Gagal update:", err));
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

                table.on("dataChanged", function(newData) {
                    const changedRows = getChangedRows(newData, previousData);
                    console.log("Baris yang berubah:", changedRows);

                    changedRows.forEach(rowData => {
                        fetch(`jawa1regas/${rowData.id}`, {
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
                                console.log("Data berhasil disimpan:", response);
                            })
                            .catch(err => {
                                console.error("Gagal menyimpan hasil paste:", err);
                            });
                    });

                    previousData = JSON.parse(JSON.stringify(newData));
                });
                loadData();
            });
        </script>

        {{-- create and update data --}}
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

                fetch("jawa1regas", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            periode: data.periode,
                            subholding: data.subholding,
                            company: data.company,
                            unit: data.unit,
                            asset_group: data.asset_group,
                            jumlah: data.jumlah,
                            sece_low_breakdown: data.sece_low_breakdown,
                            sece_medium_due_date_inspection: data.sece_medium_due_date_inspection,
                            sece_medium_low_condition: data.sece_medium_low_condition,
                            sece_medium_low_performance: data.sece_medium_low_performance,
                            sece_high: data.sece_high,
                            pce_low_breakdown: data.pce_low_breakdown,
                            pce_medium_due_date_inspection: data.pce_medium_due_date_inspection,
                            pce_medium_low_condition: data.pce_medium_low_condition,
                            pce_medium_low_performance: data.pce_medium_low_performance,
                            pce_high: data.pce_high,
                            important_low_breakdown: data.important_low_breakdown,
                            important_medium_due_date_inspection: data.important_medium_due_date_inspection,
                            important_medium_low_condition: data.important_medium_low_condition,
                            important_medium_low_performance: data.important_medium_low_performance,
                            important_high: data.important_high,
                            secondary_low_breakdown: data.secondary_low_breakdown,
                            secondary_medium_due_date_inspection: data.secondary_medium_due_date_inspection,
                            secondary_medium_low_condition: data.secondary_medium_low_condition,
                            secondary_medium_low_performance: data.secondary_medium_low_performance,
                            secondary_high: data.secondary_high,
                            kegiatan_penurunan_low: data.kegiatan_penurunan_low,
                            kegiatan_penurunan_med: data.kegiatan_penurunan_med,
                            informasi_penyebab_low: data.informasi_penyebab_low,
                            informasi_penambahan_jumlah_aset: data.informasi_penambahan_jumlah_aset,
                            informasi_naik_turun_low: data.informasi_naik_turun_low
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            showToast(result.message || "Data berhasil disimpan", "success");
                            table.setData("/monev/shpnre/input-data/jawa1regas/data");
                            this.reset();
                            closeModal();
                        } else {
                            showToast(result.message || "Gagal menyimpan data", "error");
                        }
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

                if (sessionStorage.getItem('scrollToActiveTab') === 'yes') {
                    scrollToActiveTab();
                    sessionStorage.removeItem('scrollToActiveTab');
                }
            });
        </script>
    @endpush
</x-layouts.app>
