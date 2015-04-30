<script type="text/javascript">
    $(document).ready(function () {
        $("#gen").dataTable({
        });
    });

    function popup_gen_add() {

        $("#gen_add_edit").modal();
        $("#btnedit").hide();
    }

    function gen_save() {
        $("#gen_add_edit").modal("hide");
        $("#form_gen").submit(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('Generation/Savegen') ?>",
                data: $("#form_gen").serialize(),
                success: function (data) {
                    window.location.reload();
                }
            });
        });
    }
    
    function popup_gen_edit(genid,genyear,gennum){
        $("#genid").val(genid);
        $("#genyear").val(genyear);
        $("#gennum").val(gennum);
        $("#gen_add_edit").modal("show");
        $("#btnsave").hide();
        $("#btnedit").show();
    }
    function gen_edit(){
        var url = "<?php echo Yii::app()->createUrl('Generation/Editgen') ?>";
        var data = {
            genid: $("#genid").val(),
            genyear: $("#genyear").val(),
            gennum: $("#gennum").val()
        };


        $.post(url, data, function (success) {
            window.location.reload();
        });
    }
    
    function gen_delete(genid){
        var cf = confirm("คุณต้องการลบรุ่น ปี นี้ ใช่ หรือ ไม่!");
        var data = {genid: genid};
        if (cf == true) {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('Generation/Deletegen') ?>",
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
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $header; ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" onclick="popup_gen_add();"><i class="fa fa-plus"></i> เพิ่มรุ่น ปี</button>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($item as $ds): ?>
                    <tr>
                        <td></td>
                        <td><?php echo $ds['GenYear']; ?></td>
                        <td><?php echo $ds['GenNumber']; ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" style="margin-right: 5px;" onclick="popup_gen_edit('<?php echo $ds['GenID']; ?>','<?php echo $ds['GenYear']; ?>','<?php echo $ds['GenNumber']; ?>')">แก้ไข</button>
                            <button class="btn btn-danger btn-sm" onclick="gen_delete('<?php echo $ds['GenID']; ?>')">ลบ</button>
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
                <h4 class="modal-title">Add & Edit Generation</h4>
            </div>
            <form id="form_gen" name="form_gen">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="genyear">ID</label>
                        <input type="text" class="form-control" id="genid" name="genid" readonly="readonly" required="required">
                    </div>
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
                    <button type="submit" id="btnsave" class="btn btn-primary" onclick="gen_save()"><i class="fa fa-save"></i> Save</button>
                    <button type="submit" id="btnedit" class="btn btn-primary" onclick="gen_edit()"><i class="fa fa-edit"></i> แก้ไข</button>
                    <button type="button" id="btnclose" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="fa fa-remove"></i> Close</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->