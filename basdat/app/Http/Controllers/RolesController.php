<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
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
        $roles = DB::select('select * from role where status_aktif = ?', [1]);
        // return $roles;
        // dd($roles);

        return view('roles.index', ['roles' => $roles], ['title' => 'roles']);
        //  bisa menggunakan compact juga
        // return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create', ['title' => 'tambah roles']);
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
        DB::insert('insert into role (nama_role) values (?)', [$request->name]);
        return redirect('roles')->with('status', 'roles berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $roles = DB::table('role')->where('id_role', $id)->first();
        // dd($roles);
        //create query native from example above
        //  $roles = DB::select('select * from roles where id_role = ?', [$role]);
        return view('roles.edit', ['title' => 'Edit Role', 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, $role)
        {

            DB::table('role')->where('id_role', $role)
                ->update([
                    'nama_role' => $request->name
                ]);
            return redirect('roles')->with('status', 'roles berhasil diedit');
        }


    //create func softdelete from route roles/delete/{role} with name softdeleteroles by using query builder and just with thats id role canghe status to 0
    public function softdelete($role)
    {
        // DB::table('roles')->where('id_role', $role)
        //     ->update([
        //         'status' => 0
        //     ]);
        //create query native from example above
        DB::update('update role set status_aktif = ? where id_role = ?', [0, $role]);
        return redirect('roles')->with('status', 'roles berhasil dihapus');
    }



    public function restore()
{

    DB::table('role')->where('status_aktif', 0)->update(['status_aktif' => 1]);
    return redirect('roles')->with('status', 'Semua peran berhasil dipulihkan');
}

//make func restore for id

}
