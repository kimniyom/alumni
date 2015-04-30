<?php
/* @var $this CollegianController */
/* @var $model Collegian */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
    function validate_dropdown(shot_id) {

    }
</script>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'collegian-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'collegian_code'); ?>
        <?php echo $form->textField($model, 'collegian_code', array('size' => 13, 'maxlength' => 13)); ?>
        <?php echo $form->error($model, 'collegian_code'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'shot_name'); ?>
        <?php
        echo $form->dropDownList(
                $model, 'shot_name', CHtml::listData(Prefix::model()->findAll(), 'id', 'shot_name'), array('class' => 'form-control', 'maxlength' => 20,
            'options' => array($model->id => array('selected' => true)),
            'onchange' => 'js:validate_dropdown(this.value)')
        );
        ?>
        <?php echo $form->error($model, 'shot_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'collegian_name'); ?>
        <?php echo $form->textField($model, 'collegian_name', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'collegian_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'collegian_lname'); ?>
        <?php echo $form->textField($model, 'collegian_lname', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'collegian_lname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'collegian_username'); ?>
        <?php echo $form->textField($model, 'collegian_username', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'collegian_username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'collegian_password'); ?>
        <?php echo $form->textField($model, 'collegian_password', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'collegian_password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'collegian_card'); ?>
        <?php echo $form->textField($model, 'collegian_card', array('size' => 13, 'maxlength' => 13)); ?>
        <?php echo $form->error($model, 'collegian_card'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'collegian_birth'); ?>
        <?php echo $form->textField($model, 'collegian_birth'); ?>
        <?php echo $form->error($model, 'collegian_birth'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'changwat_code'); ?>
        <?php
        $sql_changwat = "SELECT changwat_id,changwat_name FROM changwat";
        $r_changwat = Yii::app()->db->createCommand($sql_changwat)->queryAll();
        ?>
        <?php
        echo $form->dropDownList(
                $model, 'changwat_code', CHtml::listData($r_changwat, 'changwat_id', 'changwat_name'), array(
            'class' => 'form-control',
            'maxlength' => 20,
            'options' => array($model->id => array('selected' => true)),
            'ajax' => array(
                'type' => 'POST', //request type
                'url' => Yii::app()->createUrl('current/dynamiccities'), //url to call.
                'update' => '#ampur_code', //selector to update
                'data' => array('changwat_id' => 'js:this.value'),
            //'update' => '#'.CHtml::activeId($model, 'ampur_code')
            //'data'=>'js:javascript statement' 
            //leave out the data key to pass all form values through
            )
                )
        );
        ?>

        <?php echo $form->error($model, 'changwat_code'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'ampur_code'); ?>
        <?php
        echo $form->dropDownList(
                $model, 'ampur_code', CHtml::listData(Ampur::model()->findAll(), 'ampur_id', 'ampur_name'), array(
            'class' => 'form-control',
            'maxlength' => 20,
            'options' => array($model->ampur_code => array('selected' => true)),
            'ajax' => array(
                'type' => 'POST', //request type
                'url' => Yii::app()->createUrl('current/dynamiccities'), //url to call.
                'update' => '#tambon_code', //selector to update
                'data' => array('ampur_id' => 'js:this.value'),
            //'update' => '#'.CHtml::activeId($model, 'ampur_code')
            //'data'=>'js:javascript statement' 
            //leave out the data key to pass all form values through
            )
                )
        );
        ?>

        <?php echo $form->error($model, 'ampur_code'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tambon_code'); ?>
        <?php echo $form->textField($model, 'tambon_code', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'tambon_code'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'zipcode'); ?>
        <?php echo $form->textField($model, 'zipcode', array('size' => 5, 'maxlength' => 5)); ?>
        <?php echo $form->error($model, 'zipcode'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'weight'); ?>
        <?php echo $form->textField($model, 'weight'); ?>
        <?php echo $form->error($model, 'weight'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'height'); ?>
        <?php echo $form->textField($model, 'height'); ?>
        <?php echo $form->error($model, 'height'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'collegian_email'); ?>
        <?php echo $form->textField($model, 'collegian_email', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'collegian_email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'collegian_tel'); ?>
        <?php echo $form->textField($model, 'collegian_tel', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'collegian_tel'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'occupation'); ?>
        <?php echo $form->textField($model, 'occupation', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'occupation'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->textField($model, 'status', array('size' => 1, 'maxlength' => 1)); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'd_update'); ?>
        <?php echo $form->textField($model, 'd_update'); ?>
        <?php echo $form->error($model, 'd_update'); ?>
    </div>



    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->