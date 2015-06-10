function save_edit_user() {
    var url = 'index.php?r=frontend/user/save_edit_user';
    //alert(url);
    var id = $("#agent_id").val();
    var shot_name = $('#shot_name').val();
    var name = $('#name').val();
    var lname = $('#lname').val();
    //var username = $('#username').val();
    //var password = $('#password').val();
    var tel = $('#tel').val();
    var mobile = $('#mobile').val();
    var email = $("#email").val();
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

    if (tel == '') {
        $("#tel").focus();
        return false;
    }

    if (mobile == '') {
        $("#mobile").focus();
        return false;
    }

    if (email == '') {
        $("#email").focus();
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
        id: id,
        shot_name: shot_name,
        name: name,
        lname: lname,
        tel: tel,
        mobile: mobile,
        email: email,
        company: company,
        address: address
    }
    $.post(url, data, function (success) {
        window.location = "index.php?r=frontend/user/detail_agent";
    });
}

