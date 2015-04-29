<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenerationController
 *
 * @author Note
 */
class GenerationController extends Controller{
    //put your code here
    public function actionIndex(){
        $data['header'] = "จัดการข้อมูล รุ่น ปี";
        $data['item'] = GenerationModel::model()->findAll();
        
        $this->render('//gen/index',$data);
    }
    
    public function actionSavegen(){
        //$year = $_POST['genyear'];
       // $num = $_POST['gennum'];
        $sql = "insert into generation (GenYear, GenNumber) values (:genyear, :gennum)";
        $parameters = array(":genyear"=>$_POST['genyear'], ':gennum' => $_POST['gennum']);
        Yii::app()->db->createCommand($sql)->execute($parameters);
        //$columns = array(
        //    "GenYear" => $_POST['genyear'],
        //    "GenNumber" => $_POST['gennum'],
        //);

       // $query = Yii::app()->db->createCommand()->insert("generation", $columns);
        //if ($query) {
         //   $this->render('//gen/index');
        //} else {
       //     echo "error";
       // }
    }
}
