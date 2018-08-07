<div class="content" ng-controller="pedido_ctrl">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Pedido</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input style="display: none" class="id-pedido" value="<?=$id?>">
                                        <label>Nome do Usuário</label>
                                        <input name="cliente_username" disabled type="text" class="form-control" placeholder="Nome do Usuário" value="{{pedido.cliente_username}}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Email</label>
                                        <input name="cliente_email" disabled type="email" class="form-control" placeholder="Email" value="{{pedido.cliente_email}}">
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Valor do frete</label>
                                            <input name="cliente_username" id="frete" type="text" class="form-control" placeholder="Valor do frete" ng-model="pedido.pedido_frete">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >desconto</label>
                                            <input name="cliente_email" id="desconto" type="text" class="form-control" placeholder="Desconto" ng-model="pedido.pedido_desconto">
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Status do pedido: </label>
                                        <span style="color: green;" ng-class="{'error-text': pedido.pedido_status == 'Cancelado', 'processo-text': pedido.pedido_status == 'Em processo'}">{{pedido.pedido_status}}</span>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <!-- Button (Double) -->
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="button1id"></label>
                                                    <div class="col-md-8">
                                                        <button id="processo" name="button1id" class="btn btn-primary" ng-click="changeStatus('Em processo')">Em processo</button>
                                                        <button id="pronto" name="button1id" class="btn btn-success" ng-click="changeStatus('Pronto')">Pronto</button>
                                                        <button id="cancelado" name="button2id" class="btn btn-danger" ng-click="changeStatus('Cancelado')">Cancelado</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div ng-repeat="produto in pedido.produtos">
                                <hr style="width: 100%" ng-show="$index > 0"/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Produto</label>
                                            <input disabled name="produto" index-prod="{{$index}}" id="tags" value="{{produto.produto_nome}}" type="text" class="form-control" placeholder="Nome do produto">
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{var.variante_index}}</label>
                                            <input disabled type="text" class="form-control" value="{{var.variante_value}}">
                                        </div>
                                    </div>

                                </div>
                                    <div class="row">
                                        <div class="col-md-12" style="margin-left: 2px">
                                            <h3>Unidades</h3>
                                        </div>
                                    </div>
                                    <div ng-repeat="camisa in produto.camisas">
                                        <hr style="width: 100%" ng-show="$index > 0"/>
                                        <div ng-click="deleteCamisaPrinc(camisa.camisa_id,$parent.$index, $index)"
                                             style="position: relative;
                                                    right: 20px;
                                                    font-size: 2rem;
                                                    float: right;
                                                    cursor: pointer"
                                        >X</div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nome na Camisa</label>
                                                <input name="camisa_nome" ng-model="camisa.camisa_nome" type="text" class="form-control" placeholder="Nome" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tamanho</label>
                                                <input name="camisa_tamanho" ng-model="camisa.camisa_tamanho" type="text" class="form-control" placeholder="Tamanho" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Numero</label>
                                                <input name="camisa_numero" ng-model="camisa.camisa_numero" type="text" class="form-control" placeholder="Numero" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Short</label>
                                                <input name="camisa_short" ng-model="camisa.camisa_short" type="text" class="form-control" placeholder="Short" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Comentários ( Sobre a unidade )</label>
                                            <div class="form-group">
                                                <textarea class="form-control" id="textarea" name="camisa_comentario" ng-model="camisa.camisa_comentario"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div ng-repeat="camisa in insertCamisa | filter : {produto_id: produto.produto_id}">
                                        <hr style="width: 100%" />
                                        <div ng-click="deleteCamisa($index)"
                                             style="position: relative;
                                                    right: 20px;
                                                    font-size: 2rem;
                                                    float: right;
                                                    cursor: pointer"
                                        >X</div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nome na Camisa</label>
                                                <input name="camisa_nome" ng-model="camisa.camisa_nome" type="text" class="form-control" placeholder="Nome na camisa" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tamanho</label>
                                                <input name="camisa_tamanho" ng-model="camisa.camisa_tamanho" type="text" class="form-control" placeholder="Tamanho" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Numero</label>
                                                <input name="camisa_numero" ng-model="camisa.camisa_numero" type="text" class="form-control" placeholder="Numero" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Short</label>
                                                <input name="camisa_short" ng-model="camisa.camisa_short" type="text" class="form-control" placeholder="Short" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Comentários ( Sobre a camisa )</label>
                                            <div class="form-group">
                                                <textarea class="form-control" id="textarea" name="camisa_comentario" ng-model="camisa.camisa_comentario"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row" style="padding-left: 5px">
                                        <div class="col-md-12" >
                                            <button class="btn btn-success" ng-click="addMoreCamisas(produto.produto_id)">Adicionar mais Camisas</button>
                                        </div>
                                    </div>
                                    <h3 style="margin-left: 2px">Imagens</h3>
                                    <div class="content-imgs-prods">
                                        <div class="col-md-6" ng-repeat="img in produto.imgs" style="margin-bottom: 20px">
                                            <div class="form-group">
                                                <label class="label-img-pedido" for='selecao-arquivo-{{$parent.$index}}'>
                                                    <input class="parent-index-img" ng-value="$parent.$index" style="display: none">
                                                    <input class="index-img" ng-value="$index" style="display: none">
                                                    <img style="width: 100%; height: 100%" id="img-element" src="<?= base_url('upload/produtos/img/' )?>{{img.src}}">
                                                    <div ng-click="deleteImgs(img.img_id,$parent.$index,$index)" style="position: absolute; top: 10px; right: 20px;color: blue; font-size: 3rem">X</div>
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px" ng-repeat="img in insertImg | filter : {produto_id: produto.produto_id}">
                                            <div class="form-group">
                                                <label class="label-img-pedido" for='selecao-arquivo-{{$parent.$index}}'>
                                                    <input class="parent-index-img" ng-value="$parent.$index" style="display: none">
                                                    <div class="more-img">+</div>
                                                    <input style="display: none" id='selecao-arquivo-{{$parent.$index}}' class="{{$parent.$index}} selecao-arquivo" type='file'>
                                                    <img id="img-element" class="{{produto.produto_id}}">
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
                            <button class="btn btn-info btn-fill pull-right" ng-click="updatePedido()"
                                    style="text-align: center;
                                    display: flex;
                                    align-items: center;margin: 10px" >
                                <div ng-show="loader_send" class="col-md-3 bg loader-img" style="  margin-right: 10px;   padding: 0 !important; width: auto; height: auto;">
                                    <div class="loader-all" id="loader-1"></div>
                                </div>Salvar
                            </button>
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