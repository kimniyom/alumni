<?php

class Collegian_etcController extends Controller {

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
        $Etc = new CollegianEtc();
        $collegian_code = $_GET['collegian_code'];
        $data['collegian_code'] = $collegian_code;
        $data['etc'] = $Etc->findAll("collegian_code = '$collegian_code' ");

        $this->render('//collegian_etc/index', $data);
    }

    public function actionGet_etc() {
        $Etc = new CollegianEtc();
        $collegian_code = $_POST['collegian_code'];
        $data['collegian_code'] = $collegian_code;
        $data['etc'] = $Etc->findAll("collegian_code = '$collegian_code' ");

        $this->renderPartial("//collegian_etc/view", $data);
    }

    public function actionSave_collegian_etc() {
        $columns = array(
            "collegian_code" => $_POST['collegian_code'],
            "etc" => $_POST['etc'],
            "active" => "0",
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("collegian_etc", $columns);
    }

    public function actionEdit() {
        $Etc = new CollegianEtc();
        $collegian_code = $_GET['collegian_code'];
        $id = $_GET['id'];
        $data['collegian_code'] = $collegian_code;
        $data['etc'] = $Etc->find("id = '$id' ");
        $data['etcAll'] = $Etc->findAll("collegian_code = '$collegian_code' ");

        $this->render("//collegian_etc/edit", $data);
    }

    public function actionEdit_collegian_etc() {
        $id = $_POST['id'];
        $columns = array(
            "etc" => $_POST['etc'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->update("collegian_etc", $columns, "id = '$id' ");
    }

    public function actionDelete_collegian_etc() {
        $id = $_POST['id'];

        Yii::app()->db->createCommand()
                ->delete("collegian_etc", "id = '$id' ");
    }

}
