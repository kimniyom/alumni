<?php

class ForgotController extends Controller {

    public function actionCollegian() {
        $this->renderPartial("//forgot/collegian");
    }

    public function actionUser() {
        $this->renderPartial("//forgot/user");
    }

    public function actionCheck_collegian() {
        $collegian_code = $_POST['collegian_code'];
        $email = $_POST['email'];
        $query = "SELECT * FROM collegian WHERE collegian_code = '$collegian_code' AND collegian_email = '$email' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        if (!empty($rs)) {
            echo "<label style='color:red;'>ชื่อใช้งาน : </label>" . $rs['collegian_username'] . "<br/> <label>รหัสผ่าน : </label>" . $rs['collegian_password'];
        } else {
            echo "<label style='color:red;'>ไม่พบข้อมูลในระบบ</label>";
        }
    }

    public function actionCheck_user() {
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $query = "SELECT * FROM company_agent WHERE mobile = '$mobile' AND email = '$email' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        if (!empty($rs)) {
            echo "<label style='color:red;'>ชื่อใช้งาน : </label>" . $rs['username'] . "<br/> <label>รหัสผ่าน : </label>" . $rs['password'];
        } else {
            echo "<label style='color:red;'>ไม่พบข้อมูลในระบบ</label>";
        }
    }

}
