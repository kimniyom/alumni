<?php

class News_CollegianController extends Controller{
    public $layout = "profile";
    
    public function actionNews_general_all(){
        $collegian_code = $_GET['collegian_code'];
        $news = new News_collegian();
        $data['news'] = $news->Get_newsgeneralAll($collegian_code);
        
        $this->render("//news_collegian/news_general",$data);
    }
}
