<?php

/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs = array(
    'ข้อมูลของ '.$model->admin_name => array('view', 'id' => $model->id),
    'แก้ไขข้อมูล',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>