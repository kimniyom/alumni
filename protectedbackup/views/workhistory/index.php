<script type="text/javascript">
    function save_work() {
        var url = "index.php?r=frontend/workhistory/save_work";
        var collegian_code = "<?php echo $collegian_code ?>";
        var company = $("#company").val();
        var company_tel = $("#company_tel").val();
        var begin = $("#begin").val();
        var end = $("#end").val();
        var position = $("#position").val();
        var data = {
            collegian_code: collegian_code,
            company: company,
            company_tel: company_tel,
            begin: begin,
            end: end,
            position: position
        };
        if (company == '' || begin == '' || position == '') {
            alert("กรอกข้อมูลใน * ไม่ครบ ..");
            return false;
        }

        $.post(url, data, function (resulr) {
            window.location.reload();
        });
    }

    function delete_work(id) {
        var url = "index.php?r=frontend/workhistory/delete_work";
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
        <h4><i class="fa fa-suitcase" style=" color:#a77400;"></i> ที่ทำงาน</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>บริษัท *</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <input type="text" id="company" class="form-control" placeholder="ที่ทำงานของคุณคือ ... ?"/>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>เบอร์โทรศัพท์บริษัท</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <input type="text" id="company_tel" class="form-control" onkeypress="CheckNum();"/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>ระยะเวลา</label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>เริ่มเข้าทำงาน *</label>
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
                <label>สิ้นสุด</label>
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
                <p></p><br/>
                <p>ถ้าปัจจุบันยังทำงานที่นี้ ไม่ต้องระบุ</p>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>ตำแหน่ง *</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <input type="text" id="position" class="form-control" placeholder="คุณทำงานที่นี้ในตำแหน่งใด ..?"/>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <center>
            <div class="btn btn-primary btn-sm" onclick="save_work();">
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
        foreach ($work as $rs):
            $lib = new Lib();
            ?>
            <tr>
                <td>
        <center><i class="fa fa-suitcase fa-5x" style=" color:#a77400;"></i></center>
    </td>
    <td>
        <b><?php echo $rs['company']; ?></b><br/>
        <?php echo $lib->thaidate($rs['begin']); ?> ถึง <?php
        if ($rs['end'] != '0000-00-00') {
            echo $lib->thaidate($rs['end']);
        } else {
            echo "ปัจจุบัน";
        }
        ?><br/>
        <?php echo $rs['position']; ?>
    </td>
    <td style="text-align: right;">
        <a href="index.php?r=frontend/workhistory/edit&collegian_code=<?php echo $rs['collegian_code'] . '&id=' . $rs['id']; ?>">
            <div class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></div>
        </a>
        <div class="btn btn-default btn-sm" onclick="delete_work('<?php echo $rs['id'] ?>');"><i class="fa fa-trash"></i></div>
    </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>