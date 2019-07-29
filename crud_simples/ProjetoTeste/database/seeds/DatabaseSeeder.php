<?php

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
        // Usar somente quando for usar com seed
        DB::statement("SET foreign_key_checks = 0"); 
        
        $this->call([
            UsersTableSeeder::class,
            AlunosTableSeeder::class
        ]);
    }
}
