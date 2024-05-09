<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Inventaris Desa Condongcatur</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/favicon.png') }}">
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
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
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
                            <p class="mb-1">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Inventaris</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Tambah Data</h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <form action="/edit/{{ $data->nama_aset }}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Id Aset</label>
                          <div class="col-sm-10">
                            <input type="text" name="id_aset" value="{{$data->id_aset}}" class="form-control" id="basic-default-name" placeholder="Masukkan id aset.." readonly/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Aset</label>
                          <div class="col-sm-10">
                            <input type="text" name="nama_aset" class="form-control" value="{{$data->nama_aset}}" id="basic-default-name" placeholder="Masukkan nama aset.." />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="defaultSelect" class="col-sm-2 col-form-label">Kategori</label>
                          <div class="col-sm-4">
                            <select id="defaultSelect" name="kategori" class="form-control">
                                <option value="">Pilih kategori..</option>
                                <option value="Alat Kantor" {{ $data->kategori === 'Alat Kantor' ? 'selected' : '' }}>Alat Kantor</option>
                                <option value="Perlengkapan Kantor" {{ $data->kategori === 'Perlengkapan Kantor' ? 'selected' : '' }}>Perlengkapan Kantor</option>
                                <option value="Kendaraan" {{ $data->kategori === 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                                <option value="Tanah" {{ $data->kategori === 'Tanah' ? 'selected' : '' }}>Tanah</option>
                                <option value="Bangunan" {{ $data->kategori === 'Bangunan' ? 'selected' : '' }}>Bangunan</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3" style="margin-bottom: 10px;">
                          <label for="html5-date-input" class="col-sm-2 col-form-label" style="margin-right: 20px;">Kondisi</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kondisi" id="Baik" value="Baik" {{ $data->kondisi === 'Baik' ? 'checked' : '' }}/>
                            <label class="form-check-label" style="margin-right: 20px;" for="inlineRadio1">Baik</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kondisi" id="Butuh Perbaikan" value="Butuh Perbaikan" {{ $data->kondisi === 'Butuh Perbaikan' ? 'checked' : '' }}/>
                            <label class="form-check-label" style="margin-right: 20px;" for="inlineRadio2">Butuh Perbaikan</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kondisi" id="Rusak Total" value="Rusak Total" {{ $data->kondisi === 'Rusak Total' ? 'checked' : '' }}/>
                            <label class="form-check-label" style="margin-right: 20px;" for="inlineRadio2">Rusak Total</label>
                          </div>
                        </div>
                        <div class="row mb-3" style="margin-bottom: 10px;">
                          <label for="html5-date-input" class="col-sm-2 col-form-label" style="margin-right: 20px;">Status</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Ada" value="Ada" {{ $data->status === 'Ada' ? 'checked' : '' }}/>
                            <label class="form-check-label" style="margin-right: 21px;" for="inlineRadio1" >Ada</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Dipinjam" value="Dipinjam" {{ $data->status === 'Dipinjam' ? 'checked' : '' }}/>
                            <label class="form-check-label" style="margin-right: 67px;" for="inlineRadio2" >Dipinjam</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="Hilang" value="Hilang" {{ $data->status === 'Hilang' ? 'checked' : '' }}/>
                            <label class="form-check-label" style="margin-right: 20px;" for="inlineRadio2" >Hilang</label>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Lokasi</label>
                          <div class="col-sm-10">
                            <input type="text" name="lokasi" value="{{$data->lokasi}}" class="form-control" id="basic-default-name" placeholder="Masukkan lokasi aset.." />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Nilai</label>
                          <div class="col-sm-4">
                            <input type="text" name="nilai" value="{{$data->nilai}}" class="form-control" id="basic-default-name" placeholder="Masukkan nilai aset.." />
                          </div>
                          <label for="html5-number-input" class="col-md-2 col-form-label">Tahun</label>
                          <div class="col-md-4">
                            <input class="form-control" name="tahun_perolehan" value="{{$data->tahun_perolehan}}" type="number" value="" id="html5-number-input" min="1990" max="2100" placeholder="Masukkan tahun perolehan aset.."/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Deskripsi</label>
                          <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control" value="" rows="3" id="comment" placeholder="Masukkan deskripsi aset.. (opt)">{{$data->deskripsi}}</textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Foto</label>
                          <div class="col-sm-4">
                            <input class="form-control" type="file" name="gambar" id="gambar" style="height: 40px;"/>
                            <p><code>*</code>Wajib memasukkan ulang foto aset</p>
                          </div>
                            <img style="border: 2px solid #dddd; border-radius: 8px; margin-left: 20px" src="{{ asset('gambar_aset/'.$data->gambar) }}" alt="foto Saat Ini" width="150">
                            <input type="hidden" name="gambar_saat_ini" value="{{ $data->gambar }}">
                        </div>                          
                        
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
        <!--**********************************
            Content body end
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

</body>

</html>