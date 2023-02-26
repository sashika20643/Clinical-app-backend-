<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waitinglist extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'u_id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'c_id');
    }
    protected $fillable = [
        'c_id',
        'u_id',
        'date',
        'possition',

    ];
}
