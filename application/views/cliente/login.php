<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" ng-app="app_landing">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" ng-show="mobileActive == false" content="width=1960">
    <meta name="viewport" ng-show="mobileActive" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="gJupZ3IAxhkzShW-a0VDNkb4MiX9oPps_DgcOYJg_QI" />
    <title>
        GTX
    </title>
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <style>
        @font-face {
            font-family: Circe;
            src: url('<?=base_url()?>CirceRounded-ExtraLight.otf') format("opentype");

        }
    </style>

    <!--end::Web font -->
    <!--begin::Base Styles -->
    <!--begin::Page Vendors -->


    <title>GTX</title>
    <!-- css -->

    <link href="<?= base_url() ?>public/assets/metronic/custom/css/lib/font-awesome/font-awesome.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url() ?>public/assets/metronic/custom/css/Website/Global/global.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url() ?>public/assets/metronic/custom/css/Website/Home/HomePage.css" rel="stylesheet"
          type="text/css"/>

    <script src="<?= base_url('public/assets/metronic/custom/js/lib/jquery-3.3.1.min.js')?>"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <base_url value="<?= base_url() ?>"></base_url>

</head>
<!-- end::Head -->
<body ng-controller="loginCliente_ctrl">
<!------ Include the above in your HEAD tag ---------->

<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" ng-class="{'error-login': dataLoginError.user_login == true }" id="inputEmail" ng-model="dataLogin.cliente_username" class="form-control" placeholder="Login/Email" required autofocus>
            <input type="password" ng-class="{'error-login': dataLoginError.user_senha == true }"  id="inputPassword" ng-model="dataLogin.cliente_pass" class="form-control" placeholder="Senha" required>
            <div style="margin-bottom: 10px; color: red;" ng-show="mensagem_erro">{{mensagem_erro}}</div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" ng-click="doLogin()">
                <div class="content-loader" ng-show="loader">
                    <div class="loader" id="loader-6">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                Entrar</button>
        </form><!-- /form -->
        <a href="#" class="forgot-password">
            Esqueceu sua senha?
        </a>
    </div><!-- /card-container -->
</div><!-- /container -->


<script src="<?= base_url('public/assets/metronic/custom/js/lib/angular.min.js')?>"></script>
<script src="<?= base_url('public/assets/metronic/custom/js/lib/parallax.js')?>"></script>



<script src="<?= base_url('public/assets/metronic/custom/js/angular/modules/Keepbox.module.js') ?>"
        type="text/javascript"></script>
<script src="<?= base_url('public/assets/metronic/custom/js/angular/constants/config.constant.js') ?>"
        type="text/javascript"></script>


<!--angular pré cadastro -->
<script src="<?= base_url('public/assets/metronic/custom/js/angular/modules/landing_pages/pre_cadastro.module.js') ?>"
        type="text/javascript"></script>
<!--angular pré cadastro -->
<script src="<?= base_url('public/assets/metronic/custom/js/angular/services/pre_cadastro.service.js') ?>"
        type="text/javascript"></script>

<!--angular pré cadastro -->
<script src="<?= base_url('public/assets/metronic/custom/js/angular/controllers/landing_pages/pre_cadastro.controller.js') ?>"
        type="text/javascript"></script>
</body>
<!-- end::Body -->
</html>
