<div class="content" ng-controller="addProduto_ctrl">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Adicionar Produtos</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nome do Produto</label>
                                        <input name="produto_nome" ng-model="produto.produto_nome" type="text" class="form-control" placeholder="Nome do Produto" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Preço </label>
                                        <input name="produto_preco" ng-model="produto.produto_preco" type="tel" class="form-control input-preco" placeholder="Preço do Produto">
                                    </div>
                                </div>
                            </div>


                            <!-- Select Basic -->
                            <div class="row">
                                <label class="col-md-12" for="Tipo">Tipo de produto</label>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <select id="Tipo" name="Tipo" class="form-control" ng-model="produto.produto_tipo">
                                        <option value="Camisa">Camisa</option>
                                        <option value="Shorts">Shorts</option>
                                        <option value="Meião">Meião</option>
                                        <option value="Outros">Outros</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12" style="margin-left: 2px">
                                    <h3>Variantes</h3>
                            </div>
                            </div>

                            <div ng-repeat="variante in produto.produto_variantes">
                                    <hr style="width: 100%" ng-show="$index > 0"/>
                                    <div ng-click="deleteVar($index)"
                                         style="position: relative;
                                                    right: 20px;
                                                    font-size: 2rem;
                                                    float: right;
                                                    cursor: pointer"
                                    >X</div>
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nome da variante</label>
                                            <input name="variante_nome" ng-model="variante.variante_nome" type="text" class="form-control" placeholder="Nome da variante" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tipo da variante</label>
                                            <select id="Tipo" name="Tipo" class="form-control" ng-model="variante.variante_tipo">
                                                <option value="Texto Curto">Texto Curto</option>
                                                <option value="Texto Longo">Texto Longo</option>
                                                <option value="Opções">Opções</option>
                                            </select>
                                        </div>
                                        </div>
                                </div>
                                    <div ng-repeat="opcao in variante.opcoes" ng-if="variante.variante_tipo == 'Opções'">
                                        <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Opção</label>
                                                <input name="opcao_nome" ng-model="opcao.opcao_nome" type="text" class="form-control" placeholder="Opção" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Preço</label>
                                                <input name="opcao_preco" ng-model="opcao.opcao_preco" type="tel" class="form-control input-preco-op preco-op-{{$parent.$index}}-{{$index}}" placeholder="Preço" >
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row" style="padding-left: 5px">
                                        <div class="col-md-12" >
                                            <button style="float: right" class="btn btn-info" ng-click="addMoreOp($index)" ng-if="variante.variante_tipo == 'Opções'"> Adicionar Opção </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 5px">
                                    <div class="col-md-12" >
                                        <button class="btn btn-success" ng-click="addMoreVar($index)">Adicionar mais Variantes</button>
                                    </div>
                                </div>
                            <div class="col-md-12">
                                <label>Comentários</label>
                                <div class="form-group">
                                    <textarea class="form-control" id="textarea" name="produto_comentario" ng-model="produto.produto_comentario"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-info btn-fill pull-right" ng-click="setProduto()"
                                    style="text-align: center;
                                    display: flex;
                                    align-items: center;" >
                                <div ng-show="loader_send" class="col-md-3 bg loader-img" style="  margin-right: 10px;   padding: 0 !important; width: auto; height: auto;">
                                    <div class="loader-all" id="loader-1"></div>
                                </div>Salvar
                            </button>
                            <div class="clearfix"></div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

