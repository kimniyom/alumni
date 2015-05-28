<script type="text/javascript">
    function save_learning() {
        var url = "index.php?r=frontend/learninghistory/save_learning";
        var collegian_code = "<?php echo $collegian_code ?>";
        var school = $("#school").val();
        var EduId = $("#education").val();
        var faculty = $("#faculty").val();
        var begin = $("#begin").val();
        var end = $("#end").val();
        var gpa = $("#gpa").val();

        var data = {
            collegian_code: collegian_code,
            school: school,
            EduId: EduId,
            faculty: faculty,
            begin: begin,
            end: end,
            gpa: gpa
        };
        if (school == '' || education == '' || faculty == '' || begin == '' || end == '' || gpa == '') {
            alert("กรอกข้อมูลใน * ไม่ครบ ..");
            return false;
        }

        $.post(url, data, function (resulr) {
            window.location.reload();
        });
    }

    function delete_learning(id) {
        var url = "index.php?r=frontend/learninghistory/delete_learaning";
        var data = {id: id};
        var r = confirm("คุณแน่ใจหรือไม่ที่จะลบ ...!");
        if (r == true) {
            $.post(url, data, function (resul) {
                window.location.reload();
            });
        }
    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><i class="fa fa-mortar-board" style="color: #0063dc;"></i> การศึกษา</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>สถาบัน*</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <input type="text" id="school" class="form-control" placeholder="คุณจบมาจากที่ไหน ... ?"/>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>ระดับการศึกษา *</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <select id="education" class="form-control">
                    <option value="">== ไม่ได้เลือกระดับการศึกษา ==</option>
                    <?php foreach ($education as $edu): ?>
                        <option value="<?php echo $edu['EduID']; ?>"><?php echo $edu['EduName']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>คณะ / สาขา *</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <input type="text" id="faculty" class="form-control"  placeholder="คุณจบมาจากคณะอะไร ... ?"/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>ระยะเวลา *</label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>เริ่ม *</label>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'begin',
                    'id' => 'begin',
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'showAnim' => 'fadeIn',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'dayNamesMin' => array('อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'),
                        'monthNamesShort' => array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม',
                            'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'),
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:35px;',
                        'class' => 'form-control'
                    ),
                ));
                ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">

            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>สิ้นสุด *</label>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'end',
                    'id' => 'end',
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'showAnim' => 'fadeIn',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'dayNamesMin' => array('อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'),
                        'monthNamesShort' => array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม',
                            'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'),
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:35px;',
                        'class' => 'form-control'
                    ),
                ));
                ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">

            </div>
        </div><br/>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>เกรดเฉลี่ยสะสม *</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <input type="text" id="gpa" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <center>
            <div class="btn btn-primary btn-sm" onclick="save_learning();">
                <i class="fa fa-save"></i> บันทึกการเปลี่ยนแปลง</div>
        </center>
    </div>
</div>

<table class="table" style="background: #FFF">
    <thead>
        <tr>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($learning as $rs):
            $lib = new Lib();
            ?>
            <tr>
                <td>
        <center>
            <i class="fa fa-mortar-board fa-5x" style="color: #a77400;"></i>
        </center>
    </td>
    <td>
        <label>สถาบัน : </label>
        <b><?php echo $rs['school']; ?></b><br/>
        <label>ระดับ : </label><?php echo $rs['EduName']; ?><br/>
        <label>คณะ / สาขา : </label><?php echo $rs['faculty']; ?><br/>
        <label>ระยะเวลา : </label> <?php echo $lib->thaidate($rs['begin']); ?> ถึง <?php
        if ($rs['end'] != '0000-00-00') {
            echo $lib->thaidate($rs['end']);
        } else {
            echo "ปัจจุบัน";
        }
        ?><br/>
        <label>เกรดเฉลี่ย : </label> <?php echo $rs['gpa']; ?>
    </td>
    <td style="text-align: right;">
        <a href="index.php?r=frontend/learninghistory/edit&collegian_code=<?php echo $rs['collegian_code'] . '&id=' . $rs['id']; ?>">
            <div class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></div>
        </a>
        <div class="btn btn-default btn-sm" onclick="delete_learning('<?php echo $rs['id'] ?>');"><i class="fa fa-trash"></i></div>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>