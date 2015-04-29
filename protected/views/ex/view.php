<?php
/* @var $this ExController */
/* @var $model Ex */

$this->breadcrumbs=array(
	'Exes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ex', 'url'=>array('admin')),
	array('label'=>'Create Ex', 'url'=>array('create')),
	array('label'=>'Update Ex', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ex', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ex', 'url'=>array('admin')),
);
?>

<h1>View Ex #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ex_1',
		'ex_2',
		'ex_3',
		'ex_4',
	),
)); ?>
