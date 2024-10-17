<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan semua obat
    public function loadAllObats(){
        $all_obats = Obat::all();
        $obatsMenipis = Obat::where('stok', '<', 10)->get();
        return view('obats', compact('all_obats', 'obatsMenipis'));
    }

    // Menampilkan form tambah obat
    public function loadAllObatsForm(){
        return view('add-obat');
    }

    // Tambah obat baru
    public function AddObat(Request $request){
        $request->validate([
            'nama_obat' => 'required|string',
            'kode_obat' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);
        try {
            $new_obat = new Obat;
            $new_obat->nama = $request->nama_obat;
            $new_obat->kode_obat = $request->kode_obat;
            $new_obat->harga = $request->harga;
            $new_obat->stok = $request->stok;
            $new_obat->save();

            return redirect('/obats')->with('success','Obat berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect('/add/obat')->with('fail',$e->getMessage());
        }
    }

    // Menampilkan form edit obat
    public function loadEditForm($id){
        $obat = Obat::find($id);
        return view('edit-obat', compact('obat'));
    }

    // Edit data obat
    public function EditObat(Request $request){
        $request->validate([
            'nama_obat' => 'required|string',
            'kode_obat' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);
        try {
            Obat::where('id', $request->obat_id)->update([
                'nama' => $request->nama_obat,
                'kode_obat' => $request->kode_obat,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ]);

            return redirect('/obats')->with('success','Data obat berhasil diubah');
        } catch (\Exception $e) {
            return redirect('/edit/'.$request->obat_id)->with('fail', $e->getMessage());
        }
    }

    // Hapus obat
    public function deleteObat($id){
        try {
            Obat::where('id', $id)->delete();
            return redirect('/obats')->with('success','Obat berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/obats')->with('fail', $e->getMessage());
        }
    }
}
