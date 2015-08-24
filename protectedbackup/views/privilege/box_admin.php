<div class="box box-info">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> ข้อมูลผู้เข้าใช้งาน</h3>
        </div>
        <div class="box-body">
            <i class="fa fa-group"></i> <?php echo Yii::app()->session['admin_name']; ?><br/>
            <i class="fa fa-user-secret"></i> ผู้ดูแลระบบ<br/>
            
            <a href="<?php echo Yii::app()->createUrl('main_admin') ?>" class="btn btn-info btn-sm" style=" width: 100%;">
                <i class="fa fa-gears"></i> จัดการข้อมูล</a>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>