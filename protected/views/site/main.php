
<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'ยินดีต้อนรับ' => array('Index')
);
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

            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <!-- timeline item -->
                <li>
                    <!-- timeline icon -->
                    <i class="fa fa-envelope bg-orange"></i>
                    <div class="timeline-item">
                        <span class="time">
                            <i class="fa fa-clock-o"></i> 
                            <?php echo date("Y-m-d"); ?>
                            12:05
                        </span>

                        <h3 class="timeline-header"><a href="#">หัวข้อ <?php echo $i; ?></a> ...</h3>

                        <div class="timeline-body">
                            ...
                            รายละเอียด <?php echo $i; ?>
                        </div>

                        <div class='timeline-footer'>
                            <a class="btn btn-primary btn-xs">อ่านต่อ ...</a>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
            <?php } ?>
        </ul>
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

            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <!-- timeline item -->
                <li>
                    <!-- timeline icon -->
                    <i class="fa fa-envelope bg-green"></i>
                    <div class="timeline-item">
                        <span class="time">
                            <i class="fa fa-clock-o"></i> 
                            <?php echo date("Y-m-d"); ?>
                            12:05
                        </span>

                        <h3 class="timeline-header"><a href="#">หัวข้อ <?php echo $i; ?></a> ...</h3>

                        <div class="timeline-body">
                            ...
                            รายละเอียด <?php echo $i; ?>
                        </div>

                        <div class='timeline-footer'>
                            <a class="btn btn-primary btn-xs">อ่านต่อ ...</a>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
            <?php } ?>
        </ul>
    </div>
</div>

