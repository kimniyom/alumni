function save_collegian() {
    var url = 'index.php?r=Collegian/Save_collegian';
    //alert(url);
    var collegian_code = $('#collegian_code').val();
    var shot_name = $('#shot_name').val();
    var collegian_name = $('#collegian_name').val();
    var collegian_lname = $('#collegian_lname').val();
    var collegian_username = $('#collegian_username').val();
    var collegian_password = $('#collegian_password').val();
    var collegian_card = $('#collegian_card').val();
    var day = $('#day').val();
    var month = $('#month').val();
    var year = $('#year').val();
    var changwat_code = $('#changwat_code').val();
    var ampur_code = $('#ampur_code').val();
    var tambon_code = $('#tambon_code').val();
    var zipcode = $('#zipcode').val();
    var weight = $('#weight').val();
    var height = $('#height').val();
    var collegian_email = $('#collegian_email').val();
    var collegian_tel = $('#collegian_tel').val();
    var occupation = $('#occupation').val();
    var GenNumber = $("#GenNumber").val();
    if (collegian_code == '' || collegian_code.length != '13') {
        $('#collegian_code').focus();
        return false;
    }

    if (collegian_name == '') {
        $("#collegian_name").focus();
        return false;
    }

    if (collegian_lname == '') {
        $("#collegian_lname").focus();
        return false;
    }

    if (collegian_username == '') {
        $("#collegian_username").focus();
        return false;
    }

    if (collegian_password == '') {
        $("#collegian_password").focus();
        return false;
    }

    if (collegian_card == '' || collegian_card.length != '13') {
        $('#collegian_card').focus();
        return false;
    }

    if (changwat_code == '') {
        $("#changwat_code").focus();
        return false;
    }

    if (ampur_code == '') {
        $("#ampur_code").focus();
        return false;
    }

    if (tambon_code == '') {
        $("#tambon_code").focus();
        return false;
    }

    if (zipcode == '') {
        $("#zipcode").focus();
        return false;
    }

    if (weight == '') {
        $("#weight").focus();
        return false;
    }

    if (height == '') {
        $("#height").focus();
        return false;
    }

    if (collegian_email == '') {
        $("#collegian_email").focus();
        return false;
    }

    if (collegian_tel == '' || collegian_tel.length != '10') {
        $("#collegian_tel").focus();
        return false;
    }


    var data = {
        collegian_code: collegian_code,
        shot_name: shot_name,
        collegian_name: collegian_name,
        collegian_lname: collegian_lname,
        collegian_username: collegian_username,
        collegian_password: collegian_password,
        collegian_card: collegian_card,
        day: day,
        month: month,
        year: year,
        changwat_code: changwat_code,
        ampur_code: ampur_code,
        tambon_code: tambon_code,
        zipcode: zipcode,
        weight: weight,
        height: height,
        collegian_email: collegian_email,
        collegian_tel: collegian_tel,
        occupation: occupation,
        GenNumber: GenNumber
    }
    $.post(url, data, function (success) {
        if (success == 'success') {
            window.location.reload();
        } else {
            alert("รหัสนี้ได้ลงทะเบียนแล้วกรุณาตรวจสอบ ...");
            return false;
        }
    });
}

