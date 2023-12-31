@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title fw-semibold text-white">Kategori</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="/admin/kategori/create" type="button" class="btn btn-warning float-end">Tambah Kategori</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="table_id" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategories as $kategori)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kategori->kategori }}</td>
                                        <td>
                                            <a href="/admin/kategori/{{ $kategori->id }}/edit" type="button" class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
                                            <form id="{{ $kategori->id }}" action="/admin/kategori/{{ $kategori->id }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="button" class="btn btn-danger swal-confirm mb-1" data-form="{{ $kategori->id }}"><i class="ti ti-trash"></i></button>
                                            </form>
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