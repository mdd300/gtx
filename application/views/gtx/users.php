<div ng-controller="users_ctrl">
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="padding: 10px">
                        <div class="header" style="width: 100%; height: 80px">
                            <h4 class="title" style="float: left">Listagem de Usuários</h4>
                            <a style="float: right; " href="<?=base_url()?>home/addUser">
                                <button type="button" class="btn btn-primary" style="    padding: 8px 15px;display: flex;align-items: center;">
                                    <i style="    margin-right: 5px;font-size: 20px;" class="pe-7s-add-user"></i>
                                    Adicionar
                                </button>
                            </a>
                        </div>
                        <div class="content table-responsive table-full-width">

                            <table id="usersTable" class="table table-hover table-striped" >
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Login</th>
                                    <th>E-mail</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="user in users">
                                    <td>{{user.user_nome + " " + user.user_sobrenome}}</td>
                                    <td>{{user.user_login}}</td>
                                    <td>{{user.user_email}}</td>
                                    <td ng-if="user.user_tipo == 1"> Admin</td>
                                    <td ng-if="user.user_tipo == 2"> Vendedor</td>
                                    <td>
                                        <a id="popoverData" href="<?=base_url()?>Home/updateUser/?id={{user.user_id}}"><i style="cursor: pointer" class="pe-7s-note"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Login</th>
                                    <th>E-mail</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#popoverData').popover();
</script>