<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Inventaris Desa Condongcatur</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('gambar_aset/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gambar_aset/assets/vendor/fonts/boxicons.css') }}" />


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/coba" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('gambar_aset/images/logo.png') }}" alt="">
                <span class="fw-bolder " style="margin-left: 10px; font-size: 18px; font-weight: 300">Desa Condongcatur</span>
            </a>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('layouts/header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts/sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Inventaris</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row page-titles mx-0">
                    <div class="col-sm-12 p-md-0">
                        <div class="welcome-text">
                        @foreach( $data as $row)
                            <h4>Detail Data {{ $row->nama_aset }}</h4>
                            <br>
                            <div>
                                <table style="font-size: large; color: #1b1b1b;">
                                    <tr height="25px">
                                        <td class="A" style="width: 300px;">Id Aset</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 200px">{{ $row->id_aset }}</td>
                                        <td rowspan="9" width="500px"><img style="margin-left: 100px; width: 220px; border-radius: 10px" src="{{ asset('gambar_aset/'.$row->gambar) }}" alt=""></td>
                                    </tr>
                                    <tr height="25px">
                                        <td class="A" style="width: 300px;">Nama Aset</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 200px">{{ $row->nama_aset }}</td>
                                        
                                    </tr>
                                    <tr height="25px">
                                        <td class="A" style="width: 300px;">Kategori</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 200px">{{ $row->kategori }}</td>
                                        
                                    </tr>
                                    <tr height="25px">
                                        <td class="A" style="width: 300px;">Kondisi</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 200px">{{ $row->kondisi }}</td>
                                        
                                    </tr>
                                    <tr height="25px">
                                        <td class="A" style="width: 300px;">Status</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 200px">{{ $row->status }}</td>
                                        
                                    </tr>
                                    <tr height="25px">
                                        <td class="A" style="width: 300px;">Lokasi</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 200px">{{ $row->lokasi }}</td>
                                        
                                    </tr>
                                    <tr height="25px">
                                        <td class="A" style="width: 300px;">Nilai</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 200px">Rp. {{ number_format($row->nilai, 0, ',', '.') }},00</td>
                                        
                                    </tr>
                                    <tr height="25px">
                                        <td class="A" style="width: 300px;">Tahun Perolehan</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 200px">{{ $row->tahun_perolehan }}</td>
                                        
                                    </tr>
                                    <tr height="25px">
                                        <td class="A" style="width: 300px;">Deskripsi</td>
                                        <td style="width: 20px">:</td>
                                        <td style="width: 200px">{{ $row->deskripsi }}</td>
                                        
                                    </tr>
                                </table>
                                <a href="/back" class="btn btn-outline-primary btn-lg" style="margin-top: 20px;">Kembali</a>
                                <a href="{{ route('layouts.tampil', $row->nama_aset) }}" class="btn btn-primary btn-lg" style="margin-top: 20px;">Edit</a>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('gambar_aset/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('gambar_aset/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('gambar_aset/js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('gambar_aset/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('gambar_aset/vendor/morris/morris.min.js') }}"></script>


    <script src="{{ asset('gambar_aset/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('gambar_aset/vendor/chart.js') }}/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('gambar_aset/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('gambar_aset/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('gambar_aset/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('gambar_aset/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('gambar_aset/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('gambar_aset/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('gambar_aset/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


    <script src="{{ asset('gambar_aset/js/dashboard/dashboard-1.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('gambar_aset/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('gambar_aset/js/plugins-init/datatables.init.js') }}"></script>

    <!-- baru -->
    <script src="{{ asset('gambar_aset/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('gambar_aset/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('gambar_aset/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('gambar_aset/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('gambar_aset/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('gambar_aset/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('gambar_aset/assets/js/main.js') }}"></script>

</body>

</html>