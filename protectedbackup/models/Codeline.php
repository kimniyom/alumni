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
        $rs = Yii::app()->db->createCommand($query)->queryAll();
        //if (!empty($rs['senior_code'])) {
        return $rs;
        //} else {
        //return 0;
        //}
    }

    public function get_senior_news($collegion_code = '') {
        $query = "SELECT g.*,c.senior_code,i.img_profile
                            FROM codeline c INNER JOIN collegian g ON c.senior_code = g.collegian_code
                            LEFT JOIN images_profile i ON g.collegian_code = i.collegian_code
                            WHERE c.collegian_code = '$collegion_code' ";
        $rs = Yii::app()->db->createCommand($query)->queryAll();
        //if (!empty($rs['senior_code'])) {
        $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/";
        if ($rs) {
            foreach ($rs as $r):
                $senior[] = array("name" => $r['collegian_name'], "code" => $r['collegian_code'], "img" => $r['img_profile'],"Gen" => $r['GenNumber']);
            endforeach;

            $seniorAll = "<table border='1' width='100%'><tr>";
            //$seniorAll .= implode("<td>", $senior);
            foreach ($senior as $se) {
                $seniorAll .= "<td>";
                $seniorAll .= $this->get_senior_end($se['code']);


                if (!empty($se['img'])) {
                    //$seniorAll .= "<i class=\"fa fa-arrow-down\"></i><br/>";
                    $seniorAll .= "<img src='" . $croup . "uploads/" . $se['img'] . "'class=\"img-rounded\" style=\"margin-top: 0px; width: 70px;\">";
                } else {
                    //$seniorAll .= "<i class=\"fa fa-arrow-down\"></i><br/>";
                    $seniorAll .= "<i class=\"fa fa-user fa-5x\"></i>";
                }

                $seniorAll .= "<br/>" . $se['name'] ."(รุ่น".$se['Gen']. ")<br/>ลุง/ป้า<br/>";
                $seniorAll .= "<i class=\"fa fa-arrow-up\"></i>";
                $seniorAll .= "</td>";
            }
            $seniorAll .= "</tr></table>";
        } else {
            $seniorAll = "<table border='1' width='100%'><tr>";
            $seniorAll .= "<td><i class=\"fa fa-user fa-5x\"></i><br/>";
            $seniorAll .= "ไม่ม่มี ปู่/ย่า<br/>";
            $seniorAll .= "<i class=\"fa fa-arrow-up\"></i></td>";
            $seniorAll .= "</tr></table>";
            
            $seniorAll .= "<table border='1' width='100%'><tr>";
            $seniorAll .= "<td><i class=\"fa fa-user fa-5x\"></i><br/>";
            $seniorAll .= "ไม่ม่มี ลุง/ป้า<br/>";
            $seniorAll .= "<i class=\"fa fa-arrow-up\"></i></td>";
            $seniorAll .= "</tr></table>";
        }
        return $seniorAll;
        //} else {
        //return 0;
        //}
    }

    public function get_senior_end($collegion_code = '') {
        $query = "SELECT g.*,c.senior_code,i.img_profile
                            FROM codeline c INNER JOIN collegian g ON c.senior_code = g.collegian_code
                            LEFT JOIN images_profile i ON g.collegian_code = i.collegian_code
                            WHERE c.collegian_code = '$collegion_code' ";
        $rs = Yii::app()->db->createCommand($query)->queryAll();
        //if (!empty($rs['senior_code'])) {
        $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/";
        if ($rs) {
            foreach ($rs as $r):
                $seniorL3[] = array("name" => $r['collegian_name'], "code" => $r['collegian_code'],"img" => $r['img_profile'],"Gen" => $r['GenNumber']);
            endforeach;

            $seniorAll = "<table border='1' width='100%'><tr>";
            //$seniorAll .= implode("<td>", $senior);
            foreach ($seniorL3 as $se) {
                $seniorAll .= "<td>";
                
                if (!empty($se['img'])) {
                    $seniorAll .= "<img src='" . $croup . "uploads/" . $se['img'] . "'class=\"img-rounded\" style=\"margin-top: 0px; width: 70px;\"><br/>";
                } else {
                    $seniorAll .= "<i class=\"fa fa-user fa-5x\"></i><br/>";
                }
                
                
                $seniorAll .= $se['name'] ."(รุ่น ".$se['Gen']. ")<br/>ปู่/ย่า</br>";
                $seniorAll .= "<i class=\"fa fa-arrow-up\"></i></td>";
            }
            $seniorAll .= "</tr></table>";
        } else {
            $seniorAll = "<table border='1' width='100%'><tr>";
            $seniorAll .= "<td>ไม่มี ปู่/ย่า<br/>";
            $seniorAll .= "<i class=\"fa fa-arrow-up\"></i></td>";
            $seniorAll .= "</tr></table>";
        }
        return $seniorAll;
        //} else {
        //return 0;
        //}
    }

    public function get_collegian_down($collegion_code = '') {
        $query = "SELECT g.*,c.senior_code,i.img_profile
                            FROM codeline c INNER JOIN collegian g ON c.collegian_code = g.collegian_code
                            LEFT JOIN images_profile i ON g.collegian_code = i.collegian_code
                            WHERE c.senior_code = '$collegion_code' ";
        $rs = Yii::app()->db->createCommand($query)->queryAll();
        //if (!empty($rs['collegian_code'])) {
        return $rs;
        //} else {
        //return 0;
        //}
    }

    public function get_collegian_down2($collegion_code = '') {
        $query = "SELECT g.collegian_code AS code2,g.collegian_name,g.collegian_lname,c.senior_code,i.img_profile
                            FROM codeline c INNER JOIN collegian g ON c.collegian_code = g.collegian_code
                            LEFT JOIN images_profile i ON g.collegian_code = i.collegian_code
                            WHERE c.senior_code = '$collegion_code' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        if (!empty($rs['collegian_code'])) {
            return $rs;
        } else {
            return 0;
        }
    }

    public function get_collegian_down3($collegion_code = '') {
        $query = "SELECT g.collegian_code AS code3,g.collegian_name,g.collegian_lname,c.senior_code,i.img_profile
                            FROM codeline c INNER JOIN collegian g ON c.collegian_code = g.collegian_code
                            LEFT JOIN images_profile i ON g.collegian_code = i.collegian_code
                            WHERE c.senior_code = '$collegion_code' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        if (!empty($rs['collegian_code'])) {
            return $rs;
        } else {
            return 0;
        }
    }

    public function get_senior_all($GenNumber = '') {
        $query = "SELECT g.*,MAX(c.line_id) AS line_id,i.img_profile AS images,p.shot_name AS prename
                        FROM collegian g INNER JOIN codeline c ON g.collegian_code = c.collegian_code
                        INNER JOIN prefix p ON g.shot_name = p.id
                        LEFT JOIN images_profile i ON g.collegian_code = i.collegian_code
                        WHERE g.GenNumber = '$GenNumber'
                        GROUP BY g.collegian_code ";
        $rs = Yii::app()->db->createCommand($query)->queryAll();
        return $rs;
    }

    public function get_senior_in_collegian($collegian_code = "") {
        $query = "SELECT c.senior_code
            FROM codeline c 
            WHERE c.collegian_code = '$collegian_code' ";
        $rs = Yii::app()->db->createCommand($query)->queryAll();
        return $rs;
    }

}
