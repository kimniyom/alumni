<?php

class PostsController extends Controller {

    public function actionSend_post() {
        $sender_code = Yii::app()->session['id'];
        $sender_status = Yii::app()->session['user'];

        $columns = array(
            "sender_code" => $sender_code,
            "sender_status" => $sender_status,
            "receiver_code" => $_POST['receiver_code'],
            "receiver_status" => $_POST['receiver_status'],
            "detail" => $_POST['detail'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("posts", $columns);
    }

}
