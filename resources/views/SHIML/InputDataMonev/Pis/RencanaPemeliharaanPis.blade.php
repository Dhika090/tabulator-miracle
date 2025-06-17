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
                <h5 class="card-title mb-3 mb-md-0">Rencana Pemeliharaan Besar PIS</h5>
                <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                    <input id="search-input" type="text" class="form-control" placeholder="Search data..."
                        style="max-width: 200px;">
                    <button class="btn btn-outline-secondary ms-2 h-100 mt-1 d" type="button"
                        onclick="clearSearch()">Clear</button>
                    <button class="btn btn-primary px-4 py-2" id="download-xlsx" style="white-space: nowrap;">
                        Export Excel
                    </button>
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
            <h3>Tambah Rencana Pemeliharaan Besar PIS</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">
                <label for="periode">Periode (Tahun):</label>
                <select name="periode" id="periode" class="form-select">
                    <option value="" selected disabled>Pilih Periode</option>
                    @for ($year = 2000; $year <= date('Y') + 5; $year++)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>

                <div>
                    <label for="no">No</label>
                    <input type="number" id="no" name="no">
                </div>

                <div>
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company">
                </div>

                <div>
                    <label for="lokasi">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi">
                </div>

                <div>
                    <label for="program_kerja">Program Kerja</label>
                    <input type="text" id="program_kerja" name="program_kerja">
                </div>

                <div>
                    <label for="kategori_maintenance">Kategori Maintenance</label>
                    <input type="text" id="kategori_maintenance" name="kategori_maintenance">
                </div>

                <div>
                    <label for="besar_phasing">Besar Phasing</label>
                    <input type="number" id="besar_phasing" name="besar_phasing" step="any">
                </div>

                <div>
                    <label for="remark">Remark</label>
                    <input type="text" id="remark" name="remark">
                </div>

                <!-- Bulan -->
                <div>
                    <label for="jan">Jan</label>
                    <input type="number" id="jan" name="jan">
                </div>

                <div>
                    <label for="feb">Feb</label>
                    <input type="number" id="feb" name="feb">
                </div>

                <div>
                    <label for="mar">Mar</label>
                    <input type="number" id="mar" name="mar">
                </div>

                <div>
                    <label for="apr">Apr</label>
                    <input type="number" id="apr" name="apr">
                </div>

                <div>
                    <label for="may">May</label>
                    <input type="number" id="may" name="may">
                </div>

                <div>
                    <label for="jun">Jun</label>
                    <input type="number" id="jun" name="jun">
                </div>

                <div>
                    <label for="jul">Jul</label>
                    <input type="number" id="jul" name="jul">
                </div>

                <div>
                    <label for="aug">Aug</label>
                    <input type="number" id="aug" name="aug">
                </div>

                <div>
                    <label for="sep">Sep</label>
                    <input type="number" id="sep" name="sep">
                </div>

                <div>
                    <label for="oct">Oct</label>
                    <input type="number" id="oct" name="oct">
                </div>

                <div>
                    <label for="nov">Nov</label>
                    <input type="number" id="nov" name="nov">
                </div>

                <div>
                    <label for="dec">Dec</label>
                    <input type="number" id="dec" name="dec">
                </div>

                <div>
                    <label for="biaya_kerugian">Biaya Kerugian (USD)</label>
                    <input type="number" id="biaya_kerugian" name="biaya_kerugian" step="0.01">
                </div>

                <div>
                    <label for="keterangan_kerugian">Keterangan Kerugian</label>
                    <input type="text" id="keterangan_kerugian" name="keterangan_kerugian">
                </div>

                <div>
                    <label for="penyebab">Penyebab</label>
                    <input type="text" id="penyebab" name="penyebab">
                </div>

                <div>
                    <label for="kendala">Kendala</label>
                    <input type="text" id="kendala" name="kendala">
                </div>

                <div>
                    <label for="tindak_lanjut">Tindak Lanjut</label>
                    <input type="text" id="tindak_lanjut" name="tindak_lanjut">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>

        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
        <script src="https://unpkg.com/tabulator-tables@5.6.0/dist/js/tabulator.min.js"></script>
        <script>
            function deleteData(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    fetch(`rencana-pemeliharaan-pis/${id}`, {
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

            function clearSearch() {
                document.getElementById("search-input").value = "";
                table.clearFilter();
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
                            field: "no",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "company",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "lokasi",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "program_kerja",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "kategori_maintenance",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "besar_phasing",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "remark",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "biaya_kerugian",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "keterangan_kerugian",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "penyebab",
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

            function loadData() {
                fetch("/monev/shiml/input-data/rencana-pemeliharaan-pis/data", {
                        headers: {
                            "Accept": "application/json"
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        const cleaned = data.map(row => {
                            const cleanedRow = {};
                            for (const [key, value] of Object.entries(row)) {
                                const valStr = String(value).trim().toLowerCase();
                                cleanedRow[key] = (
                                    value === null ||
                                    value === undefined ||
                                    valStr === "null" ||
                                    valStr === "undefined"
                                ) ? "" : value;
                            }
                            return cleanedRow;
                        });

                        table.setData(cleaned);
                    })
                    .catch(err => console.error("Gagal load data:", err));
            }

            document.addEventListener("DOMContentLoaded", function() {
                const columnMap = {
                    "rencana-pemeliharaan-pis": [{
                            title: "No",
                            formatter: "rownum",
                            hozAlign: "center",
                            width: 60,
                            download: false
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
                                values: (() => {
                                    const years = [];
                                    years.push({
                                        value: "",
                                        label: "Pilih Tahun"
                                    });
                                    for (let year = 2020; year <= new Date().getFullYear() +
                                        5; year++) {
                                        years.push({
                                            value: String(year),
                                            label: String(year)
                                        });
                                    }
                                    return years;
                                })()
                            }
                        },
                        {
                            title: "No",
                            field: "no",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Company",
                            field: "company",
                            editor: "input"
                        },
                        {
                            title: "Lokasi",
                            field: "lokasi",
                            editor: "input"
                        },
                        {
                            title: "Program Kerja",
                            field: "program_kerja",
                            editor: "input",
                            width: 450
                        },
                        {
                            title: "Kategori Maintenance",
                            field: "kategori_maintenance",
                            editor: "input"
                        },
                        {
                            title: "Besar Phasing",
                            field: "besar_phasing",
                            hozAlign: "right",
                            formatter: function(cell) {
                                let rawValue = cell.getValue();
                                if (rawValue === null || rawValue === undefined || rawValue === "") {
                                    return "0.00";
                                }

                                let cleanValue = rawValue.toString().replace(/[^0-9.-]+/g, '');
                                let value = parseFloat(cleanValue);

                                if (!isNaN(value)) {
                                    return value.toLocaleString("en-US", {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    });
                                }

                                return "0.00";
                            },
                            editor: "input"
                        },
                        {
                            title: "Remark",
                            field: "remark",
                            editor: "input"
                        },
                        {
                            title: "Jan",
                            field: "jan",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Feb",
                            field: "feb",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Mar",
                            field: "mar",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Apr",
                            field: "apr",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "May",
                            field: "may",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Jun",
                            field: "jun",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Jul",
                            field: "jul",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Aug",
                            field: "aug",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Sep",
                            field: "sep",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Oct",
                            field: "oct",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Nov",
                            field: "nov",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Dec",
                            field: "dec",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Biaya Kerugian (USD)",
                            field: "biaya_kerugian",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Keterangan Kerugian",
                            field: "keterangan_kerugian",
                            editor: "input"
                        },
                        {
                            title: "Penyebab",
                            field: "penyebab",
                            editor: "input",
                            width: 450
                        },
                        {
                            title: "Kendala",
                            field: "kendala",
                            editor: "input",
                            width: 450
                        },
                        {
                            title: "Tindak Lanjut",
                            field: "tindak_lanjut",
                            editor: "input",
                            width: 450
                        },
                        {
                            title: "Aksi",
                            download: false,
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
                    columns: columnMap["rencana-pemeliharaan-pis"],

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

                document.getElementById("download-xlsx").addEventListener("click", function() {
                    window.table.download("xlsx", "rencana-pemeliharaan-pis.xlsx", {
                        sheetName: "rencana-pemeliharaan-pis",
                        columnHeaders: true,
                        downloadDataFormatter: function(data) {
                            return data.map(row => {
                                const cleanedRow = {};
                                for (const [key, value] of Object.entries(row)) {
                                    const valStr = String(value).trim().toLowerCase();
                                    cleanedRow[key] = (
                                        value === null ||
                                        value === undefined ||
                                        value === "" ||
                                        valStr === "null" ||
                                        valStr === "undefined"
                                    ) ? "" : value;
                                }
                                return cleanedRow;
                            });
                        }
                    });
                });

                table.on("cellEdited", function(cell) {
                    const updatedData = cell.getRow().getData();
                    const id = updatedData.id;

                    if (!id) return;

                    fetch(`rencana-pemeliharaan-pis/${id}`, {
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
                        .then(data => console.log("Berhasil update:", data))
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
                        fetch(`rencana-pemeliharaan-pis/${rowData.id}`, {
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

                fetch("rencana-pemeliharaan-pis", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            periode: data.periode,
                            no: data.no,
                            company: data.company,
                            lokasi: data.lokasi,
                            program_kerja: data.program_kerja,
                            kategori_maintenance: data.kategori_maintenance,
                            besar_phasing: data.besar_phasing,
                            remark: data.remark,
                            jan: data.jan,
                            feb: data.feb,
                            mar: data.mar,
                            apr: data.apr,
                            may: data.may,
                            jun: data.jun,
                            jul: data.jul,
                            aug: data.aug,
                            sep: data.sep,
                            oct: data.oct,
                            nov: data.nov,
                            dec: data.dec,
                            biaya_kerugian: data.biaya_kerugian,
                            keterangan_kerugian: data.keterangan_kerugian,
                            penyebab: data.penyebab,
                            kendala: data.kendala,
                            tindak_lanjut: data.tindak_lanjut
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message || "Data berhasil disimpan");
                            table.setData("/monev/shiml/input-data/rencana-pemeliharaan-pis/data");
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

                if (sessionStorage.getItem('scrollToActiveTab') === 'yes') {
                    scrollToActiveTab();
                    sessionStorage.removeItem('scrollToActiveTab');
                }
            });
        </script>
    @endpush
</x-layouts.app>
