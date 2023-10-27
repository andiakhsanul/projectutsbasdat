<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //this is example of query builder
        // $roles = DB::table('role')
        // ->where('status','=',1)
        // ->get();

        //this is exampe of query native
        $satuans = DB::select('select * from satuan where status = ?', [1]);
        // return $roles;
        // dd($roles);

        return view('satuan.index', ['satuans' => $satuans], ['title' => 'satuan']);
        //  bisa menggunakan compact juga
        // return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satuan.create', ['title' => 'tambah satuans']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // DB::table('roles')->insert([
        //     'nama_role' => $request->name
        // ]);
        //create query native from example above
        DB::insert('insert into satuan (nama_satuan) values (?)', [$request->name]);
        return redirect('satuans')->with('status', 'satuans berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $satuans = DB::table('satuan')->where('id_satuan', $id)->first();
        // dd($roles);
        //create query native from example above
        //  $roles = DB::select('select * from roles where id_role = ?', [$role]);
        return view('satuan.edit', ['title' => 'Edit Role', 'satuans' => $satuans]);
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, $role)
        {

            DB::table('satuan')->where('id_satuan', $role)
                ->update([
                    'nama_satuan' => $request->name
                ]);
            return redirect('satuans')->with('status', 'roles berhasil diedit');
        }


    //create func softdelete from route roles/delete/{role} with name softdeleteroles by using query builder and just with thats id role canghe status to 0
    public function softdelete($satuan)
    {
        // DB::table('roles')->where('id_role', $role)
        //     ->update([
        //         'status' => 0
        //     ]);
        //create query native from example above
        DB::update('update satuan set status = ? where id_satuan = ?', [0, $satuan]);
        return redirect('satuans')->with('status', 'satuan berhasil dihapus');
    }



    public function restore()
{

    DB::table('satuan')->where('status', 0)->update(['status' => 1]);
    return redirect('satuans')->with('status', 'Semua satuan berhasil dipulihkan');
}

//make func restore for id

}
