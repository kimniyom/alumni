
<script type="text/javascript">
    function Search_param() {
        var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
        $("#result_search").html(loading);
        var changwat = $("#changwat").val();
        var education = $("#education").val();
        var workhistory = $("#workhistory").val();
        var workings;
        var aptitude;
        var etc;

        $("#workings").prop("checked", function (i, val) {
            if (val == true) {
                workings = 1;
            } else {
                workings = "";
            }
        });

        $("#aptitude").prop("checked", function (i, val) {
            if (val == true) {
                aptitude = 1;
            } else {
                aptitude = "";
            }
        });

        $("#etc").prop("checked", function (i, val) {
            if (val == true) {
                etc = 1;
            } else {
                etc = "";
            }
        });



        //alert(workings + " - " + aptitude + " - " + etc + "-" + changwat + "-" + education + " - " + workhistory);
        var url = "index.php?r=frontend/Search/SearchAll";
        var data = {
            changwat: changwat,
            education: education,
            workinghistory: workhistory,
            workings: workings,
            aptitude: aptitude,
            etc: etc

        };

        $.post(url, data, function (result) {
            $("#result_search").html(result);
        });

    }
</script>

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
        <label><i class="fa fa-search"></i> ค้นหาข้อมูล</label>
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4">
                <label>จังหวัด </label>
            </div>
            <div class="col-sm-8">
                <?php
                $sql_changwat = "SELECT changwat_id,changwat_name FROM changwat";
                $r_changwat = Yii::app()->db->createCommand($sql_changwat)->queryAll();
                ?>

                <select id="changwat" class="form-control input-sm" name="changwat_code">
                    <option value="">==ยังไม่ได้เลือกจังหวัด==</option>
                    <?php foreach ($r_changwat as $ch) { ?>
                        <option value="<?php echo $ch['changwat_id']; ?>"><?php echo $ch['changwat_id'] . ' ' . $ch['changwat_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-sm-4">
                <label>วุฒิการศึกษา </label>
            </div>
            <div class="col-sm-8">
                <select id="education" class="form-control input-sm" name="education">
                    <option value="">==ยังไม่ได้เลือกระดับการศึกษา==</option>
                    <?php foreach ($education as $rs) { ?>
                        <option value="<?php echo $rs['EduID']; ?>"><?php echo $rs['EduName']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-sm-4">
                <label>ประวัติการทำงาน</label>
            </div>
            <div class="col-sm-8">
                <select id="workhistory" class="form-control input-sm" name="workhistory">
                    <option value="">== ยังไม่ได้เลือก ==</option>
                    <option value="0">ยังไม่มีประสบการณ์</option>
                    <option value="1">1 - 3 ปี</option>
                    <option value="2">3 - 5 ปี</option>
                    <option value="3">มากกว่า 5 ปี</option>
                </select>
            </div>
        </div>

        <div class="row" style="text-align: center; background: #efefef; margin: 5px 1px;">
            <div class="col-sm-4"> 
                <div class="checkbox checkbox-success">
                    <input id="workings" class="styled" type="checkbox">
                    <label for="checkbox2">
                        ผลงาน
                    </label>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="checkbox checkbox-success">
                    <input type="checkbox" id="aptitude"> 
                    <label>
                        ความถนัด
                    </label>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="checkbox checkbox-success">
                    <input type="checkbox" id="etc">
                    <label> อื่น ๆ</label>
                </div>
            </div>
        </div>

        <div class="box-footer" style="text-align: center;">
            <div class="btn btn-primary" onclick="Search_param();"><i class="fa fa-search"></i> ค้นหา</div>
        </div>

        <hr>

        <div id="result_search"></div>

    </div>