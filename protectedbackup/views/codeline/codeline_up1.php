<script type="text/javascript">
//ดึงข้อมูลพี่รหัสมาแสดง
    /*
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
     */
</script>
<?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
<?php $path = Yii::app()->baseUrl . '/themes/facebook/'; ?>
<!--
<input type="hidden" id="collegian_code1" value="<?//php echo $senior['collegian_code'] ?>"/>
-->

<table style=" width: 100%; text-align: center;" border="2" cellspan="0" cellpadding="0">
    <?php
    $codeline = new Codeline();
    $i = 1;
    if (!empty($senior)) {
        echo "<tr>";
        foreach ($senior as $rs):
            ?>

            <td style="text-align: center;">
                <?php
                echo $level2 = $codeline->get_senior_news($rs['senior_code']) . "<br/>";
                ?>
                <?php if (!empty($rs['img_profile'])) { ?>
                    <img src="<?php echo $croup; ?>/uploads/<?php echo $rs['img_profile'] ?>" class="img-rounded" style="margin-top: 5px; width: 65px;">
                <?php } else { ?>
                    <i class="fa fa-user fa-5x"></i>
                <?php } ?><br/>
                <?php echo $rs['collegian_name'] ?> (รุ่น <?php echo $rs['GenNumber'] ?>)<br/>
                (พี่รหัส)<br/>
                <i class="fa fa-arrow-up"></i>
            </td>
            <?php
        endforeach;
        echo "</tr>";
    }
    ?>
</table>

<hr/>

