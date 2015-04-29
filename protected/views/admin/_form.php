<?php
/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'admin-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-edit"></i> แก้ไขข้อมูล
    </div>
    <div class="panel-body">
        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <div class="col-sm-3">
                <?php echo $form->labelEx($model, 'ชื่อ :'); ?>
            </div>
            <div class="col-sm-9">
                <?php echo $form->textField($model, 'admin_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'admin_name'); ?>
            </div>
        </div>
        <br/>

        <div class="row">
            <div class="col-sm-3">
                <?php echo $form->labelEx($model, 'นามสกุล :'); ?>
            </div>
            <div class="col-sm-9">
                <?php echo $form->textField($model, 'admin_lname', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'admin_lname'); ?>
            </div>
        </div>
        <br/>

        <div class="row">
            <div class="col-sm-3">
                <?php echo $form->labelEx($model, 'ชื่อผู้ใช้งาน :'); ?>
            </div>
            <div class="col-sm-9">
                <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'username'); ?>
            </div>
        </div>
        <br/>

        <div class="row">
            <div class="col-sm-3">
                <?php echo $form->labelEx($model, 'รหัสผ่าน :'); ?>
            </div>
            <div class="col-sm-9">
                <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
        </div>
        <br/>

        <div class="row">
            <div class="col-sm-3">
                <?php echo $form->labelEx($model, 'เบอร์โทรศัพท์ :'); ?>
            </div>
            <div class="col-sm-9">
                <?php echo $form->textField($model, 'tel', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'tel'); ?>
            </div>
        </div>
        <br/>

        <div class="row">
            <div class="col-sm-3">
                <?php echo $form->labelEx($model, 'อีเมลล์ :'); ?>
            </div>
            <div class="col-sm-9">
                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
        </div>
        <br/>
        
        <div class="row" style=" text-align: center;">
            <div class="col-lg-12">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'แก้ไขข้อมูล', 
                    array('class' => 'btn btn-success')); ?>
            </div>
        </div>
        <br/>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->