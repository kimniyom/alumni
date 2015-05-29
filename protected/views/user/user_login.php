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
                var url = "index.php?r=frontend/user/do_login";
                var data = {username: $("#username").val(), password: $("#password").val()};
                $.post(url, data, function (success) {
                    if (success == '1') {
                        window.location = "index.php?r=site/index";
                    } else if (success == '2') {
                        $("#msg_login").html("<center><font style='color:red'>รอการยืนยันจากผู้ดูแลระบบ ...!</font></center>");
                    } else {
                        $("#msg_login").html("<center><font style='color:red'>Login Wrong ...!</font></center>");
                    }
                });
            }

        </script>
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#">
                    <img src="<?php echo $path; ?>dist/img/avatar.png" class="img-circle" alt="User Image" width="100"/><br/>
                    <b>ตัวแทนบริษัท</b>เข้าสู่ระบบ</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg" id="msg_login">กรอกข้อมูลเพื่อเข้าสู่ระบบ</p>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="required"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required"/>
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
                        <button type="reset" class="btn btn-danger btn-block btn-flat">
                            <i class="fa fa-remove"></i>
                            ยกเลิก
                        </button>
                    </div><!-- /.col -->
                </div>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="<?php echo Yii::app()->createUrl('site/index') ?>" 
                       class="btn btn-block btn-social btn-facebook btn-flat">
                        <i class="fa fa-arrow-left"></i> กลับหน้าเว็บไซต์
                    </a>
                </div><!-- /.social-auth-links -->
                
                <a href="index.php?r=Forgot/user">? ลืมรหัสผ่าน</a><br>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->



    </body>
</html>