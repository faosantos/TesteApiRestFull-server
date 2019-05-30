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

                    You are logged in!
                </div>
                {{-- <div id="content-wrapper">
                    <div class="container-fluid">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Painel de controle
                            </li>
                            <li class="breadcrumb-item active">Aluno</li>
                        </ol>
            
                        <div class="card mb-3">
                            <div class="card-header" style="display:flex; justify-content: space-around;">
                                <div>
                                    <i class="fas fa-table"></i>
                                    Tabela de alunos
                                </div>
                                <div>
                                    <a href="/aluno/add" class="btn btn-outline-success">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <form action="/search/aluno" method="POST" style="max-widht:150px;">
                                    <div class="input-group mb-3">
                                        @csrf
                                        <input placeholder="Buscar por..." name="name" type="text" class="form-control" aria-label="Buscar por...">
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                @if(array_key_exists('success', $_GET) && $_GET['success'] == 'true')
                                    <div class="my-2">
                                        <div class="alert alert-success">
                                            Aluno criado com sucesso!
                                        </div>
                                    </div>
                                    @elseif(array_key_exists('success', $_GET) && $_GET['success'] == '2')
                                    <div class="my-2">
                                        <div class="alert alert-success">
                                            Aluno excluído  com secesso!
                                        </div>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Telefone</th>
                                                <th>Endereço</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($alunos as $item)
                                                <tr>
                                                    <td title="{{$item->id}}"">{{$item->id}}</td>
                                                    <td title="{{$item->name}}">
                                                        <a href="/aluno/{{$item->id}}">{{$item->name}}</a>
                                                    </td>
                                                    <td title="{{$item->phone_a}}">{{$item->phone_a}}</td>
                                                    <td title="{{$item->address}}">{{$item->address}}</td>
                                                    <td title="{{$item->type()}}">{{$item->type()}}</td>
                                                    <td class="dropdown">
                                                        <button
                                                            id="drop-menu-{{$item->id}}"
                                                            data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                            class="btn btn-outline-dark dropdown-toggle"
                                                        >
                                                            <i class="fa fa-user-cog"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="drop-menu-{{$item->id}}">
                                                            <a class="dropdown-item" href="/aluno/{{$item->id}}">
                                                                <i class="fa fa-eye"></i>
                                                                Ver Mais
                                                            </a>
                                                            <button onclick="callDelete({{$item->id}})" class="dropdown-item text-danger">
                                                                <i class="far fa-trash-alt"></i>
                                                                Deletar
                                                            </button>
                                                            <a class="dropdown-item text-success" href="/aluno/add/{{$item->id}}">
                                                                <i class="fa fa-plus"></i>
                                                                Adicionar Turma
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7">
                                                            <span>Nenhum aluno encontrado</span>
                                                        </td>
                                                    </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    @if ($alunos instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                        {{ $alunos->links() }}
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="card-footer small text-muted">Ultimo update {{date('d/m/Y')}}</div>
                        </div>
                    </div>     --}}
            </div>
        </div>
    </div>
</div>
@endsection
