
@extends('layouts.dash')
@section('content')
@include('dash.turmas.modal')
    <div id="content-wrapper" class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 mx-auto mb-5">
                    @if(array_key_exists('success', $_GET) && $_GET['success'] == '2')
                    <div class="my-2">
                        <div class="alert alert-success">
                            Turma criado com sucesso!
                        </div>
                    </div>
                    @elseif(array_key_exists('success', $_GET) && $_GET['success'] == '3')
                    <div class="my-2">
                        <div class="alert alert-success">
                            Equipamento adicionado corretamente.
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Turma - {{$turma->turma}}</span>
                        </div>
                        <div class="card-body text-center">
                            {{-- <i 
                                class="gt-{{
                                    $vehicle->type != 'truck' && $vehicle->type != 'utility'?
                                    $vehicle->type : 'fleet'
                                }}" 
                                style="font-size:5rem"
                            ></i><br>
                            <span>
                                @switch( $vehicle->type)
                                    @case('bike')
                                        <p>Moto</p>
                                        @break
                                    @case('car')
                                        <p>Carro</p>
                                        @break
                                    @case('truck')
                                        <p>Caminhão</p>
                                        @break
                                    @case('utility')
                                        <p>Utilitário</p>
                                        @break
                                @endswitch
                            </span> --}}
                            <p class="text-left">
                                Aluno: <b>{{$owner->name}}</b><br/>
                                Numero: <b>{{$turma->num_aluno}}</b><br/>
                                Turma: <b>{{$turma->turma}}</b><br/>
                                Série: <b>{{$turma->serie}}</b><br/>
                            </p>
                            <div class="row">
                                <button onclick="callDelete({{$turma->id}})" class="ml-auto mr-2 btn btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                    Deletar turma
                                </button>
                                <a href="/editar-turma/{{$turma->id}}" class="mr-auto btn btn-outline-warning">
                                    <i class="fa fa-edit"></i>
                                    Editar turma
                                </a>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                    <div class="my-3">
                        {{-- @if($equipment)
                            <div class="card">
                                <div class="card-header">
                                    Equipamento
                                </div>
                                <div class="card-body">
                                    <p>
                                        Numero de série: <b>{{$equipment->serial_num}}</b><br/>
                                        Model: <b>{{$equipment->model}}</b><br/>
                                        ICCID: <b>{{$equipment->chip_num}}</b><br/>
                                        Número: <b>{{$equipment->phone_num}}</b><br/>
                                        Operadora: <b>{{$equipment->operator}}</b><br/>
                                        APN: <b>{{$equipment->apn}}</b>
                                    </p>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        @else
                            <a href="/equipamento/{{$vehicle->id}}" class="btn btn-outline-success">
                                <i class="fa fa-plus"></i>
                                Adicionar equipamento
                            </a>
                        @endif --}}
                    </div>
                </div>
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
        function deleteVehicle(){
            console.log('called delete for:' + curId);
            window.location.replace('/turma/delete/'+curId);
        }
    </script>
@endsection
