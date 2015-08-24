<?php
/* @var $this CollegianController */
/* @var $model Collegian */
/* @var $form CActiveForm */
?>

<div class="form">
    <div class="row">
        <div class="col-sm-5">
            <label>รหัสนักศึกษา(13 หลัก)</label>
        </div>
        <div class="col-sm-7">
            <input type="text" id="collegian_code" name="collegian_code" max="13" required="required" class="form-control"/>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <label>คำนำหน้า</label>
        </div>
        <div class="col-sm-7">
            <select id="prefix" name="prefix" class="form-control">
                <?php foreach ($perfix as $pr): ?>
                    <option value="<?php echo $pr['id']; ?>"><?php echo $pr['shot_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <label>ชื่อ</label>
        </div>
        <div class="col-sm-7">
            <input type="text" id="collegian_name" name="collegian_name" class="form-control" required="required"/>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <label>นามสกุล</label>
        </div>
        <div class="col-sm-7">
            <input type="text" id="collegian_lname" name="collegian_lname" class="form-control" required="required"/>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <label>ชื่อเข้าใช้งาน</label>
        </div>
        <div class="col-sm-7">
            <input type="text" id="collegian_username" name="collegian_username" class="form-control" required="required"/>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <label>รหัสผ่าน</label>
        </div>
        <div class="col-sm-7">
            <input type="password" id="collegian_password" name="collegian_password" class="form-control" required="required"/>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <label>บัตรประชาชน</label>
        </div>
        <div class="col-sm-7">
            <input type="text" id="collegian_card" name="collegian_card" class="form-control" required="required" max="13"/>
        </div>
    </div>

    <div class="row">
        <?php $lib = new Lib();?>
        <div class="col-sm-5">
            <label>วันเกิด</label>
        </div>
        <div class="col-sm-7">
            <select id="day">
                <?php for($i=1;$i<=31;$i++){ ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
            </select>
            
            <select id="month">
                <?php for($i=0;$i<=11;$i++){ ?>
                <option value="<?php echo $lib->Monthval[$i];?>"><?php echo $lib->MonthFull[$i];?></option>
                <?php } ?>
            </select>
            
            <select id="year">
                <?php 
                $yearnow = date("Y");
                for($i=$yearnow;$i>=$yearnow-50;$i){ ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
            </select>
            
        </div>
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
        echo CHtml::dropDownList('ampur_code', array(), array(
            'class' => 'form-control',
            'maxlength' => 20,
            'options' => array($model->ampur_code => array('selected' => true)),
            'ajax' => array(
                'type' => 'POST', //request type
                'url' => Yii::app()->createUrl('current/ampur'), //url to call.
                'update' => '#tambon_code', //selector to update
            //'data' => array('ampur_id' => 'js:this.value'),
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