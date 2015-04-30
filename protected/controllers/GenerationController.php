<?php
class GenerationController extends Controller{
    //put your code here
    public function actionIndex(){
        $data['header'] = "จัดการข้อมูล รุ่น ปี";
        $data['item'] = GenerationModel::model()->findAll();
        $data['item'] = GenerationModel::model()->findAll(array('order'=>'GenYear'));
        
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

       // $query = Yii::app()->db->createCommand()->insert("generation", $columns);
        //if ($query) {
         //   $this->render('//gen/index');
        //} else {
       //     echo "error";
       // }
    public function actionDeleteGen(){
        $genid = $_POST['genid'];
        Yii::app()->db->createCommand()->delete("generation", "GenID = '$genid'");
    }
}