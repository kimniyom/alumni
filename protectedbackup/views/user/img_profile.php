<?php
$path = Yii::app()->baseUrl . '/assets/jquery.picture.cut/uploads_images_user/';
?>

<!-- normal -->
<div class="ih-item circle effect13 from_left_and_right">
    <a href="Javascript:void(0);" onclick="edit_img_profile();">
        <div class="img">
            <img src="<?php echo $path . $img; ?>" class="img-circle" alt="User Image" width="100" />
        </div>
  
        <div class="info">
            <h3><i class="fa fa-camera fa-2x"></i></h3>
            <p>แก้ไขรูปภาพประจำตัว</p>
        </div>
    </a>
</div>
<br/>



