<?php
/* @var $this ExController */
/* @var $model Ex */

$this->breadcrumbs = array(
    'Exes' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Ex', 'url' => array('index')),
    array('label' => 'Create Ex', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ex-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Exes</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'ex-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        'id',
        'ex_1',
        'ex_2',
        'ex_3',
        'ex_4',
        array(
            'class' => 'CButtonColumn',
        ),
        array
            (
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'buttons' => array(
                'down' => array
                    (
                    'label' => '[-]',
                    'url' => '"#"',
                    'visible' => '$data->ex_1 = 1',
                    'click' => 'function(){alert("Going down!");}',
                ),
            ),
        )
    ),
));
?>
