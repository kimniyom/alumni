<script type="text/javascript">
    $(document).ready(function () {
        //CKEDITOR.replace( 'workings_detail' );
        CKEDITOR.replace('News_Detail', {
            //removePlugins: 'bidi,div,font,forms,flash,horizontalrule,iframe,justify,table,tabletools,smiley',
            removePlugins: 'bidi,forms,flash,iframe,div,table,tabletools',
            removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript,Image',
            //format_tags: 'p;h1;h2;h3;pre;address'
        });
    });
    function active_user(id) {
        var url = "index.php?r=backoffice/active_user";
        var data = {id: id};
        $.post(url, data, function (result) {
            window.location.reload();
        });
    }

    function unactive_user(id) {
        var url = "index.php?r=backoffice/unactive_user";
        var data = {id: id};
        $.post(url, data, function (result) {
            window.location.reload();
        });
    }
    function SaveEdit_News() {
        var url = "index.php?r=News/SaveEdit_News";
        var News_id = $("#News_id").val();
        var News_Head = $("#News_Head").val();
        var News_Catagories = $("#News_Catagories").val();
        var News_Owner = $("#News_Owner").val();
        var News_Detail = CKEDITOR.instances.News_Detail.getData();
        //alert(News_Owner);

        var data = {
            News_id: News_id,
            News_Head: News_Head,
            News_Catagories: News_Catagories,
            News_Detail: News_Detail,
            News_Owner: News_Owner
        };
        $.post(url, data, function (result) {
            if (<?php echo $type; ?> == '1') {
                window.location = "index.php?r=News/News_general_all";
            } else {
                window.location = "index.php?r=News/News_collegian_all";
            }

        });
    }
    ;</script>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>แก้ไขข้อมูลข่าว </h3>
    </div>
    <div class="panel-body">
        <div class="form">
            <div class="row">
                <div class="col-sm-2">
                    <label>หัวข้อข่าวประกาศ</label>
                </div>
                <div class="col-sm-10">
                    <input type="hidden" id="News_id" name="News_id" value="<?php echo $News['News_id']; ?>">
                    <input type="text" id="News_Head" name="News_Head" class="form-control input-sm" required="required" value="<?php echo $News['News_Head']; ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <label>ประเภทข่าว</label>
                </div>
                <div class="col-sm-10">
                    <select id="News_Catagories" name="News_Catagories" class="form-control input-sm">
                        <option value="1" <?php
                        if ($News['News_Catagory_id'] == 1) {
                            echo "selected";
                        }
                        ?>>ข่าวทั่วไป</option>
                        <option value="2" <?php
                        if ($News['News_Catagory_id'] == 2) {
                            echo "selected";
                        }
                        ?>>ข่าวนักศึกษา</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <textarea id="News_Detail" name="News_Detail" class="ckeditor" required="required"/><?php echo $News['News_Detail']; ?></textarea>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-sm-2">
                    <label>เจ้าของข่าว</label>
                </div>
                <div class="col-sm-10">
                    <?php
                    if (Yii::app()->session['user'] == "A") {
                        $id = Yii::app()->session['admin_id'];
                        $name = Yii::app()->session['admin_name'];
                        $status = Yii::app()->session['user'];
                    } else {
                        $id = Yii::app()->session['collegian_code'];
                        $name = Yii::app()->session['collegian_name'];
                    }
                    ?>
                    <input type="hidden" id="News_Owner" name="News_Owner" value="<?php echo $id; ?>" class="form-control input-sm"/>
                    <input type="text" id="News_Owner" name="Owner" value="<?php echo $name; ?>" class="form-control input-sm" readonly="readonly"/>
                </div>
            </div>
        </div><!-- form -->
    </div>

    <div class="panel-footer" style=" text-align: right;">
        <div class="btn btn-primary" onclick="SaveEdit_News();">บันทึก</div>
    </div>
</div>