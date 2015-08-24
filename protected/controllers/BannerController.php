<?php

class BannerController extends Controller {

    public $layout = "backend";

    public function actionIndex() {
        $banner = new Banner();
        $data['banner'] = $banner->findAll();
        $this->render('//banner/index', $data);
    }

    public function actionUploadbanner() {
        $targetFolder = 'upload_banner/'; // Relative to the root

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
                    "images" => $img_name
                );

                Yii::app()->db->createCommand()
                        ->insert("banner", $columns);

                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function actionDel_banner() {
        $banner = new Banner();
        $id = $_POST['id'];
        $img = $banner->find("id = '$id' ");
        $images = $img['images'];
        if (!empty($images)) {
            unlink('./upload_banner/' . $images);
        }
        Yii::app()->db->createCommand()
                ->delete("banner", "id = '$id' ");
    }

}
