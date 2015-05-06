<?php

class DroupdownController extends Controller{

    public function actionAmpur() {
        $changwat_id = $_POST['changwat_id'];
        $sql = "select * from ampur where changwat_id = '$changwat_id' ";
        $data['ampur'] = Yii::app()->db->createCommand($sql)->queryAll();
        $this->renderPartial('//lib/ampur', $data);
    }

    public function actionTambon() {
        $ampur_id = $_POST['ampur_id'];
        $sql = "select * from tambon where ampur_id = '$ampur_id' ";
        $data['tambon'] = Yii::app()->db->createCommand($sql)->queryAll();
        $this->renderPartial('//lib/tambon', $data);
    }

}
