<script type="text/javascript">
    
    $(document).ready(function(){
        var url = "<?php echo Yii::app()->createUrl('droupdown/tambon') ?>";
        var data = {ampur_id: $("#ampur_code").val()};

        $.post(url, data, function (result) {
            $("#tambon").html(result);
        });
    });
    
    function chang_tambon(ampur_id){
        var url = "<?php echo Yii::app()->createUrl('droupdown/tambon') ?>";
        var data = {ampur_id: ampur_id};

        $.post(url, data, function (result) {
            $("#tambon").html(result);
        });
    }
</script>

<select id="ampur_code" name="ampur_code" onchange="chang_tambon(this.value);" class="form-control">
    <option value="">== ทั้งหมด ==</option>
    <?php foreach ($ampur as $am) { ?>
        <option value="<?php echo $am['ampur_id']; ?>"><?php echo $am['ampur_name']; ?></option>
    <?php } ?>
</select>

