
@extends('layouts.dash')
@section('content')
@include('dash.aluno.modal')
<div id="content-wrapper" class="bg-light">
    <div class="container-fluid">
        @if(array_key_exists('success', $_GET) && $_GET['success'] == 'true')
        <div class="my-2">
            <div class="alert alert-success">
                Aluno editado com sucesso!
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-5 ml-auto mb-5" style="left: -300px;">
                
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-graduation-cap"></i>
                        <label>ALUNO - {{$aluno->name}}</label>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/aluno/update/{{$aluno->id}}">
                            @csrf
                            <div>
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input
                                        type="text" 
                                        name="name"
                                        class="form-control"
                                        value="{{$aluno->name}}"
                                        required
                                    >
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="phone_a">Telefone 1</label>
                                    <input 
                                        type="text"
                                        name="phone_a"
                                        id="phone_a"
                                        class="form-control"
                                        value="{{$aluno->phone_a}}"
                                        required
                                    />
                                </div>
                            </div>
                            <div>
                                 <div class="form-group">
                                    <label for="phone_b">Telefone 2</label>
                                    <input 
                                        type="text"
                                        id="phone_b"
                                        name="phone_b"
                                        class="form-control"
                                        value="{{$aluno->phone_b}}"
                                        required
                                    />
                                 </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email"
                                        class="form-control"
                                        value="{{$aluno->email}}"
                                        required>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    @if($aluno->type == 't')
                                    <label for="turno">Tarde</label>
                                    @else
                                    <label for="turno">Manhã</label>
                                    @endif
                                    <input 
                                        type="text"
                                        id="type"
                                        name="type"
                                        class="form-control"
                                        value="{{$aluno->type}}"
                                        required
                                    />
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <input
                                        type="text"
                                        id="address"
                                        name="address"
                                        class="form-control"
                                        value="{{$aluno->address}}"
                                        required
                                    />
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-warning">
                                    <i class="fa fa-edit"></i> Editar
                                </button>
                                <button onclick="callDelete({{$aluno->id}})" type="button" class="btn btn-outline-danger">
                                    <i class="fa fa-user-minus"></i> Deletar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4 mr-auto mb-5">
                <div class="card">
                    <div class="card-header">
                        <label>Aluno - {{$aluno->name}}</label>
                    </div>
                    <div class="card-body">
                        @forelse ($turmas as $item)
                            <p>Número do aluno: <a href="/turma/{{$item->id}}">{{$item->num_aluno}}</a></p>
                        @empty
                            <p></p>
                        @endforelse
                        <p>Adicionar turma</p>
                        <a href="/turma/add/{{$aluno->id}}" class="btn btn-outline-success">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
    </div>
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
    var curId, type = "{{$aluno->type}}";
    function callDelete(id){
        curId = id;
        $('#modal').modal('show');
        console.log(curId)
    }
    $('#modal').on('hidden.bs.modal', function (e) {
        curId = null;
        console.log(curId)
    });
    function deleteAluno(){
        console.log('called delete for:' + curId);
        window.location.replace('/aluno/delete/'+curId);
    }
    $('#phone_a').on('keydown', ()=>{
        $('#phone_a').mask('(00) 00000-0000');
    });
    $('#phone_b').on('keydown', ()=>{
        $('#phone_b').mask('(00) 00000-0000');
    });
    $('#turno').on('keydown', ()=>{
        if(type == 'f'){
            $('#turno').mask('Manhã', {reverse: true});
        }else{
            $('#turno').mask('Tarde', {reverse: true});   
        }
    });
</script>
@endsection
