<style>
    .error-input{
        border-color: red;
    }
</style>
<div class="content" ng-controller="addUser_ctrl">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" ng-model="user.user_nome" name="user_nome" class="form-control" placeholder="Nome" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" ng-model="user.user_sobrenome" name="user_sobrenome" class="form-control" placeholder="Sobrenome" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome do Usuário</label>
                                        <input name="user_username" ng-model="user.user_login" type="text" class="form-control" placeholder="Nome do Usuário" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <select class="form-control" ng-model="user.user_tipo" required>
                                            <option value="1">Admin</option>
                                            <option value="2">Vendedor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input name="user_email" ng-model="user.user_email" type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password" ng-model="user.user_senha" name="user_senha" class="form-control" placeholder="Senha" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirmar Senha</label>
                                        <input type="password" ng-class="{'error-input': senhaIncorreta == true}" ng-model="user_senhaConfirmar" name="user_senhaConfirmar" class="form-control" placeholder="Confirmar senha" required>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-info btn-fill pull-right" ng-click="setUser()"
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
