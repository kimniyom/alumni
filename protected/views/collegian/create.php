<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs=array(
	'Collegians'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Collegian', 'url'=>array('index')),
	array('label'=>'Manage Collegian', 'url'=>array('admin')),
);
?>

<h1>Create Collegian</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>