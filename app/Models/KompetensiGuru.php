<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetensiGuru extends Model
{
    use HasFactory;

    public $fillable = ['kompetensi'];
    public $visible = ['kompetensi'];
    public $timestamps = true;

    // membuat relasi one to Many ke model buku
    public function pertanyaanGuru(){
        // data model Penulis bisa memiliki banyak data
        // dari model Buku melalui fk 'id_penulis'
        return $this->hasMany(PertanyaanGuru::class, 'id_kompetensi');
    }
}
