@extends('layouts.main')

@section('content')
    <main id="main">
        <section id="about" class="about mt-5">
            <div class="container mt-5">
                
                <div class="section-title" data-aos="fade-up">
                    <h2>Pengaduan</h2>
                    <p>Daftar Pengaduan Masuk</p>
                </div>

                <div class="row mb-5">
                  @foreach ($listAduan as $aduan)
                    <div class="col-lg-4">
                        <div class="card-aduan mb-4">
                          <div class="card-body p-2">
                            <h3><b>{{ $aduan->judul_pengaduan }}</b></h3>
                            <div class="user-info mt-3">
                              <p><i class='bx bxs-user-circle'></i>{{ $aduan->user->name }}</p>
                              <p>
                                @if ($aduan->status == 'Sedang Diproses')
                                  <span class="badge text-bg-warning">{{ $aduan->status }}</span>
                                @elseif($aduan->status == 'Selesai')
                                  <span class="badge text-bg-success">{{ $aduan->status }}</span>
                                @elseif($aduan->status == 'Tidak Dapat Diproses')
                                  <span class="badge text-bg-danger">{{ $aduan->status }}</span>
                                @endif
                              </p>
                              <p><i class='bx bx-time'></i>{{ $aduan->created_at->diffForHumans() }} </p>
                            </div>
                            <p class="description mt-2">{{ $aduan->excerpt }} <a href="/lihat-aduan/{{ $aduan->slug }}">Read More..</a></p>
                          </div>
                        </div>
                    </div>
                  @endforeach
                </div>

                {{ $listAduan->links() }}

            </div>
        </section>
    </main>

@endsection