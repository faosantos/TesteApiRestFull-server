@extends('layouts.dash')
@section('content')
    <div id="content-wrapper" class="bg-light">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-9 ml-auto mr-auto">
                <div class="card mb-3">
                    <div class="card-header"> Adicionar Turma </div>
                    <div class="card-body">
                        <form method="POST" action="/turma/add/{{$turma}}">
                            @csrf
                            <div class="row">
                                @include('dash.includes.turmaform')
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
        $('#num_aluno').on('keydown', ()=>{
            $('#num_aluno').mask('AAA0000', {translation:{
                A:{pattern:/[A-Za-z]/}
            }});
        });
    </script>
@endsection
