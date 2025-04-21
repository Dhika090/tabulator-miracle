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
            <h5 class="card-title mb-3">Asset Breakdown PTG</h5>

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
                    <label>Company</label>
                    <input type="text" name="company" id="company" required>
                </div>

                <div>
                    <label>Plant/Segment</label>
                    <input type="text" name="plant_segment" id="plant_segment" required>
                </div>

                <div>
                    <label>Kategori Criticality</label>
                    <input type="text" name="kategori_criticality" id="kategori_criticality" required>
                </div>

                <div>
                    <label>Tag</label>
                    <input type="text" name="tag" id="tag" required>
                </div>

                <div>
                    <label>Deskripsi Peralatan</label>
                    <input type="text" name="deskripsi_peralatan" id="deskripsi_peralatan" required>
                </div>

                <div>
                    <label>Jenis Kerusakan</label>
                    <input type="text" name="jenis_kerusakan" id="jenis_kerusakan" required>
                </div>

                <div>
                    <label>Penyebab / Root Cause</label>
                    <input type="text" name="penyebab" id="penyebab" required>
                </div>

                <div>
                    <label>Kendala Perbaikan</label>
                    <input type="text" name="kendala_perbaikan" id="kendala_perbaikan" required>
                </div>

                <div>
                    <label>Mitigasi / Penanganan Sementara</label>
                    <input type="text" name="mitigasi" id="mitigasi">
                </div>

                <div>
                    <label>Perbaikan Permanen</label>
                    <input type="text" name="perbaikan_permanen" id="perbaikan_permanen">
                </div>

                <div>
                    <label>Progres Perbaikan Permanen</label>
                    <input type="text" name="progres_perbaikan_permanen" id="progres_perbaikan_permanen">
                </div>

                <div>
                    <label>Tindak Lanjut</label>
                    <input type="text" name="tindak_lanjut" id="tindak_lanjut" required>
                </div>

                <div>
                    <label>Target Penyelesaian</label>
                    <input type="text" name="target_penyelesaian" id="target_penyelesaian" required>
                </div>

                <div>
                    <label>Estimasi Biaya Perbaikan</label>
                    <input type="number" name="estimasi_biaya_perbaikan" id="estimasi_biaya_perbaikan">
                </div>

                <div>
                    <label>Link Foto/Video</label>
                    <input type="url" name="link_foto_video" id="link_foto_video">
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
                "asset-breakdown-ptg": [{
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
                        title: "Plant/Segment",
                        field: "plant_segment"
                    },
                    {
                        title: "Kategori Criticality",
                        field: "kategori_criticality"
                    },
                    {
                        title: "Tag",
                        field: "tag"
                    },
                    {
                        title: "Deskripsi Peralatan",
                        field: "deskripsi_peralatan"
                    },
                    {
                        title: "Jenis Kerusakan",
                        field: "jenis_kerusakan"
                    },
                    {
                        title: "Penyebab / Root Cause",
                        field: "penyebab"
                    },
                    {
                        title: "Kendala Perbaikan",
                        field: "kendala_perbaikan"
                    },
                    {
                        title: "Mitigasi / Penanganan Sementara",
                        field: "mitigasi"
                    },
                    {
                        title: "Perbaikan Permanen",
                        field: "perbaikan_permanen"
                    },
                    {
                        title: "Progres Perbaikan Permanen",
                        field: "progres_perbaikan_permanen"
                    },
                    {
                        title: "Tindak Lanjut",
                        field: "tindak_lanjut"
                    },
                    {
                        title: "Target Penyelesaian",
                        field: "target_penyelesaian"
                    },
                    {
                        title: "Estimasi Biaya Perbaikan",
                        field: "estimasi_biaya_perbaikan",
                        hozAlign: "center"
                    },
                    {
                        title: "Link Foto/Video",
                        field: "link_foto_video"
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
                "asset-breakdown-ptg": "{{ route('asset-breakdown-ptg.data') }}"
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
                document.getElementById("plant_segment").value = row.plant_segment;
                document.getElementById("kategori_criticality").value = row.kategori_criticality;
                document.getElementById("tag").value = row.tag;
                document.getElementById("deskripsi_peralatan").value = row.deskripsi_peralatan;
                document.getElementById("jenis_kerusakan").value = row.jenis_kerusakan;
                document.getElementById("penyebab").value = row.penyebab;
                document.getElementById("kendala_perbaikan").value = row.kendala_perbaikan;
                document.getElementById("mitigasi").value = row.mitigasi;
                document.getElementById("perbaikan_permanen").value = row.perbaikan_permanen;
                document.getElementById("progres_perbaikan_permanen").value = row.progres_perbaikan_permanen;
                document.getElementById("tindak_lanjut").value = row.tindak_lanjut;
                document.getElementById("target_penyelesaian").value = row.target_penyelesaian;
                document.getElementById("estimasi_biaya_perbaikan").value = row.estimasi_biaya_perbaikan;
                document.getElementById("link_foto_video").value = row.link_foto_video;

                openModal();
            }

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`asset-breakdown-ptg/${id}`, {
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
                                table.setData("/monev/shg/input-data/asset-breakdown-ptg/data")
                                this.reset();
                            } else {
                                alert('Gagal menyimpan data');
                            }
                        });
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                loadTabData("asset-breakdown-ptg");
                localStorage.setItem("currentTab", "asset-breakdown-ptg");
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
                const plantSegment = document.getElementById("plant_segment").value;
                const kategoriCriticality = document.getElementById("kategori_criticality").value;
                const tag = document.getElementById("tag").value;
                const deskripsiPeralatan = document.getElementById("deskripsi_peralatan").value;
                const jenisKerusakan = document.getElementById("jenis_kerusakan").value;
                const penyebab = document.getElementById("penyebab").value;
                const kendalaPerbaikan = document.getElementById("kendala_perbaikan").value;
                const mitigasi = document.getElementById("mitigasi").value;
                const perbaikanPermanen = document.getElementById("perbaikan_permanen").value;
                const progresPerbaikanPermanen = document.getElementById("progres_perbaikan_permanen").value;
                const tindakLanjut = document.getElementById("tindak_lanjut").value;
                const targetPenyelesaian = document.getElementById("target_penyelesaian").value;
                const estimasiBiayaPerbaikan = document.getElementById("estimasi_biaya_perbaikan").value;
                const linkFotoVideo = document.getElementById("link_foto_video").value;



                const method = id ? "PUT" : "POST";
                const url = id ? `asset-breakdown-ptg/${id}` : "asset-breakdown-ptg";

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
                            plant_segment: plantSegment,
                            kategori_criticality: kategoriCriticality,
                            tag: tag,
                            deskripsi_peralatan: deskripsiPeralatan,
                            jenis_kerusakan: jenisKerusakan,
                            penyebab: penyebab,
                            kendala_perbaikan: kendalaPerbaikan,
                            mitigasi: mitigasi,
                            perbaikan_permanen: perbaikanPermanen,
                            progres_perbaikan_permanen: progresPerbaikanPermanen,
                            tindak_lanjut: tindakLanjut,
                            target_penyelesaian: targetPenyelesaian,
                            estimasi_biaya_perbaikan: estimasiBiayaPerbaikan,
                            link_foto_video: linkFotoVideo
                        })

                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            // table.addRow([result.data]);
                            table.setData("/monev/shg/input-data/asset-breakdown-ptg/data");
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
