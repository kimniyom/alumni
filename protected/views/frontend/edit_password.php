
<script type="text/javascript">
    function edit_password() {
        var url = "<?php echo Yii::app()->createUrl('frontend/collegian/save_edit_password') ?>";
        var collegian_code = "<?php echo $detail['collegian_code'] ?>";
        var email = "<?php echo $detail['collegian_email'] ?>";
        var c_email = $("#email").val();
        var password = $("#password").val();
        var confirmpassword = $("#confirmpassword").val();
        var data = {collegian_code: collegian_code, collegian_password: password};
        if (c_email == '' || password == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        if (c_email != email) {
            $("#text").html("อีเมลล์ไม่ถูกต้องกรุณาตรวจสอบ ...");
            $("#error").show();
            return false;
        }

        if (password != confirmpassword) {
            $("#text").html("รหัสผ่านไม่ตรงกัน ...");
            $("#error").show();
            return false;
        }

        $.post(url, data, function () {
            window.location = "<?php echo Yii::app()->createUrl('site/logout') ?>";
        });


    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><i class="fa fa-key"></i> เปลี่ยนรหัสผ่าน [ ผู้ใช้งาน : <?php echo $detail['collegian_username']; ?> ]</h4>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><i class="fa fa-empire"></i> กรอกอีเมล</td>
                    <td><input type="email" id="email" class="form-control"/></td>
                </tr>
                <tr>
                    <td><i class="fa fa-lock"></i> รหัสผ่านใหม่</td>
                    <td><input type="password" id="password" class="form-control"/></td>
                </tr>
                <tr>
                    <td><i class="fa fa-lock"></i> ยืนยันรหัส</td>
                    <td><input type="password" id="confirmpassword" class="form-control"/></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer" style=" text-align: center;">
        <div class="btn btn-primary" onclick="edit_password();"><i class="fa fa-save"></i> ยืนยันการเปลี่ยนรหัสผ่าน</div>
    </div>
</div>

<div class="alert alert-danger" id="error" style="text-align: center; display: none;">
    <i class="fa fa-remove"></i> <font id="text"></font>
</div>


