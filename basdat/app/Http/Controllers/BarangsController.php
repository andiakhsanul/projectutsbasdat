<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = DB::table('barang')
            ->join('satuan', 'barang.id_satuan', '=', 'satuan.id_satuan')
            ->where('barang.status', '=', 1)
            ->select('barang.id_barang', 'satuan.nama_satuan', 'barang.jenis', 'barang.nama_barang', 'barang.status', 'barang.harga')
            ->get();

        return view('barang.index', ['barangs' => $barangs, 'title' => 'barangs']);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create', ['title' => 'tambah barang']);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $satuan = DB::table('satuan')->where('id_satuan', $request->id_satuan)->first();
        if ($satuan) {
            DB::table('barang')->insert([
                'id_satuan' => $request->id_satuan,
                'jenis' => $request->jenis,
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga
            ]);
            return redirect('barangs')->with('status', 'barang berhasil ditambahkan');
        } else {
            return redirect('barangs')->with('status', 'Gagal menambahkan barang. satuan tidak valid.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $barangs = DB::table('barang')
            ->join('satuan', 'barang.id_satuan', '=', 'satuan.id_satuan')
            ->where('barang.id_barang', '=', $id)
            ->where('barang.status', '=', 1)
            ->select('barang.id_barang', 'satuan.id_satuan', 'satuan.nama_satuan', 'barang.jenis', 'barang.nama_barang', 'barang.status', 'barang.harga')
            ->first();

        $daftarSatuan = DB::table('satuan')->get();

        return view('barang.edit', compact('barangs', 'daftarSatuan'))->with('title', 'Edit Barang');
    }

    public function update(Request $request, $id)
    {
        $barang = DB::table('barang')->where('id_barang', $id)->first();

        $id_satuan = DB::table('satuan')
            ->where('nama_satuan', $request->id_satuan)
            ->value('id_satuan');

        if ($barang) {
            DB::table('barang')->where('id_barang', $id)->update([
                'id_satuan' => $id_satuan,
                'jenis' => $request->jenis,
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga
            ]);

            return redirect('barangs')->with('status', 'Barang berhasil diperbarui');
        } else {
            return redirect('barangs')->with('status', 'Gagal memperbarui barang. Satuan tidak valid.');
        }
    }





    //create func softdelete from route roles/delete/{role} with name softdeleteroles by using query builder and just with thats id role canghe status to 0
    public function softdelete($barang)
    {
        DB::table('barang')->where('id_barang', $barang)
            ->update([
                'status' => 0
            ]);
        return redirect('barangs')->with('status', 'barang berhasil dihapus');
    }




    public function restore()
    {

        DB::table('barang')->where('status', 0)->update(['status' => 1]);
        return redirect('barangs')->with('status', 'Semua barang berhasil dipulihkan');
    }
}
