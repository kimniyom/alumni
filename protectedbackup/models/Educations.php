<?php

/**
 * This is the model class for table "educations".
 *
 * The followings are the available columns in table 'educations':
 * @property integer $EduID
 * @property string $EduName
 * @property integer $EduActive
 *
 * The followings are the available model relations:
 * @property LearningHistory[] $learningHistories
 */
class Educations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'educations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EduName, EduActive', 'required'),
			array('EduActive', 'numerical', 'integerOnly'=>true),
			array('EduName', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('EduID, EduName, EduActive', 'safe', 'on'=>'search'),
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
			'learningHistories' => array(self::HAS_MANY, 'LearningHistory', 'EduId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EduID' => 'Edu',
			'EduName' => 'Edu Name',
			'EduActive' => 'Edu Active',
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

		$criteria->compare('EduID',$this->EduID);
		$criteria->compare('EduName',$this->EduName,true);
		$criteria->compare('EduActive',$this->EduActive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Educations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
