<?php

class CollegianController extends Controller {

    public $layout = "profile";

    public function actionLogin() {
        if (Yii::app()->session['user'] != "U") {
            $this->renderPartial('//frontend/collegian_login');
        } else {
            $CollegianCode = Yii::app()->session['collegian_code'];
            $this->redirect(array('frontend/Collegian/Profile', 'collegian_code' => $CollegianCode));
        }
    }

    public function actionProfile() {
        if (Yii::app()->session['user'] == "") {
            $this->redirect(array('frontend/collegian/login'));
        } else {
            $collegian = new Collegian();
            $data['CollegianCode'] = $_GET['collegian_code'];
            $data['detail'] = $collegian->Get_Collegian_By_CollegianCode($data['CollegianCode']);
            $this->render('//frontend/profile', $data);
        }
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
            Yii::app()->session['id'] = $result['id'];
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
        $data['collegian_code'] = $collegiancode;
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

    public function actionEdit_password() {

        if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }

        $collegian = new Collegian();
        $collegian_code = $_GET['collegian_code'];
        $data['detail'] = $collegian->Get_Collegian_By_CollegianCode($collegian_code);

        $this->render('//frontend/edit_password', $data);
    }

    public function actionSave_edit_password() {
        $collegian_code = $_POST['collegian_code'];
        $data = array("collegian_password" => $_POST['collegian_password']);

        Yii::app()->db->createCommand()
                ->update("collegian", $data, "collegian_code = '$collegian_code' ");
    }

    public function actionEdit_profile() {
        
         if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }
        
        $collegian = new Collegian();
        $collegian_code = $_GET['collegian_code'];
        $query = "SELECT * FROM prefix";
        $data['perfix'] = Yii::app()->db->createCommand($query)->queryAll();
        $data['detail'] = $collegian->Get_Collegian_By_CollegianCode($collegian_code);

        $this->render('//collegian/edit_collegian', $data);
    }

    public function actionSenior() {
        $collegian_code = $_POST['collegian_code'];
        $codeline = new Codeline();
        $data['senior'] = $codeline->get_senior($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/senior', $data);
    }

    public function actionGet_senior_all() {
        $collegiancode = $_POST['collegian_code'];
        //ดึงรุ่นของนักศึกษามาก่อน
        $collegian = new Collegian();
        $codeline = new Codeline();
        $rs = $collegian->find("collegian_code = '$collegiancode' ");
        $GenNumber = $rs['GenNumber'];
        $GenNumberSenior = ($GenNumber - 1); //รุ่นพี่ 
        $data['GenNumber_senior'] = $GenNumberSenior;
        $data['collegian_code'] = $collegiancode;
        $data['senior'] = $codeline->get_senior_all($GenNumberSenior); //ดึงข้อมูลรุ่นพี่ก่อนหน้ามาแสดง
        $this->renderPartial('//codeline/get_senior_all', $data);
    }

    public function actionSave_senior() {
        $columns = array(
            "collegian_code" => $_POST['collegian_code'],
            "senior_code" => $_POST['senior_code'],
            "line_id" => $_POST['line_id'],
            "GenNumber" => $_POST['GenNumber']
        );

        Yii::app()->db->createCommand()
                ->insert("codeline", $columns);
    }

    public function actionCodeline_up1() {
        $collegian_code = $_POST['collegian_code'];
        $codeline = new Codeline();
        $data['senior'] = $codeline->get_senior($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/codeline_up1', $data);
    }

    public function actionCodeline_up2() {
        $collegian_code = $_POST['collegian_code'];
        $codeline = new Codeline();
        $data['senior'] = $codeline->get_senior($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/codeline_up2', $data);
    }

    public function actionCodeline_up3() {
        $collegian_code = $_POST['collegian_code'];
        $codeline = new Codeline();
        $data['senior'] = $codeline->get_senior($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/codeline_up3', $data);
    }

    public function actionCodeline_down1() {
        $collegian_code = $_POST['collegian_code'];
        $codeline = new Codeline();
        $data['senior1'] = $codeline->get_collegian_down($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/codeline_down1', $data);
    }

    public function actionCodeline_down2() {
        $collegian_code = $_POST['collegian_code2'];
        $codeline = new Codeline();
        $data['senior2'] = $codeline->get_collegian_down2($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/codeline_down2', $data);
    }

    public function actionCodeline_down3() {
        $collegian_code = $_POST['collegian_code3'];
        $codeline = new Codeline();
        $data['senior3'] = $codeline->get_collegian_down3($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/codeline_down3', $data);
    }

    public function actionEdit_name_profile() {
        $collegian_code = $_POST['collegian_code'];
        $columns = array(
            "collegian_name" => $_POST['collegian_name'],
            "collegian_lname" => $_POST['collegian_lname']
        );

        Yii::app()->db->createCommand()
                ->update("collegian", $columns, "collegian_code = '$collegian_code' ");
    }

}
