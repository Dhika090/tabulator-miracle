@section('title', __(''))
<x-layouts.app :title="__('')">
    @push('styles')
        <link href="https://unpkg.com/tabulator-tables@5.6.0/dist/css/tabulator.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
        <div class="card-body d-flex flex-column">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                <h5 class="card-title mb-3 mb-md-0">Pelatihan AIMS PTG</h5>
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
            <h3>Tambah Target SAP</h3>
            <form id="createForm">
                <input type="hidden" name="id" id="form-id">
                <div>
                    <label>Periode</label>
                    <input type="month" name="periode" id="periode" required>
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
                    <input type="text" name="unit" id="unit" >
                </div>

                {{-- dropdown nama Sertifikasi --}}
                <div>
                    <label>Nama Sertifikasi</label>
                    <select name="nama_sertifikasi" id="nama_sertifikasi" class="form-control"  >
                        <option value="">-- Pilih Sertifikasi --</option>
                        <option value="(Maintenance) Planner Academy">(Maintenance) Planner Academy</option>
                        <option value="Advanced Corrosion & Material Technology">Advanced Corrosion & Material
                            Technology</option>
                        <option value="API 510 - Pressure Vessel Inspector">API 510 - Pressure Vessel Inspector</option>
                        <option value="API 570 - Piping Inspector">API 570 - Piping Inspector</option>
                        <option value="API 571 - Corrosion and Materials">API 571 - Corrosion and Materials</option>
                        <option value="API 617 - Reciprocating Compressor">API 617 - Reciprocating Compressor</option>
                        <option value="API 653 - Aboveground Storage Tank">API 653 - Aboveground Storage Tank</option>
                        <option value="API 687 Rotor Repair">API 687 Rotor Repair</option>
                        <option value="API 936 - Refractory Personnel">API 936 - Refractory Personnel</option>
                        <option
                            value="API RP 941 - Steel for Hydrogen service at elevated temperatures in petroleum & petrochemical plants">
                            API RP 941 - Steel for Hydrogen service at elevated temperatures in petroleum &
                            petrochemical plants</option>
                        <option value="API RP 2000 - Venting Atmospheric and Low-pressure Storage Tanks">API RP 2000 -
                            Venting Atmospheric and Low-pressure Storage Tanks</option>
                        <option value="API RP 2350 - Overfill Protection for Storage Tanks in Petroleum Facilities">API
                            RP 2350 - Overfill Protection for Storage Tanks in Petroleum Facilities</option>
                        <option
                            value="API RP 941 - Steels for Hydrogen Service at Elevated Temperatures and Pressures in Petroleum Refineries and Petrochemical Plants">
                            API RP 941 - Steels for Hydrogen Service at Elevated Temperatures and Pressures in Petroleum
                            Refineries and Petrochemical Plants</option>
                        <option value="ASME B31.3 - Process Piping">ASME B31.3 - Process Piping</option>
                        <option value="ASME Section VIII Division 1 & 2 - Pressure Vessel Series">ASME Section VIII
                            Division 1 & 2 - Pressure Vessel Series</option>
                        <option value="Asset Integrity Management System">Asset Integrity Management System</option>
                        <option value="Basic Electrical, Process Control Stationary & Rotary Mechanical Equipment">Basic
                            Electrical, Process Control Stationary & Rotary Mechanical Equipment</option>
                        <option value="Basic Equipment Care (BEC)">Basic Equipment Care (BEC)</option>
                        <option value="Basic Instrument & Control">Basic Instrument & Control</option>
                        <option value="Basic Operational Care (BOC)">Basic Operational Care (BOC)</option>
                        <option value="Basic Process Unit">Basic Process Unit</option>
                        <option value="Bimtek Kualifikasi Tenaga Ahli Inspektur Pipa Penyalur Migas">Bimtek Kualifikasi
                            Tenaga Ahli Inspektur Pipa Penyalur Migas</option>
                        <option value="Bridge Room Resource Management (BRRM)">Bridge Room Resource Management (BRRM)
                        </option>
                        <option value="Carbonates in the Petroleum Industry">Carbonates in the Petroleum Industry
                        </option>
                        <option value="Cathodic Protection">Cathodic Protection</option>
                        <option value="Certified Maintenance and Reliability Professional (CMRP)">Certified Maintenance
                            and Reliability Professional (CMRP)</option>
                        <option value="Coating Inspector Level I">Coating Inspector Level I</option>
                        <option value="Coating Inspector Level II">Coating Inspector Level II</option>
                        <option value="Engine Room Resource Management (ERRM)">Engine Room Resource Management (ERRM)
                        </option>
                        <option value="Failure Analysis & Troubleshooting for Compressor">Failure Analysis &
                            Troubleshooting for Compressor</option>
                        <option value="Failure Mode Effect Analysis">Failure Mode Effect Analysis</option>
                        <option value="Fitness-For-Service (FFS) and Engineering Critical Assessment (ECA) for Piping">
                            Fitness-For-Service (FFS) and Engineering Critical Assessment (ECA) for Piping</option>
                        <option value="Grounding and Lightning Protection System">Grounding and Lightning Protection
                            System</option>
                        <option value="Hazard Identification and Risk Assessment">Hazard Identification and Risk
                            Assessment</option>
                        <option value="High Voltage, Equipment and Testing">High Voltage, Equipment and Testing
                        </option>
                        <option value="High Voltage, Management on Ship">High Voltage, Management on Ship</option>
                        <option value="Hull and Machinery (Maintenance)">Hull and Machinery (Maintenance)</option>
                        <option value="IEC 62561-5:2017 for Lightning Protection System Components">IEC 62561-5:2017
                            for Lightning Protection System Components</option>
                        <option value="Inspection & Preventive Maintenance Jetty">Inspection & Preventive Maintenance
                            Jetty</option>
                        <option value="Inspector Ahli Ketel Uap / Boiler (AK3U)">Inspector Ahli Ketel Uap / Boiler
                            (AK3U)</option>
                        <option value="Inspektur Tanki Timbun">Inspektur Tanki Timbun</option>
                        <option value="Inspektur Bejana Tekan">Inspektur Bejana Tekan</option>
                        <option value="Inspektur Listrik Migas">Inspektur Listrik Migas</option>
                        <option value="Inventory of Hazardous Materials, IHM and EU SRR">Inventory of Hazardous
                            Materials, IHM and EU SRR</option>
                        <option value="ISO 55001 Lead Auditor">ISO 55001 Lead Auditor</option>
                        <option value="Life Cycle Assessment">Life Cycle Assessment</option>
                        <option value="Maintenance Management">Maintenance Management</option>
                        <option value="Mooring, Equipment Inspection">Mooring, Equipment Inspection</option>
                        <option value="Mooring, Risk assessment and management">Mooring, Risk assessment and management
                        </option>
                        <option value="NDT Level -1 (ECT, PT, MT, UT, dll)">NDT Level -1 (ECT, PT, MT, UT, dll)
                        </option>
                        <option value="NDT Level -2 (ECT, PT, MT, UT, dll)">NDT Level -2 (ECT, PT, MT, UT, dll)
                        </option>
                        <option value="Operation and Maintenance of Inert Gas Systems (Edition 3)">Operation and
                            Maintenance of Inert Gas Systems (Edition 3)</option>
                        <option value="Part or Material Knowledge & Sourcing">Part or Material Knowledge & Sourcing
                        </option>
                        <option value="Pelatihan Ahli Teknik (AT)">Pelatihan Ahli Teknik (AT)</option>
                        <option value="Pelatihan dan Sertifikasi Inspektur Tangki">Pelatihan dan Sertifikasi Inspektur
                            Tangki</option>
                        <option value="Periodic Maintenance and Inspection of Lifting Equipment">Periodic Maintenance
                            and Inspection of Lifting Equipment</option>
                        <option value="Pipeline Integrity Management System (PIMS)">Pipeline Integrity Management
                            System (PIMS)</option>
                        <option value="POP (Pengawas Operasional Pertama) dan POM (Pengawas Operasional Madya)">POP
                            (Pengawas Operasional Pertama) dan POM (Pengawas Operasional Madya)</option>
                        <option value="Pump Operation, Maintenance and Troubleshooting">Pump Operation, Maintenance and
                            Troubleshooting</option>
                        <option value="RBI Engineer">RBI Engineer</option>
                        <option value="Reliability Centered Maintenance">Reliability Centered Maintenance</option>
                        <option value="Risk Based Inspection">Risk Based Inspection</option>
                        <option value="SAP Modul Plant Maintenance">SAP Modul Plant Maintenance</option>
                        <option value="Sertifikasi BNSP - Pipe Fitter">Sertifikasi BNSP - Pipe Fitter</option>
                        <option
                            value="Sertifikasi Inspektur Peralatan (Pipa Penyalur, Bejana Tekan, Tanki Timbun, Rotating, dll)">
                            Sertifikasi Inspektur Peralatan (Pipa Penyalur, Bejana Tekan, Tanki Timbun, Rotating, dll)
                        </option>
                        <option value="Sertifikasi Inspektur Pesawat Angkat (Crane Inspector)">Sertifikasi Inspektur
                            Pesawat Angkat (Crane Inspector)</option>
                        <option value="Sertifikasi Inspektur Rotating Equipment">Sertifikasi Inspektur Rotating
                            Equipment</option>
                        <option value="Sertifikasi Inspektur Tangki Timbun">Sertifikasi Inspektur Tangki Timbun
                        </option>
                        <option value="Sertifikasi Kompetensi Kerja Kalibrasi dan Instrumentasi (Teknisi Tingkat II)">
                            Sertifikasi Kompetensi Kerja Kalibrasi dan Instrumentasi (Teknisi Tingkat II)</option>
                        <option value="Sertifikasi Life Cycle Assessment (LCA)">Sertifikasi Life Cycle Assessment (LCA)
                        </option>
                        <option
                            value="Sertifikasi O&M Peralatan (Pipa Penyalur, Bejana Tekan, Tanki Timbun, Rotating, dll)">
                            Sertifikasi O&M Peralatan (Pipa Penyalur, Bejana Tekan, Tanki Timbun, Rotating, dll)
                        </option>
                        <option value="Sertifikasi Operator Mesin Balancing">Sertifikasi Operator Mesin Balancing
                        </option>
                        <option value="Sertifikasi Operator Pesawat Angkat">Sertifikasi Operator Pesawat Angkat
                        </option>
                        <option value="Sertifikasi Pemeliharaan Steam Turbine">Sertifikasi Pemeliharaan Steam Turbine
                        </option>
                        <option value="Shell & Tube Heat Exchanger">Shell & Tube Heat Exchanger</option>
                        <option value="Ship Inspection Report 2.0">Ship Inspection Report 2.0</option>
                        <option value="SIRE 2.0, The ship inspection">SIRE 2.0, The ship inspection</option>
                        <option value="SKKNI Perawatan Mekanik: Pengawas">SKKNI Perawatan Mekanik: Pengawas</option>
                        <option value="SKKNI Teknik Listrik Migas: Pengawas">SKKNI Teknik Listrik Migas: Pengawas
                        </option>
                        <option value="SKTTK/ Sertifikasi kompetensi Tenaga kelistrikan">SKTTK/ Sertifikasi kompetensi
                            Tenaga kelistrikan</option>
                        <option value="Turbomachinery Inspection & Maintenance">Turbomachinery Inspection & Maintenance
                        </option>
                        <option value="Turn Around Management Academy (T/A Brick) - Execution">Turn Around Management
                            Academy (T/A Brick) - Execution</option>
                        <option value="Vibration Analysis Level I, II">Vibration Analysis Level I, II</option>
                        <option value="Vibration analysis Level-1">Vibration analysis Level-1</option>
                        <option value="Vibration analysis Level-2">Vibration analysis Level-2</option>
                        <option value="Welding Engineer">Welding Engineer</option>
                        <option value="Welding Inspector">Welding Inspector</option>
                    </select>
                </div>

                <div>
                    <label>Lembaga Penerbit Sertifikat</label>
                    <input type="text" name="lembaga_penerbit_sertifikat" id="lembaga_penerbit_sertifikat">
                </div>

                <div>
                    <label>Jumlah Sertifikasi yang Sudah Terbit</label>
                    <input type="number" name="jumlah_sertifikasi_terbit" id="jumlah_sertifikasi_terbit">
                </div>

                <div>
                    <label>Jumlah Learning Hours</label>
                    <input type="number" name="jumlah_learning_hours" id="jumlah_learning_hours">
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
                    fetch(`mandatory-certification-kjg/${id}`, {
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
                            field: "subholding",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "company",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "unit",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "nama_sertifikasi",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "lembaga_penerbit_sertifikat",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "jumlah_sertifikasi_sudah_terbit",
                            type: "like",
                            value: keyword
                        },
                        {
                            field: "jumlah_learning_hours",
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
                fetch("/monev/shg/input-data/mandatory-certification-kjg/data", {
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
                    "mandatory-certification-kjg": [{
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
                            title: "Subholding",
                            field: "subholding",
                            editor: "input"
                        },
                        {
                            title: "Company",
                            field: "company",
                            editor: "input"
                        },
                        {
                            title: "Unit",
                            field: "unit",
                            editor: "input"
                        },
                        {
                            title: "Nama Sertifikasi",
                            field: "nama_sertifikasi",
                            editor: "input"
                        },
                        {
                            title: "Lembaga Penerbit Sertifikat",
                            field: "lembaga_penerbit_sertifikat",
                            editor: "input"
                        },
                        {
                            title: "Jumlah Sertifikasi yang Sudah Terbit",
                            field: "jumlah_sertifikasi_terbit",
                            editor: "number",
                            hozAlign: "center"
                        },
                        {
                            title: "Jumlah Learning Hours",
                            field: "jumlah_learning_hours",
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
                    columns: columnMap["mandatory-certification-kjg"],

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

                    fetch(`mandatory-certification-kjg/${id}`, {
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

                fetch("mandatory-certification-kjg", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content")
                        },
                        body: JSON.stringify({
                            periode: data.periode,
                            subholding: data.subholding,
                            company: data.company,
                            unit: data.unit,
                            nama_sertifikasi: data.nama_sertifikasi,
                            lembaga_penerbit_sertifikat: data.lembaga_penerbit_sertifikat,
                            jumlah_sertifikasi_sudah_terbit: data.jumlah_sertifikasi_sudah_terbit,
                            jumlah_learning_hours: data.jumlah_learning_hours
                        })

                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message || "Data berhasil disimpan");
                            table.setData("/monev/shg/input-data/mandatory-certification-kjg/data");
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
