<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $fillable = ['id', 'judul', 'penulis'];

    public function full(){
        return $this->hasMany(full::class, 'id_buku', 'id');
    }
}
