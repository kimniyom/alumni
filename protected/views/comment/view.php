<script type="text/javascript">
    function popup_edit_comment(id, comment) {
        $("#comment_id").val(id);
        $("#comment").val(comment);
        $("#edit_comment").modal('show');
    }

    function edit_comment() {
        var url = "index.php?r=comment/edit_comment";
        var id = $("#comment_id").val();
        var comment = $("#comment").val();
        var data = {id: id, comment: comment};
        if (comment == '') {
            $("#comment").focus();
            return false;
        }

        $.post(url, data, function (success) {
            window.location.reload();
        });
    }

    function del_comment(id) {
        var r = confirm("คุณต้องการลบความคิดเห็น ใช่ หรือ ไม่ ...? ");
        if (r == true) {
            var url = "index.php?r=comment/delete_comment";
            var data = {id: id};
            $.post(url, data, function (success) {
                window.location.reload();
            });
        }
    }

</script>

<div class="modal fade" id="edit_comment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">แก้ไขความคิดเห็น</h4>
            </div>
            <div class="modal-body">
                <label>ความคิดเห็นที่ </label>
                <input type="text" id="comment_id" class="form-control input-sm" readonly="readonly"/>
                <label>
                    ความคิดเห็น
                </label>
                <textarea id="comment" name="comment" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i>ปิด</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="edit_comment();"><i class="fa fa-save"></i> แก้ไข</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Message. Default to the left -->
<?php
$collegian = new Collegian();
$lib = new Lib();
foreach ($comment as $rs) {
    if ($rs['owner_status'] == "U") {
        $img = $collegian->Get_img_profile($rs['collegian_code']);
    } else {
        $img = "bg_5.jpg";
    }
    ?>
    <div class="direct-chat-msg">
        <div class='direct-chat-info clearfix'>
            <span class='direct-chat-name pull-left'><?php echo $rs['name'] ?></span>
            <span class='direct-chat-timestamp pull-right'>
                <?php echo $lib->thaidate($rs['d_update']) ?>
            </span>
        </div><!-- /.direct-chat-info -->
        <img class="direct-chat-img" src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads/<?php echo $img; ?>" alt="message user image" /><!-- /.direct-chat-img -->
        <div class="direct-chat-text" style=" color: #000;">
            <?php echo $rs['comment'] ?>
            <span class='direct-chat-timestamp pull-right'>
                <?php if (Yii::app()->session['collegian_code'] == $rs['collegian_code'] || Yii::app()->session['user'] == "A") { ?>
                    <a href="javascript:popup_edit_comment('<?php echo $rs['id'] ?>','<?php echo $rs['comment'] ?>');"><i class="fa fa-edit"></i> แก้ไข</a>
                    <a href="javascript:del_comment('<?php echo $rs['id'] ?>');"><i class="fa fa-trash"></i> ลบ</a>
                <?php } ?>
            </span>
        </div><!-- /.direct-chat-text --> 
    </div><!-- /.direct-chat-msg -->
<?php } ?>