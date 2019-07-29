<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Aluno;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('/dash/home');
        $alunos = Aluno::latest()->paginate(15);
        return view('dash.home', ['alunos' => $alunos]);
    }

    public function findAluno(Request $req)
    {
        if(Auth::check()){
            $obj = Aluno::
                where('email', 'like', '%'. $req->name . '%')
                ->orWhere('name', 'like', '%'. $req->name . '%')
                ->orWhere('address', 'like', '%'.$req->name.'%')
                ->get();
            return view('dash.home', ['alunos' => $obj]);
        }else{
            return redirect('/');
        }
    }
}
