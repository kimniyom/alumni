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
<table style=" width: 100%; text-align: center;">
    <?php
    $codeline = new Codeline();
    $i = 1;
    if (!empty($senior)) {
        foreach ($senior as $rs):
            ?>
            <tr>
                <td style="text-align: center;">
                    <?php if (!empty($rs['img_profile'])) { ?>
                        <img src="<?php echo $croup; ?>/uploads/<?php echo $rs['img_profile'] ?>" class="img-rounded" style="margin-top: 0px; width: 60px;">
                        <i class="fa fa-arrow-right" style=" float: right;  margin-top: 30px;"></i>
                    <?php } else { ?>
                        <i class="fa fa-user fa-5x"></i>
                        <i class="fa fa-arrow-right" style=" float: right; margin-top: 30px;"></i>
                    <?php } ?><br/>
                    <?php echo $rs['collegian_name'] ?><br/>
                    (น้องรหัส)
                </td>
                <td>
                    <?php
                    $subsenior = $codeline->get_collegian_down($rs['collegian_code']);
                    if (!empty($subsenior)) {
                        foreach ($subsenior as $subup1):
                            if (!empty($subup1['img_profile'])) {
                                echo "<td><img src = '" . $croup . "/uploads/" . $subup1['img_profile'] . "' class = \"img-rounded\" style = \"margin-top: 0px; width: 80px;\"><br/>";
                                echo "<i class=\"fa fa-arrow-right\" style=\" float: right; margin-top: 30px;\"></i>";
                            } else {
                                echo "<i class=\"fa fa-user fa-5x\"></i>";
                                echo "<i class=\"fa fa-arrow-right\" style=\" float: right; margin-top: 30px;\"></i>";
                            }

                            echo "<br/>" . $subup1['collegian_name'] . "<br/>";
                            echo "(หลาน)";
                            echo "</td>";

                            $subsenior2 = $codeline->get_collegian_down($subup1['collegian_code']);
                            if (!empty($subsenior2)) {
                                foreach ($subsenior2 as $subup2):
                                    echo "<td>";
                                    if (!empty($subup2['img_profile'])) {
                                        echo "<img src = '" . $croup . "/uploads/" . $subup2['img_profile'] . "' class = \"img-rounded\" style = \"margin-top: 0px; width: 80px;\"><br/>";
                                    } else {
                                        echo "<i class=\"fa fa-user fa-5x\"></i>";
                                    }
                                    echo "<br/>" . $subup2['collegian_name'] . "<br/>";
                                    echo "(เหลน)";
                                    echo "</td>";
                                endforeach;
                            } else {
                                echo "<td><i class=\"fa fa-user fa-5x\"></i><br/>";
                                echo "ไม่มี<br/>(เหลน)</td>";
                            }
                        endforeach;
                    } else {
                        echo "<i class=\"fa fa-arrow-right\" style=\" float: right; margin-top: 30px;\"></i>";
                        echo "<i class=\"fa fa-user fa-5x\"></i><br/>";
                        echo "ไม่มี<br/>(หลาน)";

                        echo "<td><i class=\"fa fa-user fa-5x\"></i><br/>";
                        echo "ไม่มี<br/>(เหลน)</td>";
                    }
                    ?>
                </td>
            </tr>
            <?php
        endforeach;
    } else {
        echo "ไม่มีสายรหัส";
    }
    ?>
</table>

