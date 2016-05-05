<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    public $with = ['todos'];

    public function todos(){
        return $this->hasMany(\App\Todo::class);
    }
}
