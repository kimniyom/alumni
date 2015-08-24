<?php

class BackofficeController extends Controller {

    public $layout = "backend";

    public function beforeAction($action) {
        if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }
    }

    public function actionGet_agent() {
        $agent = new CompanyAgent();
        $data['agent'] = $agent->findAll();
        $this->render('//backoffice/agent', $data);
    }

    public function actionDetail_agent() {
        $id = $_GET['id'];
        $agent = new CompanyAgent();
        $data['agent'] = $agent->Get_agent($id);
        $this->render('//backoffice/detail_agent', $data);
    }

    public function actionActive_user() {
        $id = $_POST['id'];
        $data = array('active' => '1');
        Yii::app()->db->createCommand()
                ->update("company_agent", $data, "id = '$id' ");
    }

    public function actionUnactive_user() {
        $id = $_POST['id'];
        $data = array('active' => '0');
        Yii::app()->db->createCommand()
                ->update("company_agent", $data, "id = '$id' ");
    }

    public function actionDetail_collegian_etc() {
        $etc = new CollegianEtc();
        $data['etc'] = $etc->Get_Collegian_etc();
        $this->render('//backoffice/collegian_etc', $data);
    }

    public function actionActive_etc() {
        $id = $_POST['id'];
        $columns = array(
            "active" => '1'
        );

        Yii::app()->db->createCommand()
                ->update("collegian_etc", $columns, "id = '$id' ");
    }

    public function actionForgot() {
        $forgot = new Forgot();
        $data['forgot'] = $forgot->GetAll();
        $this->render('//forgot/forgot', $data);
    }

    public function actionSave_forgot() {
        $columns = array(
            "question" => $_POST['question']
        );

        Yii::app()->db->createCommand()
                ->insert("forgot", $columns);
    }

    public function actionEdit_forgot() {
        $id = $_POST['id'];
        $columns = array(
            "question" => $_POST['question']
        );

        Yii::app()->db->createCommand()
                ->update("forgot", $columns, "id = '$id' ");
    }

}
