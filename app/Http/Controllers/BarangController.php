<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $barang = DB::table('tb_barang')->get();
        return view('barang', compact('barang'));
    }

    public function create(Request $request)
    {
        DB::table('tb_barang')->insert([
            'nama_barang' => $request->nama_barang,
            'status_barang' => $request->status_barang,
            'tgl' => $request->tgl,
            'harga_awal' => $request->harga_awal,
            'deskripsi_barang' => $request->deskripsi_barang
        ]);
        return back();
    }

    public function update(Request $request, $id)
    {
        DB::table('tb_barang')->where('id_barang', $id)->update([
            'nama_barang' => $request->nama_barang,
            'status_barang' => $request->status_barang,
            'tgl' => $request->tgl,
            'harga_awal' => $request->harga_awal,
            'deskripsi_barang' => $request->deskripsi_barang
        ]);
        return back();
    }

    public function delete($id)
    {
        DB::table('tb_barang')->where('id_barang', $id)->delete();
        return back();
    }
}
