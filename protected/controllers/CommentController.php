<?php

class CommentController extends Controller {

    public function actionAdd_comment() {

        if (Yii::app()->session['user'] == "U") {
            $user_id = Yii::app()->session['collegian_code'];
        } else {
            $user_id = Yii::app()->session['id'];
        }

        $user_status = Yii::app()->session['user'];

        $columns = array(
            "news_id" => $_POST['news_id'],
            "comment" => $_POST['comment'],
            "owner_id" => $user_id,
            "owner_status" => $user_status,
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("news_comment", $columns);
    }

    public function actionGet_comment() {
        $news_id = $_POST['news_id'];
        $comment = new NewsComment();
        $data['comment'] = $comment->Get_name_comment($news_id);

        $this->renderPartial("//comment/view", $data);
    }

    public function actionEdit_comment() {
        $id = $_POST['id'];
        $columns = array("comment" => $_POST['comment']);

        Yii::app()->db->createCommand()
                ->update("news_comment", $columns, "id = '$id' ");
    }

    public function actionDelete_comment() {
        $id = $_POST['id'];
        Yii::app()->db->createCommand()
                ->delete("news_comment", "id = '$id' ");
    }

}
