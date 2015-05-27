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

    public function Get_News_All() {
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
            FROM News n LEFT JOIN collegian c ON n.News_Owner = c.collegian_code
            WHERE n.News_Catagory_id = '1' ORDER BY n.News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    function Get_newscollegianAll_admin() {
        $query = "SELECT n.*,c.collegian_name,c.collegian_lname
            FROM News n LEFT JOIN collegian c ON n.News_Owner = c.collegian_code
            WHERE n.News_Catagory_id = '2' ORDER BY n.News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function Get_News($type = "", $limit = "") {
        $query = "SELECT n.*,c.collegian_name,c.collegian_lname
        FROM News n LEFT JOIN collegian c ON n.News_Owner = c.collegian_code
        WHERE n.News_Catagory_id = '$type' ORDER BY n.News_id DESC LIMIT $limit";

        return Yii::app()->db->createCommand($query)->queryAll();
    }
    
     //ดึงมาให้หมดสำหรับ Admin ในหมวดข่าวทั่วไป  
    function Get_newsgeneral_For_admin() {
        $query = "SELECT n.*,IFNULL(c.collegian_name,adm.admin_name) as collegian_name,
            IFNULL(c.collegian_lname,adm.admin_lname) as collegian_lname
            FROM News n LEFT JOIN collegian c ON n.News_Owner = c.collegian_code
            LEFT JOIN admin adm on adm.id=n.News_Owner
            WHERE n.News_Catagory_id = '1' ORDER BY n.News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    function Get_newscollegian_For_admin() {
        $query = "SELECT n.*,IFNULL(c.collegian_name,adm.admin_name) as collegian_name,
            IFNULL(c.collegian_lname,adm.admin_lname) as collegian_lname
            FROM News n LEFT JOIN collegian c ON n.News_Owner = c.collegian_code
            LEFT JOIN admin adm on adm.id=n.News_Owner
            WHERE n.News_Catagory_id = '2' ORDER BY n.News_id DESC";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    // Function ดึงมาแก้ไขข่าว
    public function Get_News_Edit($News_id = '') {

        $query = "SELECT n.*,CONCAT(c.collegian_name,' ',c.collegian_lname) as News_Owner,
                Ncr.News_Catagory
                FROM News n LEFT JOIN collegian c ON n.News_Owner = c.collegian_code
                LEFT JOIN admin adm on adm.id=n.News_Owner
                INNER JOIN News_Catagories Ncr ON Ncr.News_Catagory_id=n.News_Catagory_id
                WHERE n.News_id = '$News_id' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs;
    }


}
