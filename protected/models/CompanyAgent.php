<?php

/**
 * This is the model class for table "company_agent".
 *
 * The followings are the available columns in table 'company_agent':
 * @property integer $id
 * @property string $shot_name
 * @property string $name
 * @property string $lname
 * @property string $username
 * @property string $password
 * @property string $tel
 * @property string $mobile
 * @property string $company
 * @property string $address
 * @property string $status
 * @property string $active
 * @property string $d_update
 */
class CompanyAgent extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'company_agent';
    }

    public function Check_user($username = '', $password = '') {
        $query = "SELECT COUNT(*) AS TOTAL FROM company_agent WHERE username = '$username' AND password = '$password' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs['TOTAL'];
    }

    public function Do_login($username = '', $password = '') {
        $query = "SELECT u.*,p.shot_name
                            FROM company_agent u
                            INNER JOIN prefix p ON u.shot_name = p.id
                    WHERE username = '$username' AND password = '$password' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs;
    }

    public function Get_agent($id = '') {
        $query = "SELECT u.*,p.shot_name as prefix
                            FROM company_agent u
                            INNER JOIN prefix p ON u.shot_name = p.id
                    WHERE u.id = '$id' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs;
    }
    
    public function Get_img_profile($id = ''){
        $query = "SELECT images FROM company_agent WHERE id = '$id' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs['images'];
    }

}
