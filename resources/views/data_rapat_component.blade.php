<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container-fluid py-4 px-3">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-md mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center mb-3">
                                <div>
                                    <h5 class="font-weight-semibold text-lg mb-0">
                                        {{ $mode == 'edit' ? 'Edit Data Rapat' : 'Tambah Data Rapat' }}
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-4 py-4">
                            <form 
                                action="{{ $mode == 'edit' ? route('admin.rapat.update', $meeting->id) : route('admin.rapat.store') }}" 
                                method="POST">
                                @csrf
                                @if($mode == 'edit')
                                    @method('PUT')
                                @endif

                                @php
                                    $inputStyle = 'line-height: 1.5; padding-top: 0.6rem; padding-bottom: 0.6rem; height: auto;';
                                @endphp

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama_rapat" class="form-label">Nama Rapat</label>
                                        <input type="text" class="form-control @error('nama_rapat') is-invalid @enderror" id="nama_rapat" name="nama_rapat"
                                            value="{{ old('nama_rapat', $meeting->nama_rapat ?? '') }}"
                                            placeholder="Masukkan Nama Rapat" maxlength="100"
                                            style="{{ $inputStyle }}" required>
                                        @error('nama_rapat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="bidang_rapat" class="form-label">Bidang Rapat</label>
                                        <input type="text" class="form-control @error('bidang_rapat') is-invalid @enderror" id="bidang_rapat" name="bidang_rapat"
                                            value="{{ old('bidang_rapat', $meeting->bidang_rapat ?? '') }}"
                                            placeholder="Masukkan Bidang Rapat" maxlength="100"
                                            style="{{ $inputStyle }}" required>
                                        @error('bidang_rapat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_rapat" class="form-label">Tanggal Rapat</label>
                                        <input type="date" class="form-control @error('tanggal_rapat') is-invalid @enderror" id="tanggal_rapat" name="tanggal_rapat"
                                            value="{{ old('tanggal_rapat', $meeting->tanggal_rapat ?? '') }}"
                                            style="{{ $inputStyle }}" required>
                                        @error('tanggal_rapat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="pemimpin_rapat" class="form-label">Pemimpin Rapat</label>
                                        <input type="text" class="form-control @error('pemimpin_rapat') is-invalid @enderror" id="pemimpin_rapat" name="pemimpin_rapat"
                                            value="{{ old('pemimpin_rapat', $meeting->pemimpin_rapat ?? '') }}"
                                            placeholder="Masukkan Nama Pemimpin Rapat" maxlength="100"
                                            style="{{ $inputStyle }}" required>
                                        @error('pemimpin_rapat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                        <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" id="waktu_mulai" name="waktu_mulai"
                                            value="{{ old('waktu_mulai', $meeting->waktu_mulai ?? '') }}"
                                            style="{{ $inputStyle }}" required>
                                        @error('waktu_mulai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                                        <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" id="waktu_selesai" name="waktu_selesai"
                                            value="{{ old('waktu_selesai', $meeting->waktu_selesai ?? '') }}"
                                            style="{{ $inputStyle }}" required>
                                        @error('waktu_selesai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="ruangan_rapat" class="form-label">Ruangan Rapat</label>
                                        <input type="text" class="form-control @error('ruangan_rapat') is-invalid @enderror" id="ruangan_rapat" name="ruangan_rapat"
                                            value="{{ old('ruangan_rapat', $meeting->ruangan_rapat ?? '') }}"
                                            placeholder="Masukkan Ruangan Rapat" maxlength="100"
                                            style="{{ $inputStyle }}" required>
                                        @error('ruangan_rapat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="pengelola_rapat" class="form-label">Pengelola Rapat</label>
                                        <input type="text" class="form-control @error('pengelola_rapat') is-invalid @enderror" id="pengelola_rapat" name="pengelola_rapat"
                                            value="{{ old('pengelola_rapat', $meeting->pengelola_rapat ?? '') }}"
                                            placeholder="Masukkan Nama Pengelola" maxlength="100"
                                            style="{{ $inputStyle }}" required>
                                        @error('pengelola_rapat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                                        <input type="number" min="1" class="form-control @error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" name="jumlah_peserta"
                                            value="{{ old('jumlah_peserta', $meeting->jumlah_peserta ?? '') }}"
                                            placeholder="Masukkan Jumlah Peserta"
                                            style="{{ $inputStyle }}" required>
                                        @error('jumlah_peserta')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="deskripsi_rapat" class="form-label">Deskripsi Rapat</label>
                                        <textarea class="form-control @error('deskripsi_rapat') is-invalid @enderror" id="deskripsi_rapat" name="deskripsi_rapat"
                                            placeholder="Masukkan Deskripsi Rapat" rows="4"
                                            style="{{ $inputStyle }}" required>{{ old('deskripsi_rapat', $meeting->deskripsi_rapat ?? '') }}</textarea>
                                        @error('deskripsi_rapat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('admin.rapat.index') }}" class="btn btn-secondary me-2">Batal</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ $mode == 'edit' ? 'Update' : 'Simpan' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-app.footer />
    </main>
</x-app-layout>
