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
    function edit_aptitude() {
        var url = "index.php?r=frontend/aptitude/edit_aptitude";
        var collegian_code = "<?php echo $collegian_code ?>";
        var id = "<?php echo $aptitude['id'] ?>";
        var aptitude = $("#aptitude").val();
        //var workings_detail = CKEDITOR.instances.workings_detail.getData();
        //alert(collegian_code);
        var data = {
            id: id,
            collegian_code: collegian_code,
            aptitude: aptitude
        };
        if (aptitude == '') {
            alert("กรอกข้อมูลใน * ไม่ครบ ..");
            return false;
        }

        $.post(url, data, function (resule) {
            window.location.reload();
        });
    }

    function delete_aptitude(id) {
        var url = "index.php?r=frontend/aptitude/delete_aptitude";
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
        <h4><i class="fa fa-child" style=" color:#a77400;"></i> ความถนัด</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>ความถนัด *</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <textarea class="form-control" id="aptitude" name="aptitude" rows="5"><?php echo $aptitude['aptitude']; ?></textarea>
                <p style="color: #ff0033;">*ความถนัด เช่นกรเขียนโปรแกรม,การใช้งานโปรแกรมประยุกต์,ทาางด้านกีฬา</p>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <center>
            <div class="btn btn-primary btn-sm" onclick="edit_aptitude();">
                <i class="fa fa-save"></i> บันทึกการเปลี่ยนแปลง</div>
        </center>
    </div>
</div>

<table class="table" style="background: #FFF">
    <thead>
        <tr>
            <th colspan="3" style="text-align: right;">
                <a href="index.php?r=frontend/aptitude/index&collegian_code=<?php echo $collegian_code; ?>">
                    <i class="fa fa-plus"></i> เพิ่มความถนัด
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($aptitudeAll as $rs):
            ?>
            <tr>
                <td>
        <center><i class="fa fa-child fa-2x" style=" color:#a77400;"></i></center>
    </td>
    <td>
        <label><?php echo $rs['aptitude']; ?></label>
    </td>
    <td style="text-align: right;">
        <a href="index.php?r=frontend/aptitude/edit&collegian_code=<?php echo $rs['collegian_code'] . '&id=' . $rs['id']; ?>">
            <div class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></div>
        </a>
        <div class="btn btn-default btn-sm" onclick="delete_aptitude('<?php echo $rs['id'] ?>');"><i class="fa fa-trash"></i></div>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>


