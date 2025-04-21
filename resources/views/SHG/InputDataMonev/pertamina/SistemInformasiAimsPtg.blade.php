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
            <h5 class="card-title mb-3">Sistem Informasi AIMS PTG </h5>

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
            <h3>Tambah Sistem Informasi AIMS PTG</h3>
            <form id="createForm">

                <input type="hidden" name="id" id="form-id">
                <div>
                    <label for="periode">Periode</label>
                    <input type="text" id="periode" name="periode" required>
                </div>

                <div>
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company" required>
                </div>

                <div>
                    <label for="jumlah_aset_operasi">Jumlah Aset Operasi</label>
                    <input type="number" id="jumlah_aset_operasi" name="jumlah_aset_operasi">
                </div>

                <div>
                    <label for="jumlah_aset_teregister">Jumlah Aset Teregister</label>
                    <input type="number" id="jumlah_aset_teregister" name="jumlah_aset_teregister">
                </div>

                <div>
                    <label for="kendala_aset_register">Kendala Aset Register</label>
                    <input id="kendala_aset_register" type="text" name="kendala_aset_register"></input>
                </div>

                <div>
                    <label for="tindak_lanjut_aset_register">Tindak Lanjut Aset Register</label>
                    <input id="tindak_lanjut_aset_register" type="text" name="tindak_lanjut_aset_register"></input>
                </div>

                <div>
                    <label for="sistem_informasi_aim">Sistem Informasi AIM</label>
                    <input type="text" id="sistem_informasi_aim" name="sistem_informasi_aim">
                </div>

                <div>
                    <label for="total_wo_comply">Total WO Comply</label>
                    <input type="number" id="total_wo_comply" name="total_wo_comply">
                </div>

                <div>
                    <label for="total_wo_completed">Total WO Completed</label>
                    <input type="number" id="total_wo_completed" name="total_wo_completed">
                </div>

                <div>
                    <label for="total_wo_in_progress">Total WO In Progress</label>
                    <input type="number" id="total_wo_in_progress" name="total_wo_in_progress">
                </div>

                <div>
                    <label for="total_wo_backlog">Total WO Backlog</label>
                    <input type="number" id="total_wo_backlog" name="total_wo_backlog">
                </div>

                <div>
                    <label for="kendala">Kendala</label>
                    <input id="kendala" type="text" name="kendala"></input>
                </div>

                <div>
                    <label for="tindak_lanjut">Tindak Lanjut</label>
                    <input id="tindak_lanjut" type="text" name="tindak_lanjut"></input>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
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
                "sistem-informasi-aims-ptg": [{
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
                        title: "Jumlah Aset Operasi",
                        field: "jumlah_aset_operasi",
                        hozAlign: "center"
                    },
                    {
                        title: "Jumlah Aset Teregister",
                        field: "jumlah_aset_teregister",
                        hozAlign: "center"
                    },
                    {
                        title: "Kendala Aset Register",
                        field: "kendala_aset_register"
                    },
                    {
                        title: "Tindak Lanjut Aset Register",
                        field: "tindak_lanjut_aset_register"
                    },
                    {
                        title: "Sistem Informasi AIM",
                        field: "sistem_informasi_aim"
                    },
                    {
                        title: "Total WO Comply",
                        field: "total_wo_comply",
                        hozAlign: "center"
                    },
                    {
                        title: "Total WO Completed",
                        field: "total_wo_completed",
                        hozAlign: "center"
                    },
                    {
                        title: "Total WO In Progress",
                        field: "total_wo_in_progress",
                        hozAlign: "center"
                    },
                    {
                        title: "Total WO Backlog",
                        field: "total_wo_backlog",
                        hozAlign: "center"
                    },
                    {
                        title: "Kendala",
                        field: "kendala"
                    },
                    {
                        title: "Tindak Lanjut",
                        field: "tindak_lanjut"
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
                "sistem-informasi-aims-ptg": "{{ route('sistem-informasi-aims-ptg.data') }}"
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
                document.getElementById("jumlah_aset_operasi").value = row.jumlah_aset_operasi;
                document.getElementById("jumlah_aset_teregister").value = row.jumlah_aset_teregister;
                document.getElementById("kendala_aset_register").value = row.kendala_aset_register;
                document.getElementById("tindak_lanjut_aset_register").value = row.tindak_lanjut_aset_register;
                document.getElementById("sistem_informasi_aim").value = row.sistem_informasi_aim;
                document.getElementById("total_wo_comply").value = row.total_wo_comply;
                document.getElementById("total_wo_completed").value = row.total_wo_completed;
                document.getElementById("total_wo_in_progress").value = row.total_wo_in_progress;
                document.getElementById("total_wo_backlog").value = row.total_wo_backlog;
                document.getElementById("kendala").value = row.kendala;
                document.getElementById("tindak_lanjut").value = row.tindak_lanjut;

                openModal();
            }

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`sistem-informasi-aims-ptg/${id}`, {
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
                                table.setData("/monev/shg/input-data/sistem-informasi-aims-ptg/data")
                                this.reset();
                            } else {
                                alert('Gagal menyimpan data');
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("sistem-informasi-aims-ptg");
                localStorage.setItem("currentTab", "sistem-informasi-aims-ptg");
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
                const jumlahAsetOperasi = document.getElementById("jumlah_aset_operasi").value;
                const jumlahAsetTeregister = document.getElementById("jumlah_aset_teregister").value;
                const kendalaAsetRegister = document.getElementById("kendala_aset_register").value;
                const tindakLanjutAsetRegister = document.getElementById("tindak_lanjut_aset_register").value;
                const sistemInformasiAim = document.getElementById("sistem_informasi_aim").value;
                const totalWoComply = document.getElementById("total_wo_comply").value;
                const totalWoCompleted = document.getElementById("total_wo_completed").value;
                const totalWoInProgress = document.getElementById("total_wo_in_progress").value;
                const totalWoBacklog = document.getElementById("total_wo_backlog").value;
                const kendala = document.getElementById("kendala").value;
                const tindakLanjut = document.getElementById("tindak_lanjut").value;

                const method = id ? "PUT" : "POST";
                const url = id ? `sistem-informasi-aims-ptg/${id}` : "sistem-informasi-aims-ptg";

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
                            jumlah_aset_operasi: jumlahAsetOperasi,
                            jumlah_aset_teregister: jumlahAsetTeregister,
                            kendala_aset_register: kendalaAsetRegister,
                            tindak_lanjut_aset_register: tindakLanjutAsetRegister,
                            sistem_informasi_aim: sistemInformasiAim,
                            total_wo_comply: totalWoComply,
                            total_wo_completed: totalWoCompleted,
                            total_wo_in_progress: totalWoInProgress,
                            total_wo_backlog: totalWoBacklog,
                            kendala: kendala,
                            tindak_lanjut: tindakLanjut
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            // table.addRow([result.data]);
                            table.setData("/monev/shg/input-data/sistem-informasi-aims-ptg/data");
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
