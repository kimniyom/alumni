<script type="text/javascript">
    function active_user(id) {
        var url = "index.php?r=backoffice/active_user";
        var data = {id: id};
        $.post(url, data, function (result) {
            window.location.reload();
        });
    }

    function unactive_user(id) {
        var url = "index.php?r=backoffice/unactive_user";
        var data = {id: id};
        $.post(url, data, function (result) {
            window.location.reload();
        });
    }
</script>

<?php
/* @var $this AdminController */
/* @var $agent Admin */

$this->breadcrumbs = array(
    'ตัวแทนบริษัททั้งหมด' => (array('backoffice/get_agent')),
    'ข้อมูลของ ' . $agent['name'] . ' ' . $agent['lname'],
);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        รายละเอียดตัวแทนบริษัท
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="2">
                        <?php if($agent['images'] == ''){ ?>
                        <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads_images_user/avatar5.png" class="img-circle" alt="User Image" width="100"/><br/>
                        <?php } else { ?>
                        <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads_images_user/<?php echo $agent['images']; ?>" class="img-circle" alt="User Image" width="100"/><br/>
                        <?php } ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ชื่อ</td>
                    <td><?php echo $agent['name']; ?></td>
                </tr>
                <tr>
                    <td>นามสกุล</td>
                    <td><?php echo $agent['lname']; ?></td>
                </tr>
                <tr>
                    <td>เบอร์โทรศัพท์</td>
                    <td><?php echo $agent['tel']; ?></td>
                </tr>
                <tr>
                    <td>เบอร์โทรศัพท์มือถือ</td>
                    <td><?php echo $agent['mobile']; ?></td>
                </tr>
                <tr>
                    <td>ชื่อเข้าใช้งาน</td>
                    <td><?php echo $agent['username']; ?></td>
                </tr>
				<tr>
                    <td>อีเมล</td>
                    <td><?php echo $agent['email']; ?></td>
                </tr>
                <tr>
                    <td>รหัสผ่าน</td>
                    <td><?php echo $agent['password']; ?></td>
                </tr>
                <tr>
                    <td>ชื่อบริษัท</td>
                    <td><?php echo $agent['company']; ?></td>
                </tr>
                <tr>
                    <td>ที่อยู่บริษัท</td>
                    <td><?php echo $agent['address']; ?></td>
                </tr>
            <tbody>
        </table>

    </div>
    <div class="panel-footer" style=" text-align: right;">
        <?php if ($agent['active'] == '0') { ?>
            <div class="btn btn-primary" onclick="active_user('<?php echo $agent['id'] ?>');"><i class="fa fa-info"></i> ยืนยันเปิดการใช้งาน</div>
        <?php } else { ?>
            <div class="btn btn-success disabled"><i class="fa fa-check"></i> เปิดใชงานแล้ว</div>
            <div class="btn btn-danger" onclick="unactive_user('<?php echo $agent['id'] ?>');"><i class="fa fa-remove"></i> ยกเลิกการใช้งาน</div>
        <?php } ?> 
    </div>
</div>