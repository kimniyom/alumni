<script type="text/javascript">
    function Edit() {
        $("#form_education").submit(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('Education/Save_edit') ?>",
                data: $("#form_education").serialize(),
                success: function (data) {
                    window.location.reload();
                }
            });
        });
    }
</script>

<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'ระดับการศึกษา' => array('Index'),
    $education['EduName']
);
?>

<div class="box box-info">
    <form id="form_education" name="form_education">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-edit"></i> <?php echo $header; ?>
            </div>
            <div class="panel-body">
                <div class="modal-body">
                    <div class="form-group">
                        <label>รหัส</label>
                        <input type="text" class="form-control" id="EduID" name="EduID" required="required" readonly="readonly" value="<?php echo $education['EduID'] ?>">
                    </div>
                    <div class="form-group">
                        <label>ระดับการศึกษา</label>
                        <input type="text" class="form-control" id="EduName" name="EduName" required="required" value="<?php echo $education['EduName'] ?>">
                    </div>
                </div> 
            </div>
            <div class="panel-footer" style="text-align: right;">
                <button type="submit" id="btnsave" class="btn btn-primary" onclick="Edit()"><i class="fa fa-save"></i> บันทึก</button>
            </div>
        </div>
    </form>
</div>