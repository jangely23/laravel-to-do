<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class priorities extends Model
{
    use HasFactory;

    public function todos(){
        return $this->hasMany(Todo::class,'priority_id');
    }

}
