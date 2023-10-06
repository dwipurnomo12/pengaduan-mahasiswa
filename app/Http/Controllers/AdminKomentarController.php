<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminKomentarController extends Controller
{
    public function index()
    {
        return view('admin.komentar.index', [
            'komentars' => Comment::orderBy('id', 'DESC')->get()
        ]);
    }
}
