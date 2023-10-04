<?php

namespace App\Http\Controllers;

use App\Models\full;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FullController extends Controller
{
    public function index(){
        $data = DB::table('full')
        ->join('buku', 'full.id_buku', '=', 'buku.id')
        ->join('bukukategori', 'full.id_kategori', '=', 'bukukategori.id')
        ->select('full.id_full', 'buku.judul', 'buku.penulis', 'bukukategori.kategori')
        ->get();

        return view('full.index')->with('data', $data);
    }

    public function create()
    {
        $data = full::all();
        return view('full.create', compact('data'));
    }

    public function store(Request $request)
    {
        Session::flash('id_buku', $request->id_buku);
        Session::flash('id_kategori', $request->id_kategori);

        $request->validate([
            'id_buku' => 'required',
            'id_kategori' => 'required',
        ], [
            'id_buku.required' => 'Id buku wajib diisi',
            'id_kategori.required' => 'Id kategori wajib diisi',
        ]);
        DB::insert(
            'INSERT INTO full(id_buku, id_kategori) VALUES (:id_buku, :id_kategori)',
            [
                'id_buku' => $request->id_buku,
                'id_kategori' => $request->id_kategori,
            ]
        );
        return redirect()->route('full.index')->with('success', 'Berhasil menambahkan data join!');
    }

    public function edit($id)
    {
        $data = DB::table('full')->where('id_full', $id)->first();
        return view('full.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_buku' => 'required',
            'id_kategori' => 'required',
        ], [
            'id_buku.required' => 'Id buku wajib diisi',
            'id_kategori.required' => 'Id kategori wajib diisi',
        ]);

        DB::update(
            'UPDATE full SET id_buku = :id_buku, id_kategori = :id_kategori WHERE id_full = :id',
            [
                'id' => $id,
                'id_buku' => $request->id_buku,
                'id_kategori' => $request->id_kategori,
            ]
        );
        return redirect()->route('full.index')->with('success', 'Berhasil update join!');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM full WHERE id_full = :id_full', ['id_full' => $id]);
        return redirect()->route('full.index')->with('success', 'Berhasil menghapus join!');
    }
}
