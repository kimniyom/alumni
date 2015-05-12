<div class="box box-success">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> ข้อมูลผู้ใช้งาน</h3>
        </div>
        <div class="box-body">
            <i class="fa fa-group"></i> ชื่อใช้งาน : <?php echo Yii::app()->session['agent_name']; ?><br/>
            <i class="fa fa-compass"></i> บริษัท : <?php echo Yii::app()->session['company']; ?><br/>
            <i class="fa fa-user-secret"></i> สถานะ : ตัวแทนบริษัท
            <br/><br/>

        </div><!-- /.box-body -->
        <div class="box-footer">

            <a href="<?php echo Yii::app()->createUrl('frontend/user/detail_agent') ?>" > 
                <i class="fa fa-user"></i> ข้อมูลส่วนตัว</a><br/>
            <a href="<?php echo Yii::app()->createUrl('frontend/user/edit_password&id=' . Yii::app()->session['agent_id']); ?>" > 
                <i class="fa fa-unlock"></i> แก้ไขรหัสผ่าน</a>

        </div>
    </div><!-- /.box -->
</div>

