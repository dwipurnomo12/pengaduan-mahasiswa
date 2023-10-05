<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="/"><span>SIPM</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
          <li><a class="nav-link scrollto" href="/tambah-aduan">Tambah Aduan</a></li>
          <li><a class="nav-link scrollto" href="/lihat-aduan">Lihat Aduan</a></li>
          @auth
            <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="/aduan-saya">Aduan Saya</a></li>
                <hr>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf 
                  <button type="submit" class="btn btn-danger m-3">Logout</button>
                </form>
              </ul>
            </li>
          @else
            <li><a class="nav-link scrollto" href="/login">Login</a></li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>