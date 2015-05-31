<script type="text/javascript">
    $(document).ready(function () {
        $("#view_collegian").dataTable({
        });
    });

    function delete_collegian(collegian_code) {
        var r = confirm("คุณต้องการลบข้อมูลนักศึกษา คนนี้ ใช่ หรือ ไม่ ... ?");
        if (r == true) {
            var url = "index.php?r=collegian/delete_collegian";
            var data = {collegian_code: collegian_code};
            $.post(url, data, function (success) {
                alert("ลบข้อมูลนักศึกษาแล้ว ...");
                window.location.reload();
            });
        }
    }

</script>

<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'รุ่นทั้งหมด' => array('Index'),
    'รุ่นที่ ' . $GenNumber
);
?>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">รายชื่อทั้งหมดรุ่น <?php echo $GenNumber ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered" id="view_collegian">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ - สกุล</th>
                    <th>ชื่อเข้าใช้งาน</th>
                    <th>รหัสผ่าน</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collegian as $rs): ?>
                    <tr>
                        <td><?php echo $rs['collegian_code']; ?></td>
                        <td><?php echo $rs['prename'] . $rs['collegian_name'] . ' ' . $rs['collegian_lname']; ?></td>
                        <td><?php echo $rs['collegian_username']; ?></td>
                        <td><?php echo $rs['collegian_password']; ?></td>
                        <td align="center">
                            <a href="<?php echo Yii::app()->createUrl('collegian/From_edit_collegian&collegian_code=' . $rs['collegian_code']) ?>">
                                <div class="btn btn-primary btn-sm">
                                    <i class="fa fa-photo"></i> แก้ไข</div>
                            </a>
                            <?php $collcode = $rs['collegian_code']; ?>
                            <a href="#" onclick="delete_collegian('<?php echo $collcode; ?>');">
                                <div class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> ลบ</div>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
