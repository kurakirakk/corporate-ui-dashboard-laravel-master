<x-app-layout>
    <!-- Tambahkan ini di layout atau sebelum </head> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Main content section style */
        .main-content {
            display: flex;
            flex-direction: column;
            margin-left: 250px; /* Adjust depending on your sidebar width */
            transition: margin-left 0.3s ease;
        }

        .container-fluid {
            flex: 1;
            max-width: 100%;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .table {
            font-size: 0.875rem; /* Smaller font size for table */
            table-layout: fixed; /* Ensures columns are evenly distributed */
            width: 100%;
        }

        .table th, .table td {
            padding: 10px 15px; /* Adjust padding for a more compact table */
            text-align: left;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa; /* Light gray for the header */
            font-weight: bold;
        }

        .table tbody tr {
            border-bottom: 1px solid #e1e1e1; /* Light border between rows */
        }

        .modal-content {
            padding: 20px;
        }

        .modal-body p {
            font-size: 0.9rem; /* Slightly smaller text for modal */
        }

        .modal-title {
            font-size: 1.25rem; /* Slightly larger title for the modal */
        }

        /* Adjusting spacing between 'No' and 'Nama Rapat' */
        .table td, .table th {
            padding-left: 10px; /* Smaller padding on the left for tighter spacing */
        }

        /* Styling for download button */
        .btn-download-pdf {
            background-color: #fff;
            color: #007bff;
            border: 1px solid #007bff;
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            font-size: 0.875rem;
        }

        .btn-download-pdf i {
            margin-right: 5px; /* Space between the icon and text */
        }

        /* Styling for status icons */
        .status-loading {
            color: #ffc107;
        }

        .status-done {
            color: #28a745;
        }

        .status-pending {
            color: #6c757d;
        }

        /* Styling for column alignment */
        .table td:first-child, .table th:first-child {
            width: 10%; /* Make the No column smaller */
            text-align: center;
        }

        .table td:nth-child(2), .table th:nth-child(2) {
            width: 30%; /* Adjust width for 'Nama Rapat' */
        }

        .table td:nth-child(3), .table th:nth-child(3) {
            width: 20%; /* Adjust width for 'Bidang' */
        }

        .table td:nth-child(4), .table th:nth-child(4) {
            width: 20%; /* Adjust width for 'Tanggal' */
        }

        .table td:nth-child(5), .table th:nth-child(5) {
            width: 20%; /* Adjust width for 'Penyelenggara' */
        }

        .table td:last-child, .table th:last-child {
            width: 15%; /* Adjust width for 'Action' */
        }
    </style>

    <!-- Main Content Section -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />     
        <x-app.sidebar />
      
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Card for Report Data -->
                            <div class="card border shadow-xs mb-4">
                                <div class="card-header border-bottom pb-0">
                                    <div class="d-sm-flex align-items-center">
                                        <div>
                                            <h6 class="font-weight-semibold text-lg mb-0">Laporan Rapat</h6>
                                            <p class="text-sm">Daftar rapat yang terselenggara</p>
                                        </div>
                                        <div class="ms-auto d-flex">
                                            <!-- Add additional actions if needed -->
                                            <button type="button" class="btn btn-sm btn-white me-2">
                                                Lihat Semua
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Report Data Table -->
                                <div class="card-body mt-3 pt-0 p-3">
                                    <div class="table-responsive">
                                        {{-- <table class="table align-items-center table-flush"> --}}
                                            <table class="table align-middle table-bordered table-sm text-sm">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Rapat</th>
                                                    <th>Bidang</th>
                                                    <th>Tanggal</th>
                                                    <th>Penyelenggara</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Example Report Row 1 -->
                                                <tr>
                                                    <td>1</td>
                                                    <td>Rapat Evaluasi SIDUMAS</td>
                                                    <td>PIP</td>
                                                    <td>2025-04-15</td>
                                                    <td>Kepala Bidang PIP</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#reportModal1">
                                                            <i class="fas fa-eye"></i> Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- Example Report Row 2 -->
                                                <tr>
                                                    <td>2</td>
                                                    <td>Rapat E-Surat</td>
                                                    <td>Layanan E-Gov</td>
                                                    <td>2025-04-10</td>
                                                    <td>Kepala Bidang E-gov</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#reportModal2">
                                                            <i class="fas fa-eye"></i> Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Rapat Koordinasi Bulanan</td>
                                                    <td>Umum & Keuangan</td>
                                                    <td>2025-04-10</td>
                                                    <td>Kepala Bidang Umum</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#reportModal2">
                                                            <i class="fas fa-eye"></i> Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- Additional rows can be added here -->

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-app.footer />
    </main>

    <!-- Modal for Report Detail 1 -->
    <div class="modal fade" id="reportModal1" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Detail Rapat Koordinasi Bulanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(0.7);"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Rapat:</strong> Rapat Koordinasi Bulanan</p>
                    <p><strong>Tanggal:</strong> 2025-04-15</p>
                    <p><strong>Jam Mulai:</strong> 10:00 AM</p>
                    <p><strong>Jam Selesai:</strong> 12:00 PM</p>
                    <p><strong>Penyelenggara:</strong> Dinas Komunikasi</p>
                    <p><strong>Peserta:</strong> 15 orang</p>
                    <p><strong>Notulen:</strong> <a href="#" class="btn btn-download-pdf"><i class="fas fa-download"></i> Download PDF</a></p>
                    <p><strong>Status:</strong> <span class="status-done"><i class="fas fa-check-circle"></i> Selesai</span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Report Detail 2 -->
    <div class="modal fade" id="reportModal2" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Detail Rapat Evaluasi Proyek</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(0.7);"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Rapat:</strong> Rapat Evaluasi Proyek</p>
                    <p><strong>Tanggal:</strong> 2025-04-10</p>
                    <p><strong>Jam Mulai:</strong> 02:00 PM</p>
                    <p><strong>Jam Selesai:</strong> 04:00 PM</p>
                    <p><strong>Penyelenggara:</strong> Tim IT</p>
                    <p><strong>Peserta:</strong> 10 orang</p>
                    <p><strong>Notulen:</strong> <a href="#" class="btn btn-download-pdf"><i class="fas fa-download"></i> Download PDF</a></p>
                    <p><strong>Status:</strong> <span class="status-loading"><i class="fas fa-spinner fa-spin"></i> Belum Berlangsung</span></p>
                </div>
            </div>
        </div>
        
    </div>

    
        
</x-app-layout>
