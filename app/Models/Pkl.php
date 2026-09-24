<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nis', 'id_perusahaan', 'id_pic', 'tgl_mulai', 'tgl_selesai', 'status', 'nilai_1', 'nilai_2', 'nilai_3', 'nilai_4', 'rata_rata'])]
class Pkl extends Model
{
    protected $primaryKey = 'id_pkl';

    protected function casts(): array
    {
        return [
            'tgl_mulai' => 'date',
            'tgl_selesai' => 'date',
        ];
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function pic()
    {
        return $this->belongsTo(User::class, 'id_pic', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class, 'id_pkl', 'id_pkl');
    }
}
