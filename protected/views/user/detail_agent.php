<?php
$croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/";
$lib = new Lib();
?>
<script type="text/javascript">

    $(document).ready(function () {
        autoload_img_profile();
        $("#profile_photo").PictureCut({
            InputOfImageDirectory: "image",
            PluginFolderOnServer: "<?php echo $croup; ?>",
            FolderOnServer: "<?php echo $croup; ?>uploads_images_user/",
            EnableCrop: true,
            CropWindowStyle: "Bootstrap",
            Default: ["jpg", "png"],
            UploadedCallback: function (data) {
                var url = "index.php?r=frontend/user/add_img_profile";
                var id = "<?php echo $id; ?>";
                var img_profile = data.currentFileName;
                //alert(id + img_profile);
                var data = {id: id, img_profile: img_profile};
                $.post(url, data, function (success) {
                    autoload_img_profile();
                    $("#from_img_profile").modal("hide");
                });
            }
        });
    });

    function active_user(id) {
        var url = "index.php?r=backoffice/active_user";
        var data = {id: id};
        $.post(url, data, function (result) {
            window.location.reload();
        });
    }

    function unactive_user(id) {
        var url = "index.php?r=backoffice/unactive_user";
        var data = {id: id};
        $.post(url, data, function (result) {
            window.location.reload();
        });
    }

    function edit_img_profile() {
        $("#from_img_profile").modal();
    }

    function autoload_img_profile() {
        var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
        $("#show_img_profile").html(loading);
        var url = "index.php?r=frontend/user/img_profile";
        var id = "<?php echo $id; ?>";
        var data = {id: id};
        $.post(url, data, function (success) {
            $("#show_img_profile").html(success);
        });
    }

</script>

<?php
/* @var $this AdminController */
/* @var $agent Admin */

$this->breadcrumbs = array(
    'หน้าแรก' => (array('site/index')),
    'ข้อมูลของ ' . $agent['name'] . ' ' . $agent['lname'],
);
?>


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


<div class="box box-danger">

    <div class="panel panel-default">
        <div class="panel-heading">
            รายละเอียดตัวแทนบริษัท
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <center>
                            <div id="show_img_profile"></div>
                        </center>
                    </div>
                    <div class="col-lg-6 col-sm-6" style=" font-weight: normal; padding-top: 20px;">
                        <i class="fa fa-calendar"></i> เข้าเป็นสมาชิกเมื่อ : <?php echo $lib->thaidate($agent['d_update']); ?><br/>
                        <i class="fa fa-user-secret"></i> สถานะ : ตัวแทนบริษัท<br/><br/>
                        <div class="alert alert-danger">
                            <ul>
                                <li>สิทธิ์</li>
                                <li>ค้นหาข้อมูลตามสิทธิ์ที่ได้รับเท่านั้น</li>
                                <li>ห้ามนำข้อมูลไปแผยแพร่ก่อนได้รับอณุญาติ</li>
                            </ul>
                        </div>

                        <?php
                        $post = new Posts();
                        $receiver_code = Yii::app()->session['id'];
                        $receiver_status = Yii::app()->session['user'];
                        ?>

                        <center>
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="index.php?r=frontend/posts/post_collegian">
                                    <button type="button" class="btn btn-primary btn-sm">ข้อความจากนักศึกษา 
                                        <span class="badge"><?php echo $post->Count_msg_collegian($receiver_code, $receiver_status); ?></span>
                                    </button></a>
                                <a href="index.php?r=frontend/posts/post_admin">
                                    <button type="button" class="btn btn-primary btn-sm">ข้อความจากผู้ดูแลระบบ 
                                        <span class="badge"><?php echo $post->Count_msg_admin($receiver_code, $receiver_status); ?></span>
                                    </button></a>
                            </div>
                        </center>
                    </div>
                </div>

                </th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ชื่อ</td>
                        <td><?php echo $agent['name']; ?></td>
                    </tr>
                    <tr>
                        <td>นามสกุล</td>
                        <td><?php echo $agent['lname']; ?></td>
                    </tr>
                    <tr>
                        <td>เบอร์โทรศัพท์</td>
                        <td><?php echo $agent['tel']; ?></td>
                    </tr>
                    <tr>
                        <td>เบอร์โทรศัพท์มือถือ</td>
                        <td><?php echo $agent['mobile']; ?></td>
                    </tr>
                    <tr>
                        <td>ชื่อเข้าใช้งาน</td>
                        <td><?php echo $agent['username']; ?></td>
                    </tr>
                    <tr>
                        <td>รหัสผ่าน</td>
                        <td><?php echo $agent['password']; ?></td>
                    </tr>
                    <tr>
                        <td>ชื่อบริษัท</td>
                        <td><?php echo $agent['company']; ?></td>
                    </tr>
                    <tr>
                        <td>ที่อยู่บริษัท</td>
                        <td><?php echo $agent['address']; ?></td>
                    </tr>
                <tbody>
            </table>

        </div>
        <div class="panel-footer" style="text-align: right;">
            <a href="<?php echo Yii::app()->createUrl('frontend/user/edit_agent&id=' . $id) ?>">
                <i class="fa fa-pencil"></i> แก้ไขข้อมูล
            </a>
        </div>
    </div>
</div>

