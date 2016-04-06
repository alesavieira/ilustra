@extends('layouts.app')

@section('content')
<section class="contato">
    <div class="container text-center">
        <h1 class="titulo">Envie sua ilustração</h1>
        <div class="divider"></div>

        <p class="descricao">Se você conhece alguma ilustração que deseja compatilhar, você pode utilizar este formulário
            para enviar a ilustração para nós.</p>
        <p>As ilustrações passam por um processo de análise antes de serem incluídas no sistema.</p>

    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="form-horizontal" role="form">
            <form class="implement-form" method="POST" action="/contato" send="/contato">
                <div class="form-group">
                <input type="text" name="nome" placeholder="Informe seu Nome" class="form-control">
                </div>
                <div class="form-group">
                <input type="text" name="email" placeholder="Informe seu E-mail" class="form-control">
                 </div>
                <div class="form-group">
                <textarea name="ilustracao" placeholder="Descreva aqui a ilustração" class="form-control"></textarea> 
                </div>
                <div class="form-group">
                <input type="text" name="fonte" placeholder="Informe a fonte de pesquisa" class="form-control">
                </div>
                <input type="submit" name="enviar" value="Enviar" class="btn btn-primary">
            </form>
        </div>
    </div>
</section>
<!-- Fim da section contato -->
@endsection