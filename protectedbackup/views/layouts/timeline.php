<?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>ข้อมูลส่วนตัว</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?php echo $path; ?>assets/css/bootstrap.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo $path; ?>assets/css/facebook.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->

        <script type="text/javascript" src="<?php echo $path; ?>assets/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $path; ?>assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js_store/js_detail_collegian.js"></script>

        <!-- Effect -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/assets/ihover-gh-pages/src/ihover.css" rel="stylesheet">

        <!-- Croup IMG -->
        <?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
        <!--
        <link rel="stylesheet" href="dependencies/bootstrap-3.2.0/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="demo_assets/google-code-prettify/prettify.css">

        <script src="dependencies/jquery/jquery-1.11.1.min.js"></script>    
        <script src="dependencies/bootstrap-3.2.0/js/bootstrap.min.js"></script>
        <!--for bootstrap theme-->
        <script src="<?php echo $croup; ?>dependencies/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
        <script src="<?php echo $croup; ?>demo_assets/google-code-prettify/prettify.js"></script>

        <script src="<?php echo $croup; ?>src/jquery.picture.cut.js"></script>

        <!--
            CkEditor
        -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/adapter/ckeditor.js"></script>
        <!--
        <link rel="stylesheet" href="demo_assets/demo.css">
        -->

        <!-- 
            การเรียกใช้ datatable 
        -->

        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/css/dataTables.bootstrap.css">
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {
                $('[data-toggle=offcanvas]').click(function () {
                    $(this).toggleClass('visible-xs text-center');
                    $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
                    $('.row-offcanvas').toggleClass('active');
                    $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
                    $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
                    $('#btnShow').toggle();
                });

            });

            function CheckNum() {
                if (event.keyCode < 48 || event.keyCode > 57) {
                    event.returnValue = false;
                }
            }

            $(document).ready(function () {
                head_menu();
                var url = "index.php?r=frontend/privilege/header";
                var user_status = "<?php echo Yii::app()->session['user'] ?>";

                var data = {status_user: user_status};
                $.post(url, data, function (result) {
                    $("#head_bar").html(result);
                });
            });
            
            function head_menu(){
                var url = "index.php?r=frontend/privilege/header_menu";
                var user_status = "<?php echo Yii::app()->session['user'] ?>";

                var data = {status_user: user_status};
                $.post(url, data, function (result) {
                    $("#head_menu").html(result);
                });
            }

        </script>


    </head>

    <body>

        <div class="wrapper">
            <div class="box">
                <div class="row row-offcanvas row-offcanvas-left">
                    <!-- main right col -->
                    <div class="column col-sm-12 col-xs-12" id="main">                     
                        <!-- top nav -->
                        <div class="navbar navbar-blue navbar-static-top">  
                            <div class="navbar-header">
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <!-- ดึงเมนูแยกสถานะ -->
                                <div id="head_bar">LOADING ...</div>
                            </div>
                            
                            <div id="head_menu"></div>
                            
                            
                        </div>
                        <!-- /top nav -->

                        <div class="padding">
                            <div class="full col-sm-9">
                                <?php echo $content; ?>
                            </div>
                        </div><!-- /padding -->
                    </div>
                    <!-- /main -->

                </div>
            </div>
        </div>


    </body></html>