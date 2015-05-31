
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

            <?php
            $i = 1;
            $newmodel = new NewsModels();
            foreach ($news_genaral as $Ng) {
                $img = $newmodel->Get_first_news($Ng['News_id']);
                ?>
                <!-- timeline item -->
                <?php if ($i++ == 1) { ?>
                    <li>
                        <!-- timeline icon -->
                        <i class="fa fa-envelope bg-orange"></i>
                        <div class="timeline-item">
                            <div class="row" style=" padding: 5px;">
                                <div class="col-sm-5">
                                    <?php if(!empty($img)) { ?>
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/upload_news/<?php echo $img; ?>" class="img-responsive"/>
                                    <?php } else { ?>
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/no_photo_icon.png" class="img-responsive"/>
                                    <?php } ?>
                                </div>
                                <div class="col-sm-7">
                                    <h3 class="timeline-header" style=" margin-top: 5px;">
                                        <a href="index.php?r=News/Detail_News&News_id=<?php echo $Ng['News_id'] ?>">
                                            <?php echo $Ng['News_Head']; ?></a> 
                                    </h3>
                                    <span class="time">
                                        <i class="fa fa-clock-o"></i> 
                                        <?php echo $lib->thaidate($Ng['CreateNews_Date']); ?>
                                    </span><br/>
                                    โดย : <i class="fa fa-user"></i> 
                                    <font style=" font-weight: normal;">
                                    <?php
                                    if ($Ng['News_User_Status'] == "U") {
                                        echo $Ng['collegian_name'] . " " . $Ng['collegian_lname'];
                                    } else {
                                        echo "ผู้ดูแลระบบ";
                                    }
                                    ?> 
                                    </font><br/>
                                    <span class="label label-info">อ่าน <?php echo $newmodel->Maxread($Ng['News_id']); ?></span>
                                    <span class="label label-danger">ตอบ <?php echo $newmodel->Countpost($Ng['News_id']); ?></span>
                                    <a href="index.php?r=News/Detail_News&News_id=<?php echo $Ng['News_id'] ?>" class="btn btn-primary btn-xs" style=" float: right;">อ่านต่อ ...</a>
                                </div>
                            </div>

                        </div>
                    </li>

                <?php } else { ?>
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
                                <span class="label label-info">อ่าน <?php echo $newmodel->Maxread($Ng['News_id']); ?></span>
                                <span class="label label-danger">ตอบ <?php echo $newmodel->Countpost($Ng['News_id']); ?></span>
                                <a href="index.php?r=News/Detail_News&News_id=<?php echo $Ng['News_id'] ?>" class="btn btn-primary btn-xs" style=" float: right;">อ่านต่อ ...</a>
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <?php
                }
            }
            ?>
        </ul>
    </div>
    <div class="box-footer" style="text-align: right;">
        <a href="index.php?r=frontend/news_collegian/news_generalView">
            <div class="btn btn-warning btn-sm">ข่าวทั้งหมด...</div>
        </a>
    </div>
</div>

<?php if (Yii::app()->session['user'] == "A" || Yii::app()->session['user'] == "U") { ?>

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

                <?php
                $j = 1;
                foreach ($news_collegian as $cl) {
                    $img2 = $newmodel->Get_first_news($cl['News_id']);
                    ?>
                    <?php if ($j++ == 1) { ?>
                        <li>
                            <!-- timeline icon -->
                            <i class="fa fa-envelope bg-green"></i>
                            <div class="timeline-item">
                                <div class="row" style=" padding: 5px;">
                                    <div class="col-sm-5">
                                        <?php if(!empty($img2)) { ?>
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/upload_news/<?php echo $img2; ?>" class="img-responsive"/>
                                    <?php } else { ?>
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/no_photo_icon.png" class="img-responsive"/>
                                    <?php } ?>
                                    </div>
                                    <div class="col-sm-7">
                                        <h3 class="timeline-header" style=" margin-top: 5px;">
                                            <a href="index.php?r=News/Detail_News&News_id=<?php echo $cl['News_id'] ?>">
                                                <?php echo $cl['News_Head']; ?></a> 
                                        </h3>
                                        <span class="time">
                                            <i class="fa fa-clock-o"></i> 
                                            <?php echo $lib->thaidate($cl['CreateNews_Date']); ?>
                                        </span><br/>
                                        โดย : <i class="fa fa-user"></i> 
                                        <font style=" font-weight: normal;">
                                        <?php
                                        if ($Ng['News_User_Status'] == "U") {
                                            echo $cl['collegian_name'] . " " . $cl['collegian_lname'];
                                        } else {
                                            echo "ผู้ดูแลระบบ";
                                        }
                                        ?> 
                                        </font><br/>
                                        <span class="label label-info">อ่าน <?php echo $newmodel->Maxread($cl['News_id']); ?></span>
                                        <span class="label label-danger">ตอบ <?php echo $newmodel->Countpost($cl['News_id']); ?></span>
                                        <a href="index.php?r=News/Detail_News&News_id=<?php echo $cl['News_id'] ?>" class="btn btn-primary btn-xs" style=" float: right;">อ่านต่อ ...</a>
                                    </div>
                                </div>

                            </div>
                        </li>

                    <?php } else { ?>

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
                                    <span class="label label-info">อ่าน <?php echo $newmodel->Maxread($cl['News_id']); ?></span>
                                    <span class="label label-danger">ตอบ <?php echo $newmodel->Countpost($cl['News_id']); ?></span>
                                    <a href="index.php?r=News/Detail_News&News_id=<?php echo $cl['News_id'] ?>" class="btn btn-primary btn-xs" style=" float: right;">อ่านต่อ ...</a>
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="box-footer" style="text-align: right;">
            <a href="index.php?r=frontend/news_collegian/news_collegianView">
                <div class="btn btn-warning btn-sm">ข่าวทั้งหมด...</div>
            </a>
        </div>
    </div>

<?php } ?>
