<script type="text/javascript">
    $(document).ready(function () {
        $("#table_search").dataTable({
            //"sPaginationType": "full_numbers", // แสดงตัวแบ่งหน้า
            "bSort": false,
            "bLengthChange": false, // แสดงจำนวน record ที่จะแสดงในตาราง
            "iDisplayLength": 10, // กำหนดค่า default ของจำนวน record 
            "bFilter": false, // แสดง search box
            "oLanguage": {
                "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                "sInfo": "แสดง _START_ ถึง _END_ ทั้งหมด _TOTAL_ เร็คคอร์ด",
                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                "sSearch": "ค้นหา :",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sLast": "หน้าสุดท้าย",
                    "sNext": "ถัดไป",
                    "sPrevious": "กลับ"
                }
            }
        });
    });
</script>
<table class="table table-hover" id="table_search">
    <thead>
        <tr>
            <th style=" display: none;"></th>
            <th>ผลการค้นหา</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $lib = new Lib();
        $search = new Search();
        $collegian = new Collegian();
        //echo $year_start;
        //echo $year_end;
        $i = 0;
        foreach ($result as $rs):
            $i++;
            $img = $collegian->Get_img_profile($rs['collegian_code']);
            ?>
            <tr>
                <td style="display: none;"><?php echo $i; ?></td>
                <td>
                    <a href="index.php?r=frontend/timeline/profile&collegian_code=<?php echo $rs['collegian_code'] ?>" target="_blank">
                        <div class="row">
                            <div class="col-sm-3">
                                <?php if (!empty($img)) { ?>
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads/<?php echo $img; ?>" width="80">
                                <?php } else { ?>
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads/bg_5.jpg" width="80">
                                <?php } ?>
                            </div>
                            <div class="col-sm-9">
                                <label style="color: #660000;">
                                    <?php echo $rs['shot_name'] . $rs['collegian_name'] . ' ' . $rs['collegian_lname']; ?>
                                    (รุ่น <?php echo $rs['GenNumber']; ?>)
                                </label><br/>
                                อายุ 
                                <?php
                                if (!empty($rs['collegian_birth'])) {
                                    echo $rs['age'];
                                } else {
                                    echo "-";
                                }
                                ?>
                                <br/>
                                ประวัติการทำงาน <?php
                                if (!empty($year_age)) {
                                    echo $year_age . " ปี";
                                } else {
                                    echo "ไม่มี";
                                }
                                ?><br/>
                                <font style=" font-size: 12px; float: right; color: #0033cc;">
                                อัพเดทข้อมูลเมื่อ <?php echo $lib->thaidate($rs['d_update']) ?>
                                </font>
                            </div>
                        </div>
                    </a>
                </td>
            </tr>
            <?php
        endforeach;
        ?>
    </tbody>
</table>

