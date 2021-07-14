<?php
//Code By Tmq

require('system/function.php');


if(isset($_POST['Reg'])){

    $user = xss($_POST['username']);
    //$email = (int)$_POST['email'];
    $tel = (int)$_POST['tel'];
    $pass = xss($_POST['password']);
    $repass = xss($_POST['repassword']);

    $check = $db->query("select `username`,`password` from `user` where `username` = '$user' limit 1")->fetch();

    if($user != null && $tel != null && $pass != null && $repass != null){
        if($check['username'] == null){
            if($pass == $repass){
            $db->exec("INSERT INTO `user`
            (`username`, `password`, `email`, `phone`, `cash`, `admin`, `ban`, `date`) 
            VALUES 
            ('$user','".mahoa($pass)."','$email','$tel',0,0,0,'".date('d-m-Y')."')");
            $success =  'Dang ky thanh cong';
            }else{ $err = 'Password khong giong nhau'; }
        }else{ $err = 'Username da ton tai'; }
    }else{ $err = 'Vui long nhap du thong tin'; }


}


?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>acc957.com - Đăng Ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="PVN" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap  -->
    <link href="/assets/frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="https://acc957.com/assets/frontend/css/LTE.css">
    <script src="https://acc957.com/Scripts/jquery-3.3.1.js"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="https://acc957.com/Scripts/sweetalert/sweetalert.min.js"></script>
    <script src="https://acc957.com/Scripts/helpers.js"></script>
    <!-- Bootstrap -->
    <script src="https://acc957.com/assets/frontend/theme/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://acc957.com/Scripts/loadingoverlay/loadingoverlay.min.js"></script>
    <script src="https://acc957.com/Scripts/loadingoverlay/loadingoverlay_progress.min.js"></script>
    <!-- Sweetalert Css -->
    <link href="https://acc957.com/Scripts/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>
<body>

    <div class="loader"></div>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('/upload-usr/images/Login_bg.jpg'); ">
            <div class="login-box">
                <form action="#" method="post" id="frmRegister">
                    <!-- /.login-logo -->
                    <div class="login-box-body">
                        <div class="login-logo" style="display: none;">
                            <a href="/"><img src="/upload-usr/images/logo.png" alt="" title="" media-simple="true" style="width: 100%;"></a>
                        </div>
                        <!--<h2 class="login-box-msg">QUÊN MẬT KHẨU</h2>-->
                        <div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control input-lg no-border" placeholder="Tài khoản">
                                <!--<span class="fa fa-user t40 form-control-feedback"></span>-->
                            </div>
                            <div class="form-group" style="display: none;">
                                <input type="email" name="email" class="form-control input-lg no-border" placeholder="Email">
                                <!--<span class="fa fa-envelope t40 form-control-feedback"></span>-->
                            </div>
                            <div class="form-group">
                                <input type="tel" name="tel" class="form-control input-lg no-border" placeholder="Số điện thoại">
                                <!--<span class="fa fa-phone t40 form-control-feedback"></span>-->
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control input-lg no-border" placeholder="Mật khẩu">
                                <!--<span class="fa fa-lock t40 form-control-feedback"></span>-->
                            </div>
                            <div class="form-group">
                                <input type="password" name="repassword" class="form-control input-lg no-border" placeholder="Xác nhận mật khẩu">
                                <!--<span class="fa fa-lock t40 form-control-feedback"></span>-->
                            </div>
                            <div class="form-group"  style="display: none;">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <img style="cursor:pointer" class="form-control input-lg no-border" id="imgcaptcha" src="/Home/Captcha?7888" onclick="document.getElementById('imgcaptcha').src = '/Home/Captcha?'+ Math.random(); document.getElementById('captcha').focus();">
                                        
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" name="captcha" class="form-control input-lg no-border text-center t14" placeholder="Nhập mã xác nhận">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" name="Reg" class="btn btn-gray btn-lg btn-block no-border">Đăng ký</button>
                                </div>
                            </div>

                            <!-- /.social-auth-links -->
                            <div class="login-fg text-center">
                                <i style="color:#616161;">Đã có tài khoản ? </i>
                                <a href="/dang-nhap" class="bb t16" style="color:#616161;">Đăng nhập</a>
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