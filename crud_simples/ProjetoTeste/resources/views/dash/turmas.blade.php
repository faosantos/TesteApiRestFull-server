@extends('layouts.dash')
@section('content')
    @include('dash.turmas.modal')
    <div id="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Painel de controle
                </li>
                <li class="breadcrumb-item active">Turma</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <div>
                        <i class="fas fa-table"></i>
                        Tabela de Turmas
                    </div>
                    <form action="/search/turma" method="POST" style="max-widht:150px;">
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
                    @if(array_key_exists('success', $_GET))
                        @switch($_GET['success'])
                            @case('true')
                                <div class="my-1">
                                    <div class="alert alert-success">Turma excluída com sucesso!</div>
                                </div>
                                @break
                            @case('2')
                                <div class="my-1">
                                    <div class="alert alert-success">Turma criada com sucesso!</div>
                                </div>
                                @break
                        @endswitch
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Número do aluno</th>
                                    <th>Turma</th>
                                    <th>Série</th>
                                    <th>Aluno</th>
                                    <th>Turno</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($turmas as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->num_aluno}}</td>
                                        <td>{{$item->turma}}</td>
                                        <td>{{$item->serie}}</td>
                                        <td>
                                            <a href="/aluno/{{$item->owner->id}}">{{$item->owner->name}}</a>
                                            {{-- <a href="/turma/{{$item->id}}">{{$item->equipment['chip_num']}}</a> --}}
                                        </td>
                                        <td>
                                             {{$item->owner->type== 't' ? 'Manhã' : 'Tarde'}}
                                        </td>
                                        <td class="dropdown">
                                            <button
                                                id="drop-menu-{{$item->id}}"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                class="btn btn-outline-dark dropdown-toggle"
                                            >
                                                <i class="fa fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="drop-menu-{{$item->id}}">
                                                <a class="dropdown-item" href="/turma/{{$item->id}}">
                                                    <i class="fa fa-eye"></i>
                                                    Ver Mais
                                                </a>
                                                <a class="dropdown-item text-warning" href="/editar-turma/{{$item->id}}">
                                                    <i class="fa fa-edit"></i>
                                                    Editar
                                                </a>
                                                <button onclick="callDelete({{$item->id}})" class="dropdown-item text-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                    Deletar
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">
                                                <span>Nenhumaturma encontrada</span>
                                            </td>
                                        </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @if($turmas instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{$turmas->links()}}
                        @endif
                </div>
                </div>
                <div class="card-footer small text-muted">Ultimo update {{date('d/m/Y')}}</div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © {{config('app.name')}} {{date('Y', time())}}</span>
            </div>
          </div>
        </footer>

      </div>
@endsection
@section('script')
<script>
    var curId;
    function callDelete(id){
        curId = id;
        $('#modal').modal('show');
        console.log(curId)
    }
    $('#modal').on('hidden.bs.modal', function (e) {
        curId = null;
        console.log(curId)
    });
    function deleteTurma(){
        console.log('called delete for:' + curId);
        window.location.replace('/turma/delete/'+curId);
    }
</script>
@endsection
