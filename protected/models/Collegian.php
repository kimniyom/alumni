<?php

/**
 * This is the model class for table "collegian".
 *
 * The followings are the available columns in table 'collegian':
 * @property integer $id
 * @property string $collegian_code
 * @property string $shot_name
 * @property string $collegian_name
 * @property string $collegian_lname
 * @property string $collegian_username
 * @property string $collegian_password
 * @property string $collegian_card
 * @property string $collegian_birth
 * @property string $changwat_code
 * @property string $ampur_code
 * @property string $tambon_code
 * @property string $zipcode
 * @property double $weight
 * @property double $height
 * @property string $collegian_email
 * @property string $collegian_tel
 * @property string $occupation
 * @property string $status
 * @property string $d_update
 */
class Collegian extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'collegian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('weight, height', 'numerical'),
			array('collegian_code, collegian_card', 'length', 'max'=>13),
			array('shot_name, changwat_code, ampur_code, tambon_code, collegian_tel', 'length', 'max'=>10),
			array('collegian_name, collegian_lname, collegian_email', 'length', 'max'=>100),
			array('collegian_username, collegian_password', 'length', 'max'=>50),
			array('zipcode', 'length', 'max'=>5),
			array('occupation', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			array('collegian_birth, d_update', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, collegian_code, shot_name, collegian_name, collegian_lname, collegian_username, collegian_password, collegian_card, collegian_birth, changwat_code, ampur_code, tambon_code, zipcode, weight, height, collegian_email, collegian_tel, occupation, status, d_update', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'collegian_code' => 'Collegian Code',
			'shot_name' => 'Shot Name',
			'collegian_name' => 'Collegian Name',
			'collegian_lname' => 'Collegian Lname',
			'collegian_username' => 'Collegian Username',
			'collegian_password' => 'Collegian Password',
			'collegian_card' => 'Collegian Card',
			'collegian_birth' => 'Collegian Birth',
			'changwat_code' => 'Changwat Code',
			'ampur_code' => 'Ampur Code',
			'tambon_code' => 'Tambon Code',
			'zipcode' => 'Zipcode',
			'weight' => 'Weight',
			'height' => 'Height',
			'collegian_email' => 'Collegian Email',
			'collegian_tel' => 'Collegian Tel',
			'occupation' => 'อาชีพเก็บเป็น Text',
			'status' => 'Status',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('collegian_code',$this->collegian_code,true);
		$criteria->compare('shot_name',$this->shot_name,true);
		$criteria->compare('collegian_name',$this->collegian_name,true);
		$criteria->compare('collegian_lname',$this->collegian_lname,true);
		$criteria->compare('collegian_username',$this->collegian_username,true);
		$criteria->compare('collegian_password',$this->collegian_password,true);
		$criteria->compare('collegian_card',$this->collegian_card,true);
		$criteria->compare('collegian_birth',$this->collegian_birth,true);
		$criteria->compare('changwat_code',$this->changwat_code,true);
		$criteria->compare('ampur_code',$this->ampur_code,true);
		$criteria->compare('tambon_code',$this->tambon_code,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('height',$this->height);
		$criteria->compare('collegian_email',$this->collegian_email,true);
		$criteria->compare('collegian_tel',$this->collegian_tel,true);
		$criteria->compare('occupation',$this->occupation,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('d_update',$this->d_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Collegian the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
