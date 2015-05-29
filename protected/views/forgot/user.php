<?php $path = Yii::app()->baseUrl . '/themes/AdminLTE2/' ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE 2 | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo $path; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo $path; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo $path; ?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo $path; ?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo $path; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo $path; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            function sent_form() {
                var url = "index.php?r=forgot/check_user";
                var data = {mobile: $("#mobile").val(), email: $("#email").val()};
                $.post(url, data, function (success) {
                    $("#msg_login").html(success);
                });
            }

        </script>
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#">
                    <img src="<?php echo $path; ?>dist/img/forgot_pass.jpg" class="img-circle" alt="User Image" width="100"/><br/>
                    <b>ลืมรหัสผ่าน</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg" id="msg_login">กรอกข้อมูล</p>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="เบอร์โทรศัพท์มือถือ" required="required"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" id="email" name="email" class="form-control" placeholder="อีเมล์" required="required"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="sent_form();">
                            <i class="fa fa-lock"></i>
                            ตกลง
                        </button>
                    </div>
                    <div class="col-xs-6">
                    </div><!-- /.col -->
                </div>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="<?php echo Yii::app()->createUrl('site/index') ?>" 
                       class="btn btn-block btn-social btn-facebook btn-flat">
                        <i class="fa fa-arrow-left"></i> กลับหน้าเว็บไซต์
                    </a>
                </div><!-- /.social-auth-links -->

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->



    </body>
</html>
