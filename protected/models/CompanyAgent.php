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

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('shot_name', 'length', 'max' => 3),
            array('name, lname, company', 'length', 'max' => 100),
            array('username, password', 'length', 'max' => 50),
            array('tel, mobile', 'length', 'max' => 10),
            array('address', 'length', 'max' => 255),
            array('status, active', 'length', 'max' => 1),
            array('d_update', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, shot_name, name, lname, username, password, tel, mobile, company, address, status, active, d_update', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'shot_name' => 'Shot Name',
            'name' => 'Name',
            'lname' => 'Lname',
            'username' => 'Username',
            'password' => 'Password',
            'tel' => 'Tel',
            'mobile' => 'A = \'Admin\',U = \'USER ที่เป็นศิษร์เก่า เพิ่มโดย Admin\',M = \'Member ผู้ใช้งานภายนอก\'',
            'company' => 'Company',
            'address' => 'Address',
            'status' => 'Status',
            'active' => 'Active',
            'd_update' => 'D Update',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('shot_name', $this->shot_name, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('lname', $this->lname, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('company', $this->company, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('active', $this->active, true);
        $criteria->compare('d_update', $this->d_update, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CompanyAgent the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function Check_user($username = '', $password = '') {
        $query = "SELECT COUNT(*) AS TOTAL FROM company_agent WHERE username = '$username' AND password = '$password' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs['TOTAL'];
    }

    public function Do_login($username = '', $password = '') {
        $query = "SELECT u.*,p.shot_name AS TOTAL 
                            FROM company_agent u
                            INNER JOIN prefix p ON u.shot_name = p.id
                    WHERE username = '$username' AND password = '$password' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs;
    }

}
