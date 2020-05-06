<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankSoal extends Model
{
    protected $table = "bank_soal";
    protected $fillable = [
        'soal', 'jawaban',
    ];
}
