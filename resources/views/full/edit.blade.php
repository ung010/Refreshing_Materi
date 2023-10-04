@extends('template/dasar')
@section('inti_data')
    <h1>Halaman Edit Join </h1>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="d-flex justify-content-between">
            <a href="/full" class="btn btn-primary">Kembali</a>
        </div>
        <form action='{{ route('full.update', $data->id_full) }}' method='post'>
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="id_buku">ID Buku</label>
                    <select name="id_buku">
                        @foreach ($buku as $item)
                            <option value="{{ $item->id }}" {{ $data->id_buku == $item->id ? 'selected' : '' }} >{{ $item->judul }}</option>
                        @endforeach
                    </select>
                    {{-- <label for="id_buku" class="col-sm-2 col-form-label">ID Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='id_buku' value="{{ $data->id_buku }}" id="id_buku">
                    </div> --}}
                </div>
                <div class="mb-3 row">
                    <label for="id_kategori">ID Kategori</label>
                    <select name="id_kategori">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{ $data->id_kategori == $item->id ? 'selected' : '' }} >{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                    {{-- <label for="id_kategori" class="col-sm-2 col-form-label">ID Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='id_kategori' value="{{ $data->id_kategori }}" id="id_kategori">
                    </div> --}}
                </div>    
                <div class="mb-3 row">
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                </div>
                </div>
            </div>
        </form>
    </div>
@endsection
