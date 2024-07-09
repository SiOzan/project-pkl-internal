<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianGuru extends Model
{
    use HasFactory;

    public $fillable = ['id_user', 'id_guru', 'id_pertanyaanAtasan', 'id_pertanyaanGuru', 'id_pertanyaanSiswa', 'jawaban', 'kinerja'];
    public $villable = ['id_user', 'id_guru', 'id_pertanyaanAtasan', 'id_pertanyaanGuru', 'id_pertanyaanSiswa', 'jawaban', 'kinerja'];
    public $timestamps = true;

    public function pertanyaanAtasan(){
        return $this->belongsTo(PertanyaanAtasan::class, 'id_pertanyaanAtasan');
    }
    public function pertanyaanGuru(){
        return $this->belongsTo(PertanyaanGuru::class, 'id_pertanyaanGuru');
    }
    public function pertanyaanSiswa(){
        return $this->belongsTo(PertanyaanSiswa::class, 'id_pertanyaanSiswa');
    }
    public function Guru(){
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
