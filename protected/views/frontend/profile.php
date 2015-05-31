<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Croup IMG -->
        <?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
        <?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>

        <script type="text/javascript">
            $(document).ready(function () {
                autoload_img_profile();
                get_senior();

                $('#edit_name_profile').popover({
                    html: true,
                    content: function () {
                        return $('#popover_content_wrapper').html();
                    }
                });

            });
        </script>

        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js_store/js_profile_collegian.js"></script>

    </head>

    <body>

        <!--
            #
            #เก็บค่ารหัสนักศึกษาที่ส่งเข้ามาไว้ใช้ 
            #
        -->
        <input type="hidden" id="collegian_code" value="<?php echo $CollegianCode; ?>"/>
        <input type="hidden" id="c_card" value="<?php echo $detail['collegian_card']; ?>"/>

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


        <!-- content -->                      
        <div class="row">

            <div class="alert alert-danger" id="error_detail" style=" display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="fa fa-user"></i> ข้อมูลส่วนตัวยังไม่สมบูรณ์
            </div>


            <!-- main col left --> 
            <div class="col-sm-5">

                <div class="panel panel-default">

                    <!--
                    #### รูปภาพโปรไๆล์ 
                    -->
                    <div class="panel-thumbnail" style=" position: relative;">
                        <div id="show_img_profile"></div>  
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
                                <input type="text" id="edit_collegian_name" class="form-control input-sm" value="<?php echo $detail['collegian_name']; ?>"/>
                                <label>นามสกุล</label>
                                <input type="text" id="edit_collegian_lname" class="form-control input-sm" value="<?php echo $detail['collegian_lname']; ?>"/>
                                <br/>
                                <center>
                                    <div class="btn  btn-primary btn-sm" onclick="Edit_name_profile();">ยืนยัน</div>
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
                        <a href="<?php echo Yii::app()->createUrl('frontend/learninghistory/index&collegian_code=' . $detail['collegian_code']); ?>" class="pull-right"><i class="fa fa-plus"></i> เพิ่ม</a>  
                        <h4>
                            <i class="fa fa-mortar-board"></i> ประวัติการศึกษา</h4>
                    </div>
                    <div class="panel-body">
                        <div class="list-group" id="learninghistory">

                        </div>
                    </div>
                </div>

                <!--
                    ประวัติการทำงาน
                -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?php echo Yii::app()->createUrl('frontend/workhistory/index&collegian_code=' . $detail['collegian_code']); ?>" class="pull-right"><i class="fa fa-plus"></i> เพิ่ม</a> 
                        <h4>
                            <i class="fa fa-user-secret"></i> ประวัติการทำงาน</h4>
                    </div>
                    <div class="panel-body">
                        <div class="list-group" id="workhistory">

                        </div>
                    </div>
                </div>
            </div>

            <!-- main col right -->
            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="fa fa-group"></i> พี่รหัส</h4></div>
                    <div class="panel-body">
                        <div id="senior_code"></div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"> <h4><i class="fa fa-sitemap"></i> สายรหัส</h4></div>
                    <div class="panel-body">
                        <div class="row">
                            <center>
                                <div id="codeline_up1"></div>
                            </center>
                        </div>
                        <div class="row" style=" margin-bottom:10px;">
                            <center>
                                <div class="col-lg-4 col-sm-4">
                                    <i class="fa fa-arrow-up"></i><br/>
                                    <?php if (isset($detail['img_profile'])) { ?>
                                        <img src="<?php echo $croup . '/uploads/' . $detail['img_profile']; ?>" class="img-rounded" width="100"> 
                                    <?php } else { ?>
                                        <i class="fa fa-user fa-5x"></i>
                                    <?php } ?>

                                    <br/>
                                    <i class="fa fa-arrow-down"></i><br/>
                                </div>
                                <div class="col-lg-4 col-sm-4">

                                </div>
                                <div class="col-lg-4 col-sm-4">

                                </div>
                            </center>
                        </div>
                        <div class="row" style="text-align: center;">
                            <center>
                                <div id="codeline_down1"></div>
                            </center>
                        </div>
                    </div>
                </div>

                <!--
                   ผลงาน
                -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?php echo Yii::app()->createUrl('frontend/workings/index&collegian_code=' . $detail['collegian_code']); ?>" class="pull-right"><i class="fa fa-plus"></i> เพิ่ม</a> 
                        <h4>
                            <i class="fa fa-trophy"></i> ผลงาน</h4>
                    </div>
                    <div class="panel-body">
                        <div class="list-group" id="workings">

                        </div>
                    </div>
                </div>

                <!-- 
                ## ความถนัด
                -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?php echo Yii::app()->createUrl('frontend/aptitude/index&collegian_code=' . $detail['collegian_code']); ?>" class="pull-right">
                            <i class="fa fa-plus"></i> เพิ่ม</a> 
                        <h4><i class="fa fa-child"></i> ความถนัด</h4>
                    </div>
                    <div class="panel-body">
                        <div id="aptitude"></div>
                    </div>
                </div>

                <!-- 
                ## ETC
                -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?php echo Yii::app()->createUrl('frontend/collegian_etc/index&collegian_code=' . $detail['collegian_code']); ?>" class="pull-right">
                            <i class="fa fa-plus"></i> เพิ่ม</a> 
                        <h4><i class="fa fa-tasks"></i> ข้อมูลอื่น ๆ</h4>
                    </div>
                    <div class="panel-body">
                        <div id="etc"></div>
                    </div>
                </div>


            </div>
        </div><!--/row-->


        <div class="row" id="footer">    
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">

            </div>
        </div>

        <hr>

        <h4 class="text-center">
            <a href="index.php?r=site" target="ext">&copy; ระบบทะเบียนศิษย์เก่านักศึกษา</a>
        </h4>

        <hr>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#profile_photo").PictureCut({
                    InputOfImageDirectory: "image",
                    PluginFolderOnServer: "<?php echo $croup; ?>",
                    FolderOnServer: "<?php echo $croup; ?>uploads/",
                    //PluginFolderOnServer: "/kimniyom/alumni/assets/jquery.picture.cut/",
                    //FolderOnServer: "/kimniyom/alumni/assets/jquery.picture.cut/uploads/",
                    EnableCrop: true,
                    CropWindowStyle: "Bootstrap",
                    //Default: ["jpg", "png"],
                    UploadedCallback: function (data) {
                        var url = "index.php?r=frontend/collegian/add_img_profile";
                        var colegiancode = "<?php echo $CollegianCode ?>";
                        var img_profile = data.currentFileName;
                        //alert(colegiancode + img_profile);
                        var data = {collegian_code: colegiancode, img_profile: img_profile};
                        $.post(url, data, function (success) {
                            autoload_img_profile();
                            $("#from_img_profile").modal("hide");
                        });
                    }
                });
            });
        </script>
    </body>
</html>