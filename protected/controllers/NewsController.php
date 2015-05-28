<?php

/**
 * @author mashimaro
 */
Class NewsController extends Controller {

    public $layout = "news";

    public function actionIndex() {
        $this->render('//News/index');
    }

    public function actionNews_general_all() {
        $news = new NewsModels();

        if (Yii::app()->session['user'] == "U") {
            $data['news'] = $news->Get_newsgeneralAll(Yii::app()->session['collegian_code']);
        } else {
            $data['news'] = $news->Get_newsgeneral_For_admin();
        }
        $this->render("//News/news_general", $data);
    }

    public function actionNews_collegian_all() {

        $news = new NewsModels();
        if (Yii::app()->session['user'] == "U") {
            $data['news'] = $news->Get_newscollegianAll(Yii::app()->session['collegian_code']);
        } else {
            $data['news'] = $news->Get_newscollegian_For_admin();
        }

        $this->render("//News/news_collegian", $data);
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
            //"News_Group_id" => $_POST['News_Groups'],
            //"News_Detail" => $_POST['News_Detail'],
            "News_Owner" => $_POST['News_Owner'],
            "News_User_Status" => Yii::app()->session['user'],
            "CreateNews_Date" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("News", $columns);

        $sql = "SELECT MAX(News_id) AS id FROM News";
        $rs = Yii::app()->db->createCommand($sql)->queryRow();

        echo $rs['id'];
    }

    public function actionEdit_news() {
        $News_id = $_GET['News_id'];
        $data['type'] = $_GET['type'];
        $News = new NewsModels();
        $data['News'] = $News->Get_News_Edit($News_id);
        $this->render('//News/Edit_News', $data);
    }

    public function actionSaveEdit_News() {
        $News_id = $_POST['News_id'];
        $columns = array(
            "News_Head" => $_POST['News_Head'],
            "News_Detail" => $_POST['News_Detail'],
            "News_Catagory_id" => $_POST['News_Catagories'],
            "News_Owner" => $_POST['News_Owner'],
            //"News_Group_id" => $_POST['News_Groups'],
            "News_User_Status" => Yii::app()->session['user'],
            "CreateNews_Date" => date("Y-m-d H:i:s")
        );
        Yii::app()->db->createCommand()
                ->Update("News", $columns, "News_id = '$News_id'");
        //$this->render('//News/News_general_all');
    }

    //Author : Kimniyom => โชว์รายละเอียดข่าว
    public function actionDetail_news() {

        $this->layout = "main";
        $News_id = $_GET['News_id'];
        $start = ($News_id - 2);
        $end = ($News_id + 2);
        $news = new NewsModels();
        $data['News'] = $news->find("News_id = '$News_id' ");
        $cat_id = $data['News']['News_Catagory_id'];
        $data['News_jam'] = $news->findAll("News_Catagory_id = '$cat_id' AND News_id >= '$start' AND News_id <='$end' AND News_id != '$News_id' ");
        $data['news_images'] = $news->Get_images_by_id($News_id);

        if ($data['News']['News_Catagory_id'] == "2" && Yii::app()->session['user'] == "") {
            $this->redirect(array('site/main'));
        }

        $this->render("//News/Detail", $data);
    }

    public function actionNews_upload_images() {
        $data['news_id'] = $_GET['news_id'];
        $this->render("//News/news_upload_images", $data);
    }

    public function actionUploadify() {
        $news_id = $_GET['news_id'];
        $targetFolder = 'upload_news/'; // Relative to the root

        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $img_name = time() . $_FILES['Filedata']['name'];
            $targetFile = rtrim($targetFolder, '/') . '/' . $img_name;

            // Validate the file type
            $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                $columns = array(
                    "News_id" => $news_id,
                    "News_Image" => $img_name
                );

                Yii::app()->db->createCommand()
                        ->insert("News_Images", $columns);

                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function actionEdit_images_news() {
        $news_id = $_GET['news_id'];
        $news = new NewsModels();

        $data['news'] = $news->Get_images_by_id($news_id);
        $data['news_id'] = $news_id;
        $this->render("//news/news_edit_images", $data);
    }

    public function actionDelete_img_new() {
        $News_Image_id = $_POST['News_Image_id'];

        $sql = "SELECT News_Image FROM News_Images WHERE News_Image_id = '$News_Image_id' ";
        $rs = Yii::app()->db->createCommand($sql)->queryRow();


        if (!empty($rs['News_Image'])) {
            unlink("./upload_news/" . $rs['News_Image']);
        }

        Yii::app()->db->createCommand()
                ->delete("News_Images", "News_Image_id = '$News_Image_id' ");
    }

    public function actionDelete_news() {
        $news_id = $_POST['News_id'];
        $sql = "SELECT News_Image FROM News_Images WHERE News_id = '$news_id' ";
        $result = Yii::app()->db->createCommand($sql)->queryAll();


        foreach ($result as $rs) {
            unlink("./upload_news/" . $rs['News_Image']);
        }

        Yii::app()->db->createCommand()
                ->delete("News", "News_id = '$news_id' ");
    }

}
