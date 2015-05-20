<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'หน้าหลัก' => array('site/Index'),
    $News['News_Head']
);
?>

<div class="box box-warning">
    <div class="box-body">
        <h3 style="margin-top: 0px;">
            <?php echo $News['News_Head']; ?>
        </h3>
        <div class="well well-sm">
            <?php echo $News['News_Detail']; ?>
        </div>

        <!-- รูปภาพข่าว -->
        <div class="row">
            <center>
                <img src="<?php echo Yii::app()->baseUrl; ?>/images/slider-bg.png" width="100" class="responsive"/>
            </center>
        </div>

        <hr>
        <!-- Comment -->
        <?php if (Yii::app()->session['user'] == 'A' || Yii::app()->session['user'] == 'U') { ?>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-comment"></i> เพิ่มคอมเม้นน์</h3>
                </div>
                <div class="box-body">
                    <form action="#" method="post">
                        <div class="input-group">
                            <input type="text" name="message" placeholder="Type Message ..." class="form-control"/>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-flat">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- DIRECT CHAT PRIMARY -->
            <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-comment"></i> คอมเม้นน์</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="padding: 10px;">
                    <!-- Conversations are loaded here -->

                    <!-- Message. Default to the left -->
                    <?php for ($i = 0; $i <= 5; $i++) { ?>
                        <div class="direct-chat-msg">
                            <div class='direct-chat-info clearfix'>
                                <span class='direct-chat-name pull-left'>Alexander Pierce</span>
                                <span class='direct-chat-timestamp pull-right'>23 Jan 2:00 pm</span>
                            </div><!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="<?php echo Yii::app()->baseUrl; ?>/themes/AdminLTE2/dist/img/user1-128x128.jpg" alt="message user image" /><!-- /.direct-chat-img -->
                            <div class="direct-chat-text" style=" color: #000;">
                                Is this template really for free? That's unbelievable!
                            </div><!-- /.direct-chat-text --> 
                        </div><!-- /.direct-chat-msg -->
                    <?php } ?>

                </div><!-- /.box-body -->
                <div class="box-footer">
                </div><!-- /.box-footer-->
            </div><!--/.direct-chat -->
        <?php } ?>


    </div>
    <div class="box-footer">
        <label>ข่าวที่เกี่ยวข้อง</label>
        <?php foreach ($News_jam as $newsAll) { ?>
            <p>
                <a href="index.php?r=News/Detail_News&News_id=<?php echo $newsAll['News_id'] ?>">
                    <?php echo $newsAll['News_Head']; ?></a>
            </p>
        <?php } ?>
    </div>
</div>
