<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waitinglist extends Model
{
    use HasFactory;


    protected $fillable = [
        'c_id',
        'u_id',
        'date',
        'possition',

    ];
}
