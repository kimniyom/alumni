<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Forgot {
    function GetAll(){
        $query = "SELECT * FROM forgot";
        $result = Yii::app()->db->createCommand($query)->queryAll();
        return $result;
    }
    
    function GetById($id = null){
        $query = "SELECT * FROM forgot WHERE id = '$id' ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        return $result;
    }
}
