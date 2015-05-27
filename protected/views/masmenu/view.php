<?php
/* @var $this MasMenuController */
/* @var $model MasMenu */

$this->breadcrumbs=array(
	'Mas Menus'=>array('index'),
	$model->menu_id,
);

$this->menu=array(
	array('label'=>'List MasMenu', 'url'=>array('index')),
	array('label'=>'Create MasMenu', 'url'=>array('create')),
	array('label'=>'Update MasMenu', 'url'=>array('update', 'id'=>$model->menu_id)),
	array('label'=>'Delete MasMenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->menu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasMenu', 'url'=>array('admin')),
);
?>

<h1>View MasMenu #<?php echo $model->menu_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'menu_id',
		'menu_name',
		'menu_url',
		'd_update',
		'create_by',
	),
)); ?>
