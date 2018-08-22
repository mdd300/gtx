<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<div class="content" ng-controller="addCliente_ctrl">
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" ng-model="cliente.cliente_telefone" name="cliente_telefone" class="form-control" placeholder="Telefone" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="text" ng-model="cliente.cliente_nasc" name="cliente_nasc" class="form-control data" placeholder="Data de Nascimento" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input type="text" id="cpfcnpj" ng-model="cliente.cliente_doc" name="cliente_cpf" class="form-control cpfCnpj" placeholder="Telefone" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>RG/IE</label>
                                        <input type="text" ng-model="cliente.cliente_rg" name="cliente_rg" class="form-control rg" placeholder="RG/IE" >
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" ng-model="cliente.cliente_complemento" name="cliente_complemento" class="form-control" placeholder="Complemento" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" ng-model="cliente.cliente_bairro" name="cliente_bairro" class="form-control" placeholder="Bairro" >
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

                            <button class="btn btn-info btn-fill pull-right" ng-click="setCliente()"
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

<script src="<?=base_url()?>public/assetsBoot/js/jquery.mask.min.js"></script>
<script>
    $(function(){
        $(".rg").mask("99.999.999-9");
        $(".data").mask("99/99/9999");
    });
</script>
