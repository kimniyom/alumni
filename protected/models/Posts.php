<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property integer $post_id
 * @property string $sender_code
 * @property string $sender_status
 * @property string $receiver_code
 * @property string $receiver_status
 * @property string $detail
 * @property string $upper
 * @property string $d_update
 * @property string $read
 */
class Posts extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'posts';
    }

    public function Count_msg_collegian($receiver_code = '', $receiver_status = '') {
        $query = "SELECT COUNT(*) AS TOTAL "
                . "FROM posts "
                . "WHERE receiver_code = '$receiver_code' "
                . "AND receiver_status = '$receiver_status' "
                . "AND sender_status = 'U' "
                . "AND read_post = '0' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs['TOTAL'];
    }

    public function Count_msg_agent($receiver_code = '', $receiver_status = '') {
        $query = "SELECT COUNT(*) AS TOTAL "
                . "FROM posts "
                . "WHERE receiver_code = '$receiver_code' "
                . "AND receiver_status = '$receiver_status' "
                . "AND sender_status = 'M' "
                . "AND read_post = '0' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs['TOTAL'];
    }

    public function Count_msg_admin($receiver_code = '', $receiver_status = '') {
        $query = "SELECT COUNT(*) AS TOTAL "
                . "FROM posts "
                . "WHERE receiver_code = '$receiver_code' "
                . "AND receiver_status = '$receiver_status' "
                . "AND sender_status = 'A' "
                . "AND read_post = '0' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs['TOTAL'];
    }

    public function Post_collegian_all($receiver_code = '', $receiver_status = '') {
        $query = "SELECT p.*,c.collegian_name AS name,c.collegian_lname AS lname "
                . "FROM posts p INNER JOIN collegian c ON p.sender_code = c.id "
                . "WHERE receiver_code = '$receiver_code' "
                . "AND receiver_status = '$receiver_status' "
                . "AND sender_status = 'U' "
                . "ORDER BY read_post,d_update DESC";
        $rs = Yii::app()->db->createCommand($query)->queryAll();
        return $rs;
    }

    public function Post_agent_all($receiver_code = '', $receiver_status = '') {
        $query = "SELECT p.*,c.name AS name,c.lname AS lname "
                . "FROM posts p INNER JOIN company_agent c ON p.sender_code = c.id "
                . "WHERE receiver_code = '$receiver_code' "
                . "AND receiver_status = '$receiver_status' "
                . "AND sender_status = 'M' "
                . "ORDER BY read_post,d_update DESC";
        $rs = Yii::app()->db->createCommand($query)->queryAll();
        return $rs;
    }

    public function Post_admin_all($receiver_code = '', $receiver_status = '') {
        $query = "SELECT p.*,c.admin_name AS name,c.admin_lname AS lname "
                . "FROM posts p INNER JOIN admin c ON p.sender_code = c.id "
                . "WHERE receiver_code = '$receiver_code' "
                . "AND receiver_status = '$receiver_status' "
                . "AND sender_status = 'A' "
                . "ORDER BY read_post,d_update DESC";
        $rs = Yii::app()->db->createCommand($query)->queryAll();
        return $rs;
    }

    public function Detail_post_collegian($post_id = '') {
        $query = "SELECT p.*,c.collegian_name AS name,c.collegian_lname AS lname
                        FROM posts p INNER JOIN collegian c ON p.sender_code = c.id 
                        WHERE post_id = '$post_id' ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

}
