<?php

class WorkHistoryController extends Controller {

    public $layout = "profile";

    public function actionIndex() {
        $collegian_code = $_GET['collegian_code'];
        $work = new WorkHistory();
        $data['work'] = $work->findAll("collegian_code = '$collegian_code' ");
        $data['collegian_code'] = $collegian_code;
        $this->render('//WorkHistory/index', $data);
    }

    public function actionSave_work() {
        $columns = array(
            "collegian_code" => $_POST['collegian_code'],
            "company" => $_POST['company'],
            "company_tel" => $_POST['company_tel'],
            "begin" => $_POST['begin'],
            "end" => $_POST['end'],
            "position" => $_POST['position'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("work_history", $columns);
    }

}
