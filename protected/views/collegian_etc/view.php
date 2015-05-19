
<?php
if ($etc) {
    foreach ($etc as $rs):
        ?>
        <p class="list-group-item" style="position: relative;">
            <?php if ($rs['active'] == '0') { ?>
                <font style="color: #ff0033;">รอการอนุมัติ</font>
            <?php } else { ?>
                <label><?php echo $rs['etc']; ?></label><br/>
            <?php } ?>
            <a href="index.php?r=frontend/collegian_etc/edit&collegian_code=<?php echo $rs['collegian_code'] . '&id=' . $rs['id']; ?>" class="btn btn-default btn-sm" style=" bottom: 5px; right: 5px; position: absolute;">
                <i class="fa fa-pencil"></i>
            </a>
        </p>
    <?php endforeach; ?>
<?php } else { ?>
    <a href="index.php?r=frontend/collegian_etc/index&collegian_code=<?php echo Yii::app()->session['collegian_code']; ?>">
        <div class="well" style=" border: dashed 2px #809deb; color: #7d7e80; text-align: center;">
            <i class="fa fa-plus fa-5x"></i> <br/>
            <h3>เพิ่มข้อมูลอื่น ๆ</h3>
        </div>
    </a>
<?php } ?>

