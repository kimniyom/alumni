<?php

class DatatableController extends Controller{
    public $layout = "main";
    
    public function actionIndex(){
        $collegian = new Collegian();
        $rs = $collegian->findAll();
        $data['collegian'] = $rs;
        
        $this->render('//datatable/index',$data);
    }
}

