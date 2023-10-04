@extends('template/dasar')
@section('inti_data')
    <h1>Halaman Kategori</h1>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/' class="btn btn-primary btn-sm">Kembali</a>
            <a href='/buku' class="btn btn-warning btn-sm">Buku</a>
            <a href='/full' class="btn btn-danger btn-sm">Full</a>
        </div>
        <div class="d-flex justify-content-between">
            <a href="/kategori/create" class="btn btn-primary">+++</a>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="col-md-1">ID Kategori</th>
                    <th class="col-md-1">Nama Kategori</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>
                            <a href='{{ url('/kategori/edit/' . $item->id) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus permanen kategori {{ $item -> kategori }} ini?')" class="d-inline"
                                action="{{ route('bukukategori.delete', $item->id) }}" method="post">
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
