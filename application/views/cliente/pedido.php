
<script>



    $(function(){
        $('#frete').keypress(function(evt){
            console.log()
            if ($(this).val(.length === 0) {
                $(this).val();
            }
            else
            return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
        })
    });

    $(function(){
        $('#desconto').keypress(function(evt){
            if ($("#desconto").val().trim().length === 0) {
                $("#desconto").val(0);
            }
            else
            return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
        })
    });

</script>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Pedido N˚</label>
                                        <input name="pedido_id" type="text" class="form-control pedido_id" placeholder="Pedido" ng-model="pedido.pedido_id">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Data Pedido</label>
                                        <input name="pedido_data" type="text" class="form-control pedido_data" placeholder="Data" ng-model="pedido.pedido_data">
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >Data de entrega</label>
                                            <input name="pedido_data_entrega" disabled type="text" class="form-control pedido_data_entrega" placeholder="pedido_data_entrega" ng-model="pedido.pedido_data_entrega">
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valor do frete</label>
                                        <input disabled id="frete" type="number" class="form-control" placeholder="Valor do frete" value="{{pedido.pedido_frete}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Desconto</label>
                                        <input disabled id="desconto" type="number" class="form-control" placeholder="Desconto" value="{{pedido.pedido_desconto}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Status do pedido: </label>
                                        <span style="color: green;" ng-class="{'error-text': pedido.pedido_status == 'Cancelado', 'processo-text': pedido.pedido_status == 'Em processo'}">{{pedido.pedido_status}}</span>
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
                                    <div class="col-md-2" ng-if="produto.variacao_selected == true">
                                        <div class="form-group">
                                            <label>Numero</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5" ng-if="produto.variacao_selected == false">
                                        <div class="form-group">
                                            <label>Numero</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3" ng-if="produto.variacao_selected == true">
                                        <div class="form-group">
                                           <label>{{produto.variacao_unidade}}</label>
                                        </div>
                                    </div>

                                </div>
                                    <div ng-repeat="camisa in produto.camisas">

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
                                        <div class="col-md-2" >
                                            <div  class="form-group" >
                                                <label style="cursor: pointer;" ng-click="deleteCamisaPrinc(camisa.camisa_id,$parent.$index, $index)">X</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3" ng-if="produto.variacao_selected != true">
                                            <div class="form-group">
<!--                                                <input name="camisa_short" ng-model="camisa.camisa_short" type="text" class="form-control" placeholder="{{produto.variacao_unidade}}" >-->
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
                    <div class="col-md-12">
                        <h2 style="float: right"><b>Total: </b> {{total}}</h2>
                    </div>
                    <button class="btn btn-info btn-fill pull-right" ng-click="updatePedido()"
                            style="text-align: center;
                                    display: flex;
                                    align-items: center;margin: 10px" >
                        <div ng-show="loader_send" class="col-md-3 bg loader-img" style="  margin-right: 10px;   padding: 0 !important; width: auto; height: auto;">
                            <div class="loader-all" id="loader-1"></div>
                        </div>Salvar
                    </button>
                    <button class="btn btn-danger btn-fill pull-right"
                            style="text-align: center;
                                    display: flex;
                                    align-items: center;margin: 10px" data-toggle="modal" data-target="#visualizar">
                        <div ng-show="loader_send" class="col-md-3 bg loader-img" style="  margin-right: 10px;   padding: 0 !important; width: auto; height: auto;">
                            <div class="loader-all" id="loader-1"></div>
                        </div>Visualizar
                    </button>
                    <button class="btn btn-warning btn-fill pull-right"
                            style="text-align: center;
                                    display: flex;
                                    align-items: center;margin: 10px" data-toggle="modal" data-target="#Gerar">
                        <div ng-show="loader_send" class="col-md-3 bg loader-img" style="  margin-right: 10px;   padding: 0 !important; width: auto; height: auto;">
                            <div class="loader-all" id="loader-1"></div>
                        </div>Gerar PDF
                    </button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        <style>
            .modal-backdrop {
                position: initial;
                z-index: 1040 !important;
            }
            .modal-dialog {
                z-index: 1100 !important;
            }
        </style>
        <div class="modal fade" id="visualizar" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Salvar o Pedido?</h4>
                    </div>
                    <div class="modal-body">
                        <p>É preciso salvar o pedido para gerar o PDF, deseja salvar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success" ng-click="visualizarPDF()">Salvar</button>
                    </div>

                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="Gerar" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Salvar o Pedido</h4>
                    </div>
                    <div class="modal-body">
                        <p>É preciso salvar o pedido para gerar o PDF, deseja salvar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success" ng-click="GerarPDFPedido()">Salvar</button>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>public/assetsBoot/js/jquery.mask.min.js"></script>
<script>
    $(function(){
        $(".pedido_data_entrega").mask("99/99/9999");
        $(".pedido_data").mask("99/99/9999");
    });
</script>