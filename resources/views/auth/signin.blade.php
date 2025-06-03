<x-guest-layout>
        <main class="main-content mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                                <div class="card card-plain mt-6">
                                    <div class="card-header pb-0 bg-transparent text-center">
                                        <img src="{{ asset('assets/img/logo-badung.png') }}" alt="Logo Badung" style="width: 80px;" class="mb-3">
                                        <h3 class="font-weight-black text-dark display-6">Login to E-Rapat</h3>
                                        <p class="mb-0">Silahkan Login terlebih dahulu!</p>
                                    </div>
                                    <div id="alert" class="text-center mb-3">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}" class="text-start" autocomplete="on">
                                            @csrf
                                            <label for="nip">NIP</label>
                                            <div class="mb-3">
                                                <input 
                                                    type="text" 
                                                    id="nip" 
                                                    name="nip" 
                                                    class="form-control"
                                                    placeholder="Masukan Nomor Induk Pegawai"
                                                    required
                                                    maxlength="18"
                                                    pattern="[0-9]+"
                                                    inputmode="numeric"
                                                >
                                            </div>
                                            <label for="password">Password</label>
                                            <div class="mb-3">
                                                <input 
                                                    type="password" 
                                                    id="password" 
                                                    name="password"
                                                    class="form-control" 
                                                    placeholder="Masukan Password" 
                                                    required
                                                    maxlength="20"
                                                >
                                            </div>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="form-check form-check-info text-left mb-0">
                                                    <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1">
                                                    <label class="font-weight-normal text-dark mb-0" for="remember">
                                                        Remember for 14 days
                                                    </label>
                                                </div>
                                                <a href="#" class="text-xs font-weight-bold ms-auto">Forgot password</a>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Sign in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-none d-md-block">
                                <div class="position-absolute w-40 top-0 end-0 h-100">
                                    <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8"
                                        style="background-image:url('{{ asset('assets/img/sign-in.jpg') }}')">
                                        <div class="blur mt-12 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                                            <h3 class="mt-3 text-dark font-weight-bold">Selamat Datang di E-RAPAT DISKOMINFO KABUPATEN BADUNG!</h3>
                                            <h6 class="text-dark text-sm mt-4">Copyright © 2025 Tim E-Gov Kab. Badung</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
</x-guest-layout>
