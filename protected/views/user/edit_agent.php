<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js_store/js_edit_user.js"></script>
<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'หน้าหลัก' => array('site/Index'),
    $agent['name'] . ' ' . $agent['lname'] => array('frontend/user/detail_agent'),
    "แก้ไข"
);
?>

<div class="box box-warning">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="fa fa-wrench"></i> แก้ไขข้อมูล</h4>
        </div>
        <div class="panel-body">
            <input type="hidden" id="agent_id" value="<?php echo $agent['id'];?>"/>
            <div class="form">
                <div class="row">
                    <div class="col-sm-3">
                        <label>คำนำหน้า</label>
                    </div>
                    <div class="col-sm-9">
                        <select id="shot_name" name="shot_name" class="form-control input-sm">
                            <?php foreach ($perfix as $pr): ?>
                                <option value="<?php echo $pr['id']; ?>"
                                <?php
                                if ($agent['shot_name'] == $pr['id']) {
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
                        <input type="text" id="name" name="name" class="form-control input-sm" required="required"
                               value="<?php echo $agent['name']; ?>"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>นามสกุล *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="lname" name="lname" class="form-control input-sm" required="required" 
                               value="<?php echo $agent['lname']; ?>"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>ชื่อเข้าใช้งาน *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="username" name="username" class="form-control input-sm" readonly="readonly" 
                               value="<?php echo $agent['username']; ?>"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>รหัสผ่าน *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="password" id="password" name="password" class="form-control input-sm" readonly="readonly" 
                               value="<?php echo $agent['password']; ?>"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>โทรศัพท์ *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="tel" name="tel" class="form-control input-sm" required="required" onkeypress="CheckNum();" 
                               value="<?php echo $agent['tel']; ?>"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>โทรศัพท์มือถือ *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="mobile" name="mobile" class="form-control input-sm" required="required" onkeypress="CheckNum();" 
                               value="<?php echo $agent['mobile']; ?>"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>ชื่อบริษัท *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="company" name="company" class="form-control input-sm" required="required" value="<?php echo $agent['company']; ?>"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>ที่อยู่บริษัท *</label>
                    </div>
                    <div class="col-sm-9">
                        <textarea id="address" name="address" class="form-control"><?php echo $agent['address']; ?></textarea>
                    </div>
                </div>
                <br/>

            </div><!-- form -->
        </div>
        <div class="panel-footer" style="text-align: right;">
            <div class="row" style="padding-right: 10px;">
                <button type="button" class="btn btn-primary" onclick="save_edit_user();">
                    <i class="fa fa-save"></i> บันทึกข้อมูล
                </button>
                <button type="button" class="btn btn-danger">
                    <i class="fa fa-remove"></i> ยกเลิก
                </button>
            </div>
        </div>
    </div>
</div>