<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalPengaduan = Pengaduan::count();
        $sedangDiproses = Pengaduan::where('status', 'Sedang Diproses')->count();
        $selesai        = Pengaduan::where('status', 'Selesai')->count();
        $tidakDiproses  = Pengaduan::where('status', 'Tidak Dapat Diproses')->count();
        $pengaduans     = Pengaduan::orderBy('id', 'DESC')->take(10)->get();
        $comments       = Comment::orderBy('id', 'DESC')->take(10)->get();

        return view('admin.dashboard', [
            'totalPengaduan'    => $totalPengaduan,
            'sedangDiproses'    => $sedangDiproses,
            'selesai'           => $selesai,
            'tidakDiproses'     => $tidakDiproses,
            'pengaduans'        => $pengaduans,
            'comments'          => $comments
        ]);
    }
}
