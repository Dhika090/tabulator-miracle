@section('title', __('TargetStatusPLO'))
<x-layouts.app :title="__('TargetStatusPLO')">
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
            <h5 class="card-title mb-3 d-flex justify-content-between">Target Status PLO</h5>

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

                <label>Company:</label>
                <input type="text" name="company" required><br>

                <label>Uncertified:</label>
                <input type="number" name="uncertified" required><br>

                <label>EXP:</label>
                <input type="number" name="exp" required><br>

                <label>EXP &lt; 6:</label>
                <input type="number" name="exp_less_than_6" required><br>

                <label>Valid:</label>
                <input type="number" name="valid" required><br><br>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/tabulator-tables@5.6.0/dist/js/tabulator.min.js"></script>

        <script>
            const table = new Tabulator("#example-table", {
                layout: "fitColumns",
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
                        field: "periode"
                    },
                    {
                        title: "Company",
                        field: "company",
                        hozAlign: "right",
                        sorter: "string"
                    },
                    {
                        title: "Uncertified",
                        field: "uncertified",
                        hozAlign: "right",
                        sorter: "number"
                    },
                    {
                        title: "EXP",
                        field: "exp",
                        hozAlign: "right",
                        sorter: "number"
                    },
                    {
                        title: "EXP < 6",
                        field: "exp_less_than_6",
                        hozAlign: "right",
                        sorter: "number"
                    },
                    {
                        title: "Valid",
                        field: "valid",
                        hozAlign: "right",
                        sorter: "number"
                    },
                ],
            });

            fetch("{{ route('target-status-plo.data') }}", {
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

                fetch("{{ route('target-status-plo') }}", {
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
                        closeModal(); // Tutup modal setelah submit berhasil / gagal
                        this.reset(); // Reset form
                    });
            });
        </script>
    @endpush
</x-layouts.app>
