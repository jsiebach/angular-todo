<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TodoListTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testShowTodoList()
    {
        factory(App\TodoList::class)->create();

        $this->json('get','/api/v1/todoList/1')
            ->seeJsonStructure([
                'id',
                'name',
                'icon',
                'todos'
            ])
            ->assertResponseStatus(200);
    }

    public function testShowAllTodoLists()
    {
        factory(App\TodoList::class, 3)->create();

        $this->json('get','/api/v1/todoList')
            ->seeJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'icon',
                    'todos'
                ]
            ])
            ->assertResponseStatus(200);
    }

    public function testCreateTodoList()
    {
        $todo = factory(App\TodoList::class)->make();

        $this->json('post','/api/v1/todoList',$todo->getAttributes())
            ->seeJsonStructure([
                'id',
                'name',
                'icon',
                'todos'
            ])
            ->seeInDatabase('todo_lists',[
                'id'=>1
            ])
            ->assertResponseStatus(200);
    }

    public function testDeleteTodoList(){
        factory(App\TodoList::class)->create();

        $this->json('delete','/api/v1/todoList/1')
            ->seeJsonStructure([
                'id',
                'name',
                'icon',
                'todos'
            ])
            ->assertResponseStatus(200);
    }

    public function testEditTodoList(){
        factory(App\TodoList::class)->create([
            'name'=>'Bad',
            'icon'=>'fa-bad'
        ]);

        $this->json('patch','/api/v1/todoList/1',[
            'name'=>'Good',
            'icon'=>'fa-good'
        ])
            ->seeJsonContains([
                'id'=>1,
                'name'=>'Good',
                'icon'=>'fa-good'
            ])
            ->assertResponseStatus(200);
    }
}
