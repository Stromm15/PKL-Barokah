<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([ 'nis', 'nama_siswa', 'jurusan_id', 'kelas', 'no_hp'])]
class Siswa extends Model
{
    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }
}
