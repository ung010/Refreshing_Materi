<?php

namespace App\Http\Controllers;

use App\Models\bukukategori as ModelsBukukategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BukuKategori extends Controller
{
    public function index()
    {
        $data = DB::select('SELECT * FROM bukukategori');
        return view('bukukategori.index')
            ->with('data', $data);
    }

    public function create()
    {
        $data = ModelsBukukategori::all();
        return view('bukukategori.create', compact('data'));
    }

    public function store(Request $request)
    {
        Session::flash('kategori', $request->kategori);

        $request->validate([
            'kategori' => 'required',
        ], [
            'kategori.required' => 'Kategori buku wajib diisi',
        ]);
        DB::insert(
            'INSERT INTO bukukategori(kategori) VALUES (:kategori)',
            [
                'kategori' => $request->kategori,
            ]
        );
        return redirect()->route('bukukategori.index')->with('success', 'Berhasil menambahkan kategori baru!');
    }

    public function edit($id)
    {
        $data = DB::table('bukukategori')->where('id', $id)->first();
        return view('bukukategori.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'kategori' => 'required',
        ], [
            'kategori.required' => 'Kategori buku wajib diisi',
        ]);
        DB::update(
            'UPDATE bukukategori SET kategori = :kategori WHERE id = :id',
            [
                'id' => $id,
                'kategori' => $request->kategori,
            ]
        );
        return redirect()->route('bukukategori.index')->with('success', 'Berhasil update kategori!');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM bukukategori WHERE id = :id', ['id' => $id]);
        return redirect()->route('bukukategori.index')->with('success', 'Berhasil menghapus kategori!');
    }
}
