<?php

class TimelineController extends Controller {

    public $layout = "Timeline";

    public function actionIndex() {
        
        $this->renderPartial('//layouts/profile');
    }

    public function actionDetail_collegian() {
        $collegian = new Collegian();
        $collegian_code = $_GET['collegian_code'];
        $data['detail'] = $collegian->Get_Collegian_By_CollegianCode($collegian_code);

        $this->renderPartial('detail_collegian', $data);
    }

}
