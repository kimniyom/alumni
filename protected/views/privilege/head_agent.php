<?php
$agent = new CompanyAgent();
$img_agent = $agent->Get_img_profile(Yii::app()->session['agent_id']);
?>
<a href="javascript:void(0);" 
   class="navbar-brand" 
   id="logo_profile"
   style=" margin: 0px; padding: 7px;">
    <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads_images_user/<?php echo $img_agent; ?>" 
         style="height: 35px; margin: 0px;" class="img-rounded">
    <b>
        <?php echo Yii::app()->session['agent_name']; ?>
    </b>
</a>
