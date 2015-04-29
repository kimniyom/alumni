<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenerationModel
 *
 * @author Note
 */
class GenerationModel extends CActiveRecord{
    //put your code here
    static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function tableName() {
        return 'generation';
    }
    
    public function attributeLabels() {
        return array(
            'GenYear' => 'ปีที่สำเร็จการศึกษา',
            'GenNumber' => 'รุ่น' 
        );
    }
}
