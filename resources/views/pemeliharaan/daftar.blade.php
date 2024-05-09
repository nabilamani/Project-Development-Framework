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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Pemeliharaan</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pemeliharaan</h4>
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
                                            <th>Id pemeliharaan</th>
                                            <th>Id Aset</th>
                                            <th>Biaya Pemeliharaan</th>
                                            <th>Tanggal Pemeliharaan</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $no=1
                                        @endphp 
                                        @foreach($data as $row)
                                            <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->id_pemeliharaan }}</td>
                                            <td>{{ $row->id_aset }}</td>
                                            <td>Rp. {{ number_format($row->biaya_pemeliharaan, 0, ',', '.') }},00</td>
                                            <td>{{ $row->tanggal_pemeliharaan }}</td>
                                            <td>{{ $row->keterangan }}</td>
                                            <td>
                                                <div class="dropdown custom-dropdown">
                                                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="dropdown" style="height: 100%; margin-bottom: -15px;" >Aksi
                                                        <i class="fa fa-angle-down ml-3"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="/tampilpem/{{ $row->id_pemeliharaan }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <a class="dropdown-item" href="/deletepem/{{ $row->id_pemeliharaan }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data pemeliharaan terkait?')"><i class='bx bx-trash'></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                            </tr>
                                        @endforeach
                                        </tbody>    
                                    </table>
                                </div>
                            </div>
                            <div>
                                <a href="/tambahpem"><div class="btn btn-rounded btn-primary" style="width: 140px; margin-left: 20px; margin-bottom: 30px; height: 40px; padding-top: 10px">Tambah Data</div></a>
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