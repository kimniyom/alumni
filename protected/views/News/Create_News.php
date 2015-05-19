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
            News_Groups:News_Groups,
            News_Detail: News_Detail,
            News_Owner:News_Owner
            
        };
        if (News_Head == '' || News_Detail == '') {
            alert("กรอกข้อมูลใน * ไม่ครบ ..");
            return false;
        }

        $.post(url, data, function (resule) {
            window.location.reload();
        });
    }

    function delete_workings(id) {
        var url = "index.php?r=frontend/workings/delete_workings";
        var data = {id: id};
        var r = confirm("คุณแน่ใจหรือไม่ที่จะลบ ...!");
        if (r == true) {
            $.post(url, data, function (resul) {
                window.location.reload();
            });
        }
    }
</script>
<div class="box box-warning">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>ประกาศข่าว</h4>
        </div>
        <div class="panel-body">
            <div class="form">
                <div class="row">
                    <div class="col-sm-1">
                        <label>หัวข้อข่าว</label>
                    </div>
                    <div class="col-sm-11">
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
                            <?php foreach ($News_Catagories as $rs): ?>
                                <option value="<?php echo $rs['News_Catagory_id']; ?>"><?php echo $rs['News_Catagory']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label aling="right">แสดงที่กลุ่ม</label>
                    </div>
                    <div class="col-sm-3">
                        <select id="News_Groups" name="News_Groups" class="form-control input-sm">
                            <?php foreach ($News_Groups as $rs): ?>
                                <option value="<?php echo $rs['News_Group_id']; ?>"><?php echo $rs['News_Group']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <textarea id="News_Detail" name="News_Detail" class="ckeditor" required="required"/></textarea>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-sm-2" align="right">
                        <label>เจ้าของข่าว</label>
                    </div>
                    <div class="col-sm-2" align="Left">
                        <input type="text" id="News_Owner" name="News_Owner" class="form-control input-sm"/>
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
</div>