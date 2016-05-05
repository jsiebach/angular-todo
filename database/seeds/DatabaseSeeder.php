<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\TodoList::class, 5)
            ->create()
            ->each(function($tl) {
                $tl->todos()->saveMany(factory(App\Todo::class, 3)->make());
            });
    }
}
