<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('tambah-aduan.index', [
            'kategories'    => Kategori::all()
        ]);
    }

    public function tambahAduan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_pengaduan'   => 'required',
            'body'              => 'required',
            'slug'              => 'required|unique:pengaduans',
            'kategori_id'       => 'required'
        ], [
            'judul_pengaduan.required'  => 'Judul Pengaduan wajib diisi !',
            'body.required'             => 'Isi aduan wajib diisi !',
            'slug.required'             => 'Wajib ada slug !',
            'slug.unique'               => 'Slug sudah digunakan !',
            'kategori_id.required'      => 'Pilih Kategori !'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Pengaduan::create([
            'judul_pengaduan'   => $request->judul_pengaduan,
            'body'              => $request->body,
            'kategori_id'       => $request->kategori_id,
            'slug'              => $request->slug,
            'excerpt'           => Str::limit(strip_tags($request->body), 50),
            'user_id'           => auth()->user()->id
        ]);

        alert()->toast('Berhasil menambahkan aduan baru', 'success');
        return redirect()->back();
    }

    /**
     * Generate slug / permalink by Judul.
     */
    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Pengaduan::class, 'slug', $request->judul_pengaduan);
        return response()->json(['slug' => $slug]);
    }
}
