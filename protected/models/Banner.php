<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $id
 * @property string $images
 * @property string $d_update
 */
class Banner extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'banner';
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
