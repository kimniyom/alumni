<?php

class TimelineController extends Controller {

    public $layout = "Timeline";

    public function beforeAction($action) {
        if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }
    }

    public function actionIndex() {

        $this->renderPartial('//layouts/profile');
    }

    public function actionDetail_collegian() {
        $collegian = new Collegian();
        $collegian_code = $_GET['collegian_code'];
        $data['detail'] = $collegian->Get_Collegian_By_CollegianCode($collegian_code);

        $this->renderPartial('detail_collegian', $data);
    }

}
