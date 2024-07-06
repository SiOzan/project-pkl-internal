<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanGuru extends Model
{
    use HasFactory;

    public $fillable = ['pertanyaan', 'id_kompetensi'];
    public $villable = ['pertanyaan', 'id_kompetensi'];
    public $timestamps = true;

    public function kompetensiGuru(){
        return $this->belongsTo(KompetensiGuru::class, 'id_kompetensi');
    }
}
