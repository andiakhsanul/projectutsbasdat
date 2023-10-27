<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorsController extends Controller
{
    public function index()
    {
        $vendors = DB::table('vendor')
            ->where('status', 1)
            ->get();

        return view('veendor.index', ['vendors' => $vendors, 'title' => 'Vendor']);
    }

    public function create()
    {
        return view('veendor.create', ['title' => 'Tambah Vendor']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_vendor' => 'required|max:100',
            'badan_hukum' => 'required|in:P,Y'
        ]);

        DB::table('vendor')->insert([
            'nama_vendor' => $request->nama_vendor,
            'badan_hukum' => $request->badan_hukum
        ]);
        return redirect('vendors')->with('status', 'Vendor berhasil ditambahkan');
    }

    public function edit($id)
    {
        $vendor = DB::table('vendor')->where('id_vendor', $id)->first();
        return view('veendor.edit', ['title' => 'Edit Vendor', 'vendor' => $vendor]);
    }

    public function update(Request $request, $vendor)
    {
        $validatedData = $request->validate([
            'nama_vendor' => 'required|max:100',
            'badan_hukum' => 'required|in:P,Y'
        ]);

        DB::table('vendor')->where('id_vendor', $vendor)
            ->update([
                'nama_vendor' => $request->nama_vendor,
                'badan_hukum' => $request->badan_hukum
            ]);
        return redirect('vendors')->with('status', 'Vendor berhasil diedit');
    }


    public function softdelete($vendor)
    {
        DB::table('vendor')->where('id_vendor', $vendor)
            ->update([
                'status' => 0
            ]);
        return redirect('vendors')->with('status', 'Vendor berhasil dihapus');
    }

    public function restore()
    {
        DB::table('vendor')->where('status', 0)->update(['status' => 1]);
        return redirect('vendors')->with('status', 'Semua vendor berhasil dipulihkan');
    }
}
