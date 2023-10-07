<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class ListPengaduanController extends Controller
{
    public function index()
    {
        return view('lihat-aduan.index', [
            'listAduan'     => Pengaduan::with('user', 'kategori')->orderBy('id', 'DESC')->paginate(9)
        ]);
    }

    public function detail($slug)
    {
        $pengaduan = Pengaduan::where('slug', $slug)->with(['user', 'kategori', 'comments'])->first();

        return view('lihat-aduan.detail', [
            'pengaduan' => $pengaduan,
        ]);
    }
}
