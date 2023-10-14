@extends('template/dasar')
@section('inti_data')
<head>
    <title>Manager</title>
</head>

<h2>Halo : {{ auth()->user()->name }}</h2>
<a href="/home" class="btn btn-info">Home</a>
<a href="/logout" class="btn btn-danger">Log Out</a>   
@endsection

