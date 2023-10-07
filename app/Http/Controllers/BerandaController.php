<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        $totalPengaduan = Pengaduan::count();
        $sedangDiproses = Pengaduan::where('status', 'Sedang Diproses')->count();
        $selesai        = Pengaduan::where('status', 'Selesai')->count();
        $tidakDiproses  = Pengaduan::where('status', 'Tidak Dapat Diproses')->count();

        return view('index', [
            'pengaduans'        => Pengaduan::with('user', 'kategori')->latest()->take(3)->get(),
            'totalPengaduan'    => $totalPengaduan,
            'sedangDiproses'    => $sedangDiproses,
            'selesai'           => $selesai,
            'tidakDiproses'     => $tidakDiproses,
        ]);
    }
}
