<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetensiAtasan extends Model
{
    use HasFactory;

    public $fillable = ['kompetensi'];
    public $visible = ['kompetensi'];
    public $timestamps = true;

    // membuat relasi one to Many ke model buku
    public function pertanyaanAtasan(){
        // data model Penulis bisa memiliki banyak data
        // dari model Buku melalui fk 'id_penulis'
        return $this->hasMany(PertanyaanAtasan::class, 'id_kompetensi');
    }
}
