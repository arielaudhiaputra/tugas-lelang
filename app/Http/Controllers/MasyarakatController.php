<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = DB::table('tb_masyarakat')->get();
        return view('masyarakat', compact('masyarakat'));
    }

    public function create(Request $request)
    {
        DB::table('tb_masyarakat')->insert([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => $request->password,
            'telp' => $request->telp,
        ]);

        return back();
    }

    public function delete($id)
    {
        DB::table('tb_masyarakat')->where('id_users', $id)->delete();

        return back();
    }

    public function update(Request $request, $id)
    {
        DB::table('tb_masyarakat')->where('id_users', $id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => $request->password,
            'telp' => $request->telp,
        ]);

        return back();
    }
}
