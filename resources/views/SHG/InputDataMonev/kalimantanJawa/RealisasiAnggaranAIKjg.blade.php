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

            .tabulator-cell {
                font-size: 14px;
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
                <h5 class="card-title mb-3 mb-md-0">Realisasi Anggaran AI KJG</h5>
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
            <h3>Tambah Data Realisasi Anggaran AI 2025</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">

                <div>
                    <label>Periode</label>
                    <input type="month" name="periode" id="periode">
                </div>

                <div>
                    <label>No</label>
                    <input type="number" name="no" id="no">
                </div>

                <div>
                    <label>Program Kerja</label>
                    <input type="text" name="program_kerja" id="program_kerja">
                </div>

                <div>
                    <label>Kategori AIBT</label>
                    <input type="text" name="kategori_aibt" id="kategori_aibt">
                </div>

                <div>
                    <label>Jenis Anggaran</label>
                    <input type="text" name="jenis_anggaran" id="jenis_anggaran">
                </div>

                <div>
                    <label>Besar RKAP</label>
                    <input type="number" name="besar_rkap" id="besar_rkap" step="0.01">
                </div>

                <div>
                    <label>Entitas</label>
                    <input type="text" name="entitas" id="entitas">
                </div>

                <div>
                    <label>Unit</label>
                    <input type="text" name="unit" id="unit">
                </div>

                <div>
                    <label>Nilai Kontrak</label>
                    <input type="number" name="nilai_kontrak" id="nilai_kontrak" step="0.01">
                </div>

                <!-- Plan Fields -->
                <fieldset>
                    <legend>Plan</legend>
                    <div>
                        <label>Plan Jan</label>
                        <input type="number" name="plan_jan" step="0.01">
                    </div>
                    <div>
                        <label>Plan Feb</label>
                        <input type="number" name="plan_feb" step="0.01">
                    </div>
                    <div>
                        <label>Plan Mar</label>
                        <input type="number" name="plan_mar" step="0.01">
                    </div>
                    <div>
                        <label>Plan Apr</label>
                        <input type="number" name="plan_apr" step="0.01">
                    </div>
                    <div>
                        <label>Plan May</label>
                        <input type="number" name="plan_may" step="0.01">
                    </div>
                    <div>
                        <label>Plan Jun</label>
                        <input type="number" name="plan_jun" step="0.01">
                    </div>
                    <div>
                        <label>Plan Jul</label>
                        <input type="number" name="plan_jul" step="0.01">
                    </div>
                    <div>
                        <label>Plan Aug</label>
                        <input type="number" name="plan_aug" step="0.01">
                    </div>
                    <div>
                        <label>Plan Sep</label>
                        <input type="number" name="plan_sep" step="0.01">
                    </div>
                    <div>
                        <label>Plan Oct</label>
                        <input type="number" name="plan_oct" step="0.01">
                    </div>
                    <div>
                        <label>Plan Nov</label>
                        <input type="number" name="plan_nov" step="0.01">
                    </div>
                    <div>
                        <label>Plan Dec</label>
                        <input type="number" name="plan_dec" step="0.01">
                    </div>
                </fieldset>

                <!-- Prognosa Fields -->
                <fieldset>
                    <legend>Prognosa</legend>
                    <!-- Sama seperti Plan -->
                    <div>
                        <label>Prognosa Jan</label>
                        <input type="number" name="prognosa_jan" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa Feb</label>
                        <input type="number" name="prognosa_feb" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa Mar</label>
                        <input type="number" name="prognosa_mar" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa Apr</label>
                        <input type="number" name="prognosa_apr" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa May</label>
                        <input type="number" name="prognosa_may" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa Jun</label>
                        <input type="number" name="prognosa_jun" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa Jul</label>
                        <input type="number" name="prognosa_jul" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa Aug</label>
                        <input type="number" name="prognosa_aug" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa Sep</label>
                        <input type="number" name="prognosa_sep" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa Oct</label>
                        <input type="number" name="prognosa_oct" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa Nov</label>
                        <input type="number" name="prognosa_nov" step="0.01">
                    </div>
                    <div>
                        <label>Prognosa Dec</label>
                        <input type="number" name="prognosa_dec" step="0.01">
                    </div>
                </fieldset>

                <!-- Actual Fields -->
                <fieldset>
                    <legend>Actual</legend>
                    <div>
                        <label>Actual Jan</label>
                        <input type="number" name="actual_jan" step="0.01">
                    </div>
                    <div>
                        <label>Actual Feb</label>
                        <input type="number" name="actual_feb" step="0.01">
                    </div>
                    <div>
                        <label>Actual Mar</label>
                        <input type="number" name="actual_mar" step="0.01">
                    </div>
                    <div>
                        <label>Actual Apr</label>
                        <input type="number" name="actual_apr" step="0.01">
                    </div>
                    <div>
                        <label>Actual May</label>
                        <input type="number" name="actual_may" step="0.01">
                    </div>
                    <div>
                        <label>Actual Jun</label>
                        <input type="number" name="actual_jun" step="0.01">
                    </div>
                    <div>
                        <label>Actual Jul</label>
                        <input type="number" name="actual_jul" step="0.01">
                    </div>
                    <div>
                        <label>Actual Aug</label>
                        <input type="number" name="actual_aug" step="0.01">
                    </div>
                    <div>
                        <label>Actual Sep</label>
                        <input type="number" name="actual_sep" step="0.01">
                    </div>
                    <div>
                        <label>Actual Oct</label>
                        <input type="number" name="actual_oct" step="0.01">
                    </div>
                    <div>
                        <label>Actual Nov</label>
                        <input type="number" name="actual_nov" step="0.01">
                    </div>
                    <div>
                        <label>Actual Dec</label>
                        <input type="number" name="actual_dec" step="0.01">
                    </div>
                </fieldset>

                <div>
                    <label>Kode</label>
                    <input type="text" name="kode" id="kode">
                </div>

                <div>
                    <label>Kendala</label>
                    <input name="kendala" id="kendala"></input>
                </div>

                <div>
                    <label>Tindak Lanjut</label>
                    <input name="tindak_lanjut" id="tindak_lanjut"></input>
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
                    fetch(`realisasi-anggaran-ai-kjg/${id}`, {
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
                            field: "no",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "program_kerja",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kategori_aibt",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "jenis_anggaran",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "besar_rkap",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "entitas",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "unit",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "nilai_kontrak",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kode",
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
                fetch(`${BASE_URL}/monev/shg/input-data/realisasi-anggaran-ai-kjg/data`, {
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
                    "realisasi-anggaran-ai-kjg": [{
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
                            hozAlign: "center",
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
                            hozAlign: "center",
                        },
                        {
                            title: "Program Kerja",
                            field: "program_kerja",
                            width: 400,
                            editor: "input"
                        },
                        {
                            title: "Kategori AIBT",
                            field: "kategori_aibt",
                            editor: "input"
                        },
                        {
                            title: "Jenis Anggaran",
                            field: "jenis_anggaran",
                            editor: "input"
                        },
                        {
                            title: "Besar RKAP",
                            field: "besar_rkap",
                            editor: "number"
                        },
                        {
                            title: "Entitas",
                            field: "entitas",
                            editor: "input"
                        },
                        {
                            title: "Unit",
                            field: "unit",
                            editor: "input"
                        },
                        {
                            title: "Nilai Kontrak",
                            field: "nilai_kontrak",
                            editor: "number"
                        },
                        // Plan Fields
                        ...["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                        .map(bulan => ({
                            title: `Plan ${bulan}`,
                            field: `plan_${bulan.toLowerCase()}`,
                            editor: "input"
                        })),
                        // Prognosa Fields
                        ...["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                        .map(bulan => ({
                            title: `Prognosa ${bulan}`,
                            field: `prognosa_${bulan.toLowerCase()}`,
                            editor: "input"
                        })),
                        // Actual Fields
                        ...["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                        .map(bulan => ({
                            title: `Actual ${bulan}`,
                            field: `actual_${bulan.toLowerCase()}`,
                            editor: "input"
                        })),
                        {
                            title: "Kode",
                            field: "kode",
                            editor: "input"
                        },
                        {
                            title: "Kendala",
                            field: "kendala",
                            editor: "input",
                            width: 400
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
                    columns: columnMap["realisasi-anggaran-ai-kjg"],
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
                    window.table.download("xlsx", "realisasi-anggaran-ai-kjg.xlsx", {
                        sheetName: "realisasi-anggaran-ai",
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

                table.on("dataChanged", function(newData) {
                    const changedRows = getChangedRows(newData, previousData);
                    console.log("Baris yang berubah:", changedRows);

                    changedRows.forEach(rowData => {
                        fetch(`realisasi-anggaran-ai-kjg/${rowData.id}`, {
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

                table.on("cellEdited", function(cell) {
                    const updatedData = cell.getRow().getData();
                    const id = updatedData.id;

                    if (!id) return;

                    fetch(`realisasi-anggaran-ai-kjg/${id}`, {
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

                fetch("realisasi-anggaran-ai-kjg", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            periode: data.periode || "",
                            no: data.no || 0,
                            program_kerja: data.program_kerja || "",
                            kategori_aibt: data.kategori_aibt || "",
                            jenis_anggaran: data.jenis_anggaran || "",
                            besar_rkap: data.besar_rkap !== "" ? parseFloat(data.besar_rkap) : null,
                            entitas: data.entitas || "",
                            unit: data.unit || "",
                            nilai_kontrak: data.nilai_kontrak !== "" ? parseFloat(data.nilai_kontrak) :
                                null,

                            // Plan
                            plan_jan: data.plan_jan,
                            plan_feb: data.plan_feb,
                            plan_mar: data.plan_mar,
                            plan_apr: data.plan_apr,
                            plan_may: data.plan_may,
                            plan_jun: data.plan_jun,
                            plan_jul: data.plan_jul,
                            plan_aug: data.plan_aug,
                            plan_sep: data.plan_sep,
                            plan_oct: data.plan_oct,
                            plan_nov: data.plan_nov,
                            plan_dec: data.plan_dec,

                            // Prognosa
                            prognosa_jan: data.prognosa_jan,
                            prognosa_feb: data.prognosa_feb,
                            prognosa_mar: data.prognosa_mar,
                            prognosa_apr: data.prognosa_apr,
                            prognosa_may: data.prognosa_may,
                            prognosa_jun: data.prognosa_jun,
                            prognosa_jul: data.prognosa_jul,
                            prognosa_aug: data.prognosa_aug,
                            prognosa_sep: data.prognosa_sep,
                            prognosa_oct: data.prognosa_oct,
                            prognosa_nov: data.prognosa_nov,
                            prognosa_dec: data.prognosa_dec,

                            // Actual
                            actual_jan: data.actual_jan,
                            actual_feb: data.actual_feb,
                            actual_mar: data.actual_mar,
                            actual_apr: data.actual_apr,
                            actual_may: data.actual_may,
                            actual_jun: data.actual_jun,
                            actual_jul: data.actual_jul,
                            actual_aug: data.actual_aug,
                            actual_sep: data.actual_sep,
                            actual_oct: data.actual_oct,
                            actual_nov: data.actual_nov,
                            actual_dec: data.actual_dec,

                            kode: data.kode,
                            kendala: data.kendala,
                            tindak_lanjut: data.tindak_lanjut
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            showToast(result.message || "Data berhasil disimpan", "success");
                            table.setData(`${BASE_URL}/monev/shg/input-data/realisasi-anggaran-ai-kjg/data`);
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

                // Ketika halaman reload setelah klik, cek dan scroll otomatis
                if (sessionStorage.getItem('scrollToActiveTab') === 'yes') {
                    scrollToActiveTab();
                    sessionStorage.removeItem('scrollToActiveTab');
                }
            });
        </script>
    @endpush
</x-layouts.app>
