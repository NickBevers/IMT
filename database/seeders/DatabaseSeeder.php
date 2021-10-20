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
        //Manier voor single entries
        
        $this->call([
            UserSeeder::class
        ]);

        //Manier voor mass entries

        \App\Models\Nft::factory(80)->create();
        \App\Models\Collection::factory(5)->create();
        \App\Models\Comment::factory(20)->create();
    }
}
