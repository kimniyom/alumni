<!--
        Uploadify
-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/assets/uploadify/uploadify.css">
<script src="<?php echo Yii::app()->baseUrl; ?>/assets/uploadify/jquery.uploadify-3.1.js"></script>
<script type="text/javascript">
    $(function () {
        $('#file_upload').uploadify({
            'swf ': '<?php echo Yii::app()->baseUrl; ?>/assets/uploadify/uploadify.swf',
            'uploader': 'index.php?r=banner/uploadbanner',
            'fileSizeLimit': '600KB',
            'fileTypeExts': '*.gif; *.jpg; *.png',
            'multi': true,
            //'uploadLimit': 4,
            'onUploadSuccess': function (file, data, response) {
                window.location.reload();
            }
        });
    });
</script>

<h3><i class="fa fa-image"></i> อัพโหลดแบนเนอร์</h3>
<div class="well" style=" border:#cccccc dashed 3px;padding: 50px;">
    <div class="row">
        <div class="col-sm-5">

        </div>
        <div class="col-sm-7">

            <font style=" font-size: 24px; color: #cccccc">อัพโหลดรูปที่นี้</font><br/><br/>
            <input type="file" name="file_upload" id="file_upload" />

            *ขนาดแบนเนอร์ 980 x 300 พิกเซล
        </div>
    </div>
</div>
<div class="well">
    <table class="table table-striped" id="banner">
        <thead>
            <tr>
                <th>รหัส</th>
                <th>แบนเนอร์</th>
                <th style="text-align: center;">ตัวเลือก</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($banner as $rs): $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><img src="<?php echo Yii::app()->baseUrl; ?>/upload_banner/<?php echo $rs['images'] ?>" height="50"/></td>
                    <td style=" text-align: center;">
                        <div class="btn btn-danger" onclick="delbanner('<?php echo $rs['id'] ?>');">
                            <span class=" glyphicon glyphicon-trash"></span> ลบ
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    function delbanner(id){
        var r = confirm("คุณแน่ใจหรือไม่ ...?");
        if(r == true){
            var url = "<?php echo Yii::app()->createUrl('banner/del_banner')?>";
            var data = {id: id};
            $.post(url,data,function(success){
                window.location.reload();
            });
        }
    }
</script>
