<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukukategori extends Model
{
    use HasFactory;
    protected $table = "bukukategori";
    protected $fillable = ['id', 'kategori'];

    public function join(){
        return $this->hasMany(full::class, 'id_kategori', 'id');
    }
}
