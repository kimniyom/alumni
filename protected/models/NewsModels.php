<?php

/**
 * Description of NewsModels
 *
 * @author mashimaro
 */
class NewsModels extends CActiveRecord {

    public function tableName() {
        return 'News';
    }
    
    public function Get_News_All(){
        $query = "SELECT n.*,c.collegian_name,c.collegian_lname
        FROM News n INNER JOIN collegian c ON n.News_Owner = c.collegian_code";
        
        return Yii::app()->db->createCommand($query)->queryAll();
    }
    
}
