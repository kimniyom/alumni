<?php

class UserController extends Controller {

    public $layout = "main";

    public function actionLogin() {
        $this->renderPartial('//user/user_login');
    }

    public function actionDo_login() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new CompanyAgent();

        //หาตาราง Admin 
        $query = "select * from admin where username = '$username' and password = '$password' ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        if ($result) {
            $json = "1";
            Yii::app()->session['user'] = "A";
            Yii::app()->session['admin_name'] = $result['admin_name'] . '-' . $result['admin_lname'];
            Yii::app()->session['admin_id'] = $result['id'];
            Yii::app()->session['super'] = $result['super'];
            Yii::app()->session['id'] = $result['id'];
        } else {
            //หาตาราง User
            $result_user = $user->Do_login($username, $password);
            if ($result_user) {
                $json = "2";
                Yii::app()->session['user'] = "M";
                Yii::app()->session['agent_name'] = $result_user['name'] . '-' . $result['lname'];
                Yii::app()->session['company'] = $result_user['company'];
                Yii::app()->session['agent_id'] = $result_user['id'];
                Yii::app()->session['id'] = $result_user['id'];
            } else {
                $query_collegian = "select * from collegian where collegian_username = '$username' and collegian_password = '$password' ";
                $result_collegian = Yii::app()->db->createCommand($query_collegian)->queryRow();
                if ($result_collegian) {
                    $json = "3";
                    Yii::app()->session['user'] = "U";
                    Yii::app()->session['collegian_name'] = $result_collegian['collegian_name'] . ' ' . $result_collegian['collegian_lname'];
                    Yii::app()->session['collegian_code'] = $result_collegian['collegian_code'];
                    Yii::app()->session['id'] = $result_collegian['id'];
                } else {
                    $json = "0";
                }
            }
        }

        echo $json;
    }

    public function actionRegister() {
        $query = "SELECT * FROM prefix";
        $data['perfix'] = Yii::app()->db->createCommand($query)->queryAll();
        $this->render('//user/register', $data);
    }

    public function actionSave_register() {
        $user = new CompanyAgent();
        $check = $user->Check_user($_POST['username'], $_POST['password']);
        if ($check == '0') {
            $columns = array(
                "shot_name" => $_POST['shot_name'],
                "name" => $_POST['name'],
                "lname" => $_POST['lname'],
                "username" => $_POST['username'],
                "password" => $_POST['password'],
                "tel" => $_POST['tel'],
                "mobile" => $_POST['mobile'],
                "company" => $_POST['company'],
                "address" => $_POST['address'],
                "status" => "M",
                "email" => $_POST['email'],
                "d_update" => date("Y-m-d H:i:s"),
                "active" => "1"
            );

            Yii::app()->db->createCommand()
                    ->insert("company_agent", $columns);

            echo "0";
        } else {
            echo "1";
        }
    }

    public function actionDetail_agent() {

        if (Yii::app()->session['user'] != "M") {
            //echo Yii::app()->createUrl("site/main");
            $this->redirect(array('site/main'));
        }

        $id = Yii::app()->session['agent_id'];
        $agent = new CompanyAgent();
        $data['agent'] = $agent->Get_agent($id);
        $data['id'] = $id;
        $this->render('//user/detail_agent', $data);
    }

    public function actionShow_agent() {
        $agent_id = $_GET['agent_id'];
        $agent = new CompanyAgent();
        $data['agent'] = $agent->Get_agent($agent_id);
        $data['id'] = $agent_id;
        $this->render('//user/detail_agent_foruser', $data);
    }

    public function actionAdd_img_profile() {
        $id = $_POST['id'];
        $img_profile = $_POST['img_profile'];

        //Check Profile 
        $sql = "SELECT images FROM company_agent WHERE id = '$id' ";
        $result = Yii::app()->db->createCommand($sql)->queryRow();

        if (!empty($result['images'])) {
            unlink(Yii::app()->basePath . "/../assets/jquery.picture.cut/uploads_images_user/" . $result['images']);
            $column = array("images" => $img_profile);
            Yii::app()->db->createCommand()
                    ->update("company_agent", $column, " id='$id' ");
        } else {
            $column = array("images" => $img_profile);
            Yii::app()->db->createCommand()
                    ->update("company_agent", $column, " id='$id' ");
        }
    }

    public function actionImg_profile() {
        $id = $_POST['id'];
        $agent = new CompanyAgent();
        $img = $agent->Get_img_profile($id);
        if (!empty($img)) {
            $images = $img;
        } else {
            $images = "avatar5.png";
        }
        $data['img'] = $images;
        $this->renderPartial("//user/img_profile", $data);
    }

    public function actionEdit_agent() {
        $id = $_GET['id'];
        $agent = new CompanyAgent();
        $data['agent'] = $agent->Get_agent($id);
        $query = "SELECT * FROM prefix";
        $data['perfix'] = Yii::app()->db->createCommand($query)->queryAll();
        $this->render('//user/edit_agent', $data);
    }

    public function actionSave_edit_user() {
        $id = $_POST['id'];
        $columns = array(
            "shot_name" => $_POST['shot_name'],
            "name" => $_POST['name'],
            "lname" => $_POST['lname'],
            "tel" => $_POST['tel'],
            "mobile" => $_POST['mobile'],
            "email" => $_POST['email'],
            "company" => $_POST['company'],
            "address" => $_POST['address'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->update("company_agent", $columns, "id = '$id' ");
    }

    public function actionEdit_password() {
        $id = $_GET['id'];
        $agent = new CompanyAgent();
        $data['agent'] = $agent->Get_agent($id);
        $this->render('//user/edit_password', $data);
    }

    public function actionSave_edit_password() {
        $id = $_POST['id'];
        $columns = array(
            "username" => $_POST['username'],
            "password" => $_POST['password']
        );

        Yii::app()->db->createCommand()
                ->update("company_agent", $columns, "id = '$id' ");
    }

    public function actionEdit_user_success() {
        $this->render('//user/edit_user_success');
    }

}
