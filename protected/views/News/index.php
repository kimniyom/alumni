<script type="text/javascript">
    $(document).ready(function () {
        $("#News").dataTable(
        );
    });

</script>
<div class="panel panel-info">
    <div class="panel panel-heading">
        หน้าประกาศข่าว
    </div>
<div class="panel-body">
    <table class="table table-bordered" id="News">
    <thead>
        <tr>
            <th>News_ID</th>
            <th>News_Head</th>
            <th>News_Icon_id</th>
            <th>News_Catagory_id</th>
            <th>News_Group_id</th>
            <th>News_Owner</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($News as $rs): ?>
        <tr>
            <td><?php echo $rs['News_id'];?></td>
            <td><?php echo $rs['News_Head'];?></td>
            <td><?php echo $rs['News_Icon_id'];?></td>
            <td><?php echo $rs['News_Catagory_id'];?></td>
            <td><?php echo $rs['News_Group_id'];?></td>
            <td><?php echo $rs['News_Owner'];?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</div>
</div>