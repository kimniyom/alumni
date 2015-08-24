<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--
        <meta name="google-translate-customization" content="52b44b8c4f515a69-ba4de274a0df1b97-gc9e8a9e6c8d94a2e-d"/>
        -->
        <title>
            ทะเบียน ศิษย์เก่า 
        </title>
        <?php
        $path = Yii::app()->baseUrl . '/themes/bootstrap/';
        $LTE = Yii::app()->baseUrl . '/themes/AdminLTE2/';
        ?>
        <style type="text/css">
            .goog-te-banner-frame.skiptranslate {display: none !important;} 
            body { top: 0px !important; }
        </style>
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

        <!--
        bootstrap-tree
        -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-tree.css" rel="stylesheet">
        <script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap-tree.js"></script>

        <!--
        Photo Album
        -->
        <script type="text/javascript" charset="utf8" src="<?php echo Yii::app()->baseUrl; ?>/assets/bootstrap-photo-gallery/photo-gallery.js"></script>

        <script type="text/javascript">
            function CheckNum() {
                if (event.keyCode < 48 || event.keyCode > 57) {
                    event.returnValue = false;
                }
            }

            $(document).ready(function () {
                //googleTranslateElementInit();
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

                $('#tree1').treed();

                $('#tree2').treed({openedClass: 'glyphicon-folder-open', closedClass: 'glyphicon-folder-close'});

                $('#tree3').treed({openedClass: 'glyphicon-chevron-right', closedClass: 'glyphicon-chevron-down'});

            });



        </script>
        <!--
                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        -->        
        <script type="text/javascript">

            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    //pageLanguage: 'th'
                }, 'google_translate_element');
            }
            /*
             function googleTranslateElementInit() {
             new google.translate.TranslateElement({pageLanguage: 'us', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
             }
             */
            /*
             function set_language(language) {
             var url = "index.php?r=site/language";
             var data = {language: language};
             
             $.post(url, data, function (success) {
             window.location.reload();
             });
             }
             */
        </script>


    </head>

    <body style="background: #ecf0f5;">


        <div class="navbar navbar-default" style=" margin-bottom: 0px; background: none;"></div>
        <div class="navbar navbar-default navbar-fixed-top" style="border-bottom:none;  background: url('<?php echo $path; ?>images/9011116378_32e56983e3_b.jpg') no-repeat center center fixed; 
             -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
             background-size: cover;">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand" style=" font-weight: bold;">
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
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (Yii::app()->session['user'] == '') { ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('frontend/user/register') ?>" id="link">
                                    <i class="fa fa-group"></i> สมัคสมาชิก</a>
                            </li>
                            <!-- OLD 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="link">
                                    <i class="fa fa-lock"></i>
                                    เข้าสู่ระบบ <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="download">
                                    <li><a href="<?//php echo Yii::app()->createUrl('frontend/collegian/login') ?>"><i class="fa fa-mortar-board"></i>นักศึกษา / ศิษย์เก่า</a></li>
                                    <li><a href="<?//php echo Yii::app()->createUrl('frontend/user/login') ?>"><i class="fa fa-user"></i> ทั่วไป</a></li>
                                    <li><a href="<?//php echo Yii::app()->createUrl('Main_admin') ?>"><i class="fa fa-gear"></i> ผู้ดูแลระบบ</a></li>
                                </ul>
                            </li>
                            -->
                            <li>
                                <a href="javascript:login()" id="link">
                                    <i class="fa fa-key"></i> เข้าสู่ระบบ
                                </a>
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
        <div class="row" style="
             background: url('<?php echo $path; ?>images/9011116378_32e56983e3_b.jpg') no-repeat center center fixed; 
             -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
             background-size: cover;
             margin-bottom:0px; margin-top: 0px;" id="banner">
            <div class="container">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <center>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" style="height: 300px;">

                                    <div class="item active" style="color:#FFF;">
                                        <div class="row">
                                            <div class=" col-md-7 col-sm-7" style=" text-align: left;">
                                                <h1 style="color:#FFF; text-shadow:2px 1px #000;">วิทยาการคอมพิวเตอร์ จบแล้วทำงานอะไร</h1>
                                                <br/>
                                                <div class="alert">
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

                                    <div class="item" style="color:#FFF;">
                                        <div class="row">
                                            <div class=" col-md-5 col-sm-5">
                                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/Science.jpg" height="250" style=" margin-top: 25px;"/>
                                            </div>
                                            <div class=" col-md-7 col-sm-7" style=" text-align: left;">
                                                <h1 style="color:#FFF; text-shadow:2px 1px #000;">สาขาวิทยาการคอม มีชื่อเรียกอีกชื่อว่า ...</h1>
                                                <br/>
                                                <div class="alert">
                                                    <p style=" font-size: 18px;text-indent: 2.5em;">
                                                        สาขาวิทยาการคอมพิวเตอร์ มีชื่อเรียกอีกชื่อว่า <font style="color:#ffff33;">วิทยาศาสตร์คอมพิวเตอร์(Computer science)</font>
                                                        ส่วนภาษาฝรั่งเศสจะใช้คำว่า Informatique ซึ่งมาจากคำว่า "information" (สารสนเทศ) รวมกับ "automatique" (อัตโนมัติ) 
                                                        โดย Philippe Dreyfus  โดยคำนี้ก็ได้ใช้ในภาษาอิตาลีเป็นคำว่า Informatica ส่วนในภาษาสเปนจะเป็น Informatica 
                                                        และในภาษาเยอรมันคือ Informatik ซึ่งดูรวม ๆ แล้วก็เป็นความหมายในทิศทางเดียวกัน</dd>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="item" style="color:#FFF;">
                                        <div class="row">
                                            <div class=" col-md-7 col-sm-7" style=" text-align: left;">
                                                <h1 style="color:#FFF; text-shadow:2px 1px #000;">สาขานี้เรียนอะไร?</h1>
                                                <br/>
                                                <div class="alert">
                                                    <p style=" font-size: 18px;text-indent: 2.5em;">
                                                        สาขาวิทยาการคอมพิวเตอร์ เป็นสาขาที่เรียนเกี่ยวกับทฤษฎีการคำนวณสำหรับคอมพิวเตอร์ 
                                                        ทฤษฎีการประมวลผลสารสนเทศ ทั้งด้านซอฟต์แวร์ ฮาร์ดแวร์ และ เครือข่าย ซึ่งประกอบด้วยหลายหัวข้อที่เกี่ยวข้องกับคอมพิวเตอร์ 
                                                        เช่น การวิเคราะห์และสังเคราะห์ขั้นตอนวิธี ทฤษฎีภาษาโปรแกรม ทฤษฎีการพัฒนาซอฟต์แวร์ ทฤษฎีฮาร์ดแวร์คอมพิวเตอร์ 
                                                        และ ทฤษฎีเครือข่าย เป็นต้น</dd>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class=" col-md-5 col-sm-5">
                                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/computer-icon.png" height="250" style=" margin-top: 10px;"/>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="item" style="color:#FFF;">
                                        <div class="row">
                                            <div class=" col-md-7 col-sm-7">
                                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/network.jpg" height="250" style=" margin-top: 25px;"/>
                                            </div>
                                            <div class=" col-md-5 col-sm-5" style=" text-align: left;">
                                                <h1 style="color:#FFF; text-shadow:2px 1px #000;">สาขาที่เกี่ยวข้อง ..</h1>
                                                <br/>
                                                <div class="alert">
                                                    <p style=" font-size: 18px;text-indent: 2.5em;">
                                                    <ul>
                                                        <li>วิศวกรรมคอมพิวเตอร์</li>
                                                        <li>วิศวกรรมซอฟต์แวร์  </li>
                                                        <li>วิทยาการสารสนเทศ  </li>
                                                        <li>เทคโนโลยีสารสนเทศ  </li>
                                                        <li>ระบบสารสนเทศ  </li>
                                                        <li>ระบบสารสนเทศเพื่อการจัดการ  </li>
                                                    </ul>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

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
                <!--
                <div style=" float: right;">
                    <img src="<?//php echo Yii::app()->baseUrl; ?>/images/thailand.png" onclick="set_language('th');"/>
                    <img src="<?//php echo Yii::app()->baseUrl; ?>/images/united_kingdom.png" onclick="set_language('en');"/>
                    <img src="<?//php echo Yii::app()->baseUrl; ?>/images/myanmar.png" onclick="set_language('mm');"/>
                </div>
                -->
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

                        <!--
                    <div class="box box-danger">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-search"></i> ค้นหา</h3>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"><i class="fa fa-thumbs-o-up"></i> ค้นหาตามความถนัด</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        -->
                        <?php if (Yii::app()->session['user'] != "") { ?>
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h4 style=" margin: 2px;">
                                        <i class="fa fa-search-plus"></i> ค้นหา
                                    </h4>
                                </div>
                                <div class="box-body">
                                    <a href="<?php echo Yii::app()->createUrl('frontend/search/search_collegian') ?>">
                                        <div class="btn btn-info" style=" width: 100%; margin-bottom: 20px;">
                                            <i class="fa fa-search"></i> ค้นหาข้อมูลศิษย์เก่า
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- USERS LIST -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-group"></i> สมาชิกใหม่</h3>
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
                                            <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads_images_user/<?php echo $img; ?>" alt="User Image" onclick="nu();"/>
                                            <a class="users-list-name" href="<?php echo Yii::app()->createUrl('frontend/user/show_agent&agent_id='.$c['id'])?>"><?php echo $c['name'] ?></a>
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

                        <div class="box box-danger">

                            <div class="box-body">
                                <ul id="tree1">
                                    <li>
                                        <?php 
                                            $col = new Collegian();
                                            $total = $col->count();
                                        ?>
                                        <a href="#">รุ่นทั้งหมด</a>
                                        <font style=" float: right;">(<?php echo $total;?>)</font>
                                        <ul>
                                            <?php
                                            $gen = new GenerationModel();
                                            $genaration = $gen->findAll();
                                            $Lib = new Lib();
                                            foreach ($genaration as $r) {
                                                ?>
                                                <li>
                                                    <?php if (Yii::app()->session['user'] == "A" || Yii::app()->session['user'] == "U") { ?>
                                                        <a href="index.php?r=export/export_collegian&GenNumber=<?php echo $r['GenNumber']; ?>" target="_blank">
                                                            <?php
                                                            echo 'รุ่น ' . $r['GenNumber'] . ' ปี ' . $r['GenYear'];
                                                            echo ' (' . $Lib->Count_Generation($r['GenNumber']) . ')';
                                                            ?>
                                                        </a>
                                                    <?php } else { ?>
                                                        <?php
                                                        echo 'รุ่น ' . $r['GenNumber'] . ' ปี ' . $r['GenYear'];
                                                        echo ' (' . $Lib->Count_Generation($r['GenNumber']) . ')';
                                                        ?>
                                                    <?php } ?>
                                                    <i class="fa fa-file-pdf-o"></i>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-sm-9">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>



        <div class="navbar navbar-default" 
             style="
             background: url('<?php echo Yii::app()->baseUrl; ?>/images/9011116378_32e56983e3_b.jpg') no-repeat center center fixed; 
             -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
             background-size: cover;
             margin-bottom:0px; 
             margin-top: 0px; 
             border-top: solid 3px #FFF;
             border-right:none;
             ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4" style=" color: #FFF;" id="site">
                        สาขาที่เกียวข้อง
                        <ul>
                            <li>วิศวกรรมคอมพิวเตอร์</li>
                            <li>วิศวกรรมซอฟต์แวร์</li>
                            <li>วิทยาการสารสนเทศ</li>
                            <li>เทคโนโลยีสารสนเทศ</li>
                            <li>ระบบสารสนเทศ</li>
                            <li>ระบบสารสนเทศเพื่อการจัดการ</li>
                        </ul>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <p style=" margin-top: 100px; text-align: right; color: #FFF;">
                            &COPY; สงวนลิขสิทธิ์<br/>เว็บไซต์ระบบทะเบียน ศิษย์เก่า 
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Dialog login -->
        <div class="modal fade" id="box-login">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Login ..</h4>
                    </div>
                    <div class="modal-body">
                        <div class="login-box" style="margin-top: 0px; margin-bottom: 0px;">
                            <div class="login-logo" style=" margin: 0px;">
                                <a href="#" style=" color: #000;">
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/User-blue-icon.png" class="img-circle" alt="User Image" width="100"/><br/>
                                    เข้าสู่ระบบ</a>
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
                                        <button type="reset" class="btn btn-danger btn-block btn-flat" onclick="Javascript:window.location.reload();">
                                            <i class="fa fa-remove"></i>
                                            ยกเลิก
                                        </button>
                                    </div><!-- /.col -->
                                </div>
                                <hr/>
                                <center>
                                    <a href="index.php?r=Forgot/user">? ลืมรหัสผ่าน</a><br>
                                </center>
                            </div><!-- /.login-box-body -->
                        </div><!-- /.login-box -->
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script type="text/javascript">
            function sent_form() {
                var url = "index.php?r=frontend/user/do_login";
                var username = $("#username").val();
                var password = $("#password").val();
                var data = {username: username, password: password};
                
                if(username == '' || password == ''){
                    $("#msg_login").html("<center><font style='color:red'>กรอกข้อมูลไม่ครบ ...!</font></center>");
                    return false;
                }
                
                $.post(url, data, function (success) {
                    if (success == '1') {
                        window.location = "index.php?r=main_admin";
                    } else if (success == '2') {
                        window.location = "index.php?r=site/index";
                    } else if (success == '3') {
                        window.location = "index.php?r=frontend/collegian";
                    } else {
                        $("#msg_login").html("<center><font style='color:red'>ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง ...!</font></center>");
                    }
                });
            }

            $(document).keypress(function (e) {
                if (e.which == 13) {
                    sent_form();
                }
            });

            function login() {
                $("#box-login").modal();
            }

        </script>



    </body>

    <script src="<?php echo Yii::app()->baseUrl; ?>/assets/bootstrap-autohidingnavbar/src/jquery.bootstrap-autohidingnavbar.js"></script>



</html>

