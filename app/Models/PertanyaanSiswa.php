<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanSiswa extends Model
{
    use HasFactory;

    public $fillable = ['pertanyaan', 'id_kompetensi'];
    public $villable = ['pertanyaan', 'id_kompetensi'];
    public $timestamps = true;

    public function kompetensiSiswa(){
        return $this->belongsTo(KompetensiSiswa::class, 'id_kompetensi');
    }
}
