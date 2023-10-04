@extends('template/dasar')
@section('inti_data')
    <h1>Halaman full</h1>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/' class="btn btn-primary btn-sm">Kembali</a>
            <a href='/buku' class="btn btn-warning btn-sm">Buku</a>
            <a href='/kategori' class="btn btn-danger btn-sm">Kategori</a>
        </div>
        <div class="d-flex justify-content-between">
            <a href="/full/create" class="btn btn-primary">+++</a>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    {{-- <th class="col-md-1">ID</th> --}}
                    <th class="col-md-1">Judul Buku</th>
                    <th class="col-md-1">Penulis Buku</th>
                    <th class="col-md-1">Kategori Buku</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        {{-- <td>{{ $item->id_full}}</td> --}}
                        <td>{{ $item->judul}}</td>
                        <td>{{ $item->penulis}}</td>
                        <td>{{ $item->kategori}}</td>
                        <td>
                            <a href='{{ url('/full/edit/' . $item->id_full) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus permanen data ini?')" class="d-inline"
                                action="{{ route('full.delete', $item->id_full) }}" method="post">
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
