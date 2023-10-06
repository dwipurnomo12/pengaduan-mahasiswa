<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanSayaController extends Controller
{
    public function index()
    {    
        $pengaduan = Pengaduan::where('user_id', auth()->user()->id)->get();
        return view('aduan-saya.index', [
           'pengaduans'  => $pengaduan
        ]);
    }
}
