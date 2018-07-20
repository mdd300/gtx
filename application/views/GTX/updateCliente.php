<input style="display: none" value="<?=$id?>" id="user_id">
<div class="content" ng-controller="updateCliente_ctrl">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Adicionar Usuário</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome do Usuário</label>
                                        <input name="cliente_username" ng-model="cliente.cliente_username" type="text" class="form-control" placeholder="Nome do Usuário" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input name="cliente_email" ng-model="cliente.cliente_email" type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" ng-model="cliente.cliente_nome" name="cliente_nome" class="form-control" placeholder="Nome" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" ng-model="cliente.cliente_sobrenome" name="cliente_sobrenome" class="form-control" placeholder="Sobrenome" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" ng-model="cliente.cliente_telefone" name="cliente_telefone" class="form-control" placeholder="Telefone" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CPF/CNPJ</label>
                                        <input type="text" ng-model="cliente.cliente_doc" name="cliente_doc" class="form-control" placeholder="Telefone" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" ng-model="cliente.cliente_endereco" name="cliente_endereco" class="form-control" placeholder="Endereço" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input type="text" ng-model="cliente.cliente_cep" name="cliente_cep" class="form-control" placeholder="CEP">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" ng-model="cliente.cliente_cidade" name="cliente_cidade" class="form-control" placeholder="Cidade" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" ng-model="cliente.cliente_estado" name="cliente_estado" class="form-control" placeholder="Estado" >
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-info btn-fill pull-right" ng-click="updateCliente()"
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