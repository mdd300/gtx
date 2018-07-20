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
                    window.location.href = base_url + "home/clientes"
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

    $scope.clientes = []
;
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

    $scope.loader_send = false;

    $scope.cliente = []

    $http({

        method: 'POST',
        url: "/gtx/home/getClienteWhere",
        data: $.param({id: $("#user_id").val()}),
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {

        console.log(response.data)

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

    $scope.produtos = [
        {
            "produto_nome": "",
            "produto_unidade": "",
            "produto_comentario": "",
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

    $scope.addMoreProd = function () {
        $scope.produtos.push({
            "produto_nome": "",
            "produto_unidade": "",
            "produto_comentario": "",
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
    }
    $scope.addMoreCamisas = function (id) {
        $scope.produtos[id].camisas.push({
            "camisa_nome": "",
            "camisa_tamanho": "",
            "camisa_numero": "",
            "camisa_short": "",
            "camisa_comentario": "",
        })


    }

    $scope.setPedido = function () {

        $scope.loader_send = true;

        $http({

                method: 'POST',
                url: "/gtx/pedido/setPedido",
                data: $.param({produtos: $scope.produtos, id: $(".id-cliente").val()}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

            }).then(function (response) {

            $scope.loader_send = false;

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

        })

        });

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

            console.log(content)

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

                    console.log(content.find("#img-element")[0])
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

                console.log(content.find(".parent-index-img").val())

                $scope.insertImg.push({
                        "produto_id": $scope.pedido.produtos[content.find(".parent-index-img").val()].produto_id,
                    "insert":{
                        "src":""
                    }
                })

                console.log($scope.insertImg);

                $scope.$apply();


            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $scope.changeStatus = function (status) {

        $scope.pedido.pedido_status = status;
        $scope.status_chanced = true;

    }

    $scope.addMoreCamisas = function (id) {
        $scope.insertCamisa.push({
            "camisa_nome": "",
            "camisa_tamanho": "",
            "camisa_numero": "",
            "camisa_short": "",
            "camisa_comentario": "",
            "produto_id": id
        })

    }
    $scope.deleteCamisa = function (id) {

        $scope.insertCamisa.splice(id, 1);

    }
    $scope.deleteCamisaPrinc = function (id,prod,cam) {

        $scope.deleteCamisas.push({"camisa_id": id});
        $scope.pedido.produtos[prod].camisas.splice(cam, 1);

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
                            window.location.href = base_url + "cliente/pedidos"
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
        url: "/gtx/cliente/getPedidos",
        headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}

    }).then(function (response) {

        $scope.pedidos = response.data;

        console.log($scope.pedidos)
        $timeout(function () {
            $('#pedidoTable').DataTable();
        }, 500);
    })


}]);

