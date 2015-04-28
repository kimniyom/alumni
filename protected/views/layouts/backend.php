<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE 2 | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <?php $link = Yii::app()->baseUrl . "/themes/AdminLTE2/"; ?>
        <link href="<?php echo $link; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->

        <!-- Theme style -->
        <link href="<?php echo $link; ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $link; ?>dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />

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
            function set_menu(menu_id) {
                var url = "<?php echo Yii::app()->createUrl('masmenu/set_menu') ?>";
                var data = {
                    menu_id: menu_id
                };
                $.post(url, data, function (success) {
                    //window.location.reload();
                });
            }

            function popup_dialog_add() {

                $("#dialog_add").modal();
            }

            function save_masmenu() {
                $("#form_add").submit(function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::app()->createUrl('masmenu/save_menu') ?>",
                        data: $("#form_add").serialize(),
                        success: function (data) {
                            window.location.reload();
                        }
                    });
                });
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
    <div class="modal fade" id="dialog_add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">เพิ่ม Link งาน</h4>
                </div>
                <div class="modal-body">
                    <form id="form_add">
                        <label>MenuName</label>
                        <input type="text" id="menu_name" name="menu_name" required="required" class="form-control"/>
                        <label>MenuUrl</label>
                        <input type="text" id="menu_url" name="menu_url" required="required" class="form-control"/>
                        <p>*Controller/Function</p>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary" onclick="save_masmenu();">Save</button>
                            <button type="reset" class="btn btn-danger">Cencel</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close btn btn-default" data-dismiss="modal" aria-label="Close"><i class="fa fa-remove"></i> Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <body class="skin-blue fixed">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="#l" class="logo"><b>Admin</b>LTE</a>

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
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 4 messages</li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li><!-- /.messages-menu -->

                            <!-- Notifications Menu -->
                            <li class="dropdown notifications-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
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
                                            สวัสดีคุณ <?php echo Yii::app()->session['use_name'] . ' ' . Yii::app()->session['use_lname']; ?>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">ข้อมูลส่วนตัว</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">ออกจากระบบ</a>
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
                        <div class="pull-left info">
                            <p><?php echo Yii::app()->session['use_name'] . ' ' . Yii::app()->session['use_lname']; ?></p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- search form (Optional) -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">เมนูจัดการระบบ</li>
                        <!-- Optionally, you can add icons to the links -->
                        <?php
                        $menu = new MasMenu();
                        $menus = $menu->get_masmenu();
                        ?>
                        <?php
                        foreach ($menus as $rs):
                            $url = $rs['menu_url'];
                            if (Yii::app()->session['menu_id'] == $rs['menu_id']) {
                                $active = "active";
                            } else {
                                $active = "";
                            }
                            ?>
                            <li class="<?php echo $active; ?>">
                                <a href="<?php echo Yii::app()->createUrl($url); ?>" onclick="set_menu('<?php echo $rs['menu_id'] ?>');">
                                    <i class="fa fa-circle-thin"></i>
                                    <span><?php echo $rs['menu_name']; ?></span></a>
                            </li>
                        <?php endforeach; ?>
                        <br/>
                        <li style="text-align: center;">
                            <div class="btn btn-success" style=" width: 100%; border-radius: 0px;"
                                 onclick="popup_dialog_add();">
                                <i class="fa fa-plus"></i> เพิ่มเมนู
                            </div>
                        </li>
                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo isset($header) ? $header : "Admin"; ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Here</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <?php echo $content; ?>

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    Anything you want
                </div>
                <!-- Default to the left --> 
                <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
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