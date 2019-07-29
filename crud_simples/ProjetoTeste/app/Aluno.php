<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $tablename = "alunos";
    protected $fillable = [
        'name', 'phone_a', 'phone_b', 'email', 'address', 'type', 'turno'
    ];
    
    // public function turmas()
    // {
    //     return $this->hasMany('App\Turma', 'aluno_id');
    // }
    public function type(){
        return $this->type == 't' ? 'Manhã' : 'Tarde';
    }
}
