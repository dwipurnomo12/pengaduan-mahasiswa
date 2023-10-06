@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Semua Pengaduan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Pengirim</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduans as $pengaduan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pengaduan->judul_pengaduan }}</td>
                                        <td>{{ $pengaduan->user->name }}</td>
                                        <td>{{ $pengaduan->kategori->kategori }}</td>
                                        <td>
                                            @if ($pengaduan->status == 'Sedang Diproses')
                                                <span class="badge text-bg-warning p-2">{{ $pengaduan->status }}</span>
                                            @elseif($pengaduan->status == 'Selesai')
                                                <span class="badge text-bg-success p-2">{{ $pengaduan->status }}</span>
                                            @elseif($pengaduan->status == 'Tidak Dapat Diproses')
                                                <span class="badge text-bg-danger p-2">{{ $pengaduan->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/lihat-aduan/{{ $pengaduan->slug }}" type="button" target="_blank" class="btn btn-success mb-1"><i class="ti ti-eye-check"></i></a>
                                            <a href="/admin/pengaduan/{{ $pengaduan->id }}/edit" type="button" class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
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

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        });
    </script>
@endsection