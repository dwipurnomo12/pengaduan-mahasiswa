@extends('admin.layouts.main')

@section('content')

<div class="row">
  <div class="col">
    <div class="card bg-primary overflow-hidden bg-primary">
      <div class="card-body p-5 bg-primary">
        <h4 class=" text-white">Anda Login Sebagai {{ auth()->user()->name }}</h4>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-3">
      <div class="card overflow-hidden bg-primary text-white">
          <div class="card-body p-4 bg-primary">
            {{ $totalPengaduan }} &nbsp; Total Pengaduan 
          </div>
      </div>
  </div>
  <div class="col-lg-3">
      <div class="card overflow-hidden bg-primary text-white">
          <div class="card-body p-4 bg-warning">
            {{ $sedangDiproses }} &nbsp; Pengaduan Ditinjau
          </div>
      </div>
  </div>
  <div class="col-lg-3">
      <div class="card overflow-hidden bg-primary text-white">
          <div class="card-body p-4 bg-success">
            {{ $selesai }} &nbsp; Pengaduan Dikerjakan
          </div>
      </div>
  </div>
  <div class="col-lg-3">
      <div class="card overflow-hidden bg-primary text-white">
          <div class="card-body p-4 bg-danger">
            {{ $tidakDiproses }} &nbsp; Pengaduan Ditolak
          </div>
      </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-7 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-6">
              <h5 class="card-title fw-semibold">Pengaduan Terbaru</h5>
          </div>
          <div class="col-6 text-right">
              <a href="/admin/pengaduan" type="button" class="btn btn-warning float-end">Semua Pengaduan</a>
          </div>
        </div>
      </div>
      <div class="card-body p-4">
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">No</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Judul</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Status</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Pengirim</h6>
                </th>
              </tr>
            </thead>
            <tbody>
             @foreach ($pengaduans as $pengaduan)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $pengaduan->judul_pengaduan }}</td>
                  <td>
                    @if ($pengaduan->status == 'Sedang Diproses')
                        <span class="badge text-bg-warning p-2">{{ $pengaduan->status }}</span>
                    @elseif($pengaduan->status == 'Selesai')
                        <span class="badge text-bg-success p-2">{{ $pengaduan->status }}</span>
                    @elseif($pengaduan->status == 'Tidak Dapat Diproses')
                        <span class="badge text-bg-danger p-2">{{ $pengaduan->status }}</span>
                    @endif
                </td>
                  <td>{{ $pengaduan->user->name }}</td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-5 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-6">
              <h5 class="card-title fw-semibold">Komentar</h5>
          </div>
          <div class="col-6 text-right">
              <a href="/admin/komentar" type="button" class="btn btn-warning float-end">Semua</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">No</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Komentar</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Oleh</h6>
                </th>
              </tr>
            </thead>
            <tbody>
             @foreach ($comments as $comment)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $comment->body }}</td>
                  <td>{{ $comment->user->name }}</td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection