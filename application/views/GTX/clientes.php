<style>

    a {
        text-decoration: none;
    }

    .popover__title {
        ont-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        /* font-size: 24px; */
        /* line-height: 36px; */
        text-decoration: none;
        color: rgb(228, 68, 68);
        /* text-align: center; */
        /* padding: 15px 0; */
    }

    .popover__wrapper {
        position: relative;
        /* margin-top: 1.5rem; */
        /* display: inline-block; */
        width: 50%;
        float: left;
    }
    .popover__content {
        opacity: 0;
        visibility: hidden;
        position: absolute;
        left: -45px;
        margin-top: 40px;
        /* transform: translate(0,10px); */
        background-color: #BFBFBF;
        /* padding: 1.5rem; */
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
        width: 100px;
    }
    .popover__content:before {
        position: absolute;
        z-index: -1;
        content: '';
        right: calc(50% - 10px);
        top: -8px;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent #BFBFBF transparent;
        transition-duration: 0.3s;
        transition-property: transform;
    }
    .popover__wrapper:hover .popover__content {
        z-index: 10;
        opacity: 1;
        visibility: visible;
        transform: translate(0,-20px);
        transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
    }
    .popover__message {
        text-align: center;
    }
</style>
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
                                            <div class="popover__wrapper">
                                                <a id="popoverData" href="<?=base_url()?>home/addPedido/?id={{cliente.id_cliente}}" class="popover__title"><i style="cursor: pointer" class="pe-7s-note2"></i> </a>
                                                <div class="push popover__content">
                                                    <p class="popover__message">Criar Pedido</p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="popover__wrapper">
                                                    <a id="popoverData" data-toggle="modal" data-target="#Modal-Pedidos" ng-click="pedidosCliente(cliente.id_cliente)"><i style="cursor: pointer" class="pe-7s-notebook" ></i></a>
                                                    <div class="push popover__content">
                                                        <p class="popover__message">Listar Pedidos</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="popover__wrapper">
                                                <a id="popoverData" href="<?=base_url()?>home/updateCliente/?id={{cliente.id_cliente}}"  data-content="Editar dados do cliente" rel="popover" data-original-title="Editar"><i style="cursor: pointer" class="pe-7s-note"></i></a>
                                                    <div class="push popover__content">
                                                        <p class="popover__message">Editar cliente</p>
                                                    </div>
                                                </div>
                                            </div>
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
<script>
    $('#popoverData').popover();
</script>
<style>
    .modal-backdrop {
        position: initial;
        z-index: 1040 !important;
    }
    .modal-dialog {
        z-index: 1100 !important;
    }
</style>

<!-- Modal -->
<div id="Modal-Pedidos" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-lg" style="z-index: 1111;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cliente</h4>
            </div>
            <div class="modal-body" style="margin: 15px">
                <div class="content table-responsive table-full-width">

                    <table id="pedidoTable" class="table table-hover table-striped" >
                        <thead>
                        <tr>
                            <th>N˚ do Pedido</th>
                            <th>Cliente</th>
                            <th>Email</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="pedido in pedidos">
                            <td>{{pedido.pedido_id}}</td>
                            <td>{{pedido.cliente_nome + " " + pedido.cliente_sobrenome}}</td>
                            <td>{{pedido.cliente_email}}</td>
                            <td>{{pedido.pedido_data}}</td>
                            <td>
                                <a id="popoverData" target="_blank" href="<?=base_url()?>pedido/gerarPDF2/?id={{pedido.pedido_id}}"  data-content="Editar dados do cliente" rel="popover" data-original-title="Editar"><img style="    height: 12px;
    width: 12px;" src="<?=base_url("public/assets/metronic/custom/img/icon/pdf.png")?>"></a>
                                <a id="popoverData" href="<?=base_url()?>pedido/updatePedido/?id={{pedido.pedido_id}}"  data-content="Editar dados do cliente" rel="popover" data-original-title="Editar"><i style="cursor: pointer" class="pe-7s-note"></i></a>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>N˚ do Pedido</th>
                            <th>Cliente</th>
                            <th>Email</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</div>
