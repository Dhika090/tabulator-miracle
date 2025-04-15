@section('title', __('MandatoryCertification'))
<x-layouts.app :title="__('MandatoryCertification')">
    @push('styles')
        <link href="https://unpkg.com/tabulator-tables@5.6.0/dist/css/tabulator.min.css" rel="stylesheet">
        <style>
            .tabulator-wrapper {
                overflow-x: auto;
                width: 100%;
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
            <h5 class="card-title mb-3 d-flex justify-content-between">Mandatory Certification</h5>

            <button onclick="openModal()" class="btn btn-primary">Create Data</button>
            <br><br>
            <div class="tabulator-wrapper">
                <div id="example-table"></div>
            </div>
        </div>
    </div>

    <div id="createModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Create New Data</h3>
            <form id="createForm">
                <label>Periode:</label>
                <input type="text" name="periode" required><br>

                <label>Subholding:</label>
                <input type="text" name="subholding" required><br>

                <label>company:</label>
                <input type="text" name="company" required><br>

                <label>Unit:</label>
                <input type="text" name="unit" required><br>

                <label>Posisi Awal Tahun:</label>
                <input type="number" name="posisi_awal_tahun" required><br>

                <label>Posisi Vacant Awal Tahun:</label>
                <input type="number" name="posisi_vacant_awal_tahun" required><br><br>

                <label>Posisi Terisi Awal Tahun:</label>
                <input type="number" name="posisi_terisi_awal_tahun" required><br>

                <label>Target Personil yang Memenuhi Sertifikasi (Tahunan):</label>
                <input type="number" name="target_personil_memenuhi_sertifikasi" required><br><br>

                <label>Jumlah Sertifikasi yang Sudah Terbit:</label>
                <input type="number" name="jumlah_sertifikasi_sudah_terbit" required><br><br>

                <label>Jumlah Sertifikasi yang Belum Terbit:</label>
                <input type="number" name="jumlah_sertifikasi_belum_terbit" required><br><br>

                <label>Jumlah Learning Hours:</label>
                <input type="number" name="jumlah_learning_hours" required><br><br>

                <label>Target KPI:</label>
                <input type="number" name="target_kpi" required><br><br>

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

                columns: [{
                        title: "No",
                        formatter: "rownum",
                        hozAlign: "center",
                        width: 60,
                        headerSort: true,
                        sorter: "number",
                        frozen: true
                    },
                    {
                        title: "Periode",
                        field: "periode",

                    },
                    {
                        title: "Subholding",
                        field: "subholding",
                    },
                    {
                        title: "Company",
                        field: "company",
                        width: 120,
                        sorter: "string",
                    },
                    {
                        title: "Unit",
                        field: "unit",
                        width: 100,                        
                    },
                    {
                        title: "Posisi Awal Tahun",
                        field: "posisi_awal_tahun",
                        hozAlign: "center",
                        sorter: "number",
                        width: 190,
                    },
                    {
                        title: "Posisi Vacant Awal Tahun",
                        field: "posisi_vacant_awal_tahun",
                        hozAlign: "center",
                        sorter: "number",
                        width: 220,
                    },
                    {
                        title: "Posisi Terisi Awal Tahun",
                        field: "posisi_terisi_awal_tahun",
                        hozAlign: "center",
                        sorter: "number"
                    },
                    {
                        title: "Target Personil Memenuhi Sertifikasi",
                        field: "target_personil_memenuhi_sertifikasi",
                        hozAlign: "center",
                        sorter: "number"
                    },
                    {
                        title: "Jumlah Sertifikasi Sudah Terbit",
                        field: "jumlah_sertifikasi_sudah_terbit",
                        hozAlign: "center",
                        sorter: "number"
                    },
                    {
                        title: "Jumlah Sertifikasi Belum Terbit",
                        field: "jumlah_sertifikasi_belum_terbit",
                        hozAlign: "center",
                        sorter: "number"
                    },
                    {
                        title: "Jumlah Learning Hours",
                        field: "jumlah_learning_hours",
                        hozAlign: "center",
                        sorter: "number"
                    },
                    {
                        title: "Target KPI",
                        field: "target_kpi",
                        hozAlign: "center",
                        sorter: "number"
                    },
                ],
            });

            fetch("{{ route('mandatory-certification.data') }}", {
                    headers: {
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Data from backend:", data);
                    table.setData(data);
                })
                .catch(error => console.error("Error loading data:", error));
        </script>

        {{-- create data --}}
        <script>
            function openModal() {
                document.getElementById("createModal").style.display = "block";
            }

            function closeModal() {
                document.getElementById("createModal").style.display = "none";
            }

            document.getElementById("createForm").addEventListener("submit", function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const data = Object.fromEntries(formData.entries());
                console.log("Data submitted:", data);

                const token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

                fetch("{{ route('mandatory-certification') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": token,
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            table.addRow([result.data]);
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
