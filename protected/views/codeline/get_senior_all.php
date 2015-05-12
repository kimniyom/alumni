
<?php if ($GenNumber_senior > 0) { ?>

    <div  style="border-bottom: solid 1px #999999; font-size: 18px; margin-bottom: 5px;">
        <span class="label label-danger">
            <i class="fa fa-users"></i>
            <?php
            echo "รายชื่อรุ่น " . $GenNumber_senior;
            ?>
        </span>
    </div>
    <div class="row">
        <?php foreach ($senior as $rs) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 btn btn-default" style="text-align: center; border: none; padding-top: 5px;"
                 onclick="add_senior('<?php echo $rs['line_id']; ?>', '<?php echo $rs['collegian_code']; ?>', '<?php echo ($GenNumber_senior + 1) ?>');">
                     <?php if (!empty($rs['images'])) { ?>
                    <img src="<?php echo Yii::app()->baseUrl; ?>/assets/jquery.picture.cut/uploads/<?php echo $rs['images'] ?>" width="100" class="img-rounded"/>
                <?php } else { ?>
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/User-blue-icon.png" width="100" class="img-rounded"/>
                <?php } ?>
                <br/>
                <div class="well well-sm" style="padding: 5px;">
                    <?php echo $rs['collegian_code'] . '(' . $rs['line_id'] . ')'; ?><br/>
                    <?php echo $rs['prename'] . $rs['collegian_name'] . ' ' . $rs['collegian_lname']; ?>
                </div>
            </div>
        <?php } ?>
    </div>

<?php } else { ?>
    <div class="alert alert-danger">
        <center>
            <h1>
                ขออภัยท่านเป็นรุ่นแรกไม่สามารถมีพี่รหัสได้
            </h1>
        </center>
    </div>
<?php } ?>
