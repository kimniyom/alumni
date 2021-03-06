<?php

/**
 * This is the model class for table "collegian_etc".
 *
 * The followings are the available columns in table 'collegian_etc':
 * @property integer $id
 * @property string $collegian_code
 * @property string $etc
 * @property integer $active
 * @property string $d_update
 */
class CollegianEtc extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'collegian_etc';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, active', 'numerical', 'integerOnly' => true),
            array('collegian_code', 'length', 'max' => 20),
            array('etc, d_update', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, collegian_code, etc, active, d_update', 'safe', 'on' => 'search'),
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
            'collegian_code' => 'Collegian Code',
            'etc' => 'Etc',
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
        $criteria->compare('collegian_code', $this->collegian_code, true);
        $criteria->compare('etc', $this->etc, true);
        $criteria->compare('active', $this->active);
        $criteria->compare('d_update', $this->d_update, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CollegianEtc the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function Get_Collegian_etc() {
        $query = "SELECT e.*,c.collegian_name AS name,c.collegian_lname AS lname
                            FROM collegian_etc e INNER JOIN collegian c ON e.collegian_code = c.collegian_code";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

}
