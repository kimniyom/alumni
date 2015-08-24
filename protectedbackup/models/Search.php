<?php

class Search {
    function SearchCollegian($join = '',$where = ''){
        $query = "SELECT DISTINCT(c.collegian_code) AS collegian_code,p.shot_name,c.collegian_name,c.collegian_lname,
                        timestampdiff(year,c.collegian_birth,date(NOW())) AS age,
                    c.collegian_birth,
                    c.d_update,
                    c.GenNumber
                    FROM collegian c INNER JOIN prefix p ON c.shot_name = p.id $join
                    WHERE 1=1 $where ORDER BY c.GenNumber ASC";
        
        //return $query;
        return Yii::app()->db->createCommand($query)->queryAll();
    }
    
    function Get_work_year($collegian_code = ''){
        $query = "SELECT timestampdiff(YEAR,MIN(`begin`),IF(w.`end` = '0000-00-00',date(NOW()),MAX(w.`end`))) AS work_year
                    FROM work_history w 
                    WHERE collegian_code = '$collegian_code' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs['work_year'];
    }
}
