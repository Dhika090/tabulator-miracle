@section('title', __('Perta Samtan Gas'))
<x-layouts.app :title="__('Perta Samtan Gas')">
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

            .form-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 30px;
                padding: 20px;
            }

            .form-column {
                display: flex;
                flex-direction: column;
            }

            .form-column label {
                margin-top: 10px;
                font-weight: bold;
            }

            .form-column input {
                padding: 8px;
                margin-top: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .form-actions {
                text-align: center;
            }

            @media (max-width: 768px) {
                .form-grid {
                    grid-template-columns: 1fr;
                }
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
            <h5 class="card-title mb-3 d-flex justify-content-between">PT. Perta Samtan Gas</h5>

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
            <form id="createForm" class="form-grid">
                <div class="form-column">
                    <label>Periode:</label>
                    <input type="text" name="periode" required>

                    <label>Subholding:</label>
                    <input type="text" name="subholding" required>

                    <label for="company">Company:</label>
                    <select name="company" id="company" required class="form-select">
                        <option value="">-- Pilih Company --</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company }}">{{ $company }}</option>
                        @endforeach
                    </select>

                    <label>Unit:</label>
                    <input type="text" name="unit" required>

                    <label>Asset Group:</label>
                    <input type="text" name="asset_group" required>

                    <label>Jumlah:</label>
                    <input type="number" name="jumlah" required>

                    <label>SECE Low Integrity - Breakdown:</label>
                    <input type="number" name="sece_low_breakdown">

                    <label>SECE Medium Integrity - Due Date Inspection:</label>
                    <input type="number" name="sece_medium_due_date_inspection">

                    <label>SECE Medium Integrity - Low Condition:</label>
                    <input type="number" name="sece_medium_low_condition">

                    <label>SECE Medium Integrity - Low Performance:</label>
                    <input type="number" name="sece_medium_low_performance">

                    <label>SECE High Integrity:</label>
                    <input type="number" name="sece_high">

                    <label>PCE Low Integrity - Breakdown:</label>
                    <input type="number" name="pce_low_breakdown">

                    <label>PCE Medium Integrity - Due Date Inspection:</label>
                    <input type="number" name="pce_medium_due_date_inspection">
                </div>

                <!-- Kolom Kanan -->
                <div class="form-column">
                    <label>PCE Medium Integrity - Low Condition:</label>
                    <input type="number" name="pce_medium_low_condition">

                    <label>PCE Medium Integrity - Low Performance:</label>
                    <input type="number" name="pce_medium_low_performance">

                    <label>PCE High Integrity:</label>
                    <input type="number" name="pce_high">

                    <label>IMPORTANT Low Integrity - Breakdown:</label>
                    <input type="number" name="important_low_breakdown">

                    <label>IMPORTANT Medium Integrity - Due Date Inspection:</label>
                    <input type="number" name="important_medium_due_date_inspection">

                    <label>IMPORTANT Medium Integrity - Low Condition:</label>
                    <input type="number" name="important_medium_low_condition">

                    <label>IMPORTANT Medium Integrity - Low Performance:</label>
                    <input type="number" name="important_medium_low_performance">

                    <label>IMPORTANT High Integrity:</label>
                    <input type="number" name="important_high">

                    <label>SECONDARY Low Integrity - Breakdown:</label>
                    <input type="number" name="secondary_low_breakdown">

                    <label>SECONDARY Medium Integrity - Due Date Inspection:</label>
                    <input type="number" name="secondary_medium_due_date_inspection">

                    <label>SECONDARY Medium Integrity - Low Condition:</label>
                    <input type="number" name="secondary_medium_low_condition">

                    <label>SECONDARY Medium Integrity - Low Performance:</label>
                    <input type="number" name="secondary_medium_low_performance">

                    <label>SECONDARY High Integrity:</label>
                    <input type="number" name="secondary_high">

                    <label>Kegiatan Penurunan Low:</label>
                    <input type="text" name="kegiatan_penurunan_low">

                    <label>Kegiatan Penurunan Med:</label>
                    <input type="text" name="kegiatan_penurunan_med">

                    <label>Informasi Penyebab Low Integrity:</label>
                    <input type="text" name="penyebab_low_integrity">

                    <label>Informasi Penambahan Jumlah Aset:</label>
                    <input type="text" name="penambahan_jumlah_aset">

                    <label>Informasi Naik Turun Low Integrity:</label>
                    <input type="text" name="naik_turun_low_integrity">
                </div>

                <!-- Tombol Submit -->
                <div class="form-actions" style="grid-column: span 2;">
                    <br><br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
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
                        title: "Asset Group",
                        field: "asset_group"
                    },
                    {
                        title: "Jumlah",
                        field: "jumlah",
                        hozAlign: "center"
                    },

                    // SECE
                    {
                        title: "SECE Low - Breakdown",
                        field: "sece_low_breakdown"
                    },
                    {
                        title: "SECE Med - Due Date",
                        field: "sece_medium_due_date_inspection"
                    },
                    {
                        title: "SECE Med - Low Condition",
                        field: "sece_medium_low_condition"
                    },
                    {
                        title: "SECE Med - Low Performance",
                        field: "sece_medium_low_performance"
                    },
                    {
                        title: "SECE High",
                        field: "sece_high"
                    },

                    // PCE
                    {
                        title: "PCE Low - Breakdown",
                        field: "pce_low_breakdown"
                    },
                    {
                        title: "PCE Med - Due Date",
                        field: "pce_medium_due_date_inspection"
                    },
                    {
                        title: "PCE Med - Low Condition",
                        field: "pce_medium_low_condition"
                    },
                    {
                        title: "PCE Med - Low Performance",
                        field: "pce_medium_low_performance"
                    },
                    {
                        title: "PCE High",
                        field: "pce_high"
                    },

                    // IMPORTANT
                    {
                        title: "IMPORTANT Low - Breakdown",
                        field: "important_low_breakdown"
                    },
                    {
                        title: "IMPORTANT Med - Due Date",
                        field: "important_medium_due_date_inspection"
                    },
                    {
                        title: "IMPORTANT Med - Low Condition",
                        field: "important_medium_low_condition"
                    },
                    {
                        title: "IMPORTANT Med - Low Performance",
                        field: "important_medium_low_performance"
                    },
                    {
                        title: "IMPORTANT High",
                        field: "important_high"
                    },

                    // SECONDARY
                    {
                        title: "SECONDARY Low - Breakdown",
                        field: "secondary_low_breakdown"
                    },
                    {
                        title: "SECONDARY Med - Due Date",
                        field: "secondary_medium_due_date_inspection"
                    },
                    {
                        title: "SECONDARY Med - Low Condition",
                        field: "secondary_medium_low_condition"
                    },
                    {
                        title: "SECONDARY Med - Low Performance",
                        field: "secondary_medium_low_performance"
                    },
                    {
                        title: "SECONDARY High",
                        field: "secondary_high"
                    },

                    // Info tambahan
                    {
                        title: "Kegiatan Penurunan Low",
                        field: "kegiatan_penurunan_low"
                    },
                    {
                        title: "Kegiatan Penurunan Med",
                        field: "kegiatan_penurunan_med"
                    },
                    {
                        title: "Penyebab Low Integrity",
                        field: "penyebab_low_integrity"
                    },
                    {
                        title: "Penambahan Aset",
                        field: "penambahan_jumlah_aset"
                    },
                    {
                        title: "Naik Turun Low Integrity",
                        field: "naik_turun_low_integrity"
                    },
                ],

            });

            fetch("{{ route('kalimantan-jawa-gas.data') }}", {
                    headers: {
                        "Accept": "application/json"
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

                fetch("{{ route('kalimantan-jawa-gas') }}", {
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
