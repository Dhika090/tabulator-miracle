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

            .tabulator .tabulator-cell {
                white-space: normal !important;
                word-wrap: break-word;
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
            <h5 class="card-title mb-3">Rencanaan Pemeliharaan Besar PTG</h5>

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
            <h3>Tambah Rencana Pemeliharaan Besar PTG</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">

                <div>
                    <label>Periode</label>
                    <input type="text" name="periode" id="periode" required>
                </div>

                <div>
                    <label>No</label>
                    <input type="number" name="no" id="no" required>
                </div>

                <div>
                    <label>Company</label>
                    <input type="text" name="company" id="company" required>
                </div>

                <div>
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" required>
                </div>

                <div>
                    <label>Program Kerja</label>
                    <input type="text" name="program_kerja" id="program_kerja" required>
                </div>

                <div>
                    <label>Kategori Maintenance</label>
                    <input type="text" name="kategori_maintenance" id="kategori_maintenance" required>
                </div>

                <div>
                    <label>Besar Phasing</label>
                    <input type="text" name="besar_phasing" id="besar_phasing" required>
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
                "rencana-pemeliharaan-besar-ptg": [{
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
                        title: "Company",
                        field: "company"
                    },
                    {
                        title: "Lokasi",
                        field: "lokasi"
                    },
                    {
                        title: "Program Kerja",
                        field: "program_kerja",
                        width: 300
                    },
                    {
                        title: "Kategori Maintenance",
                        field: "kategori_maintenance"
                    },
                    {
                        title: "Besar Phasing",
                        field: "besar_phasing"
                    },
                    {
                        title: "Remark",
                        field: "remark"
                    },
                    {
                        title: "Jan",
                        field: "jan",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Feb",
                        field: "feb",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Mar",
                        field: "mar",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Apr",
                        field: "apr",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "May",
                        field: "may",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Jun",
                        field: "jun",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Jul",
                        field: "jul",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Aug",
                        field: "aug",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Sep",
                        field: "sep",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Oct",
                        field: "oct",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Nov",
                        field: "nov",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Dec",
                        field: "dec",
                        hozAlign: "center",
                        width: 70
                    },
                    {
                        title: "Biaya Kerugian (USD)",
                        field: "biaya_kerugian",
                        hozAlign: "center"
                    },
                    {
                        title: "Keterangan Kerugian",
                        field: "keterangan_kerugian"
                    },
                    {
                        title: "Penyebab",
                        field: "penyebab",
                        width: 250
                    },
                    {
                        title: "Kendala",
                        field: "kendala"
                    },
                    {
                        title: "Tindak Lanjut",
                        field: "tindak_lanjut",
                        width: 250
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
                "rencana-pemeliharaan-besar-ptg": "{{ route('rencana-pemeliharaan-besar-ptg.data') }}"
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
                document.getElementById("company").value = row.company;
                document.getElementById("lokasi").value = row.lokasi;
                document.getElementById("program_kerja").value = row.program_kerja;
                document.getElementById("kategori_maintenance").value = row.kategori_maintenance;
                document.getElementById("besar_phasing").value = row.besar_phasing;
                document.getElementById("remark").value = row.remark;

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

                document.getElementById("biaya_kerugian").value = row.biaya_kerugian;
                document.getElementById("keterangan_kerugian").value = row.keterangan_kerugian;
                document.getElementById("penyebab").value = row.penyebab;
                document.getElementById("kendala").value = row.kendala;
                document.getElementById("tindak_lanjut").value = row.tindak_lanjut;

                openModal();
            }

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`rencana-pemeliharaan-besar-ptg/${id}`, {
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
                                table.setData("/monev/shg/input-data/rencana-pemeliharaan-besar-ptg/data")
                                this.reset();
                            } else {
                                alert('Gagal menyimpan data');
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("rencana-pemeliharaan-besar-ptg");
                localStorage.setItem("currentTab", "rencana-pemeliharaan-besar-ptg");
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
                const no = document.getElementById("no").value;
                const company = document.getElementById("company").value;
                const lokasi = document.getElementById("lokasi").value;
                const programKerja = document.getElementById("program_kerja").value;
                const kategoriMaintenance = document.getElementById("kategori_maintenance").value;
                const besarPhasing = document.getElementById("besar_phasing").value;
                const remark = document.getElementById("remark").value;

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

                const biayaKerugian = document.getElementById("biaya_kerugian").value;
                const keteranganKerugian = document.getElementById("keterangan_kerugian").value;
                const penyebab = document.getElementById("penyebab").value;
                const kendala = document.getElementById("kendala").value;
                const tindakLanjut = document.getElementById("tindak_lanjut").value;

                const method = id ? "PUT" : "POST";
                const url = id ? `rencana-pemeliharaan-besar-ptg/${id}` : "rencana-pemeliharaan-besar-ptg";

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
                            no: no,
                            company: company,
                            lokasi: lokasi,
                            program_kerja: programKerja,
                            kategori_maintenance: kategoriMaintenance,
                            besar_phasing: besarPhasing,
                            remark: remark,
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
                            biaya_kerugian: biayaKerugian,
                            keterangan_kerugian: keteranganKerugian,
                            penyebab: penyebab,
                            kendala: kendala,
                            tindak_lanjut: tindakLanjut
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            // table.addRow([result.data]);
                            table.setData("/monev/shg/input-data/rencana-pemeliharaan-besar-ptg/data");
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
