@extends('layouts.main')

@section('content')
<main id="main">
    <section id="about" class="about mt-5">
        <div class="container my-5">
            <div class="section-title" data-aos="fade-up">
                <h2>Pengaduan</h2>
                <p>Progres Aduan {{ auth()->user()->name }}</p>
            </div>

            <div class="card">
                <div class="row">
                    @if ($pengaduans->isEmpty())
                        <div class="col-lg-12">
                            Anda belum menambahkan aduan.
                        </div> 
                    @else
                        @foreach ($pengaduans as $pengaduan)
                            <div class="col-lg-12 m-2">
                                <b>Pengaduan anda {{ $pengaduan->judul_pengaduan }}</b>
                                @if ($pengaduan->status == 'Sedang Diproses')
                                    <span class="badge text-bg-warning p-2">
                                        <i class='bx bx-time'></i> Sedang di Proses
                                    </span>
                                @elseif ($pengaduan->status == 'Selesai')
                                    <span class="badge text-bg-success p-2">
                                        <i class='bx bx-check-circle'></i> Selesai
                                    </span>
                                @elseif ($pengaduan->status == 'Tidak Dapat Diproses')
                                    <span class="badge text-bg-danger p-2">
                                        <i class='bx bx-x-circle'></i> Tidak Dapat di Proses
                                    </span>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
