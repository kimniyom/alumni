<?php

class CollegianController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'backend';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function actionView() {
        $GenNumber = $_GET['GenNumber'];
        $collegian = new Collegian();
        $data['GenNumber'] = $GenNumber;
        $data['collegian'] = $collegian->Get_Collegian_InNumber($GenNumber);
        $this->render('view', $data);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $query = "SELECT * FROM prefix";
        $data['perfix'] = Yii::app()->db->createCommand($query)->queryAll();
        $data['GenID'] = $_GET['GenID'];
        $data['GenNumber'] = $_GET['GenNumber'];
        $this->render('create', $data);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Collegian'])) {
            $model->attributes = $_POST['Collegian'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $gen = new GenerationModel();
        $data['gen'] = $gen->findAll(" 1=1 ORDER BY GenNumber DESC");
        $this->render('//Collegian/generation', $data);
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Collegian('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Collegian']))
            $model->attributes = $_GET['Collegian'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Collegian the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Collegian::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Collegian $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'collegian-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionSave_collegian() {
        $query = "SELECT * FROM collegian WHERE collegian_code = '" . $_POST['collegian_code'] . "' ";
        $check_code = Yii::app()->db->createCommand($query)->queryScalar();
        if ($check_code == 0) {
            //$birth = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
            $data = array(
                "collegian_code" => $_POST['collegian_code'],
                "shot_name" => $_POST['shot_name'],
                "collegian_name" => $_POST['collegian_name'],
                "collegian_lname" => $_POST['collegian_lname'],
                "collegian_username" => $_POST['collegian_username'],
                "collegian_password" => $_POST['collegian_password'],
                /*
                  "collegian_card" => $_POST['collegian_card'],
                  "collegian_birth" => $birth,
                  "changwat_code" => $_POST['changwat_code'],
                  "ampur_code" => $_POST['ampur_code'],
                  "tambon_code" => $_POST['tambon_code'],
                  "zipcode" => $_POST['zipcode'],
                  "weight" => $_POST['weight'],
                  "height" => $_POST['height'],
                  "collegian_email" => $_POST['collegian_email'],
                  "collegian_tel" => $_POST['collegian_tel'],
                  "occupation" => $_POST['occupation'],
                 * 
                 */
                "GenNumber" => $_POST['GenNumber'],
                "status" => "U",
                "d_update" => date("Y-m-d H:i:s")
            );

            Yii::app()->db->createCommand()
                    ->insert("collegian", $data);

            //เช็คว่าถ้าเข้ามาเป็นรุ่นแรกให้ทำการสร้างสายรหัสก่อน
            $GenNumber = $_POST['GenNumber'];
            if ($GenNumber == '1') {
                //สร้ารหัสสายใหม่
                $query_linecode = "SELECT MAX(line_id) AS lineid FROM codeline";
                $r = Yii::app()->db->createCommand($query_linecode)->queryRow();
                $newline_id = ($r['lineid'] + 1);

                $data_codeline = array(
                    "collegian_code" => $_POST['collegian_code'],
                    "GenNumber" => '1',
                    "line_id" => $newline_id
                );

                Yii::app()->db->createCommand()
                        ->insert("codeline", $data_codeline);
            }
            echo "success";
        } else {
            echo "unsuccess";
        }
    }

    public function actionEdit_collegian() {
        $birth = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
        $collegian_code = $_POST['collegian_code'];
        $data = array(
            "shot_name" => $_POST['shot_name'],
            "collegian_name" => $_POST['collegian_name'],
            "collegian_lname" => $_POST['collegian_lname'],
            "collegian_username" => $_POST['collegian_username'],
            "collegian_card" => $_POST['collegian_card'],
            "collegian_birth" => $birth,
            "changwat_code" => $_POST['changwat_code'],
            "ampur_code" => $_POST['ampur_code'],
            "tambon_code" => $_POST['tambon_code'],
            "zipcode" => $_POST['zipcode'],
            "weight" => $_POST['weight'],
            "height" => $_POST['height'],
            "collegian_email" => $_POST['collegian_email'],
            "collegian_tel" => $_POST['collegian_tel'],
            "occupation" => $_POST['occupation'],
            "status" => "U",
            "d_update" => date("Y-m-d H:i:s")
        );

        Yii::app()->db->createCommand()
                ->update("collegian", $data, "collegian_code = '$collegian_code' ");
    }

    public function actionFrom_edit_collegian() {
        $collegian = new Collegian();
        $collegian_code = $_GET['collegian_code'];
        $query = "SELECT * FROM prefix";
        $data['perfix'] = Yii::app()->db->createCommand($query)->queryAll();
        $data['detail'] = $collegian->Get_Collegian_By_CollegianCode($collegian_code);

        $this->render('//admin/edit_collegian', $data);
    }

}
