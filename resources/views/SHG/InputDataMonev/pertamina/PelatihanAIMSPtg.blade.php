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

            .tabulator .tabulator-cell {
                white-space: normal !important;
                word-wrap: break-word;
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
            <h5 class="card-title mb-3">Pelatihan AIMS PTG</h5>

            <div class="d-flex align-items-stretch gap-3">
                <button onclick="openModal()" class="btn btn-primary">Create Data</button>

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
            <h3>Pelatihan AIMS PTG</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">
                <div>
                    <label>Periode</label>
                    <input type="text" name="periode" id="periode" required>
                </div>

                <div>
                    <label>Company</label>
                    <input type="text" name="company" id="company" required>
                </div>

                <div>
                    <label>Judul Pelatihan/Training/Forum</label>
                    <input type="text" name="judul_pelatihan" id="judul_pelatihan" required>
                </div>

                <div>
                    <label>Realisasi Perwira</label>
                    <input type="number" name="realisasi_perwira" id="realisasi_perwira">
                </div>

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
                "pelatihan-aims-ptg": [{
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
                        title: "Company",
                        field: "company"
                    },
                    {
                        title: "Judul Pelatihan/Training/Forum",
                        field: "judul_pelatihan"
                    },
                    {
                        title: "Realisasi Perwira",
                        field: "realisasi_perwira",
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
                "pelatihan-aims-ptg": "{{ route('pelatihan-aims-ptg.data') }}"
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
                document.getElementById("company").value = row.company;
                document.getElementById("judul_pelatihan").value = row.judul_pelatihan;
                document.getElementById("realisasi_perwira").value = row.realisasi_perwira;
                openModal();
            }

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`pelatihan-aims-ptg/${id}`, {
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
                                table.setData("/monev/shg/input-data/pelatihan-aims-ptg/data")
                                this.reset();
                            } else {
                                alert('Gagal menyimpan data');
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("pelatihan-aims-ptg");
                localStorage.setItem("currentTab", "pelatihan-aims-ptg");
            });
        </script>

        {{-- create data  --}}
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
                const periode = document.getElementById("periode").value;
                const company = document.getElementById("company").value;
                const judulPelatihan = document.getElementById("judul_pelatihan").value;
                const realisasiPerwira = document.getElementById("realisasi_perwira").value;

                const method = id ? "PUT" : "POST";
                const url = id ? `pelatihan-aims-ptg/${id}` : "pelatihan-aims-ptg";

                fetch(url, {
                        method: method,
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            periode: periode,
                            company: company,
                            judul_pelatihan: judulPelatihan,
                            realisasi_perwira: realisasiPerwira
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            // table.addRow([result.data]);
                            table.setData("/monev/shg/input-data/pelatihan-aims-ptg/data");
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
