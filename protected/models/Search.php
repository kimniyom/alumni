<?php

class Search {
    function SearchCollegian($join = '',$where = ''){
        $query = "SELECT DISTINCT(c.collegian_code) AS collegian_code,p.shot_name,c.collegian_name,c.collegian_lname,
                        timestampdiff(year,c.collegian_birth,date(NOW())) AS age,
                    c.collegian_birth,
                    c.d_update
                    FROM collegian c INNER JOIN prefix p ON c.shot_name = p.id $join
                    WHERE 1=1 $where";
        
        //return $query;
        return Yii::app()->db->createCommand($query)->queryAll();
    }
}
