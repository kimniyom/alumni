<?php

/**
 * This is the model class for table "news_comment".
 *
 * The followings are the available columns in table 'news_comment':
 * @property integer $id
 * @property integer $news_id
 * @property string $comment
 * @property string $owner_id
 * @property string $owner_status
 * @property string $d_update
 */
class NewsComment extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'news_comment';
    }

    function Get_name_comment($news_id = '') {
        $query = "SELECT n.*,c.collegian_code,IF(c.collegian_name IS NULL,a.admin_name,c.collegian_name) as name
                        FROM news_comment n 
                        LEFT JOIN collegian c ON n.owner_id = c.collegian_code 
                        LEFT JOIN admin a ON n.owner_id = a.id 
                        WHERE n.News_id = '$news_id' ORDER BY n.id ASC";

        return Yii::app()->db->createCommand($query)->queryAll();
    }

}
