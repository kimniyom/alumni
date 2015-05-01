<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EducationController
 *
 * @author Note
 */
class EducationController extends Controller{
    //put your code here
    public function actionIndex(){
        $data = "Hello Education...";
        $this->render('index',$data);
    }
}
