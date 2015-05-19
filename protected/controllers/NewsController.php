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

    public function actionCreate_News() {
        $News_Catagories = New News_CatagoriesModels();
        $News_Groups = New News_GroupsModels();
        $data['News_Catagories'] = $News_Catagories->findAll();
        $data['News_Groups'] = $News_Groups->findAll();
        $this->render('//News/Create_News', $data);
    }

    public function actionSave_News() {
        $columns = array(
            "News_Head" => $_POST['News_Head'],
            "News_Detail" => $_POST['News_Detail'],
            "News_Catagory_id" => $_POST['News_Catagory_id'],
            "News_Group_id" => $_POST['News_Group_id'],
            "News_Detail" => $_POST['News_Detail'],
            "News_Owner" => $_POST['News_Owner'],
            "News_User_Status"=>"A",
            "CreateNews_Date" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("News", $columns);
    }

}
