<?php $lib = new Lib(); ?>
<p class="list-group-item">รหัสนักศึกษา : <?php echo $detail['collegian_code']; ?></p>
<?php if (Yii::app()->session['user'] != "M") { ?>
    <p class="list-group-item">วันเกิด : 
        <?php
        if (isset($detail['collegian_birth'])) {
            echo $lib->thaidate($detail['collegian_birth']);
        } else {
            echo "-";
        }
        ?>
    </p>
<?php } ?>
<p class="list-group-item">อายุ : 
    <?php
    if (isset($detail['collegian_birth'])) {
        echo $lib->get_age($detail['collegian_birth']) . " ปี ";
    } else {
        echo "-";
    }
    ?>
    <?php if (Yii::app()->session['user'] != 'M') { ?>
    <p class="list-group-item">เบอร์โทรศัพท์ : <?php echo $detail['collegian_tel']; ?></p>
<?php } ?>
<p class="list-group-item">อีเมล : <?php echo $detail['collegian_email']; ?></p>
<p class="list-group-item">อาชีพ : <?php
    if (isset($detail['occupation'])) {
        echo $detail['occupation'];
    } else {
        echo "-";
    }
    ?></p>

<p class="list-group-item">
    <label>ที่อยู่ </label><br/>
    จังหวัด : <?php echo $detail['changwat_name']; ?>
    <?php if (Yii::app()->session['user'] != "M") { ?>
        อำเภอ : <?php echo $detail['ampur_name']; ?>
        ตำบล : <?php echo $detail['tambon_name']; ?>
    <?php } ?>
</p>

<?php if (Yii::app()->session['collegian_code'] == $detail['collegian_code']) { ?>
    <a href="<?php echo Yii::app()->createUrl('frontend/collegian/edit_profile&collegian_code=' . $detail['collegian_code']) ?>" style=" float: right;">
        <i class="fa fa-edit"></i> แก้ไขข้อมูลพื้นฐาน
    </a>
<?php } ?>
