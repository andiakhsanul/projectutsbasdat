<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('user')
            ->join('role', 'user.id_role', '=', 'role.id_role')
            ->where('user.status', '=', 1)
            ->select('user.id_user', 'role.nama_role', 'user.username', 'user.password', 'user.status')
            ->get();

        return view('users.index', ['users' => $users, 'title' => 'users']);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create', ['title' => 'tambah users']);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
{
    $role = DB::table('role')->where('id_role', $request->id_role)->first();

    if ($role) {
        DB::table('user')->insert([
            'id_role' => $request->id_role,
            'username' => $request->username,
            'password' => $request->password
        ]);
        return redirect('users')->with('status', 'user berhasil ditambahkan');
    } else {
        return redirect('users')->with('status', 'Gagal menambahkan user. Role tidak valid.');
    }
}


    /**
     * Display the specified resource.
     */
    public function edit($id)
{
    $user = DB::table('user')
        ->join('role', 'user.id_role', '=', 'role.id_role')
        ->where('user.id_user', $id)
        ->select('user.id_user', 'user.id_role', 'role.nama_role', 'user.username', 'user.password')
        ->first();

    return view('users.edit', ['users' => $user], ['title' => 'Edit User']);
}

// public function update(Request $request, $id)
// {
//     DB::table('user')->where('id_user', $id)->update([
//         'id_role' => $request->id_role,
//         'username' => $request->username,
//         'password' => $request->password
//     ]);

//     return redirect('users')->with('status', 'User berhasil diperbarui');
// }
public function update(Request $request, $id)
{
    $role = DB::table('role')->where('id_role', $request->id_role)->first();

    if ($role) {
        DB::table('user')->where('id_user', $id)->update([
            'id_role' => $request->id_role,
            'username' => $request->username,
            'password' => $request->password
        ]);

        return redirect('users')->with('status', 'User berhasil diperbarui');
    } else {
        return redirect('users')->with('status', 'Gagal memperbarui user. Role tidak valid.');
    }
}



    //create func softdelete from route roles/delete/{role} with name softdeleteroles by using query builder and just with thats id role canghe status to 0
    public function softdelete($user)
    {
        DB::table('user')->where('id_user', $user)
            ->update([
                'status' => 0
            ]);
        return redirect('users')->with('status', 'User berhasil dihapus');
    }




    public function restore()
    {

        DB::table('user')->where('status', 0)->update(['status' => 1]);
        return redirect('users')->with('status', 'Semua peran berhasil dipulihkan');
    }
}
