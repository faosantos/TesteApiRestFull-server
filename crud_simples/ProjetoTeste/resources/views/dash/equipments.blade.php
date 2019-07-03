@extends('layouts.dash')
@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    Painel de controle
                </li>
                <li class="breadcrumb-item active">Equipamentos</li>
            </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Tabela de equipamentos
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($equipments as $item)
                                <tr>
                                    <td title="{{$item->id}}"">{{$item->id}}</td>
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
                    @if($equipments instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $equipments->links() }}
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