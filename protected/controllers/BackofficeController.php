<?php

class BackofficeController extends Controller {

    public $layout = "backend";

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

}
