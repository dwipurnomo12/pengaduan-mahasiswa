<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('tambah-aduan.index');
    }

    public function tambahAduan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_pengaduan'   => 'required',
            'body'              => 'required'
        ], [
            'judul_pengaduan.required'  => 'Judul Pengaduan wajib diisi !',
            'body'                      => 'Isi aduan wajib diisi !'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Pengaduan::create([
            'judul_pengaduan'   => $request->judul_pengaduan,
            'body'              => $request->body,
            'user_id'           => auth()->user()->id
        ]);

        alert()->toast('Berhasil menambahkan aduan baru', 'success');
        return redirect()->back();
    }
}
