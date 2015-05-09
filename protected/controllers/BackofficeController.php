<?php

class BackofficeController extends Controller {

    public $layout = "backend";

    public function actionGet_agent() {
        $agent = new CompanyAgent();
        $data['agent'] = $agent->findAll();
        $this->render('//user/agent', $data);
    }

}
