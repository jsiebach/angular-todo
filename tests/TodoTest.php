<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TodoTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testShowTodosInList()
    {
        factory(App\TodoList::class, 5)
            ->create()
            ->each(function($tl) {
                $tl->todos()->saveMany(factory(App\Todo::class, 3)->make());
            });

        $this->json('get','/api/v1/todoList/1/todo')
            ->seeJsonStructure([
                '*' => [
                    'id',
                    'todo_list_id',
                    'task',
                    'due_date',
                    'priority',
                    'status',
                    'created_at',
                    'updated_at',
                    'deleted_at'
                ]
            ])
            ->assertResponseStatus(200);
    }

    public function testShowAllTodoListsAndTodos()
    {
        factory(App\TodoList::class, 5)
            ->create()
            ->each(function($tl) {
                $tl->todos()->saveMany(factory(App\Todo::class, 3)->make());
            });

        $this->json('get','/api/v1/todoList')
            ->seeJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'icon',
                    'todos' => [
                        '*' => [
                            'id',
                            'todo_list_id',
                            'task',
                            'due_date',
                            'priority',
                            'status',
                            'created_at',
                            'updated_at',
                            'deleted_at'
                        ]
                    ]
                ]
            ])
            ->assertResponseStatus(200);
    }

    public function testAddTodoToList()
    {
        factory(App\TodoList::class)->create();

        $todo = factory(App\Todo::class)->make();

        $this->json('post','/api/v1/todoList/1/todo',$todo->getAttributes())
            ->seeJsonStructure([
                'id',
                'todo_list_id',
                'task',
                'due_date',
                'priority',
                'status',
                'created_at',
                'updated_at'
            ])
            ->seeInDatabase('todos',[
                'id'=>1,
                'todo_list_id'=>1
            ])
            ->assertResponseStatus(200);
    }

    public function testDeleteTodo(){
        factory(App\TodoList::class)->create()
            ->todos()->create(factory(App\Todo::class)->make()->getAttributes());

        $this->json('delete','/api/v1/todoList/1/todo/1')
            ->seeJsonStructure([
                'id',
                'todo_list_id',
                'task',
                'due_date',
                'priority',
                'status',
                'created_at',
                'updated_at',
                'deleted_at'
            ])
            ->dontSeeInDatabase('todos',[
                'id'=>1,
                'todo_list_id'=>1,
                'deleted_at'=>null
            ])
            ->assertResponseStatus(200);
    }

    public function testEditTodo(){
        factory(App\TodoList::class)->create()
            ->todos()->create(factory(App\Todo::class)->make([
                'task' => 'Bad',
                'priority' => 'high',
                'status' => 'not_complete'
            ])->getAttributes());

        $this->json('patch','/api/v1/todoList/1/todo/1',[
            'task'=>'Good',
            'priority'=>'low',
            'status'=>'complete',
            'due_date'=>'2000-01-01 00:00:00'
        ])
            ->seeJsonContains([
                'id'=>1,
                'todo_list_id'=>"1",
                'task'=>'Good',
                'priority'=>'low',
                'status'=>'complete',
                'due_date'=>'2000-01-01 00:00:00'
            ])
            ->seeInDatabase('todos',[
                'id'=>1,
                'todo_list_id'=>1,
                'task'=>'Good',
                'priority'=>'low',
                'status'=>'complete',
                'due_date'=>'2000-01-01 00:00:00'
            ])
            ->assertResponseStatus(200);
    }
}
