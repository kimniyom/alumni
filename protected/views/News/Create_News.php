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
    function Save_News() {
        var url = "index.php?r=News/Save_News";
        var News_Catagories = $("#News_Catagories").val();
        var News_Groups = $("#News_Groups").val();
        var News_Head = $("#News_Head").val();
        var News_Owner = $("#News_Owner").val();
        var News_Detail = CKEDITOR.instances.News_Detail.getData();
        //var News_Detail = $("#News_Detail").val();
        //alert(News_Groups);

        var data = {
            News_Head: News_Head,
            News_Catagories: News_Catagories,
            News_Groups: News_Groups,
            News_Detail: News_Detail,
            News_Owner: News_Owner

        };
        if (News_Head == '' || News_Detail == '') {
            alert("กรอกข้อมูลใน * ไม่ครบ ..");
            return false;
        }

        $.post(url, data, function (resule) {
            window.location = "index.php?r=news/news_upload_images&news_id=" + resule;
        });
    }

</script>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>ประกาศข่าว</h4>
    </div>
    <div class="panel-body">
        <div class="form">
            <div class="row">
                <div class="col-sm-2">
                    <label>หัวข้อข่าว</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" id="News_Head" name="News_Head" class="form-control input-sm" required="required"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <label>ประเภทข่าว</label>
                </div>
                <div class="col-sm-3">
                    <select id="News_Catagories" name="News_Catagories" class="form-control input-sm">
                        <option value="1">ข่าวทั่วไป</option>
                        <option value="2">ข่าวภายในนักศึกษา</option>
                    </select>
                </div>
                <div class="col-sm-2">

                </div>
                <div class="col-sm-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <textarea id="News_Detail" name="News_Detail" class="ckeditor" required="required"/></textarea>
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
    <div class="panel-footer" style="text-align: right;">
        <div class="row" style="padding-right: 10px;">
            <button type="button" class="btn btn-primary" onclick="Save_News();">
                <i class="fa fa-save"></i> บันทึกข้อมูล
            </button>
            <button type="button" class="btn btn-danger">
                <i class="fa fa-remove"></i> ยกเลิก
            </button>
        </div>
    </div>
</div>