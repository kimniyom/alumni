<?php

/**
 * This is the model class for table "codeline".
 *
 * The followings are the available columns in table 'codeline':
 * @property integer $id
 * @property integer $line_id
 * @property string $collegian_code
 * @property string $senior_code
 * @property string $GenNumber
 */
class Codeline extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'codeline';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('line_id', 'numerical', 'integerOnly' => true),
            array('collegian_code, senior_code', 'length', 'max' => 13),
            array('GenNumber', 'length', 'max' => 5),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, line_id, collegian_code, senior_code, GenNumber', 'safe', 'on' => 'search'),
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
            'line_id' => 'Line',
            'collegian_code' => 'Collegian Code',
            'senior_code' => 'Senior Code',
            'GenNumber' => 'Gen Number',
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
        $criteria->compare('line_id', $this->line_id);
        $criteria->compare('collegian_code', $this->collegian_code, true);
        $criteria->compare('senior_code', $this->senior_code, true);
        $criteria->compare('GenNumber', $this->GenNumber, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Codeline the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function get_senior($collegion_code = '') {
        $query = "SELECT g.*,c.senior_code,i.img_profile
                            FROM codeline c INNER JOIN collegian g ON c.senior_code = g.collegian_code
                            LEFT JOIN images_profile i ON g.collegian_code = i.collegian_code
                            WHERE c.collegian_code = '$collegion_code' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        if (!empty($rs['senior_code'])) {
            return $rs;
        } else {
            return 0;
        }
    }

    public function get_senior_all($GenNumber = '') {
        $query = "SELECT g.*,c.line_id,i.img_profile AS images,p.shot_name AS prename
                            FROM collegian g INNER JOIN codeline c ON g.collegian_code = c.collegian_code
                            INNER JOIN prefix p ON g.shot_name = p.id
                            LEFT JOIN images_profile i ON g.collegian_code = i.collegian_code
                            WHERE g.GenNumber = '$GenNumber' ";
        $rs = Yii::app()->db->createCommand($query)->queryAll();
        return $rs;
    }

}
