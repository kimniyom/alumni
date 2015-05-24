
<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'ยินดีต้อนรับ' => array('Index')
);
$lib = new Lib();
?>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">ข่าวทั่วไป </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" id="box_new_green">
        <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                <span class="bg-red">
                    <i class="fa fa-book"></i> ข่าวทั่วไป
                </span>
            </li>
            <!-- /.timeline-label -->

            <?php foreach ($news_genaral as $Ng) { ?>
                <!-- timeline item -->
                <li>
                    <!-- timeline icon -->
                    <i class="fa fa-envelope bg-orange"></i>
                    <div class="timeline-item">
                        <span class="time">
                            <i class="fa fa-clock-o"></i> 
                            <?php echo $lib->thaidate($Ng['CreateNews_Date']); ?>
                        </span>

                        <h3 class="timeline-header">
                            <a href="index.php?r=News/Detail_News&News_id=<?php echo $Ng['News_id'] ?>">
                                <i class="fa fa-newspaper-o"></i>
                                <?php echo $Ng['News_Head']; ?></a> 
                        </h3>

                        <!--
                        <div class="timeline-body"></div>
                        -->
                        <div class='timeline-footer'>
                            โดย : <i class="fa fa-user"></i> 
                            <font style=" font-weight: normal;">
                            <?php
                            if ($Ng['News_User_Status'] == "U") {
                                echo $Ng['collegian_name'] . " " . $Ng['collegian_lname'];
                            } else {
                                echo "ผู้ดูแลระบบ";
                            }
                            ?> 
                            </font>
                            <span class="label label-info">อ่าน 0</span>
                            <span class="label label-danger">ตอบ 0</span>
                            <a href="index.php?r=News/Detail_News&News_id=<?php echo $Ng['News_id'] ?>" class="btn btn-primary btn-xs" style=" float: right;">อ่านต่อ ...</a>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
            <?php } ?>
        </ul>
    </div>
    <div class="box-footer" style="text-align: right;">
        <div class="btn btn-warning btn-sm">ข่าวทั้งหมด...</div>
    </div>
</div>

<!--
ประกาศ ภายใน
-->
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">ประกาศภายใน </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" id="box_new_green">
        <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                <span class="bg-orange">
                    <i class="fa fa-newspaper-o"></i> ประกาศภายใน
                </span>
            </li>
            <!-- /.timeline-label -->

            <?php foreach ($news_collegian as $cl) { ?>
                <!-- timeline item -->
                <li>
                    <!-- timeline icon -->
                    <i class="fa fa-envelope bg-green"></i>
                    <div class="timeline-item">
                        <span class="time">
                            <i class="fa fa-clock-o"></i> 
                            <?php echo $lib->thaidate($cl['CreateNews_Date']); ?>
                        </span>

                        <h3 class="timeline-header">
                            <a href="index.php?r=News/Detail_News&News_id=<?php echo $cl['News_id'] ?>">
                                <i class="fa fa-newspaper-o"></i>
                                <?php echo $cl['News_Head']; ?></a> 
                        </h3>

                        <!--
                        <div class="timeline-body"></div>
                        -->
                        <div class='timeline-footer'>
                            โดย : <i class="fa fa-user"></i> 
                            <font style=" font-weight: normal;">
                            <?php
                            if ($cl['News_User_Status'] == "U") {
                                echo $cl['collegian_name'] . " " . $cl['collegian_lname'];
                            } else {
                                echo "ผู้ดูแลระบบ";
                            }
                            ?>
                            </font>
                            <span class="label label-info">อ่าน 0</span>
                            <span class="label label-danger">ตอบ 0</span>
                            <a href="index.php?r=News/Detail_News&News_id=<?php echo $cl['News_id'] ?>" class="btn btn-primary btn-xs" style=" float: right;">อ่านต่อ ...</a>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
            <?php } ?>
        </ul>
    </div>
    <div class="box-footer" style="text-align: right;">
        <div class="btn btn-warning btn-sm">ข่าวทั้งหมด...</div>
    </div>
</div>

