<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs=array(
	'Collegians'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Collegian', 'url'=>array('index')),
	array('label'=>'Create Collegian', 'url'=>array('create')),
	array('label'=>'Update Collegian', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Collegian', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Collegian', 'url'=>array('admin')),
);
?>

<h1>View Collegian #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'collegian_code',
		'shot_name',
		'collegian_name',
		'collegian_lname',
		'collegian_username',
		'collegian_password',
		'collegian_card',
		'collegian_birth',
		'changwat_code',
		'ampur_code',
		'tambon_code',
		'zipcode',
		'weight',
		'height',
		'collegian_email',
		'collegian_tel',
		'occupation',
		'status',
		'd_update',
	),
)); ?>
