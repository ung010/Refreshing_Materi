@extends('template/dasar')
@section('inti_data')
    <h1>Halaman Buku</h1>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/' class="btn btn-primary btn-sm">Kembali</a>
            <a href='/kategori' class="btn btn-warning btn-sm">Kategori</a>
            <a href='/full' class="btn btn-danger btn-sm">Full</a>
        </div>
        <div class="d-flex justify-content-between">
            <a href="/buku/create" class="btn btn-primary">+++</a>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="col-md-1">ID Buku</th>
                    <th class="col-md-1">Judul Buku</th>
                    <th class="col-md-1">Penulis</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>
                            <a href='{{ url('/buku/edit/' . $item->id) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus permanen buku {{ $item -> judul }} ini?')" class="d-inline"
                                action="{{ route('buku.delete', $item->id) }}" method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
