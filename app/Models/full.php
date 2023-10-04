<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class full extends Model
{
    use HasFactory;

    protected $table = 'full';
    protected $primaryKey = 'id';
    protected $fillable = [
        "id_buku",
        "id_kategori"

    ];


    public function buku()
    {
        return $this->hasMany(buku::class, 'id_buku', 'id');
    }

    public function bukukategori()
    {
        return $this->hasMany(bukukategori::class, 'id_kategori', 'id');
    }
}
