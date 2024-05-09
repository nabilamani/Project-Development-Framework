<?php

namespace App\Http\Controllers;
use App\Models\Penyusutan;
use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenyusutanController extends Controller
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
        return view('penyusutan/tambah', compact('asets'));
    }

    public function index()
    {
        
        //get data
        $data = Penyusutan::all();
        
        //render view with data
        return view('penyusutan/daftar', compact('data'));
    }

    // public function info()
    // {
    //     //get data
    //     $count = Penyusutan::count();
    //     $male = Penyusutan::where('jenis_kel', 'Laki-laki')->count(); // Mengambil jumlah data laki-laki
    //     $female = Penyusutan::where('jenis_kel', 'Perempuan')->count(); 

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
        $request->validate([
            'id_penyusutan'=>'required',
            'id_aset'=>'required',
            'biaya_perolehan'=>'required',
            'nilai_residu'=>'required',
            'umur_manfaat'=>'required',
            'biaya_perolehanDep'=>'required'
        ]);

        $data = Penyusutan::create($request->all());
       
        if($data) {
            $this->editNilaiAset($request->id_aset, $request->biaya_perolehanDep);
            return redirect()->route('daftarpeny')->with('success', 'Data Berhasil Ditambahkan');
        } 
        else {
            return redirect()->route('daftarpeny')->with('error', 'Data Gagal Ditambahkan');
        }
        
    }

    private function editNilaiAset($idAset, $biayaPerolehan)
    {
        $aset = Aset::find($idAset);
        if ($aset) {
            // Lakukan perubahan nilai di sini
            $aset->nilai = $aset->nilai - $biayaPerolehan;
            $aset->save();
        }
    }

    public function tampil($id)
    {
        $data = Penyusutan::where('id_penyusutan', $id)->firstOrFail();

        // Tampilkan data
        return view('penyusutan/tampil', compact('data'));
    }


    public function edit(Request $request, $id)
    {
        $request->validate([
            'id_penyusutan'=>'required',
            'id_aset'=>'required',
            'nilai_residu'=>'required',
            'umur_manfaat'=>'required',
            'biaya_perolehanDep'=>'required'
        ]);

        $data = Penyusutan::where('id_penyusutan', $id)->firstOrFail();
        
        if ($data) {
            $data->update($request->all());
            return redirect()->route('dafpeny')->with('success', 'Data berhasil diubah.');
        } else {
            return redirect()->route('dafpeny')->with('error', 'Data gagal diubah.');
        }
    }

    public function back()
    {
        return redirect()->route('dafpeny');
    }

    public function delete($id)
    {

    $data = Penyusutan::where('id_penyusutan', $id)->firstOrFail();


    // Hapus data dari database
    $data->delete();

        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Data Penyusutan ' . $data->id . ' berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data Penyusutan ' . $data->id . ' gagal dihapus.');
        }
    }

    public function export()
    {

        $data = Penyusutan::with('aset')->get();
        return view('/dataPenyusutan-pdf', compact('data'));
        
    }

}
