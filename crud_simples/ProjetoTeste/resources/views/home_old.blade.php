@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <a href="{{route('dash.aluno')}}">
                            <i class="fa fa-file-text"> Entrar no Sistema</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
