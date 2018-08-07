<div ng-controller="produtos_ctrl">
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="padding: 10px">
                        <div class="header" style="width: 100%; height: 80px">
                            <h4 class="title" style="float: left">Listagem de Produtos</h4>
                            <a style="float: right; " href="<?=base_url()?>home/addProduto">
                                <button type="button" class="btn btn-primary" style="    padding: 8px 15px;display: flex;align-items: center;">
                                    <i style="    margin-right: 5px;font-size: 20px;" class="pe-7s-plus"></i>
                                    Adicionar
                                </button>
                            </a>
                        </div>
                        <div class="content table-responsive table-full-width">

                            <table id="produtoTable" class="table table-hover table-striped" >
                                <thead>
                                <tr>
                                    <th>Nome do produto</th>
                                    <th>Preço</th>
                                    <th>Data</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="produto in produtos">
                                    <td>{{produto.produto_nome}}</td>
                                    <td>{{produto.produto_preco}}</td>
                                    <td>{{produto.produto_data}}</td>
                                    <td>{{produto.produto_tipo}}</td>
                                    <td>
                                        <a id="popoverData" href="<?=base_url()?>Produto/updateProduto/?id={{produto.produto_id}}" ><i style="cursor: pointer" class="pe-7s-note"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome do produto</th>
                                    <th>Preço</th>
                                    <th>Data</th>
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