<?php

class WorkhistoryController extends Controller {

    public $layout = "profile";

    public function beforeAction($action) {
        if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }
    }

    public function actionIndex() {
        $collegian_code = $_GET['collegian_code'];
        $work = new WorkHistory();
        $data['work'] = $work->findAll("collegian_code = '$collegian_code' ");
        $data['collegian_code'] = $collegian_code;
        $this->render('//workhistory/index', $data);
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

    public function actionGet_work() {
        $collegian_code = $_POST['collegian_code'];
        $work = new WorkHistory();
        $data['work'] = $work->findAll("collegian_code = '$collegian_code' ");
        $data['collegian_code'] = $collegian_code;

        $this->renderPartial('//workhistory/view', $data);
    }

    public function actionEdit() {
        $id = $_GET['id'];
        $collegian_code = $_GET['collegian_code'];
        $work = new WorkHistory();
        $data['work'] = $work->find("collegian_code = '$collegian_code' AND id = '$id' ");
        $data['workAll'] = $work->findAll("collegian_code = '$collegian_code' ");
        $data['collegian_code'] = $collegian_code;

        $this->render('//workhistory/edit', $data);
    }

    public function actionEdit_work() {
        $id = $_POST['id'];
        $columns = array(
            "company" => $_POST['company'],
            "company_tel" => $_POST['company_tel'],
            "begin" => $_POST['begin'],
            "end" => $_POST['end'],
            "position" => $_POST['position'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->update("work_history", $columns, "id = '$id' ");
    }

    public function actionDelete_work() {
        $id = $_POST['id'];
        Yii::app()->db->createCommand()
                ->delete("work_history", "id = '$id' ");
    }

}
