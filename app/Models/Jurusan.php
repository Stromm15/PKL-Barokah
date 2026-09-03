<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('jurusan')]
class Jurusan extends Model
{
    public function siswas(){
        return $this->hasMany(Siswa::class);
    }
}
