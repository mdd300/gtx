<div ng-controller="pedidosCliente_ctrl">
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="padding: 10px">
                        <div class="header" style="width: 100%; height: 80px">
                            <h4 class="title" style="float: left">Listagem de Cliente</h4>
                        </div>
                        <div class="content table-responsive table-full-width">

                            <table id="pedidoTable" class="table table-hover table-striped" >
                                <thead>
                                <tr>
                                    <th>N˚ do Pedido</th>
                                    <th>Status</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="pedido in pedidos">
                                    <td>{{pedido.pedido_id}}</td>
                                    <td>{{pedido.pedido_status}}</td>
                                    <td>{{pedido.pedido_data}}</td>
                                    <td>
                                        <a id="popoverData" href="<?=base_url()?>home/updatePedidoCli/?id={{pedido.pedido_id}}"  data-content="Editar dados do cliente" rel="popover" data-original-title="Editar"><i style="cursor: pointer" class="pe-7s-note"></i></a>
                                        <a id="popoverData" href="<?=base_url()?>home/editPDF/?id={{pedido.pedido_id}}"  data-content="Editar dados do cliente" rel="popover" data-original-title="Editar"><img style="    height: 12px;
    width: 12px;" src="<?=base_url("public/assets/metronic/custom/img/icon/pdf.png")?>"></a>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>N˚ do Pedido</th>
                                    <th>Status</th>
                                    <th>Data</th>
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