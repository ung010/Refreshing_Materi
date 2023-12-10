<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class suratTemplate extends Controller
{
    function index() {
        $data = User::first();
        return view('surat.index')->with('data', $data);
        
    }

    // function detail_buku($id){
    //     $data = buku::where('kode_gabungan_final', $id)->first();
    //     return view('buku.detail_buku')->with('data', $data);
    // }
}
