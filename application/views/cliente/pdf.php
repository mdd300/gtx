<div class="content" ng-controller="pdf_ctrl">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="">
                        <form>
                            <div class="">
                                <div class="pdf-content">
                                    <?=$html?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-info btn-fill pull-right" ng-click="gerarPDF()"
                                            style="text-align: center;
                                    display: flex;
                                    align-items: center;" >
                                        <div ng-show="loader_send" class="col-md-3 bg loader-img" style="  margin-right: 10px;   padding: 0 !important; width: auto; height: auto;">
                                            <div class="loader-all" id="loader-1"></div>
                                        </div>Salvar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>