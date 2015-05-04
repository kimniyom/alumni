<?php
/**
 * @author mashimaro
 */
Class NewsController extends Controller{
public $layout = "news";
public function actionIndex(){
        $this->render('index');
    }
}