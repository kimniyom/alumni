<script type="text/javascript">
    function reply() {
        $("#reply").modal();
    }

    function send_post() {
        var url = "index.php?r=frontend/posts/reply";
        var msg = CKEDITOR.instances.detail.getData();
        var receiver_code = "<?php echo $post['sender_code'] ?>";
        var receiver_status = "<?php echo $post['sender_status'] ?>";
        var upper = "<?php echo $post['post_id'] ?>";
        if (msg == "") {
            alert("กรุณากรอกข้อความ ...");
            return false;
        }

        var data = {
            receiver_code: receiver_code,
            receiver_status: receiver_status,
            upper: upper,
            detail: msg
        };

        $.post(url, data, function (success) {
            alert("ส่งข้อความของท่านแล้ว ...");
            window.location.reload();
        });

    }
</script>

<script>
    $(document).ready(function () {
        //CKEDITOR.replace( 'workings_detail' );
        CKEDITOR.replace('detail', {
            //removePlugins: 'bidi,div,font,forms,flash,horizontalrule,iframe,justify,table,tabletools,smiley,link',
            //removePlugins: 'bidi,forms,flash,iframe,div,table,tabletools',
            //removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Image'
            //format_tags: 'p;h1;h2;h3;pre;address'
            toolbarGroups: [
                //{name: 'document', groups: ['mode', 'document']}, // Displays document group with its two subgroups.
                //{name: 'clipboard', groups: ['clipboard', 'undo']}, // Group's name will be used to create voice label.
                '/', // Line break - next group will be placed in new line.
                // {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                {name: 'basicstyles', groups: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']},
                {name: 'paragraph', groups: ['list', 'indent', 'align']},
                {name: 'styles', groups: ['Styles', 'Format', 'Font', 'FontSize']},
                {name: 'colors', groups: ['TextColor', 'BGColor']}
                //{name: 'links'}
            ]
        });
    });
</script>

<div class="modal fade" id="reply">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <i class="fa fa-envelope-o"></i> ตอบข้อความของ 
                    (<i class="fa fa-user"></i> <?php echo $post['name'] . ' ' . $post['lname'] ?>)
                </h4>
            </div>
            <div class="modal-body">
                <label>ตอบหัวข้อ</label>
                <input type="text" id="title" class="form-control input-sm" value="<?php echo $post['title'] ?>" readonly="readonly"/><br/>
                <textarea id="detail" rows="3"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" onclick="send_post();"><i class="fa fa-send-o"></i> ส่งข้อความ</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<?php $lib = new Lib(); ?>

<?php if ($upper != 0) { ?>
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">อ้างจากข้อความ หัวข้อ :: <?php echo $upper['title'] ?> </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php echo $upper['detail'] ?>
        </div>
        <div class="box-footer">
            <i class="fa fa-user"></i> <b>คุณ 
                <i class="fa fa-mail-forward"></i> ถึง <?php echo $post['name'] . ' ' . $post['lname'] ?><br/>
                <i class="fa fa-clock-o"></i><?php echo $lib->thaidate($upper['d_update']) ?>
        </div>
    </div>
<?php } ?>

<div class="box box-danger">
    <div class="box-header with-border">
        <i class="fa fa-envelope-o"></i> ข้อความจาก <i class="fa fa-user"></i> <b><?php echo $post['name'] . ' ' . $post['lname'] ?></b>
        <i class="fa fa-mail-forward"></i> ถึงคุณ ...
        <div class="box-tools pull-right">
            <i class="fa fa-clock-o"></i> <?php echo $lib->thaidate($post['d_update']) ?>
        </div>
    </div>
    <div class="box-body padding">
        <?php if ($upper == 0) { ?>
            <h3 style="margin-top: 10px; font-weight: bold; color: #993300;">หัวข้อ :: <?php echo $post['title']; ?></h3>
            <hr>
        <?php } ?>
        <?php echo $post['detail']; ?>
    </div>
    <?php if ($upper == 0) { ?>
        <div class="box-footer">
            <div class="btn btn-default btn-sm" onclick="reply();"><i class="fa  fa-mail-reply"></i> ตอบกลับ</div>
        </div>
    <?php } ?>
</div>
