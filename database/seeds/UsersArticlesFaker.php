<?php

use Illuminate\Database\Seeder;

class UsersArticlesFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('articles')->truncate();

        factory(App\User::class, 50)->create()->each(function($user){
            $randomNumber = rand(1, 7);
            for($i=1; $i < $randomNumber; $i++){
                $user->articles()->save(factory(App\Article::class)->make());
            }
        });
    }
}
