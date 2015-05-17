<?php

/**
 * This is the model class for table "workings".
 *
 * The followings are the available columns in table 'workings':
 * @property integer $id
 * @property string $collegian_code
 * @property string $workings_name
 * @property string $workings_detail
 * @property string $d_update
 */
class Workings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'workings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'numerical', 'integerOnly'=>true),
			array('collegian_code', 'length', 'max'=>15),
			array('workings_name', 'length', 'max'=>255),
			array('workings_detail, d_update', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, collegian_code, workings_name, workings_detail, d_update', 'safe', 'on'=>'search'),
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
			'workings_name' => 'Workings Name',
			'workings_detail' => 'Workings Detail',
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
		$criteria->compare('workings_name',$this->workings_name,true);
		$criteria->compare('workings_detail',$this->workings_detail,true);
		$criteria->compare('d_update',$this->d_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Workings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
