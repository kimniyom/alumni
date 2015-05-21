<?php

class SearchController extends Controller {

    public $layout = "main";

    public function actionSearch_collegian() {
        $education = new Educations();
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

        if ($changwat != "") {
            $JOIN = " INNER JOIN changwat ch ON c.changwat_code = ch.changwat_id ";
            $WHERE = " AND c.changwat_code = '$changwat'";
        } else {
            $JOIN = "";
            $WHERE = "";
        }

        if ($education != "") {
            $JOIN .= " INNER JOIN learning_history l ON c.collegian_code = l.collegian_code ";
            $WHERE .= " AND l.EduId = '$education'";
        } else {
            $JOIN .= "";
            $WHERE .= "";
        }

        if ($workhistory != "") {
            if ($workhistory == 0) {
                $JOIN = "";
                $WHERE = " AND c.collegian_code NOT IN(SELECT collegian_code FROM work_history)";
            } else {
                $JOIN .= " INNER JOIN work_history w ON c.collegian_code = w.collegian_code";
                $WHERE .= " AND 1=1";
            }
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

        $data['result'] = $Search->SearchCollegian($JOIN, $WHERE);
        
        $this->renderPartial('//frontend/search/result',$data);
    }

}
