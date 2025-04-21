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
            <h5 class="card-title mb-3">Realisasi Anggaran AI 2025 PTG</h5>

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

                <div><label>Periode</label><input type="text" name="periode" id="periode" required></div>
                <div><label>No</label><input type="number" name="no" id="no" required></div>
                <div><label>Program Kerja</label><input type="text" name="program_kerja" id="program_kerja" required>
                </div>
                <div><label>Kategori AIBT</label><input type="text" name="kategori_aibt" id="kategori_aibt" required>
                </div>
                <div><label>Jenis Anggaran</label><input type="text" name="jenis_anggaran" id="jenis_anggaran"
                        required></div>
                <div><label>Besar RKAP</label><input type="text" name="besar_rkap" id="besar_rkap" required
                        pattern="^\d{1,3}(?:\.\d{3})*(?:\,\d{1,2})?$"
                        title="Please enter a valid number with up to 2 decimal places and comma as thousand separator">
                </div>
                <div><label>Entitas</label><input type="text" name="entitas" id="entitas" required></div>
                <div><label>Unit</label><input type="text" name="unit" id="unit" required></div>
                <div><label>Nilai Kontrak</label><input type="number" name="nilai_kontrak" id="nilai_kontrak">
                </div>

                <!-- Plan -->
                <div><label>Plan Jan</label><input type="number" name="plan_jan" id="plan_jan"></div>
                <div><label>Plan Feb</label><input type="number" name="plan_feb" id="plan_feb"></div>
                <div><label>Plan Mar</label><input type="number" name="plan_mar" id="plan_mar"></div>
                <div><label>Plan Apr</label><input type="number" name="plan_apr" id="plan_apr"></div>
                <div><label>Plan May</label><input type="number" name="plan_may" id="plan_may"></div>
                <div><label>Plan Jun</label><input type="number" name="plan_jun" id="plan_jun"></div>
                <div><label>Plan Jul</label><input type="number" name="plan_jul" id="plan_jul"></div>
                <div><label>Plan Aug</label><input type="number" name="plan_aug" id="plan_aug"></div>
                <div><label>Plan Sep</label><input type="number" name="plan_sep" id="plan_sep"></div>
                <div><label>Plan Oct</label><input type="number" name="plan_oct" id="plan_oct"></div>
                <div><label>Plan Nov</label><input type="number" name="plan_nov" id="plan_nov"></div>
                <div><label>Plan Dec</label><input type="number" name="plan_dec" id="plan_dec"></div>

                <!-- Prognosa -->
                <div><label>Prognosa Jan</label><input type="number" name="prognosa_jan" id="prognosa_jan"></div>
                <div><label>Prognosa Feb</label><input type="number" name="prognosa_feb" id="prognosa_feb"></div>
                <div><label>Prognosa Mar</label><input type="number" name="prognosa_mar" id="prognosa_mar"></div>
                <div><label>Prognosa Apr</label><input type="number" name="prognosa_apr" id="prognosa_apr"></div>
                <div><label>Prognosa May</label><input type="number" name="prognosa_may" id="prognosa_may"></div>
                <div><label>Prognosa Jun</label><input type="number" name="prognosa_jun" id="prognosa_jun"></div>
                <div><label>Prognosa Jul</label><input type="number" name="prognosa_jul" id="prognosa_jul"></div>
                <div><label>Prognosa Aug</label><input type="number" name="prognosa_aug" id="prognosa_aug"></div>
                <div><label>Prognosa Sep</label><input type="number" name="prognosa_sep" id="prognosa_sep"></div>
                <div><label>Prognosa Oct</label><input type="number" name="prognosa_oct" id="prognosa_oct"></div>
                <div><label>Prognosa Nov</label><input type="number" name="prognosa_nov" id="prognosa_nov"></div>
                <div><label>Prognosa Dec</label><input type="number" name="prognosa_dec" id="prognosa_dec"></div>

                <!-- Actual -->
                <div><label>Actual Jan</label><input type="number" name="actual_jan" id="actual_jan"></div>
                <div><label>Actual Feb</label><input type="number" name="actual_feb" id="actual_feb"></div>
                <div><label>Actual Mar</label><input type="number" name="actual_mar" id="actual_mar"></div>
                <div><label>Actual Apr</label><input type="number" name="actual_apr" id="actual_apr"></div>
                <div><label>Actual May</label><input type="number" name="actual_may" id="actual_may"></div>
                <div><label>Actual Jun</label><input type="number" name="actual_jun" id="actual_jun"></div>
                <div><label>Actual Jul</label><input type="number" name="actual_jul" id="actual_jul"></div>
                <div><label>Actual Aug</label><input type="number" name="actual_aug" id="actual_aug"></div>
                <div><label>Actual Sep</label><input type="number" name="actual_sep" id="actual_sep"></div>
                <div><label>Actual Oct</label><input type="number" name="actual_oct" id="actual_oct"></div>
                <div><label>Actual Nov</label><input type="number" name="actual_nov" id="actual_nov"></div>
                <div><label>Actual Dec</label><input type="number" name="actual_dec" id="actual_dec"></div>

                <!-- Kode, Kendala, Tindak Lanjut -->
                <div><label>Kode</label><input type="text" name="kode" id="kode"></div>
                <div><label>Kendala</label>
                    <input type="text" name="kendala" id="kendala"></input>
                </div>
                <div><label>Tindak Lanjut</label>
                    <input type="text" name="tindak_lanjut" id="tindak_lanjut"></input>
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
                "realisasi-anggaran-ai-ptg": [{
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
                        title: "No",
                        field: "no"
                    },
                    {
                        title: "Program Kerja",
                        field: "program_kerja"
                    },
                    {
                        title: "Kategori AIBT",
                        field: "kategori_aibt"
                    },
                    {
                        title: "Jenis Anggaran",
                        field: "jenis_anggaran"
                    },
                    {
                        title: "Besar RKAP",
                        field: "besar_rkap",
                        hozAlign: "right"
                    },
                    {
                        title: "Entitas",
                        field: "entitas"
                    },
                    {
                        title: "Unit",
                        field: "unit"
                    },
                    {
                        title: "Nilai Kontrak",
                        field: "nilai_kontrak",
                        hozAlign: "right"
                    },

                    // Plan
                    {
                        title: "Plan Jan",
                        field: "plan_jan",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan Feb",
                        field: "plan_feb",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan Mar",
                        field: "plan_mar",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan Apr",
                        field: "plan_apr",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan May",
                        field: "plan_may",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan Jun",
                        field: "plan_jun",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan Jul",
                        field: "plan_jul",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan Aug",
                        field: "plan_aug",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan Sep",
                        field: "plan_sep",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan Oct",
                        field: "plan_oct",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan Nov",
                        field: "plan_nov",
                        hozAlign: "right"
                    },
                    {
                        title: "Plan Dec",
                        field: "plan_dec",
                        hozAlign: "right"
                    },

                    // Prognosa
                    {
                        title: "Prognosa Jan",
                        field: "prognosa_jan",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa Feb",
                        field: "prognosa_feb",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa Mar",
                        field: "prognosa_mar",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa Apr",
                        field: "prognosa_apr",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa May",
                        field: "prognosa_may",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa Jun",
                        field: "prognosa_jun",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa Jul",
                        field: "prognosa_jul",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa Aug",
                        field: "prognosa_aug",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa Sep",
                        field: "prognosa_sep",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa Oct",
                        field: "prognosa_oct",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa Nov",
                        field: "prognosa_nov",
                        hozAlign: "right"
                    },
                    {
                        title: "Prognosa Dec",
                        field: "prognosa_dec",
                        hozAlign: "right"
                    },

                    // Actual
                    {
                        title: "Actual Jan",
                        field: "actual_jan",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual Feb",
                        field: "actual_feb",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual Mar",
                        field: "actual_mar",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual Apr",
                        field: "actual_apr",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual May",
                        field: "actual_may",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual Jun",
                        field: "actual_jun",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual Jul",
                        field: "actual_jul",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual Aug",
                        field: "actual_aug",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual Sep",
                        field: "actual_sep",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual Oct",
                        field: "actual_oct",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual Nov",
                        field: "actual_nov",
                        hozAlign: "right"
                    },
                    {
                        title: "Actual Dec",
                        field: "actual_dec",
                        hozAlign: "right"
                    },

                    {
                        title: "Kode",
                        field: "kode"
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
                "realisasi-anggaran-ai-ptg": "{{ route('realisasi-anggaran-ai-ptg.data') }}"
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
                document.getElementById("no").value = row.no;
                document.getElementById("program_kerja").value = row.program_kerja;
                document.getElementById("kategori_aibt").value = row.kategori_aibt;
                document.getElementById("jenis_anggaran").value = row.jenis_anggaran;
                document.getElementById("besar_rkap").value = row.besar_rkap;
                document.getElementById("entitas").value = row.entitas;
                document.getElementById("unit").value = row.unit;
                document.getElementById("nilai_kontrak").value = row.nilai_kontrak;

                // Plan
                document.getElementById("plan_jan").value = row.plan_jan;
                document.getElementById("plan_feb").value = row.plan_feb;
                document.getElementById("plan_mar").value = row.plan_mar;
                document.getElementById("plan_apr").value = row.plan_apr;
                document.getElementById("plan_may").value = row.plan_may;
                document.getElementById("plan_jun").value = row.plan_jun;
                document.getElementById("plan_jul").value = row.plan_jul;
                document.getElementById("plan_aug").value = row.plan_aug;
                document.getElementById("plan_sep").value = row.plan_sep;
                document.getElementById("plan_oct").value = row.plan_oct;
                document.getElementById("plan_nov").value = row.plan_nov;
                document.getElementById("plan_dec").value = row.plan_dec;

                // Prognosa
                document.getElementById("prognosa_jan").value = row.prognosa_jan;
                document.getElementById("prognosa_feb").value = row.prognosa_feb;
                document.getElementById("prognosa_mar").value = row.prognosa_mar;
                document.getElementById("prognosa_apr").value = row.prognosa_apr;
                document.getElementById("prognosa_may").value = row.prognosa_may;
                document.getElementById("prognosa_jun").value = row.prognosa_jun;
                document.getElementById("prognosa_jul").value = row.prognosa_jul;
                document.getElementById("prognosa_aug").value = row.prognosa_aug;
                document.getElementById("prognosa_sep").value = row.prognosa_sep;
                document.getElementById("prognosa_oct").value = row.prognosa_oct;
                document.getElementById("prognosa_nov").value = row.prognosa_nov;
                document.getElementById("prognosa_dec").value = row.prognosa_dec;

                // Actual
                document.getElementById("actual_jan").value = row.actual_jan;
                document.getElementById("actual_feb").value = row.actual_feb;
                document.getElementById("actual_mar").value = row.actual_mar;
                document.getElementById("actual_apr").value = row.actual_apr;
                document.getElementById("actual_may").value = row.actual_may;
                document.getElementById("actual_jun").value = row.actual_jun;
                document.getElementById("actual_jul").value = row.actual_jul;
                document.getElementById("actual_aug").value = row.actual_aug;
                document.getElementById("actual_sep").value = row.actual_sep;
                document.getElementById("actual_oct").value = row.actual_oct;
                document.getElementById("actual_nov").value = row.actual_nov;
                document.getElementById("actual_dec").value = row.actual_dec;

                document.getElementById("kode").value = row.kode;
                document.getElementById("kendala").value = row.kendala;
                document.getElementById("tindak_lanjut").value = row.tindak_lanjut;

                openModal();
            }

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`realisasi-anggaran-ai-ptg/${id}`, {
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
                                table.setData("/monev/shg/input-data/realisasi-anggaran-ai-ptg/data")
                                this.reset();
                            } else {
                                alert('Gagal menyimpan data');
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("realisasi-anggaran-ai-ptg");
                localStorage.setItem("currentTab", "realisasi-anggaran-ai-ptg");
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
                const no = document.getElementById("periode").value;
                const programKerja = document.getElementById("program_kerja").value;
                const kategoriAibt = document.getElementById("kategori_aibt").value;
                const jenisAnggaran = document.getElementById("jenis_anggaran").value;
                const besarRkap = document.getElementById("besar_rkap").value;
                const entitas = document.getElementById("entitas").value;
                const unit = document.getElementById("unit").value;
                const nilaiKontrak = document.getElementById("nilai_kontrak").value;

                // Plan
                const planJan = document.getElementById("plan_jan").value;
                const planFeb = document.getElementById("plan_feb").value;
                const planMar = document.getElementById("plan_mar").value;
                const planApr = document.getElementById("plan_apr").value;
                const planMay = document.getElementById("plan_may").value;
                const planJun = document.getElementById("plan_jun").value;
                const planJul = document.getElementById("plan_jul").value;
                const planAug = document.getElementById("plan_aug").value;
                const planSep = document.getElementById("plan_sep").value;
                const planOct = document.getElementById("plan_oct").value;
                const planNov = document.getElementById("plan_nov").value;
                const planDec = document.getElementById("plan_dec").value;

                // Prognosa
                const prognosaJan = document.getElementById("prognosa_jan").value;
                const prognosaFeb = document.getElementById("prognosa_feb").value;
                const prognosaMar = document.getElementById("prognosa_mar").value;
                const prognosaApr = document.getElementById("prognosa_apr").value;
                const prognosaMay = document.getElementById("prognosa_may").value;
                const prognosaJun = document.getElementById("prognosa_jun").value;
                const prognosaJul = document.getElementById("prognosa_jul").value;
                const prognosaAug = document.getElementById("prognosa_aug").value;
                const prognosaSep = document.getElementById("prognosa_sep").value;
                const prognosaOct = document.getElementById("prognosa_oct").value;
                const prognosaNov = document.getElementById("prognosa_nov").value;
                const prognosaDec = document.getElementById("prognosa_dec").value;

                // Actual
                const actualJan = document.getElementById("actual_jan").value;
                const actualFeb = document.getElementById("actual_feb").value;
                const actualMar = document.getElementById("actual_mar").value;
                const actualApr = document.getElementById("actual_apr").value;
                const actualMay = document.getElementById("actual_may").value;
                const actualJun = document.getElementById("actual_jun").value;
                const actualJul = document.getElementById("actual_jul").value;
                const actualAug = document.getElementById("actual_aug").value;
                const actualSep = document.getElementById("actual_sep").value;
                const actualOct = document.getElementById("actual_oct").value;
                const actualNov = document.getElementById("actual_nov").value;
                const actualDec = document.getElementById("actual_dec").value;

                const kode = document.getElementById("kode").value;
                const kendala = document.getElementById("kendala").value;
                const tindakLanjut = document.getElementById("tindak_lanjut").value;


                const method = id ? "PUT" : "POST";
                const url = id ? `realisasi-anggaran-ai-ptg/${id}` : "realisasi-anggaran-ai-ptg";

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
                            no: no,
                            program_kerja: programKerja,
                            kategori_aibt: kategoriAibt,
                            jenis_anggaran: jenisAnggaran,
                            besar_rkap: besarRkap,
                            entitas: entitas,
                            unit: unit,
                            nilai_kontrak: nilaiKontrak,
                            plan_jan: planJan,
                            plan_feb: planFeb,
                            plan_mar: planMar,
                            plan_apr: planApr,
                            plan_may: planMay,
                            plan_jun: planJun,
                            plan_jul: planJul,
                            plan_aug: planAug,
                            plan_sep: planSep,
                            plan_oct: planOct,
                            plan_nov: planNov,
                            plan_dec: planDec,
                            prognosa_jan: prognosaJan,
                            prognosa_feb: prognosaFeb,
                            prognosa_mar: prognosaMar,
                            prognosa_apr: prognosaApr,
                            prognosa_may: prognosaMay,
                            prognosa_jun: prognosaJun,
                            prognosa_jul: prognosaJul,
                            prognosa_aug: prognosaAug,
                            prognosa_sep: prognosaSep,
                            prognosa_oct: prognosaOct,
                            prognosa_nov: prognosaNov,
                            prognosa_dec: prognosaDec,
                            actual_jan: actualJan,
                            actual_feb: actualFeb,
                            actual_mar: actualMar,
                            actual_apr: actualApr,
                            actual_may: actualMay,
                            actual_jun: actualJun,
                            actual_jul: actualJul,
                            actual_aug: actualAug,
                            actual_sep: actualSep,
                            actual_oct: actualOct,
                            actual_nov: actualNov,
                            actual_dec: actualDec,
                            kode: kode,
                            kendala: kendala,
                            tindak_lanjut: tindakLanjut
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            // table.addRow([result.data]);
                            table.setData("/monev/shg/input-data/realisasi-anggaran-ai-ptg/data");
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
