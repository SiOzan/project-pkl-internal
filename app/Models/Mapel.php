<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    public $fillable = ['nama_pelajaran'];
    public $visible = ['nama_pelajaran'];
    public $timestamps = true;

    // membuat relasi one to Many ke model buku
    public function guru(){
        // data model Penulis bisa memiliki banyak data
        // dari model Buku melalui fk 'id_penulis'
        return $this->hasMany(Guru::class, 'id_mapel');
    }
}
