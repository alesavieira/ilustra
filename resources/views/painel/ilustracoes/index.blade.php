@extends('painel.templates.index')

@section('content')

<h1 class="titulo-pg-painel">Listagem  das Ilustrações ({{$data->count()}}):</h1>

<div class="divider"></div>

<div class="col-md-12">
    <form class="form-padrao form-inline padding-20 form-pesquisa" method="POST" send="/painel/ilustracoes/pesquisar/">
        <a href="" class="btn-cadastrar" data-toggle="modal" data-target="#modalGestao"><i class="fa fa-plus-circle"></i> Cadastrar</a>
        <input type="text" placeholder="Pesquisa" class="texto-pesquisa">
    </form>

    @if( isset($palavraPesquisa) )
    <p>Resultados para a pesquisa <b>{{$palavraPesquisa}}</b></p>
    @endif
</div>

<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Categoria</th>
        <th>Ilustração</th>
        <th>Fonte de Matéria</th>
        <th width="120px;"></th>
    </tr>
    @forelse($data as $ilustra)
    <tr>
        <td>{{$ilustra->id}}</td>
        <td>{{$ilustra->categoria}}</td>
        <td>{{$ilustra->descricao}}</td>
        <td>{{$ilustra->fonte}}</td>
        <td>
            <a class="edit" onclick="edit('/painel/ilustracoes/editar/{{$ilustra->id}}')">
                <i class="fa fa-pencil-square-o" title="Editar Registro"></i>
            </a>
            <a class="delete" onclick="del('/painel/ilustracoes/deletar/{{$ilustra->id}}')">
                <i class="fa fa-times" title="Deletar Registro"></i>
            </a>
        </td>
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




<!-- Modal Para Gestão -->
<div class="modal fade" id="modalGestao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-padrao4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Gestão de Ilustrações</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning msg-war" role="alert" style="display: none"></div>
                <div class="alert alert-success msg-suc" role="alert" style="display: none"></div>

                <form class="form-padrao form-gestao" action="/painel/ilustracoes/adicionar" send="/painel/ilustracoes/adicionar">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label>Categoria</label>
                        {!!Form::select('id_categoria', $categoria, null, ['class' => 'form-control'])!!}
                    </div>
                    <div class="form-group">
                        <textarea name="descricao" required="required" id="ilustracao" rows="9" placeholder="Ilustração" class="form-control"></textarea>
                    </div>
                     <div class="form-group">
                        <input type="text" name="fonte" required="required" class="form-control" placeholder="Fonte de Matéria">
                    </div>
                    <div class="prelaoder" style="display: none">Enviando os dados, por favor aguarde...</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>

            </div>
            </form>
        </div>
    </div>
</div>

@endsection


@section('scripts')    
<script>
    var urlAdd = '/painel/ilustracoes/adicionar';
</script>
@endsection

