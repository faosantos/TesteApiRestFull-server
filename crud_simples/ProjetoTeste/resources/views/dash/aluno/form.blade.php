@extends('layouts.dash')
@section('content')
    <div id="content-wrapper" class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="card ml-auto mr-auto mb-3">
                    <div class="card-header"> Adicionar Aluno </div>
                    <div class="card-body">
                        <form method="POST" action="/aluno/add">
                            @csrf
                            @include('dash.includes.alunoform')
                            <button class="btn btn-outline-success btn-block" type="submit"> Salvar </button>
                        </form>
                    </div>
                    <div class="card-footer">

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
        var type = 'f';
        $('#phone_a').on('keydown', ()=>{
            $('#phone_a').mask('(00) 00000-0000');
        });
        $('#phone_b').on('keydown', ()=>{
            $('#phone_b').mask('(00) 00000-0000');
        });
        $('#turno').on('keydown', ()=>{
            if(type == 't'){
                $('#turno').mask('Manhã', {reverse: true});
            }else{
                $('#turno').mask('Tarde', {reverse: true});   
            }
        });
        function change(e){
            type = e.value == 'Manhã' ? 'm' : 't';
            if(type == 'm'){
                $('#place').html('Tarde');
                $('#turno').attr('placeholder', 'Tarde');
            }else{
                $('#place').html('Manhã');
                $('#turno').attr('placeholder', 'Manhã');
            }
        }
    </script>
@endsection