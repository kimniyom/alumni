<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CurrentController extends Controller {

    public function actionDynamiccities() {
       
        $data = Ampur::model()->findAll('changwat_id=:changwat_id', array(':changwat_id' => $_POST['changwat_id']));

        $data = CHtml::listData($data, 'ampur_id', 'ampur_name');
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

}
