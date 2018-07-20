<div class="content" ng-controller="addPedido_ctrl">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Adicionar Usuário</h4>
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
                        <div ng-repeat="produto in produtos">
                            <hr style="width: 100%" ng-show="$index > 0"/>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Produto {{$index + 1}}</label>
                                        <input name="produto_nome" ng-model="produto.produto_nome" type="text" class="form-control" placeholder="Nome do produto" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Preço unitário</label>
                                        <input name="produto_unidade" ng-model="produto.produto_unidade" type="text" class="form-control" placeholder="Preço unitário" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="margin-left: 2px">
                                <h3>Camisas</h3>
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
                                <button class="btn btn-success" ng-click="addMoreProd()">Adicionar mais Produtos</button>
                                </div>
                            </div>
                            <button class="btn btn-info btn-fill pull-right" ng-click="setPedido()"
                                    style="text-align: center;
                                    display: flex;
                                    align-items: center;" >
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