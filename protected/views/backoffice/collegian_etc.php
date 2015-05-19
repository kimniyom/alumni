<script type="text/javascript">
    $(document).ready(function () {
        $("#view_etc").dataTable({
        });
    });


    function confirm_data(id) {
        var url = "index.php?r=backoffice/active_etc";
        var data = {id: id};
        $.post(url, data, function (success) {
            window.location.reload();
        });
    }

</script>

<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'ข้อมูลอื่น ๆ นักศึกษา '
);
?>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">ข้อมูลอื่น ๆ นักศึกษา</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered" id="view_etc">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ข้อมูล</th>
                    <th>รหัสนักศึกษา</th>
                    <th>เจ้าของข้อมูล</th>
                    <th style="text-align: center;">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etc as $rs): ?>
                    <tr>
                        <td><?php echo $rs['id']; ?></td>
                        <td><?php echo $rs['etc']; ?></td>
                        <td><?php echo $rs['collegian_code']; ?></td>
                        <td><?php echo $rs['name'] . ' ' . $rs['lname']; ?></td>
                        <td align="center">
                            <?php
                            if ($rs['active'] == '1') {
                                echo "<p style='color:green;'><i class='fa fa-check'></i> อนุมัติแล้ว</p>";
                            } else {
                                ?>
                                <div class='btn btn-primary btn-sm' onclick="confirm_data('<?php echo $rs['id'] ?>');">อนุมัติ</div>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
