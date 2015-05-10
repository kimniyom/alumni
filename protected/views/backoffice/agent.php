<script type="text/javascript">
    $(document).ready(function () {
        $("#view_agent").dataTable({
        });
    });

</script>

<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'ตัวแทนบริษัท '
);
?>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">ตัวแทนบริษัท</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered" id="view_agent">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ - สกุล</th>
                    <th>ชื่อเข้าใช้งาน</th>
                    <th>รหัสผ่าน</th>
                    <th>บริษัท</th>
                    <th style="text-align: center;">สถานะ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agent as $rs): ?>
                    <tr>
                        <td><?php echo $rs['id']; ?></td>
                        <td><?php echo $rs['name'] . ' ' . $rs['lname']; ?></td>
                        <td><?php echo $rs['username']; ?></td>
                        <td><?php echo $rs['password']; ?></td>
                        <td><?php echo $rs['company']; ?></td>
                        <td align="center">
                            <?php
                            if ($rs['active'] == '1') {
                                echo "<p style='color:green;'>เปิดใช้งาน</p>";
                            } else {
                                echo "<p style='color:red;'>รอการยืนยัน</p>";
                            }
                            ?>
                        </td>
                        <td align="center">
                            <a href="<?php echo Yii::app()->createUrl('backoffice/detail_agent&id=' . $rs['id']) ?>">
                                <div class="btn btn-primary btn-sm">
                                    <i class="fa fa-photo"></i> รายละเอียด</div>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
