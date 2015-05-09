<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js_store/js_create_collegian.js"></script>

<script type="text/javascript">
    function ampur_chang(changwat_id) {
        var url = "<?php echo Yii::app()->createUrl('droupdown/ampur') ?>";
        var data = {changwat_id: changwat_id};
        $.post(url, data, function (result) {
            $("#ampur").html(result);
        });
    }
<?php if (!empty($detail['changwat_code'])) { ?>
        ampur_chang(<?php echo $detail['changwat_code'] ?>);
<?php } ?>
</script>



<div class="panel panel-info">
    <div class="panel-heading">
        <h4><i class="fa fa-plus"></i> แก้ไขข้อมูลนักศึกษา</h4>
    </div>
    <div class="panel-body" style=" background: #f9f9f9;">
        <div class="form">
            <div class="row">
                <div class="col-sm-3">
                    <label>รหัสนักศึกษา(13 หลัก) *</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="collegian_code" name="collegian_code" 
                           max="13" required="required" class="form-control" onkeypress="CheckNum();"
                           placeholder="รหัสนักศึกษา 13 หลัก" value="<?php echo $detail['collegian_code']; ?>" readonly="readonly"/>
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
                            <option value="<?php echo $pr['id']; ?>"
                            <?php
                            if ($detail['shot_name'] == $pr['id']) {
                                echo "selected";
                            }
                            ?>><?php echo $pr['shot_name']; ?></option>
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
                    <input type="text" id="collegian_name" name="collegian_name" class="form-control" required="required"
                           value="<?php echo $detail['collegian_name']; ?>"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>นามสกุล *</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="collegian_lname" name="collegian_lname" class="form-control" required="required"
                           value="<?php echo $detail['collegian_lname']; ?>"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>ชื่อเข้าใช้งาน *</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="collegian_username" name="collegian_username" class="form-control" required="required"
                           value="<?php echo $detail['collegian_username']; ?>"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>บัตรประชาชน *</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="collegian_card" name="collegian_card" class="form-control" 
                           required="required" max="13" onkeypress="CheckNum();"
                           placeholder="ตัวเลข 0 - 9 13 หลัก" 
                           value="<?php echo $detail['collegian_card']; ?>"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <?php
                $lib = new Lib();
                $monthname = $lib->MonthFull();
                $monthval = $lib->Monthval();
                ?>
                <div class="col-sm-3">
                    <label>วันเกิด *</label>
                </div>
                <div class="col-sm-3">วัน
                    <select id="day" name="day" class="form-control">
                        <?php if (!empty($detail['collegian_birth'])) { ?>
                            <option value="<?php echo substr($detail['collegian_birth'], -2); ?>"><?php echo substr($detail['collegian_birth'], -2); ?></option>
                        <?php } ?>
                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3">เดือน
                    <select id="month" name="month" class="form-control">
                        <?php if (!empty($detail['collegian_birth'])) { ?>
                            <option value="<?php echo $monthval[(int) substr($detail['collegian_birth'], 5, 2)]; ?>"><?php echo $monthname[(int) substr($detail['collegian_birth'], 5, 2) - 1]; ?></option>
                        <?php } ?>
                        <?php for ($i = 0; $i <= 11; $i++) { ?>
                            <option value="<?php echo $monthval[$i]; ?>"><?php echo $monthname[$i]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3">ปี
                    <select id="year" name="year" class="form-control">
                        <?php if (!empty($detail['collegian_birth'])) { ?>
                            <option value="<?php echo substr($detail['collegian_birth'], 0, 4); ?>"><?php echo substr($detail['collegian_birth'], 0, 4); ?></option>
                        <?php } ?>
                        <?php
                        $yearnow = date("Y");
                        for ($i = $yearnow; $i >= $yearnow - 50; $i--) {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>จังหวัด *</label>
                </div>
                <div class="col-sm-9">
                    <?php
                    $sql_changwat = "SELECT changwat_id,changwat_name FROM changwat";
                    $r_changwat = Yii::app()->db->createCommand($sql_changwat)->queryAll();
                    ?>

                    <select id="changwat_code" class="form-control" name="changwat_code" onchange="ampur_chang(this.value);">
                        <option value="">==ยังไม่ได้เลือกจังหวัด==</option>
                        <?php foreach ($r_changwat as $ch) { ?>
                            <option value="<?php echo $ch['changwat_id']; ?>"
                            <?php
                            if ($detail['changwat_code'] == $ch['changwat_id']) {
                                echo "selected";
                            }
                            ?>>
                                <?php echo $ch['changwat_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>อำเภอ *</label>
                </div>
                <div class="col-sm-9" id="ampur">
                    <select id="ampur_code" name="ampur_code" class="form-control">
                        <option value="">== ยังไม่ได้เลือกอำเภอ ==</option>
                    </select>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>ตำบล *</label>
                </div>
                <div class="col-sm-9" id="tambon">
                    <select id="tambon_code" name="tambon_code" class="form-control">
                        <option value="">== ยังไม่ได้เลือกตำบล ==</option>
                    </select>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>รหัสไปรษณีย์ *</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="zipcode" name="zipcode" class="form-control" required="required"
                           onkeypress="CheckNum();"
                           value="<?php echo $detail['zipcode']; ?>"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>สัดส่วน *</label>
                </div>
                <div class="col-sm-4">สูง
                    <input type="text" id="weight" name="weight" class="form-control" 
                           required="required" placeholder="น้ำหนัก" onkeypress="CheckNum();" value="<?php echo $detail['weight']; ?>"/>
                </div>
                <div class="col-sm-5">หนัก
                    <input type="text" id="height" name="height" class="form-control" 
                           required="required" placeholder="ส่วนสูง" onkeypress="CheckNum();" value="<?php echo $detail['height']; ?>"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>อีเมลล์ *</label>
                </div>
                <div class="col-sm-9">
                    <input type="email" id="collegian_email" name="collegian_email" class="form-control" required="required" 
                           value="<?php echo $detail['collegian_email']; ?>"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>เบอร์โทรศัพท์ *</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="collegian_tel" name="collegian_tel" class="form-control" 
                           required="required" max="10" onkeypress="CheckNum();"
                           value="<?php echo $detail['collegian_tel']; ?>"/>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-sm-3">
                    <label>อาชีพ</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="occupation" name="occupation" class="form-control" required="required"
                           value="<?php echo $detail['collegian_tel']; ?>"/>
                </div>
            </div>
            <br/>
        </div><!-- form -->
    </div>
    <div class="panel-footer" style="text-align: right;">
        <button type="button" class="btn btn-primary" onclick="edit_collegian();">
            <i class="fa fa-save"></i> บันทึกข้อมูล
        </button>
        <button type="button" class="btn btn-danger">
            <i class="fa fa-remove"></i> ยกเลิก
        </button>
    </div>
</div>
