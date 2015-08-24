<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs=array(
	'Collegians'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Collegian', 'url'=>array('index')),
	array('label'=>'Create Collegian', 'url'=>array('create')),
	array('label'=>'View Collegian', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Collegian', 'url'=>array('admin')),
);
?>

<h1>Update Collegian <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>