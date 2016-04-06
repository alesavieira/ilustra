@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-12">
        <div class="col-md-3 ">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias</div>

                <div class="panel-body">
                    <form  role="form" method="GET" action="{{ url('/ilustracoes/pesquisar') }}">
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
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
