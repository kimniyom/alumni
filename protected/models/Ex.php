<?php

/**
 * This is the model class for table "ex".
 *
 * The followings are the available columns in table 'ex':
 * @property integer $id
 * @property string $ex_1
 * @property string $ex_2
 * @property string $ex_3
 * @property string $ex_4
 */
class Ex extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ex';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ex_1, ex_2, ex_3, ex_4', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ex_1, ex_2, ex_3, ex_4', 'safe', 'on'=>'search'),
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
			'ex_1' => 'Ex 1',
			'ex_2' => 'Ex 2',
			'ex_3' => 'Ex 3',
			'ex_4' => 'Ex 4',
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
		$criteria->compare('ex_1',$this->ex_1,true);
		$criteria->compare('ex_2',$this->ex_2,true);
		$criteria->compare('ex_3',$this->ex_3,true);
		$criteria->compare('ex_4',$this->ex_4,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ex the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
