<?php

/**
 * This is the model class for table "mas_menu".
 *
 * The followings are the available columns in table 'mas_menu':
 * @property integer $menu_id
 * @property string $menu_name
 * @property string $menu_url
 * @property string $d_update
 * @property string $create_by
 */
class MasMenu extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'mas_menu';
    }

    public function get_masmenu() {
        $query = "SELECT m.*,u.use_name,u.use_lname  FROM mas_menu m INNER JOIN user u ON m.create_by = u.use_id ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

}
