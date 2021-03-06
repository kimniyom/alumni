<?php

/**
 * This is the model class for table "work_history".
 *
 * The followings are the available columns in table 'work_history':
 * @property integer $id
 * @property string $collegian_code
 * @property string $company
 * @property string $began
 * @property string $end
 * @property string $position
 * @property string $company_tel
 * @property string $d_update
 */
class WorkHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'work_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('collegian_code', 'length', 'max'=>13),
			array('company, position', 'length', 'max'=>100),
			array('company_tel', 'length', 'max'=>20),
			array('began, end, d_update', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, collegian_code, company, began, end, position, company_tel, d_update', 'safe', 'on'=>'search'),
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
			'company' => 'Company',
			'began' => 'Began',
			'end' => 'End',
			'position' => 'Position',
			'company_tel' => 'Company Tel',
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
		$criteria->compare('company',$this->company,true);
		$criteria->compare('began',$this->began,true);
		$criteria->compare('end',$this->end,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('company_tel',$this->company_tel,true);
		$criteria->compare('d_update',$this->d_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WorkHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
