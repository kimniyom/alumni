<script type="text/javascript">
    $(document).ready(function () {
        $("#gen").dataTable({
        });
    });

    function popup_dialog_add() {

        $("#dialog_add_edit").modal();
    }

    function gen_save() {
        $("#dialog_add_edit").modal("hide");
        $("#form_add").submit(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('Generation/Savegen') ?>",
                data: $("#form_add").serialize(),
                success: function (data) {
                    
                }
            });
        });
    }
</script>
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $header; ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" onclick="popup_dialog_add();"><i class="fa fa-plus"></i> เพิ่มรุ่น ปี</button>
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered" id="gen">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ปีที่สำเร็จการศึกษา</th>
                    <th>รุ่น</th>
                    <th style=" text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($item as $ds): ?>
                    <tr>
                        <td></td>
                        <td><?php echo $ds['GenYear']; ?></td>
                        <td><?php echo $ds['GenNumber']; ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

<div class="modal fade" id="dialog_add_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Generation</h4>
            </div>
            <form id="form_add" name="form_add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="genyear">ปีที่สำเร็จการศึกษา</label>
                        <input type="text" class="form-control" id="genyear" name="genyear" required="required">
                    </div>
                    <div class="form-group">
                        <label for="gennum">รุ่น</label>
                        <input type="text" class="form-control" id="gennum" name="gennum" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="gen_save()"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="fa fa-remove"></i> Close</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->