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

}
