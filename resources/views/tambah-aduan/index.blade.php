@extends('layouts.main')

@section('content')
    <main id="main">
        <section id="about" class="about mt-5">
            <div class="container mt-5">
                
                <div class="section-title" data-aos="fade-up">
                    <h2>Pengaduan</h2>
                    <p>Tambah Pengaduan Baru</p>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-user-check"></i></div>
                            <h4 class="title"><a href="#">Register Akun</a></h4>
                            <p class="description">Mahasiswa yang ingin mengajukan aduan, wajib melakukan registrasi terlebih dahulu</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon"><i class="bx bxs-edit"></i></div>
                            <h4 class="title"><a href="#">Menambahkan Aduan</a></h4>
                            <p class="description">Mahasiswa menambahkan aduan berdasarkan kategori yang dipilih</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-loader"></i></div>
                            <h4 class="title"><a href="#">Menunggu Proses</a></h4>
                            <p class="description">Aduan akan segera di proses oleh pihak Universitas, Mahasiswa dapat melihat status progres aduan</p>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-12 mx-auto">
                        @auth
                        <div class="card p-3">
                            <div class="card-header text-white" style="background-color: #01036f">
                                Formulir Aduan Mahasiswa
                            </div>
                            <form method="POST" action="/tambah-aduan" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="judul_pengaduan" class="form-label">Judul Pengaduan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('judul_pengajuan') is-invalid @enderror" id="judul_pengaduan" name="judul_pengaduan" required>
                                        @error('judul_pengajuan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <input type="hidden" class="form-control" id="slug" name="slug" required>
                                    <div class="mb-3">
                                        <label for="kategori_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                                        <select class="form-select @error('kategori_id') is-invalid @enderror" aria-label="Default select example" name="kategori_id">
                                            <option selected>-- Pilih Kategori --</option>
                                            @foreach ($kategories as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="body" class="form-label @error('body') is-invalid @enderror">Isi Aduan <span class="text-danger">*</span></label>
                                        <textarea id="tiny" name="body"></textarea>
                                        @error('body')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn float-end text-white" style="background-color: #01036f;" type="submit"><i class='bx bx-check-double'></i> Tambah Pengaduan</button>
                            </form>
                        </div>
                        @else
                            <div style="display: inline-block; vertical-align: middle;">
                                <i class="bx bxs-hand" style="font-size: 2em;"></i>
                            </div>
                            <div style="display: inline-block; vertical-align: middle;">
                                <h4>Oopps, anda harus Login/Register terlebih dahulu!</h4>
                            </div>                        
                        @endauth
                    </div>

                </div>
            </div>
        </section>
    </main>

    <script>
        const judul_pengaduan   = document.querySelector('#judul_pengaduan');
        const slug              = document.querySelector('#slug');

        judul_pengaduan.addEventListener('change', function(){
            fetch('/tambah-aduan/slug?judul_pengaduan=' + judul_pengaduan.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

    <script>
        tinymce.init({
          selector: 'textarea#tiny',
          plugins: 'image code',
          toolbar: 'undo redo | link image | code',
          image_title: true,
          automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                const file = e.target.files[0];

                const reader = new FileReader();
                reader.addEventListener('load', () => {
                    const id = 'blobid' + (new Date()).getTime();
                    const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    const base64 = reader.result.split(',')[1];
                    const blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    cb(blobInfo.blobUri(), { title: file.name });
                });
                reader.readAsDataURL(file);
                });

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });

        document.addEventListener('focusin', (e) => {
            if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
                e.stopImmediatePropagation();
            }
        });
    </script>

@endsection