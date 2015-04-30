<?php
/* @var $this CollegianController */
/* @var $data Collegian */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collegian_code')); ?>:</b>
	<?php echo CHtml::encode($data->collegian_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shot_name')); ?>:</b>
	<?php echo CHtml::encode($data->shot_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collegian_name')); ?>:</b>
	<?php echo CHtml::encode($data->collegian_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collegian_lname')); ?>:</b>
	<?php echo CHtml::encode($data->collegian_lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collegian_username')); ?>:</b>
	<?php echo CHtml::encode($data->collegian_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collegian_password')); ?>:</b>
	<?php echo CHtml::encode($data->collegian_password); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('collegian_card')); ?>:</b>
	<?php echo CHtml::encode($data->collegian_card); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collegian_birth')); ?>:</b>
	<?php echo CHtml::encode($data->collegian_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changwat_code')); ?>:</b>
	<?php echo CHtml::encode($data->changwat_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ampur_code')); ?>:</b>
	<?php echo CHtml::encode($data->ampur_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tambon_code')); ?>:</b>
	<?php echo CHtml::encode($data->tambon_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zipcode')); ?>:</b>
	<?php echo CHtml::encode($data->zipcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collegian_email')); ?>:</b>
	<?php echo CHtml::encode($data->collegian_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collegian_tel')); ?>:</b>
	<?php echo CHtml::encode($data->collegian_tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occupation')); ?>:</b>
	<?php echo CHtml::encode($data->occupation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_update')); ?>:</b>
	<?php echo CHtml::encode($data->d_update); ?>
	<br />

	*/ ?>

</div>