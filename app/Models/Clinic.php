<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{

    public function waitinglists()
    {
        return $this->hasMany(Waitinglist::class, 'c_id');
    }
    use HasFactory;
}
