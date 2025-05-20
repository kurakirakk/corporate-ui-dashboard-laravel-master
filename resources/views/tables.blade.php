<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />

        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Data Pegawai</h6>
                                    <p class="text-sm">Daftar PNS Dinas Komunikasi dan Informatika Kabupaten Badung</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--icon">
                                            <!-- SVG Tambah Icon -->
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Tambah Pegawai</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 py-0">
                            <div class="border-bottom py-3 px-3 d-sm-flex align-items-center justify-content-between">
                                <!-- FILTER -->
                                <div class="d-flex align-items-center gap-2">
                                    <label for="filterBidang" class="mb-0 me-2 text-sm">Filter Bidang:</label>
                                    <select id="filterBidang" class="form-select form-select-sm" style="width: auto;">
                                        <option value="all">Semua</option>
                                        <option value="TI">TI</option>
                                        <option value="Umum">Umum</option>
                                        <option value="Kepegawaian">Kepegawaian</option>
                                    </select>
                                </div>

                                <!-- SEARCH -->
                                <div class="input-group w-sm-25">
                                    <span class="input-group-text text-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </div>

                            <div class="table-responsive p-3">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Pegawai</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Bidang</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Employed</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Contoh data dummy, ganti dengan loop dari controller --}}
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <img src="/assets/img/team-2.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user1">
                                                    <div class="d-flex flex-column justify-content-center ms-1">
                                                        <h6 class="mb-0 text-sm font-weight-semibold">Intan Septia</h6>
                                                        <p class="text-sm text-secondary mb-0">intan123@egov.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-dark font-weight-semibold mb-0">Layanan E-Gov</p>
                                                <p class="text-sm text-secondary mb-0">Ahli Pranata Muda</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm border border-success text-success bg-success">Online</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">23/04/18</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Tambahkan lebih banyak data di sini -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- card -->
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
