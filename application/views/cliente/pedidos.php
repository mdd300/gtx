<div ng-controller="pedidosCliente_ctrl">
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="padding: 10px">
                        <div class="header" style="width: 100%; height: 80px">
                            <h4 class="title" style="float: left">Listagem de Pedidos</h4>
                        </div>
                        <div >
                        <div class="row">
                            <div class=" col-sm-4" ng-repeat="pedido in pedidos">
                                <div class="card card-user">
                                    <div class="image">
                                        <img src="<?=base_url()?>/public/assets/metronic/custom/img/background_blue.jpg" alt="..."/>
                                    </div>
                                    <div class="content">
                                        <a href="<?=base_url()?>home/updatePedidoCli/?id={{pedido.pedido_id}}">
                                        <div class="author">
                                                <img ng-if="pedido.produtos[0].imgs.length > 0" class="avatar border-gray" src="<?= base_url('upload/produtos/img/' )?>{{pedido.produtos[0].imgs[0].src}}" alt="..."/>
                                                <div ng-if="pedido.produtos[0].imgs.length == 0" class="" style="width: 120px; height: 140px" alt="..."></div>
                                                <h4 class="title">Pedido numero {{pedido.pedido_id}}<br />
                                                </h4>
                                        </div>
                                        <p class="description text-center"> Status: {{pedido.pedido_status}}<br>
                                            Quant.Produtos: {{pedido.produtos.length}} <br>
                                        </p>
                                        </a>

                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a id="popoverData" href="<?=base_url()?>home/updatePedidoCli/?id={{pedido.pedido_id}}"  data-content="Editar dados do cliente" rel="popover" data-original-title="Editar"><i style="cursor: pointer" class="pe-7s-note"></i></a>
                                        <a id="popoverData" href="<?=base_url()?>home/editPDF/?id={{pedido.pedido_id}}"  data-content="Editar dados do cliente" rel="popover" data-original-title="Editar"><img style="    height: 12px;
    width: 12px;" src="<?=base_url("public/assets/metronic/custom/img/icon/pdf.png")?>"></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                                <!--                        <div class="content table-responsive table-full-width">-->
<!---->
<!--                            <table id="pedidoTable" class="table table-hover table-striped" >-->
<!--                                <thead>-->
<!--                                <tr>-->
<!--                                    <th>N˚ do Pedido</th>-->
<!--                                    <th>Status</th>-->
<!--                                    <th>Data</th>-->
<!--                                    <th>Ações</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                <tr ng-repeat="pedido in pedidos">-->
<!--                                    <td>{{pedido.pedido_id}}</td>-->
<!--                                    <td>{{pedido.pedido_status}}</td>-->
<!--                                    <td>{{pedido.pedido_data}}</td>-->
<!--                                    <td>-->

<!--                                    </td>-->
<!--                                </tr>-->
<!--                                </tbody>-->
<!--                                <tfoot>-->
<!--                                <tr>-->
<!--                                    <th>N˚ do Pedido</th>-->
<!--                                    <th>Status</th>-->
<!--                                    <th>Data</th>-->
<!--                                    <th>Ações</th>-->
<!--                                </tr>-->
<!--                                </tfoot>-->
<!--                            </table>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#popoverData').popover();
</script>