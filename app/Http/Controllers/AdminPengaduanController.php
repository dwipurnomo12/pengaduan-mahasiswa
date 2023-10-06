<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminPengaduanController extends Controller
{
    public function index()
    {
        return view('admin.pengaduan.index', [
            'pengaduans'    => Pengaduan::orderBy('id', 'DESC')->get()
        ]);
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('admin.pengaduan.edit', [
            'pengaduan'     => $pengaduan
        ]);
    }

    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);
        $validator = Validator::make($request->all(), [
            'status'     => 'required',
        ], [
            'status.required'    => 'Ubah status !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $pengaduan->update([
            'status'     => $request->status,
        ]);

        return redirect('/admin/pengaduan')->with('success', 'Berhasil memperbarui status pengaduan !');
    }
}
