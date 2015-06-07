<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js_store/js_register_user.js"></script>
<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'หน้าหลัก' => array('site/Index'),
    'สมัคสมาชิก'
);
?>

<div class="box box-warning">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="fa fa-plus"></i> สมัคสมาชิก</h4>
        </div>
        <div class="panel-body">
            <div class="form">
                <div class="row">
                    <div class="col-sm-3">
                        <label>คำนำหน้า</label>
                    </div>
                    <div class="col-sm-9">
                        <select id="shot_name" name="shot_name" class="form-control input-sm">
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
                        <input type="text" id="name" name="name" class="form-control input-sm" required="required"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>นามสกุล *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="lname" name="lname" class="form-control input-sm" required="required"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>ชื่อเข้าใช้งาน *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="username" name="username" class="form-control input-sm" required="required"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>รหัสผ่าน *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="password" id="password" name="password" class="form-control input-sm" required="required"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>โทรศัพท์ *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="tel" name="tel" class="form-control input-sm" required="required" onkeypress="CheckNum();"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>โทรศัพท์มือถือ *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="mobile" name="mobile" class="form-control input-sm" required="required" onkeypress="CheckNum();"/>
                    </div>
                </div>
                <br/>
                
                <div class="row">
                    <div class="col-sm-3">
                        <label>อีเมล์ *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="email" id="email" name="email" class="form-control input-sm" required="required"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>ชื่อบริษัท *</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" id="company" name="company" class="form-control input-sm" required="required"/>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-sm-3">
                        <label>ที่อยู่บริษัท *</label>
                    </div>
                    <div class="col-sm-9">
                        <textarea id="address" name="address" class="form-control"></textarea>
                    </div>
                </div>
                <br/>

            </div><!-- form -->
        </div>
        <div class="panel-footer" style="text-align: right;">
            <div class="row" style="padding-right: 10px;">
                <button type="button" class="btn btn-primary" onclick="save_user();">
                    <i class="fa fa-save"></i> บันทึกข้อมูล
                </button>
                <button type="button" class="btn btn-danger" onclick="Javascript:window.location.reload();">
                    <i class="fa fa-remove"></i> ยกเลิก
                </button>
            </div>
        </div>
    </div>
</div>