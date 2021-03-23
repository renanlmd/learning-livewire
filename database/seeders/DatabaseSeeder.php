<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)
            ->state([
                'email' => 'renan@gmail.com',
            ])
            ->withPersonalTeam()
            ->create();
        
        \App\Models\User::factory(5)
            ->withPersonalTeam()
            ->create();

        \App\Models\Book::factory(30)->create();

       
    }
}
