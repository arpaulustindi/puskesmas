<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medrec extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien',
        'waktu',
        'soap',
        'profesi',
        'nama_terang'

    ];
}
