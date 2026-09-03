<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id_pkl', 'nilai_perusahaan'])]
class Nilai extends Model
{
    protected $primaryKey = 'id_nilai';

    public function pkl()
    {
        return $this->belongsTo(Pkl::class, 'id_pkl', 'id_pkl');
    }
}
