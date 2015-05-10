<div class="box box-success">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> ข้อมูลผู้ใช้งาน</h3>
        </div>
        <div class="box-body">
            <i class="fa fa-group"></i> <?php echo Yii::app()->session['agent_name']; ?><br/>
            <i class="fa fa-compass"></i> <?php echo Yii::app()->session['company']; ?><br/>
            <i class="fa fa-user-secret"></i> ตัวแทนบริษัท
            <br/><br/>
            <a href="<?php echo Yii::app()->createUrl('frontend/user/detail_agent')?>" style=" float: right;"> 
                <i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
            <br/>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>

