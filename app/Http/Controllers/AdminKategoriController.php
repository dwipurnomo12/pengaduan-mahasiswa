<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kategori.index', [
            'kategories'    => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori'   => 'required' 
        ], [
            'kategori.required' => 'Form kategori wajib di isi'
        ]);

        if($validator->fails()){
            return redirect('/admin/kategori/create')
                ->withErrors($validator)
                ->withInput();
        }

        Kategori::create([
            'kategori'  => $request->kategori
        ]);

        return redirect('/admin/kategori')->with('success', 'Berhasil menambahkan data kategori');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit', [
            'kategori'  => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori  = Kategori::find($id);
        $validator = Validator::make($request->all(), [
            'kategori'  => 'required',
        ], [
            'kategori.required' => 'Kategori wajib di isi !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $kategori->update([
            'kategori'  => $request->kategori
        ]);

        return redirect('/admin/kategori')->with('success', 'Berhasil mengedit data kategori !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus kategori');
    }
}
