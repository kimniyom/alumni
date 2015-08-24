<script>
    $(document).ready(function () {
        //CKEDITOR.replace( 'workings_detail' );
        //CKEDITOR.replace('workings_detail', {
        //removePlugins: 'bidi,div,font,forms,flash,horizontalrule,iframe,justify,table,tabletools,smiley',
        //removePlugins: 'bidi,forms,flash,iframe,div,table,tabletools',
        //removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Image',
        //format_tags: 'p;h1;h2;h3;pre;address'
        //});
    });
</script>

<script type="text/javascript">
    function save_collegian_etc() {
        var url = "index.php?r=frontend/collegian_etc/save_collegian_etc";
        var collegian_code = "<?php echo $collegian_code ?>";
        var etc = $("#etc").val();
        //var workings_detail = CKEDITOR.instances.workings_detail.getData();
        //alert(collegian_code);
        var data = {
            collegian_code: collegian_code,
            etc: etc
        };
        if (etc == '') {
            alert("กรอกข้อมูลใน * ไม่ครบ ..");
            return false;
        }

        $.post(url, data, function (resule) {
            window.location.reload();
        });
    }

    function delete_collegian_etc(id) {
        var url = "index.php?r=frontend/collegian_etc/delete_collegian_etc";
        var data = {id: id};
        var r = confirm("คุณแน่ใจหรือไม่ที่จะลบ ...!");
        if (r == true) {
            $.post(url, data, function (resul) {
                window.location.reload();
            });
        }
    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><i class="fa fa-child" style=" color:#a77400;"></i> ข้อมูลอื่น ๆ</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>ข้อมูลอื่น ๆ *</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <textarea class="form-control" id="etc" name="etc" rows="5"></textarea>
                <p style="color: #ff0033;">*เช่น การประกวดร้องเพลงที่ได้รางวัลมา</p>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <center>
            <div class="btn btn-primary btn-sm" onclick="save_collegian_etc();">
                <i class="fa fa-save"></i> บันทึกการเปลี่ยนแปลง</div>
        </center>
    </div>
</div>

<table class="table" style="background: #FFF">
    <thead>
        <tr>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($etc as $rs):
            ?>
            <tr>
                <td>
        <center><i class="fa fa-child fa-2x" style=" color:#a77400;"></i></center>
    </td>
    <td>
        <label><?php echo $rs['etc']; ?></label>
    </td>
    <td style="text-align: right;">
        <a href="index.php?r=frontend/collegian_etc/edit&collegian_code=<?php echo $rs['collegian_code'] . '&id=' . $rs['id']; ?>">
            <div class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></div>
        </a>
        <div class="btn btn-default btn-sm" onclick="delete_collegian_etc('<?php echo $rs['id'] ?>');"><i class="fa fa-trash"></i></div>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
