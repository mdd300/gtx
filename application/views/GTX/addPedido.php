<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<div class="content" ng-controller="addPedido_ctrl">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Adicionar Pedido</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input style="display: none" class="    id-cliente" value="<?=$id?>">
                                        <label>Nome do Usuário</label>
                                        <input name="cliente_username" disabled type="text" class="form-control" placeholder="Nome do Usuário" value="<?=$cliente->cliente_username?>">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Email</label>
                                        <input name="cliente_email" disabled type="email" class="form-control" placeholder="Email" value="<?=$cliente->cliente_email?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Valor do frete</label>
                                        <input name="cliente_username" id="frete" type="text" class="form-control" placeholder="Valor do frete" ng-model="dataPedido.pedido_frete">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label >desconto</label>
                                        <input name="cliente_email" id="desconto" type="text" class="form-control" placeholder="Desconto" ng-model="dataPedido.pedido_desconto">
                                    </div>
                                </div>
                            </div>
                        <div ng-repeat="produto in produtos">
                            <hr style="width: 100%" ng-show="$index > 0"/>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Produto</label>
                                        <input name="produto" index-prod="{{$index}}" id="tags-{{$index}}" type="text" class="form-control" placeholder="Nome do produto">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Preço</label>
                                            <input name="produto" disabled  type="text" class="form-control" value="{{produto.produto_preco}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" ng-repeat="var in produto.variantes_produto">
                                <div  class="col-md-5">
                                    <div class="form-group">
                                        <label>{{var.variante_nome}}</label>
                                        <select id="Tipo" name="Tipo" class="form-control" ng-model="var.value">
                                            <option ng-repeat="option in var.opcoes" value="{{option.opcao_nome}}">{{option.opcao_nome}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-md-12" style="margin-left: 2px">
                                <h3>Unidades</h3>
                                    </div>
                                </div>
                            <div >
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tamanho</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Numero</label>
                                    </div>
                                </div>
                                <div class="col-md-2" ng-if="produto.variacao_selected == false">
                                    <div class="form-group">
                                        <button class="btn btn-success" ng-click="produto.variacao_selected = true">Adicionar Variação</button>
                                    </div>
                                </div>
                                <div class="col-md-3" ng-if="produto.variacao_selected == true">
                                    <div class="form-group">
                                        <input name="variante_pedido" ng-model="produto.variacao_unidade" type="text" class="form-control" placeholder="Digite o nome da Variação" >
                                    </div>
                                </div>

                            </div>
                                <div ng-repeat="camisa in produto.camisas">
                                    <hr style="width: 100%" ng-show="$index > 0"/>
                                    <div ng-click="deleteCamisa($parent.$index, $index)"
                                         style="position: relative;
                                                    right: 20px;
                                                    font-size: 2rem;
                                                    float: right;
                                                    cursor: pointer"
                                    >X</div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input name="camisa_nome" ng-model="camisa.camisa_nome" type="text" class="form-control" placeholder="Nome na camisa" >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input name="camisa_tamanho" ng-model="camisa.camisa_tamanho" type="text" class="form-control" placeholder="Tamanho" >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input name="camisa_numero" ng-model="camisa.camisa_numero" type="text" class="form-control" placeholder="Numero" >
                                        </div>
                                    </div>
                                    <div class="col-md-2" ng-if="produto.variacao_selected == true">
                                        <div class="form-group">
                                            <input name="camisa_short" ng-model="camisa.camisa_short" type="text" class="form-control" placeholder="{{produto.variacao_unidade}}" >
                                        </div>
                                    </div>
<!--                                    <div class="col-md-12">-->
<!--                                        <label>Comentários ( Sobre a unidade )</label>-->
<!--                                        <div class="form-group">-->
<!--                                            <textarea class="form-control" id="textarea" name="camisa_comentario" ng-model="camisa.camisa_comentario"></textarea>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                </div>
                                <div class="row" style="padding-left: 5px">
                                    <div class="col-md-12" >
                                        <button class="btn btn-success" ng-click="addMoreCamisas($index)">Adicionar mais Camisas</button>
                                    </div>
                                </div>
                                        <h3 style="margin-left: 2px">Imagens</h3>
                                <div class="content-imgs-prods">
                                <div class="col-md-6" ng-repeat="img in produto.imgs" style="margin-bottom: 20px">
                                    <div class="form-group">
                                        <label class="label-img-pedido" for='selecao-arquivo-{{$parent.$index}}'>
                                            <input class="parent-index-img" ng-value="$parent.$index" style="display: none">
                                            <input class="index-img" ng-value="$index" style="display: none">
                                            <div class="more-img">+</div>
                                            <input style="display: none" id='selecao-arquivo-{{$parent.$index}}' class="{{$parent.$index}} selecao-arquivo" type='file'>
                                            <img id="img-element">
                                            <div class="col-md-3 bg loader-img" style="display: none;     padding: 0 !important; width: auto; height: auto;">
                                                <div class="loader" id="loader-1"></div>
                                            </div>
                                        </label>

                                    </div>
                                </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Comentários</label>
                                    <div class="form-group">
                                        <textarea class="form-control" id="textarea" name="produto_comentario" ng-model="produto.produto_comentario"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row" >
                                <div class="col-md-12" >
                                <button class="btn btn-success" style="margin: 10px" ng-click="addMoreProd()">Adicionar mais Produtos</button>
                                </div>
                            </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-info btn-fill pull-right" ng-click="setPedido()"
                                    style="text-align: center;
                                    display: flex;
                                    align-items: center;margin: 10px" >
                                <div ng-show="loader_send" class="col-md-3 bg loader-img" style="  margin-right: 10px;   padding: 0 !important; width: auto; height: auto;">
                                    <div class="loader-all" id="loader-1"></div>
                                </div>Salvar
                            </button>
                        </div>
                    </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<script>

    var mask = {
        money: function() {
            var el = this
                ,exec = function(v) {
                v = v.replace(/\D/g,"");
                v = new String(Number(v));
                var len = v.length;
                if (1== len)
                    v = v.replace(/(\d)/,"0,0$1");
                else if (2 == len)
                    v = v.replace(/(\d)/,"0,$1");
                else if (len > 2) {
                    v = v.replace(/(\d{2})$/,',$1');
                }
                return v;
            };

            setTimeout(function(){
                el.value = exec(el.value);
            },1);
        }

    }

    $(function(){
        $('#frete').bind('keypress',mask.money)
    });

    $(function(){
        $('#desconto').bind('keypress',mask.money)
    });
</script>
