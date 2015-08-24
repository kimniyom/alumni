<?php
/* @var $this MasMenuController */
/* @var $model MasMenu */

$this->breadcrumbs = array(
    'Mas Menus' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List MasMenu', 'url' => array('index')),
    array('label' => 'Manage MasMenu', 'url' => array('admin')),
);
?>

<h1>Create MasMenu</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>