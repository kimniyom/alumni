<?php

class CollegianController extends Controller {

    public function actionLogin() {
        if(Yii::app()->session['user'] != "U"){
            $this->renderPartial('//frontend/collegian_login');
        } else {
            $CollegianCode = Yii::app()->session['collegian_code'];
            $this->redirect(array('frontend/Collegian/Profile','collegian_code' => $CollegianCode));
        }
        
    }
    
    public function actionProfile(){
        $data['CollegianCode'] = $_GET['collegian_code'];
        $this->renderPartial('//frontend/profile',$data);
    }

    public function actionDo_login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "select * from collegian where collegian_username = '$username' and collegian_password = '$password' ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        if ($result) {
            $json = "1";
            Yii::app()->session['user'] = "U";
            Yii::app()->session['collegian_name'] = $result['collegian_name'] . '-' . $result['collegian_lname'];
            Yii::app()->session['collegian_code'] = $result['collegian_code'];
        } else {
            $json = "0";
        }

        echo $json;
    }
    
    public function actionDetail_collegian() {
        $collegian = new Collegian();
        $collegian_code = $_POST['collegiancode'];
        $data['detail'] = $collegian->Get_Collegian_By_CollegianCode($collegian_code);

        $this->renderPartial('//frontend/detail_collegian', $data);
    }

}
