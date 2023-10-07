@extends('admin.layouts.main')

<style>
    .body-content img {
        max-width: 100%;
        max-height: 100%;
    }
</style>


@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Semua Pengaduan
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/pengaduan/{{ $pengaduan->id }}">
                        @method('put')
                        @csrf
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="judul_pengaduan" class="form-label">Judul Pengaduan</label>
                                    <input type="text" class="form-control" id="judul_pengaduan" name="judul_pengaduan" value="{{ old('judul_pengaduan', $pengaduan->judul_pengaduan) }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Kategori</label>
                                    <input type="text" class="form-control" id="status" name="kategori_id" value="{{ old('kategori_id', $pengaduan->kategori->kategori) }}" disabled>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">Pada</label>
                                            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ old('user_id', $pengaduan->user->name) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="created_at" class="form-label">Pengirim</label>
                                            <input type="text" class="form-control" id="created_at" name="created_at" value="{{ old('created_at', $pengaduan->created_at->diffForHumans() ) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-label">Isi Pengaduan</label>
                                    <div class="body-content">
                                        <p>{!! $pengaduan->body !!}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="my-3">
                                    <label for="judul_pengaduan" class="form-label">Ubah Status Pengaduan</label>
                                    <select class="form-control" name="status" id="status">
                                        @foreach(['Sedang Diproses', 'Selesai', 'Tidak Dapat Diproses'] as $status)
                                            <option value="{{ $status }}" @if($status == $pengaduan->status) selected @endif>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                
                                <button type="submit" class="btn btn-success m-1 float-end">Simpan Perubahan</button>  

                            </div>                      
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection