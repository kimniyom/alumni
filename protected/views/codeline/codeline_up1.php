<script type="text/javascript">
//ดึงข้อมูลพี่รหัสมาแสดง
    $(document).ready(function () {
        var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
        $("#codeline_up2").html(loading);
        var url = "index.php?r=frontend/collegian/codeline_up2";
        var collegiancode = $("#collegian_code1").val();
        var data = {collegian_code: collegiancode};
        $.post(url, data, function (success) {
            $("#codeline_up2").html(success);
        });
    });
</script>
<?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
<?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>
<input type="hidden" id="collegian_code1" value="<?php echo $senior['collegian_code'] ?>"/>
<?php if (!empty($senior['img_profile'])) { ?>
    <img src="<?php echo $croup; ?>/uploads/<?php echo $senior['img_profile'] ?>" class="img-rounded" style="margin-top: 0px; width: 80px;"><br/>
<?php } else { ?>
    <i class="fa fa-user fa-5x"></i>
<?php } ?>
<?php echo $senior['collegian_name'] . ' ' . $senior['collegian_lname']; ?><br/>
(พี่รหัส)

