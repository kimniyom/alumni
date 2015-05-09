<div class="box box-success">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> ข้อมูลผู้เข้าใช้งาน</h3>
        </div>
        <div class="box-body">
            <i class="fa fa-group"></i> <?php echo Yii::app()->session['collegian_name']; ?><br/>
            <i class="fa fa-user-secret"></i> นักศึกษา / ศิษย์เก่า<br/>
            
            <a href="<?php echo Yii::app()->createUrl('frontend/collegian/profile&collegian_code=' . Yii::app()->session['collegian_code']) ?>"
               class="btn btn-success btn-sm" style="width: 100%;" target="_bank">
                <i class="fa fa-newspaper-o"></i> โปรไฟล์</a>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>