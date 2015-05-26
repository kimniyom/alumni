<?php

class PostsController extends Controller {

    public $layout = "posts";

    public function beforeAction($action) {
        if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }
    }

    public function actionIndex() {
        $this->render("//posts/index");
    }

    public function actionSend_post() {
        $sender_code = Yii::app()->session['id'];
        $sender_status = Yii::app()->session['user'];

        $columns = array(
            "sender_code" => $sender_code,
            "sender_status" => $sender_status,
            "receiver_code" => $_POST['receiver_code'],
            "receiver_status" => $_POST['receiver_status'],
            "title" => $_POST['title'],
            "detail" => $_POST['detail'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("posts", $columns);
    }

    public function actionPost_collegian() {
        $receiver_code = Yii::app()->session['id'];
        $receiver_status = Yii::app()->session['user'];

        $post = new Posts();
        $data['post'] = $post->Post_collegian_all($receiver_code, $receiver_status);
        $data['header'] = "ข้อความจากนักศึกษา";
        $data['status'] = "U";
        $this->render("//posts/post_collegian", $data);
    }

    public function actionPost_admin() {
        $receiver_code = Yii::app()->session['id'];
        $receiver_status = Yii::app()->session['user'];

        $post = new Posts();
        $data['post'] = $post->Post_admin_all($receiver_code, $receiver_status);
        $data['header'] = "ข้อความจากผู้ดูแลระบบ";
        $data['status'] = "A";
        $this->render("//posts/post_collegian", $data);
    }

    public function actionPost_agent() {
        $receiver_code = Yii::app()->session['id'];
        $receiver_status = Yii::app()->session['user'];

        $post = new Posts();
        $data['post'] = $post->Post_agent_all($receiver_code, $receiver_status);
        $data['header'] = "ข้อความจากตัวแทนบริษัท";
        $data['status'] = "M";
        $this->render("//posts/post_collegian", $data);
    }

    public function actionDetail_post() {
        $post_id = $_GET['post_id'];
        $read_post = $_GET['read_post'];
        $status = $_GET['status'];

        if ($read_post == '1') {
            $columns = array("read_post" => "1");
            Yii::app()->db->createCommand()
                    ->update("posts", $columns, "post_id = '$post_id' ");
        }

        $post = new Posts();
        $upper = $post->Upper_post($post_id, $status);

        if ($upper != 0) {
            $data['upper'] = $upper;
        } else {
            $data['upper'] = 0;
        }

        $data['post'] = $post->Detail_post_collegian($post_id, $status);
        $this->render("//posts/detail_post", $data);
    }

    public function actionReply() {
        $sender_code = Yii::app()->session['id'];
        $sender_status = Yii::app()->session['user'];

        $columns = array(
            "sender_code" => $sender_code,
            "sender_status" => $sender_status,
            "receiver_code" => $_POST['receiver_code'],
            "receiver_status" => $_POST['receiver_status'],
            "upper" => $_POST['upper'],
            "detail" => $_POST['detail'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("posts", $columns);
    }

}
