<div class="row">
    <?php
    $lib = new Lib();
    foreach ($gen as $g):
        ?>

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>รุ่น <?php echo $g['GenNumber']; ?></h3>
                    <p>
                        ปี <?php echo $g['GenYear']; ?> 
                    </p>
                    <a href="<?php echo Yii::app()->createUrl('Collegian/create&GenID=' . $g['GenID'] . '&GenNumber=' . $g['GenNumber']); ?>">
                        <h4 style="color: #FFF;" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> เพิ่มนักศึกษา
                        </h4>
                    </a>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo Yii::app()->createUrl('Collegian/View&GenNumber=' . $g['GenNumber']) ?>" class="small-box-footer">
                    จำนวน <?php echo $lib->Count_Generation($g['GenNumber']); ?> คน  
                    <i class="fa fa-arrow-circle-right"></i>
                    ดูรายชื่อทั้งหมด
                </a>

            </div>
        </div><!-- ./col -->
    <?php endforeach; ?>
</div>


<!-- Small boxes (Stat box) -->
<div class="row">

</div>

