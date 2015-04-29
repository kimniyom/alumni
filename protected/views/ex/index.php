<?php
/* @var $this ExController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Exes',
);

$this->menu=array(
	array('label'=>'Create Ex', 'url'=>array('create')),
	array('label'=>'Manage Ex', 'url'=>array('admin')),
);
?>

<h1>Exes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
