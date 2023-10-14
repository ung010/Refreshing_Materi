@extends('template/dasar')
@section('inti_data')
    <h1>RnD Capstone</h1>
    <h2>nama akun : {{ auth()->user()->name }}</h2>
    <div class="my-3 p-3 bg-body rounded">
        <div class="pb-3">
            <a href="/buku" class="btn btn-primary">Buku</a>
            <a href="/kategori" class="btn btn-warning">Kategori</a>
            <a href="/full" class="btn btn-danger">Full</a>
            {{-- @if (Auth::user()->role == 'admin')
                <a href="/full" class="btn btn-danger">Full</a>
            @endif
            @if (Auth::user()->role == 'users')
                <a href="/kategori" class="btn btn-warning">Kategori</a>
            @endif
            @if (Auth::user()->role == 'manager')
                <a href="/buku" class="btn btn-primary">Buku</a>
            @endif --}}
        </div>
    </div>
    <div class="pb-3">
        <a href="/logout" class="btn btn-danger">Log Out</a>
    </div>
@endsection
