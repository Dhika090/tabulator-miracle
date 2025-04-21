@section('title', __('PertaminaGas'))
<x-layouts.app :title="__('PertaminaGas')">
    @push('styles')
        <link href="https://unpkg.com/tabulator-tables@5.6.0/dist/css/tabulator.min.css" rel="stylesheet">
        <style>
            .tabulator-wrapper {
                overflow-x: auto;
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

            .card {
                margin-top: 20px;
            }

            .tab-scroll-wrapper {
                overflow-x: auto;
                white-space: nowrap;
            }

            #tabSwitcher .btn {
                white-space: nowrap;
                /* biar teks dalam button gak pecah ke bawah */
            }


            /* modall */
            .modal {
                display: none;
                position: fixed;
                z-index: 100;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.4);
            }

            .modal-content {
                background-color: #fff;
                position: absolute;
                top: 3%;
                left: 30%;
                /* transform: translate(-50%, -50%); */
                padding: 20px;
                width: 50%;
                border-radius: 10px;
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
        <div class="card-body">
            <h5 class="card-title mb-3">PT. Pertamina Gas</h5>

            <div class="d-flex align-items-stretch gap-3">
                <button onclick="openModal()" class="btn btn-primary px-4 py-2" style="white-space: nowrap;">Create
                    Data</button>

                <div class="tab-scroll-wrapper flex-grow-1">
                    <div class="btn-group" role="group" id="tabSwitcher">
                        <a href="{{ route('pertamina-gas') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('pertamina-gas') ? 'active' : '' }}">
                            Pertmina Gas
                        </a>
                        <a href="{{ route('mandatory-certification-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('mandatory-certification-ptg') ? 'active' : '' }}">
                            Mandatory Certification PTG
                        </a>
                        <a href="{{ route('sap-asset-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('sap-asset-ptg') ? 'active' : '' }}">
                            SAP Asset PTG
                        </a>
                        <a href="{{ route('status-plo-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('status-plo-ptg') ? 'active' : '' }}">
                            Status PLO PTG
                        </a>
                        <a href="{{ route('asset-breakdown-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('asset-breakdown-ptg') ? 'active' : '' }}">
                            Asset Breakdown PTG
                        </a>
                        <a href="{{ route('kondisi-vacant-fungsi-aims-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('kondisi-vacant-fungsi-aims-ptg') ? 'active' : '' }}">
                            Kondisi Vacant Fungsi AIMS PTG
                        </a>
                        <a href="{{ route('rencana-pemeliharaan-besar-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('rencana-pemeliharaan-besar-ptg') ? 'active' : '' }}">
                            Rencana Pemeliharaan Besar PTG
                        </a>
                        <a href="{{ route('sistem-informasi-aims-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('sistem-informasi-aims-ptg') ? 'active' : '' }}">
                            Sistem Informasi AIMS PTG
                        </a>
                        <a href="{{ route('pelatihan-aims-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('pelatihan-aims-ptg') ? 'active' : '' }}">
                            Pelatihan AIMS PTG
                        </a>
                        <a href="{{ route('realisasi-anggaran-ai-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('realisasi-anggaran-ai-ptg') ? 'active' : '' }}">
                            Realisasi Anggaran AI 2025 PTG
                        </a>
                        <a href="{{ route('realisasi-progress-fisik-ai-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('realisasi-progress-fisik-ai-ptg') ? 'active' : '' }}">
                            Realisasi Progress Fisik AI PTG 2025
                        </a>
                        <a href="{{ route('availability-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('availability-ptg') ? 'active' : '' }}">
                            Availability PTG
                        </a>
                        <a href="{{ route('air-budget-tagging-ptg') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('air-budget-tagging-ptg') ? 'active' : '' }}">
                            Availability PTG
                        </a>
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
            <h3>Create New Data</h3>
            <form id="createForm" class="form-grid">
                <div class="form-column">
                    <input type="hidden" name="id" id="form-id">

                    <label>Periode:</label>
                    <input type="text" name="periode" id="periode" required>

                    <label>Subholding:</label>
                    <input type="text" name="subholding" id="subholding" required>

                    <label for="company">Company:</label>
                    <select name="company" id="company" required class="form-select">
                        <option value="">-- Pilih Company --</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company }}">{{ $company }}</option>
                        @endforeach
                    </select>

                    <label>Unit:</label>
                    <input type="text" name="unit" id="unit" required>

                    <label>Asset Group:</label>
                    <input type="text" name="asset_group" id="asset_group" required>

                    <label>Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" required>

                    <label>SECE Low Integrity - Breakdown:</label>
                    <input type="number" name="sece_low_breakdown" id="sece_low_breakdown">

                    <label>SECE Medium Integrity - Due Date Inspection:</label>
                    <input type="number" name="sece_medium_due_date_inspection" id="sece_medium_due_date_inspection">

                    <label>SECE Medium Integrity - Low Condition:</label>
                    <input type="number" name="sece_medium_low_condition" id="sece_medium_low_condition">

                    <label>SECE Medium Integrity - Low Performance:</label>
                    <input type="number" name="sece_medium_low_performance" id="sece_medium_low_performance">

                    <label>SECE High Integrity:</label>
                    <input type="number" name="sece_high" id="sece_high">

                    <label>PCE Low Integrity - Breakdown:</label>
                    <input type="number" name="pce_low_breakdown" id="pce_low_breakdown">

                    <label>PCE Medium Integrity - Due Date Inspection:</label>
                    <input type="number" name="pce_medium_due_date_inspection" id="pce_medium_due_date_inspection">
                </div>

                <!-- Kolom Kanan -->
                <div class="form-column">
                    <label>PCE Medium Integrity - Low Condition:</label>
                    <input type="number" name="pce_medium_low_condition" id="pce_medium_low_condition">

                    <label>PCE Medium Integrity - Low Performance:</label>
                    <input type="number" name="pce_medium_low_performance" id="pce_medium_low_performance">

                    <label>PCE High Integrity:</label>
                    <input type="number" name="pce_high" id="pce_high">

                    <label>IMPORTANT Low Integrity - Breakdown:</label>
                    <input type="number" name="important_low_breakdown" id="important_low_breakdown">

                    <label>IMPORTANT Medium Integrity - Due Date Inspection:</label>
                    <input type="number" name="important_medium_due_date_inspection"
                        id="important_medium_due_date_inspection">

                    <label>IMPORTANT Medium Integrity - Low Condition:</label>
                    <input type="number" name="important_medium_low_condition" id="important_medium_low_condition">

                    <label>IMPORTANT Medium Integrity - Low Performance:</label>
                    <input type="number" name="important_medium_low_performance"
                        id="important_medium_low_performance">

                    <label>IMPORTANT High Integrity:</label>
                    <input type="number" name="important_high" id="important_high">

                    <label>SECONDARY Low Integrity - Breakdown:</label>
                    <input type="number" name="secondary_low_breakdown" id="secondary_low_breakdown">

                    <label>SECONDARY Medium Integrity - Due Date Inspection:</label>
                    <input type="number" name="secondary_medium_due_date_inspection"
                        id="secondary_medium_due_date_inspection">

                    <label>SECONDARY Medium Integrity - Low Condition:</label>
                    <input type="number" name="secondary_medium_low_condition" id="secondary_medium_low_condition">

                    <label>SECONDARY Medium Integrity - Low Performance:</label>
                    <input type="number" name="secondary_medium_low_performance"
                        id="secondary_medium_low_performance">

                    <label>SECONDARY High Integrity:</label>
                    <input type="number" name="secondary_high" id="secondary_high">

                    <label>Kegiatan Penurunan Low:</label>
                    <input type="text" name="kegiatan_penurunan_low" id="kegiatan_penurunan_low">

                    <label>Kegiatan Penurunan Med:</label>
                    <input type="text" name="kegiatan_penurunan_med" id="kegiatan_penurunan_med">

                    <label>Informasi Penyebab Low Integrity:</label>
                    <input type="text" name="penyebab_low_integrity" id="penyebab_low_integrity">

                    <label>Informasi Penambahan Jumlah Aset:</label>
                    <input type="text" name="penambahan_jumlah_aset" id="penambahan_jumlah_aset">

                    <label>Informasi Naik Turun Low Integrity:</label>
                    <input type="text" name="naik_turun_low_integrity" id="naik_turun_low_integrity">
                </div>

                <!-- Tombol Submit -->
                <div class="form-actions" style="grid-column: span 2;">
                    <br><br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>

        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/tabulator-tables@5.6.0/dist/js/tabulator.min.js"></script>

        <script>
            const table = new Tabulator("#example-table", {
                layout: "fitDataTable",
                responsiveLayout: "collapse",
                autoResize: true,
                selectableRange: 1,
                selectableRangeColumns: true,
                selectableRangeRows: true,
                selectableRangeClearCells: true,
                editTriggerEvent: "dblclick",

                pagination: "local",
                paginationSize: 20,
                paginationSizeSelector: [40, 60, 80, 100],
                movableColumns: true,
                paginationCounter: "rows",

                clipboard: true,
                clipboardCopyStyled: false,
                clipboardCopyConfig: {
                    rowHeaders: false,
                    columnHeaders: false,
                },
                clipboardCopyRowRange: "range",
                clipboardPasteParser: "range",
                clipboardPasteAction: "range",

                rowHeader: {
                    resizable: false,
                    frozen: true,
                    width: 40,
                    hozAlign: "center",
                    formatter: "rownum",
                    cssClass: "range-header-col",
                    editor: false
                },

                columnDefaults: {
                    headerSort: true,
                    headerHozAlign: "center",
                    editor: "input",
                    resizable: "header",
                },

            });

            const columnMap = {
                "pertamina-gas": [{
                        title: "No",
                        formatter: "rownum",
                        hozAlign: "center",
                        width: 60
                    },
                    {
                        title: "Periode",
                        field: "periode"
                    },
                    {
                        title: "Subholding",
                        field: "subholding"
                    },
                    {
                        title: "Company",
                        field: "company"
                    },
                    {
                        title: "Unit",
                        field: "unit"
                    },
                    {
                        title: "Asset Group",
                        field: "asset_group"
                    },
                    {
                        title: "Jumlah",
                        field: "jumlah",
                        hozAlign: "center"
                    },

                    // SECE
                    {
                        title: "SECE Low - Breakdown",
                        field: "sece_low_breakdown",
                        hozAlign: "center"
                    },
                    {
                        title: "SECE Med - Due Date",
                        field: "sece_medium_due_date_inspection",
                        hozAlign: "center"
                    },
                    {
                        title: "SECE Med - Low Condition",
                        field: "sece_medium_low_condition",
                        hozAlign: "center"
                    },
                    {
                        title: "SECE Med - Low Performance",
                        field: "sece_medium_low_performance",
                        hozAlign: "center"
                    },
                    {
                        title: "SECE High",
                        field: "sece_high",
                        hozAlign: "center"
                    },

                    // PCE
                    {
                        title: "PCE Low - Breakdown",
                        field: "pce_low_breakdown",
                        hozAlign: "center"
                    },
                    {
                        title: "PCE Med - Due Date",
                        field: "pce_medium_due_date_inspection",
                        hozAlign: "center"
                    },
                    {
                        title: "PCE Med - Low Condition",
                        field: "pce_medium_low_condition",
                        hozAlign: "center"
                    },
                    {
                        title: "PCE Med - Low Performance",
                        field: "pce_medium_low_performance",
                        hozAlign: "center"
                    },
                    {
                        title: "PCE High",
                        field: "pce_high",
                        hozAlign: "center"
                    },

                    // IMPORTANT
                    {
                        title: "IMPORTANT Low - Breakdown",
                        field: "important_low_breakdown",
                        hozAlign: "center"
                    },
                    {
                        title: "IMPORTANT Med - Due Date",
                        field: "important_medium_due_date_inspection",
                        hozAlign: "center"
                    },
                    {
                        title: "IMPORTANT Med - Low Condition",
                        field: "important_medium_low_condition",
                        hozAlign: "center"
                    },
                    {
                        title: "IMPORTANT Med - Low Performance",
                        field: "important_medium_low_performance",
                        hozAlign: "center"
                    },
                    {
                        title: "IMPORTANT High",
                        field: "important_high",
                        hozAlign: "center"
                    },

                    // SECONDARY
                    {
                        title: "SECONDARY Low - Breakdown",
                        field: "secondary_low_breakdown",
                        hozAlign: "center"
                    },
                    {
                        title: "SECONDARY Med - Due Date",
                        field: "secondary_medium_due_date_inspection",
                        hozAlign: "center"
                    },
                    {
                        title: "SECONDARY Med - Low Condition",
                        field: "secondary_medium_low_condition",
                        hozAlign: "center"
                    },
                    {
                        title: "SECONDARY Med - Low Performance",
                        field: "secondary_medium_low_performance",
                        hozAlign: "center"
                    },
                    {
                        title: "SECONDARY High",
                        field: "secondary_high",
                        hozAlign: "center"
                    },

                    // Info tambahan
                    {
                        title: "Kegiatan Penurunan Low",
                        field: "kegiatan_penurunan_low",
                        hozAlign: "center"
                    },
                    {
                        title: "Kegiatan Penurunan Med",
                        field: "kegiatan_penurunan_med",
                        hozAlign: "center"
                    },
                    {
                        title: "Penyebab Low Integrity",
                        field: "penyebab_low_integrity",
                        hozAlign: "center"
                    },
                    {
                        title: "Penambahan Aset",
                        field: "penambahan_jumlah_aset",
                        hozAlign: "center"
                    },
                    {
                        title: "Naik Turun Low Integrity",
                        field: "naik_turun_low_integrity",
                        hozAlign: "center"
                    },
                    {
                        title: "Aksi",
                        formatter: (cell, formatterParams) => {
                            const row = cell.getData();
                            return `
                        <button onclick='editData(${JSON.stringify(row)})'>Edit</button>
                        <button onclick='deleteData("${row.id}")'>Hapus</button>
                        `;
                        },
                        hozAlign: "center",
                        width: 150
                    }
                ]
            };


            const routeMap = {
                "pertamina-gas": "{{ route('pertamina-gas.data') }}"
            };

            document.querySelectorAll('#tabSwitcher a').forEach(btn => {
                btn.addEventListener('click', function() {
                    localStorage.setItem('currentTab', this.getAttribute('data-tab'));
                    document.querySelectorAll('#tabSwitcher a').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    const selectedTab = this.getAttribute('data-tab');
                    loadTabData(selectedTab);
                });
            });

            function loadTabData(tabName) {
                const selectedColumns = columnMap[tabName] || [];
                table.setColumns(selectedColumns);
                table.clearData();

                const endpoint = routeMap[tabName];

                if (endpoint) {
                    fetch(endpoint, {
                            headers: {
                                "Accept": "application/json"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log("Data for " + tabName + ":", data);
                            table.setData(data);
                            table.redraw();
                        })
                        .catch(error => {
                            console.error("Error loading data for " + tabName + ":", error);
                        });
                }
            }

            function editData(row) {
                document.getElementById("form-id").value = row.id;
                document.getElementById("periode").value = row.periode;
                document.getElementById("subholding").value = row.subholding;
                document.getElementById("company").value = row.company;
                document.getElementById("unit").value = row.unit;
                document.getElementById("asset_group").value = row.asset_group;
                document.getElementById("jumlah").value = row.jumlah;

                document.getElementById("sece_low_breakdown").value = row.sece_low_breakdown;
                document.getElementById("sece_medium_due_date_inspection").value = row.sece_medium_due_date_inspection;
                document.getElementById("sece_medium_low_condition").value = row.sece_medium_low_condition;
                document.getElementById("sece_medium_low_performance").value = row.sece_medium_low_performance;
                document.getElementById("sece_high").value = row.sece_high;

                document.getElementById("pce_low_breakdown").value = row.pce_low_breakdown;
                document.getElementById("pce_medium_due_date_inspection").value = row.pce_medium_due_date_inspection;
                document.getElementById("pce_medium_low_condition").value = row.pce_medium_low_condition;
                document.getElementById("pce_medium_low_performance").value = row.pce_medium_low_performance;
                document.getElementById("pce_high").value = row.pce_high;

                document.getElementById("important_low_breakdown").value = row.important_low_breakdown;
                document.getElementById("important_medium_due_date_inspection").value = row
                    .important_medium_due_date_inspection;
                document.getElementById("important_medium_low_condition").value = row.important_medium_low_condition;
                document.getElementById("important_medium_low_performance").value = row.important_medium_low_performance;
                document.getElementById("important_high").value = row.important_high;

                document.getElementById("secondary_low_breakdown").value = row.secondary_low_breakdown;
                document.getElementById("secondary_medium_due_date_inspection").value = row
                    .secondary_medium_due_date_inspection;
                document.getElementById("secondary_medium_low_condition").value = row.secondary_medium_low_condition;
                document.getElementById("secondary_medium_low_performance").value = row.secondary_medium_low_performance;
                document.getElementById("secondary_high").value = row.secondary_high;

                document.getElementById("kegiatan_penurunan_low").value = row.kegiatan_penurunan_low;
                document.getElementById("kegiatan_penurunan_med").value = row.kegiatan_penurunan_med;
                document.getElementById("penyebab_low_integrity").value = row.penyebab_low_integrity;
                document.getElementById("penambahan_jumlah_aset").value = row.penambahan_jumlah_aset;
                document.getElementById("naik_turun_low_integrity").value = row.naik_turun_low_integrity;
                openModal();
            }

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`pertamina-gas/${id}`, {
                            method: "DELETE",
                            headers: {
                                "Accept": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                alert(result.message);
                                table.setData("/monev/shg/input-data/pertamina-gas/data")
                                this.reset();
                            } else {
                                alert('Gagal menyimpan data');
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("pertamina-gas");
                localStorage.setItem("currentTab", "pertamina-gas");
            });
        </script>

        {{-- create and update data --}}
        <script>
            function openModal() {
                document.getElementById("createModal").style.display = "block";
            }

            function closeModal() {
                document.getElementById("createForm").reset();
                document.getElementById("form-id").value = "";
                document.getElementById("createModal").style.display = "none";
            }

            // update and create
            document.getElementById("createForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const data = Object.fromEntries(formData.entries());
                console.log("Data submitted:", data);

                const id = document.getElementById("form-id").value;
                const periode = document.getElementById("periode").value;
                const subholding = document.getElementById("subholding").value;
                const company = document.getElementById("company").value;
                const unit = document.getElementById("unit").value;
                const assetGroup = document.getElementById("asset_group").value;
                const jumlah = document.getElementById("jumlah").value ? parseInt(document.getElementById("jumlah")
                    .value) : null;

                const seceLowBreakdown = document.getElementById("sece_low_breakdown").value ? parseInt(document
                    .getElementById("sece_low_breakdown").value) : null;
                const seceMediumDueDateInspection = document.getElementById("sece_medium_due_date_inspection").value ?
                    parseInt(document.getElementById("sece_medium_due_date_inspection").value) : null;
                const seceMediumLowCondition = document.getElementById("sece_medium_low_condition").value ? parseInt(
                    document.getElementById("sece_medium_low_condition").value) : null;
                const seceMediumLowPerformance = document.getElementById("sece_medium_low_performance").value ?
                    parseInt(document.getElementById("sece_medium_low_performance").value) : null;
                const seceHigh = document.getElementById("sece_high").value ? parseInt(document.getElementById(
                    "sece_high").value) : null;

                const pceLowBreakdown = document.getElementById("pce_low_breakdown").value ? parseInt(document
                    .getElementById("pce_low_breakdown").value) : null;
                const pceMediumDueDateInspection = document.getElementById("pce_medium_due_date_inspection").value ?
                    parseInt(document.getElementById("pce_medium_due_date_inspection").value) : null;
                const pceMediumLowCondition = document.getElementById("pce_medium_low_condition").value ? parseInt(
                    document.getElementById("pce_medium_low_condition").value) : null;
                const pceMediumLowPerformance = document.getElementById("pce_medium_low_performance").value ? parseInt(
                    document.getElementById("pce_medium_low_performance").value) : null;
                const pceHigh = document.getElementById("pce_high").value ? parseInt(document.getElementById("pce_high")
                    .value) : null;

                const importantLowBreakdown = document.getElementById("important_low_breakdown").value ? parseInt(
                    document.getElementById("important_low_breakdown").value) : null;
                const importantMediumDueDateInspection = document.getElementById("important_medium_due_date_inspection")
                    .value ? parseInt(document.getElementById("important_medium_due_date_inspection").value) : null;
                const importantMediumLowCondition = document.getElementById("important_medium_low_condition").value ?
                    parseInt(document.getElementById("important_medium_low_condition").value) : null;
                const importantMediumLowPerformance = document.getElementById("important_medium_low_performance")
                    .value ? parseInt(document.getElementById("important_medium_low_performance").value) : null;
                const importantHigh = document.getElementById("important_high").value ? parseInt(document
                    .getElementById("important_high").value) : null;

                const secondaryLowBreakdown = document.getElementById("secondary_low_breakdown").value ? parseInt(
                    document.getElementById("secondary_low_breakdown").value) : null;
                const secondaryMediumDueDateInspection = document.getElementById("secondary_medium_due_date_inspection")
                    .value ? parseInt(document.getElementById("secondary_medium_due_date_inspection").value) : null;
                const secondaryMediumLowCondition = document.getElementById("secondary_medium_low_condition").value ?
                    parseInt(document.getElementById("secondary_medium_low_condition").value) : null;
                const secondaryMediumLowPerformance = document.getElementById("secondary_medium_low_performance")
                    .value ? parseInt(document.getElementById("secondary_medium_low_performance").value) : null;
                const secondaryHigh = document.getElementById("secondary_high").value ? parseInt(document
                    .getElementById("secondary_high").value) : null;

                const kegiatanPenurunanLow = document.getElementById("kegiatan_penurunan_low").value ? parseInt(document
                    .getElementById("kegiatan_penurunan_low").value) : null;
                const kegiatanPenurunanMed = document.getElementById("kegiatan_penurunan_med").value ? parseInt(document
                    .getElementById("kegiatan_penurunan_med").value) : null;
                const penyebabLowIntegrity = document.getElementById("penyebab_low_integrity").value;
                const penambahanJumlahAset = document.getElementById("penambahan_jumlah_aset").value;
                const naikTurunLowIntegrity = document.getElementById("naik_turun_low_integrity").value;


                const method = id ? "PUT" : "POST";
                const url = id ? `pertamina-gas/${id}` : "pertamina-gas";

                fetch(url, {
                        method: method,
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            id: document.getElementById("form-id").value,
                            periode: document.getElementById("periode").value,
                            subholding: document.getElementById("subholding").value,
                            company: document.getElementById("company").value,
                            unit: document.getElementById("unit").value,
                            asset_group: document.getElementById("asset_group").value,
                            jumlah: document.getElementById("jumlah").value,
                            sece_low_breakdown: document.getElementById("sece_low_breakdown").value,
                            sece_medium_due_date_inspection: document.getElementById(
                                "sece_medium_due_date_inspection").value,
                            sece_medium_low_condition: document.getElementById("sece_medium_low_condition")
                                .value,
                            sece_medium_low_performance: document.getElementById(
                                "sece_medium_low_performance").value,
                            sece_high: document.getElementById("sece_high").value,
                            pce_low_breakdown: document.getElementById("pce_low_breakdown").value,
                            pce_medium_due_date_inspection: document.getElementById(
                                "pce_medium_due_date_inspection").value,
                            pce_medium_low_condition: document.getElementById("pce_medium_low_condition")
                                .value,
                            pce_medium_low_performance: document.getElementById(
                                "pce_medium_low_performance").value,
                            pce_high: document.getElementById("pce_high").value,
                            important_low_breakdown: document.getElementById("important_low_breakdown")
                                .value,
                            important_medium_due_date_inspection: document.getElementById(
                                "important_medium_due_date_inspection").value,
                            important_medium_low_condition: document.getElementById(
                                "important_medium_low_condition").value,
                            important_medium_low_performance: document.getElementById(
                                "important_medium_low_performance").value,
                            important_high: document.getElementById("important_high").value,
                            secondary_low_breakdown: document.getElementById("secondary_low_breakdown")
                                .value,
                            secondary_medium_due_date_inspection: document.getElementById(
                                "secondary_medium_due_date_inspection").value,
                            secondary_medium_low_condition: document.getElementById(
                                "secondary_medium_low_condition").value,
                            secondary_medium_low_performance: document.getElementById(
                                "secondary_medium_low_performance").value,
                            secondary_high: document.getElementById("secondary_high").value,
                            kegiatan_penurunan_low: document.getElementById("kegiatan_penurunan_low").value,
                            kegiatan_penurunan_med: document.getElementById("kegiatan_penurunan_med").value,
                            penyebab_low_integrity: document.getElementById("penyebab_low_integrity").value,
                            penambahan_jumlah_aset: document.getElementById("penambahan_jumlah_aset").value,
                            naik_turun_low_integrity: document.getElementById("naik_turun_low_integrity")
                                .value
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            // table.addRow([result.data]);
                            table.setData("/monev/shg/input-data/pertamina-gas/data");
                            this.reset();
                        } else {
                            alert('Gagal menyimpan data');
                        }
                    })
                    .catch(error => {
                        console.error("Error submitting data:", error);
                        alert('Terjadi kesalahan saat mengirim data.');
                    })
                    .finally(() => {
                        closeModal();
                        this.reset();
                    });
            });
        </script>
    @endpush
</x-layouts.app>
