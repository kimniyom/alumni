<?php
/* @var $this ExController */
/* @var $model Ex */

$this->breadcrumbs=array(
	'Exes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ex', 'url'=>array('index')),
	array('label'=>'Create Ex', 'url'=>array('create')),
	array('label'=>'View Ex', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ex', 'url'=>array('admin')),
);
?>

<h1>Update Ex <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>