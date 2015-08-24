<center>
    <!-- normal -->
    <?php if (Yii::app()->session['collegian_code'] == $collegian_code) { ?>
        <div class="ih-item square colored effect13 top_to_bottom" style=" border: none; width: 100%; height: 100%;">
            <a href="Javascript:void(0);" onclick="edit_img_profile();">
                <div class="img" style=" border: none; width: 100%;">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads/<?php echo $img; ?>" class="img-responsive">
                </div>
                <div class="info">
                    <h3>
                        <i class="fa fa-camera fa-3x"></i><br/><br/>
                        แก้ไขรูปภาพประจำตัว
                    </h3>
                </div></a>
        </div>
    <?php } else { ?>
        <?php if (Yii::app()->session['user'] == 'M') { ?>
            <?php if ($shot_name == 'นาย') { ?>
                <div class="ih-item square colored effect13 top_to_bottom" style=" border: none; width: 100%; height: 100%;">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/Boy.png" class="img-responsive">
                </div>
            <?php } else { ?>
                <div class="ih-item square colored effect13 top_to_bottom" style=" border: none; width: 100%; height: 100%;">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/Girl.png" class="img-responsive">
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="ih-item square colored effect13 top_to_bottom" style=" border: none; width: 100%; height: 100%;">
                <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads/<?php echo $img; ?>" class="img-responsive">
            </div>
        <?php } ?>
    <?php } ?>
    <!-- end normal -->
</center>


