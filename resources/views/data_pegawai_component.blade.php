<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-3">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-md mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center mb-3">
                                <div>
                                    <h5 class="font-weight-semibold text-lg mb-0">
                                        {{ $mode == 'edit' ? 'Edit Data Pegawai' : 'Tambah Data Pegawai' }}
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-4 py-4">
                            
                            <form 
                                action="{{ $mode == 'edit' ? route('admin.pegawai.update', $pegawai->id) : route('admin.pegawai.store') }}" 
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
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip"
                                            value="{{ old('nip', $pegawai->nip ?? '') }}"
                                            placeholder="Masukkan NIP" maxlength="18" pattern="^[0-9]+$"
                                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            style="{{ $inputStyle }}" required>
                                        @error('nip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="nama_pegawai" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama_pegawai" name="nama_pegawai"
                                            value="{{ old('nama_pegawai', $pegawai->nama_pegawai ?? '') }}"
                                            placeholder="Masukkan Nama Lengkap Pegawai" maxlength="100"
                                            style="{{ $inputStyle }}" required>
                                        @error('nama_pegawai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                            value="{{ old('email', $pegawai->email ?? '') }}"
                                            placeholder="Masukkan Email" style="{{ $inputStyle }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="jabatan_pegawai" class="form-label">Jabatan Pegawai</label>
                                        <input type="text" class="form-control @error('jabatan_pegawai') is-invalid @enderror" id="jabatan_pegawai" name="jabatan_pegawai"
                                            value="{{ old('jabatan_pegawai', $pegawai->jabatan_pegawai ?? '') }}"
                                            placeholder="Masukkan Jabatan Pegawai" maxlength="50"
                                            style="{{ $inputStyle }}" required>
                                        @error('jabatan_pegawai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="bidang_pegawai" class="form-label">Bidang Pegawai</label>
                                        <input type="text" class="form-control @error('bidang_pegawai') is-invalid @enderror" id="bidang_pegawai" name="bidang_pegawai"
                                            value="{{ old('bidang_pegawai', $pegawai->bidang_pegawai ?? '') }}"
                                            placeholder="Masukkan Bidang Pegawai" maxlength="100"
                                            style="{{ $inputStyle }}" required>
                                        @error('bidang_pegawai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="no_telp_pegawai" class="form-label">No. Telp Pegawai</label>
                                        <input type="text" class="form-control @error('no_telp_pegawai') is-invalid @enderror" id="no_telp_pegawai" name="no_telp_pegawai"
                                            value="{{ old('no_telp_pegawai', $pegawai->no_telp_pegawai ?? '') }}"
                                            placeholder="Contoh: 08123456789" maxlength="13" minlength="10"
                                            pattern="^08[0-9]+$" inputmode="numeric"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            style="{{ $inputStyle }}" required>
                                        @error('no_telp_pegawai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if($mode == 'create')
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                                placeholder="Masukkan Password"
                                                style="{{ $inputStyle }}" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                                placeholder="Ulangi Password"
                                                style="{{ $inputStyle }}" required>
                                        </div>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary me-2">Batal</a>
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
        <!-- Modal Sukses -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-success">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="successModalLabel">Berhasil</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p id="successMessage">{{ session('success') }}</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal Error -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-danger">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="errorModalLabel">Gagal</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p id="errorMessage">{{ session('error') }}</p>
      </div>
    </div>
  </div>
</div>

        <x-app.footer />
    </main>
    
</x-app-layout>
@if (session('success'))
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        });
    </script>
@endif

@if (session('error'))
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        });
    </script>
@endif

