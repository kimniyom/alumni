<script type="text/javascript">
    $(document).ready(function () {
        $("#btn_edit").hide();
    });

    function save() {
        var url = "<?php echo Yii::app()->createUrl('backoffice/save_forgot') ?>";
        var question = $("#question").val();
        var data = {question: question};
        if (question == '') {
            $("#question").focus();
            return false;
        }

        $.post(url, data, function (success) {
            window.location.reload();
        });
    }

    function edit() {
        var url = "<?php echo Yii::app()->createUrl('backoffice/edit_forgot') ?>";
        var question = $("#question").val();
        var data = {id: $("#id").val(), question: question};
        if (question == '') {
            $("#question").focus();
            return false;
        }

        $.post(url, data, function (success) {
            window.location.reload();
        });
    }


    function set_text(id, question) {
        $("#btn_edit").show();
        $("#btn_save").hide();
        $("#id").val(id);
        $("#question").val(question);
    }
</script>

<input type="hidden" id="id" name="id"/>
<div class="well">
    <input type="text" class="form-control" id="question" name="question"/><br/>
    <div class="btn btn-default" id="btn_save" onclick="save();">บันทึก</div>
    <div class="btn btn-default" id="btn_edit" onclick="edit();">แก้ไข</div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        คำถามกรณีลืมรหัสผ่าน
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>คำถาม</th>
                    <th style=" text-align: center;">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($forgot as $rs): $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rs['question'] ?></td>
                        <td style=" text-align: center;">
                            <input type="checkbox" name="ck" id="ck" onclick="set_text('<?php echo $rs['id']; ?>', '<?php echo $rs['question'] ?>');"/>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

