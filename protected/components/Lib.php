<?php

class Lib{
    function Monthval(){
        $month = array('01','02','03','04','05','06','07','08','09','10','11','12');
        return $month;
    }
    
    function MonthFull(){
        $thai_month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        return $thai_month;
    }
    
    function MonthShot(){
        $thai = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        return $thai;
    }
    
    function Count_Generation($gen_id = ''){
        $query = "SELECT IFNULL(COUNT(*),0) AS total FROM collegian WHERE GenNumber = '$gen_id' ";
        $result = Yii::app()->db->createCommand($query)
                ->queryRow();
        
        return $result['total'];
    }
}
