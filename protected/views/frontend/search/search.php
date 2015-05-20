<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'หน้าแรก' => array('site/Index'),
    'ค้นหาข้อมูลนักศึกษา',
);
?>
<div class="box box-warning">
    <div class="box-header with-border">
        ค้นหาข้อมูล
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4">
                <label>จังหวัด *</label>
            </div>
            <div class="col-sm-8">
                <?php
                $sql_changwat = "SELECT changwat_id,changwat_name FROM changwat";
                $r_changwat = Yii::app()->db->createCommand($sql_changwat)->queryAll();
                ?>

                <select id="changwat_code" class="form-control input-sm" name="changwat_code">
                    <option value="">==ยังไม่ได้เลือกจังหวัด==</option>
                    <?php foreach ($r_changwat as $ch) { ?>
                        <option value="<?php echo $ch['changwat_id']; ?>"><?php echo $ch['changwat_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-sm-4">
                <label>การศึกษา *</label>
            </div>
            <div class="col-sm-8">
                <select id="education" class="form-control input-sm" name="education">
                    <option value="">==ยังไม่ได้เลือกiระดับการศึกษา==</option>
                    <?php foreach ($education as $rs) { ?>
                        <option value="<?php echo $rs['EduID']; ?>"><?php echo $rs['EduName']; ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>

    </div>
</div>