<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <x-app.sidebar />

        <div class="container py-4 px-5">
            <h4>Edit Pegawai - {{ $pegawai->nama }}</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" 
                           value="{{ old('nama', $pegawai->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" name="nip" 
                           value="{{ old('nip', $pegawai->nip) }}" required>
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" 
                           value="{{ old('jabatan', $pegawai->jabatan) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </main>
</x-app-layout>