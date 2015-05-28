<script type="text/javascript">
    $(function () {
        $('#file_upload').uploadify({
            'swf ': '<?php echo Yii::app()->baseUrl; ?>/assets/uploadify/uploadify.swf',
            'uploader': 'index.php?r=news/uploadify&news_id=<?php echo $news_id; ?>',
            'fileSizeLimit': '600KB',
            'multi': true,
            'uploadLimit': 4,
            'onUploadSuccess': function (file, data, response) {
                window.location.reload();
                //window.location = "index.php?r=news/News_general_all";
            }
        });
    });

    function delete_img_new(id) {
        var url = "index.php?r=news/delete_img_new";
        var data = {News_Image_id: id};
        //alert(id);
        $.post(url, data, function (success) {
            window.location.reload();
        });
    }
</script>

<h3><i class="fa fa-image"></i> อัพโหลดรูปภาพข่าว</h3>
<div class="well" style=" border:#cccccc dashed 3px;padding: 50px;">
    <div class="row">
        <div class="col-sm-5">

        </div>
        <div class="col-sm-7">

            <font style=" font-size: 24px; color: #cccccc">อัพโหลดรูปที่นี้</font><br/><br/>
            <input type="file" name="file_upload" id="file_upload" />
        </div>
    </div>
</div>


<div class="container-fluid" style=" margin-top: 10px;">
    <?php foreach ($news as $newsAll) { ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="<?php echo Yii::app()->baseUrl; ?>/upload_news/<?php echo $newsAll['News_Image'] ?>" class="img-responsive"/>
                <div class="caption">
                    <div class="btn btn-default btn-sm" onclick="delete_img_new('<?php echo $newsAll['News_Image_id'] ?>');">
                        <i class="fa fa-trash"></i> ลบ
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</div>
