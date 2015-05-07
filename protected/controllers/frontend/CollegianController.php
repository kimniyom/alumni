<?php

class CollegianController extends Controller {

    public function actionLogin() {
        if (Yii::app()->session['user'] != "U") {
            $this->renderPartial('//frontend/collegian_login');
        } else {
            $CollegianCode = Yii::app()->session['collegian_code'];
            $this->redirect(array('frontend/Collegian/Profile', 'collegian_code' => $CollegianCode));
        }
    }

    public function actionProfile() {
        $data['CollegianCode'] = $_GET['collegian_code'];
        $this->renderPartial('//frontend/profile', $data);
    }

    public function actionDo_login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "select * from collegian where collegian_username = '$username' and collegian_password = '$password' ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        if ($result) {
            $json = "1";
            Yii::app()->session['user'] = "U";
            Yii::app()->session['collegian_name'] = $result['collegian_name'] . ' ' . $result['collegian_lname'];
            Yii::app()->session['collegian_code'] = $result['collegian_code'];
        } else {
            $json = "0";
        }

        echo $json;
    }

    public function actionDetail_collegian() {
        $collegian = new Collegian();
        $collegian_code = $_POST['collegiancode'];
        $data['detail'] = $collegian->Get_Collegian_By_CollegianCode($collegian_code);

        $this->renderPartial('//frontend/detail_collegian', $data);
    }

    public function actionImg_profile() {
        $collegiancode = $_POST['collegian_code'];
        $collegian = new Collegian();
        $data['img'] = $collegian->Get_img_profile($collegiancode);

        $this->renderPartial("//profile/img_profile", $data);
    }

    public function actionAdd_img_profile() {
        $collegiancode = $_POST['collegian_code'];
        $img_profile = $_POST['img_profile'];

        //Check Profile 
        $sql = "SELECT * FROM images_profile WHERE collegian_code = '$collegiancode' ";
        $result = Yii::app()->db->createCommand($sql)->queryRow();

        if ($result) {
            unlink(Yii::app()->basePath . "/../assets/jquery.picture.cut/uploads/" . $result['img_profile']);
            $column = array("img_profile" => $img_profile);
            Yii::app()->db->createCommand()
                    ->update("images_profile", $column, " collegian_code='$collegiancode' ");
        } else {
            $column = array(
                "collegian_code" => $collegiancode,
                "img_profile" => $img_profile
            );
            Yii::app()->db->createCommand()
                    ->insert("images_profile", $column);
        }
    }

}
