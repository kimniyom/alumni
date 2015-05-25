<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบทะเบียนศิษย์เก่า</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <?php $link = Yii::app()->baseUrl . "/themes/AdminLTE2/"; ?>
        <link href="<?php echo $link; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->

        <!-- Theme style -->
        <link href="<?php echo $link; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $link; ?>dist/css/skins/skin-red.min.css" rel="stylesheet" type="text/css" />

        <!-- Daterange picker -->
        <link href="<?php echo $link; ?>plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo $link; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo $link; ?>plugins/jQuery/jQuery-2.1.3.min.js"></script>

        <!-- Data Table 1.9.4 Css -->
        <link href="<?php echo $link; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Data Table 1.9.4 js -->
        <script src="<?php echo $link; ?>plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo $link; ?>plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

        <script type="text/javascript">
            function CheckNum() {
                if (event.keyCode < 48 || event.keyCode > 57) {
                    event.returnValue = false;
                }
            }

        </script>

    </head>

    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the 
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |  
    |---------------------------------------------------------|
    
    -->

    <!-- 
    form dialog add
    -->

    <body class="skin-red fixed">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="#l" class="logo"><i class="fa fa-envelope-o"></i> <b>ระบบ</b>ข้อความ</a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-fixed-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    ข้อความจากนักศึกษา
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li><!-- /.messages-menu -->

                            <!-- Notifications Menu -->
                            <li class="dropdown notifications-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    ข้อความจากตัวแทนบริษัท
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>

                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <i class="fa fa-cog"></i>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">Profile</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="<?php echo $link; ?>dist/img/avatar04.png" class="img-circle" alt="User Image" />
                                        <p>
                                            สวัสดีคุณ <?php echo Yii::app()->session['admin_name']; ?>
                                        </p>

                                    </li>
                                    <!-- Menu Body -->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?PHP echo Yii::app()->createUrl('admin/view&id=' . Yii::app()->session['admin_id']); ?>" class="btn btn-default btn-flat">ข้อมูลส่วนตัว</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo Yii::app()->createUrl('site/logout'); ?>" class="btn btn-default btn-flat">ออกจากระบบ</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>


            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $link; ?>dist/img/avatar04.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info" style="font-weight: normal; font-size: 12px;">
                            <p><?php echo Yii::app()->session['admin_name']; ?></p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a><br/>
                            <?php if (Yii::app()->session['user'] == "A") { ?>
                                <i class="fa fa-group"></i> <?php echo Yii::app()->session['admin_name']; ?><br/>
                                <a href="<?php echo Yii::app()->createUrl('main_admin') ?>" class="btn btn-info btn-sm" style=" width: 100%;">
                                    <i class="fa fa-gears"></i> จัดการข้อมูล</a>
                            <?php } else if (Yii::app()->session['user'] == "U") { ?>
                                <i class="fa fa-group"></i> <?php echo Yii::app()->session['collegian_name']; ?><br/>
                                <a href="<?php echo Yii::app()->createUrl('frontend/collegian/profile&collegian_code=' . Yii::app()->session['collegian_code']) ?>"
                                   class="btn btn-success btn-sm" style="width: 100%;">
                                    <i class="fa fa-newspaper-o"></i> โปรไฟล์</a>
                            <?php } else { ?>
                                <i class="fa fa-group"></i> <?php echo Yii::app()->session['agent_name']; ?><br/>
                                <i class="fa fa-user-secret"></i>ตัวแทนบริษัท
                                <br/>
                            <?php } ?>

                        </div>
                    </div>


                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header" style="color: #FFFFFF;"><i class="fa fa-arrow-right"></i> ข้อความรับ</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('frontend/posts/post_collegian'); ?>">
                                <i class="fa fa-envelope"></i>
                                <span>ข้อความจากนักศึกษา</span></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('frontend/posts/post_agent'); ?>">
                                <i class="fa fa-envelope"></i>
                                <span>ข้อความจากตัวแทนบริษัท</span></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('frontend/posts/post_admin'); ?>">
                                <i class="fa fa-envelope"></i>
                                <span>ข้อความจากผู้ดูแลระบบ</span></a>
                        </li>
                    </ul><!-- /.sidebar-menu -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header" style="color: #FFFFFF;"><i class="fa fa-arrow-left"></i> ข้อความส่ง</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li>
                            <a href="<?php echo Yii::app()->createUrl(''); ?>">
                                <i class="fa fa-envelope"></i>
                                <span>ส่งถึงนักศึกษา</span></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl(''); ?>">
                                <i class="fa fa-envelope"></i>
                                <span>ส่งถึงตัวแทนบริษัท</span></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl(''); ?>">
                                <i class="fa fa-envelope"></i>
                                <span>ส่งถึงผู้ดูแลระบบ</span></a>
                        </li>
                    </ul><!-- /.sidebar-menu -->

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">

                    <?php echo $content; ?>

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    Assembor Themes.
                </div>
                <!-- Default to the left --> 
                <strong>สงวนลิขสิทธิ์ &copy; เว็บไซต์ทำเนียบรุ่นนักศึกษา</strong> 
            </footer>

        </div><!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->


        <script src="<?php echo $link; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- FastClick -->
        <script src='<?php echo $link; ?>plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="<?php echo $link; ?>dist/js/app.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo $link; ?>plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo $link; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo $link; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo $link; ?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo $link; ?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo $link; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo $link; ?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo $link; ?>plugins/chartjs/Chart.min.js" type="text/javascript"></script>



    </body>
</html>