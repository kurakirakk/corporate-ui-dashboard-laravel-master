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
                                    <h5 class="font-weight-semibold text-lg mb-0">Data Pegawai</h5>
                                    <p class="text-sm mb-sm-0">Daftar PNS Dinas Komunikasi dan Informatika Kabupaten Badung</p>
                                </div>
                                <div class="ms-auto d-flex align-items-center">
                                    <form method="GET" action="{{ route('admin.pegawai.index') }}" class="input-group input-group-sm me-2" style="width: 200px;">
                                        <span class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                                </path>
                                            </svg>
                                        </span>
                                        <input type="text" name="search" class="form-control form-control-sm"
                                            placeholder="Search" value="{{ request('search') }}">
                                    </form>
                                    <a href="{{ route('admin.pegawai.create') }}" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                                            <span class="btn-inner--icon me-1">
                                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                                </svg>
                                            </span>
                                        <span class="btn-inner--text">Add Pegawai</span>
                                    </a>
                                 </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-300">
                                        <tr>
                                            <th class="text-sm text-secondary font-weight-bold ps-3">No.</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Nama Pegawai</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">NIP</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Jabatan Pegawai</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">Bidang Pegawai</th>
                                            <th class="text-sm text-secondary font-weight-bold ps-2">No Telepon</th>
                                            <th class="text-sm text-secondary font-weight-bold text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if ($pegawai->count() > 0)
                                        @foreach ($pegawai as $index => $p)
                                        <tr>
                                            <td class="ps-3">
                                                <p class="text-sm mb-0" style="text-indent: 5px;">{{ $index + $pegawai->firstItem() }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm mb-0 text-wrap font-weight-bold">{{ $p->nama_pegawai }}</p>
                                            </td>
                                            <td><p class="text-sm mb-0">{{ $p->nip }}</p></td>
                                            <td><p class="text-sm mb-0">{{ $p->jabatan_pegawai }}</p></td>
                                            <td><p class="text-sm mb-0">{{ $p->bidang_pegawai }}</p></td>
                                            <td><p class="text-sm mb-0">{{ $p->no_telp_pegawai }}</p></td>
                                           <td class="text-center align-middle">
                                                <div class="d-flex justify-content-center align-items-center gap-2" style="min-height: 38px;">
                                                    <a href="{{ route('admin.pegawai.edit', $p->id) }}" class="text-secondary fs-6" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.pegawai.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-danger fs-6" title="Hapus" style="background: none; border: none;">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <p class="text-sm text-muted mb-0">Tidak ada data Pegawai.</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                                </table>
                            </div>
                            <div class="border-top py-3 px-3 d-flex align-items-center">
                                <p class="font-weight-semibold mb-0 text-dark text-sm">Page {{ $pegawai->currentPage() }} of {{ $pegawai->lastPage() }}</p>
                                <div class="ms-auto">
                                    @if($pegawai->previousPageUrl())
                                    <a href="{{ $pegawai->previousPageUrl() }}" class="btn btn-sm btn-white mb-0">Previous</a>
                                    @else
                                    <button class="btn btn-sm btn-white mb-0" disabled>Previous</button>
                                    @endif
                                    
                                    @if($pegawai->nextPageUrl())
                                    <a href="{{ $pegawai->nextPageUrl() }}" class="btn btn-sm btn-white mb-0">Next</a>
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
