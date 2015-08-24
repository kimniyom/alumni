<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ทำเนียบรุ่น</title>
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

        <!--
            CkEditor
        -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/adapter/ckeditor.js"></script>

        <!-- Select Complite -->

        <link href="<?php echo Yii::app()->baseUrl; ?>/assets/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo Yii::app()->baseUrl; ?>/assets/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#_collegian_code").selectpicker();
                $("#_agent_id").selectpicker();
            });
        </script>

        <script type="text/javascript">
            function CheckNum() {
                if (event.keyCode < 48 || event.keyCode > 57) {
                    event.returnValue = false;
                }
            }

        </script>

        <script type="text/javascript">
            function dialog_post_admin() {
                $("#dialog_post_admin").modal();
            }

            function send_post_admin() {
                var url = "index.php?r=frontend/posts/send_post";
                var msg = CKEDITOR.instances.detail_to_admin.getData();
                var receiver_code = "4";
                var receiver_status = "A";
                var title = $("#title_to_admin").val();
                if (msg == "") {
                    alert("กรุณากรอกข้อความ ...");
                    return false;
                }

                var data = {
                    receiver_code: receiver_code,
                    receiver_status: receiver_status,
                    title: title,
                    detail: msg
                };

                $.post(url, data, function (success) {
                    alert("ส่งข้อความของท่านแล้ว ...");
                    window.location.reload();
                });

            }


            function dialog_post_collegian() {
                $("#dialog_post_collegian").modal();
            }

            function send_post_collegian() {
                var url = "index.php?r=frontend/posts/send_post";
                var msg = CKEDITOR.instances.detail_to_collegian.getData();
                var receiver_code = $("#_collegian_code").val();
                var receiver_status = "U";
                var title = $("#title_to_collegian").val();

                if (receiver_code == '') {
                    alert("กรุณาเลือกผู้รับ ...");
                    return false;
                }
                if (msg == "") {
                    alert("กรุณากรอกข้อความ ...");
                    return false;
                }

                var data = {
                    receiver_code: receiver_code,
                    receiver_status: receiver_status,
                    title: title,
                    detail: msg
                };

                $.post(url, data, function (success) {
                    alert("ส่งข้อความของท่านแล้ว ...");
                    window.location.reload();
                });

            }

            function dialog_post_agent() {
                $("#dialog_post_agent").modal();
            }


            function send_post_agent() {
                var url = "index.php?r=frontend/posts/send_post";
                var msg = CKEDITOR.instances.detail_to_agent.getData();
                var receiver_code = $("#_agent_id").val();
                var receiver_status = "M";
                var title = $("#title_to_agent").val();

                if (receiver_code == '') {
                    alert("กรุณาเลือกผู้รับ ...");
                    return false;
                }
                if (msg == "") {
                    alert("กรุณากรอกข้อความ ...");
                    return false;
                }

                var data = {
                    receiver_code: receiver_code,
                    receiver_status: receiver_status,
                    title: title,
                    detail: msg
                };

                $.post(url, data, function (success) {
                    alert("ส่งข้อความของท่านแล้ว ...");
                    window.location.reload();
                });

            }
        </script>

        <script>
            $(document).ready(function () {
                //CKEDITOR.replace( 'workings_detail' );
                CKEDITOR.replace('detail_to_admin', {
                    //removePlugins: 'bidi,div,font,forms,flash,horizontalrule,iframe,justify,table,tabletools,smiley,link',
                    //removePlugins: 'bidi,forms,flash,iframe,div,table,tabletools',
                    //removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Image'
                    //format_tags: 'p;h1;h2;h3;pre;address'
                    toolbarGroups: [
                        //{name: 'document', groups: ['mode', 'document']}, // Displays document group with its two subgroups.
                        //{name: 'clipboard', groups: ['clipboard', 'undo']}, // Group's name will be used to create voice label.
                        '/', // Line break - next group will be placed in new line.
                        // {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                        {name: 'basicstyles', groups: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']},
                        {name: 'paragraph', groups: ['list', 'indent', 'align']},
                        {name: 'styles', groups: ['Styles', 'Format', 'Font', 'FontSize']},
                        {name: 'colors', groups: ['TextColor', 'BGColor']}
                        //{name: 'links'}
                    ]
                });


                //CKEDITOR.replace( 'workings_detail' );
                CKEDITOR.replace('detail_to_collegian', {
                    //removePlugins: 'bidi,div,font,forms,flash,horizontalrule,iframe,justify,table,tabletools,smiley,link',
                    //removePlugins: 'bidi,forms,flash,iframe,div,table,tabletools',
                    //removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Image'
                    //format_tags: 'p;h1;h2;h3;pre;address'
                    toolbarGroups: [
                        //{name: 'document', groups: ['mode', 'document']}, // Displays document group with its two subgroups.
                        //{name: 'clipboard', groups: ['clipboard', 'undo']}, // Group's name will be used to create voice label.
                        '/', // Line break - next group will be placed in new line.
                        // {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                        {name: 'basicstyles', groups: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']},
                        {name: 'paragraph', groups: ['list', 'indent', 'align']},
                        {name: 'styles', groups: ['Styles', 'Format', 'Font', 'FontSize']},
                        {name: 'colors', groups: ['TextColor', 'BGColor']}
                        //{name: 'links'}
                    ]
                });



                //CKEDITOR.replace( 'workings_detail' );
                CKEDITOR.replace('detail_to_agent', {
                    //removePlugins: 'bidi,div,font,forms,flash,horizontalrule,iframe,justify,table,tabletools,smiley,link',
                    //removePlugins: 'bidi,forms,flash,iframe,div,table,tabletools',
                    //removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Image'
                    //format_tags: 'p;h1;h2;h3;pre;address'
                    toolbarGroups: [
                        //{name: 'document', groups: ['mode', 'document']}, // Displays document group with its two subgroups.
                        //{name: 'clipboard', groups: ['clipboard', 'undo']}, // Group's name will be used to create voice label.
                        '/', // Line break - next group will be placed in new line.
                        // {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                        {name: 'basicstyles', groups: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']},
                        {name: 'paragraph', groups: ['list', 'indent', 'align']},
                        {name: 'styles', groups: ['Styles', 'Format', 'Font', 'FontSize']},
                        {name: 'colors', groups: ['TextColor', 'BGColor']}
                        //{name: 'links'}
                    ]
                });
            });
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


    <div class="modal fade" id="dialog_post_admin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <i class="fa fa-envelope-o"></i> ส่งข้อความถึงผู้ดูแลระบบ 
                    </h4>
                </div>
                <div class="modal-body">
                    <label>หัวข้อ</label>
                    <input type="text" id="title_to_admin" class="form-control input-sm"/><br/>
                    <textarea id="detail_to_admin" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="send_post_admin();"><i class="fa fa-send-o"></i> ส่งข้อความ</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- 
    Dialog Post Collegian 
    -->
    <div class="modal fade" id="dialog_post_collegian">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <i class="fa fa-envelope-o"></i> ส่งข้อความถึงนักศึกษา 
                    </h4>
                </div>
                <div class="modal-body">
                    <label>ส่งข้อความถึง</label>
                    <select id="_collegian_code" class="show-tick form-control" data-live-search="true" data-size="5">
                        <option value="">== เลือกผู้รับ ==</option>
                        <?php
                        $collegian = new Collegian();
                        $col = $collegian->findAll();
                        foreach ($col as $r):
                            if ($r['id'] != Yii::app()->session['id']) {
                                ?>
                                <option value="<?php echo $r['id'] ?>"><?php echo $r['collegian_name'] . ' ' . $r['collegian_lname'] ?></option>
                                <?php
                            }
                        endforeach;
                        ?>
                    </select>
                    <label>หัวข้อ</label>
                    <input type="text" id="title_to_collegian" class="form-control input-sm"/><br/>
                    <textarea id="detail_to_collegian" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="send_post_collegian();"><i class="fa fa-send-o"></i> ส่งข้อความ</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <!-- 
    Dialog Post AGENT 
    -->
    <div class="modal fade" id="dialog_post_agent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <i class="fa fa-envelope-o"></i> ส่งข้อความถึงตัวแทนบริษัท
                    </h4>
                </div>
                <div class="modal-body">
                    <label>ส่งข้อความถึง</label>
                    <select id="_agent_id" class="show-tick form-control" data-live-search="true" data-size="5">
                        <option value="">== เลือกผู้รับ ==</option>
                        <?php
                        $agent = new CompanyAgent();
                        $agentcol = $agent->findAll();
                        foreach ($agentcol as $ag):
                            ?>
                            <option value="<?php echo $ag['id'] ?>"><?php echo $ag['name'] . ' ' . $ag['lname'] . ' ( บริษัท ' . $ag['company'] . ')' ?></option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                    <label>หัวข้อ</label>
                    <input type="text" id="title_to_agent" class="form-control input-sm"/><br/>
                    <textarea id="detail_to_agent" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="send_post_agent();"><i class="fa fa-send-o"></i> ส่งข้อความ</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="index.php?r=site">
                                    <!-- The user image in the navbar-->
                                    <i class="fa fa-home"></i>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">หน้าแรก</span>
                                </a>
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
                                <i class="fa fa-user-secret"></i>ตัวแทนบริษัท<br/>
                                <a href="<?php echo Yii::app()->createUrl('frontend/user/detail_agent') ?>"
                                   class="btn btn-success btn-sm" style="width: 100%;">
                                    <i class="fa fa-newspaper-o"></i> โปรไฟล์</a>
                                <br/>
                            <?php } ?>

                        </div>
                    </div>


                    <!-- Sidebar Menu -->
                    <?php
                    $post = new Posts();
                    $receiver_code = Yii::app()->session['id'];
                    $receiver_status = Yii::app()->session['user'];
                    ?>
                    <ul class="sidebar-menu">
                        <li class="header" style="color: #FFFFFF;"><i class="fa fa-arrow-right"></i> ข้อความรับ</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('frontend/posts/post_collegian'); ?>">
                                <i class="fa fa-envelope"></i>
                                <span>ข้อความจากนักศึกษา</span>
                                <span class="badge"><?php echo $post->Count_msg_collegian($receiver_code, $receiver_status); ?></span>
                            </a>
                        </li>
                        <?php if (Yii::app()->session['user'] != 'M') { ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('frontend/posts/post_agent'); ?>">
                                    <i class="fa fa-envelope"></i>
                                    <span>ข้อความจากตัวแทนบริษัท</span>
                                    <span class="badge"><?php echo $post->Count_msg_agent($receiver_code, $receiver_status); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (Yii::app()->session['user'] != 'A') { ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('frontend/posts/post_admin'); ?>">
                                    <i class="fa fa-envelope"></i>
                                    <span>ข้อความจากผู้ดูแลระบบ</span>
                                    <span class="badge"><?php echo $post->Count_msg_admin($receiver_code, $receiver_status); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul><!-- /.sidebar-menu -->

                    <?php if (Yii::app()->session['user'] != '') { ?>
                        <!-- Sidebar Menu -->
                        <ul class="sidebar-menu">
                            <li class="header" style="color: #FFFFFF;"><i class="fa fa-arrow-left"></i> ข้อความส่ง</li>
                            <!-- Optionally, you can add icons to the links -->
                            <?php if (Yii::app()->session['user'] != 'A') { ?>
                                <li>
                                    <a href="javascript:dialog_post_admin();">
                                        <i class="fa fa-envelope"></i>
                                        <span>ส่งข้อความถึงผูดูแลระบบ</span></a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="javascript:dialog_post_agent();">
                                        <i class="fa fa-envelope"></i>
                                        <span>ส่งข้อความถึงตัวแทน</span></a>
                                </li>
                            <?php } ?>

                            <li>
                                <a href="javascript:dialog_post_collegian();">
                                    <i class="fa fa-envelope"></i>
                                    <span>ส่งข้อความถึงนักศึกษา</span></a>
                            </li>
                            <!--
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                    <span>ส่งถึงผู้ดูแลระบบ</span></a>
                            </li>
                            -->
                        </ul><!-- /.sidebar-menu -->

                    </section>
                <?php } ?>
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
                <!-- To the right --
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