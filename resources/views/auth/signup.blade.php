
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        E-Rapat
    </title>
    <!--     Fonts and icons     -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700"
        rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/corporate-ui-dashboard.css?v=1.0.0" rel="stylesheet" />
</head>

<body class="">

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav
   
            </li>
            </ul>
        </div>
    </div>
</nav>
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="position-absolute w-40 top-0 start-0 h-100 d-md-block d-none">
                                <div class="oblique-image position-absolute d-flex fixed-top ms-auto h-100 z-index-0 bg-cover me-n8"
                                    style="background-image:url('../assets/img/sign-in.jpg')">
                                    <div class="my-auto text-start max-width-350 ms-7">
                                        <h1 class="mt-3 text-white font-weight-bolder">Selamat Datang Di Sistem<br>  E-Rapat</h1>
                                        <p class="text-white text-lg mt-4 mb-4">Sistem ini baru di buat dan masih memiliki beberapa kendala/bug</p>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-group d-flex">

                                            </div>
                                            <p class="font-weight-bold text-white text-sm mb-0 ms-2">Gunakan Username atau password
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-start position-absolute fixed-bottom ms-7">
                                        <h6 class="text-white text-sm mb-5">Copyright ©  2025 Tim E-Gov Kab. Badung
                                           </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-black text-dark display-6">Daftar</h3>
                                    <p class="mb-0">Gunakan Username atau password</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="sign-up">
                                        <input type="hidden" name="_token" value="TB8FF1NKYJm34JVFM6rJk19ybFoaV4pqiJB7l7pU" autocomplete="off">                                        <label>Name</label>
                                        <div class="mb-3">
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="Enter your name" value="" aria-label="Name"
                                                aria-describedby="name-addon">
                                                                                    </div>
                                        <label>Email Address</label>
                                        <div class="mb-3">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="Enter your email address" value="" aria-label="Email"
                                                aria-describedby="email-addon">
                                                                                    </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Create a password" aria-label="Password"
                                                aria-describedby="password-addon">
                                                                                    </div>
                                        <div class="form-check form-check-info text-left mb-0">
                                            <input class="form-check-input" type="checkbox" name="terms"
                                                id="terms" required>
                                            <label class="font-weight-normal text-dark mb-0" for="terms">
                                                I agree the <a href="javascript:;"
                                                    class="text-dark font-weight-bold">Terms and Conditions</a>.
                                            </label>
                                                                                    </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Sign up</button>

                                            </button>
                                        </div>
                                    </form>
                                </div>
                               
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    <script src="../assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
</body>

</html>
