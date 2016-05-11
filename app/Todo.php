<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $fillable = ['task','due_date','priority','status'];

    public function todoList(){
        return $this->hasOne(TodoList::class);
    }
}
