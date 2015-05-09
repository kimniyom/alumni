<?php

class SearchController extends Controller {

    public $layout = "main";

    public function actionSearch_collegian_address() {
        $this->render('//frontend/search/search_address');
    }

}
