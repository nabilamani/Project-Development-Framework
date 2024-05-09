<?php

namespace App\Http\Controllers;
use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetController extends Controller
{
    // public function __construct()
    // {
    //     // Gunakan middleware pada semua fungsi di controller ini
    //     $this->middleware('check.session');
    // }

    public function index()
    {
        
        //get data
        $data = Aset::all();
        
        //render view with data
        return view('layouts/daftar', compact('data'));
    }

    public function info()
    {
        //get data
        $count = Aset::count();
        $male = Aset::where('jenis_kel', 'Laki-laki')->count(); // Mengambil jumlah data laki-laki
        $female = Aset::where('jenis_kel', 'Perempuan')->count(); 

        //render view with data
        return view('layouts/infografis', compact('count', 'male', 'female'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $request->validate([
            'id_aset' => 'required',
            'nama_aset' => 'required',
            'kategori' => 'required',
            'kondisi' => 'required',
            'status' => 'required',
            'lokasi' => 'required',
            'nilai' => 'required',
            'tahun_perolehan' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required'
        ]);

        $data = Aset::create($request->all());
        if($request->hasFile('gambar')) {
            $request->file('gambar')->move('gambar_aset/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
            return redirect()->route('daftar')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('daftar')->with('error', 'Data Gagal Ditambahkan');
        }
        if($data) {
            return redirect()->route('daftar')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('daftar')->with('error', 'Data Gagal Ditambahkan');
        }
        
    }

    public function tampil($nama)
    {
        $data = Aset::where('nama_aset', $nama)->firstOrFail();

        // Tampilkan data
        return view('layouts/tampil', compact('data'));
    }

    public function detail($nama)
    {
        $data = Aset::where('nama_aset', $nama)->get();

        // detailkan data
        return view('layouts/detail', ['data' => $data]);
    }

    public function edit(Request $request, $nama)
    {
        $request->validate([
            'gambar' => 'required'
        ]);

        $data = Aset::where('nama_aset', $nama)->firstOrFail();
        
        if ($data) {
            $data->update($request->all());
                // if($request->hasFile('foto')) {
                //     $request->file('foto')->move('foto_warga/', $request->file('foto')->getClientOriginalName());
                //     $data->foto = $request->file('foto')->getClientOriginalName();
                //     $data->save();
                // }
                if ($request->hasFile('gambar')) {
                    $request->file('gambar')->move('gambar_aset/', $request->file('gambar')->getClientOriginalName());
                    $data->gambar =  $request->file('gambar')->getClientOriginalName();
                    $data->save();
                } else {
                    // Gunakan gambar saat ini jika input file kosong
                    $data->gambar = $request->input('gambar_saat_ini');
                }
            return redirect()->route('daftar')->with('success', 'Data berhasil diubah.');
        } else {
            return redirect()->route('daftar')->with('error', 'Data gagal diubah.');
        }
    }

    public function back()
    {
        return redirect()->route('daftar');
    }

    public function delete($nama)
    {

    $data = Aset::where('nama_aset', $nama)->firstOrFail();

    // Hapus file terkait dari penyimpanan
    if ($data->foto) {
        $file_path = 'public/gambar_aset/' . basename($data->foto);
        Storage::delete($file_path);
    }

    // Hapus data dari database
    $data->delete();

        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Data ' . $data->nama . ' berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data ' . $data->nama . ' gagal dihapus.');
        }
    }

    public function export()
    {
        $data = Aset::all();
        return view('/dataAset-pdf', compact('data'));
        
    }

}
