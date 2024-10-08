<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    public $fillable = ['nama', 'nip', 'jenis_kelamin', 'tanggal_lahir', 'id_mapel', 'mengajar_sejak', 'foto'];
    public $villable = ['nama', 'nip', 'jenis_kelamin', 'tanggal_lahir', 'id_mapel', 'mengajar_sejak', 'foto'];
    public $timestamps = true;

    public function penilaianGuru(){
        return $this->hasMany(PenilaianGuru::class, 'id_guru');
    }
    public function mapel(){
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    // menghapus foto
    public function deleteImage(){
        if ($this->foto && file_exists(public_path('images/foto/'. $this->foto))) {
            return unlink(public_path('images/foto/'. $this->foto));
        }
    }
}
