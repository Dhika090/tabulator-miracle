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
            <h5 class="card-title mb-3">SAP Asset PTG</h5>

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
                    <label>Subholding</label>
                    <input type="text" name="subholding" id="subholding" required>
                </div>

                <div>
                    <label>Company</label>
                    <input type="text" name="company" id="company" required>
                </div>

                <div>
                    <label>Unit</label>
                    <input type="text" name="unit" id="unit" required>
                </div>

                <div>
                    <label>Nama Stasiun</label>
                    <input type="text" name="nama_stasiun" id="nama_stasiun" required>
                </div>

                <div>
                    <label>Belum Mulai</label>
                    <input type="number" name="belum_mulai" id="belum_mulai">
                </div>

                <div>
                    <label>Kickoff Meeting</label>
                    <input type="number" name="kickoff_meeting" id="kickoff_meeting">
                </div>

                <div>
                    <label>Identifikasi Peralatan</label>
                    <input type="number" name="identifikasi_peralatan" id="identifikasi_peralatan">
                </div>

                <div>
                    <label>Survey Lapangan</label>
                    <input type="number" name="survey_lapangan" id="survey_lapangan">
                </div>

                <div>
                    <label>Pembenahan Funloc</label>
                    <input type="number" name="pembenahan_funloc" id="pembenahan_funloc">
                </div>

                <div>
                    <label>Review Criticality</label>
                    <input type="number" name="review_criticality" id="review_criticality">
                </div>

                <div>
                    <label>Penyelarasan Dokumen dan Lapangan</label>
                    <input type="number" name="penyelarasan_dokumen" id="penyelarasan_dokumen">
                </div>

                <div>
                    <label>Melengkapi Tag Fisik</label>
                    <input type="number" name="melengkapi_tag_fisik" id="melengkapi_tag_fisik">
                </div>

                <div>
                    <label>Mempersiapkan Form Upload Data</label>
                    <input type="number" name="form_upload_data" id="form_upload_data">
                </div>

                <div>
                    <label>Request ke Master Data</label>
                    <input type="number" name="request_master_data" id="request_master_data">
                </div>

                <div>
                    <label>Update Di Master Data</label>
                    <input type="number" name="update_master_data" id="update_master_data">
                </div>

                <div>
                    <label>Kendala</label>
                    <input type="text" name="kendala" id="kendala" rows="3"></input>
                </div>

                <div>
                    <label>Tindak Lanjut</label>
                    <input type="text" name="tindak_lanjut" id="tindak_lanjut" rows="3"></input>
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
                "sap-asset-ptg": [{
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
                        title: "Nama Stasiun",
                        field: "nama_stasiun"
                    },
                    {
                        title: "Belum Mulai",
                        field: "belum_mulai",
                        hozAlign: "center",
                    },
                    {
                        title: "Kickoff Meeting",
                        field: "kickoff_meeting",
                        hozAlign: "center",
                    },
                    {
                        title: "Identifikasi Peralatan",
                        field: "identifikasi_peralatan",
                        hozAlign: "center",
                    },
                    {
                        title: "Survey Lapangan",
                        field: "survey_lapangan",
                        hozAlign: "center",
                    },
                    {
                        title: "Pembenahan Funloc",
                        field: "pembenahan_funloc",
                        hozAlign: "center",
                    },
                    {
                        title: "Review Criticality",
                        field: "review_criticality",
                        hozAlign: "center",
                    },
                    {
                        title: "Penyelarasan Dokumen dan Lapangan",
                        field: "penyelarasan_dokumen",
                        hozAlign: "center",
                    },
                    {
                        title: "Melengkapi Tag Fisik",
                        field: "melengkapi_tag_fisik",
                        hozAlign: "center",
                    },
                    {
                        title: "Mempersiapkan Form Upload Data",
                        field: "form_upload_data",
                        hozAlign: "center",
                    },
                    {
                        title: "Request ke Master Data",
                        field: "request_master_data",
                        hozAlign: "center",
                    },
                    {
                        title: "Update Di Master Data",
                        field: "update_master_data",
                        hozAlign: "center",
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
                "sap-asset-ptg": "{{ route('sap-asset-ptg.data') }}"
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
                document.getElementById("nama_stasiun").value = row.nama_stasiun;
                document.getElementById("belum_mulai").value = row.belum_mulai;
                document.getElementById("kickoff_meeting").value = row.kickoff_meeting;
                document.getElementById("identifikasi_peralatan").value = row.identifikasi_peralatan;
                document.getElementById("survey_lapangan").value = row.survey_lapangan;
                document.getElementById("pembenahan_funloc").value = row.pembenahan_funloc;
                document.getElementById("review_criticality").value = row.review_criticality;
                document.getElementById("penyelarasan_dokumen").value = row.penyelarasan_dokumen;
                document.getElementById("melengkapi_tag_fisik").value = row.melengkapi_tag_fisik;
                document.getElementById("form_upload_data").value = row.form_upload_data;
                document.getElementById("request_master_data").value = row.request_master_data;
                document.getElementById("update_master_data").value = row.update_master_data;
                document.getElementById("kendala").value = row.kendala;
                document.getElementById("tindak_lanjut").value = row.tindak_lanjut;

                openModal();
            }

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`sap-asset-ptg/${id}`, {
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
                                table.setData("/monev/shg/input-data/sap-asset-ptg/data")
                                this.reset();
                            } else {
                                alert('Gagal menyimpan data');
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("sap-asset-ptg");
                localStorage.setItem("currentTab", "sap-asset-ptg");
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
                const subholding = document.getElementById("subholding").value;
                const company = document.getElementById("company").value;
                const unit = document.getElementById("unit").value;
                const namaStasiun = document.getElementById("nama_stasiun").value;

                const belumMulai = document.getElementById("belum_mulai").value;
                const kickoffMeeting = document.getElementById("kickoff_meeting").value;
                const identifikasiPeralatan = document.getElementById("identifikasi_peralatan").value;
                const surveyLapangan = document.getElementById("survey_lapangan").value;
                const pembenahanFunloc = document.getElementById("pembenahan_funloc").value;
                const reviewCriticality = document.getElementById("review_criticality").value;
                const penyelarasanDokumen = document.getElementById("penyelarasan_dokumen").value;
                const melengkapiTagFisik = document.getElementById("melengkapi_tag_fisik").value;
                const formUploadData = document.getElementById("form_upload_data").value;
                const requestMasterData = document.getElementById("request_master_data").value;
                const updateMasterData = document.getElementById("update_master_data").value;

                const kendala = document.getElementById("kendala").value;
                const tindakLanjut = document.getElementById("tindak_lanjut").value;


                const method = id ? "PUT" : "POST";
                const url = id ? `sap-asset-ptg/${id}` : "sap-asset-ptg";

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
                            subholding: subholding,
                            company: company,
                            unit: unit,
                            nama_stasiun: namaStasiun,
                            belum_mulai: belumMulai,
                            kickoff_meeting: kickoffMeeting,
                            identifikasi_peralatan: identifikasiPeralatan,
                            survey_lapangan: surveyLapangan,
                            pembenahan_funloc: pembenahanFunloc,
                            review_criticality: reviewCriticality,
                            penyelarasan_dokumen: penyelarasanDokumen,
                            melengkapi_tag_fisik: melengkapiTagFisik,
                            form_upload_data: formUploadData,
                            request_master_data: requestMasterData,
                            update_master_data: updateMasterData,
                            kendala: kendala,
                            tindak_lanjut: tindakLanjut
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            // table.addRow([result.data]);
                            table.setData("/monev/shg/input-data/sap-asset-ptg/data");
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
