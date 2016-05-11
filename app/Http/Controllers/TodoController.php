<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\TodoList;
use App\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\TodoList  $list
     * @return \Illuminate\Http\Response
     */
    public function index(TodoList $list)
    {
        return response()->json($list->todos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @param  \App\TodoList  $list
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request, TodoList $list)
    {
        $todo = $list->todos()->create($request->all());

        return response()->json($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TodoList  $list
     * @param  Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(TodoList $list, Todo $todo)
    {
        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @param  \App\TodoList  $list
     * @param  Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoList $list, Todo $todo, TodoRequest $request)
    {
        $todo->update($request->all());

        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TodoList  $list
     * @param  Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $list, Todo $todo)
    {
        $todo->delete();

        return response()->json($todo);
    }
}
