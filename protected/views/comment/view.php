<!-- Message. Default to the left -->
<?php
$collegian = new Collegian();
$lib = new Lib();
foreach ($comment as $rs) {
    if ($rs['owner_status'] == "U") {
        $img = $collegian->Get_img_profile($rs['collegian_code']);
    } else {
        $img = "bg_5.jpg";
    }
    ?>
    <div class="direct-chat-msg">
        <div class='direct-chat-info clearfix'>
            <span class='direct-chat-name pull-left'><?php echo $rs['name'] ?></span>
            <span class='direct-chat-timestamp pull-right'><?php echo $lib->thaidate($rs['d_update']) ?></span>
        </div><!-- /.direct-chat-info -->
        <img class="direct-chat-img" src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads/<?php echo $img; ?>" alt="message user image" /><!-- /.direct-chat-img -->
        <div class="direct-chat-text" style=" color: #000;">
            <?php echo $rs['comment'] ?>
        </div><!-- /.direct-chat-text --> 
    </div><!-- /.direct-chat-msg -->
<?php } ?>