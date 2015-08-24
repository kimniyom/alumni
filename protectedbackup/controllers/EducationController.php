<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EducationController
 *
 * @author Note
 */
class EducationController extends Controller {

    public function beforeAction($action) {
        if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }
    }

    //put your code here
    public function actionIndex() {
        $data['header'] = "ขอมูลปีการศึกษา";
        $data['item'] = Educations::model()->findAll();
        $this->render('//Education/index', $data);
    }

    public function actionSave_education() {
        $data = array(
            "EduName" => $_POST['EduName']
        );

        Yii::app()->db->createCommand()
                ->insert("educations", $data);
    }

    public function actionEdit() {
        $id = $_GET['EduID'];
        $data['header'] = "แก้ไขข้อมูลปีการศึกษา";
        $data['education'] = Educations::model()->find(" EduID = '$id' ");
        $this->render('//Education/edit', $data);
    }

    public function actionSave_edit() {
        $id = $_POST['EduID'];
        $data = array(
            "EduName" => $_POST['EduName']
        );

        Yii::app()->db->createCommand()
                ->update("educations", $data, "EduID = '$id' ");
    }

    public function actionDelet_education() {
        $id = $_POST['EduID'];
        Yii::app()->db->createCommand()
                ->delete("educations", "EduID = '$id' ");
    }

}
