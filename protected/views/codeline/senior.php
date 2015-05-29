
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="dialog_senior">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">เลือกพี่รหัส </h4>
            </div>
            <div class="modal-body">
                <div id="show_senion" style="padding: 10px;">

                </div>
            </div>
        </div>
    </div>
</div>


<?php $croup = Yii::app()->baseUrl . "/assets/jquery.picture.cut/"; ?>
<div class="row">
    <?php if ($senior != 0) { ?>
        <div class="col-lg-4 col-sm-4" style="padding-top: 0px;">
            <center>
                <img src="<?php echo $croup; ?>/uploads/<?php echo $senior['img_profile'] ?>" class="img-rounded" style="margin-top: 0px; width: 100px;">
            </center>
        </div>
        <div class="col-lg-8 col-sm-8">
            <div class="alert alert-warning" style=" margin-top: 10px;">
                รหัสนักศึกษา : <?php echo $senior['collegian_code']; ?><br/>
                ชื่อ - สกุล : <?php echo $senior['collegian_name'] . ' ' . $senior['collegian_name']; ?><br/>
                รุ่น : <?php echo $senior['GenNumber']; ?>
            </div>
        </div>

        <a href="Javascript:void(0);" onclick="dialog_senior();"><i class="fa fa-plus"></i> เพิ่มพี่รหัส</a>

    <?php } else { ?>
        <div class="col-lg-4 col-sm-4">
            <center>
                <img src="<?php echo Yii::app()->baseUrl; ?>/images/User-blue-icon.png" class="img-rounded"> 
            </center>
        </div>
        <div class="col-lg-8 col-sm-8">
            <?php if (Yii::app()->session['collegian_code'] == $collegian_code) { ?>
                <a href="Javascript:void(0);" onclick="dialog_senior();">
                    <div class="well" style=" border: dashed 2px #809deb; color: #7d7e80; text-align: center;">
                        <i class="fa fa-plus fa-5x"></i> <br/>
                        <h3>เพิ่มพี่รหัส</h3>
                    </div>
                </a>
                <?php
            } else {
                echo "ไม่มีข้อมูล";
            }
            ?>
        </div>
    <?php } ?>
</div>