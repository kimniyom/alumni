<?php

/**
 * @author mashimaro
 */
Class NewsController extends Controller {

    public $layout = "News";

    public function actionIndex() {
        $News = new NewsModels();
        //$rs = $News->findAll();
        $rs = $News->Get_News_All();
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
            "News_Catagory_id" => $_POST['News_Catagories'],
            "News_Group_id" => $_POST['News_Groups'],
            "News_Detail" => $_POST['News_Detail'],
            "News_Owner" => $_POST['News_Owner'],
            "News_User_Status" => "A",
            "CreateNews_Date" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("News", $columns);
    }

    //Author : Kimniyom => โชว์รายละเอียดข่าว
    public function actionDetail_News() {
        $this->layout = "main";
        $News_id = $_GET['News_id'];
        $start = ($News_id - 5);
        $end = ($News_id + 5);
        $news = new NewsModels();
        $data['News'] = $news->find("News_id = '$News_id' ");
        $data['News_jam'] = $news->findAll("News_Catagory_id = '1' AND News_id between '$start' AND '$end' AND News_id != '$News_id' ");
        $this->render("//News/Detail", $data);
    }

}
