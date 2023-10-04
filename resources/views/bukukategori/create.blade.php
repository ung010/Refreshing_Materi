@extends('template/dasar')
@section('inti_data')
    <h1>Halaman Buat Kategori</h1>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="d-flex justify-content-between">
            <a href="/kategori" class="btn btn-primary">Kembali</a>
        </div>
        <form action='{{ route('bukukategori.store') }}' method='post'>
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='kategori' value="{{ Session::get('kategori')}}" id="kategori">
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
