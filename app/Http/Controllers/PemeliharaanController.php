<?php

namespace App\Http\Controllers;
use App\Models\Pemeliharaan;
use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemeliharaanController extends Controller
{
    // public function __construct()
    // {
    //     // Gunakan middleware pada semua fungsi di controller ini
    //     $this->middleware('check.session');
    // }
    public function tambah()
    {        
        //render view with data
        $asets = Aset::all();
        return view('pemeliharaan/tambah', compact('asets'));
    }

    public function index()
    {
        
        //get data
        $data = Pemeliharaan::all();
        
        //render view with data
        return view('pemeliharaan/daftar', compact('data'));
    }

    // public function info()
    // {
    //     //get data
    //     $count = Pemeliharaan::count();
    //     $male = Pemeliharaan::where('jenis_kel', 'Laki-laki')->count(); // Mengambil jumlah data laki-laki
    //     $female = Pemeliharaan::where('jenis_kel', 'Perempuan')->count(); 

    //     //render view with data
    //     return view('layouts/infografis', compact('count', 'male', 'female'));
    // }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        // $request->validate([
        //     'id_pemeliharaanan'=>'required',
        //     'id_aset'=>'required',
        //     'biaya_pemeliharaan'=>'required',
        //     'tanggal_pemeliharaan'=>'required',
        //     'keterangan'=>'required'
        // ]);

        $data = Pemeliharaan::create($request->all());
       
        if($data) {
            return redirect()->route('daftarpem')->with('success', 'Data Berhasil Ditambahkan');
        } 
        else {
            return redirect()->route('daftarpem')->with('error', 'Data Gagal Ditambahkan');
        }
        
    }

    public function tampil($id)
    {
        $asets = Aset::all();
        $data = Pemeliharaan::where('id_pemeliharaan', $id)->firstOrFail();

        // Tampilkan data
        return view('pemeliharaan/tampil', compact('data','asets'));
    }


    public function edit(Request $request, $id)
    {
        $request->validate([
            'id_pemeliharaanan'=>'required',
            'id_aset'=>'required',
            'biaya_pemeliharaan'=>'required',
            'tanggal_pemeliharaan'=>'required',
            'keterangan'=>'required'
        ]);

        $data = Pemeliharaan::where('id_pemeliharaan', $id)->firstOrFail();
        
        if ($data) {
            $data->update($request->all());
            return redirect()->route('dafpem')->with('success', 'Data berhasil diubah.');
        } else {
            return redirect()->route('dafpem')->with('error', 'Data gagal diubah.');
        }
    }

    public function back()
    {
        return redirect()->route('dafpem');
    }

    public function delete($id)
    {

    $data = Pemeliharaan::where('id_pemeliharaan', $id)->firstOrFail();


    // Hapus data dari database
    $data->delete();

        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Data pemeliharaan ' . $data->id . ' berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data pemeliharaan ' . $data->id . ' gagal dihapus.');
        }
    }

    public function export()
    {

        $data = Pemeliharaan::with('aset')->get();
        return view('/dataPemeliharaan-pdf', compact('data'));
        
    }

}
