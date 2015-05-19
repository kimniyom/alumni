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
</script>
<div class="box box-warning">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="fa fa-plus"></i> ประกาศข่าว</h4>
        </div>
        <div class="panel-body">
            <div class="form">
                <div></div>
                <div class="row">
                    <div class="col-sm-12">
                        <textarea id="News_Detail" name="News_Detail" class="ckeditor"></textarea>
                    </div>
                </div>
                <br/>

            </div><!-- form -->
        </div>
        <div class="panel-footer" style="text-align: right;">
            <div class="row" style="padding-right: 10px;">
                <button type="button" class="btn btn-primary" onclick="save_user();">
                    <i class="fa fa-save"></i> บันทึกข้อมูล
                </button>
                <button type="button" class="btn btn-danger">
                    <i class="fa fa-remove"></i> ยกเลิก
                </button>
            </div>
        </div>
    </div>
</div>