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
    
    function Get_newsgeneralAll($collegian_code = '') {
        $query = "SELECT n.*,c.collegian_name,c.collegian_lname
            FROM News n INNER JOIN collegian c ON n.News_Owner = c.collegian_code
            WHERE n.News_Owner = '$collegian_code' AND n.News_Catagory_id = '1' ORDER BY n.News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }
    
    function Get_newscollegianAll($collegian_code = '') {
        $query = "SELECT n.*,c.collegian_name,c.collegian_lname
            FROM News n INNER JOIN collegian c ON n.News_Owner = c.collegian_code
            WHERE n.News_Owner = '$collegian_code' AND n.News_Catagory_id = '2' ORDER BY n.News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }
    
    function Get_newsgeneralAll_admin() {
        $query = "SELECT n.*,c.collegian_name,c.collegian_lname
            FROM News n INNER JOIN collegian c ON n.News_Owner = c.collegian_code
            WHERE n.News_Catagory_id = '1' ORDER BY n.News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }
    
    function Get_newscollegianAll_admin() {
        $query = "SELECT n.*,c.collegian_name,c.collegian_lname
            FROM News n INNER JOIN collegian c ON n.News_Owner = c.collegian_code
            WHERE n.News_Catagory_id = '2' ORDER BY n.News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }
    
    
}
