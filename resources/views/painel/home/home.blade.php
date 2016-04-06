
  @extends('painel.templates.index')

@section('content')

<h1 class="titulo-pg-painel">Dashboard</h1>

<div class="divider"></div>

<div class="conteudo-listagens">
    <div class="Dashboard1 col-md-6">
       <i class="fa fa-floppy-o"></i><p class="principal"><a class="Dashboard" href="{{url('/painel/categorias')}}"><b>Categorias Cadastradas: {{$cat}}</b></a></p>
    </div>
    <div class="Dashboard2 col-md-6">
        <i class="fa fa-file-text"></i><p class="principal"><a class="Dashboard" href="{{url('/painel/ilustracoes')}}"><b>Ilustrações Cadastradas: {{$ilustra}}</b></a></p>
    </div>
    
</div>


@endsection
