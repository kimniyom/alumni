<script type="text/javascript">
//ดึงข้อมูลพี่รหัสมาแสดง
    $(document).ready(function () {
        var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
        $("#codeline_down2").html(loading);
        var url = "index.php?r=frontend/collegian/codeline_down2";
        var collegiancode = $("#collegian_code1").val();
        //alert(collegiancode);
        var data = {collegian_code2: collegiancode};
        $.post(url, data, function (success) {
            $("#codeline_down2").html(success);
        });
    });
</script>
<?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
<?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>
<input type="hidden" id="collegian_code1" value="<?php echo $senior1['collegian_code'] ?>"/>
<?php if (!empty($senior1['img_profile'])) { ?>
    <img src="<?php echo $croup; ?>/uploads/<?php echo $senior1['img_profile'] ?>" class="img-rounded" style="margin-top: 0px; width: 80px;">
<?php } else { ?>
    <i class="fa fa-user fa-5x"></i> 
<?php } ?>
<br/>
<?php echo $senior1['collegian_name'] . ' ' . $senior1['collegian_lname']; ?><br/>

(น้องรหัส)

