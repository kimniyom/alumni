<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs=array(
	'Collegians'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Collegian', 'url'=>array('index')),
	array('label'=>'Create Collegian', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#collegian-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Collegians</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'collegian-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'collegian_code',
		'shot_name',
		'collegian_name',
		'collegian_lname',
		'collegian_username',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
