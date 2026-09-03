<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama_perusahaan', 'alamat'])]
class Perusahaan extends Model
{
    protected $primaryKey = 'id_perusahaan';
}
