@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Komentar Masuk
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Isi Komentar</th>
                                    <th>Pengirim</th>
                                    <th>Balasan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($komentars as $komentar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $komentar->pengaduan->judul_pengaduan }}</td>
                                        <td>{{ $komentar->body }}</td>
                                        <td>{{ $komentar->user->name }}</td>
                                        <td>{{ $komentar->replies->count() }} Balasan</td>
                                        <td>
                                            <a href="/lihat-aduan/{{ $komentar->pengaduan->slug }}" type="button" target="_blank" class="btn btn-success mb-1"><i class="ti ti-eye-check"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        });
    </script>
@endsection