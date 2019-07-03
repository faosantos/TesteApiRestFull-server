@extends('layouts.dash')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            @if (array_key_exists('success', $_GET) && $_GET['success'] == 'false')
                <div class="alert alert-danger">
                    Falha ao tentar criar equipamento
                </div>
            @endif
            <div class="row">
                <div class="col-12 col-sm-12 col-md-10 col-lg-8 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header"> Adicionar Equipamento </div>
                        <div class="card-body">
                            <form method="POST" action="/equipamento/{{$turma_id}}">
                                @csrf
                                <div class="row">
                                    @include('dash.includes.equipmentform')
                                </div>
                                <button class="btn btn-outline-success btn-block" type="submit"> Salvar </button>
                            </form>
                        </div>
                        <div class="card-footer"></div>
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
    </div>
@endsection
@section('script')
    <script>
        $('#phone_num').on('keydown', ()=>{
            $('#phone_num').mask('(00) 00000-0000')
        })
    </script>
@endsection
