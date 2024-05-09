@extends('layouts/index')
@section('content')
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Penyusutan</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Penyusutan</h4>
                            </div>
                            <div>
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible alert-alt fade show" style="margin-left: 10px; margin-right: 10px" id="successAlert">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                        <strong>Success!</strong> {{ session('success') }}.
                                    <!-- <div class="alert alert-success"  data-bs-placement="left" style="width: 500px; height:50px; margin: 5px; align-content: right;">
                                        
                                    </div> -->
                                    <script>
                                        setTimeout(function(){
                                            document.getElementById('successAlert').style.display = 'none';
                                        }, 5000); // Atur timeout ke 5000 milidetik (5 detik)
                                    </script>
                                @endif

                                <!-- Jika terdapat pesan kegagalan, tampilkan alert danger dan atur timeout -->
                                @if(session('error'))
                                    <div class="alert alert-error alert-dismissible alert-alt fade show" style="margin-left: 10px; margin-right: 10px" id="errorAlert">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                        <strong>Error!</strong> {{ session('error') }}.
                                    <!-- <div class="alert alert-error"  data-bs-placement="left" style="width: 500px; height:50px; margin: 5px; align-content: right;">
                                        
                                    </div> -->
                                    <script>
                                        setTimeout(function(){
                                            document.getElementById('errorAlert').style.display = 'none';
                                        }, 5000); // Atur timeout ke 5000 milidetik (5 detik)
                                    </script>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px; color: #1F2544">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Id Penyusutan</th>
                                            <th>Id Aset</th>
                                            <th>Nilai Residu</th>
                                            <th>Umur Manfaat</th>
                                            <th>Biaya Depresiasi Perolehan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $no=1
                                        @endphp 
                                        @foreach($data as $row)
                                            <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->id_penyusutan }}</td>
                                            <td>{{ $row->id_aset }}</td>
                                            <td>Rp. {{ number_format($row->nilai_residu, 0, ',', '.') }},00</td>
                                            <td>{{ $row->umur_manfaat }} Tahun</td>
                                            <td>Rp. {{ number_format($row->biaya_perolehanDep, 0, ',', '.') }},00</td>
                                            </tr>
                                        @endforeach
                                        </tbody>    
                                    </table>
                                </div>
                            </div>
                            <div>
                                <a href="/tambahpeny"><div class="btn btn-rounded btn-primary" style="width: 140px; margin-left: 20px; margin-bottom: 30px; height: 40px; padding-top: 10px">Tambah Data</div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection