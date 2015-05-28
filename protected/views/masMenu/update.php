<?php
/* @var $this MasMenuController */
/* @var $model MasMenu */

$this->breadcrumbs=array(
	'Mas Menus'=>array('index'),
	$model->menu_id=>array('view','id'=>$model->menu_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasMenu', 'url'=>array('index')),
	array('label'=>'Create MasMenu', 'url'=>array('create')),
	array('label'=>'View MasMenu', 'url'=>array('view', 'id'=>$model->menu_id)),
	array('label'=>'Manage MasMenu', 'url'=>array('admin')),
);
?>

<h1>Update MasMenu <?php echo $model->menu_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>