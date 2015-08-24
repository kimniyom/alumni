<?php

class ProfileController extends Controller {

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
        $this->render('index');
    }

}
