@section('title', __('TargetStatusAssetInteregrity'))
<x-layouts.app :title="__('TargetStatusAssetInteregrity')">
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
            <h5 class="card-title mb-3 d-flex justify-content-between">Status Asset Integrity</h5>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <button class="btn btn-primary" id="btnCreate">Create Data</button>

                <div class="btn-group" role="group" id="tabSwitcher">
                    <button type="button" class="btn btn-outline-secondary active" data-tab="status-asset">Status Asset
                        Integrity</button>
                    <button type="button" class="btn btn-outline-secondary" data-tab="target-status">Target Status
                        Asset Integrity</button>
                    <button type="button" class="btn btn-outline-secondary"
                        data-tab="target-2025">Target-2025-AI</button>
                    <button type="button" class="btn btn-outline-secondary" data-tab="prognosa">Prognosa Status -
                        AI</button>
                    <button type="button" class="btn btn-outline-secondary" data-tab="selisih">Selisih YTD Status Low
                        Integrity</button>
                    <button type="button" class="btn btn-outline-secondary" data-tab="target-sap">Target SAP
                        Asset</button>
                </div>
            </div>

            <div id="mainTable"></div>

            <br><br>
            <div class="tabulator-wrapper">
                <div id="example-table"></div>
            </div>
        </div>
    </div>

    <div id="createModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Create New Data</h3>
            <form id="createForm">
                <label>Periode:</label>
                <input type="text" name="periode" required><br>

                <label>Company:</label>
                <input type="text" name="company" required><br>

                <label>Asset Group:</label>
                <input type="text" name="asset_group" required><br>

                <label>Green Integrity:</label>
                <input type="number" name="green_integrity" required><br>

                <label>Yellow Integrity:</label>
                <input type="number" name="yellow_integrity" required><br>

                <label>Red Integrity:</label>
                <input type="number" name="red_integrity" required><br>

                <label>Information:</label>
                <input type="text" name="information"></input><br><br>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/tabulator-tables@5.6.0/dist/js/tabulator.min.js"></script>

        {{-- <script>
            const table = new Tabulator("#example-table", {
                layout: "fitColumns",
                responsiveLayout: "collapse",
                autoResize: true,
                movableColumns: true,
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

                columns: [{
                        title: "No",
                        formatter: "rownum",
                        hozAlign: "center",
                        width: 60,
                        headerSort: true,
                        sorter: "number",
                        frozen: true
                    },
                    {
                        title: "Periode",
                        field: "periode",
                    },
                    {
                        title: "Company",
                        field: "company",
                    },
                    {
                        title: "Asset Group",
                        field: "asset_group",
                    },
                    {
                        title: "Green Integrity",
                        field: "green_integrity",
                        hozAlign: "center",
                        sorter: "number",
                    },
                    {
                        title: "Yellow Integrity",
                        field: "yellow_integrity",
                        hozAlign: "center",
                        sorter: "number",
                    },
                    {
                        title: "Red Integrity",
                        field: "red_integrity",
                        hozAlign: "center",
                        sorter: "number",
                    },
                    {
                        title: "Information",
                        field: "information",
                        width: 300,
                    },
                ],

            });

            // Initial fetch default tab
            loadTabData("status-asset");

            // Tab click event
            document.querySelectorAll('#tabSwitcher button').forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class
                    document.querySelectorAll('#tabSwitcher button').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const selectedTab = this.getAttribute('data-tab');
                    loadTabData(selectedTab);
                });
            });

            function loadTabData(tabName) {
                let routeMap = {
                    "status-asset": "{{ route('target-status-asset-integrity.data') }}",
                };

                let endpoint = routeMap[tabName];

                if (!endpoint) return console.error("Route not defined for tab:", tabName);

                fetch(endpoint, {
                        headers: {
                            "Accept": "application/json"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Data for " + tabName + ":", data);
                        table.setData(data);
                    })
                    .catch(error => {
                        console.error("Error loading data for " + tabName + ":", error);
                    });
            }
        </script> --}}

        <script>
            const table = new Tabulator("#example-table", {
                layout: "fitColumns",
                responsiveLayout: "collapse",
                autoResize: true,
                movableColumns: true,
                pagination: "local",
                paginationSize: 20,
                paginationSizeSelector: [40, 60, 80, 100],
                paginationCounter: "rows",
                clipboard: true,
                clipboardCopyStyled: false,
                clipboardCopyConfig: {
                    rowHeaders: false,
                    columnHeaders: false
                },
                clipboardCopyRowRange: "range",
                clipboardPasteParser: "range",
                clipboardPasteAction: "range",
                columnDefaults: {
                    headerSort: true,
                    headerHozAlign: "center",
                    editor: "input",
                    resizable: "header",
                },
            });

            // Map kolom untuk tiap tab
            const columnMap = {
                "status-asset": [
                    {
                        title: "No",
                        formatter: "rownum",
                        hozAlign: "center",
                        width: 60,
                        headerSort: true,
                        sorter: "number",
                        frozen: true
                    },
                    {
                        title: "Periode",
                        field: "periode",
                    },
                    {
                        title: "Company",
                        field: "company",
                    },
                    {
                        title: "Asset Group",
                        field: "asset_group",
                    },
                    {
                        title: "Green Integrity",
                        field: "green_integrity",
                        hozAlign: "center",
                        sorter: "number",
                    },
                    {
                        title: "Yellow Integrity",
                        field: "yellow_integrity",
                        hozAlign: "center",
                        sorter: "number",
                    },
                    {
                        title: "Red Integrity",
                        field: "red_integrity",
                        hozAlign: "center",
                        sorter: "number",
                    },
                    {
                        title: "Information",
                        field: "information",
                    },
                ],
                "target-status": [
                    {
                        title: "No",
                        formatter: "rownum",
                        hozAlign: "center",
                        width: 60,
                        headerSort: true,
                        sorter: "number",
                        frozen: true
                    },
                    {
                        title: "Periode",
                        field: "periode"
                    },
                    {
                        title: "Company",
                        field: "company"
                    },
                    {
                        title: "Asset Group",
                        field: "asset_group"
                    },
                    {
                        title: "Green Integrity",
                        field: "green_integrity",
                        width: 150,
                    },
                    {
                        title: "Yellow Integrity",
                        field: "yellow_integrity",
                        width: 150,
                    },
                    {
                        title: "Red Integrity",
                        field: "red_integrity"
                    },
                    {
                        title: "Low SECE",
                        field: "low_sece"
                    },
                    {
                        title: "Low PCE",
                        field: "low_pce"
                    },
                    {
                        title: "Low Important",
                        field: "low_important",
                        width: 180,
                    },
                    {
                        title: "Information",
                        field: "information"
                    },
                ],
                "target-2025": [
                    {
                        title: "No",
                        formatter: "rownum",
                        hozAlign: "center",
                        width: 60,
                        headerSort: true,
                        sorter: "number",
                        frozen: true
                    },
                    {
                        title: "Periode",
                        field: "periode"
                    },
                    {
                        title: "Company",
                        field: "company"
                    },
                    {
                        title: "Penurunan Kumulatif Low Integrity",
                        field: "low_kumulatif"
                    },
                    {
                        title: "Penurunan Kumulatif Medium Integrity",
                        field: "medium_kumulatif"
                    },
                ],
                "prognosa": [
                    {
                        title: "No",
                        formatter: "rownum",
                        hozAlign: "center",
                        width: 60,
                        headerSort: true,
                        sorter: "number",
                        frozen: true
                    },
                    {
                        title: "Periode",
                        field: "periode"
                    },
                    {
                        title: "Company",
                        field: "company"
                    },
                    {
                        title: "Low - SECE",
                        field: "low_sece"
                    },
                    {
                        title: "Low - PCE",
                        field: "low_pce"
                    },
                    {
                        title: "Low - Important",
                        field: "low_important",
                        width: 180,
                    },
                    {
                        title: "Med - SECE",
                        field: "med_sece"
                    },
                    {
                        title: "Med - PCE",
                        field: "med_pce"
                    },
                    {
                        title: "Med - Important",
                        field: "med_important",
                        width: 180,

                    },
                    {
                        title: "Jumlah",
                        field: "jumlah"
                    },
                    {
                        title: "High",
                        field: "high"
                    },
                ],
                "selisih": [
                    {
                        title: "No",
                        formatter: "rownum",
                        hozAlign: "center",
                        width: 60,
                        headerSort: true,
                        sorter: "number",
                        frozen: true
                    },
                    {
                        title: "Periode",
                        field: "periode"
                    },
                    {
                        title: "Company",
                        field: "company"
                    },
                    {
                        title: "Asset Group",
                        field: "asset_group"
                    },
                    {
                        title: "Low SECE",
                        field: "low_sece"
                    },
                    {
                        title: "Low PCE",
                        field: "low_pce"
                    },
                    {
                        title: "Low Important",
                        field: "low_important"
                    },
                    {
                        title: "Information",
                        field: "information"
                    },
                ],
                "target-sap": [
                    {
                        title: "No",
                        formatter: "rownum",
                        hozAlign: "center",
                        width: 60,
                        headerSort: true,
                        sorter: "number",
                        frozen: true
                    },
                    {
                        title: "Unit Operasi",
                        field: "unit_operasi"
                    },
                    {
                        title: "Jumlah",
                        field: "jumlah"
                    },
                ]
            };

            // Route untuk tab yang butuh fetch
            const routeMap = {
                "status-asset": "{{ route('target-status-asset-integrity.data') }}",
            };

            // Event klik tab
            document.querySelectorAll('#tabSwitcher button').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('#tabSwitcher button').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const selectedTab = this.getAttribute('data-tab');
                    loadTabData(selectedTab);
                });
            });

            // Fungsi utama untuk handle kolom + data
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
                        })
                        .catch(error => {
                            console.error("Error loading data for " + tabName + ":", error);
                        });
                }
            }

            // Load default tab saat pertama kali
            loadTabData("status-asset");
        </script>

        {{-- create data --}}
        <script>
            function openModal() {
                document.getElementById("createModal").style.display = "block";
            }

            function closeModal() {
                document.getElementById("createModal").style.display = "none";
            }
            document.getElementById("createForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const data = Object.fromEntries(formData.entries());
                console.log("Data submitted:", data);

                const token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

                fetch("{{ route('target-status-asset-integrity') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": token,
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            table.addRow([result.data]);
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
