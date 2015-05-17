<?php

class WorkingsController extends Controller {

    public $layout = "profile";

    public function actionIndex() {
        $collegian_code = $_GET['collegian_code'];
        $workings = new Workings();
        $data['collegian_code'] = $collegian_code;
        $data['workings'] = $workings->findAll();
        $this->render('//workings/index', $data);
    }

    public function actionSave_workings() {
        $columns = array(
            "collegian_code" => $_POST['collegian_code'],
            "workings_name" => $_POST['workings_name'],
            "workings_detail" => $_POST['workings_detail'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("workings", $columns);
    }

}
