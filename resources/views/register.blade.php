<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Daftar | Inventaris Aset - Sendangmulyo</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/favicon.png') }}">
    <link href="{{ asset('gambar_aset/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h2 class="text-center mb-4">Daftar Akun Pengelola</h2>
                                    <form action="/registeruser" method="POST"  enctype="multipart/form-data">
                                      @csrf
                                        <div class="form-group">
                                            <label><strong>User Name</strong></label>
                                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama..">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" placeholder="Masukkan email..">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" placeholder="Masukkan password..">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Sudah memiliki akun? <a class="text-primary" href="/login">Masuk</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('gambar_aset/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('gambar_aset/js/quixnav-init.js') }}"></script>
    <!--endRemoveIf(production)-->
</body>

</html>