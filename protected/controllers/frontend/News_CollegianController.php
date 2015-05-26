<?php

class News_CollegianController extends Controller {

    public $layout = "profile";

    public function beforeAction($action) {
        if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }
    }

    public function actionNews_general_all() {
        $collegian_code = $_GET['collegian_code'];
        $news = new News_collegian();
        $data['news'] = $news->Get_newsgeneralAll($collegian_code);

        $this->render("//news_collegian/news_general", $data);
    }

    public function actionNews_collegian_all() {
        $collegian_code = $_GET['collegian_code'];
        $news = new News_collegian();
        $data['news'] = $news->Get_newscollegianAll($collegian_code);

        $this->render("//news_collegian/news_collegian", $data);
    }

}
