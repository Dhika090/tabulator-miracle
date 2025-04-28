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
                border-bottom: 1px solid #dee2e6;
                padding-bottom: 5px;
            }

            .tab-scroll-wrapper {
                display: inline-block;
                /* display: flex; */
                align-items: center;
                overflow-x: hidden;
                max-width: 100%;
                padding-bottom: 5px;
                border-bottom: 1px solid #dee2e6;
                white-space: nowrap;
                position: relative;
            }


            #tabSwitcher .btn {
                border-radius: 0;
                font-size: 14px;
                border-bottom: 2px solid transparent;
                color: #495057;
                padding: 6px 10px;
                background-color: transparent;
            }

            #tabSwitcher .btn.active {
                font-weight: bold;
                color: #007bff;
                border-bottom: 2px solid #007bff;
            }

            .dropdown-menu .dropdown-item.active {
                font-weight: bold;
                color: #007bff;
                background-color: #e9ecef;
            }

            /* modall */
            .modal {
                display: none;
                position: fixed;
                z-index: 1050;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.4);
                padding: 1rem;
            }

            .modal-content {
                background-color: #fff;
                margin: 5% auto;
                padding: 20px;
                width: 100%;
                max-width: 600px;
                border-radius: 10px;
                position: relative;
                z-index: 9999;
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

            <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                <button onclick="openModal()" class="btn btn-primary px-4 py-2" style="white-space: nowrap;">
                    Create Data
                </button>

                <div class="dropdown me-2 position-relative" style="z-index: 1050;">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="tabDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Navigasi
                    </button>
                    <ul class="dropdown-menu" id="tabDropdownList" style="max-height: 300px; overflow-y: auto;">
                        @foreach ($tabs as $tab)
                            <li>
                                <a class="dropdown-item {{ $tab['active'] ? 'active' : '' }}"
                                    href="{{ $tab['route'] }}">
                                    {{ $tab['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-scroll-wrapper d-flex align-items-center flex-grow-1 overflow-auto"
                    style="scroll-behavior: smooth;" id="tabContainer">
                    <div class="btn-group" role="group" id="tabSwitcher" style="white-space: nowrap;">
                        @foreach ($tabs as $tab)
                            <a href="{{ $tab['route'] }}"
                                class="btn btn-outline-secondary {{ $tab['active'] ? 'active' : '' }}">
                                {{ $tab['title'] }}
                            </a>
                        @endforeach
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
                        field: "deskripsi_peralatan",
                        width: 400,
                        cssClass: "wrap-text"
                    },
                    {
                        title: "Jenis Kerusakan",
                        field: "jenis_kerusakan"
                    },
                    {
                        title: "Penyebab / Root Cause",
                        field: "penyebab",
                        width: 400,
                        cssClass: "wrap-text"
                    },
                    {
                        title: "Kendala Perbaikan",
                        field: "kendala_perbaikan",
                        width: 400,
                        cssClass: "wrap-text"
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
                        field: "tindak_lanjut",
                        width: 400,
                        cssClass: "wrap-text"
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

            document.getElementById("search-input").addEventListener("input", function(e) {
                const keyword = e.target.value;
                table.setFilter([
                    [{
                            field: "periode",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "company",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "plant_segment",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kategori_criticality",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "tag",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "deskripsi_peralatan",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "jenis_kerusakan",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "penyebab_root_cause",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kendala_perbaikan",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "mitigasi_penanganan_sementara",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "perbaikan_permanen",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "progres_perbaikan_permanen",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "tindak_lanjut",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "target_penyelesaian",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "estimasi_biaya_perbaikan",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "link_foto_video",
                            type: "like",
                            value: keyword
                        },
                    ]
                ]);

            });

            function clearSearch() {
                document.getElementById("search-input").value = "";
                table.clearFilter();
            }


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
                const url = id ? `asset-breakdown-ptgg/${id}` : "asset-breakdown-ptg";

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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabButtons = document.querySelectorAll('#tabSwitcher a');
                const dropdownListItems = document.querySelectorAll('#tabDropdownList a');
                const tabContainer = document.getElementById('tabContainer');

                function scrollToActiveTab() {
                    const activeTab = document.querySelector('#tabSwitcher a.active');
                    if (activeTab) {
                        const tabX = activeTab.offsetLeft;
                        const tabW = activeTab.offsetWidth;
                        const containerW = tabContainer.clientWidth;

                        tabContainer.scrollTo({
                            left: tabX - (containerW / 2) + (tabW / 2),
                            behavior: 'smooth'
                        });
                    }
                }

                dropdownListItems.forEach((dropdownItem, i) => {
                    dropdownItem.addEventListener('click', function(e) {
                        e.preventDefault();
                        const targetHref = this.href;
                        sessionStorage.setItem('scrollToActiveTab', 'yes');
                        window.location.href = targetHref;
                    });
                });

                tabButtons.forEach((tabBtn) => {
                    tabBtn.addEventListener('click', function(e) {
                        sessionStorage.setItem('scrollToActiveTab', 'yes');
                    });
                });

                // Ketika halaman reload setelah klik, cek dan scroll otomatis
                if (sessionStorage.getItem('scrollToActiveTab') === 'yes') {
                    scrollToActiveTab();
                    sessionStorage.removeItem('scrollToActiveTab');
                }
            });
        </script>
    @endpush
</x-layouts.app>
