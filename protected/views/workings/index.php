<script>
    $(document).ready(function () {
        //CKEDITOR.replace( 'workings_detail' );
        CKEDITOR.replace('workings_detail', {
        //removePlugins: 'bidi,div,font,forms,flash,horizontalrule,iframe,justify,table,tabletools,smiley',
        removePlugins: 'bidi,forms,flash,iframe,div,table,tabletools',
        removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Image',
        //format_tags: 'p;h1;h2;h3;pre;address'
        });
    });
</script>

<script type="text/javascript">
    function save_workings() {
        var url = "index.php?r=frontend/workings/save_workings";
        var collegian_code = "<?php echo $collegian_code ?>";
        var workings_name = $("#workings_name").val();
        var workings_detail = CKEDITOR.instances.workings_detail.getData();
        alert(collegian_code);
        var data = {
            collegian_code: collegian_code,
            workings_name: workings_name,
            workings_detail: workings_detail
        };
        if (workings_name == '' || workings_detail == '') {
            alert("กรอกข้อมูลใน * ไม่ครบ ..");
            return false;
        }

        $.post(url, data, function (resule) {
            window.location.reload();
        });
    }

    function delete_workings(id) {
        var url = "index.php?r=frontend/workings/delete_workings";
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
        <h4><i class="fa fa-star" style=" color:#a77400;"></i> ผลงาน</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>ชื่อผลงาน *</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <input type="text" id="workings_name" class="form-control" placeholder="ชื่อผลงานของคุณคือ ... ?"/>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>รายละเอียด *</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <textarea class="ckeditor" id="workings_detail" name="workings_detail"></textarea>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <center>
            <div class="btn btn-primary btn-sm" onclick="save_workings();">
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
        foreach ($workings as $rs):
            ?>
            <tr>
                <td>
        <center><i class="fa fa-suitcase fa-5x" style=" color:#a77400;"></i></center>
    </td>
    <td>
        <b><?php echo $rs['workings_name']; ?></b><br/>
        <?php echo $rs['workings_detail']; ?>
    </td>
    <td style="text-align: right;">
        <a href="index.php?r=frontend/workings/edit&collegian_code=<?php echo $rs['collegian_code'] . '&id=' . $rs['id']; ?>">
            <div class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></div>
        </a>
        <div class="btn btn-default btn-sm" onclick="delete_working('<?php echo $rs['id'] ?>');"><i class="fa fa-trash"></i></div>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
