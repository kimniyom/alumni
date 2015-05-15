
<?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
<?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>
<input type="hidden" id="collegian_code2" value="<?php echo $senior['collegian_code'] ?>"/>
<?php if (!empty($senior['img_profile'])) { ?>
    <img src="<?php echo $croup; ?>/uploads/<?php echo $senior['img_profile'] ?>" class="img-rounded" style="margin-top: 0px; width: 80px;">
<?php } else { ?>
    <i class="fa fa-user fa-5x"></i>
<?php } ?>
<br/>
<?php echo $senior['collegian_name'] . ' ' . $senior['collegian_lname']; ?><br/>
(ลุง/ป้า รหัส)