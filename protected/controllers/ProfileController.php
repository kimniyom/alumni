<?php

class ProfileController extends Controller{
    public $layout = "profile";
    
    public function actionIndex(){
        $this->render('index');
    }
}
