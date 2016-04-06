@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-12">
        <div class="col-md-3 ">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias</div>

                <div class="panel-body">
                    <form  role="form" method="POST" action="{{ url('/ilustracoes/pesquisar/') }}">
                        {!! csrf_field() !!}

                        {!!Form::select('id_categoria', $categorias, null, ['class' => 'form-control'])!!} 

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>Pesquisar
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading">Ilustrações </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Categoria</th>
                            <th>Ilustração</th>
                            <th>Fonte de Matéria</th>
                        </tr>
                        @forelse($data as $ilustra)
                        <tr>
                            <td>{{$ilustra->categoria}}</td>
                            <td>{{$ilustra->descricao}}</td>
                            <td>{{$ilustra->fonte}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="500">Nenhuma Ilustraçao encontrada!</td>
                        </tr>
                        @endforelse
                    </table>

                    <nav>
                        {!!$data->render()!!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
