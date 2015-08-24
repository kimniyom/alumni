<?php
/* @var $this ExController */
/* @var $data Ex */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ex_1')); ?>:</b>
	<?php echo CHtml::encode($data->ex_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ex_2')); ?>:</b>
	<?php echo CHtml::encode($data->ex_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ex_3')); ?>:</b>
	<?php echo CHtml::encode($data->ex_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ex_4')); ?>:</b>
	<?php echo CHtml::encode($data->ex_4); ?>
	<br />


</div>