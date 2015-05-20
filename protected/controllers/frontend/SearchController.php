<?php

class SearchController extends Controller {

    public $layout = "main";

    public function actionSearch_collegian() {
        $education = new Educations();
        $data['education'] = $education->findAll();
        $this->render('//frontend/search/search', $data);
    }

}
