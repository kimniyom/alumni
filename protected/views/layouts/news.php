<?php $path = Yii::app()->baseUrl . '/themes/news/'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>จัดการข่าวสาร</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script type="text/javascript" src="<?php echo $path; ?>assets/js/jquery.js"></script>
        <link href="<?php echo $path; ?>assets/css/bootstrap.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Data Table -->
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/css/dataTables.bootstrap.css">
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>

        <!-- End Of Data Table -->
        <link href="<?php echo $path; ?>assets/css/facebook.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo $path; ?>assets/js/bootstrap.js"></script>
        <!-- CkEditor -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/adapter/ckeditor.js"></script>
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
        </script>
    </head>

    <body>
        <?php
        if (empty(Yii::app()->session['user'])) {
            $this->redirect(array('site/main'));
        }
        ?>
        <div class="wrapper">
            <div class="box">
                <div class="row row-offcanvas row-offcanvas-left">

                    <!-- sidebar -->
                    <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">

                        <ul class="nav">
                            <li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
                        </ul>

                        <ul class="nav hidden-xs" id="lg-menu">
                            <?php $news_model = new News_collegian(); ?>
                            <li><a href="index.php?r=site"><i class="glyphicon glyphicon-home"></i> กลับหน้าเว็บ</a></li>
                            <?php if (Yii::app()->session['user'] == "U") { ?>
                                <li><a href="index.php?r=frontend/collegian/profile&collegian_code=<?php echo Yii::app()->session['collegian_code'] ?>">
                                        <i class="glyphicon glyphicon-chevron-left"></i> กลับหน้าโปรไฟล์</a>
                                </li>
                            <?php } else { ?>
                                <li><a href="<?php echo Yii::app()->createUrl("Masmenu"); ?>">
                                        <i class="glyphicon glyphicon-chevron-left"></i> กลับหน้าผู้ดูแลระบบ</a>
                                </li>
                            <?php } ?>

                            <li><a href="index.php?r=news/News_general_all"><i class="glyphicon glyphicon-comment"></i> ข่าวทั่วไป <span class="label label-danger"><?php echo $news_model->Count_News_Genneral(); ?></span></a></li>
                            <li><a href="index.php?r=news/News_collegian_all"><i class="glyphicon glyphicon-envelope"></i> ข่าวภายใน <span class="label label-warning"><?php echo $news_model->Count_News_Collegian(); ?></span></a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-refresh"></i> Refresh</a></li>
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
                                <a href="javascript:void(0);" class="navbar-brand logo" style=" width: 200px;">ระบบจัดการข่าว</a>
                            </div>
                            <nav class="collapse navbar-collapse" role="navigation">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl("News/Create_News"); ?>" role="button" data-toggle="modal">
                                            <i class="glyphicon glyphicon-plus"></i> เพิ่มข่าวที่นี้ ... </a>
                                    </li>

                                </ul>
                                <!--
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="">More</a></li>
                                            <li><a href="">More</a></li>
                                            <li><a href="">More</a></li>
                                            <li><a href="">More</a></li>
                                            <li><a href="">More</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                -->
                            </nav>
                        </div>
                        <!-- /top nav -->

                        <div class="padding">
                            <div class="full col-sm-9">
                                <!-- content -->                      
                                <div class="row">
                                    <!-- main col left --> 
                                    <div class="col-sm-12">
                                        <?php echo $content; ?>
                                    </div>
                                </div><!--/row-->
                                <hr>


                            </div><!-- /col-9 -->
                        </div><!-- /padding -->
                    </div>
                    <!-- /main -->

                </div>
            </div>
        </div>
    </body></html>
