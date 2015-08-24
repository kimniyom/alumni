<?php
/* @var $this ExController */
/* @var $model Ex */
/* @var $form CActiveForm */
?>

<div class="well">

    <div class="form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'ex-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => TRUE
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'ex_1'); ?>
            <?php echo $form->textField($model, 'ex_1', array('size' => 60, 'maxlength' => 100, 'class' => 'forn-control', 'required' => 'True')); ?>
            <?php echo $form->error($model, 'ex_1'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'ex_2'); ?>
            <?php echo $form->textField($model, 'ex_2', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'ex_2'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'ex_3'); ?>
            <?php echo $form->textField($model, 'ex_3', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'ex_3'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'ex_4'); ?>
            <?php echo $form->textField($model, 'ex_4', array('size' => 60, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'ex_4'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->

</div>