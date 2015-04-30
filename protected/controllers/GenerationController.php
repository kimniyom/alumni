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
        $data['item'] = GenerationModel::model()->findAll(array('order'=>'GenYear'));
        
        $this->render('//gen/index',$data);
    }
    
    public function actionSavegen(){
        $sql = "insert into generation (GenYear, GenNumber) values (:genyear, :gennum)";
        $parameters = array(":genyear"=>$_POST['genyear'], ':gennum' => $_POST['gennum']);
        Yii::app()->db->createCommand($sql)->execute($parameters);
    }
    
    public function actionEditgen(){
        $update = Yii::app()->db->createCommand()->update('generation', 
                array(
                    'GenYear'=>$_POST['genyear'],
                    'GenNumber'=> $_POST['gennum']
                ),
                'GenID=:id',
                array(':id'=>$_POST['genid']));
    }

    public function actionDeleteGen(){
        $genid = $_POST['genid'];
        Yii::app()->db->createCommand()->delete("generation", "GenID = '$genid'");
    }
}
