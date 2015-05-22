<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            ทะเบียน ศิษย์เก่า 
        </title>
        <?php
        $path = Yii::app()->baseUrl . '/themes/bootstrap/';
        $LTE = Yii::app()->baseUrl . '/themes/AdminLTE2/';
        ?>

        <link href="<?php echo Yii::app()->baseUrl; ?>/css/style_alumni.css" rel="stylesheet">
        <link href="<?php echo $path; ?>css/bootstrap-cosmo.min.css" rel="stylesheet">
        <!-- Font Awesome Icons -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Effect -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/assets/ihover-gh-pages/src/ihover.css" rel="stylesheet">

        <!-- Theme style -->
        <link href="<?php echo $LTE; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $LTE; ?>dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo $path; ?>jquery/jQuery-2.1.3.min.js"></script>
        <script type="text/javascript" src="<?php echo $path; ?>js/bootstrap.min.js"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo $LTE; ?>dist/js/app.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js_store/js_main.js" type="text/javascript"></script>

        <!-- Croup IMG -->
        <?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
        <script src="<?php echo $croup; ?>dependencies/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
        <script src="<?php echo $croup; ?>demo_assets/google-code-prettify/prettify.js"></script>

        <script src="<?php echo $croup; ?>src/jquery.picture.cut.js"></script>

        <!-- 
            การเรียกใช้ datatable 
        -->

        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/css/dataTables.bootstrap.css">
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>

        <!--
        Bootstrap Swite 
        -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

        <script type="text/javascript">
            function CheckNum() {
                if (event.keyCode < 48 || event.keyCode > 57) {
                    event.returnValue = false;
                }
            }

            $(document).ready(function () {
                var windowsize = ($(window).width());
                if (windowsize < 768) {
                    $("#banner").hide();
                } else {
                    $("#banner").show();
                }

                $(window).resize(function () {
                    if (windowsize < 768) {
                        $("#banner").hide();
                    } else {
                        $("#banner").show();
                    }
                });
            });

        </script>

    </head>

    <body style="background: #ecf0f5;">

        <div class="navbar navbar-default" style=" margin-bottom: 0px; background: none;"></div>
        <div class="navbar navbar-default navbar-fixed-top" style=" background:url('<?php echo $path; ?>images/bg-green.jpg')#1d9d74; box-shadow:0px 0px 3px 0px #666666; border-bottom: none;">
            <div class="container">
                <div class="navbar-header">
                    <a href="../" class="navbar-brand" style=" font-weight: bold;">
                        <font style="color:#99ff33;">เว็บไซต์ทำเนียบรุ่น </font>
                        <font style="color:#ffff33;">Com Sci</font>
                    </a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="link">เกี่ยวกับเว็บไซต์ <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="themes">
                                <li><a href="../default/">Default</a></li>
                                <li><a href="../cerulean/">Cerulean</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../help/" id="link">ติดต่อ</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <?php if (Yii::app()->session['user'] == '') { ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('frontend/user/register') ?>" id="link">
                                    <i class="fa fa-group"></i> สมัคสมาชิก</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="link">
                                    <i class="fa fa-lock"></i>
                                    เข้าสู่ระบบ <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="download">
                                    <li><a href="<?php echo Yii::app()->createUrl('frontend/collegian/login') ?>"><i class="fa fa-mortar-board"></i>นักศึกษา / ศิษย์เก่า</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('frontend/user/login') ?>"><i class="fa fa-user"></i> ทั่วไป</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('Main_admin') ?>"><i class="fa fa-gear"></i> ผู้ดูแลระบบ</a></li>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('site/logout') ?>" id="link">
                                    <i class="fa fa-power-off"></i> ออกจากระบบ
                                </a>
                            </li>
                        <?php } ?>
                    </ul>

                </div>
            </div>
        </div>

        <!--
        Start Banner By Kimniyom
        -->
        <div class="row" style="background:url('<?php echo $path; ?>images/bg-green.jpg'); margin-bottom:0px; margin-top: 0px;" id="banner">
            <div class="container">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <center>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" style="height: 300px;">
                                    <?php
                                    for ($i = 0; $i <= 2; $i++) {
                                        if ($i == '0') {
                                            $class = "item active";
                                        } else {
                                            $class = "item";
                                        }
                                        ?>
                                        <div class="<?php echo $class; ?>" style="color:#FFF;">
                                            <div class="row">
                                                <div class=" col-md-7 col-sm-7" style=" text-align: left;">
                                                    <h1 style="color:#FFF; text-shadow:2px 1px #000;">วิทยาการคอมพิวเตอร์ จบแล้วทำงานอะไร</h1>
                                                    <br/>
                                                    <div class="alert alert-success">
                                                        <p style=" font-size: 18px;text-indent: 2.5em;">
                                                            สาขานี้เรียนอะไร
                                                            สาขาวิทยาการคอมพิวเตอร์ เป็นสาขาที่เรียนเกี่ยวกับทฤษฎีการคำนวณสำหรับคอมพิวเตอร์
                                                            ทฤษฎีการประมวลผลสารสนเทศ ทั้งด้านซอฟต์แวร์ ฮาร์ดแวร์ และ เครือข่าย 
                                                            ซึ่งประกอบด้วยหลายหัวข้อที่เกี่ยวข้องกับคอมพิวเตอร์.</dd>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class=" col-md-5 col-sm-5">
                                                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/devices3.png" height="250" style=" margin-top: 10px;"/>
                                                </div>
                                            </div>
                                        </div> 
                                    <?php } ?>
                                </div>
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <!--
        END BANNER 
        -->

        <div class="row" style=" background: #f5f5f5; margin-bottom:0px; border-bottom: solid #eeeeee 1px; border-top: solid 1px #FFF;">
            <div class="container" style=" height: 45px; padding-top: 5px;">

                <ol class="breadcrumb">
                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'homeLink' => '<i class="fa fa-home"></i>',
                            'links' => $this->breadcrumbs,
                        ));
                        ?><!-- breadcrumbs -->
                    <?php endif ?>
                </ol>

            </div>
        </div>

        <div class="row" style="background:url('<?php echo $path; ?>images/tooplate_home_body.png')repeat-x top; padding:10px 10px 0px 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-3">


                        <!--
                            Detail User 
                        -->
                        <?php if (Yii::app()->session['user'] != "") { ?>
                            <input type="hidden" id="status_user" value="<?php echo Yii::app()->session['user']; ?>"/>
                            <div id="box_detail_user"></div>
                        <?php } else { ?>
                            <input type="hidden" id="status_user" value=""/>
                        <?php } ?>

                        <div class="box box-danger">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="fa fa-search"></i> ค้นหา</h3>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="<?php echo Yii::app()->createUrl('frontend/search/search_collegian_address') ?>"><i class="fa fa-home"></i> ค้นหาตามที่อยู่</a></li>
                                        <li><a href="#"><i class="fa fa-mortar-board"></i> ค้นหาตามวุฒิการศึกษา</a></li>
                                        <li><a href="#"><i class="fa fa-legal"></i> ค้นหาตามประวัติการทำงาน</a></li>
                                        <li><a href="#"><i class="fa fa-suitcase"></i> ค้นหาตามผลงานนักศึกษา</a></li>
                                        <li><a href="#"><i class="fa fa-thumbs-o-up"></i> ค้นหาตามความถนัด</a></li>
                                    </ul>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>

                        <div class="btn btn-info" style=" width: 100%; margin-bottom: 20px;">
                            <a href="<?php echo Yii::app()->createUrl('frontend/search/search_collegian') ?>">
                                <i class="fa fa-search"></i> ค้นหาข้อมูลศิษย์เก่า
                            </a>
                        </div>

                        <!-- USERS LIST -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">สมาชิกใหม่</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">

                                    <?php
                                    $agent = new CompanyAgent();
                                    $company = $agent->findAll(" active = '1' limit 8");
                                    foreach ($company as $c):
                                        $img = $agent->Get_img_profile($c['id']);
                                        ?>

                                        <li>
                                            <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads_images_user/<?php echo $img;?>" alt="User Image"/>
                                            <a class="users-list-name" href="javascript:void(0);"><?php echo $c['name'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul><!-- /.users-list -->
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <!--
                                <a href="javascript::" class="uppercase">View</a>
                                -->
                            </div><!-- /.box-footer -->
                        </div><!--/.box -->

                    </div>


                    <div class="col-lg-9 col-sm-9">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="row" style="background:url('<?php echo $path; ?>images/bg-green.jpg'); margin-bottom:0px; margin-top: 0px; border-top: solid 3px #FFF;">
            <div class="container" style=" height: 150px;"></div>
        </div>
    </body>

</html>

