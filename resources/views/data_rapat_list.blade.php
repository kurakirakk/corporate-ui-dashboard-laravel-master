<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container-fluid py-4 px-3">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center mb-3">
                                <div>
                                    <h5 class="font-weight-semibold text-lg mb-0">Data Rapat</h5>
                                    <p class="text-sm mb-sm-0">Daftar Rapat Dinas Komunikasi dan Informatika Kabupaten Badung</p>
                                </div>
                                <div class="ms-auto d-flex align-items-center">
                                    <form method="GET" action="{{ route('admin.rapat.index') }}" class="input-group input-group-sm me-2" style="width: 200px;">
                                        <span class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                                            </svg>
                                        </span>
                                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Search" value="{{ request('search') }}">
                                    </form>
                                    <a href="{{ route('admin.rapat.create') }}" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                                        <span class="btn-inner--icon me-1">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"/>
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Add Rapat</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-300">
                                        <tr>
                                            <th class="text-sm text-secondary font-weight-bold ps-3">No</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Nama Rapat</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Bidang</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Tanggal</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Pemimpin</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Penyelenggara</th>
                                            <th class="text-sm text-secondary font-weight-bold text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($meetings->count())
                                            @foreach ($meetings as $index => $rapat)
                                                <tr>
                                                    <td class="ps-3">{{ $index + $meetings->firstItem() }}</td>
                                                    <td>
                                                        <p class="text-sm mb-0 text-wrap font-weight-bold">{{ $rapat->nama_rapat }}</p>
                                                    </td>
                                                    <td><p class="text-sm mb-0">{{ $rapat->bidang_rapat }}</p></td>
                                                    <td><p class="text-sm mb-0">{{ $rapat->tanggal_rapat }}</p></td>
                                                    <td><p class="text-sm mb-0">{{ $rapat->pemimpin_rapat }}</p></td>
                                                    <td><p class="text-sm mb-0">{{ $rapat->pengelola_rapat }}</p></td>
                                                    <td class="text-center align-middle">
                                                        <div class="d-flex justify-content-center align-items-center gap-2" style="min-height: 38px;">
                                                            <a href="{{ route('admin.rapat.edit', $rapat->id) }}" class="text-secondary fs-6" title="Edit">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="#" class="text-secondary fs-6" title="Upload Notulen" data-bs-toggle="modal" data-bs-target="#uploadFileNotulenRapat{{ $rapat->id }}">
                                                                <i class="fas fa-upload"></i>
                                                            </a>
                                                            <a href="#" class="text-secondary fs-6" title="Lihat" data-bs-toggle="modal" data-bs-target="#modalDetailRapat{{ $rapat->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <form id="delete-form-{{ $rapat->id }}" action="{{ route('admin.rapat.destroy', $rapat->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <a href="#" 
                                                               class="text-danger fs-6" 
                                                               title="Hapus" 
                                                               onclick="if(confirm('Yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $rapat->id }}').submit(); } return false;">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail Rapat -->
                                                <div class="modal fade" id="modalDetailRapat{{ $rapat->id }}" tabindex="-1" aria-labelledby="modalDetailRapatLabel{{ $rapat->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalDetailRapatLabel{{ $rapat->id }}">Detail Rapat</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(0.7);"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><strong>Nama Rapat:</strong> {{ $rapat->nama_rapat }}</p>
                                                                <p><strong>Tanggal:</strong> {{ $rapat->tanggal_rapat }}</p>
                                                                <p><strong>Jam Mulai:</strong> {{ \Carbon\Carbon::parse($rapat->waktu_mulai)->format('H:i') }} WITA</p>
                                                                <p><strong>Jam Selesai:</strong> {{ \Carbon\Carbon::parse($rapat->waktu_selesai)->format('H:i') }} WITA</p>
                                                                <p><strong>Pemimpin Rapat:</strong> {{ $rapat->pemimpin_rapat }}</p>
                                                                <p><strong>Penyelenggara:</strong> {{ $rapat->pengelola_rapat }}</p>
                                                                <p><strong>Ruangan Rapat:</strong> {{ $rapat->ruangan_rapat }}</p>
                                                                <p><strong>Peserta:</strong> {{ $rapat->jumlah_peserta ?? '-' }} orang</p>
                                                                <p><strong>Notulen:</strong>
                                                                    <a href="{{ route('admin.rapat.notulen.download', $rapat->id) }}" 
                                                                    class="btn btn-outline-danger btn-sm">
                                                                    <i class="fas fa-download me-1"></i> Download Notulen
                                                                    </a>
                                                                </p>
                                                                <p><strong>Status:</strong> 
                                                                    @if ($rapat->status == 'berlangsung')
                                                                        <span class="text-success"><i class="fas fa-check-circle"></i> Sedang Berlangsung</span>
                                                                    @elseif ($rapat->status == 'selesai')
                                                                        <span class="text-primary"><i class="fas fa-check-circle"></i> Sudah Selesai</span>
                                                                    @else
                                                                        <span class="text-warning"><i class="fas fa-spinner fa-spin"></i> Belum Berlangsung</span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Upload File Notulen -->
                                                <div class="modal fade" id="uploadFileNotulenRapat{{ $rapat->id }}" tabindex="-1" aria-labelledby="uploadFileNotulenRapatLabel{{ $rapat->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="uploadFileNotulenRapatLabel{{ $rapat->id }}">Upload Notulen: {{ $rapat->nama_rapat }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="form-upload-notulen-{{ $rapat->id }}" 
                                                                    action="{{ route('admin.rapat.notulen.upload', $rapat->id) }}" 
                                                                    method="POST" 
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label for="file_notulen_{{ $rapat->id }}" class="form-label">Pilih File Notulen (PDF saja, maks. 5MB)</label>
                                                                        <input type="file" 
                                                                            name="file" 
                                                                            class="form-control @error('file') is-invalid @enderror" 
                                                                            id="file_notulen_{{ $rapat->id }}" 
                                                                            accept=".pdf" 
                                                                            required>
                                                                        @error('file')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="d-flex justify-content-end gap-2">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            <i class="fas fa-upload me-1"></i> Upload
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center py-4">Tidak ada data rapat.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="border-top py-3 px-3 d-flex align-items-center">
                                <p class="font-weight-semibold mb-0 text-dark text-sm">Page {{ $meetings->currentPage() }} of {{ $meetings->lastPage() }}</p>
                                <div class="ms-auto">
                                    @if($meetings->previousPageUrl())
                                    <a href="{{ $meetings->previousPageUrl() }}" class="btn btn-sm btn-white mb-0">Previous</a>
                                    @else
                                    <button class="btn btn-sm btn-white mb-0" disabled>Previous</button>
                                    @endif
                                    
                                    @if($meetings->nextPageUrl())
                                    <a href="{{ $meetings->nextPageUrl() }}" class="btn btn-sm btn-white mb-0">Next</a>
                                    @else
                                    <button class="btn btn-sm btn-white mb-0" disabled>Next</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    // Handle success/error messages from server
    @if(session('success'))
        showAlert('success', '{{ session('success') }}');
    @endif
    
    @if(session('error'))
        showAlert('danger', '{{ session('error') }}');
    @endif

    function showAlert(type, message) {
        const alertBox = document.createElement('div');
        alertBox.className = `alert alert-${type} alert-dismissible fade show mt-3`;
        alertBox.role = 'alert';
        alertBox.innerHTML = `${message} <button type="button" class="btn-close" data-bs-dismiss="alert"></button>`;
        
        document.querySelector('.container-fluid').prepend(alertBox);
    }

    // Optional: File size validation before upload
    @foreach ($meetings as $rapat)
        document.getElementById('file_notulen_{{ $rapat->id }}').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const maxSize = 5 * 1024 * 1024; // 5MB
            
            if (file && file.size > maxSize) {
                alert('Ukuran file terlalu besar. Maksimal 5MB.');
                e.target.value = '';
            }
        });
    @endforeach
    });
    </script>
</x-app-layout>
