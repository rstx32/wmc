<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terjawab extends Model
{
    protected $table = "terjawab";
    protected $fillable = [
        'soal', 'peserta',
    ];
}
