<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\TodoList;
use App\Http\Requests\TodoListRequest;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TodoList::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TodoListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoListRequest $request)
    {
        $list = TodoList::create($request->all());

        $list->load('todos');

        return response()->json($list);
    }

    /**
     * Display the specified resource.
     *
     * @param  TodoList $list
     * @return \Illuminate\Http\Response
     */
    public function show(TodoList $list)
    {
        return response()->json($list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TodoListRequest  $request
     * @param  TodoList  $list
     * @return \Illuminate\Http\Response
     */
    public function update(TodoListRequest $request, TodoList $list)
    {
        $list->update($request->all());

        return response()->json($list);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $list)
    {
        $list->delete();

        return response()->json($list);
    }
}
