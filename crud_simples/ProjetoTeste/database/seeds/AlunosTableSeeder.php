<?php

use Illuminate\Database\Seeder;

class AlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Aluno::class, 30)->create()->each(function($aluno){
            $aluno->turmas()
            ->save(
                factory(App\Turma::class)->make()
            );
        });
    }
}
