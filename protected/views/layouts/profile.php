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
        <link rel="stylesheet" href="demo_assets/demo.css">
        -->

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

        </script>


    </head>

    <body>

        <div class="wrapper">
            <div class="box">
                <div class="row row-offcanvas row-offcanvas-left">

                    <!-- sidebar -->
                    <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">

                        <ul class="nav">
                            <li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
                        </ul>

                        <ul class="nav hidden-xs" id="lg-menu">
                            <li class="active"><a href="#featured"><i class="glyphicon glyphicon-home"></i> หน้าเว็บไซต์</a></li>
                            <li><a href="#stories"><i class="glyphicon glyphicon-comment"></i> ข้อความจากผู้ดูแลระบบ <span class="label label-danger">10</span></a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-user"></i> ข้อความจากเพื่อนนักศึกษา <span class="label label-info">10</span></a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> ข้อความจากตัวแทนบริษัท <span class="label label-success">10</span></a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-refresh"></i> Refresh</a></li>
                        </ul>
                        <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                            <li>
                                <a href="http://usebootstrap.com/theme/facebook"><h3>Bootstrap</h3> <i class="glyphicon glyphicon-heart-empty"></i> Bootply</a>
                            </li>
                        </ul>

                        <!-- tiny only nav-->
                        <ul class="nav visible-xs" id="xs-menu">
                            <li><a href="#featured" class="text-center"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-comment"></i></a></li>
                            <li><a href="#" class="text-center"><i class="glyphicon glyphicon-user"></i></a></li>
                            <li><a href="#" class="text-center"><i class="glyphicon glyphicon-envelope"></i> </a></li>
                            <li><a href="#" class="text-center"><i class="glyphicon glyphicon-refresh"></i></a></li>
                        </ul>

                    </div>
                    <!-- /sidebar -->

                    <!-- main right col -->
                    <div class="column col-sm-10 col-xs-11" id="main">

                        <!-- top nav -->
                        <div class="navbar navbar-blue navbar-static-top">  
                            <div class="navbar-header">
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a href="<?php echo Yii::app()->createUrl('frontend/Collegian/Profile&collegian_code=' . Yii::app()->session['collegian_code']); ?>" 
                                   class="navbar-brand" 
                                   style=" margin: 0px; padding: 7px;" id="logo_profile">
                                       <?php
                                       $collegian = new Collegian();
                                       $img = $collegian->Get_img_profile(Yii::app()->session['collegian_code']);
                                       ?>
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads/<?php echo $img; ?>" 
                                         style="height: 35px; margin: 0px;" class="img-rounded">
                                    <b>
                                        <?php echo Yii::app()->session['collegian_name']; ?>
                                    </b>
                                </a>
                            </div>
                            <nav class="collapse navbar-collapse" role="navigation">
                                <form class="navbar-form navbar-left">
                                    <div class="input-group input-group-sm" style="max-width:360px;">
                                        <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="#"><b> หน้าแรก</b></a>
                                    </li>
                                    <li style="padding: 0px;">

                                    </li>
                                    <li>
                                        <a href="#"><span class="badge">badge</span></a>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?php echo Yii::app()->createUrl('frontend/collegian/edit_password&collegian_code=' . Yii::app()->session['collegian_code']) ?>">
                                                    <i class="fa fa-key"></i> เปลี่ยนรหัสผ่าน</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo Yii::app()->createUrl('site/logout') ?>">
                                                    <i class="fa fa-power-off"></i> ออกจากระบบ</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
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