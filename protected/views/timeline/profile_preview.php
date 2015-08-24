<?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Croup IMG -->
        <?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
        <script>
            $(document).ready(function () {
                autoload_img_profile();
                get_senior();
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
                        //alert(colegiancode + img_profile);
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
        </script>

        <script>
            $(document).ready(function () {
                //CKEDITOR.replace( 'workings_detail' );
                CKEDITOR.replace('msg', {
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

        <script type="text/javascript">
            function send_msg() {
                var url = "index.php?r=frontend/posts/send_post";
                var msg = CKEDITOR.instances.msg.getData();
                var title = $("#title").val();
                var receiver_code = $("#receiver_code").val();
                var receiver_status = $("#receiver_status").val();
                var data = {
                    title: title,
                    detail: msg,
                    receiver_code: receiver_code,
                    receiver_status: receiver_status
                };

                if (msg == "" || title == "") {
                    alert("กรุณากรอกข้อความของคุณ ...");
                    return false;
                }

                $.post(url, data, function (success) {
                    alert("ส่งข้อความแล้ว ...");
                    window.location.reload();
                });

            }
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

        <!-- content -->                      
        <div class="row">

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
                        
                        <p class="lead" style="color: #663300;">
                            <i class="fa fa-user"></i>
                            ชื่อ - สกุล <?php echo $detail['collegian_name'] . ' ' . $detail['collegian_lname']; ?>
                        </p>
                        <p>
                            <i class="fa fa-users"></i>
                            รุ่น <?php echo $detail['GenNumber']; ?> ปี <?php echo $detail['GenYear']; ?></p>
                       
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

                <!--
                ส่งข้อความ
                -->

                <div class="panel panel-default">
                    <div class="panel-heading"><h4><i class="fa fa-envelope"></i> ส่งข้อความถึงบุคคลนี้</h4></div>
                    <div class="panel-body">

                        <input type="hidden" id="receiver_code" value="<?php echo $detail['id']; ?>"/>
                        <input type="hidden" id="receiver_status" value="<?php echo $detail['status']; ?>"/>
                        <input type="text" id="title" name="title" class="form-control input-sm" placeholder="หัวข้อ"/><br/>
                        <textarea id="msg" rows="3"></textarea>
                    </div>
                    <div class="panel-footer" style=" text-align: right;">
                        <div class="btn btn-primary btn-sm" onclick="send_msg();"><i class="fa fa-send-o"></i> ส่ง</div>
                    </div>
                </div>

                <?php if (Yii::app()->session['user'] != "M"): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4><i class="fa fa-group"></i> พี่รหัส</h4></div>
                        <div class="panel-body">
                            <div id="senior_code"></div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"> <h4><i class="fa fa-sitemap"></i> สายรหัส</h4></div>
                        <div class="panel-body">
                            <!-- พี่รหัส -->
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
                            <!-- น้องรหัส -->
                            <div class="row" style="text-align: center;">
                                <center>
                                    <div id="codeline_down1"></div>
                                </center>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>
                <!--
                   ผลงาน
                -->
                <div class="panel panel-default">
                    <div class="panel-heading">
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


    </body></html>