
<?php
if ($workings) {
    foreach ($workings as $rs):
        ?>
        <p class="list-group-item" style="position: relative;">
            <b>ชื่อผลงาน : <?php echo $rs['workings_name']; ?></b><br/>
            <label>รายละเอียด : </label><?php echo $rs['workings_detail']; ?><br/>
            <a href="index.php?r=frontend/workings/edit&collegian_code=<?php echo $rs['collegian_code'] . '&id=' . $rs['id']; ?>" class="btn btn-default btn-sm" style=" bottom: 5px; right: 5px; position: absolute;">
                <i class="fa fa-pencil"></i>
            </a>
        </p>
    <?php endforeach; ?>
<?php } else { ?>
    <?php if (Yii::app()->session['collegian_code'] == $collegian_code) { ?>
        <a href="index.php?r=frontend/workings/index&collegian_code=<?php echo Yii::app()->session['collegian_code']; ?>">
            <div class="well" style=" border: dashed 2px #809deb; color: #7d7e80; text-align: center;">
                <i class="fa fa-plus fa-5x"></i> <br/>
                <h3>เพิ่มข้อมูลผลงาน</h3>
            </div>
        </a>
    <?php
    } else {
        echo "ไม่มีข้อมูล";
    }
    ?>
<?php } ?>

