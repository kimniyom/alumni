<script type="text/javascript">
    function edit_password() {
        var username = $("#username").val();
        var password = $("#password").val();
        var confirmpassword = $("#confirmpassword").val();
        var tel = $("#tel").val();
        var mobile = "<?php echo $agent['mobile'] ?>";
        var id = "<?php echo $agent['id'] ?>";
        if (username == "") {
            $("#username").focus();
            return false;
        }

        if (password == "") {
            $("#password").focus();
            return false;
        }

        if (confirmpassword = '' || confirmpassword != password) {
            alert("รหัสไม่ถูกต้อง ...");
            return false;
        }

        if (tel != mobile) {
            alert("ไม่มีเบอร์โทรศัพท์นี้ ...");
            return false;
        }

        var url = "<?php echo Yii::app()->createUrl('frontend/user/save_edit_password') ?>";
        var data = {id: id, username: username, password: password};

        $.post(url, data, function () {
            window.location="index.php?r=frontend/user/edit_user_success";
        });

    }
</script>
<?php
/* @var $this AdminController */
/* @var $agent Admin */

$this->breadcrumbs = array(
    'หน้าแรก' => (array('site/index')),
    'ข้อมูลของ ' . $agent['name'] . ' ' . $agent['lname'] => (array('frontend/user/detail_agent')),
    'แก้ไขรหัสผ่าน'
);
?>

<div class="box box-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="fa fa-unlock"></i> แก้ไขรหัสผ่าน</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <label> ชื่อเข้าใช้งาน</label>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <input type="text" id="username" class="form-control input-sm" value="<?php echo $agent['username']; ?>"/>
                </div>
            </div><br/>

            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <label> รหัสผ่านใหม่</label>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <input type="password" id="password" class="form-control input-sm" onkeypress="CheckNum();"/>
                </div>
            </div><br/>

            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <label> ยืนยันรหัสผ่าน</label>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <input type="password" id="confirmpassword" class="form-control input-sm" onkeypress="CheckNum();"/>
                </div>
            </div><br/>

            <label style="color:#3333ff;"><i class="fa fa-user-secret"></i> ยืนยันตัวตน</label>
            <div class="row list-group-item" style="border-left: none; border-right: none;">
                <div class="col-lg-4 col-sm-4">
                    <label> เบอร์โทรศัพท์มือถือ</label>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <input type="text" id="tel" class="form-control input-sm" onkeypress="CheckNum();"/>
                </div>
            </div>

        </div>
        <div class="panel-footer" style=" text-align: center;">
            <div class="btn btn-primary btn-sm" onclick="edit_password();"<i class="fa fa-save"></i> แก้ไขรหัสผ่าน</div>
        </div>
    </div>
</div>
