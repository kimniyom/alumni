$(document).ready(function(){
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#detail_collegian").html(loading);
    var collegian_code = $("#collegian_code").val();
    var url = "index.php?r=frontend/collegian/detail_collegian";
    var data = {collegiancode: collegian_code};
    $.post(url,data,function(result){
        $("#detail_collegian").html(result);
    });
});


