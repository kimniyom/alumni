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

    function Count_News_Genneral($collegian_code = '') {
        $query = "SELECT COUNT(*) TOTAL "
                . "FROM News "
                . "WHERE News_Owner = '$collegian_code' AND News_Catagory_id = '1'";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        
        return $rs['TOTAL'];
    }
    
    function Count_News_Collegian($collegian_code = '') {
        $query = "SELECT COUNT(*) TOTAL "
                . "FROM News "
                . "WHERE News_Owner = '$collegian_code' AND News_Catagory_id = '2'";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        
        return $rs['TOTAL'];
    }
    
    function Get_newscollegianAll($collegian_code = '') {
        $query = "SELECT * FROM News WHERE News_Owner = '$collegian_code' AND News_Catagory_id = '2' ORDER BY News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

}
