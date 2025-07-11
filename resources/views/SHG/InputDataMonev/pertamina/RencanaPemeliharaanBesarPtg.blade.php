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
                <h5 class="card-title mb-3 mb-md-0">Rencana Pemeliharaan PTG 2025</h5>
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
            <h3>Tambah Rencana Pemeliharaan Besar PTG</h3>
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
                    <label>Company</label>
                    <input type="text" name="company" id="company">
                </div>

                <div>
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi">
                </div>

                <div>
                    <label>Program Kerja</label>
                    <input type="text" name="program_kerja" id="program_kerja">
                </div>

                <div>
                    <label>Kategori Maintenance</label>
                    <input type="text" name="kategori_maintenance" id="kategori_maintenance">
                </div>

                <div>
                    <label>Besar Phasing</label>
                    <input type="text" name="besar_phasing" id="besar_phasing">
                </div>

                <div>
                    <label>Remark</label>
                    <input type="text" name="remark" id="remark">
                </div>

                <!-- Bulan -->
                <div>
                    <label>Jan</label>
                    <input type="number" name="jan" id="jan">
                </div>

                <div>
                    <label>Feb</label>
                    <input type="number" name="feb" id="feb">
                </div>

                <div>
                    <label>Mar</label>
                    <input type="number" name="mar" id="mar">
                </div>

                <div>
                    <label>Apr</label>
                    <input type="number" name="apr" id="apr">
                </div>

                <div>
                    <label>May</label>
                    <input type="number" name="may" id="may">
                </div>

                <div>
                    <label>Jun</label>
                    <input type="number" name="jun" id="jun">
                </div>

                <div>
                    <label>Jul</label>
                    <input type="number" name="jul" id="jul">
                </div>

                <div>
                    <label>Aug</label>
                    <input type="number" name="aug" id="aug">
                </div>

                <div>
                    <label>Sep</label>
                    <input type="number" name="sep" id="sep">
                </div>

                <div>
                    <label>Oct</label>
                    <input type="number" name="oct" id="oct">
                </div>

                <div>
                    <label>Nov</label>
                    <input type="number" name="nov" id="nov">
                </div>

                <div>
                    <label>Dec</label>
                    <input type="number" name="dec" id="dec">
                </div>

                <!-- Kerugian -->
                <div>
                    <label>Biaya Kerugian (USD)</label>
                    <input type="number" name="biaya_kerugian" id="biaya_kerugian">
                </div>

                <div>
                    <label>Keterangan Kerugian</label>
                    <input type="text" name="keterangan_kerugian" id="keterangan_kerugian">
                </div>

                <div>
                    <label>Penyebab</label>
                    <input type="text" name="penyebab" id="penyebab">
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
                    fetch(`rencana-pemeliharaan-besar-ptg/${id}`, {
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
                fetch("/monev/shg/input-data/rencana-pemeliharaan-besar-ptg/data", {
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
                    "rencana-pemeliharaan-besar-ptg": [{
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
                    columns: columnMap["rencana-pemeliharaan-besar-ptg"],
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
                    window.table.download("xlsx", "rencana-pemeliharaan-besar-ptg.xlsx", {
                        sheetName: "rencana-pemeliharaan-besar-ptg",
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
                        fetch(`rencana-pemeliharaan-besar-ptg/${rowData.id}`, {
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

                    fetch(`rencana-pemeliharaan-besar-ptg/${id}`, {
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
                        .then(data => console.log("Berhasil update:", data))
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

                fetch("rencana-pemeliharaan-besar-ptg", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            periode: data.periode,
                            no: data.no,
                            company: data.company,
                            lokasi: data.lokasi,
                            program_kerja: data.program_kerja,
                            kategori_maintenance: data.kategori_maintenance,
                            besar_phasing: data.besar_phasing,
                            remark: data.remark,
                            jan: data.jan,
                            feb: data.feb,
                            mar: data.mar,
                            apr: data.apr,
                            may: data.may,
                            jun: data.jun,
                            jul: data.jul,
                            aug: data.aug,
                            sep: data.sep,
                            oct: data.oct,
                            nov: data.nov,
                            dec: data.dec,
                            biaya_kerugian: data.biaya_kerugian,
                            keterangan_kerugian: data.keterangan_kerugian,
                            penyebab: data.penyebab,
                            kendala: data.kendala,
                            tindak_lanjut: data.tindak_lanjut
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            showToast(result.message || "Data berhasil disimpan", "success");
                            table.setData("/monev/shg/input-data/rencana-pemeliharaan-besar-ptg/data");
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
