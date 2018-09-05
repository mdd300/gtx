<!doctype html>
<html lang="en" ng-app="app_landing">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?=base_url()?>public/assetsBoot/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>GTX Sports</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="<?=base_url()?>public/assets/metronic/custom/css/Website/Pedido/style_pedido.css" rel="stylesheet" />

    <!-- Bootstrap core CSS     -->
    <link href="<?=base_url()?>public/assetsBoot/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>public/assetsBoot/css/datatable.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?=base_url()?>public/assetsBoot/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?=base_url()?>public/assetsBoot/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="<?=base_url()?>public/assetsBoot/css/croppie.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?=base_url()?>public/assetsBoot/css/pe-icon-7-stroke.css" rel="stylesheet" />


    <!--   Core JS Files   -->
    <script src="<?=base_url()?>public/assetsBoot/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assetsBoot/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assetsBoot/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assetsBoot/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>public/assetsBoot/js/croppie.min.js" type="text/javascript"></script>

</head>
<body>

<div class="wrapper" style="height: auto !important;">
    <div class="sidebar" data-color="purple" data-image="<?=base_url()?>public/assetsBoot/img/sidebar-5.jpg">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper" style="background-color: #4682B4">
            <div class="logo">
                <a href="" class="simple-text">
                    <b>GTX</b> Sports
                </a>
            </div>

            <ul class="nav">
<!--                --><?php //if($selected == 1){?>
<!--                <li class="active">-->
<!--                    --><?php //}else{?>
<!--                <li >-->
<!--                    --><?php //}?>
<!--                    <a href="--><?//=base_url()?><!--home/dashboard">-->
<!--                        <i class="pe-7s-graph"></i>-->
<!--                        <p>Dashboard</p>-->
<!--                    </a>-->
<!--                </li>-->
                <li class="active">
                    <a href="<?=base_url()?>home/pedidosCli">
                        <i class="pe-7s-note2"></i>
                        <p>Pedidos</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?=base_url('home/cliente')?>">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>