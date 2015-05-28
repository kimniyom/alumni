
<?php
if ($learning) {
    $lib = new Lib();
    foreach ($learning as $rs):
        ?>
        <p class="list-group-item" style="position: relative;">
            <b>สถาบัน : <?php echo $rs['school']; ?></b><br/>
            <label>ระดับ : </label><?php echo $rs['EduName']; ?><br/>
            <label>คณะ / สาขา : </label><?php echo $rs['faculty']; ?><br/>
            <label>ระยะเวลา :</label> <?php echo $lib->thaidate($rs['begin']); ?> ถึง <?php
            if ($rs['end'] != '0000-00-00') {
                echo $lib->thaidate($rs['end']);
            } else {
                echo "ปัจจุบัน";
            }
            ?><br/>
            <label>เกรดเฉลี่ย : </label><?php echo $rs['gpa']; ?><br/>
            <?php if (Yii::app()->session['collegian_code'] == $collegian_code) { ?>
                <a href="index.php?r=frontend/learninghistory/edit&collegian_code=<?php echo $rs['collegian_code'] . '&id=' . $rs['id']; ?>" class="btn btn-default btn-sm" style=" bottom: 5px; right: 5px; position: absolute;">
                    <i class="fa fa-pencil"></i>
                </a>
            <?php } ?>
        </p>
    <?php endforeach; ?>
<?php } else { ?>
    <?php if (Yii::app()->session['collegian_code'] == $collegian_code) { ?>
        <a href="index.php?r=frontend/learninghistory/index&collegian_code=<?php echo Yii::app()->session['collegian_code']; ?>">
            <div class="well" style=" border: dashed 2px #809deb; color: #7d7e80; text-align: center;">
                <i class="fa fa-plus fa-5x"></i> <br/>
                <h3>เพิ่มข้อมูลการศึกษา</h3>
            </div>
        </a>
        <?php
    } else {
        echo "ไม่มีข้อมูล";
    }
    ?>
<?php } ?>

