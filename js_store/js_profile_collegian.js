//  Function Create By Kimniyom 12-05-2015

$(document).ready(function () {
    codeline_up1();
    codeline_down1();
    get_work_history();
    get_learning_history();
    get_workings();
    get_aptitude();
    get_etc();
    //check ความสมบูรณ์ข้อมูล
    var c_card = $("#c_card").val();
    if (c_card == '') {
        $("#error_detail").show();
    }
});

function edit_img_profile() {
    $("#from_img_profile").modal();
}

function autoload_img_profile() {
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#show_img_profile").html(loading);
    var url = "index.php?r=frontend/collegian/img_profile";
    var collegiancode = $("#collegian_code").val();
    var data = {collegian_code: collegiancode};
    $.post(url, data, function (success) {
        $("#show_img_profile").html(success);
    });
}

function autoload_imf_profile() {
    var url = "index.php?r=frontend/collegian/img_profile";
    var colegiancode = $("#collegian_code").val();
    var data = {collegian_code: colegiancode};
    $.post(url, data, function (success) {
        $("#img_profile").html(success);
    });
}

//ดึงข้อมูลพี่รหัสมาแสดง
function get_senior() {
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#senior_code").html(loading);
    var url = "index.php?r=frontend/collegian/senior";
    var collegiancode = $("#collegian_code").val();
    var data = {collegian_code: collegiancode};
    $.post(url, data, function (success) {
        $("#senior_code").html(success);
    });
}

//เปิด dialog เพื่อเพิ่ม พี่รหัส
function dialog_senior() {
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#show_senion").html(loading);
    var url = "index.php?r=frontend/collegian/get_senior_all";
    var collegiancode = $("#collegian_code").val();
    var data = {collegian_code: collegiancode};
    $.post(url, data, function (success) {
        $("#show_senion").html(success);
    });
    $("#dialog_senior").modal();
}

function add_senior(line_id, senior_code, gennumber) {
    var collegian_code = $("#collegian_code").val();
    var senior_code = senior_code;
    var GenNumber = gennumber;
    var line_id = line_id;

    var url = "index.php?r=frontend/collegian/save_senior";
    var data = {
        collegian_code: collegian_code,
        senior_code: senior_code,
        GenNumber: GenNumber,
        line_id: line_id
    };

    $.post(url, data, function (success) {
        get_senior();
        window.location.reload();
        //$("#dialog_senior").modal("hide");
    });
}


//ดึงข้อมูลพี่รหัสมาแสดง
function codeline_up1() {
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#codeline_up1").html(loading);
    var url = "index.php?r=frontend/collegian/codeline_up1";
    var collegiancode = $("#collegian_code").val();
    var data = {collegian_code: collegiancode};
    $.post(url, data, function (success) {
        $("#codeline_up1").html(success);
    });
}

//ดึงข้อมูลพี่รหัสมาแสดง
function codeline_down1() {
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#codeline_down1").html(loading);
    var url = "index.php?r=frontend/collegian/codeline_down1";
    var collegiancode = $("#collegian_code").val();
    var data = {collegian_code: collegiancode};
    $.post(url, data, function (success) {
        $("#codeline_down1").html(success);
    });
}

//ดึงข้อมูลประวัติการทำงานมาแสดง
function get_work_history() {
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#workhistory").html(loading);
    var url = "index.php?r=frontend/workhistory/get_work";
    var collegiancode = $("#collegian_code").val();
    var data = {collegian_code: collegiancode};
    $.post(url, data, function (success) {
        $("#workhistory").html(success);
    });
}

//ดึงข้อมูลประวัติการศึกษามาแสดง
function get_learning_history() {
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#learninghistory").html(loading);
    var url = "index.php?r=frontend/learninghistory/get_learning";
    var collegiancode = $("#collegian_code").val();
    var data = {collegian_code: collegiancode};
    $.post(url, data, function (success) {
        $("#learninghistory").html(success);
    });
}

//ดึงข้อมูลผลงานมาแสดง
function get_workings() {
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#workings").html(loading);
    var url = "index.php?r=frontend/workings/get_workings";
    var collegiancode = $("#collegian_code").val();
    var data = {collegian_code: collegiancode};
    $.post(url, data, function (success) {
        $("#workings").html(success);
    });
}

//แก้ไขชื่อ โปรไฟล์ 
function Edit_name_profile() {
    var url = "index.php?r=frontend/collegian/edit_name_profile";
    var collegiancode = $("#collegian_code").val();
    var collegian_name = $("#edit_collegian_name").val();
    var collegian_lname = $("#edit_collegian_lname").val();
    var data = {
        collegian_code: collegiancode,
        collegian_name: collegian_name,
        collegian_lname: collegian_lname
    };
    $.post(url, data, function (success) {
        window.location.reload();
    });
}

//ดึงข้อมูลความถนัด
function get_aptitude() {
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#aptitude").html(loading);
    var url = "index.php?r=frontend/aptitude/get_aptitude";
    var collegiancode = $("#collegian_code").val();
    var data = {collegian_code: collegiancode};
    $.post(url, data, function (success) {
        $("#aptitude").html(success);
    });
}

//ดึงข้อมูลอื่น ๆ 
function get_etc() {
    var loading = "<center><div class='overlay'><i class='fa fa-refresh fa-spin'></i></div><center>";
    $("#etc").html(loading);
    var url = "index.php?r=frontend/collegian_etc/get_etc";
    var collegiancode = $("#collegian_code").val();
    var data = {collegian_code: collegiancode};
    $.post(url, data, function (success) {
        $("#etc").html(success);
    });
}



