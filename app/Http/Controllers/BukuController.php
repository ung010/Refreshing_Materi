<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    public function index()
    {
        $data = DB::select('SELECT * FROM buku');
        return view('buku.index')->with('data', $data);
    }

    public function create()
    {
        $data = buku::all();
        return view('buku.create', compact('data'));
    }

    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('penulis', $request->penulis);

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
        ], [
            'judul.required' => 'Judul buku wajib diisi',
            'penulis.required' => 'Penulis buku wajib diisi',
        ]);
        DB::insert(
            'INSERT INTO buku(judul, penulis) VALUES (:judul, :penulis)',
            [
                'judul' => $request->judul,
                'penulis' => $request->penulis,
            ]
        );
        return redirect()->route('buku.index')->with('success', 'Berhasil menambahkan data buku baru!');
    }

    public function edit($id)
    {
        $data = DB::table('buku')->where('id', $id)->first();
        return view('buku.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
        ], [
            'judul.required' => 'Judul buku wajib diisi',
            'penulis.required' => 'Penulis buku wajib diisi',
        ]);
        DB::update(
            'UPDATE buku SET judul = :judul, penulis = :penulis WHERE id = :id',
            [
                'id' => $id,
                'judul' => $request->judul,
                'penulis' => $request->penulis,
            ]
        );
        return redirect()->route('buku.index')->with('success', 'Berhasil update data buku!');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM buku WHERE id = :id', ['id' => $id]);
        return redirect()->route('buku.index')->with('success', 'Berhasil menghapus buku secara permanen');
    }
}
