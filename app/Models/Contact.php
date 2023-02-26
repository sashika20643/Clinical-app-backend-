<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{

    protected $fillable = [

        'u_id',
        'message'


    ];
    use HasFactory;
}
