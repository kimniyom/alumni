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
<hr/>
<table style=" width: 100%; text-align: center;" border="2" cellspan="0" cellpadding="0">
    <tr>
        <?php
        $codeline = new Codeline();
        $i = 1;
        if (!empty($senior)) {
            echo "<tr>";
            foreach ($senior as $rs):
                ?>

                <td style="text-align: center;">
                    <?php if (!empty($rs['img_profile'])) { ?>
                        <i class="fa fa-arrow-down"></i><br/>
                        <img src="<?php echo $croup; ?>/uploads/<?php echo $rs['img_profile'] ?>" class="img-rounded" style="margin-top: 0px; width: 55px;">
                    <?php } else { ?>
                        <i class="fa fa-arrow-down"></i><br/>
                        <i class="fa fa-user fa-5x"></i>
                    <?php } ?><br/>
                    <?php echo $rs['collegian_name'] ?> (รุ่น <?php echo $rs['GenNumber']?>)<br/>
                    (น้องรหัส)
                    <?php
                    $subsenior = $codeline->get_collegian_down($rs['collegian_code']);
                    if (!empty($subsenior)) {
                        echo "<table style='width:100%;' border='1'><tr>";
                        foreach ($subsenior as $subup1):
                            echo "<td>";
                            //echo "<td>";
                            if (!empty($subup1['img_profile'])) {
                                echo "<i class=\"fa fa-arrow-down\"></i><br/>";
                                echo "<img src = '" . $croup . "/uploads/" . $subup1['img_profile'] . "' class = \"img-rounded\" style = \"margin-top: 0px; width: 55px;\"><br/>";
                            } else {
                                echo "<i class=\"fa fa-arrow-down\"></i><br/>";
                                echo "<i class=\"fa fa-user fa-5x\"></i>";
                            }

                            echo "<br/>" . $subup1['collegian_name'] . "(รุ่น ".$subup1['GenNumber'].")<br/>";
                            echo "(หลาน)<br/>";

                            //** เหลน
                            $subsenior2 = $codeline->get_collegian_down($subup1['collegian_code']);
                            if (!empty($subsenior2)) {
                                echo "<table width='100%' border='1'><tr>";
                                foreach ($subsenior2 as $subup2):
                                    echo "<td>";
                                    if (!empty($subup2['img_profile'])) {
                                        echo "<i class=\"fa fa-arrow-down\"></i><br/>";
                                        echo "<img src = '" . $croup . "/uploads/" . $subup2['img_profile'] . "' class = \"img-rounded\" style = \"margin-top: 0px; width: 55px;\"><br/>";
                                    } else {
                                        echo "<i class=\"fa fa-arrow-down\"></i><br/>";
                                        echo "<i class=\"fa fa-user fa-5x\"></i>";
                                    }
                                    echo "<br/>" . $subup2['collegian_name'] . "(รุ่น ".$subup2['GenNumber'].")<br/>";
                                    echo "(เหลน)<br/>";
                                    echo "</td>";
                                endforeach;
                                echo "</tr>";
                                echo "</table>";
                            } else {
                                echo "<table width='100%' border='1'><tr>";
                                echo "<td><i class=\"fa fa-arrow-down\"></i><br/>";
                                echo "<i class=\"fa fa-user fa-5x\"></i><br/>";
                                echo "ไม่มี <br/>(เหลน)</td>";
                                echo "</tr></table>";
                            }
                            //** เหลน

                            echo "</td>";
                        endforeach;
                        echo "</tr></table>";
                    } else {
                        echo "<table style='width:100%;' border='1'><tr><td>";
                        echo "<i class=\"fa fa-arrow-down\"></i><br/>";
                        echo "<i class=\"fa fa-user fa-5x\"></i><br/>";
                        echo "ไม่มี<br/>(หลาน)</td></tr></table>";

                        echo "<table width='100%' border='1'><tr>";
                        echo "<td><i class=\"fa fa-arrow-down\"></i><br/>";
                        echo "<i class=\"fa fa-user fa-5x\"></i><br/>";
                        echo "ไม่มี <br/>(เหลน)</td>";
                        echo "</tr></table>";
                    }
                    ?>
                </td>
                <?php
            endforeach;
        } else {
            echo "ไม่มีสายรหัส";
        }
        ?>
    </tr>
</table>

