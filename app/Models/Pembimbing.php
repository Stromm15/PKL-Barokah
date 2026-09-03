<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama_pembimbing', 'no_hp'])]
class Pembimbing extends Model
{
    protected $primaryKey = 'id_pembimbing';
}
