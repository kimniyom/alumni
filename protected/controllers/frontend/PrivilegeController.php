<?php

class PrivilegeController extends Controller {

    public function actionBox_detail_user() {
        $status = $_POST['status_user'];
        if ($status == 'A') {
            $this->renderPartial('//privilege/box_admin');
        } else if ($status == 'U') {
            $this->renderPartial('//privilege/box_collegian');
        } else if ($status == 'M') {
            $this->renderPartial('//privilege/box_user');
        }
    }

}
