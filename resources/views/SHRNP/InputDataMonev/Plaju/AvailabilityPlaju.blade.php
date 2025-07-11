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
                <h5 class="card-title mb-3 mb-md-0">Availability Plaju</h5>
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
            <h3>Tambah Data Availability Plaju</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">

                <div>
                    <label>Periode</label>
                    <input type="month" name="periode" id="periode">
                </div>

                <div>
                    <label>Company</label>
                    <input type="text" name="company" id="company">
                </div>

                <div>
                    <label>Kategori</label>
                    <input type="text" name="kategori" id="kategori">
                </div>

                <div>
                    <label>Target</label>
                    <input type="number" name="target" id="target" step="0.01" min="0" max="100">

                </div>

                <div>
                    <label>Availability</label>
                    <input type="number" name="availability" id="availability" step="0.01" min="0"
                        max="100">
                </div>

                <div>
                    <label>Isu / Problem / Bad Actor</label>
                    <input type="text" name="isu" id="isu"></input>
                </div>

                <div>
                    <label>Kendala</label>
                    <input type="text" name="kendala" id="kendala"></input>
                </div>

                <div>
                    <label>Tindak Lanjut</label>
                    <input type="text" name="tindak_lanjut" id="tindak_lanjut"></input>
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
                    fetch(`availability-plaju/${id}`, {
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

            function clearSearch() {
                document.getElementById("search-input").value = "";
                table.clearFilter();
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
                            field: "company",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kategori",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "target",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "availability",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "isu",
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

            function loadData() {
                fetch("/monev/shrnp/input-data/availability-plaju/data", {
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
                const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

                const cleanRow = (row) => {
                    const cleaned = {};
                    for (const [key, value] of Object.entries(row)) {
                        const valStr = String(value).trim().toLowerCase();
                        cleaned[key] = (
                            value === null || value === undefined ||
                            valStr === "null" || valStr === "undefined"
                        ) ? "" : value;
                    }
                    return cleaned;
                };

                const formatPercent = (cell) => {
                    let value = parseFloat(cell.getValue());
                    return isNaN(value) ? "-" : value.toFixed(2) + " %";
                };

                const columnMap = {
                    "availability-plaju": [  {
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
                            title: "Company",
                            field: "company",
                            hozAlign: "center",
                            editor: "input"
                        },
                        {
                            title: "Kategori",
                            field: "kategori",
                            editor: "input"
                        },
                        {
                            title: "Target",
                            field: "target",
                            editor: "number",
                            hozAlign: "center",
                            formatter: formatPercent
                        },
                        {
                            title: "Availability",
                            field: "availability",
                            editor: "number",
                            hozAlign: "center",
                            formatter: formatPercent
                        },
                        {
                            title: "Isu / Problem / Bad Actor",
                            field: "isu",
                            editor: "textarea",
                            width: 400,

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
                    columns: columnMap["availability-plaju"],

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

                document.getElementById("download-xlsx").addEventListener("click", () => {
                    table.download("xlsx", "availability-plaju.xlsx", {
                        sheetName: "availability-plaju",
                        columnHeaders: true,
                        downloadDataFormatter: (data) => data.map(cleanRow)
                    });
                });

                let previousDataMap = new Map();

                // Load data
                function loadData() {
                    fetch("/monev/shrnp/input-data/availability-plaju/data", {
                            headers: {
                                "Accept": "application/json"
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            const cleaned = data.map(cleanRow);
                            previousDataMap = new Map(cleaned.map(item => [item.id, JSON.stringify(item)]));
                            table.setData(cleaned);
                        })
                        .catch(err => console.error("Gagal load data:", err));
                }

                // Debounce untuk batch update
                let debounceTimer;
                table.on("dataChanged", function(newData) {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        const changedRows = [];

                        for (const row of newData) {
                            const id = row.id;
                            if (!id) continue;

                            const oldRowStr = previousDataMap.get(id);
                            const currentRowStr = JSON.stringify(row);

                            if (oldRowStr && oldRowStr !== currentRowStr) {
                                // Convert persen ke number jika perlu
                                ["target", "availability"].forEach(field => {
                                    if (typeof row[field] === "string") {
                                        row[field] = parseFloat(row[field].replace("%", "")
                                            .trim());
                                    }
                                });

                                changedRows.push({
                                    ...row
                                });
                            }
                        }

                        if (changedRows.length > 0) {
                            console.log("Changed rows:", changedRows);

                            // Simpan secara paralel
                            Promise.all(changedRows.map(row =>
                                fetch(`availability-plaju/${row.id}`, {
                                    method: "PUT",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "Accept": "application/json",
                                        "X-CSRF-TOKEN": CSRF_TOKEN
                                    },
                                    body: JSON.stringify(row)
                                })
                                .then(res => res.json())
                                .then(resp => console.log(`Updated ID ${row.id}`, resp))
                                .catch(err => console.error(`Gagal update ID ${row.id}`, err))
                            ));

                            // Update previousDataMap
                            changedRows.forEach(row => {
                                previousDataMap.set(row.id, JSON.stringify(row));
                            });
                        }
                    }, 1000); // debounce 1 detik
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

                fetch("availability-plaju", {
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
                            kategori: data.kategori || null,
                            target: data.target || null,
                            availability: data.availability || null,
                            isu: data.isu || null,
                            kendala: data.kendala || null,
                            tindak_lanjut: data.tindak_lanjut || null,
                        })

                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            showToast(result.message || "Data berhasil disimpan", "success");
                            table.setData("/monev/shrnp/input-data/availability-plaju/data");
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
