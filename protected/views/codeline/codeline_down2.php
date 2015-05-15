<script type="text/javascript">
//ดึงข้อมูลพี่รหัสมาแสดง
    $(document).ready(function () {
        var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
        $("#codeline_down3").html(loading);
        var url = "index.php?r=frontend/collegian/codeline_down3";
        var collegiancode = $("#collegian_code2").val();
        var data = {collegian_code3: collegiancode};
        $.post(url, data, function (success) {
            $("#codeline_down3").html(success);
        });
    });
</script>
<?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
<?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>
<input type="text" id="collegian_code2" value="<?php echo $senior2['code2'] ?>"/>
    <?php if (!empty($senior2['img_profile'])) { ?>
        <img src="<?php echo $croup; ?>/uploads/<?php echo $senior2['img_profile'] ?>" class="img-rounded" style="margin-top: 0px; width: 80px;">
    <?php } else { ?>
       <i class="fa fa-user fa-5x"></i> 
    <?php } ?>
<br/>
<?php echo $senior2['collegian_name'] . ' ' . $senior2['collegian_lname']; ?><br/>
(หลานรหัส)

