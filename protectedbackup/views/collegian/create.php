<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js_store/js_create_collegian.js"></script>

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
    'รุ่นทั้งหมด' => array('Index'),
    'รุ่นที่ ' . $GenNumber,
);

$this->menu = array(
    array('label' => 'List Collegian', 'url' => array('index')),
    array('label' => 'Manage Collegian', 'url' => array('admin')),
);
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h4><i class="fa fa-plus"></i> เพิ่มทะเบียนนักศึกษา [ รุ่นที่ <?php echo $GenNumber; ?> ]</h4>
    </div>
    <div class="panel-body" style=" background: #f9f9f9;">
        <input type="hidden" id="GenNumber" value="<?php echo $GenNumber; ?>"/>
        <div class="form">
            <div class="row">
                <div class="col-sm-3">
                    <label>รหัสนักศึกษา(13 หลัก) *</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="collegian_code" name="collegian_code" 
                           max="13" required="required" class="form-control" onkeypress="CheckNum();"
                           placeholder="รหัสนักศึกษา 13 หลัก"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>คำนำหน้า</label>
                </div>
                <div class="col-sm-9">
                    <select id="shot_name" name="shot_name" class="form-control">
                        <?php foreach ($perfix as $pr): ?>
                            <option value="<?php echo $pr['id']; ?>"><?php echo $pr['shot_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>ชื่อ *</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="collegian_name" name="collegian_name" class="form-control" required="required"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>นามสกุล *</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="collegian_lname" name="collegian_lname" class="form-control" required="required"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>ชื่อเข้าใช้งาน *</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="collegian_username" name="collegian_username" class="form-control" required="required"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>รหัสผ่าน *</label>
                </div>
                <div class="col-sm-9">
                    <input type="password" id="collegian_password" name="collegian_password" class="form-control" required="required"/>
                </div>
            </div>
            <br/>
        </div><!-- form -->
    </div>
    <div class="panel-footer" style="text-align: right;">
        <button type="button" class="btn btn-primary" onclick="save_collegian();">
            <i class="fa fa-save"></i> บันทึกข้อมูล
        </button>
        <button type="button" class="btn btn-danger" onclick="Javascript:window.location.reload();">
            <i class="fa fa-remove"></i> ยกเลิก
        </button>
    </div>
</div>
