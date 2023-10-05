<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListPengaduanController extends Controller
{
    public function index()
    {
        return view('lihat-aduan.index', [
            'listAduan'     => Pengaduan::with('user')->orderBy('id', 'DESC')->paginate(9)
        ]);
    }
}
