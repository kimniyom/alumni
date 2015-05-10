<?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Croup IMG -->
        <?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
        <script>
            $(document).ready(function () {
                autoload_img_profile();
                $("#profile_photo").PictureCut({
                    InputOfImageDirectory: "image",
                    PluginFolderOnServer: "<?php echo $croup; ?>",
                    FolderOnServer: "<?php echo $croup; ?>uploads/",
                    EnableCrop: true,
                    CropWindowStyle: "Bootstrap",
                    Default: ["jpg", "png"],
                    UploadedCallback: function (data) {
                        var url = "index.php?r=frontend/collegian/add_img_profile";
                        var colegiancode = "<?php echo $CollegianCode; ?>";
                        var img_profile = data.currentFileName;
                        alert(colegiancode + img_profile);
                        var data = {collegian_code: colegiancode, img_profile: img_profile};
                        $.post(url, data, function (success) {
                            autoload_img_profile();
                            $("#from_img_profile").modal("hide");
                        });
                    }
                });

                $('#edit_name_profile').popover({
                    html: true,
                    content: function () {
                        return $('#popover_content_wrapper').html();
                    }
                });

            });

            function edit_img_profile() {
                $("#from_img_profile").modal();
            }

            function autoload_img_profile() {
                var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
                $("#show_img_profile").html(loading);
                var url = "index.php?r=frontend/collegian/img_profile";
                var collegiancode = "<?php echo $CollegianCode; ?>";
                var data = {collegian_code: collegiancode};
                $.post(url, data, function (success) {
                    $("#show_img_profile").html(success);
                });
            }
        </script>

        <!--
        <link rel="stylesheet" href="demo_assets/demo.css">
        -->

        <script type="text/javascript">
            function autoload_imf_profile() {
                var url = "index.php?r=frontend/collegian/img_profile";
                var colegiancode = "<?php echo $CollegianCode; ?>";
                var data = {collegian_code: colegiancode};
                $.post(url, data, function (success) {
                    $("#img_profile").html(success);
                });
            }
        </script>


    </head>

    <body>

        <!-- 
            Dialog Img_profile 
        -->
        <div class="modal fade" id="from_img_profile">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            <i class="fa fa-image"></i>
                            เลือกรูปภาพประจำตัว
                        </h4>
                    </div>
                    <div class="modal-body" style=" padding: 20px;">
                        <center>
                            <div id="profile_photo"></div>
                        </center>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <input type="hidden" id="collegian_code" value="<?php echo $CollegianCode; ?>"/>

        <!-- content -->                      
        <div class="row">

            <!-- main col left --> 
            <div class="col-sm-5">

                <div class="panel panel-default">
                    <div class="panel-thumbnail" style=" position: relative;">
                        <div id="show_img_profile"></div>

                        <a href="#" onclick="edit_img_profile();">
                            <div class="label label-default" style=" position: absolute;  bottom: 0px; right: 0px; width: 100%; opacity: 0.7; background: #666666;">
                                <h4><i class="fa fa-camera"></i> แก้ไขรูปภาพ</h4>
                            </div>
                        </a>
                    </div>
                    <div class="panel-body">
                        <p class="lead">
                            <i class="fa fa-user"></i>
                            <?php echo $detail['collegian_name'] . ' ' . $detail['collegian_lname']; ?>
                            <a href="Javascript:void(0);" data-toggle="popover" 
                               id="edit_name_profile"
                               title="แก้ไขชื่อ - สกุล" style=" font-size: 14px; color: #993300;">
                                <i class="fa fa-pencil"></i> แก้ไขชื่อ
                            </a>
                            <div id="popover_content_wrapper" style="display: none">
                                <div style=" font-size: 12px;">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control input-sm"/>
                                    <label>นามสกุล</label>
                                    <input type="text" class="form-control input-sm"/>
                                    <br/>
                                    <center>
                                        <div class="btn  btn-primary btn-sm">ยืนยัน</div>
                                    </center>
                                </div>
                            </div>
                        </p>
                        <p>
                            <i class="fa fa-users"></i>
                            รุ่น <?php echo $detail['GenNumber']; ?> ปี <?php echo $detail['GenYear']; ?></p>
                        <p>
                            <i class="fa fa-calendar"></i>
                            เข้าใช้งานเมื่อ 
                        </p>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <i class="fa fa-leanpub"></i> ข้อมูลส่วนตัว</h4>
                    </div>
                    <div class="panel-body">
                        <div class="list-group" id="detail_collegian">

                        </div>
                    </div>
                </div>

                <!--
                    ประวัติการศึกษา
                -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#" class="pull-right"><i class="fa fa-ellipsis-v"></i> ทั้งหมด</a> 
                        <h4>
                            <i class="fa fa-mortar-board"></i> ประวัติการศึกษา</h4>
                    </div>
                    <div class="panel-body">
                        <div class="list-group" id="detail_education">

                        </div>
                    </div>
                </div>

                <!--
                    ประวัติการทำงาน
                -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#" class="pull-right"><i class="fa fa-ellipsis-v"></i> ทั้งหมด</a> 
                        <h4>
                            <i class="fa fa-user-secret"></i> ประวัติการทำงาน</h4>
                    </div>
                    <div class="panel-body">
                        <div class="list-group" id="history_work">

                        </div>
                    </div>
                </div>

                <div class="well"> 
                    <form class="form-horizontal" role="form">
                        <h4>What's New</h4>
                        <div class="form-group" style="padding:14px;">
                            <textarea class="form-control" placeholder="Update your status"></textarea>
                        </div>
                        <button class="btn btn-primary pull-right" type="button">Post</button><ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
                    </form>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>More Templates</h4></div>
                    <div class="panel-body">
                        <img src="<?php echo $path; ?>assets/img/150x150.gif" class="img-circle pull-right"> <a href="#">Free @Bootply</a>
                        <div class="clearfix"></div>
                        There a load of new free Bootstrap 3
                        ready templates at Bootply. All of these templates are free and don't 
                        require extensive customization to the Bootstrap baseline.
                        <hr>
                        <ul class="list-unstyled"><li><a href="http://usebootstrap.com/theme/facebook">Dashboard</a></li><li><a href="http://usebootstrap.com/theme/facebook">Darkside</a></li><li><a href="http://usebootstrap.com/theme/facebook">Greenfield</a></li></ul>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h4>What Is Bootstrap?</h4></div>
                    <div class="panel-body">
                        Bootstrap is front end frameworkto 
                        build custom web applications that are fast, responsive &amp; intuitive.
                        It consist of CSS and HTML for typography, forms, buttons, tables, 
                        grids, and navigation along with custom-built jQuery plug-ins and 
                        support for responsive layouts. With dozens of reusable components for 
                        navigation, pagination, labels, alerts etc..                          </div>
                </div>



            </div>

            <!-- main col right -->
            <div class="col-sm-7">

                <div class="well"> 
                    <form class="form">
                        <h4>Sign-up</h4>
                        <div class="input-group text-center">
                            <input class="form-control input-lg" placeholder="Enter your email address" type="text">
                            <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="button">OK</button></span>
                        </div>
                    </form>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootply Editor &amp; Code Library</h4></div>
                    <div class="panel-body">
                        <p><img src="<?php echo $path; ?>assets/img/150x150.gif" class="img-circle pull-right"> <a href="#">The Bootstrap Playground</a></p>
                        <div class="clearfix"></div>
                        <hr>
                        Design, build, test, and prototype 
                        using Bootstrap in real-time from your Web browser. Bootply combines the
                        power of hand-coded HTML, CSS and JavaScript with the benefits of 
                        responsive design using Bootstrap. Find and showcase Bootstrap-ready 
                        snippets in the 100% free Bootply.com code repository.
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
                    <div class="panel-body">
                        <img src="<?php echo $path; ?>assets/img/150x150.gif" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
                        <div class="clearfix"></div>
                        <hr>

                        <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>

                        <hr>
                        <form>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                                </div>
                                <input class="form-control" placeholder="Add a comment.." type="text">
                            </div>
                        </form>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Portlet Heading</h4></div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">Modals</li>
                            <li class="list-group-item">Sliders / Carousel</li>
                            <li class="list-group-item">Thumbnails</li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-thumbnail"><img src="<?php echo $path; ?>assets/img/bg_4.jpg" class="img-responsive"></div>
                    <div class="panel-body">
                        <p class="lead">Social Good</p>
                        <p>1,200 Followers, 83 Posts</p>

                        <p>
                            <img src="<?php echo $path; ?>assets/img/photo.jpg" height="28px" width="28px">
                            <img src="<?php echo $path; ?>assets/img/photo.png" height="28px" width="28px">
                            <img src="<?php echo $path; ?>assets/img/photo_002.jpg" height="28px" width="28px">
                        </p>
                    </div>
                </div>

            </div>
        </div><!--/row-->

        <div class="row">
            <div class="col-sm-6">
                <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
            </div>
        </div>

        <div class="row" id="footer">    
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <p>
                    <a href="#" class="pull-right">©Copyright 2013</a>
                </p>
            </div>
        </div>

        <hr>

        <h4 class="text-center">
            <a href="http://usebootstrap.com/theme/facebook" target="ext">Download this Template @Bootply</a>
        </h4>

        <hr>


    </body></html>