<?php

class AptitudeController extends Controller {

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
        $aptitude = new Aptitude();
        $collegian_code = $_GET['collegian_code'];
        $data['collegian_code'] = $collegian_code;
        $data['aptitude'] = $aptitude->findAll("collegian_code = '$collegian_code' ");

        $this->render('//aptitude/index', $data);
    }

    public function actionGet_aptitude() {
        $aptitude = new Aptitude();
        $collegian_code = $_POST['collegian_code'];
        $data['collegian_code'] = $collegian_code;
        $data['aptitude'] = $aptitude->findAll("collegian_code = '$collegian_code' ");

        $this->renderPartial('//aptitude/view', $data);
    }

    public function actionSave_aptitude() {
        $Columns = array(
            "collegian_code" => $_POST['collegian_code'],
            "aptitude" => $_POST['aptitude'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("aptitude", $Columns);
    }

    public function actionEdit() {
        $aptitude = new Aptitude();
        $collegian_code = $_GET['collegian_code'];
        $id = $_GET['id'];
        $data['collegian_code'] = $collegian_code;
        $data['aptitude'] = $aptitude->find("id = '$id' ");
        $data['aptitudeAll'] = $aptitude->findAll("collegian_code = '$collegian_code' ");
        $this->render('//aptitude/edit', $data);
    }

    public function actionEdit_aptitude() {
        $id = $_POST['id'];
        $Columns = array(
            "aptitude" => $_POST['aptitude'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->update("aptitude", $Columns, "id = '$id' ");
    }

    public function actionDelete_aptitude() {
        $id = $_POST['id'];
        Yii::app()->db->createCommand()
                ->delete("aptitude", "id = '$id' ");
    }

}
