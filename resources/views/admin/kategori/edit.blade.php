@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Edit Kategori</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/kategori/" type="button" class="btn btn-warning float-end">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/kategori/{{ $kategori->id }}">
                        @method('put')
                        @csrf
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">kategori</label>
                                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori', $kategori->kategori) }}">
                                </div>
                            </div>                      
                        </div>

                        <button type="submit" class="btn btn-success m-1 float-end">Simpan Perubahan</button>  
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection