@extends('layouts.main')

@section('content')
<section id="hero">

  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
        <div data-aos="zoom-out">
          <h1>Sistem Informasi Pengaduan Mahasiswa</span></h1>
          <h2>Universitas Negeri XYZ</h2>
          <div class="text-center text-lg-start">
            <a href="/tambah-aduan" class="btn-get-started scrollto">Tambah Aduan</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <img src="assets/img/hero.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
  </svg>

</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container-fluid">

      <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
          </div>    

        <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
          <h3>Mengenal Sistem Informasi Pengaduan Mahasiswa</h3>
          <p>Sistem Informasi Pengaduan Mahasiswa adalah sebuah aplikasi atau platform yang dirancang untuk memfasilitasi mahasiswa dalam mengajukan keluhan, pengaduan, atau masalah mereka kepada pihak universitas</p>

          <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="bx bx-user-check"></i></div>
            <h4 class="title"><a href="#">Register Akun</a></h4>
            <p class="description">Mahasiswa yang ingin mengajukan aduan, wajib melakukan registrasi terlebih dahulu</p>
          </div>

          <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="bx bxs-edit"></i></div>
            <h4 class="title"><a href="#">Menambahkan Aduan</a></h4>
            <p class="description">Mahasiswa menambahkan aduan berdasarkan kategori yang dipilih</p>
          </div>

          <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="bx bx-loader"></i></div>
            <h4 class="title"><a href="#">Menunggu Proses</a></h4>
            <p class="description">Aduan akan segera di proses oleh pihak Universitas, Mahasiswa dapat melihat status progres aduan</p>
          </div>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->


  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container">

      <div class="row" data-aos="fade-up">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
              <i class='bx bx-comment-detail'></i>
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Pengaduan</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
              <i class='bx bx-comment-edit'></i>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p>Sedang Ditinjau</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
          <i class='bx bx-comment-check' style='color:#ffffff' ></i>
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Diproses</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
              <i class='bx bx-comment-error'></i>
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Tidak Diproses</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Details Section ======= -->
  <section id="details" class="details">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
          <h2>Pengaduan</h2>
          <p>Pengaduan Masuk</p>
      </div>

      <div class="row content">
          <div class="col-lg-4">
            <div class="card-aduan">
              <div class="card-body">
                <h3>Pembayaran terlalu mahal</h3>
                <div class="user-info">
                  <p><i class='bx bxs-user-circle'></i> John Doe</p>
                  <p><i class='bx bx-time'></i> 2 jam yang lalu</p>
                </div>
                <p class="description">Mahasiswa yang ingin mengajukan aduan, wajib melakukan registrasi terlebih dahulu <a href="/">Read More..</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card-aduan">
              <div class="card-body">
                <h3>Pembayaran terlalu mahal Sekali cuy</h3>
                <div class="user-info">
                  <p><i class='bx bxs-user-circle'></i> John Doe</p>
                  <p><i class='bx bx-time'></i> 2 jam yang lalu</p>
                </div>
                <p class="description">Mahasiswa yang ingin mengajukan aduan, wajib melakukan registrasi terlebih dahulu  <a href="/">Read More..</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card-aduan">
              <div class="card-body">
                <h3>Pembayaran terlalu mahal</h3>
                <div class="user-info">
                  <p><i class='bx bxs-user-circle'></i> John Doe</p>
                  <p><i class='bx bx-time'></i> 2 jam yang lalu</p>
                </div>
                <p class="description">Mahasiswa yang ingin mengajukan aduan, wajib melakukan registrasi terlebih dahulu Mahasiswa yang ingin mengajukan aduan, wajib melakukan registrasi terlebih dahulu  <a href="/">Read More..</a></p>
              </div>
            </div>
          </div>
      </div>

      <div class="text-center">
        <a class="btn btn-primary mt-5" href="#" role="button">Lihat Semua</a>
      </div>

    </div>
  </section><!-- End Details Section -->


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Informasi</h2>
        <p>Kontak kami</p>
      </div>

      <div class="row">

        <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+1 5589 55488 55s</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
          <div style="width: 100%"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Universitas%20Muhammadiyah%20Purworejo+(My%20Business%20Name)&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/population/">Lokasi Universitas</a></iframe></div>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection