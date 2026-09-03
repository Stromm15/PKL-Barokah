<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama_perusahaan', 'alamat'])]
class Perusahaan extends Model
{
    protected $primaryKey = 'id_perusahaan';

    public function pkls()
    {
        return $this->hasMany(Pkl::class, 'id_perusahaan', 'id_perusahaan');
    }
}
