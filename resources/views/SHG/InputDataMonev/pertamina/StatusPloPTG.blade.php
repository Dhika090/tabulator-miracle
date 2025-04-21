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
            <h5 class="card-title mb-3">Status PLO PTG</h5>

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
            <h3>Tambah Target SAP</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">

                <div>
                    <label>Periode</label>
                    <input type="text" name="periode" id="periode" required>
                </div>

                <div>
                    <label>Nomor PLO</label>
                    <input type="text" name="nomor_plo" id="nomor_plo" required>
                </div>

                <div>
                    <label>Company</label>
                    <input type="text" name="company" id="company" required>
                </div>

                <div>
                    <label>Area</label>
                    <input type="text" name="area" id="area" required>
                </div>

                <div>
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" required>
                </div>

                <div>
                    <label>Nama Aset</label>
                    <input type="text" name="nama_aset" id="nama_aset" required>
                </div>

                <div>
                    <label>Tanggal Pengesahan</label>
                    <input type="text" name="tanggal_pengesahan" id="tanggal_pengesahan" required>
                </div>

                <div>
                    <label>Masa Berlaku</label>
                    <input type="text" name="masa_berlaku" id="masa_berlaku" required>
                </div>

                <div>
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan">
                </div>

                <div>
                    <label>Belum Proses</label>
                    <input type="text" name="belum_proses" id="belum_proses">
                </div>

                <div>
                    <label>Pre-Inspection</label>
                    <input type="text" name="pre_inspection" id="pre_inspection">
                </div>

                <div>
                    <label>Inspection</label>
                    <input type="text" name="inspection" id="inspection">
                </div>

                <div>
                    <label>COI Peralatan</label>
                    <input type="text" name="coi_peralatan" id="coi_peralatan">
                </div>

                <div>
                    <label>BA PK</label>
                    <input type="text" name="ba_pk" id="ba_pk">
                </div>

                <div>
                    <label>Penerbitan PLO (Valid)</label>
                    <input type="text" name="penerbitan_plo_valid" id="penerbitan_plo_valid">
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
                "status-plo-ptg": [{
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
                        title: "Nomor PLO",
                        field: "nomor_plo"
                    },
                    {
                        title: "Company",
                        field: "company"
                    },
                    {
                        title: "Area",
                        field: "area"
                    },
                    {
                        title: "Lokasi",
                        field: "lokasi"
                    },
                    {
                        title: "Nama Aset",
                        field: "nama_aset"
                    },
                    {
                        title: "Tanggal Pengesahan",
                        field: "tanggal_pengesahan"
                    },
                    {
                        title: "Masa Berlaku",
                        field: "masa_berlaku",
                        hozAlign: "center"
                    },
                    {
                        title: "Keterangan",
                        field: "keterangan"
                    },
                    {
                        title: "Belum Proses",
                        field: "belum_proses",
                        hozAlign: "center"
                    },
                    {
                        title: "Pre-Inspection",
                        field: "pre_inspection",
                        hozAlign: "center"
                    },
                    {
                        title: "Inspection",
                        field: "inspection",
                        hozAlign: "center"
                    },
                    {
                        title: "COI Peralatan",
                        field: "coi_peralatan",
                        hozAlign: "center"
                    },
                    {
                        title: "BA PK",
                        field: "ba_pk",
                        hozAlign: "center"
                    },
                    {
                        title: "Penerbitan PLO (Valid)",
                        field: "penerbitan_plo_valid",
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
                "status-plo-ptg": "{{ route('status-plo-ptg.data') }}"
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
                document.getElementById("nomor_plo").value = row.nomor_plo;
                document.getElementById("company").value = row.company;
                document.getElementById("area").value = row.area;
                document.getElementById("lokasi").value = row.lokasi;
                document.getElementById("nama_aset").value = row.nama_aset;
                document.getElementById("tanggal_pengesahan").value = row.tanggal_pengesahan;
                document.getElementById("masa_berlaku").value = row.masa_berlaku;
                document.getElementById("keterangan").value = row.keterangan;
                document.getElementById("belum_proses").value = row.belum_proses;
                document.getElementById("pre_inspection").value = row.pre_inspection;
                document.getElementById("inspection").value = row.inspection;
                document.getElementById("coi_peralatan").value = row.coi_peralatan;
                document.getElementById("ba_pk").value = row.ba_pk;
                document.getElementById("penerbitan_plo_valid").value = row.penerbitan_plo_valid;
                document.getElementById("kendala").value = row.kendala;
                document.getElementById("tindak_lanjut").value = row.tindak_lanjut;

                openModal();
            }

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`status-plo-ptg/${id}`, {
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
                                table.setData("/monev/shg/input-data/status-plo-ptg/data")
                                this.reset();
                            } else {
                                alert('Gagal menyimpan data');
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("status-plo-ptg");
                localStorage.setItem("currentTab", "status-plo-ptg");
            });
        </script>

        {{-- create data and create  --}}
        <script>
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
                console.log("Data submitted:", data);

                const id = document.getElementById("form-id").value;
                const periode = document.getElementById("periode").value;
                const nomorPlo = document.getElementById("nomor_plo").value;
                const company = document.getElementById("company").value;
                const area = document.getElementById("area").value;
                const lokasi = document.getElementById("lokasi").value;
                const namaAset = document.getElementById("nama_aset").value;
                const tanggalPengesahan = document.getElementById("tanggal_pengesahan").value;
                const masaBerlaku = document.getElementById("masa_berlaku").value;
                const keterangan = document.getElementById("keterangan").value;
                const belumProses = document.getElementById("belum_proses").value;
                const preInspection = document.getElementById("pre_inspection").value;
                const inspection = document.getElementById("inspection").value;
                const coiPeralatan = document.getElementById("coi_peralatan").value;
                const baPk = document.getElementById("ba_pk").value;
                const penerbitanPloValid = document.getElementById("penerbitan_plo_valid").value;
                const kendala = document.getElementById("kendala").value;
                const tindakLanjut = document.getElementById("tindak_lanjut").value;



                const method = id ? "PUT" : "POST";
                const url = id ? `status-plo-ptg/${id}` : "status-plo-ptg";

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
                            nomor_plo: nomorPlo,
                            company: company,
                            area: area,
                            lokasi: lokasi,
                            nama_aset: namaAset,
                            tanggal_pengesahan: tanggalPengesahan,
                            masa_berlaku: masaBerlaku,
                            keterangan: keterangan,
                            belum_proses: belumProses,
                            pre_inspection: preInspection,
                            inspection: inspection,
                            coi_peralatan: coiPeralatan,
                            ba_pk: baPk,
                            penerbitan_plo_valid: penerbitanPloValid,
                            kendala: kendala,
                            tindak_lanjut: tindakLanjut
                        })

                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            // table.addRow([result.data]);
                            table.setData("/monev/shg/input-data/status-plo-ptg/data");
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
