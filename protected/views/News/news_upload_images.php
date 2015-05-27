<script type="text/javascript">
    $(function () {
        $('#file_upload').uploadify({
            'swf ': '<?php echo Yii::app()->baseUrl; ?>/assets/uploadify/uploadify.swf',
            'uploader': 'index.php?r=news/uploadify&news_id=<?php echo $news_id; ?>',
            'fileSizeLimit': '100KB',
            'multi': true,
            'uploadLimit': 4,
            'onUploadSuccess': function (file, data, response) {
                window.location = "index.php?r=news/News_general_all";
            }
        });
    });
</script>

<?php echo $news_id; ?>

<input type="file" name="file_upload" id="file_upload" />

