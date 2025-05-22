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
                <h5 class="card-title mb-3 mb-md-0">Air Budget Tagging PAG</h5>
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
            <h3>Tambah Data Availability PAG</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">

                <div>
                    <label>Periode</label>
                    <input type="month" name="periode" id="periode" >
                </div>

                <div>
                    <label>Satker</label>
                    <input type="text" name="satker" id="satker">
                </div>

                <div>
                    <label>Kategori</label>
                    <input type="text" name="kategori" id="kategori">
                </div>

                <div>
                    <label>CE</label>
                    <input type="text" name="ce" id="ce">
                </div>

                <div>
                    <label>Cost Element Name</label>
                    <input type="text" name="cost_element_name" id="cost_element_name">
                </div>

                <div>
                    <label>Program Kerja</label>
                    <input type="text" name="program_kerja" id="program_kerja">
                </div>

                <div>
                    <label>Total Pagu (USD)</label>
                    <input type="text" name="total_pagu_usd" id="total_pagu_usd">
                </div>

                <div>
                    <label>JAN</label>
                    <input type="text" name="jan" id="jan">
                </div>

                <div>
                    <label>FEB</label>
                    <input type="text" name="feb" id="feb">
                </div>

                <div>
                    <label>MAR</label>
                    <input type="text" name="mar" id="mar">
                </div>

                <div>
                    <label>APR</label>
                    <input type="text" name="apr" id="apr">
                </div>

                <div>
                    <label>MAY</label>
                    <input type="text" name="may" id="may">
                </div>

                <div>
                    <label>JUN</label>
                    <input type="text" name="jun" id="jun">
                </div>

                <div>
                    <label>JUL</label>
                    <input type="text" name="jul" id="jul">
                </div>

                <div>
                    <label>AUG</label>
                    <input type="text" name="aug" id="aug">
                </div>

                <div>
                    <label>SEP</label>
                    <input type="text" name="sep" id="sep">
                </div>

                <div>
                    <label>OCT</label>
                    <input type="text" name="oct" id="oct">
                </div>

                <div>
                    <label>NOV</label>
                    <input type="text" name="nov" id="nov">
                </div>

                <div>
                    <label>DEC</label>
                    <input type="text" name="dec" id="dec">
                </div>

                <div>
                    <label>Aset Integrity (Yes/No)</label>
                    <select name="aset_integrity" id="aset_integrity"  class="form-select">
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
                    <input type="number" name="jumlah_aset_critical_sece" id="jumlah_aset_critical_sece">
                </div>

                <div>
                    <label>Jumlah Aset Critical PCE</label>
                    <input type="number" name="jumlah_aset_critical_pce" id="jumlah_aset_critical_pce">
                </div>

                <div>
                    <label>Jumlah Aset Important</label>
                    <input type="number" name="jumlah_aset_important" id="jumlah_aset_important">
                </div>

                <div>
                    <label>Jumlah Aset Secondary</label>
                    <input type="number" name="jumlah_aset_secondary" id="jumlah_aset_secondary">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/tabulator-tables@5.6.0/dist/js/tabulator.min.js"></script>

        <script>
            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`air-budget-tagging-pag/${id}`, {
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
                            field: "satker",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kategori",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "ce",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "cost_element_name",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "program_kerja",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "total_pagu_usd",
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

            function loadData() {
                fetch("/monev/shg/input-data/air-budget-tagging-pag/data", {
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
                    "air-budget-tagging-pag": [{
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
                            editor: "input",
                            headerFilter: "select",
                            headerFilterParams: {
                                values: [{
                                        value: "01",
                                        label: "Januari"
                                    },
                                    {
                                        value: "02",
                                        label: "Februari"
                                    },
                                    {
                                        value: "03",
                                        label: "Maret"
                                    },
                                    {
                                        value: "04",
                                        label: "April"
                                    },
                                    {
                                        value: "05",
                                        label: "Mei"
                                    },
                                    {
                                        value: "06",
                                        label: "Juni"
                                    },
                                    {
                                        value: "07",
                                        label: "Juli"
                                    },
                                    {
                                        value: "08",
                                        label: "Agustus"
                                    },
                                    {
                                        value: "09",
                                        label: "September"
                                    },
                                    {
                                        value: "10",
                                        label: "Oktober"
                                    },
                                    {
                                        value: "11",
                                        label: "November"
                                    },
                                    {
                                        value: "12",
                                        label: "Desember"
                                    }
                                ]
                            },
                            headerFilterPlaceholder: "Pilih Bulan",
                            headerFilterFunc: function(headerValue, rowValue) {
                                if (!headerValue) return true;
                                if (!rowValue) return false;

                                const periode = rowValue.toLowerCase();

                                const bulanTextMap = {
                                    "01": ["jan", "january"],
                                    "02": ["feb", "february"],
                                    "03": ["mar", "march"],
                                    "04": ["apr", "april"],
                                    "05": ["may", "mei"],
                                    "06": ["jun", "june"],
                                    "07": ["jul", "july"],
                                    "08": ["aug", "august"],
                                    "09": ["sep", "september"],
                                    "10": ["oct", "october"],
                                    "11": ["nov", "november"],
                                    "12": ["dec", "december"]
                                };

                                const keywords = bulanTextMap[headerValue];
                                return keywords.some(keyword => periode.includes(keyword)) || periode
                                    .includes(`-${headerValue}`);
                            }
                        },
                        {
                            title: "Satker",
                            field: "satker",
                            editor: "input"
                        },
                        {
                            title: "Kategori",
                            field: "kategori",
                            editor: "input"
                        },
                        {
                            title: "CE",
                            field: "ce",
                            editor: "input"
                        },
                        {
                            title: "Cost Element Name",
                            field: "cost_element_name",
                            editor: "input"
                        },
                        {
                            title: "Program Kerja",
                            field: "program_kerja",
                            width: 450,
                            editor: "input"
                        },
                        {
                            title: "Total Pagu (USD)",
                            field: "total_pagu_usd",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "JAN",
                            field: "jan",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "FEB",
                            field: "feb",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "MAR",
                            field: "mar",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "APR",
                            field: "apr",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "MAY",
                            field: "may",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "JUN",
                            field: "jun",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "JUL",
                            field: "jul",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "AUG",
                            field: "aug",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "SEP",
                            field: "sep",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "OCT",
                            field: "oct",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "NOV",
                            field: "nov",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "DEC",
                            field: "dec",
                            editor: "input",
                            hozAlign: "center"
                        },
                        {
                            title: "Aset Integrity (Yes/No)",
                            field: "aset_integrity",
                            editor: "input"
                        },
                        {
                            title: "AIRTagging (Asset Integrity & Reliability)",
                            field: "airtagging",
                            editor: "input"
                        },
                        {
                            title: "Prioritas",
                            field: "prioritas",
                            editor: "input"
                        },
                        {
                            title: "Status Integrity per Des 2024",
                            field: "status_integrity",
                            editor: "input"
                        },
                        {
                            title: "Jumlah Aset Critical SECE",
                            field: "jumlah_aset_critical_sece",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Jumlah Aset Critical PCE",
                            field: "jumlah_aset_critical_pce",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Jumlah Aset Important",
                            field: "jumlah_aset_important",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Jumlah Aset Secondary",
                            field: "jumlah_aset_secondary",
                            editor: "number",
                            hozAlign: "center"
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
                    columns: columnMap["air-budget-tagging-pag"],

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

                    fetch(`air-budget-tagging-pag/${id}`, {
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
                        fetch(`air-budget-tagging-pag/${rowData.id}`, {
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

            document.getElementById("createForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const data = Object.fromEntries(formData.entries());

                fetch("air-budget-tagging-pag", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            periode: data.periode,
                            satker: data.satker || null,
                            kategori: data.kategori || null,
                            ce: data.ce || null,
                            cost_element_name: data.cost_element_name || null,
                            program_kerja: data.program_kerja || null,
                            total_pagu_usd: data.total_pagu_usd || null,
                            jan: data.jan || null,
                            feb: data.feb || null,
                            mar: data.mar || null,
                            apr: data.apr || null,
                            may: data.may || null,
                            jun: data.jun || null,
                            jul: data.jul || null,
                            aug: data.aug || null,
                            sep: data.sep || null,
                            oct: data.oct || null,
                            nov: data.nov || null,
                            dec: data.dec || null,
                            aset_integrity: data.aset_integrity || null,
                            airtagging: data.airtagging || null,
                            prioritas: data.prioritas || null,
                            status_integrity: data.status_integrity || null,
                            jumlah_aset_critical_sece: data.jumlah_aset_critical_sece || null,
                            jumlah_aset_critical_pce: data.jumlah_aset_critical_pce || null,
                            jumlah_aset_important: data.jumlah_aset_important || null,
                            jumlah_aset_secondary: data.jumlah_aset_secondary || null,
                        })

                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message || "Data berhasil disimpan");
                            table.setData("/monev/shg/input-data/air-budget-tagging-pag/data");
                            this.reset();
                            closeModal();
                        } else {
                            alert("Gagal menyimpan data");
                        }
                    })
                    .catch(error => {
                        console.error("Error saat submit:", error);
                        alert("Terjadi kesalahan saat mengirim data.");
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
