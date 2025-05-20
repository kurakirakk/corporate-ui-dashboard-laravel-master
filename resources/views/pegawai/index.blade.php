<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />

        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0 d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Data Pegawai</h6>
                                <p class="text-sm">Daftar PNS Dinas Komunikasi dan Informatika Kabupaten Badung</p>
                            </div>
                            <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-dark btn-icon d-flex align-items-center">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="me-2">
                                    <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"/>
                                </svg>
                                Tambah Pegawai
                            </a>
                        </div>

                        <div class="card-body px-3 py-3">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jabatan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pegawai as $p)
                                            <tr>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->nip }}</td>
                                                <td>{{ $p->jabatan }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="4" class="text-center">Tidak ada data pegawai.</td></tr>
                                        @endforelse
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
