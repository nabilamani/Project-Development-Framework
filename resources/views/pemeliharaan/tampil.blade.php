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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Pemeliharaan</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah+</a></li>
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
                      <form action="/insertpem" method="POST" enctype="multipart/form-data" id="pemeliharaan">
                      @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Id Pemeliharaan</label>
                          <div class="col-sm-10">
                            <input type="text" name="id_pemeliharaan" value="{{ $data->id_pemeliharaan }}" class="form-control" id="basic-default-name" placeholder="Masukkan id pemeliharaan.." readonly />
                          </div>
                        </div>
                        <!-- <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Id Aset</label>
                          <div class="col-sm-10">
                            <input type="text" name="id_aset" class="form-control" id="basic-default-name" placeholder="Masukkan id pemeliharaan.." />
                          </div>
                        </div> -->
                        <div class="row mb-3">
                          <label for="defaultSelect" class="col-sm-2 col-form-label">Nama Aset</label>
                          <div class="col-sm-4">
                            <select id="nama_aset" name="id_aset" class="form-control">
                              <option value="">Pilih Aset</option>
                            @foreach($asets as $aset)
                                <option value="{{ $aset->id_aset }}" {{ $data->id_aset === $aset->id_aset ? 'selected' : '' }}>{{ $aset->nama_aset }}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Biaya Pemeliharaan</label>
                          <div class="col-sm-10">
                            <input type="text" name="biaya_pemeliharaan" value="{{ $data->biaya_pemeliharaan }}" class="form-control" id="biaya_pemeliharaan" placeholder="Masukkan biaya pemeliharaan.." />
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Pemeliharaan</label>
                          <div class="col-md-10">
                            <input class="form-control" name="tanggal_pemeliharaan" value="{{ $data->tanggal_pemeliharaan }}" type="date" id="html5-date-input" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Keterangan</label>
                          <div class="col-sm-10">
                            <textarea name="keterangan" class="form-control" rows="3" id="comment" placeholder="Masukkan keterangan rincian pemeliharaan..">{{ $data->keterangan }}</textarea>
                          </div>
                        </div>
          
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" onclick="return confirmSubmit()">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <script>
      // Menambahkan event listener untuk mendapatkan harga berdasarkan nama aset yang dipilih
      document.getElementById('nama_aset').addEventListener('change', function() {
          var select = document.getElementById('nama_aset');
          var hargaInput = document.getElementById('biaya_perolehan');
          var selectedOption = select.options[select.selectedIndex];
          
          // Memuat harga aset dari data yang disimpan di dalam atribut data-harga pada option select
          hargaInput.value = selectedOption.getAttribute('data-biaya');
      });
    </script>

    <script>
    // Mendapatkan referensi ke elemen input
      var input1 = document.getElementById('biaya_perolehan');
      var input2 = document.getElementById('residu');
      var input3 = document.getElementById('umur');
      var resultInput = document.getElementById('biaya_perolehanDep');

      // Mendengarkan peristiwa input pada kedua input
      input1.addEventListener('input', calculate);
      input2.addEventListener('input', calculate);
      input3.addEventListener('input', calculate);

      // Fungsi untuk menghitung dan memperbarui hasil operasi
      function calculate() {
      // Mengambil nilai dari input
      var val1 = parseFloat(input1.value) || 0;
      var val2 = parseFloat(input2.value) || 0;
      var val3 = parseFloat(input3.value) || 0;

      // Melakukan operasi matematika
      var result = (val1 - val2)/val3; // Anda dapat mengganti operator atau operasi sesuai kebutuhan

      // Menetapkan hasil operasi sebagai nilai dari input dengan id 'result'
      resultInput.value = result;
      }
    </script>

<script>
function confirmSubmit() {
    // Buat elemen untuk jendela konfirmasi kustom
    var confirmationDialog = document.createElement('div');
    confirmationDialog.innerHTML = '<p>Apakah Anda yakin data sudah benar?</p><p style="color: red; font-size: 10px">Data yang ditambahkan tidak dapat diubah</p>';
    
    // Tambahkan tombol untuk OK
    var okButton = document.createElement('button');
    okButton.textContent = 'OK';
    okButton.onclick = function() {
        // Jika pengguna menekan tombol OK, kirim formulir
        document.getElementById("pemeliharaan").submit();
        document.body.removeChild(confirmationDialog);
    };
    confirmationDialog.appendChild(okButton);

    // Tambahkan tombol untuk Batal
    var cancelButton = document.createElement('button');
    cancelButton.textContent = 'Batal';
    cancelButton.onclick = function() {
        // Jika pengguna menekan tombol Batal, batalkan pengiriman formulir
        document.body.removeChild(confirmationDialog);
    };
    confirmationDialog.appendChild(cancelButton);

    // Tambahkan jendela konfirmasi ke dalam body dokumen
    document.body.appendChild(confirmationDialog);
}
</script>
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