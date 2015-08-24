<?php
/* @var $this CollegianController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Collegians',
);

$this->menu=array(
	array('label'=>'Create Collegian', 'url'=>array('create')),
	array('label'=>'Manage Collegian', 'url'=>array('admin')),
);
?>

<h1>Collegians</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
