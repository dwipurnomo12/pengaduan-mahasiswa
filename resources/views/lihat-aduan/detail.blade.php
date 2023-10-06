@extends('layouts.main')

<style>
    .body-content img {
        max-width: 100%;
        max-height: 100%;
    }
</style>

@section('content')
<main id="main">
    <section id="about" class="about mt-5">
        <div class="container my-5">
            <div class="card">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card-body">
                            <h3><b>{{ $pengaduan->judul_pengaduan }}</b></h3>
                            <div class="user-info mt-3">
                                <p><i class='bx bxs-user-circle'></i>{{ $pengaduan->user->name }}</p> |
                                <p>
                                  @if ($pengaduan->status == 'Sedang Diproses')
                                    <span class="badge text-bg-warning">{{ $pengaduan->status }}</span>
                                  @elseif($pengaduan->status == 'Selesai')
                                    <span class="badge text-bg-success">{{ $pengaduan->status }}</span>
                                  @elseif($pengaduan->status == 'Tidak Dapat Diproses')
                                    <span class="badge text-bg-danger">{{ $pengaduan->status }}</span>
                                  @endif
                                </p>|
                                <p><i class='bx bx-time'></i>{{ $pengaduan->created_at->diffForHumans() }} </p> |
                                <p><i class='bx bx-list'></i>{{ $pengaduan->kategori->kategori }}</p> |
                            </div>
                            <div class="body-content">
                                {!! $pengaduan->body !!}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="card-body">
                            <h4 class="mb-3">Komentar</h4>

                            @foreach ($pengaduan->comments as $comment)
                                <div class="comment-container mb-4 d-flex align-items-start">
                                    <div class="comment-avatar me-3">
                                        <i class="bx bxs-user" style="font-size: 2em;"></i>
                                    </div>
                                    <div class="comment-content flex-grow-1">
                                        <div class="comment-header d-flex justify-content-between align-items-center">
                                            <h5>{{ $comment->user->name }}</h5>
                                            @auth
                                                <a href="javascript:void(0)" onclick="toggleReplyForm({{ $comment->id }})" class="reply"><i class="bi bi-reply-fill"></i> Balas</a>
                                            @endauth
                                        </div>
                                        <p class="mt-2">{{ $comment->body }}</p>
                                    </div>
                                </div>

                                @foreach ($comment->replies as $reply)
                                <div class="comment-container my-4 ms-5 d-flex align-items-start">
                                    <div class="comment-avatar me-3">
                                        <i class="bx bxs-user" style="font-size: 2em;"></i>
                                    </div>
                                    <div class="comment-content flex-grow-1">
                                        <div class="comment-header d-flex justify-content-between align-items-center">
                                            <h5>{{ $reply->user->name }}</h5>
                                        </div>
                                        <p class="mt-2">{{ $reply->body }}</p>
                                    </div>
                                </div>
                                @endforeach

                                <div id="replyForm{{ $comment->id }}" class="reply-form mb-3" style="display: none;">
                                    <form action="/lihat-aduan/{{ $pengaduan->slug }}/reply" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $comment->id}}" name="comment_id">
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <div class="mb-3">
                                            <textarea class="form-control @error('replyBody') is-invalid @enderror" placeholder="Balasan Komentar" name="replyBody" rows="3"></textarea>
                                            @error('replyBody')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Kirim Balasan</button>
                                    </form>
                                </div>
                            @endforeach

                            @auth
                            <hr>
                                <form method="POST" action="/lihat-aduan/{{ $pengaduan->slug }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="body" class="form-label">Tambah Komentar</label>
                                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="3"></textarea>
                                        @error('body')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Kirim Komentar</button>
                                </form>
                            @else
                                <div class="alert alert-warning" role="alert">
                                    Login untuk menambahkan komentar !
                                </div>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    function toggleReplyForm(commentId) {
        var replyForm = document.getElementById('replyForm' + commentId);
        var formDisplayStyle = window.getComputedStyle(replyForm).getPropertyValue('display');
        if (formDisplayStyle === 'none') {
            replyForm.style.display = 'block';
        } else {
            replyForm.style.display = 'none';
        }
    }
</script>
@endsection
