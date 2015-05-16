
<?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
<?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>
<input type="hidden" id="collegian_code2" value="<?php echo $senior3['code3'] ?>"/>
    <?php if (!empty($senior3['img_profile'])) { ?>
        <img src="<?php echo $croup; ?>/uploads/<?php echo $senior3['img_profile'] ?>" class="img-rounded" style="margin-top: 0px; width: 80px;">
    <?php } else { ?>
        <i class="fa fa-user fa-5x"></i> 
    <?php } ?>
<br/>
<?php echo $senior3['collegian_name'] . ' ' . $senior3['collegian_lname']; ?><br/>
(เหลน รหัส)

