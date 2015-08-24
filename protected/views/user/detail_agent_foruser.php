<?php
$lib = new Lib();
?>
<script type="text/javascript">

    $(document).ready(function () {
        autoload_img_profile();
    });

    function autoload_img_profile() {
        var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
        $("#show_img_profile").html(loading);
        var url = "index.php?r=frontend/user/img_profile";
        var id = "<?php echo $id; ?>";
        var data = {id: id};
        $.post(url, data, function (success) {
            $("#show_img_profile").html(success);
        });
    }

</script>

<?php
/* @var $this AdminController */
/* @var $agent Admin */

$this->breadcrumbs = array(
    'หน้าแรก' => (array('site/index')),
    'ข้อมูลของ ' . $agent['name'] . ' ' . $agent['lname'],
);
?>


<div class="box box-danger">

    <div class="panel panel-default">
        <div class="panel-heading">
            รายละเอียดตัวแทนบริษัท
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <center>
                            <div id="_show_img_profile"></div>
                        </center>
                    </div>
                </div>

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
                        <td>อีเมล</td>
                        <td><?php echo $agent['email']; ?></td>
                    </tr>
                    <!--
                    <tr>
                        <td>ชื่อเข้าใช้งาน</td>
                        <td><?php echo $agent['username']; ?></td>
                    </tr>
                                        
                    <tr>
                        <td>รหัสผ่าน</td>
                        <td><?//php echo $agent['password']; ?></td>
                    </tr>
                    -->
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
       
    </div>
</div>

