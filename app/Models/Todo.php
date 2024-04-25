<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\priorities;

class Todo extends Model
{
    use HasFactory;

    public function categorias(){
        return $this->belongsTo(Categoria::class, 'category_id');
    }

    public function priorities(){
        return $this->belongsTo(Priorities::class, 'priority_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
