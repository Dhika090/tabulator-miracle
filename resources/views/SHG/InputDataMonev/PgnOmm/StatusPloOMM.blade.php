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
        <div class="card-body d-flex flex-column">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                <h5 class="card-title mb-3 mb-md-0">Status PLO OMM</h5>
                <div class="d-flex">
                    <input id="search-input" type="text" class="form-control" placeholder="Search data..."
                        style="max-width: 200px;">
                    <button class="btn btn-outline-secondary ms-2 h-100 mt-1" type="button"
                        onclick="clearSearch()">Clear</button>
                </div>
            </div>

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
            <h3>Tambah Target OMM</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">

                <div>
                    <label>Periode</label>
                    <input type="month" name="periode" id="periode" required>
                </div>

                <div>
                    <label>Nomor PLO</label>
                    <input type="text" name="nomor_plo" id="nomor_plo" required>
                </div>

                <div>
                    <label>Company</label>
                    <input type="text" name="company" id="company">
                </div>

                <div>
                    <label>Area</label>
                    <input type="text" name="area" id="area">
                </div>

                <div>
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi">
                </div>

                <div>
                    <label>Nama Aset</label>
                    <input type="text" name="nama_aset" id="nama_aset">
                </div>

                <div>
                    <label>Tanggal Pengesahan</label>
                    <input type="date" name="tanggal_pengesahan" id="tanggal_pengesahan" required>
                </div>

                <div>
                    <label>Masa Berlaku</label>
                    <input type="date" name="masa_berlaku" id="masa_berlaku" required>
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
            const pengesahanInput = document.getElementById('tanggal_pengesahan');
            const berlakuInput = document.getElementById('masa_berlaku');

            function validateDates() {
                const pengesahan = new Date(pengesahanInput.value);
                const berlaku = new Date(berlakuInput.value);

                if (berlaku <= pengesahan) {
                    alert("Tanggal Masa Berlaku harus lebih dari Tanggal Pengesahan!");
                    berlakuInput.value = '';
                }
            }

            pengesahanInput.addEventListener('change', validateDates);
            berlakuInput.addEventListener('change', validateDates);

            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`status-plo-omm/${id}`, {
                            method: "DELETE",
                            headers: {
                                "Accept": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                            }
                        })
                        .then(res => res.json())
                        .then(result => {
                            alert(result.message || "Data berhasil dihapus");
                            loadData();
                        })
                        .catch(err => {
                            console.error("Gagal hapus data:", err);
                            alert("Terjadi kesalahan saat menghapus data.");
                        });
                }
            }

            document.getElementById("search-input").addEventListener("input", function(e) {
                const keyword = e.target.value;
                table.setFilter([
                    [{
                            field: "periode",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "nomor_plo",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "company",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "area",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "lokasi",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "nama_aset",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "tanggal_pengesahan",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "masa_berlaku",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "keterangan",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "belum_proses",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "pre_inspection",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "inspection",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "coi_peralatan",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "ba_pk",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "penerbitan_plo_valid",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kendala",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "tindak_lanjut",
                            type: "like",
                            value: keyword
                        }
                    ]
                ]);
            });

            function clearSearch() {
                document.getElementById("search-input").value = "";
                table.clearFilter();
            }

            function loadData() {
                fetch("/monev/shg/input-data/status-plo-omm/data", {
                        headers: {
                            "Accept": "application/json"
                        }
                    })
                    .then(res => res.json())
                    .then(data => table.setData(data))
                    .catch(err => console.error("Gagal load data:", err));
            }

            document.addEventListener("DOMContentLoaded", function() {

                const columnMap = {
                    "status-plo-omm": [{
                            title: "No",
                            formatter: "rownum",
                            hozAlign: "center",
                            width: 60
                        },
                        {
                            title: "ID",
                            field: "id",
                            visible: false
                        },
                        {
                            title: "Periode",
                            field: "periode",
                            editor: "input"
                        },
                        {
                            title: "Nomor PLO",
                            field: "nomor_plo",
                            editor: "input",
                            width: 250
                        },
                        {
                            title: "Company",
                            field: "company",
                            editor: "input"
                        },
                        {
                            title: "Area",
                            field: "area",
                            editor: "input"
                        },
                        {
                            title: "Lokasi",
                            field: "lokasi",
                            editor: "input",
                            width: 350
                        },
                        {
                            title: "Nama Aset",
                            field: "nama_aset",
                            editor: "input",
                            width: 350
                        },
                        {
                            title: "Tanggal Pengesahan",
                            field: "tanggal_pengesahan",
                            editor: "input",
                            hozAlign: "center",
                        },
                        {
                            title: "Masa Berlaku",
                            field: "masa_berlaku",
                            editor: "input",
                            hozAlign: "center",
                        },
                        {
                            title: "Keterangan",
                            field: "keterangan",
                            editor: "input"
                        },
                        {
                            title: "Belum Proses",
                            field: "belum_proses",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Pre-Inspection",
                            field: "pre_inspection",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Inspection",
                            field: "inspection",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "COI Peralatan",
                            field: "coi_peralatan",
                            editor: "input"
                        },
                        {
                            title: "BA PK",
                            field: "ba_pk",
                            editor: "input"
                        },
                        {
                            title: "Penerbitan PLO (Valid)",
                            field: "penerbitan_plo_valid",
                            editor: "input",
                            hozAlign: "center",
                        },
                        {
                            title: "Kendala",
                            field: "kendala",
                            editor: "input"
                        },
                        {
                            title: "Tindak Lanjut",
                            field: "tindak_lanjut",
                            editor: "input"
                        },
                        {
                            title: "Aksi",
                            formatter: (cell) => {
                                const row = cell.getData();
                                return `<button onclick='deleteData("${row.id}")'>Hapus</button>`;
                            },
                            hozAlign: "center",
                            width: 150
                        }
                    ]
                };

                window.table = new Tabulator("#example-table", {
                    layout: "fitDataTable",
                    responsiveLayout: "collapse",
                    autoResize: true,
                    columns: columnMap["status-plo-omm"],

                    selectableRange: 1,
                    selectableRangeColumns: true,
                    selectableRangeRows: true,
                    selectableRangeClearCells: true,
                    editTriggerEvent: "dblclick",

                    pagination: "local",
                    paginationSize: 20,
                    paginationSizeSelector: [40, 60, 80, 100],
                    paginationCounter: "rows",

                    movableColumns: true,

                    clipboard: true,
                    clipboardCopyStyled: false,
                    clipboardCopyConfig: {
                        rowHeaders: false,
                        columnHeaders: false,
                    },
                    clipboardCopyRowRange: "range",
                    clipboardPasteParser: "range",
                    clipboardPasteAction: "range",
                    clipboardPasteRow: true,

                    columnDefaults: {
                        headerSort: true,
                        headerHozAlign: "center",
                        editor: "input",
                        resizable: "header",
                    },
                });

                table.on("cellEdited", function(cell) {
                    const updatedData = cell.getRow().getData();
                    const id = updatedData.id;

                    if (!id) return;

                    fetch(`status-plo-omm/${id}`, {
                            method: "PUT",
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content")
                            },
                            body: JSON.stringify(updatedData)
                        })
                        .then(res => res.json())
                        .then(data => console.log("Update berhasil:", data))
                        .catch(err => console.error("Gagal update:", err));
                });

                let previousData = [];
                table.on("dataLoaded", function(newData) {
                    previousData = JSON.parse(JSON.stringify(newData));
                });

                function getChangedRows(newData, oldData) {
                    const changes = [];
                    newData.forEach((row, index) => {
                        if (!row.id) return;
                        const oldRow = oldData[index];
                        if (!oldRow) return;

                        const isDifferent = Object.keys(row).some(key => row[key] !== oldRow[key]);
                        if (isDifferent) {
                            changes.push(row);
                        }
                    });
                    return changes;
                }

                table.on("dataChanged", function(newData) {
                    const changedRows = getChangedRows(newData, previousData);
                    console.log("Baris yang berubah:", changedRows);

                    changedRows.forEach(rowData => {
                        fetch(`status-plo-omm/${rowData.id}`, {
                                method: "PUT",
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json",
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content")
                                },
                                body: JSON.stringify(rowData)
                            })
                            .then(res => res.json())
                            .then(response => {
                                console.log("Data berhasil disimpan:", response);
                            })
                            .catch(err => {
                                console.error("Gagal menyimpan hasil paste:", err);
                            });
                    });

                    previousData = JSON.parse(JSON.stringify(newData));
                });
                loadData();
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
                const url = id ? `status-plo-omm/${id}` : "status-plo-omm";

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
                            table.setData("/monev/shg/input-data/status-plo-omm/data");
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

                if (sessionStorage.getItem('scrollToActiveTab') === 'yes') {
                    scrollToActiveTab();
                    sessionStorage.removeItem('scrollToActiveTab');
                }
            });
        </script>
    @endpush

</x-layouts.app>
