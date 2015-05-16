
<?php
if ($work) {
    $lib = new Lib();
    foreach ($work as $rs):
        ?>
        <p class="list-group-item" style="position: relative;">
            <b>บริษัท : <?php echo $rs['company']; ?></b><br/>
            <label>ตำแหน่ง : </label><?php echo $rs['position']; ?><br/>
            ระยะเวลา : <?php echo $lib->thaidate($rs['begin']); ?> ถึง <?php
            if ($rs['end'] != '0000-00-00') {
                echo $lib->thaidate($rs['end']);
            } else {
                echo "ปัจจุบัน";
            }
            ?><br/>
            <a href="index.php?r=frontend/workhistory/edit&collegian_code=<?php echo $rs['collegian_code'] . '&id=' . $rs['id']; ?>" class="btn btn-default btn-sm" style=" bottom: 5px; right: 5px; position: absolute;">
                <i class="fa fa-pencil"></i>
            </a>
        </p>
    <?php endforeach; ?>
<?php } else { ?>
    <a href="index.php?r=frontend/workhistory/index&collegian_code=<?php echo Yii::app()->session['collegian_code']; ?>">
        <div class="well" style=" border: dashed 2px #809deb; color: #7d7e80; text-align: center;">
            <i class="fa fa-plus fa-5x"></i> <br/>
            <h3>เพิ่มข้อมูลการทำงาน</h3>
        </div>
    </a>
<?php } ?>

