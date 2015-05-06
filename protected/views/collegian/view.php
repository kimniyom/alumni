<script type="text/javascript">
    $(document).ready(function () {
        $("#view_collegian").dataTable({
        });
    });

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
                    <th>วันเกิด</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>อีเมลล์</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collegian as $rs): ?>
                    <tr>
                        <td><?php echo $rs['collegian_code']; ?></td>
                        <td><?php echo $rs['prename'].$rs['collegian_name'] . ' ' . $rs['collegian_lname']; ?></td>
                        <td><?php echo $rs['collegian_birth']; ?></td>
                        <td><?php echo $rs['collegian_tel']; ?></td>
                        <td><?php echo $rs['collegian_email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
