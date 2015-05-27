<?php

class ExportController extends Controller {

    public function actionExport_collegian() {
        $GenNumber = $_GET['GenNumber'];
        Yii::app()->request->sendFile("ข้อมูลนักศึกษาปี$GenNumber.pdf", $this->renderPartial("//export/pdf", array("GenNumber" => $GenNumber), TRUE));
    }

}
