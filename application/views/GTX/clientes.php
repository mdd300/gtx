<div ng-controller="clientes_ctrl">
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="padding: 10px">
                        <div class="header" style="width: 100%; height: 80px">
                            <h4 class="title" style="float: left">Listagem de Cliente</h4>
                            <a style="float: right; " href="<?=base_url()?>home/addCliente">
                                <button type="button" class="btn btn-primary" style="    padding: 8px 15px;display: flex;align-items: center;">
                                    <i style="    margin-right: 5px;font-size: 20px;" class="pe-7s-add-user"></i>
                                    Adicionar
                                </button>
                            </a>
                        </div>
                        <div class="content table-responsive table-full-width">

                            <table id="userTable" class="table table-hover table-striped" >
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Cidade</th>
                                    <th>Estado</th>
                                    <th>Ações</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="cliente in clientes">
                                        <td>{{cliente.cliente_nome + " " + cliente.cliente_sobrenome}}</td>
                                        <td>{{cliente.cliente_email}}</td>
                                        <td>{{cliente.cliente_telefone}}</td>
                                        <td>{{cliente.cliente_endereco}}</td>
                                        <td>{{cliente.cliente_cidade}}</td>
                                        <td>{{cliente.cliente_estado}}</td>
                                        <td>
                                            <a id="popoverData" href="<?=base_url()?>home/addPedido/?id={{cliente.id_cliente}}" data-content="Adicionar pedido" rel="popover" data-original-title="Pedido"><i style="cursor: pointer" class="pe-7s-note2"></i> </a>
                                            <a id="popoverData" href="<?=base_url()?>home/updateCliente/?id={{cliente.id_cliente}}"  data-content="Editar dados do cliente" rel="popover" data-original-title="Editar"><i style="cursor: pointer" class="pe-7s-note"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Cidade</th>
                                    <th>Estado</th>
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