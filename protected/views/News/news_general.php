<script type="text/javascript">
    $(document).ready(function () {
        $("#news_general").dataTable();
    });
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bullhorn"></i> <label>ข่าวทั่วไป </label>
    </div>
    <div class="panel-body">
        <table class="table table-bordered" id="news_general">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>หัวข้อ</th>
                    <th>วันที่</th>
                    <th>ผู้สร้าง</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($news as $rs):
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $rs['News_Head']; ?></td>
                        <td><?php echo $rs['CreateNews_Date']; ?></td>
                        <td><?php echo $rs['collegian_name'] . ' ' . $rs['collegian_lname']; ?></td>
                        <td style="text-align: center;">
                            <a href="index.php?r=news/edit_news&News_id=<?php echo $rs['News_id'].'&type=1' ?>">
                                <div class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></div>
                            </a>
                            <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
