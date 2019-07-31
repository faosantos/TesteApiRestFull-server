<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        // Cria usuários demo (dados faker)
        $this->createUsers();
    }

    public  function createUsers()
    {
         //usuario 1
         User::create([
            'name'      => 'Fernando Santos',
            'email'     => 't@t.com',
            'password'  => Hash::make("123456"),
        ]);
         // Exibe uma informação no console durante o processo de seed
         $this->command->info('Usuario 1 Fernando Santos criado com sucesso');
         //usuario 2
         User::create([
            'name'      => 'Patricia',
            'email'     => 'p@p.com',
            'password'  => Hash::make("123456"),
        ]);
         // Exibe uma informação no console durante o processo de seed
         $this->command->info('Usuario 2 Patricia criado com sucesso');
    }
}
