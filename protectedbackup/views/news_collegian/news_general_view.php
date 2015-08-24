<script type="text/javascript">
    $(document).ready(function () {
        $("#news_collegian").dataTable({
            bFilter: true,
            bInfo: true,
            bSort: false,
            iDisplayLength: 10,
            bLengthChange: false
        });
    });
</script>

<?php
/* @var $this CollegianController */
/* @var $model Collegian */

$this->breadcrumbs = array(
    'หน้าแรก' => array('site/index'),
    'ข่าวทั่วไป'
);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bullhorn"></i> ข่าวทั่วไป
    </div>
    <div class="panel-body">
        <table class="table table-hover" id="news_collegian">
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $lib = new Lib();
                $newsmodel = new NewsModels();
                foreach ($news as $rs):
                    ?>
                    <tr>
                        <td>
                            <a href="index.php?r=News/detail_news&News_id=<?php echo $rs['News_id'] ?>">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <?php
                                        $first = $newsmodel->Get_first_news($rs['News_id']);
                                        if ($first != 0) {
                                            ?>
                                            <img src="<?php echo Yii::app()->baseUrl; ?>/upload_news/<?php echo $first; ?>" class="responsive" width="60"/>
                                            <br/>
                                        <?php } else { ?>
                                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/no_photo_icon.png" class="responsive" width="60"/>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-11">
                                        <b><i class="fa fa-newspaper-o"></i> <?php echo $rs['News_Head']; ?></b><br/>
                                        <font style="font-size: 12px; color: #cc0000;">
                                        <i class="fa fa-user"></i>
                                        <?php
                                        if ($rs['News_User_Status'] == "U") {
                                            echo $rs['collegian_name'] . ' ' . $rs['collegian_lname'];
                                        } else {
                                            echo "ผู้ดูแลระบบ";
                                        }
                                        ?>
                                        </font>
                                        <br/>
                                        <font style="font-size: 12px; color: #cc0000; float: right;">
                                        <?php echo $lib->thaidate($rs['CreateNews_Date']); ?>
                                        </font>
                                    </div>
                                </div>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
