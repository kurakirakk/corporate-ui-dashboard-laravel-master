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

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
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
                                            <h6 class="font-weight-semibold text-lg mb-0">Daftar Rapat</h6>
                                            <p class="text-sm">Daftar rapat yang terselenggara</p>
                                        </div>
                                        <div class="ms-auto  d-flex">
                                            <a href="meeting" class="btn btn-success btn-sm d-inline-flex align-items-center">
                                                <i class="fas fa-video me-1"></i> New Meeting
                                            </a>
                                            <!-- Dropdown Filter by Bidang -->
                                        <div class="dropdown ms-3 me-2">
                                            <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="dropdownBidang" data-bs-toggle="dropdown" aria-expanded="false">
                                                Filter Bidang
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownBidang">
                                                <li><a class="dropdown-item" href="#" onclick="filterBidang('Semua')">Semua Bidang</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="filterBidang('PIP')">PIP</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="filterBidang('Layanan E-Gov')">Layanan E-Gov</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="filterBidang('Umum & Keuangan')">Umum & Keuangan</a></li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <!-- Report Data Table -->
                                <div class="card-body pt-0 mt-3 p-3">
                                    <div class="table-responsive">
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
                                                        <!-- Lihat, Kelola, and Hapus Buttons with Icons -->
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal1">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal1">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal1">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- Example Report Row 2 -->
                                                <tr>
                                                    <td>2</td>
                                                    <td>Rapat E-Surat</td>
                                                    <td>Layanan E-Gov</td>
                                                    <td>2025-04-10</td>
                                                    <td>Kepala Bidang E-Gov</td>
                                                    <td>
                                                        <!-- Lihat, Kelola, and Hapus Buttons with Icons -->
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal2">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal2">
                                                            <i class="fas fa-trash"></i>
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
                                                        <!-- Lihat, Kelola, and Hapus Buttons with Icons -->
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal3">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal3">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal3">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
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

    <!-- Modal for Detail Report 1 -->
    <div class="modal fade" id="detailModal1" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Rapat Evaluasi SIDUMAS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(0.7);"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Bidang:</strong> PIP</p>
                    <p><strong>Tanggal:</strong> 2025-04-15</p>
                    <p><strong>Penyelenggara:</strong> Kepala Bidang PIP</p>
                    <p><strong>Deskripsi:</strong> Rapat untuk evaluasi sistem SIDUMAS dan perencanaan ke depan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Edit Report 1 -->
    <div class="modal fade" id="editModal1" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Rapat Evaluasi SIDUMAS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(0.7);"></button>
                </div>
                <div class="modal-body">
                    <p>Edit form content here...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Delete Report 1 -->
    <div class="modal fade" id="deleteModal1" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Rapat Evaluasi SIDUMAS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(0.7);"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this meeting?</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Add more modals for other edit, detail, and delete actions here -->
</x-app-layout>
