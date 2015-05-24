<script type="text/javascript">
    $(document).ready(function () {
        $("#gen").dataTable({
        });
    });

    function popup_gen_add() {
        $("#gen_add_edit").modal();
    }

    function gen_save() {
        $("#form_education").submit(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('Education/Save_education') ?>",
                data: $("#form_education").serialize(),
                success: function (data) {
                    $("#gen_add_edit").modal("hide");
                    window.location.reload();
                }
            });
        });
    }

    function gen_delete(EduID) {
        var cf = confirm("คุณต้องการลบข้อมูล นี้ ใช่ หรือ ไม่!");
        var data = {EduID: EduID};
        if (cf == true) {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('Education/Delet_education') ?>",
                data: data,
                success: function (data) {
                    window.location.reload();
                }
            });
        } else {
            return false;
        }
    }

</script>

<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'ระดับการศึกษา' => array('Index')
);
?>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $header; ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" onclick="popup_gen_add();"><i class="fa fa-plus"></i> เพิ่มระดับการศึกษา</button>
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered" id="gen">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ระดับการศึกษา</th>
                    <th style="text-align: center;">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($item as $ds):
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $ds['EduName']; ?></td>
                        <td style="text-align: center;">
                            <a href="index.php?r=Education/edit&EduID=<?php echo $ds['EduID']; ?>">
                                <button class="btn btn-primary btn-sm" style="margin-right: 5px;">แก้ไข</button>
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="gen_delete('<?php echo $ds['EduID']; ?>')">ลบ</button>
                        </td>
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

<div class="modal fade" id="gen_add_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">เพิ่มข้อมูลระดับการศึกษา</h4>
            </div>
            <form id="form_education" name="form_education">
                <div class="modal-body">
                    <div class="form-group">
                        <label>ระดับการศึกษา</label>
                        <input type="text" class="form-control" id="EduName" name="EduName" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnsave" class="btn btn-primary" onclick="gen_save()"><i class="fa fa-save"></i> บันทึก</button>
                    <button type="button" id="btnclose" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="fa fa-remove"></i> ปิด</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 