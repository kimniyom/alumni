<script type="text/javascript">
    $(document).ready(function () {
        $("#news_general").dataTable({
            "bSort": false,
            "bLengthChange": false
        });
    });

    function delete_news(news_id) {
        var r = confirm("ต้องการลบข่าวนี้ ใช่ หรือ ไม่ ...?");
        if (r == true) {
            var url = "index.php?r=news/delete_news";
            var data = {News_id: news_id};
            //alert(id);
            $.post(url, data, function (success) {
                window.location.reload();
            });
        }
    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bullhorn"></i> <label>ข่าวทั่วไป </label>
    </div>
    <div class="panel-body">
        <table class="table table-hover" id="news_general">
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
                $lib = new Lib();
                foreach ($news as $rs):
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $rs['News_Head']; ?></td>
                        <td><?php echo $lib->thaidate($rs['CreateNews_Date']); ?></td>
                        <td><?php echo $rs['collegian_name']; ?></td>
                        <td style="text-align: center;">
                            <!-- Single button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    จัดการ <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" style="text-align: left;">
                                    <li>
                                        <a href="index.php?r=news/edit_news&News_id=<?php echo $rs['News_id'] . '&type=1' ?>">
                                            <i class="fa fa-pencil"></i> แก้ไข
                                        </a>
                                    </li>
                                    <li>
                                        <a href="Javascript:delete_news('<?php echo $rs['News_id'] ?>')">
                                            <i class="fa fa-trash"></i> ลบ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?r=news/edit_images_news&news_id=<?php echo $rs['News_id'] ?>">
                                            <i class="fa fa-image"></i> จัดการรูปภาพ</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
