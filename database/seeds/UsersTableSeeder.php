<?php

use Illuminate\Database\Seeder;

use Faker\Factory;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = factory(App\Section::class,'sections',15)->create();
        factory(App\User::class,'users',15)->create()->each(function ($user) use ($sections){
            $user->sections()->attach($sections[rand(0,count($sections)-1)]);
        });
    }
}
