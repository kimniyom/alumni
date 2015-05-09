<script type="text/javascript">
    function ampur_chang(changwat_id) {
        var url = "<?php echo Yii::app()->createUrl('droupdown/ampur') ?>";
        var data = {changwat_id: changwat_id};
        $.post(url, data, function (result) {
            $("#ampur").html(result);
        });
    }
</script>

<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'หน้าแรก' => array('site/Index'),
    'ค้นหาข้อมูลตามที่อยู่',
);
?>
<div class="box box-warning">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-sm-1">
                <label>จังหวัด *</label>
            </div>
            <div class="col-sm-3">
                <?php
                $sql_changwat = "SELECT changwat_id,changwat_name FROM changwat";
                $r_changwat = Yii::app()->db->createCommand($sql_changwat)->queryAll();
                ?>

                <select id="changwat_code" class="form-control" name="changwat_code" onchange="ampur_chang(this.value);">
                    <option value="">==ยังไม่ได้เลือกจังหวัด==</option>
                    <?php foreach ($r_changwat as $ch) { ?>
                        <option value="<?php echo $ch['changwat_id']; ?>"><?php echo $ch['changwat_name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-sm-1">
                <label>อำเภอ *</label>
            </div>
            <div class="col-sm-3" id="ampur">
                <select id="ampur_code" name="ampur_code" class="form-control">
                    <option value="">== ยังไม่ได้เลือกอำเภอ ==</option>
                </select>
            </div>

            <div class="col-sm-1">
                <label>ตำบล *</label>
            </div>
            <div class="col-sm-3" id="tambon">
                <select id="tambon_code" name="tambon_code" class="form-control">
                    <option value="">== ยังไม่ได้เลือกตำบล ==</option>
                </select>
            </div>
        </div>
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        
    </div>
</div>