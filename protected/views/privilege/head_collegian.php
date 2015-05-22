<a href="<?php echo Yii::app()->createUrl('frontend/Collegian/Profile&collegian_code=' . Yii::app()->session['collegian_code']); ?>" 
   class="navbar-brand" 
   style=" margin: 0px; padding: 7px;" id="logo_profile">
       <?php
       $collegian = new Collegian();
       $img = $collegian->Get_img_profile(Yii::app()->session['collegian_code']);
       ?>
    <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads/<?php echo $img; ?>" 
         style="height: 35px; margin: 0px;" class="img-rounded">
    <b>
        <?php echo Yii::app()->session['collegian_name']; ?>
    </b>
</a>
