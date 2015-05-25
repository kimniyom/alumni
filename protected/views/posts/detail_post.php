<?php $lib = new Lib(); ?>
<div class="box box-danger">
    <div class="box-header with-border">
        <i class="fa fa-envelope-o"></i> ข้อความจาก <i class="fa fa-user"></i> <b><?php echo $post['name'] . ' ' . $post['lname'] ?></b>
        <i class="fa fa-mail-forward"></i> ถึงคุณ ...
        <div class="box-tools pull-right">
            <i class="fa fa-clock-o"></i> <?php echo $lib->thaidate($post['d_update']) ?>
        </div>
    </div>
    <div class="box-body padding">
        <h3 style="margin-top: 10px;">หัวข้อ :: <?php echo $post['title']; ?></h3>
        <hr>
        <?php echo $post['detail']; ?>
    </div>
    <div class="box-footer">
        <div class="btn btn-default btn-sm"><i class="fa  fa-mail-reply"></i> ตอบกลับ</div>
    </div>
</div>
