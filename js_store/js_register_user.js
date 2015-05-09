function save_user() {
    var url = 'index.php?r=frontend/user/save_register';
    //alert(url);
    var shot_name = $('#shot_name').val();
    var name = $('#name').val();
    var lname = $('#lname').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var tel = $('#tel').val();
    var mobile = $('#mobile').val();
    var company = $('#company').val();
    var address = $('#address').val();

    if (name == '') {
        $("#name").focus();
        return false;
    }

    if (lname == '') {
        $("#lname").focus();
        return false;
    }

    if (username == '') {
        $("#username").focus();
        return false;
    }

    if (password == '') {
        $("#password").focus();
        return false;
    }

    if (tel == '') {
        $("#tel").focus();
        return false;
    }

    if (mobile == '') {
        $("#mobile").focus();
        return false;
    }

    if (company == '') {
        $("#company").focus();
        return false;
    }

    if (address == '') {
        $("#address").focus();
        return false;
    }


    var data = {
        shot_name: shot_name,
        name: name,
        lname: lname,
        username: username,
        password: password,
        tel: tel,
        mobile: mobile,
        company: company,
        address: address
    }
    $.post(url, data, function (success) {
        if (success == '0') {
            alert("ลงทะเบียนใช้งานระบบ สำเร็จ รอการยืนยันจากผู้ดูแลระบบ ...");
            window.location="index.php?r=site/index";
        } else {
            alert("ชื่อผู้ใช้งาน และรหัสผ่านนี้มีผู้ใช้งานแล้ว ...");
            return false;
        }
    });
}

