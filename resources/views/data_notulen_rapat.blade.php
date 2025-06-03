<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container-fluid py-4 px-3">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center mb-3">
                                <div>
                                    <h5 class="font-weight-semibold text-lg mb-0">Data Notulen Rapat</h5>
                                    <p class="text-sm mb-sm-0">Daftar Notulen Rapat Dinas Komunikasi dan Informatika Kabupaten Badung</p>
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
                                            <th class="text-sm text-secondary font-weight-bold ps-2">File Notulen</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Ukuran</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Diupload Oleh</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Tanggal Upload</th>
                                            <th class="text-sm text-secondary font-weight-bold text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($notulens as $index => $notulen)
                                            <tr>
                                                <td class="ps-3">{{ $index + $notulens->firstItem() }}</td>
                                                <td>
                                                    <p class="text-sm mb-0 text-wrap font-weight-bold">{{ $notulen->meeting->nama_rapat ?? '-' }}</p>
                                                </td>
                                                <td><p class="text-sm mb-0">{{ $notulen->nama_notulen }}</p></td>
                                                <td><p class="text-sm mb-0">{{ $notulen->size_notulen }}</p></td>
                                                <td><p class="text-sm mb-0">{{ $notulen->uploader->name ?? '-' }}</p></td>
                                                <td><p class="text-sm mb-0">{{ $notulen->uploaded_at}}</p></td>
                                                <td class="text-center align-middle">
                                                    <div class="d-flex justify-content-center align-items-center gap-2" style="min-height: 38px;">
                                                        <form action="{{ route('admin.notulen-rapat.destroy', $notulen->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" 
                                                                    class="text-danger fs-6 border-0 bg-transparent" 
                                                                    title="Hapus"
                                                                    onclick="return confirm('Yakin ingin menghapus notulen ini?')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-4">Tidak ada data Notulen.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="border-top py-3 px-3 d-flex align-items-center">
                                <p class="font-weight-semibold mb-0 text-dark text-sm">Page {{ $notulens->currentPage() }} of {{ $notulens->lastPage() }}</p>
                                <div class="ms-auto">
                                    @if($notulens->previousPageUrl())
                                        <a href="{{ $notulens->previousPageUrl() }}" class="btn btn-sm btn-white mb-0">Previous</a>
                                    @else
                                        <button class="btn btn-sm btn-white mb-0" disabled>Previous</button>
                                    @endif
                                    
                                    @if($notulens->nextPageUrl())
                                        <a href="{{ $notulens->nextPageUrl() }}" class="btn btn-sm btn-white mb-0">Next</a>
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
</x-app-layout>