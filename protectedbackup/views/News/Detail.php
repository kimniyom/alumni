<style>
    .album ul {         
        padding:0 0 0 0;
        margin:0 0 0 0;
    }
    .album ul li {     
        list-style:none;
        margin-bottom:25px;           
    }
    .album ul li img {
        cursor: pointer;
    }
    .modal-body {
        padding:5px !important;
    }
    .modal-content {
        border-radius:0;
    }
    .modal-dialog img {
        text-align:center;
        margin:0 auto;
    }
    .controls{          
        width:50px;
        display:block;
        font-size:11px;
        padding-top:8px;
        font-weight:bold;          
    }
    .next {
        float:right;
        text-align:right;
    }
    /*override modal for demo only*/
    .modal-dialog {
        max-width:760px;
        padding-top: 90px;
    }
    @media screen and (min-width: 768px){
        .modal-dialog {
            width:760px;
            padding-top: 90px;
        }          
    }
    @media screen and (max-width:1500px){
        #ads {
            display:none;
        }
    }
</style>

<script type="text/javascript">

    $(document).ready(function () {
        load_comment();
    });

    function load_comment() {
        $("#show_comment").html("<center>กำลังโหลดข้อมูล ...</center>");
        var url = "index.php?r=comment/get_comment";
        var news_id = $("#news_id").val();
        var data = {news_id: news_id};
        $.post(url, data, function (result) {
            $("#show_comment").html(result);
        });
    }

    function comment() {
        var url = "index.php?r=comment/add_comment";
        var news_id = $("#news_id").val();
        var comment = $("#message").val();
        var data = {news_id: news_id, comment: comment};
        if (comment == "") {
            $("#message").focus();
            return false;
        }

        $.post(url, data, function (result) {
            $("#message").val("");
            load_comment();
        });
    }
</script>

<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'หน้าแรก' => array('site/Index'),
    $News['News_Head']
);
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">         
            <div class="modal-body">                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="box box-warning">
    <div class="box-body">
        <h3 style="margin-top: 0px; color: #cc0000; font-weight: bold;">
            <?php echo $News['News_Head']; ?>
        </h3>
        <div class="well well-sm" style=" background: none; position: relative;">
            <center>
                <?php
                $news = new NewsModels();
                $lib = new Lib();
                $first = $news->Get_first_news($News['News_id']);
                if ($first != 0) {
                    ?>
                    <img src="<?php echo Yii::app()->baseUrl; ?>/upload_news/<?php echo $first; ?>" class="img-responsive"/>
                    <br/>
                <?php } ?>
            </center>
            <?php echo $News['News_Detail']; ?><br/>

            <p style=" float: right;">
                <span class="label label-info">อ่าน <?php echo $news->Maxread($News['News_id']); ?></span>
                <span class="label label-danger">ตอบ <?php echo $news->Countpost($News['News_id']); ?></span>
                อัพเดทเมื่อ 
                <?php echo $lib->thaidate($News['CreateNews_Date']); ?>
            </p><br/>
        </div>

        <!-- รูปภาพข่าว -->

        <div class="album">
            <ul class="row">
                <?php foreach ($news_images as $img_news): ?>
                    <li class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/upload_news/<?php echo $img_news['News_Image'] ?>" class="img-responsive"/>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>


        <hr>
        <!-- Comment -->
        <?php if (Yii::app()->session['user'] == 'A' || Yii::app()->session['user'] == 'U') { ?>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-comment"></i> ความเห็น</h3>
                </div>
                <div class="box-body">
                    <div class="input-group">
                        <input type="hidden" id="news_id" name="news_id" value="<?php echo $News['News_id'] ?>"/>
                        <input type="text" name="message" id="message" placeholder="ความคิดเห็นของคุณ ..." class="form-control"/>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-flat" onclick="comment()
                                                ;">ความเห็น</button>
                        </span>
                    </div>
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
                <div class="box-body" style="padding: 10px;" id="show_comment">
                    <!-- Conversations are loaded here -->



                </div><!-- /.box-body -->
                <div class="box-footer">
                </div><!-- /.box-footer-->
            </div><!--/.direct-chat -->
        <?php } ?>


    </div>

</div>

<div class="box box-default">
    <div class="box-header with-border">
        ข่าวที่เกี่ยวข้อง
    </div>
    <div class="container-fluid" style=" margin-top: 10px;">
        <?php foreach ($News_jam as $newsAll) { ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <?php
                    $first_jam = $news->Get_first_news($newsAll['News_id']);
                    if ($first_jam != 0) {
                        ?>
                        <img src="<?php echo Yii::app()->baseUrl; ?>/upload_news/<?php echo $first_jam ?>" class="img-responsive"/>
                    <?php } else { ?>
                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/no_photo_icon.png" class="img-responsive"/>
                    <?php } ?>
                    <div class="caption">
                        <a href="index.php?r=News/Detail_News&News_id=<?php echo $newsAll['News_id'] ?>">
                            <?php
                            echo $newsAll['News_Head'];
                            ?>
                        </a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

