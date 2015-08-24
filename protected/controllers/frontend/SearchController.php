<?php

class SearchController extends Controller {

    public $layout = "main";

    public function beforeAction($action) {
        if (isset(Yii::app()->session['user'])) {
            return true;
        } else {
            //$this->render('//site/main');
            $this->redirect(array('site/main'));
        }
    }

    public function actionSearch_collegian() {
        $education = new Educations();
        $gen = new GenerationModel();
        $data['gen'] = $gen->findAll();
        $data['education'] = $education->findAll();
        
        $this->render('//frontend/search/search', $data);
    }

    public function actionSearchAll() {
        $Search = new Search();
        $changwat = $_POST['changwat'];
        $education = $_POST['education'];
        $workhistory = $_POST['workinghistory'];
        $workings = $_POST['workings'];
        $aptitude = $_POST['aptitude'];
        $etc = $_POST['etc'];
        $collegian_name = $_POST['collegian_name'];
        $genNumber = $_POST['genNumber'];

        $yearstart = "";
        $yearend = "";

        $JOIN = "";
        $WHERE = "";

        if ($workhistory != "") {
            $work = "1";
            if ($workhistory == 0) {
                //$JOIN .= "";
                $WHERE = " AND c.collegian_code NOT IN(SELECT collegian_code FROM work_history)";
            } else {
                $JOIN .= " INNER JOIN work_history w ON c.collegian_code = w.collegian_code";
                $WHERE .= " AND 1=1";

                if ($workhistory == 1) {
                    $yearstart = "1";
                    $yearend = "3";
                } else if ($workhistory == 2) {
                    $yearstart = "3";
                    $yearend = "5";
                } else if ($workhistory == 3) {
                    $yearstart = "5";
                    $yearend = "100";
                }
            }
        } else {
            $work = "0";
            $JOIN .= "";
            $WHERE .= "";
        }

        if ($changwat != "") {
            $JOIN = " INNER JOIN changwat ch ON c.changwat_code = ch.changwat_id ";
            $WHERE = " AND ch.changwat_id = '$changwat'";
        } else {
            $JOIN .= "";
            $WHERE .= "";
        }

        if ($education != "") {
            $JOIN .= " INNER JOIN learning_history l ON c.collegian_code = l.collegian_code ";
            $WHERE .= " AND l.EduId = '$education'";
        } else {
            $JOIN .= "";
            $WHERE .= "";
        }



        if ($workings != "") {
            $JOIN .= " INNER JOIN workings wk ON c.collegian_code = wk.collegian_code ";
            $WHERE .= " AND 1=1";
        } else {
            $JOIN .= "";
            $WHERE .= "";
        }

        if ($aptitude != "") {
            $JOIN .= " INNER JOIN aptitude a ON c.collegian_code = a.collegian_code";
            $WHERE .= " AND 1=1";
        } else {
            $JOIN .= "";
            $WHERE .= "";
        }

        if ($etc != "") {
            $JOIN .= " INNER JOIN collegian_etc e ON c.collegian_code = e.collegian_code";
            $WHERE .= " AND 1=1 AND e.active = '1'";
        } else {
            $JOIN .= "";
            $WHERE .= "";
        }
        
        if($collegian_name != ""){
            $JOIN .= "";
            $WHERE .= " AND (c.collegian_name LIKE '%$collegian_name%' OR c.nickname LIKE '%$collegian_name%') ";
        } else {
            $JOIN .= "";
            $WHERE .= "";
        }
        
        if($genNumber != ""){
            $JOIN .= "";
            $WHERE .= " AND c.GenNumber = '$genNumber' ";
        } else {
            $JOIN .= "";
            $WHERE .= "";
        }
        
        

        $data['result'] = $Search->SearchCollegian($JOIN, $WHERE);
        

        $data['year_start'] = $yearstart;
        $data['year_end'] = $yearend;
        if($work == "1") {
        $this->renderPartial('//frontend/search/result', $data);
        } else {
            $this->renderPartial('//frontend/search/result_all', $data);
        }
        
    }

}
