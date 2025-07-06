@section('title', __(''))
<x-layouts.app :title="__('')">
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
            <h5 class="card-title mb-3">Target SAP Asset</h5>

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
            <h3>Tambah Target SAP</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">
                <div>
                    <label>Unit Operasi</label>
                    <input type="text" name="unit_operasi" id="unit_operasi" required>
                </div>
                <div>
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" required>
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
                "target-sap": [{
                        title: "No",
                        formatter: "rownum",
                        hozAlign: "center",
                        width: 60
                    },
                    {
                        title: "Unit Operasi",
                        field: "unit_operasi"
                    },
                    {
                        title: "Jumlah",
                        field: "jumlah"
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
                ],
            };

            const routeMap = {
                "target-sap": "{{ route('target-sap.data') }}",
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
                    fetch(`target-sap/${id}`, {
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
                                table.setData("/monev/shg/kinerja/target-sap/data")
                                this.reset();
                            } else {
                                alert('Gagal menyimpan data');
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("target-sap");
                localStorage.setItem("currentTab", "target-sap");
            });
        </script>

        {{-- create data Status Asset Integrity --}}
        <script>
            function openModal() {
                document.getElementById("createModal").style.display = "block";
            }

            function closeModal() {
                document.getElementById("createForm").reset();
                document.getElementById("form-id").value = "";
                document.getElementById("createModal").style.display = "none";
            }

            // update and delete data
            document.getElementById("createForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const data = Object.fromEntries(formData.entries());
                console.log("Data submitted:", data);

                const id = document.getElementById("form-id").value;
                const unitOperasi = document.getElementById("unit_operasi").value;
                const jumlah = document.getElementById("jumlah").value;

                const method = id ? "PUT" : "POST";
                const url = id ? `target-sap/${id}` : "target-sap";

                fetch(url, {
                        method: method,
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            unit_operasi: unitOperasi,
                            jumlah: jumlah
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            // table.addRow([result.data]);
                            table.setData("/monev/shg/kinerja/target-sap/data");
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
