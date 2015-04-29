<?php
/* @var $this ExController */
/* @var $model Ex */

$this->breadcrumbs=array(
	'Exes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ex', 'url'=>array('index')),
	array('label'=>'Manage Ex', 'url'=>array('admin')),
);
?>

<h1>Create Ex</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>