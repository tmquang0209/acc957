<?php
//Code By Tmq
require('system/config.php');
require('system/function.php');

if ($_SESSION['username'] != null) {
    header('Location: /');
}
if (isset($_POST['Login'])) {
    $user = xss($_POST['Username']);
    $pass = xss($_POST['password']);
    $captcha = $_POST['g-recaptcha-response'];
    $check = $db->query("select `username`,`password` from `user` where `username` = '$user' limit 1")->fetch();
    if (!empty($user) && !empty($pass)) {
        if ($check['username'] != null) {
            if ($check['password'] == mahoa($pass)) {
                if($_POST['g-recaptcha-response']){
                $err = 'Login success';
                $_SESSION['username'] = $check['username'];
                header('Location: /');
                }else{ $err = 'Captcha khong chinh xac'; }
            } else {
                $err = 'Password sai';
            }
        } else {
            $err = 'Username khong ton tai';
        }
    } else {
        $err = 'Vui long nhap du thong tin';
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$_SERVER['SERVER_NAME'];?> - Đăng Nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="PVN" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap  -->
    <link href="/assets/frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/frontend/css/LTE.css">
    <script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
    <script src="/Scripts/jquery-3.3.1.js"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="/Scripts/sweetalert/sweetalert.min.js"></script>
    <script src="/Scripts/helpers.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/frontend/theme/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/Scripts/loadingoverlay/loadingoverlay.min.js"></script>
    <script src="/Scripts/loadingoverlay/loadingoverlay_progress.min.js"></script>
    <!-- Sweetalert Css -->
    <link href="/Scripts/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>

<body class="hold-transition login-page">
    <div class="loader"></div>
    <div class="limiter">
        <input type="hidden" id="mess" value="" />
        <div class="container-login100" style="background-image: url('/upload-usr/images/Login_bg.jpg'); ">
            <div class="login-box">
                <form action="#" method="post" id="frmlogin">
                    <!-- /.login-logo -->
                    <div class="login-box-body">
                        <div class="login-logo">
                            <a href="/"><img src="/upload-usr/images/logo.png" alt="" title="" media-simple="true" style="width: 100%;"></a>
                        </div>
                        <!--<h2 class="login-box-msg">QUÊN MẬT KHẨU</h2>-->
                        <div>

                            <div class="form-group has-feedback">
                                <input type="text" name="Username" class="form-control input-lg no-border" required="" placeholder="Tài khoản">
                                <span class="fa fa-user t40 form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control input-lg no-border" required="" placeholder="Mật khẩu">
                                <span class="fa fa-lock t40 form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="g-recaptcha" data-sitekey="6LdyWo8bAAAAABnq6WFZqljWKpmGDQ2q0mRpE2hu"></div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" name="Login" class="btn btn-gray btn-lg btn-block no-border">Đăng nhập</button>
                                </div>
                            </div>

                            <!-- /.social-auth-links -->
                            <div class="login-fg">
                                <a href="/quen-mat-khau"><span class="logo-lg">Quên mật khẩu</span></a>
                                <a href="/dang-ky" class="r">Đăng ký</a>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/Sys_Users/LoginFB" class="btn btn-blue btn-lg btn-block no-border" style="margin-top: 20px;font-size:15px;text-align:left;">
                                        <i class="fa fa-facebook-official fa-lg" style="margin-right: 10px;" aria-hidden="true"></i>Đăng nhập với Facebook
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php 
if(isset($err)){
    echo '<script>swal("Error!", "'.$err.'", "error");</script>';
}
?>
</html>