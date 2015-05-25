<?php

class Main_adminController extends Controller {

    public function actionIndex() {
        if (Yii::app()->session['user'] == 'A') {
            $this->redirect(Yii::app()->createUrl('masmenu'));
        } else {
            $this->renderPartial('//admin/login');
        }
    }

    public function actionDo_login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "select * from admin where username = '$username' and password = '$password' ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        if ($result) {
            $json = "1";
            Yii::app()->session['user'] = "A";
            Yii::app()->session['admin_name'] = $result['admin_name'] . '-' . $result['admin_lname'];
            Yii::app()->session['admin_id'] = $result['id'];
            Yii::app()->session['super'] = $result['super'];
            Yii::app()->session['id'] =  $result['id'];
        } else {
            $json = "0";
        }

        echo $json;
    }
    

}
