<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;
use Validator;
use Auth;

class AlunoController extends Controller
{
    public function create()
    {
        if(Auth::check()){
            $err=['err'=>[]];
            return view('dash.aluno.form', $err);
        }else{
            return redirect('/');
        }
    }
    public function store(Request $request)
    {
        $valid = [
            'name'=> 'required|string',
            'phone_a' => 'required',
            'email'=>'required|unique:alunos',
            'address'=>'required',
            // 'turno'=>'required',
            'type' => 'required'
        ];
        $messages = [
            'required' => 'preencha o campo :attribute',
            'email.unique' => 'Email já utilizado'
        ];
        $validator = Validator::make($request->all(), $valid, $messages);
        if ($validator->fails()) {
            $err = ['err' => $validator->errors()->toArray()];
            return view('dash.aluno.form', $err);
        }
        $user = [
            'name' => $request->name,
            'phone_a' => $request->phone_a,
            'phone_b' => $request->phone_b ? $request->phone_b : null,
            'email' => $request->email,
            'address' => $request->address,
            // 'turno' => $request->cpf_rg,
            'type' => $request->type === 'Tarde' ? 'm' : 't'
        ];
        $user = Aluno::create($user);
        if($user){
            return redirect('/?success=true');
        }else{
            return redirect('/aluno/add?success=false&msg=Algo deu errado, confirme os campos e tente novamente');
        }
    }
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $confirm = $aluno->delete();
        if($confirm)
            return redirect('/?success=2');
        else
            return redirect('/?success=false');
    }
    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        $turmas = $aluno->turmas()->get();
        return view('dash.aluno.view', ['aluno'=> $aluno, 'turmas'=>$turmas]);
    }
    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->name = $request->name;
        $aluno->phone_a = $request->phone_a;
        $aluno->phone_b = $request->phone_b;
        $aluno->email = $request->email;
        $aluno->address = $request->address;
        // $aluno->turno = $request->turno;
        $aluno->type = $request->type === 'Tarde' ? 't' : 'm';
        $success = $aluno->save();

        if($success){
            return redirect('/aluno/' . $id . '?success=true');
        }else{
            return redirect('/aluno/' . $id . '?success=false');
        }
    }
}
