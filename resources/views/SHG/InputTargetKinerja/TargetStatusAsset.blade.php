@section('title', __('TargetStatusAssset'))
<x-layouts.app :title="__('TargetStatusAssset')">
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
            <h5 class="card-title mb-3">Status Asset Integrity</h5>

            <div class="d-flex align-items-stretch gap-3">
                <button onclick="openModal()" class="btn btn-primary">Create Data</button>

                <div class="tab-scroll-wrapper flex-grow-1">
                    <div class="btn-group" role="group" id="tabSwitcher">
                        <a href="{{ route('status-asset-integrity') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('status-asset-integrity') ? 'active' : '' }}">
                            Status Asset Integrity
                        </a>
                        <a href="{{ route('target-status-asset') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('target-status-asset') ? 'active' : '' }}">
                            Target Status Asset Integrity
                        </a>
                        <a href="{{ route('target-2025-ai') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('target-2025-ai') ? 'active' : '' }}">
                            Target 2025 KPI
                        </a>
                        <a href="{{ route('target-sap') }}"
                            class="btn btn-outline-secondary {{ request()->routeIs('target-sap') ? 'active' : '' }}"
                            data-tab="target-sap">
                            Target SAP Asset
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

                <label>Low SECE:</label>
                <input type="number" name="low_sece"><br>

                <label>Low PCE:</label>
                <input type="number" name="low_pce"><br>

                <label>Low Important:</label>
                <input type="number" name="low_important"><br>

                <label>Information:</label>
                <input type="text" name="information"></input><br><br>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/tabulator-tables@5.6.0/dist/js/tabulator.min.js"></script>

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

            const columnMap = {
                "target-status-asset": [{
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
            };

            const routeMap = {
                "target-status-asset": "{{ route('target-status-asset.data') }}",
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
                document.getElementById("unit_operasi").value = row.unit_operasi;
                document.getElementById("jumlah").value = row.jumlah;
                openModal();
            }

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`/target-sap/${id}`, {
                            method: "DELETE",
                            headers: {
                                "Accept": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                            }
                        }).then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                alert(result.message);
                                table.replaceData(); // refresh
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("target-status-asset");
                localStorage.setItem("currentTab", "target-status-asset");
            });
        </script>

        {{-- create data Status Asset Integrity --}}
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

                fetch("{{ route('target-status-asset') }}", {
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
