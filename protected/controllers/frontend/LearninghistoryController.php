<?php

class LearninghistoryController extends Controller {

    public $layout = "profile";

    public function actionIndex() {
        $learn = new LearningHistory();

        $query = "SELECT * FROM educations WHERE EduActive = '1' ";
        $data['education'] = Yii::app()->db->createCommand($query)->queryAll();

        $collegian_code = $_GET['collegian_code'];
        $data['collegian_code'] = $collegian_code;
        $data['learning'] = $learn->Get_learning_by_collegian_code($collegian_code);
        $this->render('//learningHistory/index', $data);
    }

    public function actionSave_learning() {
        $columns = array(
            "collegian_code" => $_POST['collegian_code'],
            "school" => $_POST['school'],
            "EduID" => $_POST['EduId'],
            "faculty" => $_POST['faculty'],
            "begin" => $_POST['begin'],
            "end" => $_POST['end'],
            "gpa" => $_POST['gpa'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("learning_history", $columns);
    }

    public function actionGet_learning() {
        $learn = new LearningHistory();
        $collegian_code = $_POST['collegian_code'];
        $data['collegian_code'] = $collegian_code;
        $data['learning'] = $learn->Get_learning_by_collegian_code($collegian_code);

        $this->renderPartial('//learningHistory/view', $data);
    }

    public function actionEdit() {
        $learn = new LearningHistory();
        $collegian_code = $_GET['collegian_code'];
        $id = $_GET['id'];
        $query = "SELECT * FROM educations WHERE EduActive = '1' ";
        $data['education'] = Yii::app()->db->createCommand($query)->queryAll();

        $data['collegian_code'] = $collegian_code;
        $data['learning'] = $learn->Get_learning_by_id($id);
        $data['learningAll'] = $learn->Get_learning_by_collegian_code($collegian_code);
        $this->render('//learningHistory/edit', $data);
    }

    public function actionEdit_learaning() {
        $id = $_POST['id'];
        $columns = array(
            "school" => $_POST['school'],
            "EduID" => $_POST['EduId'],
            "faculty" => $_POST['faculty'],
            "begin" => $_POST['begin'],
            "end" => $_POST['end'],
            "gpa" => $_POST['gpa'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->update("learning_history", $columns, "id = '$id' ");
    }

    public function actionDelete_learaning() {
        $id = $_POST['id'];
        Yii::app()->db->createCommand()
                ->delete("learning_history", "id = '$id' ");
    }

}
