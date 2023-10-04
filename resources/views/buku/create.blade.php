@extends('template/dasar')
@section('inti_data')
    <h1>Halaman Buat Buku</h1>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="d-flex justify-content-between">
            <a href="/buku" class="btn btn-primary">Kembali</a>
        </div>
        <form action='{{ route('buku.store') }}' method='post'>
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='judul' value="{{ Session::get('judul')}}" id="judul">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='penulis' value="{{ Session::get('penulis')}}" id="penulis">
                    </div>
                </div>    
                <div class="mb-3 row">
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                </div>
                </div>
            </div>
        </form>
    </div>
@endsection
