<?php

class MasMenuController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'backend';

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $db = new MasMenu();

        $data['menu'] = $db->get_masmenu();
        $data['header'] = "จัดการลิงค์เมนู";
        $this->render('//masmenu/index', $data);
    }

    public function actionSave_menu() {
        $columns = array(
            "menu_name" => $_POST['menu_name'],
            "menu_url" => $_POST['menu_url'],
            "create_by" => Yii::app()->session['admin_id'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->insert("mas_menu", $columns);
    }

    public function actionEdit_menu() {
        $menu_id = $_POST['menu_id'];
        $columns = array(
            "menu_name" => $_POST['menu_name'],
            "menu_url" => $_POST['menu_url'],
            "create_by" => Yii::app()->session['admin_id'],
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->update("mas_menu", $columns, "menu_id = '$menu_id' ");
    }

    public function actionDel_menu() {
        $menu_id = $_POST['menu_id'];
        Yii::app()->db->createCommand()
                ->delete("mas_menu", "menu_id = '$menu_id'");
    }

    public function actionSet_menu() {
        $menu_id = $_POST['menu_id'];
        Yii::app()->session['menu_id'] = $menu_id;
    }

}
