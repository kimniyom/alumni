$(document).ready(function () {
    var status_user = $("#status_user").val();
    if (status_user != '') {
        var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
        $("#box_detail_user").html(loading);
        var url = "index.php?r=frontend/privilege/box_detail_user";
        var data = {status_user: status_user};
        $.post(url, data, function (result) {
            $("#box_detail_user").html(result);
        });
    }
});