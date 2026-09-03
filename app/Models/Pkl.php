<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nis', 'id_perusahaan', 'id_pembimbing'])]
class Pkl extends Model
{
    protected $primaryKey = 'id_pkl';

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class, 'id_pembimbing', 'id_pembimbing');
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
