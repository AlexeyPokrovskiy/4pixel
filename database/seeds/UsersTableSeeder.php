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
        $sections = factory(App\Models\Section::class,'sections',15)->create();
        factory(App\Models\User::class,'users',15)->create()->each(function ($user) use ($sections){
            $user->sections()->attach($sections[rand(0,count($sections)-1)]);
        });
        factory(App\Models\User::class,'admin',1)->create();
    }
}
