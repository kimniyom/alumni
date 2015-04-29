<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs = array(
    'ข้อมูลของ '.$model->admin_name,
);
?>

<div class="panel panel-default">
    <div class="panel-heading" style=" text-align: right;">
        <a href="<?php echo Yii::app()->createUrl('admin/update&id=' . $model->id); ?>">
            <div class="btn btn-info btn-sm"><i class="fa fa-edit"></i> แก้ไขข้อมูล</div>
        </a>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="2">ข้อมูลส่วนตัว</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ชื่อ</td>
                    <td><?php echo $model->admin_name; ?></td>
                </tr>
                <tr>
                    <td>นามสกุล</td>
                    <td><?php echo $model->admin_lname; ?></td>
                </tr>
                <tr>
                    <td>อีเมลล์</td>
                    <td><?php echo $model->email; ?></td>
                </tr>
                <tr>
                    <td>เบอร์โทรศัพท์</td>
                    <td><?php echo $model->tel; ?></td>
                </tr>
                <tr>
                    <td>ชื่อเข้าใช้งาน</td>
                    <td><?php echo $model->username; ?></td>
                </tr>
                <tr>
                    <td>รหัสผ่าน</td>
                    <td><?php echo $model->password; ?></td>
                </tr>
            <tbody>
        </table>

    </div>
</div>