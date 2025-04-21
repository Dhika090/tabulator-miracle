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
            <h5 class="card-title mb-3">AIR BUDGET TAGGING PTG</h5>

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
            <h3>Pelatihan AIMS PTG</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">

                <div>
                    <label>Periode</label>
                    <input type="month" name="periode" id="periode" required>
                </div>

                <div>
                    <label>SATKER</label>
                    <input type="text" name="satker" id="satker" required>
                </div>

                <div>
                    <label>Kategori</label>
                    <input type="text" name="kategori" id="kategori" required>
                </div>

                <div>
                    <label>CE</label>
                    <input type="text" name="ce" id="ce" >
                </div>

                <div>
                    <label>Cost Element Name</label>
                    <input type="text" name="cost_element_name" id="cost_element_name" >
                </div>

                <div>
                    <label>Program Kerja</label>
                    <input type="text" name="program_kerja" id="program_kerja" required>
                </div>

                <div>
                    <label>Total Pagu (USD)</label>
                    <input type="number" name="total_pagu_usd" id="total_pagu_usd" step="0.01" >
                </div>

                <!-- Bulan-bulan -->
                <div><label>JAN</label><input type="number" name="jan" id="jan" step="0.01"></div>
                <div><label>FEB</label><input type="number" name="feb" id="feb" step="0.01"></div>
                <div><label>MAR</label><input type="number" name="mar" id="mar" step="0.01"></div>
                <div><label>APR</label><input type="number" name="apr" id="apr" step="0.01"></div>
                <div><label>MAY</label><input type="number" name="may" id="may" step="0.01"></div>
                <div><label>JUN</label><input type="number" name="jun" id="jun" step="0.01"></div>
                <div><label>JUL</label><input type="number" name="jul" id="jul" step="0.01"></div>
                <div><label>AUG</label><input type="number" name="aug" id="aug" step="0.01"></div>
                <div><label>SEP</label><input type="number" name="sep" id="sep" step="0.01"></div>
                <div><label>OCT</label><input type="number" name="oct" id="oct" step="0.01"></div>
                <div><label>NOV</label><input type="number" name="nov" id="nov" step="0.01"></div>
                <div><label>DEC</label><input type="number" name="dec" id="dec" step="0.01"></div>

                <div>
                    <label>Aset Integrity (Yes/No)</label>
                    <select name="aset_integrity" id="aset_integrity" required>
                        <option value="">Pilih</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div>
                    <label>AIRTagging (Asset Integrity & Reliability)</label>
                    <input type="text" name="airtagging" id="airtagging">
                </div>

                <div>
                    <label>Prioritas</label>
                    <input type="text" name="prioritas" id="prioritas">
                </div>

                <div>
                    <label>Status Integrity per Des 2024</label>
                    <input type="text" name="status_integrity" id="status_integrity">
                </div>

                <div>
                    <label>Jumlah Aset Critical SECE</label>
                    <input type="number" name="aset_critical_sece" id="jumlah_aset_critical_sece">
                </div>

                <div>
                    <label>Jumlah Aset Critical PCE</label>
                    <input type="number" name="aset_critical_pce" id="jumlah_aset_critical_pce">
                </div>

                <div>
                    <label>Jumlah Aset Important</label>
                    <input type="number" name="aset_important" id="jumlah_aset_important">
                </div>

                <div>
                    <label>Jumlah Aset Secondary</label>
                    <input type="number" name="aset_secondary" id="jumlah_aset_secondary">
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
                "air-budget-tagging-ptg": [{
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
                        title: "SATKER",
                        field: "satker"
                    },
                    {
                        title: "Kategori",
                        field: "kategori"
                    },
                    {
                        title: "CE",
                        field: "ce"
                    },
                    {
                        title: "Cost Element Name",
                        field: "cost_element_name"
                    },
                    {
                        title: "Program Kerja",
                        field: "program_kerja",
                        width: 400
                    },
                    {
                        title: "Total Pagu (USD)",
                        field: "total_pagu_usd"
                    },
                    {
                        title: "JAN",
                        field: "jan"
                    },
                    {
                        title: "FEB",
                        field: "feb"
                    },
                    {
                        title: "MAR",
                        field: "mar"
                    },
                    {
                        title: "APR",
                        field: "apr"
                    },
                    {
                        title: "MAY",
                        field: "may"
                    },
                    {
                        title: "JUN",
                        field: "jun"
                    },
                    {
                        title: "JUL",
                        field: "jul"
                    },
                    {
                        title: "AUG",
                        field: "aug"
                    },
                    {
                        title: "SEP",
                        field: "sep"
                    },
                    {
                        title: "OCT",
                        field: "oct"
                    },
                    {
                        title: "NOV",
                        field: "nov"
                    },
                    {
                        title: "DEC",
                        field: "dec"
                    },
                    {
                        title: "Aset Integrity (Yes/No)",
                        field: "aset_integrity"
                    },
                    {
                        title: "AIRTagging (Asset Integrity & Reliability)",
                        field: "airtagging"
                    },
                    {
                        title: "Prioritas",
                        field: "prioritas"
                    },
                    {
                        title: "Status Integrity per Des 2024",
                        field: "status_integrity"
                    },
                    {
                        title: "Jumlah Aset Critical SECE",
                        field: "jumlah_aset_critical_sece"
                    },
                    {
                        title: "Jumlah Aset Critical PCE",
                        field: "jumlah_aset_critical_pce"
                    },
                    {
                        title: "Jumlah Aset Important",
                        field: "jumlah_aset_important"
                    },
                    {
                        title: "Jumlah Aset Secondary",
                        field: "jumlah_aset_secondary"
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
                "air-budget-tagging-ptg": "{{ route('air-budget-tagging-ptg.data') }}"
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
                document.getElementById("satker").value = row.satker;
                document.getElementById("kategori").value = row.kategori;
                document.getElementById("ce").value = row.ce;
                document.getElementById("cost_element_name").value = row.cost_element_name;
                document.getElementById("program_kerja").value = row.program_kerja;
                document.getElementById("total_pagu_usd").value = row.total_pagu_usd;
                document.getElementById("jan").value = row.jan;
                document.getElementById("feb").value = row.feb;
                document.getElementById("mar").value = row.mar;
                document.getElementById("apr").value = row.apr;
                document.getElementById("may").value = row.may;
                document.getElementById("jun").value = row.jun;
                document.getElementById("jul").value = row.jul;
                document.getElementById("aug").value = row.aug;
                document.getElementById("sep").value = row.sep;
                document.getElementById("oct").value = row.oct;
                document.getElementById("nov").value = row.nov;
                document.getElementById("dec").value = row.dec;
                document.getElementById("aset_integrity").value = row.aset_integrity;
                document.getElementById("airtagging").value = row.airtagging;
                document.getElementById("prioritas").value = row.prioritas;
                document.getElementById("status_integrity").value = row.status_integrity;
                document.getElementById("jumlah_aset_critical_sece").value = row.jumlah_aset_critical_sece;
                document.getElementById("jumlah_aset_critical_pce").value = row.jumlah_aset_critical_pce;
                document.getElementById("jumlah_aset_important").value = row.jumlah_aset_important;
                document.getElementById("jumlah_aset_secondary").value = row.jumlah_aset_secondary;
                openModal();
            }

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`air-budget-tagging-ptg/${id}`, {
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
                                table.setData("/monev/shg/input-data/air-budget-tagging-ptg/data")
                                this.reset();
                            } else {
                                alert('Gagal menyimpan data');
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("air-budget-tagging-ptg");
                localStorage.setItem("currentTab", "air-budget-tagging-ptg");
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
                const satker = document.getElementById("satker").value;
                const kategori = document.getElementById("kategori").value;
                const ce = document.getElementById("ce").value;
                const costElementName = document.getElementById("cost_element_name").value;
                const programKerja = document.getElementById("program_kerja").value;
                const totalPaguUSD = document.getElementById("total_pagu_usd").value;
                const jan = document.getElementById("jan").value;
                const feb = document.getElementById("feb").value;
                const mar = document.getElementById("mar").value;
                const apr = document.getElementById("apr").value;
                const may = document.getElementById("may").value;
                const jun = document.getElementById("jun").value;
                const jul = document.getElementById("jul").value;
                const aug = document.getElementById("aug").value;
                const sep = document.getElementById("sep").value;
                const oct = document.getElementById("oct").value;
                const nov = document.getElementById("nov").value;
                const dec = document.getElementById("dec").value;
                const asetIntegrity = document.getElementById("aset_integrity").value;
                const airTagging = document.getElementById("airtagging").value;
                const prioritas = document.getElementById("prioritas").value;
                const statusIntegrity = document.getElementById("status_integrity").value;
                const jumlahAsetCriticalSECE = document.getElementById("jumlah_aset_critical_sece").value;
                const jumlahAsetCriticalPCE = document.getElementById("jumlah_aset_critical_pce").value;
                const jumlahAsetImportant = document.getElementById("jumlah_aset_important").value;
                const jumlahAsetSecondary = document.getElementById("jumlah_aset_secondary").value;

                const method = id ? "PUT" : "POST";
                const url = id ? `air-budget-tagging-ptg/${id}` : "air-budget-tagging-ptg";

                fetch(url, {
                        method: method,
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            id: id,
                            periode: periode,
                            satker: satker,
                            kategori: kategori,
                            ce: ce,
                            cost_element_name: costElementName,
                            program_kerja: programKerja,
                            total_pagu_usd: totalPaguUSD,
                            jan: jan,
                            feb: feb,
                            mar: mar,
                            apr: apr,
                            may: may,
                            jun: jun,
                            jul: jul,
                            aug: aug,
                            sep: sep,
                            oct: oct,
                            nov: nov,
                            dec: dec,
                            aset_integrity: asetIntegrity,
                            airtagging: airTagging,
                            prioritas: prioritas,
                            status_integrity: statusIntegrity,
                            jumlah_aset_critical_sece: jumlahAsetCriticalSECE,
                            jumlah_aset_critical_pce: jumlahAsetCriticalPCE,
                            jumlah_aset_important: jumlahAsetImportant,
                            jumlah_aset_secondary: jumlahAsetSecondary
                        })

                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            // table.addRow([result.data]);
                            table.setData("/monev/shg/input-data/air-budget-tagging-ptg/data");
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
