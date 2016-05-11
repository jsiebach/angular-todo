<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    public $with = ['todos'];

    public $fillable = ['name','icon'];

    public function todos(){
        return $this->hasMany(Todo::class);
    }
}

