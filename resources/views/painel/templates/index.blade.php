<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>{{$titulo or 'Painel | Ilustrações com fonte de matéria'}}</title>

        <!--Início do Styles-->   
        @include('painel.includes.css')
        <!--Fim do Styles-->

        <!--JQuery-->
        <script src="{{url('js/jquery-2.1.4.min.js')}}"></script>
        <link rel="icon" type="image/png" href="{{url('imgs/favicon.ico')}}">


    </head>
    <body class="bg-padrao">

        <header>
            <h1 class="oculta">Painel | Ilustrações com fonte de matéria</h1>
        </header>

        <section class="painel">
            <h1 class="oculta">Painel | Ilustrações com fonte de matéria</h1>

            <div class="topo-painel col-md-12">
                <a href="" class="icon-acoes-painel">
                    <i class="fa fa-expand"></i>
                </a>

                


                <select class="acoes-painel">
                    <option value="{{Auth::user()->name}}">{{Auth::user()->name}}</option>
                    <option value="sair" class="sair">Sair</option>
                </select>
            </div>
            <!--End Top-->

            <div class="clear"></div>

            <!--Início do Menu-->   
            @include('painel.includes.menu')
            <!--End menu-->

            <section class="conteudo col-md-10">
                <div class="cont">
                    @yield('content')
                </div>
            </section>
            <!--End Conteúdo-->
        </section>

        <!-- Modal Para Deletar Algo -->
        <div class="modal fade" id="modalConfirmacaoDeletar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-padrao5">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Deletar</h4>
                    </div>
                    <div class="modal-body">
                        {!!Form::hidden('url-deletar', null, ['class' => 'url-deletar'])!!}
                        <div class="preloader-deletar" style="display: none;">Deletando, por favor aguarde!!!</div>
                        <p>Deseja realmente deletar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger btn-confirmar-deletar">Deletar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Final do Modal de Deletar -->


        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        


        <!-- Scripts personalizados -->
        @yield('scripts')

        <!-- Fim dos scripts personalizados-->   

        <script>

$(function () {
    jQuery("form.form-gestao").submit(function () {
        jQuery(".msg-war").hide();
        jQuery(".msg-suc").hide();

        var dadosForm = jQuery(this).serialize();

        jQuery.ajax({
            url: jQuery(this).attr("send"),
            data: dadosForm,
            type: "POST",
            beforeSend: iniciaPreloader()
        }).done(function (data) {
            finalizaPreloader();

            if (data == "1") {
                jQuery(".msg-suc").html("Sucesso ao Salvar!");
                jQuery(".msg-suc").show();

                setTimeout("jQuery('.msg-suc').hide();jQuery('#modalGestao').modal('hide');location.reload();", 4500);
            } else {
                jQuery(".msg-war").html(data);
                jQuery(".msg-war").show();

                setTimeout("jQuery('.msg-war').hide();", 4500);
            }
        }).fail(function () {
            finalizaPreloader();
            alert("Falha Inesperada!");
        });

        return false;
    });
});


function iniciaPreloader() {
    jQuery(".prelaoder").show();
}
function finalizaPreloader() {
    jQuery(".prelaoder").hide();
}


function edit(url) {
    jQuery.getJSON(url, function (data) {
        jQuery.each(data, function (key, val) {
            jQuery("input[name='" + key + "']").attr("value", val);
            jQuery(":input[type='password']").attr("value", "");



            if (jQuery("option[value='" + val + "']").val() == val) {
                jQuery("option[value='" + val + "']").attr("selected", true);
            }
            // Preencher Radios

        });
    });

    jQuery("#modalGestao").modal();

    jQuery("form.form-gestao").attr("send", url);
    jQuery("form.form-gestao").attr("action", url);

}


function del(url) {
    jQuery(".url-deletar").val(url);

    jQuery("#modalConfirmacaoDeletar").modal();
}

jQuery(".btn-confirmar-deletar").click(function () {
    var url = jQuery(".url-deletar").val();


    jQuery.ajax({
        url: url,
        type: "GET",
        beforeSend: inicializaPreloaderDeletar()
    }).done(function (data) {
        finalizaPreloaderDeletar();

        if (data == "1") {
            location.reload();
        } else if (data=="2")
        {
              jQuery(".preloader-deletar").html("Não é possível deletar um título parcialmente baixado");
                jQuery(".preloader-deletar").show();
                setTimeout("jQuery('.preloader-deletar').hide();", 4500);
                location.reload();
                
        }else{
            alert("Falha ao deletar");
        }
    }).fail(function () {
        finalizaPreloaderDeletar();
        alert("Falha ao enviar dados!");
    });
});

function inicializaPreloaderDeletar() {
    jQuery(".preloader-deletar").show();
}
function finalizaPreloaderDeletar() {
    jQuery(".preloader-deletar").hide();
}


jQuery("form.form-pesquisa").submit(function () {
    var textoPesquisa = jQuery(".texto-pesquisa").val();
    var url = jQuery(this).attr("send");

    location.href = url + textoPesquisa;

    return false;
});


jQuery(".acoes-painel").change(function () {
    if (jQuery(this).val() == "sair")
    {
        location.href = "{{url('/logout')}}";
    }
});

jQuery(".tipo-cliente").change(function () {
    if (jQuery(this).val() == "F")
    {
        jQuery(".pessoa-fisica").show();
        jQuery(".pessoa-juridica").hide();
    }
    if (jQuery(this).val() == "J")
    {
        jQuery(".pessoa-fisica").hide();
        jQuery(".pessoa-juridica").show();
    }

});


jQuery(".btn-cadastrar").click(function () {
    jQuery("form.form-gestao").attr("send", urlAdd);
    jQuery("form.form-gestao").attr("action", urlAdd);


    jQuery(":input[type='text']").attr("value", "");
    //  jQuery(":input[type='email']").attr("value", "");
    //  jQuery(":input[type='password']").attr("value", "");


});


        </script>

        <script type="text/javascript">
            //Efeito do Menu
            $(document).ready(function () {

                /* JQUERY PARA MENU HORIZONTAL */
                $("#menu li a").mouseover(function () {
                    var index = $("#menu li a").index(this);
                    $("#menu li").eq(index).children("ul").slideDown();

                    if ($(this).siblings('ul').size() > 0) {
                        return false;
                    }
                });

                $("#menu li").mouseleave(function () {
                    var index = $("#menu li").index(this);
                    $("#menu li").eq(index).children("ul").slideUp();
                });

                /* JQUERY PARA MENU VERTICAL */
                $("#menu-vertical li a").mouseover(function () {
                    var index = $("#menu-vertical li a").index(this);
                    $("#menu-vertical li").eq(index).children("ul").slideDown();

                    if ($(this).siblings('ul').size() > 0) {
                        return false;
                    }
                });

                $("#menu-vertical li").mouseleave(function () {
                    var index = $("#menu-vertical li").index(this);
                    $("#menu-vertical li").eq(index).children("ul").slideUp();
                });
            });
        </script>
    </body>
</html>