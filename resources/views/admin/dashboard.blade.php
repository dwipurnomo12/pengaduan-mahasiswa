@extends('admin.layouts.main')

@section('content')

Anda Login Sebagai {{ auth()->user()->name }}
<div class="row">
  <div class="col-lg-3">
      <div class="card overflow-hidden bg-primary text-white">
          <div class="card-body p-4 bg-primary">
            Total Pengaduan
          </div>
      </div>
  </div>
  <div class="col-lg-3">
      <div class="card overflow-hidden bg-primary text-white">
          <div class="card-body p-4 bg-warning">
            Pengaduan Ditinjau
          </div>
      </div>
  </div>
  <div class="col-lg-3">
      <div class="card overflow-hidden bg-primary text-white">
          <div class="card-body p-4 bg-success">
            Pengaduan Dikerjakan
          </div>
      </div>
  </div>
  <div class="col-lg-3">
      <div class="card overflow-hidden bg-primary text-white">
          <div class="card-body p-4 bg-danger">
            Pengaduan Ditolak
          </div>
      </div>
  </div>
</div>
@endsection