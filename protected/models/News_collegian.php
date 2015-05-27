<?php

class News_collegian {

    function Get_newsgeneralAll($collegian_code = '') {
        $query = "SELECT * FROM News WHERE News_Owner = '$collegian_code' AND News_Catagory_id = '1' ORDER BY News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    function Get_newsgeneralBy_Id($id = '') {
        $query = "SELECT * FROM News WHERE News_id = '$id' ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    function Count_News_Genneral() {
        if (Yii::app()->session['user'] == "U") {
            $where = " News_Owner = '" . Yii::app()->session['collegian_code'] . "' ";
        } else {
            $where = "1=1";
        }
        $query = "SELECT COUNT(*) TOTAL "
                . "FROM News "
                . "WHERE $where AND News_Catagory_id = '1'";
        $rs = Yii::app()->db->createCommand($query)->queryRow();

        return $rs['TOTAL'];
    }

    function Count_News_Collegian() {
        if (Yii::app()->session['user'] == "U") {
            $where = " News_Owner = '" . Yii::app()->session['collegian_code'] . "' ";
        } else {
            $where = "1=1";
        }
        $query = "SELECT COUNT(*) TOTAL "
                . "FROM News "
                . "WHERE $where AND News_Catagory_id = '2'";
        $rs = Yii::app()->db->createCommand($query)->queryRow();

        return $rs['TOTAL'];
    }

    function Get_newscollegianAll($collegian_code = '') {
        $query = "SELECT * FROM News WHERE News_Owner = '$collegian_code' AND News_Catagory_id = '2' ORDER BY News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    //แสดงข้อมูลสำหรับนักศึกษาทั้งหมด
    function Get_new_collegianAll() {
        $query = "SELECT n.*,c.collegian_name,c.collegian_lname
                FROM News n LEFT JOIN collegian c ON n.News_Owner = c.collegian_code 
                WHERE News_Catagory_id = '2' ORDER BY News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }
    
    //แสดงข้อมูลทั่วไปทั้งหมด
    function Get_new_generalAll() {
        $query = "SELECT n.*,c.collegian_name,c.collegian_lname
                FROM News n LEFT JOIN collegian c ON n.News_Owner = c.collegian_code 
                WHERE News_Catagory_id = '1' ORDER BY News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

}
