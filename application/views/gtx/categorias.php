<div ng-controller="categoria_ctrl">
    <div class="content ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="padding: 10px">
                        <div class="header" style="width: 100%; height: 80px">
                            <h4 class="title" style="float: left">Listagem de Cliente</h4>
                            <br>
                            <div class="row" style="padding: 20px">
                                <div class="col-md-12">
                                    <div class="form-group" style="display: inline-flex;">
                                    <input type="text" ng-model="categoriaAdd.categoria_nome" placeholder="Digite a categoria">
                            <a style="padding-left: 5px" ng-click="setCategoria()">
                                <button type="button" class="btn btn-primary" style="    padding: 8px 15px;display: flex;align-items: center;">
                                    <div ng-show="loader_send" class="col-md-3 bg loader-img" style="  margin-right: 10px;   padding: 0 !important; width: auto; height: auto;">
                                        <div class="loader-all" id="loader-1"></div>
                                    </div>Adicionar
                                </button>
                            </a>
                            </div>
                                </div>

                            </div>
                        </div>
                        <div class="content table-responsive table-full-width">

                            <table id="catTable" class="table table-hover table-striped" >
                                <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="categoria in categorias">
                                    <td>{{categoria.categoria_nome}}</td>
                                    <td><a ng-click="excluiCat(categoria.categoria_id)"><i class="pe-7s-trash"></i></a></td>

                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Categoria</th>
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
