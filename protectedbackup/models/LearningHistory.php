<?php

/**
 * This is the model class for table "learning_history".
 *
 * The followings are the available columns in table 'learning_history':
 * @property integer $id
 * @property string $collegian_code
 * @property string $school
 * @property string $EduId
 * @property string $faculty
 * @property string $begin
 * @property string $end
 * @property double $gpa
 * @property string $d_update
 */
class LearningHistory extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'learning_history';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('gpa', 'numerical'),
            array('collegian_code', 'length', 'max' => 20),
            array('school, faculty', 'length', 'max' => 255),
            array('EduId', 'length', 'max' => 10),
            array('begin, end, d_update', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, collegian_code, school, EduId, faculty, begin, end, gpa, d_update', 'safe', 'on' => 'search'),
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
            'school' => 'School',
            'EduId' => 'Edu',
            'faculty' => 'Faculty',
            'begin' => 'Begin',
            'end' => 'End',
            'gpa' => 'Gpa',
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
        $criteria->compare('school', $this->school, true);
        $criteria->compare('EduId', $this->EduId, true);
        $criteria->compare('faculty', $this->faculty, true);
        $criteria->compare('begin', $this->begin, true);
        $criteria->compare('end', $this->end, true);
        $criteria->compare('gpa', $this->gpa);
        $criteria->compare('d_update', $this->d_update, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LearningHistory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function Get_learning_by_collegian_code($collegian_code = '') {
        $query = "SELECT l.*,e.EduName
                        FROM learning_history l INNER JOIN educations e ON l.EduId = e.EduID
                        WHERE e.EduActive = '1' AND l.collegian_code = '$collegian_code' ORDER BY l.EduId DESC";

        $result = Yii::app()->db->createCommand($query)->queryAll();
        return $result;
    }

    public function Get_learning_by_id($id = '') {
        $query = "SELECT l.*,e.EduName
                        FROM learning_history l INNER JOIN educations e ON l.EduId = e.EduID
                        WHERE e.EduActive = '1' AND l.id = '$id' ";

        $result = Yii::app()->db->createCommand($query)->queryRow();
        return $result;
    }

}
