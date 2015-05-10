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
        $result = $user->Do_login($username, $password);
        if ($result) {
            if ($result['active'] == '1') {
                $json = "1";
                Yii::app()->session['user'] = "M";
                Yii::app()->session['agent_name'] = $result['name'] . '-' . $result['lname'];
                Yii::app()->session['company'] = $result['company'];
                Yii::app()->session['agent_id'] = $result['id'];
            } else {
                $json = "2";
            }
        } else {
            $json = "0";
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
        if ($check < 1) {
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
                "d_update" => date("Y-m-d H:i:s")
            );

            Yii::app()->db->createCommand()
                    ->insert("company_agent", $columns);

            echo "0";
        } else {
            echo "1";
        }
    }

    public function actionDetail_agent() {
        $id = Yii::app()->session['agent_id'];
        $agent = new CompanyAgent();
        $data['agent'] = $agent->Get_agent($id);
        $data['id'] = $id;
        $this->render('//user/detail_agent', $data);
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
        if(!empty($img)){
            $images = $img;
        } else {
            $images = "avatar5.png";
        }
        $data['img'] = $images;
        $this->renderPartial("//user/img_profile", $data);
    }

}
