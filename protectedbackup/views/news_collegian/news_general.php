<script type="text/javascript">
    $(document).ready(function(){
       $("#news_general").dataTable(); 
    });
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bullhorn"></i> ข่าวทั่วไป 
        <a href="index.php?r=news/Create_News" style=" float: right;"><i class="fa fa-plus"></i> ประกาศข่าว</a>
    </div>
    <div class="panel-body">
        <table class="table table-bordered" id="news_general">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>หัวข้อ</th>
                    <th>วันที่</th>
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
                        <td><?php echo $rs['News_Detail']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
