<?php

class TimelineController extends Controller {

    public $layout = "timeline";

    public function beforeAction($action) {
        if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }
    }

    public function actionProfile() {
        if (Yii::app()->session['user'] == "") {
            $this->redirect(array('frontend/collegian/login'));
        } else {
            $collegian = new Collegian();
            $data['CollegianCode'] = $_GET['collegian_code'];
            $data['detail'] = $collegian->Get_Collegian_By_CollegianCode($data['CollegianCode']);
            $this->render('//timeline/profile_preview', $data);
        }
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

    public function actionCodeline_up1() {
        $collegian_code = $_POST['collegian_code'];
        $codeline = new Codeline();
        $data['senior'] = $codeline->get_senior($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/Codeline_up1', $data);
    }

    public function actionCodeline_up2() {
        $collegian_code = $_POST['collegian_code'];
        $codeline = new Codeline();
        $data['senior'] = $codeline->get_senior($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/Codeline_up2', $data);
    }

    public function actionCodeline_up3() {
        $collegian_code = $_POST['collegian_code'];
        $codeline = new Codeline();
        $data['senior'] = $codeline->get_senior($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/Codeline_up3', $data);
    }

    public function actionCodeline_down1() {
        $collegian_code = $_POST['collegian_code'];
        $codeline = new Codeline();
        $data['senior1'] = $codeline->get_collegian_down($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/Codeline_down1', $data);
    }

    public function actionCodeline_down2() {
        $collegian_code = $_POST['collegian_code2'];
        $codeline = new Codeline();
        $data['senior2'] = $codeline->get_collegian_down2($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/Codeline_down2', $data);
    }

    public function actionCodeline_down3() {
        $collegian_code = $_POST['collegian_code3'];
        $codeline = new Codeline();
        $data['senior3'] = $codeline->get_collegian_down3($collegian_code);
        $data['collegian_code'] = $collegian_code;
        $this->renderPartial('//codeline/Codeline_down3', $data);
    }

}
