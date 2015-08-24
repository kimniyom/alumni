<?php

class PrivilegeController extends Controller {

    public function beforeAction($action) {
        if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }
    }

    public function actionBox_detail_user() {
        $status = $_POST['status_user'];
        if ($status == 'A') {
            $this->renderPartial('//privilege/box_admin');
        } else if ($status == 'U') {
            $this->renderPartial('//privilege/box_collegian');
        } else if ($status == 'M') {
            $this->renderPartial('//privilege/box_user');
        }
    }

    public function actionHeader() {
        $status = $_POST['status_user'];
        if ($status == 'A') {
            $this->renderPartial('//privilege/head_admin');
        } else if ($status == 'U') {
            $this->renderPartial('//privilege/head_collegian');
        } else if ($status == 'M') {
            $this->renderPartial('//privilege/head_agent');
        }
    }

    public function actionHeader_menu() {
        $status = $_POST['status_user'];
        if ($status == 'A') {
            $this->renderPartial('//privilege/head_menu_admin');
        } else if ($status == 'U') {
            $this->renderPartial('//privilege/head_menu_collegian');
        } else if ($status == 'M') {
            $this->renderPartial('//privilege/head_menu_agent');
        }
    }

}
