@section('title', __(''))
<x-layouts.app :title="__('')">
    @push('styles')
        <link href="https://unpkg.com/tabulator-tables@5.6.0/dist/css/tabulator.min.css" rel="stylesheet">
        <style>
            .toast-success {
                background-color: #28a745;
            }

            .toast-error {
                background-color: #dc3545;
            }

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
                <h5 class="card-title mb-3 mb-md-0">Real Anggaran AI balikpapan</h5>
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
            <h3>Real Anggaran AI balikpapan</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">
                <div>
                    <label for="periode">Periode (Tahun):</label>
                    <select name="periode" id="periode" class="form-select">
                        <option value="" selected disabled>Pilih Periode</option>
                        @for ($year = 2000; $year <= date('Y') + 5; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
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
                    <input type="number" name="besar_rkap" id="besar_rkap">
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
                    <input type="number" name="nilai_kontrak" id="nilai_kontrak">
                </div>

                <div>
                    <label>Plan Jan</label>
                    <input type="number" name="plan_jan" id="plan_jan">
                </div>

                <div>
                    <label>Plan Feb</label>
                    <input type="number" name="plan_feb" id="plan_feb">
                </div>

                <div>
                    <label>Plan Mar</label>
                    <input type="number" name="plan_mar" id="plan_mar">
                </div>

                <div>
                    <label>Plan Apr</label>
                    <input type="number" name="plan_apr" id="plan_apr">
                </div>

                <div>
                    <label>Plan May</label>
                    <input type="number" name="plan_may" id="plan_may">
                </div>

                <div>
                    <label>Plan Jun</label>
                    <input type="number" name="plan_jun" id="plan_jun">
                </div>

                <div>
                    <label>Plan Jul</label>
                    <input type="number" name="plan_jul" id="plan_jul">
                </div>

                <div>
                    <label>Plan Aug</label>
                    <input type="number" name="plan_aug" id="plan_aug">
                </div>

                <div>
                    <label>Plan Sep</label>
                    <input type="number" name="plan_sep" id="plan_sep">
                </div>

                <div>
                    <label>Plan Oct</label>
                    <input type="number" name="plan_oct" id="plan_oct">
                </div>

                <div>
                    <label>Plan Nov</label>
                    <input type="number" name="plan_nov" id="plan_nov">
                </div>

                <div>
                    <label>Plan Dec</label>
                    <input type="number" name="plan_dec" id="plan_dec">
                </div>

                <div>
                    <label>Prognosa Jan</label>
                    <input type="number" name="prognosa_jan" id="prognosa_jan">
                </div>

                <div>
                    <label>Prognosa Feb</label>
                    <input type="number" name="prognosa_feb" id="prognosa_feb">
                </div>

                <div>
                    <label>Prognosa Mar</label>
                    <input type="number" name="prognosa_mar" id="prognosa_mar">
                </div>

                <div>
                    <label>Prognosa Apr</label>
                    <input type="number" name="prognosa_apr" id="prognosa_apr">
                </div>

                <div>
                    <label>Prognosa May</label>
                    <input type="number" name="prognosa_may" id="prognosa_may">
                </div>

                <div>
                    <label>Prognosa Jun</label>
                    <input type="number" name="prognosa_jun" id="prognosa_jun">
                </div>

                <div>
                    <label>Prognosa Jul</label>
                    <input type="number" name="prognosa_jul" id="prognosa_jul">
                </div>

                <div>
                    <label>Prognosa Aug</label>
                    <input type="number" name="prognosa_aug" id="prognosa_aug">
                </div>

                <div>
                    <label>Prognosa Sep</label>
                    <input type="number" name="prognosa_sep" id="prognosa_sep">
                </div>

                <div>
                    <label>Prognosa Oct</label>
                    <input type="number" name="prognosa_oct" id="prognosa_oct">
                </div>

                <div>
                    <label>Prognosa Nov</label>
                    <input type="number" name="prognosa_nov" id="prognosa_nov">
                </div>

                <div>
                    <label>Prognosa Dec</label>
                    <input type="number" name="prognosa_dec" id="prognosa_dec">
                </div>

                <div>
                    <label>Actual Jan</label>
                    <input type="number" name="actual_jan" id="actual_jan">
                </div>

                <div>
                    <label>Actual Feb</label>
                    <input type="number" name="actual_feb" id="actual_feb">
                </div>

                <div>
                    <label>Actual Mar</label>
                    <input type="number" name="actual_mar" id="actual_mar">
                </div>

                <div>
                    <label>Actual Apr</label>
                    <input type="number" name="actual_apr" id="actual_apr">
                </div>

                <div>
                    <label>Actual May</label>
                    <input type="number" name="actual_may" id="actual_may">
                </div>

                <div>
                    <label>Actual Jun</label>
                    <input type="number" name="actual_jun" id="actual_jun">
                </div>

                <div>
                    <label>Actual Jul</label>
                    <input type="number" name="actual_jul" id="actual_jul">
                </div>

                <div>
                    <label>Actual Aug</label>
                    <input type="number" name="actual_aug" id="actual_aug">
                </div>

                <div>
                    <label>Actual Sep</label>
                    <input type="number" name="actual_sep" id="actual_sep">
                </div>

                <div>
                    <label>Actual Oct</label>
                    <input type="number" name="actual_oct" id="actual_oct">
                </div>

                <div>
                    <label>Actual Nov</label>
                    <input type="number" name="actual_nov" id="actual_nov">
                </div>

                <div>
                    <label>Actual Dec</label>
                    <input type="number" name="actual_dec" id="actual_dec">
                </div>

                <div>
                    <label>Kode</label>
                    <input type="text" name="kode" id="kode">
                </div>

                <div>
                    <label>Kendala</label>
                    <input type="text" name="kendala" id="kendala">
                </div>

                <div>
                    <label>Tindak Lanjut</label>
                    <input type="text" name="tindak_lanjut" id="tindak_lanjut">
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
                    fetch(`realisasi-anggaran-ai-balikpapan/${id}`, {
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
                    ]
                ]);
            });

            function clearSearch() {
                document.getElementById("search-input").value = "";
                table.clearFilter();
            }

            function loadData() {
                fetch("/monev/shrnp/input-data/realisasi-anggaran-ai-balikpapan/data", {
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
                    "realisasi-anggaran-ai-balikpapan": [{
                            title: "No",
                            formatter: "rownum",
                            hozAlign: "center",
                            width: 60,
                            download: false,
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
                            hozAlign: "center",
                            hozAlign: "center",
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
                            hozAlign: "center",
                            field: "no",
                            editor: "input"
                        },
                        {
                            title: "Program Kerja",
                            field: "program_kerja",
                            editor: "input",
                        },
                        {
                            title: "Kategori AIBT",
                            hozAlign: "center",
                            field: "kategori_aibt",
                            editor: "input"
                        },
                        {
                            title: "Jenis Anggaran",
                            hozAlign: "center",
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
                            hozAlign: "center",
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
                        {
                            title: "Plan Jan",
                            field: "plan_jan",
                            editor: "number"
                        },
                        {
                            title: "Plan Feb",
                            field: "plan_feb",
                            editor: "number"
                        },
                        {
                            title: "Plan Mar",
                            field: "plan_mar",
                            editor: "number"
                        },
                        {
                            title: "Plan Apr",
                            field: "plan_apr",
                            editor: "number"
                        },
                        {
                            title: "Plan May",
                            field: "plan_may",
                            editor: "number"
                        },
                        {
                            title: "Plan Jun",
                            field: "plan_jun",
                            editor: "number"
                        },
                        {
                            title: "Plan Jul",
                            field: "plan_jul",
                            editor: "number"
                        },
                        {
                            title: "Plan Aug",
                            field: "plan_aug",
                            editor: "number"
                        },
                        {
                            title: "Plan Sep",
                            field: "plan_sep",
                            editor: "number"
                        },
                        {
                            title: "Plan Oct",
                            field: "plan_oct",
                            editor: "number"
                        },
                        {
                            title: "Plan Nov",
                            field: "plan_nov",
                            editor: "number"
                        },
                        {
                            title: "Plan Dec",
                            field: "plan_dec",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Jan",
                            field: "prognosa_jan",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Feb",
                            field: "prognosa_feb",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Mar",
                            field: "prognosa_mar",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Apr",
                            field: "prognosa_apr",
                            editor: "number"
                        },
                        {
                            title: "Prognosa May",
                            field: "prognosa_may",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Jun",
                            field: "prognosa_jun",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Jul",
                            field: "prognosa_jul",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Aug",
                            field: "prognosa_aug",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Sep",
                            field: "prognosa_sep",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Oct",
                            field: "prognosa_oct",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Nov",
                            field: "prognosa_nov",
                            editor: "number"
                        },
                        {
                            title: "Prognosa Dec",
                            field: "prognosa_dec",
                            editor: "number"
                        },
                        {
                            title: "Actual Jan",
                            field: "actual_jan",
                            editor: "number"
                        },
                        {
                            title: "Actual Feb",
                            field: "actual_feb",
                            editor: "number"
                        },
                        {
                            title: "Actual Mar",
                            field: "actual_mar",
                            editor: "number"
                        },
                        {
                            title: "Actual Apr",
                            field: "actual_apr",
                            editor: "number"
                        },
                        {
                            title: "Actual May",
                            field: "actual_may",
                            editor: "number"
                        },
                        {
                            title: "Actual Jun",
                            field: "actual_jun",
                            editor: "number"
                        },
                        {
                            title: "Actual Jul",
                            field: "actual_jul",
                            editor: "number"
                        },
                        {
                            title: "Actual Aug",
                            field: "actual_aug",
                            editor: "number"
                        },
                        {
                            title: "Actual Sep",
                            field: "actual_sep",
                            editor: "number"
                        },
                        {
                            title: "Actual Oct",
                            field: "actual_oct",
                            editor: "number"
                        },
                        {
                            title: "Actual Nov",
                            field: "actual_nov",
                            editor: "number"
                        },
                        {
                            title: "Actual Dec",
                            field: "actual_dec",
                            editor: "number"
                        },
                        {
                            title: "Kode",
                            field: "kode",
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
                    columns: columnMap["realisasi-anggaran-ai-balikpapan"],

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
                    window.table.download("xlsx", "realisasi-anggaran-ai-balikpapan.xlsx", {
                        sheetName: "realisasi-anggaran-ai-balikpapan",
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

                    fetch(`realisasi-anggaran-ai-balikpapan/${id}`, {
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
                        fetch(`realisasi-anggaran-ai-balikpapan/${rowData.id}`, {
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

                fetch("realisasi-anggaran-ai-balikpapan", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            periode: data.periode,
                            company: data.company,
                            judul_pelatihan: data.judul_pelatihan,
                            realisasi_perwira: data.realisasi_perwira
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            showToast(result.message || "Data berhasil disimpan", "success");
                            table.setData("/monev/shrnp/input-data/realisasi-anggaran-ai-balikpapan/data");
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
