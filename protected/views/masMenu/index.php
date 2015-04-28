<script type="text/javascript">
    $(document).ready(function () {
        $("#menu").dataTable({
        });
    });
    // Function Dialog 

    function popup_dialog_add() {

        $("#dialog_add").modal();
    }

    function popup_dialog_edit(menu_id, menu_name, menu_url) {
        $("#menu_id").val(menu_id);
        $("#e_menu_name").val(menu_name);
        $("#e_menu_url").val(menu_url);
        $("#dialog_edit").modal();
    }


    function save_masmenu() {
        $("#form_add").submit(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('masmenu/save_menu') ?>",
                data: $("#form_add").serialize(),
                success: function (data) {
                    window.location.reload();
                }
            });
        });
    }

    function edit_masmenu() {
        var url = "<?php echo Yii::app()->createUrl('masmenu/edit_menu') ?>";
        var data = {
            menu_id: $("#menu_id").val(),
            menu_name: $("#e_menu_name").val(),
            menu_url: $("#e_menu_url").val()
        };
        
        
        $.post(url, data, function (success) {
            window.location.reload();
        });
    }

    function delete_menu(menu_id) {
        var r = confirm("คุณต้องการลบเมนูนี้ ใช่ หรือ ไม่!");
        var data = {menu_id: menu_id};
        if (r == true) {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('masmenu/del_menu') ?>",
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



<!-- 
    form dialog add
-->
<div class="modal fade" id="dialog_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Menu</h4>
            </div>
            <div class="modal-body">
                <label>MenuId</label>
                <input type="text" id="menu_id" readonly="readonly" class="form-control"/>
                <label>MenuName</label>
                <input type="text" id="e_menu_name" name="e_menu_name" required="required" class="form-control"/>
                <label>MenuUrl</label>
                <input type="text" id="e_menu_url" name="e_menu_url" required="required" class="form-control"/>
                <p>*Controller/Function</p>
                <div style="text-align: right;">
                    <button type="button" class="btn btn-primary" onclick="edit_masmenu();">Save</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="close btn btn-default" data-dismiss="modal" aria-label="Close"><i class="fa fa-remove"></i> Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--
    Content Body Menu 
-->

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $header; ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered" id="menu">
            <thead>
                <tr>
                    <th>MenuId</th>
                    <th>MenuName</th>
                    <th>Url</th>
                    <th>โดย</th>
                    <th style=" text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menu as $menus): ?>
                    <tr>
                        <td><?php echo $menus['menu_id']; ?></td>
                        <td><?php echo $menus['menu_name']; ?></td>
                        <td><?php echo $menus['menu_url']; ?></td>
                        <td><?php echo $menus['use_name'] . ' ' . $menus['use_lname']; ?></td>
                        <td style=" text-align: center;">
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-info" 
                                        onclick="popup_dialog_edit('<?php echo $menus['menu_id']; ?>', '<?php echo $menus['menu_name']; ?>', '<?php echo $menus['menu_url']; ?>');">
                                    <i class="fa fa-edit"></i> แก้ไข</button>
                                <button type="button" class="btn btn-danger" onclick="delete_menu('<?php echo $menus['menu_id']; ?>');"><i class="fa fa-trash"></i> ลบ</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
