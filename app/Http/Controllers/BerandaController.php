<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        return view('index', [
            'pengaduans'    => Pengaduan::with('user', 'kategori')->latest()->take(3)->get()
        ]);
    }
}
