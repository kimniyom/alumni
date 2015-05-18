<?php

/**
 * @author mashimaro
 */
Class NewsController extends Controller {

    public $layout = "News";

    public function actionIndex() {
        $News = new NewsModels();
        $rs = $News->findAll();
        $data['News'] = $rs;
        $this->render('//News/index', $data);
    }

}
