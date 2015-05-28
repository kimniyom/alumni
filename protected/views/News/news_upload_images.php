<script type="text/javascript">
    $(function () {
        $('#file_upload').uploadify({
            'swf ': '<?php echo Yii::app()->baseUrl; ?>/assets/uploadify/uploadify.swf',
            'uploader': 'index.php?r=news/uploadify&news_id=<?php echo $news_id; ?>',
            'fileSizeLimit': '600KB',
            'multi': true,
            'uploadLimit': 4,
            'onUploadSuccess': function (file, data, response) {
                window.location = "index.php?r=news/News_general_all";
            }
        });
    });
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
