
<?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
<?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>
<input type="hidden" id="collegian_code2" value="<?php echo $senior['collegian_code'] ?>"/>
<?php if (!empty($senior['img_profile'])) { ?>
    <img src="<?php echo $croup; ?>/uploads/<?php echo $senior['img_profile'] ?>" class="img-rounded" style="margin-top: 0px; width: 80px;">
<?php } else { ?>
    <img src="<?php echo $path; ?>assets/img/150x150.gif" class="img-rounded" style="margin-top: 0px; width: 80px;"> 
<?php } ?>
<br/>
ลุง/ป้า รหัส