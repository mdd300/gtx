angular.module('app_landing').controller('landing_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.loader = false;
    $scope.mensagem_erro = false;
    $scope.dataLogin = {
        "user_login": "",
        "user_senha": ""
    }
    $scope.dataLoginError = {
        "user_login": false,
        "user_senha": false
    }

    $scope.doLogin = function () {

        if($scope.dataLogin.user_login != "" || $scope.dataLogin.user_login !== undefined || $scope.dataLogin.user_login !== null || $scope.dataLogin.user_login != "undefined" ) {
            $scope.dataLoginError.user_login = false

            if($scope.dataLogin.user_senha != "" || $scope.dataLogin.user_senha !== undefined || $scope.dataLogin.user_senha !== null || $scope.dataLogin.user_senha != "undefined") {


                $scope.loader = true;
                $scope.dataLoginError.user_senha = false


                $http({

            method: 'POST',
            url: base_url + "login/do_login",
            data: $.param( $scope.dataLogin),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {

            $scope.loader = false;


                if (response.data.success == false) {
                    $scope.mensagem_erro = response.data.text;

                    $timeout(function () {
                        $scope.mensagem_erro = false;
                    }, 3000);
                }else{
                    window.location.href = base_url + "home/pedidos"
                }

            }
        );
    }else{
            $scope.dataLoginError.user_senha = true
        }
    }else{
            $scope.dataLoginError.user_login = true
        }
    }

}]);

angular.module('app_landing').controller('clientes_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $('#popoverData').popover();
    $('#popoverOption').popover({ trigger: "hover" });

    $scope.clientes = [];
    $scope.pedidos = [];

    $http({

        method: 'POST',
        url: "getClientes",
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {

        $scope.clientes = response.data;

        $timeout(function () {
            $('#userTable').DataTable();
        }, 500);
    })

    $scope.pedidosCliente = function (id) {

        $http({

            method: 'POST',
            url: "/gtx/pedido/getPedidos",
            data: $.param({where: id}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {

            $scope.pedidos = response.data;
            $timeout(function () {
                $('#pedidoTable').DataTable();
            }, 700);

        })

    }

}]);


angular.module('app_landing').controller('addCliente_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $timeout(function () {
        $('#userTable').DataTable();
    }, 1000);

    $scope.loader_send = false;

    $scope.cliente = {
        "cliente_username" : "",
        "cliente_nome": "",
        "cliente_sobrenome": "",
        "cliente_telefone": "",
        "cliente_email": "",
        "cliente_endereco": "",
        "cliente_cidade": "",
        "cliente_estado": "",
        "cliente_cep": "",
        "cliente_doc": ""

    }

    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('#cpfcnpj').mask('000.000.000-000', options);


        $scope.setCliente = function () {


            if ($scope.cliente.cliente_username !== "") {

                $scope.loader_send = true;

                $http({

                    method: 'POST',
                    url: "setCliente",
                    data: $.param($scope.cliente),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

                }).then(function (response) {

                    $scope.cliente = {
                        "cliente_username": "",
                        "cliente_nome": "",
                        "cliente_sobrenome": "",
                        "cliente_telefone": "",
                        "cliente_email": "",
                        "cliente_endereco": "",
                        "cliente_cidade": "",
                        "cliente_estado": "",
                        "cliente_cep": ""
                    }

                    $scope.loader_send = false;

                    $.notify({
                        // options
                        icon: '',
                        title: 'Cadastro realizado com sucesso',
                        message: 'O cliente foi cadastrado com sucesso e um E-mail foi enviado para ele',
                        url: 'https://github.com/mouse0270/bootstrap-notify',
                        target: '_blank'
                    },{
                        // settings
                        element: 'body',
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: false,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: null,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },
                        onShow: null,
                        onShown: null,
                        onClose: null,
                        onClosed: null,
                        icon_type: 'class',
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
                    });
                    $timeout(function () {
                        window.location.href = "clientes";
                    }, 2000);

                })
            }
        }

}]);
angular.module('app_landing').controller('updateCliente_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('#cpfcnpj').mask('000.000.000-000', options);


    $scope.loader_send = false;

    $scope.cliente = []

    $http({

        method: 'POST',
        url: "/gtx/home/getClienteWhere",
        data: $.param({id: $("#user_id").val()}),
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {


        $scope.cliente = response.data;

    })


    $scope.updateCliente = function () {

        $scope.loader_send = true;

        if ($scope.cliente.cliente_username !== "") {
            $http({

                method: 'POST',
                url: "/gtx/home/setUpdateCliente",
                data: $.param({data: $scope.cliente, id: $("#user_id").val() }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

            }).then(function (response) {

                $scope.cliente = {
                    "cliente_username": "",
                    "cliente_nome": "",
                    "cliente_sobrenome": "",
                    "cliente_telefone": "",
                    "cliente_email": "",
                    "cliente_endereco": "",
                    "cliente_cidade": "",
                    "cliente_estado": "",
                    "cliente_cep": ""
                }

                $scope.loader_send = false;

                $.notify({
                    // options
                    icon: '',
                    title: 'Os dados do cliente foram atualizados com sucesso',
                    url: 'https://github.com/mouse0270/bootstrap-notify',
                    target: '_blank'
                },{
                    // settings
                    element: 'body',
                    position: null,
                    type: "success",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: null,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
                });
                $timeout(function () {
                    window.location.href = "/gtx/home/clientes";
                }, 2000);

            })
        }
    }


}]);

angular.module('app_landing').controller('addPedido_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.loader_send = false;

    $scope.dataPedido = {
        "pedido_frete": 0,
        "pedido_desconto": 0
    }

    $scope.produtos = [
        {
            "produto_nome": "",
            "produto_unidade": "",
            "produto_comentario": "",
            "variacao_unidade": "",
            "quant": 1,
            "variacao_selected": false,
            "variantes_produto": [],
            "imgs": [{
                "src": ""
            }
            ],
            "camisas": [{
                "camisa_nome": "",
                "camisa_tamanho": "",
                "camisa_numero": "",
                "camisa_short": "",
                "camisa_comentario": "",
            }
            ],
        }
    ];

    $scope.tags;

    $(function() {

        $http({

            method: 'POST',
            url: "/gtx/produto/getProdutosNames",
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {

            $scope.tags = response.data;

            $("#tags-0" ).autocomplete({
                source: $scope.tags
            });

            $("#tags-0").autocomplete({
                select: function( event, ui ) {

                    var targ = event.target

                    $scope.produtos[targ.getAttribute("index-prod")].produto_nome = ui.item.value;

                    $http({

                        method: 'POST',
                        url: "/gtx/produto/getVariantes",
                        data: $.param({data: ui.item.value}),
                        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

                    }).then(function (response) {


                        $scope.produtos[targ.getAttribute("index-prod")].variantes_produto = response.data.produto_variantes;
                        $scope.produtos[targ.getAttribute("index-prod")].produto_preco = response.data.produto_preco

                        $scope.calcTotal()

                    })
                }
            });
        })


    });


    $scope.deleteCamisa = function (prod,cam) {
        $scope.produtos[prod].camisas.splice(cam,1)
        $scope.produtos[prod].quat--;
        $scope.calcTotal()

    }

    $('body').on("change", "input[type=file]", function(){
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {


            var content = $(input).parent('.label-img-pedido');
            var more = content.find(".more-img")

            more.css("display", "none");

            content.find(".loader-img").css("display", "block");

            content.removeAttr("for");

            var reader = new FileReader();

            reader.onload = function (e) {
                $img = content.find("#img-element").attr('src', e.target.result).css("width", "100%").css("z-index", "-111");
                $(input).after($img);

                    $img.on("load",function(){

                    content.find(".loader-img").css("display", "none");

                    $(input).remove();

                     var vanilla = new Croppie(content.find("#img-element")[0], {
                        viewport: { width: 200, height: 200 },
                    showZoomer: true,
                    enableResize: true,
                    enableOrientation: true,
                    mouseWheelZoom: 'ctrl',
                         update: function (data) {
                             vanilla.result('base64', 'viewport', 'png',1,false).then(function(img) {
                                 $scope.produtos[content.find(".parent-index-img").val()].imgs[content.find(".index-img").val()].src = img;
                             });
                         }
                });

                    });

                $scope.produtos[content.find(".parent-index-img").val()].imgs.push({"src": ""})
                $scope.$apply();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $scope.deleteImgPed = function (prod,id) {
        $scope.produtos[prod].imgs.splice(id,1)
    }

    $scope.addMoreProd = function () {
        $scope.produtos.push({
            "produto_nome": "",
            "produto_unidade": "",
            "produto_comentario": "",
            "variacao_unidade": "",
            "quant": 0,
            "variacao_selected": false,
            "imgs": [{
                "src": ""
            }
            ],
            "camisas": [{
                "camisa_nome": "",
                "camisa_tamanho": "",
                "camisa_numero": "",
                "camisa_short": "",
                "camisa_comentario": "",
            }
            ]
        })
        $timeout(function () {

        $(function() {


            $("#tags-"+ (parseInt($scope.produtos.length) - 1) ).autocomplete({
            source: $scope.tags
        });

        $("#tags-"+(parseInt($scope.produtos.length) - 1)).autocomplete({
            select: function( event, ui ) {

                var targ = event.target

                $scope.produtos[targ.getAttribute("index-prod")].produto_nome = ui.item.value;

                $http({

                    method: 'POST',
                    url: "/gtx/produto/getVariantes",
                    data: $.param({data: ui.item.value}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

                }).then(function (response) {

                    $scope.produtos[targ.getAttribute("index-prod")].variantes_produto = response.data;

                })
            }
        });
        });
        },100);

    }
    $scope.addMoreCamisas = function (id,add) {
        $scope.produtos[id].camisas.push({
            "camisa_nome": "",
            "camisa_tamanho": "",
            "camisa_numero": "",
            "camisa_short": "",
            "camisa_comentario": "",
        })

        if(add == false)
            $scope.pedido.produtos[prod].quant++;

        $scope.calcTotal()

    }

    $scope.total = 0;

    $scope.calcTotal = function () {

        $scope.total = 0;

        function numberToReal(numero) {
            var numero = numero.toFixed(2).split('.');
            numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
            return numero.join(',');
        }

        angular.forEach($scope.produtos, function(value, key) {

            var preco = value.produto_preco.replace(",", ".")
            $scope.total = parseFloat(preco) * parseFloat(value.quant);

        })
        if($scope.dataPedido.pedido_frete === '' && $scope.dataPedido.pedido_desconto === '' || $scope.dataPedido.pedido_frete === undefined && $scope.dataPedido.pedido_desconto === undefined || $scope.dataPedido.pedido_frete === "undefined" && $scope.dataPedido.pedido_desconto === "undefined"|| $scope.dataPedido.pedido_frete === null && $scope.dataPedido.pedido_desconto === null  ){}
        else if($scope.dataPedido.pedido_frete !== "" && $scope.dataPedido.pedido_desconto !== "" && $scope.dataPedido.pedido_frete !== "undefined" && $scope.dataPedido.pedido_desconto !== "undefined" && $scope.dataPedido.pedido_frete !== null && $scope.dataPedido.pedido_desconto !== null) {

            $scope.total+= ($scope.dataPedido.pedido_frete );
            $scope.total -= $scope.dataPedido.pedido_desconto;
            $scope.total += 0;


        }else if($scope.dataPedido.pedido_frete === '' || $scope.dataPedido.pedido_frete === null || $scope.dataPedido.pedido_frete === "undefined"){
            $scope.total -= ($scope.dataPedido.pedido_desconto);
            $scope.total += 0;
        }

        else if($scope.dataPedido.pedido_desconto === "" || $scope.dataPedido.pedido_desconto === null || $scope.dataPedido.pedido_desconto === "undefined") {
            $scope.total += ($scope.dataPedido.pedido_frete)
            $scope.total += 0;

        }
        else{
            $scope.total += 0;
        }
        $scope.total = numberToReal($scope.total)
    }

    $scope.quantidadeCam = function (id) {

        if($("#quantidade-"+id).val() > $scope.produtos[id].camisas.length){

            $scope.addMoreCamisas(id, true);

        }else if($("#quantidade-"+id).val() == ""){

        }else if($("#quantidade-"+id).val() < $scope.produtos[id].camisas.length){
            $scope.produtos[id].camisas.length = $("#quantidade-"+id).val();
            $scope.calcTotal()

        }

    }

    $scope.visualizarPDF = function () {
        $scope.loader_send = true;

        $http({

            method: 'POST',
            url: "/gtx/pedido/setPedido",
            data: $.param({produtos: $scope.produtos, id: $(".id-cliente").val(), variantes: $scope.dataProduto, pedido:$scope.dataPedido}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {

            $scope.loader_send = false;
            var action = "/gtx/home/gerarPDF2/?id=" + response.data;
            event.preventDefault();
            var newForm = jQuery('<form>', {
                'action': action,
                'target': '_blank',
                'method': 'post'
            });
            $(document.body).append(newForm);
            newForm.submit();

            $.notify({
                // options
                icon: '',
                title: 'O Pedido foi criado com sucesso',
                url: 'https://github.com/mouse0270/bootstrap-notify',
                target: '_blank'
            },{
                // settings
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
            $timeout(function () {
                window.location.href = "/gtx/pedido/updatePedido/?id="+response.data;
            }, 2000);
        })





    }

    $scope.GerarPDFPedido = function () {
        $scope.loader_send = true;

        $http({

            method: 'POST',
            url: "/gtx/pedido/setPedido",
            data: $.param({produtos: $scope.produtos, id: $(".id-cliente").val(), variantes: $scope.dataProduto, pedido:$scope.dataPedido}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {

            $scope.loader_send = false;
            var action = "/gtx/home/editPDF/?id=" +  response.data;


            event.preventDefault();
            var newForm = jQuery('<form>', {
                'action': action,
                'target': '_blank',
                'method': 'post'
            });
            $(document.body).append(newForm);
            newForm.submit();
            //
            $.notify({
                // options
                icon: '',
                title: 'O Pedido foi criado com sucesso',
                url: 'https://github.com/mouse0270/bootstrap-notify',
                target: '_blank'
            },{
                // settings
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
            $timeout(function () {
                window.location.href = "/gtx/pedido/updatePedido/?id="+response.data;
            }, 2000);
        })



    }
    $scope.setPedido2 = function () {

    }


    $scope.setPedido = function () {

        $scope.loader_send = true;

        $http({

                method: 'POST',
                url: "/gtx/pedido/setPedido",
                data: $.param({produtos: $scope.produtos, id: $(".id-cliente").val(), variantes: $scope.dataProduto, pedido:$scope.dataPedido}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

            }).then(function (response) {

            $scope.loader_send = false;

            $scope.idPedido = response.data;

            $.notify({
                // options
                icon: '',
                title: 'O Pedido foi criado com sucesso',
                url: 'https://github.com/mouse0270/bootstrap-notify',
                target: '_blank'
            },{
                // settings
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
            $timeout(function () {
                window.location.href = "/gtx/home/clientes";
            }, 2000);
        })
    }

}]);

angular.module('app_landing').controller('pedidos_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.pedidos = [];


    $http({

        method: 'POST',
        url: "/gtx/pedido/getPedidos",
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {

        $scope.pedidos = response.data;
        $timeout(function () {
            $('#pedidoTable').DataTable();
        }, 500);
    })


}]);
angular.module('app_landing').controller('pedido_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.pedido = [];
    $scope.delete = [];
    $scope.insertImg = [];
    $scope.insertCamisa = [];
    $scope.deleteCamisas = [];
    $scope.loader_send = false;
    $scope.status_chanced = false;
    $scope.quantidade = [];
    $scope.total = 0;

    $http({

        method: 'POST',
        url: "/gtx/pedido/getPedido",
        data: $.param({ id: $(".id-pedido").val()}),
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {

        $scope.pedido = response.data;

        angular.forEach($scope.pedido.produtos, function(value, key) {

            $scope.insertImg.push({
                    "produto_id": value.produto_id,
                "insert":{
                    "src":""
                }
            })
            value.quant =  value.camisas.length;


            if(value.variacao_unidade == ""){
                value.variacao_selected = false
            }else{
                value.variacao_selected = true


            }

        })

        $scope.pedido.pedido_frete = parseFloat($scope.pedido.pedido_frete.replace(",", "."))
        $scope.pedido.pedido_desconto = parseFloat($scope.pedido.pedido_desconto.replace(",", "."))

        $scope.calcTotal()

        });
    $scope.deleteImgPed = function (id) {
        $scope.insertImg.splice(id,1)
    }

    $scope.quantidadeCam = function (id,prod) {

        if($("#quantidade-"+id).val() > $scope.pedido.produtos[id].camisas.length){

            $scope.addMoreCamisas(prod,id, true);

        }else if($("#quantidade-"+id).val() == ""){

        }else if($("#quantidade-"+id).val() < $scope.pedido.produtos[id].camisas.length){
            $scope.pedido.produtos[id].camisas.length = $("#quantidade-"+id).val();
            $scope.calcTotal()

        }

    }

    $scope.calcTotal = function () {

        $scope.total = 0.00;

        function numberToReal(numero) {
            var numero = numero.toFixed(2).split('.');
            numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
            return numero.join(',');
        }

        angular.forEach($scope.pedido.produtos, function(value, key) {

            var preco = value.produto_preco.replace(",", ".")
            $scope.total = parseFloat(preco) * parseFloat(value.quant);

        })


        if($scope.pedido.pedido_frete === '' && $scope.pedido.pedido_desconto === '' || $scope.pedido.pedido_frete === undefined && $scope.pedido.pedido_desconto === undefined || $scope.pedido.pedido_frete === "undefined" && $scope.pedido.pedido_desconto === "undefined"|| $scope.pedido.pedido_frete === null && $scope.pedido.pedido_desconto === null  ){

        }
        else if($scope.pedido.pedido_frete !== "" && $scope.pedido.pedido_desconto !== "" && $scope.pedido.pedido_frete !== "undefined" && $scope.pedido.pedido_desconto !== "undefined" && $scope.pedido.pedido_frete !== undefined && $scope.pedido.pedido_desconto !== undefined && $scope.pedido.pedido_frete !== null && $scope.pedido.pedido_desconto !== null) {

            $scope.total+= parseFloat($scope.pedido.pedido_frete );
            $scope.total -= parseFloat($scope.pedido.pedido_desconto);
            $scope.total += 0;



        }else if($scope.pedido.pedido_frete === 0 || $scope.pedido.pedido_frete === '' || $scope.pedido.pedido_frete === null || $scope.pedido.pedido_frete === "undefined"){
            $scope.total -= parseFloat($scope.pedido.pedido_desconto);
            $scope.total += 0;

        }

        else if($scope.pedido.pedido_desconto === 0 || $scope.pedido.pedido_desconto === "" || $scope.pedido.pedido_desconto === null || $scope.pedido.pedido_desconto === "undefined") {
            $scope.total += parseFloat($scope.pedido.pedido_frete )
            $scope.total += 0;


        }
        else{
            $scope.total += 0;


        }

        $scope.total = numberToReal($scope.total)
    }

    $scope.visualizarPDF = function () {

        $http({

            method: 'POST',
            url: "/gtx/pedido/setUpdatePedido",
            data: $.param({
                id: $(".id-pedido").val(),
                update: $scope.pedido,
                delete: $scope.delete,
                insert: $scope.insertImg,
                insertCamisa: $scope.insertCamisa,
                deleteCamisas: $scope.deleteCamisas

            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {


            $.notify({
                // options
                icon: '',
                title: 'Os dados do pedido foram atualizados com sucesso',
                url: 'https://github.com/mouse0270/bootstrap-notify',
                target: '_blank'
            },{
                // settings
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });

            var action = "/gtx/home/gerarPDF2/?id=" + $(".id-pedido").val();


            event.preventDefault();
            var newForm = jQuery('<form>', {
                'action': action,
                'target': '_blank',
                'method': 'post'
            });
            $(document.body).append(newForm);
            newForm.submit();

            if ($scope.status_chanced == true){
                $http({

                    method: 'POST',
                    url: "/gtx/pedido/StatusChanged",
                    data: $.param({
                        id: $(".id-pedido").val(),
                        pedido: $scope.pedido
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

                }).then(function (response) {
                    $scope.loader_send = false;

                    $.notify({
                        // options
                        icon: '',
                        title: 'Você alterou o status do pedido, um e-mail foi enviado para o cliente informando a alteração ',
                        url: 'https://github.com/mouse0270/bootstrap-notify',
                        target: '_blank'
                    },{
                        // settings
                        element: 'body',
                        position: null,
                        type: "info",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: false,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: null,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },
                        onShow: null,
                        onShown: null,
                        onClose: null,
                        onClosed: null,
                        icon_type: 'class',
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
                    });


                })

            }else{
                $scope.loader_send = false;
                // $timeout(function () {
                //     window.location.href = "/gtx/home/pedidos";
                // }, 2000);
            }


        })


    }

    $scope.GerarPDFPedido = function () {

        $http({

            method: 'POST',
            url: "/gtx/pedido/setUpdatePedido",
            data: $.param({
                id: $(".id-pedido").val(),
                update: $scope.pedido,
                delete: $scope.delete,
                insert: $scope.insertImg,
                insertCamisa: $scope.insertCamisa,
                deleteCamisas: $scope.deleteCamisas

            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {



            $.notify({
                // options
                icon: '',
                title: 'Os dados do pedido foram atualizados com sucesso',
                url: 'https://github.com/mouse0270/bootstrap-notify',
                target: '_blank'
            },{
                // settings
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });

            var action = "/gtx/home/editPDF/?id=" + $(".id-pedido").val();


            event.preventDefault();
            var newForm = jQuery('<form>', {
                'action': action,
                'target': '_blank',
                'method': 'post'
            });
            $(document.body).append(newForm);
            newForm.submit();

            if ($scope.status_chanced == true){
                $http({

                    method: 'POST',
                    url: "/gtx/pedido/StatusChanged",
                    data: $.param({
                        id: $(".id-pedido").val(),
                        pedido: $scope.pedido
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

                }).then(function (response) {
                    $scope.loader_send = false;

                    $.notify({
                        // options
                        icon: '',
                        title: 'Você alterou o status do pedido, um e-mail foi enviado para o cliente informando a alteração ',
                        url: 'https://github.com/mouse0270/bootstrap-notify',
                        target: '_blank'
                    },{
                        // settings
                        element: 'body',
                        position: null,
                        type: "info",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: false,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: null,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },
                        onShow: null,
                        onShown: null,
                        onClose: null,
                        onClosed: null,
                        icon_type: 'class',
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
                    });


                })

            }else{
                $scope.loader_send = false;
                // $timeout(function () {
                //     window.location.href = "/gtx/home/pedidos";
                // }, 2000);
            }


        })


    }

$scope.updatePedido = function () {

    $scope.loader_send = true;

        $http({

            method: 'POST',
            url: "/gtx/pedido/setUpdatePedido",
            data: $.param({
                id: $(".id-pedido").val(),
                update: $scope.pedido,
                delete: $scope.delete,
                insert: $scope.insertImg,
                insertCamisa: $scope.insertCamisa,
                deleteCamisas: $scope.deleteCamisas

            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {

            $.notify({
                // options
                icon: '',
                title: 'Os dados do pedido foram atualizados com sucesso',
                url: 'https://github.com/mouse0270/bootstrap-notify',
                target: '_blank'
            },{
                // settings
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });

            if ($scope.status_chanced == true){
                $http({

                    method: 'POST',
                    url: "/gtx/pedido/StatusChanged",
                    data: $.param({
                        id: $(".id-pedido").val(),
                        pedido: $scope.pedido
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

                }).then(function (response) {
                    $scope.loader_send = false;

                    $.notify({
                        // options
                        icon: '',
                        title: 'Você alterou o status do pedido, um e-mail foi enviado para o cliente informando a alteração ',
                        url: 'https://github.com/mouse0270/bootstrap-notify',
                        target: '_blank'
                    },{
                        // settings
                        element: 'body',
                        position: null,
                        type: "info",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: false,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: null,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },
                        onShow: null,
                        onShown: null,
                        onClose: null,
                        onClosed: null,
                        icon_type: 'class',
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
                    });
                     $timeout(function () {
                         window.location.href = "/gtx/home/pedidos";
                     }, 2000);
                })

            }else{
                $scope.loader_send = false;
                $timeout(function () {
                    window.location.href = "/gtx/home/pedidos";
                }, 2000);
            }


        })

    }


    $scope.deleteImgs = function (id,produtoIndex,imgIndex) {

        $scope.delete.push({"img_id": id})

        $scope.pedido.produtos[produtoIndex].imgs.splice(imgIndex, 1);

    }

    $('body').on("change", "input[type=file]", function(){
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {


            var content = $(input).parent('.label-img-pedido');
            var more = content.find(".more-img")


            more.css("display", "none");

            content.find(".loader-img").css("display", "block");

            content.removeAttr("for");

            var reader = new FileReader();

            reader.onload = function (e) {

                $img = content.find("#img-element").attr('src', e.target.result).css("width", "100%").css("z-index", "-111");
                $(input).after($img);

                $img.on("load",function(){

                    var indexInsert = $scope.insertImg.length - 1;

                    content.find(".loader-img").css("display", "none");



                    $(input).remove();

                    var vanilla = new Croppie(content.find("#img-element")[0], {
                        viewport: { width: 200, height: 200 },
                        showZoomer: true,
                        enableResize: true,
                        enableOrientation: true,
                        mouseWheelZoom: 'ctrl',
                        update: function (data) {
                            vanilla.result('base64', 'viewport', 'png',1,false).then(function(img) {
                                $scope.insertImg[indexInsert].insert.src = img;
                            });
                        }
                    });

                });


                $scope.insertImg.push({
                        "produto_id": $scope.pedido.produtos[content.find(".parent-index-img").val()].produto_id,
                    "insert":{
                        "src":""
                    }
                })


                $scope.$apply();


            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $scope.changeStatus = function (status) {

        $scope.pedido.pedido_status = status;
        $scope.status_chanced = true;

    }

    $scope.addMoreCamisas = function (id,prod,add) {
        $scope.insertCamisa.push({
            "camisa_nome": "",
            "camisa_tamanho": "",
            "camisa_numero": "",
            "camisa_short": "",
            "camisa_comentario": "",
            "produto_id": id
        })
        if(add == false)
        $scope.pedido.produtos[prod].quant++;

        $scope.calcTotal()

    }
    $scope.deleteCamisa = function (id) {

        $scope.insertCamisa.splice(id, 1);
        $scope.pedido.produtos[prod].quant--;
        $scope.calcTotal()

    }
    $scope.deleteCamisaPrinc = function (id,prod,cam) {

        $scope.deleteCamisas.push({"camisa_id": id});
        $scope.pedido.produtos[prod].camisas.splice(cam, 1);
        $scope.pedido.produtos[prod].quant--;
        $scope.calcTotal()

    }

}]);
angular.module('app_landing').controller('loginCliente_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.loader = false;
    $scope.mensagem_erro = false;
    $scope.dataLogin = {
        "cliente_username": "",
        "cliente_pass": ""
    }
    $scope.dataLoginError = {
        "cliente_username": false,
        "cliente_pass": false
    }

    $scope.doLogin = function () {

        if($scope.dataLogin.user_login != "" || $scope.dataLogin.user_login !== undefined || $scope.dataLogin.user_login !== null || $scope.dataLogin.user_login != "undefined" ) {
            $scope.dataLoginError.user_login = false

            if($scope.dataLogin.user_senha != "" || $scope.dataLogin.user_senha !== undefined || $scope.dataLogin.user_senha !== null || $scope.dataLogin.user_senha != "undefined") {


                $scope.loader = true;
                $scope.dataLoginError.user_senha = false


                $http({

                    method: 'POST',
                    url: base_url + "login/do_login2",
                    data: $.param( $scope.dataLogin),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

                }).then(function (response) {

                        $scope.loader = false;


                        if (response.data.success == false  ) {
                            $scope.mensagem_erro = response.data.text;

                            $timeout(function () {
                                $scope.mensagem_erro = false;
                            }, 3000);
                        }else{
                            window.location.href = base_url + "home/pedidosCli"
                        }

                    }
                );
            }else{
                $scope.dataLoginError.user_senha = true
            }
        }else{
            $scope.dataLoginError.user_login = true
        }
    }


}]);

angular.module('app_landing').controller('pedidosCliente_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.pedidos = [];


    $http({

        method: 'POST',
        url: "/gtx/home/getPedidosCli",
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {

        $scope.pedidos = response.data;

        $timeout(function () {
            $('#pedidoTable').DataTable();
        }, 500);
    })


}]);
angular.module('app_landing').controller('produtos_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.produtos = [];


    $http({

        method: 'POST',
        url: "/gtx/produto/getProdutos",
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {

        $scope.produtos = response.data;
        $timeout(function () {
            $('#produtoTable').DataTable();
        }, 500);
    })


}]);
angular.module('app_landing').controller('addProduto_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.produto = {
        "produto_nome": "" ,
        "produto_preco": "",
        "produto_comentario": "",
        "produto_tipo": "",
        "produto_variantes": [{
            "variante_nome": "",
            "variante_tipo": "",
            "opcoes": [{
                "opcao_nome": "",
                "opcao_preco": ""
            }]
        }]
    };

    $scope.categorias = []
    $scope.loader_send = false;

    $http({

        method: 'POST',
        url: "/gtx/Produto/getCategorias",
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {

        $scope.categorias = response.data

    })


    $scope.addMoreVar = function () {

        $scope.produto.produto_variantes.push({
            "variante_nome": "",
            "opcoes": [{
                "opcao_nome": "",
                "opcao_preco": ""
            }]
        })


        $(function(){
            $('.preco-op-' + (parseInt($scope.produto.produto_variantes.length) - 1) + "-" + (parseInt($scope.produto.produto_variantes[(parseInt($scope.produto.produto_variantes.length) - 1)].opcoes.length) - 1)).bind('keypress',mask.money);
        });

    }
    $scope.addMoreOp = function (id) {

        $scope.produto.produto_variantes[id].opcoes.push(
            {
                "opcao_nome": "",
                "opcao_preco": ""
            }
        )


        $(function(){

            $('.preco-op-' + id + "-" + (parseInt($scope.produto.produto_variantes[id].opcoes.length) - 1)).bind('keypress',mask.money);
        });


    }
    $scope.deleteVar = function (id) {

        $scope.produto.produto_variantes.splice(id,1);

    }

    $scope.setProduto = function () {


        if ($scope.produto.produto_nome) {

            $scope.loader_send = true;

            $http({

                method: 'POST',
                url: "/gtx/produto/setProdutos",
                data: $.param($scope.produto),
                headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

            }).then(function (response) {

                $scope.loader_send = false;

                $.notify({
                    // options
                    icon: '',
                    title: 'O produto foi cadastrado com sucesso',
                    url: 'https://github.com/mouse0270/bootstrap-notify',
                    target: '_blank'
                }, {
                    // settings
                    element: 'body',
                    position: null,
                    type: "success",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: null,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
                });

                $timeout(function () {
                    window.location.href = "produtos";
                }, 2000);

            })
        }
    }

var mask = {
    money: function() {
        var el = this
            ,exec = function(v) {
            v = v.replace(/\D/g,"");
            v = new String(Number(v));
            var len = v.length;
            if (1== len)
                v = v.replace(/(\d)/,"0,0$1");
            else if (2 == len)
                v = v.replace(/(\d)/,"0,$1");
            else if (len > 2) {
                v = v.replace(/(\d{2})$/,',$1');
            }
            return v;
        };

        setTimeout(function(){
            el.value = exec(el.value);
        },1);
    }

}

$(function(){
    $('.input-preco').bind('keypress',mask.money)
});

    $(function(){
        $('.input-preco-op').bind('keypress',mask.money)
    });
}]);

angular.module('app_landing').controller('updateProduto_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

        $scope.produto = []

        $scope.loader_send = false;


    var mask = {
        money: function() {
            var el = this
                ,exec = function(v) {
                v = v.replace(/\D/g,"");
                v = new String(Number(v));
                var len = v.length;
                if (1== len)
                    v = v.replace(/(\d)/,"0,0$1");
                else if (2 == len)
                    v = v.replace(/(\d)/,"0,$1");
                else if (len > 2) {
                    v = v.replace(/(\d{2})$/,',$1');
                }
                return v;
            };

            setTimeout(function(){
                el.value = exec(el.value);
            },1);
        }

    }

    $(function(){
        $('.input-preco').bind('keypress',mask.money)
    });

        $http({

            method: 'POST',
            url: "/gtx/produto/getProduto",
            data: $.param({id: $(".id-produto").val()}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {

            $scope.produto = response.data
            $scope.produto.produto_variantes_insert = []


            angular.forEach($scope.produto.produto_variantes, function(value, key) {

                value.opcoes_insert = []

            })

            })

    $scope.addMoreOp = function (id) {

        $scope.produto.produto_variantes[id].opcoes_insert.push(
            {
                "opcao_nome": "",
                "opcao_preco": ""
            }
        )


    }

    $scope.addMoreOpInsert = function (id) {

        $scope.produto.produto_variantes_insert[id].opcoes.push(
            {
                "opcao_nome": "",
                "opcao_preco": ""
            }
        )


    }

    $scope.addMoreVar = function () {

        $scope.produto.produto_variantes_insert.push({
            "variante_nome": "",
            "opcoes": [{
                "opcao_nome": "",
                "opcao_preco": ""
            }]
        })


    }

    $scope.updateProduto = function () {
        $http({

            method: 'POST',
            url: "/gtx/produto/setUpdateProduto",
            data: $.param({id: $(".id-produto").val(), data: $scope.produto}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {



        })
    }

}]);
angular.module('app_landing').controller('pdf_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.check = {
        "check1": 0,
        "check2": 0,
        "check3": 0,
        "check4": 0,
        "check5": 0,
        "check6": 0,
        "check7": 0,
        "check8": 0,
        "check9": 0,
        "check10": 0,
        "check11": 0,
        "inputAss": ""

    }
    $scope.loader_send = false;

    $scope.gerar = false;

    $scope.gerarPDF = function () {
        $scope.loader_send = true;

        $("#inputAss").remove();

        $scope.gerar = true;
        var url_string = window.location.href
        var url = new URL(url_string);
        var id = url.searchParams.get("id");

        $timeout(function () {
        $http({

            method: 'POST',
            url: "/gtx/home/gerarPDF",
            data: $.param({content: $(".pdf-content").prop('outerHTML'), id: id}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {
            $scope.loader_send = false;

            var form = document.createElement("form");
            form.method = "GET";
            form.action = "/gtx/"+ response.data.name;
            form.target = "_blank";
            document.body.appendChild(form);
            form.submit();



        })
        },100)

    }



}]);
angular.module('app_landing').controller('categoria_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.categorias = []
    $scope.categoriaAdd = {
        "categoria_nome": ""
    }

    $http({

        method: 'POST',
        url: "/gtx/Produto/getCategorias",
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {

        $scope.categorias = response.data
        $timeout(function () {
            $('#catTable').DataTable();
        }, 500);
    })


    $scope.setCategoria = function () {
        $http({

            method: 'POST',
            url: "/gtx/Produto/setCategorias",
            data: $.param($scope.categoriaAdd),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {

            $http({

                method: 'POST',
                url: "/gtx/Produto/getCategorias",
                headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

            }).then(function (response) {

                $scope.categorias = response.data
                $timeout(function () {
                    $('#catTable').DataTable();
                }, 500);
            })

        })
    }

}]);

angular.module('app_landing').controller('users_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.users = []

    $http({

        method: 'POST',
        url: "/gtx/Home/getUsers",
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {

        $scope.users = response.data
        $timeout(function () {
            $('#usersTable').DataTable();
        }, 500);
    })

}]);

angular.module('app_landing').controller('addUser_ctrl', ['$scope', '$http','$timeout', function ($scope, $http,$timeout) {

    $scope.user = {
        "user_nome": "",
        "user_sobrenome": "",
        "user_email": "",
        "user_tipo": "",
        "user_login": "",
        "user_senha": ""
    }
    $scope.loader_send = false;
    $scope.user_senhaConfirmar = '';
    $scope.senhaIncorreta = false;

    var url_string = window.location.href
    var url = new URL(url_string);
    var id = url.searchParams.get("id");

    if(id !== null){

        $http({

            method: 'POST',
            url: "/gtx/Home/getUsers",
            data: $.param({where: id}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

        }).then(function (response) {

            $scope.user = response.data[0]
        })
        }

    $scope.setUser = function () {

        if($scope.user.user_nome !== ""){
            if($scope.user.user_sobrenome !== ""){
                if($scope.user.user_email !== ""){
                    if($scope.user.user_login !== ""){
                        if(id == null){
                        if($scope.user.user_senha !== ""){
                            if($scope.user.user_senha == $scope.user_senhaConfirmar){


                                    $scope.loader_send = true;

                                $http({

                                    method: 'POST',
                                    url: "/gtx/Home/setUser",
                                    data: $.param({data: $scope.user}),
                                    headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

                                }).then(function (response) {

                                    $scope.loader_send = false;

                                    $.notify({
                                        // options
                                        icon: '',
                                        title: 'O usuário foi cadastrado com sucesso',
                                        url: 'https://github.com/mouse0270/bootstrap-notify',
                                        target: '_blank'
                                    }, {
                                        // settings
                                        element: 'body',
                                        position: null,
                                        type: "success",
                                        allow_dismiss: true,
                                        newest_on_top: false,
                                        showProgressbar: false,
                                        placement: {
                                            from: "top",
                                            align: "right"
                                        },
                                        offset: 20,
                                        spacing: 10,
                                        z_index: 1031,
                                        delay: 5000,
                                        timer: 1000,
                                        url_target: '_blank',
                                        mouse_over: null,
                                        animate: {
                                            enter: 'animated fadeInDown',
                                            exit: 'animated fadeOutUp'
                                        },
                                        onShow: null,
                                        onShown: null,
                                        onClose: null,
                                        onClosed: null,
                                        icon_type: 'class',
                                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                        '<span data-notify="icon"></span> ' +
                                        '<span data-notify="title">{1}</span> ' +
                                        '<span data-notify="message">{2}</span>' +
                                        '<div class="progress" data-notify="progressbar">' +
                                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                                        '</div>' +
                                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                                        '</div>'
                                    });

                                    $timeout(function () {
                                        window.location.href = "users";
                                    }, 2000);

                                })

                            }
                        }else{
                                $scope.senhaIncorreta = true;
                            }
                    }else{
                            if($scope.user.user_senha !== "" || $scope.user.user_senha == $scope.user_senhaConfirmar){
                            $scope.loader_send = true;

                            $http({

                                method: 'POST',
                                url: "/gtx/Home/setUpdateUser",
                                data: $.param({data: $scope.user, id: id}),
                                headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

                            }).then(function (response) {

                                $scope.loader_send = false;

                                $.notify({
                                    // options
                                    icon: '',
                                    title: 'O usuário foi editado com sucesso',
                                    url: 'https://github.com/mouse0270/bootstrap-notify',
                                    target: '_blank'
                                }, {
                                    // settings
                                    element: 'body',
                                    position: null,
                                    type: "success",
                                    allow_dismiss: true,
                                    newest_on_top: false,
                                    showProgressbar: false,
                                    placement: {
                                        from: "top",
                                        align: "right"
                                    },
                                    offset: 20,
                                    spacing: 10,
                                    z_index: 1031,
                                    delay: 5000,
                                    timer: 1000,
                                    url_target: '_blank',
                                    mouse_over: null,
                                    animate: {
                                        enter: 'animated fadeInDown',
                                        exit: 'animated fadeOutUp'
                                    },
                                    onShow: null,
                                    onShown: null,
                                    onClose: null,
                                    onClosed: null,
                                    icon_type: 'class',
                                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                    '<span data-notify="icon"></span> ' +
                                    '<span data-notify="title">{1}</span> ' +
                                    '<span data-notify="message">{2}</span>' +
                                    '<div class="progress" data-notify="progressbar">' +
                                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                                    '</div>' +
                                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                                    '</div>'
                                });

                                $timeout(function () {
                                    window.location.href = "/gtx/home/users";
                                }, 2000);

                            })
                        }
                }                        }
                }
        }
        }

    }

}]);

