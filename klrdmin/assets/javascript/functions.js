function search_bar() {
    var dataString = $("#search").serialize();
    var lastID = $('.load-more').val()
    $.ajax({
        type: "POST",
        data: dataString,
        url: site_url + "/admin/search_bar",
        success: function (data) {
            $("#loader").css("display", "none");
            data = JSON.parse(data);
            $("#tbl_user_list").empty();
            append_user_data(data,lastID);
        }
    });
}

function brides() {
    // alert('hello');return false;
    // var dataString = $("#search").serialize();
    $.ajax({
        type: "POST",
        // data: dataString,
        url: site_url + "/admin/brides",
        success: function (data) {
            $("#tbl-user-list").html(data);
        }
    });
}

function onlyShow(divId) {
    document.getElementById(divId).style.display = "";
}

function onlyHide(divId) {
    document.getElementById(divId).style.display = "none";
}

function cancelTo(page) {
    window.location = site_url + page;
}

function deleteRecord(table, id, txt, redirect) {
    if (confirm("Are you sure you want to delete " + txt + ".")) {
        window.location = site_url + '/admin/deleteRecord/' + table + "/" + id + "/" + redirect;
    }
    return false;
}

function deleteUser1(id) {
    table = "user";
    redirect = "users";
    if (confirm("Are you sure you want to delete this user" + ".")) {
        $.ajax({
            url: site_url + '/admin/set_is_deleted/' + table + "/" + id + "/" + redirect,
            success: function (data) {
                $("#delete-btn-" + id).html('Deleted');
            }
        });
    }
    return false;
}
function deleteUser(table, id, txt, redirect) {
    if (confirm("Are you sure you want to delete " + txt + ".")) {
        $.ajax({
            url: site_url + '/admin/set_is_deleted/' + table + "/" + id + "/" + redirect,
            success: function (data) {
                $("#delete-btn-" + id).html('Deleted');
            }
        });
    }
    return false;
}

function deleteAbusedUser(table, id, txt, redirect) {
    if (confirm("Are you sure you want to delete " + txt + ".")) {
        window.location = site_url + '/admin/deleteAbusedUser/' + table + "/" + id + "/" + redirect;
    }
    return false;
}

// this function disables when radio is not checked
function toggleEnableById(chk, enable_id, disable_id) {
    if (chk.checked) {
        document.getElementById(enable_id).disabled = false;
        document.getElementById(disable_id).disabled = true;
        document.getElementById(enable_id).className = "input-shadow";
        if (disable_id == 'company_name') {
            document.getElementById(disable_id).className = "";
            document.getElementById(disable_id).style.width = "200px";
        }
    }
}

function changeStatus(table, status, id) {
    data = 'table=' + table + '&status=' + status + '&id=' + id;
    $.ajax({
        type: "POST",
        url: site_url + "/admin/changeStatus",
        data: data,
        success: function (data) {
            if (data == 1) {
                $("#status" + id).html('<span style="cursor:pointer;" onClick="changeStatus(\'' + table + '\',0,\'' + id + '\')"><img src="' + base_url + '/assets/images/right.png" /></span>');
            } else {
                $("#status" + id).html('<span style="cursor:pointer;" onClick="changeStatus(\'' + table + '\',1,\'' + id + '\')"><img src="' + base_url + '/assets/images/minus.png" /></span>');
            }
        }
    });
}

function tooltip(table, id) {
    $.ajax({
        type: "GET",
        url: site_url + "/admin/callback_StatusToolTip/" + table + "/" + id,
        success: function (data) { //alert(data);
            $("#tip" + id).html(data);
        }
    });
}


function adddEditAddStatus(table, status, id) {
    data = 'table=' + table + '&status=' + status + '&id=' + id;
    $.ajax({
        type: "POST",
        url: site_url + "/admin/adddEditAddStatus",
        data: data,
        success: function (data) {
            if (data == 1) {
                $("#" + table + id).html('<span style="cursor:pointer;" onClick="adddEditAddStatus(\'' + table + '\',0,\'' + id + '\')"><img src="images/right.png" /></span>');
            } else {
                $("#" + table + id).html('<span style="cursor:pointer;" onClick="adddEditAddStatus(\'' + table + '\',1,\'' + id + '\')"><img src="images/minus.png" /></span>');
            }
        }
    });
}

// function users_list(offset = 0)
// {
// off = $("#tbl_user_list tr").length-1;
// if(off>0){
// 	offset = off;
// }
// offset = $("#offset").val();
$(document).ready(function () {
    var lastID = 0;

    get_user_list(lastID);

});

function load_more_user(){
    $("#loader").css("display", "block");
    var lastID = $('.load-more').val()
    var total_user = $("#total-user").val();
        get_user_list(lastID);
}

// }

function get_user_list(lastID) {
    $.ajax({
        url: site_url + "admin/users_list/" + lastID,
        success: function (data) {
            $("#loader").css("display", "none");
            data = JSON.parse(data);
            append_user_data(data,lastID);

        }
    });
}

function append_user_data(data,lastID){
    var customCls = '';
    var key1 = '';
    var sno = '';
    var html = '';
    var html1 = '';
    $.each(data.users, function (key, value) {
        p_url = KALARS_URL + 'uploads/gallery/' + value.user_id + value.name + '/';
        if (value.profile_pic == '') {
            value.profile_pic = KALARS_URL + '/assets/images/default.png';
        }
        sno = parseInt(lastID) + key + 1;
        key1 = key+1;

        if(parseInt(key1)%2 == 0){
            customCls = "blue-bg"
        }else{
            customCls = "";
        }

        if(value.is_deleted == 0){
            var redirect = "users";
            var txt = "this user"
            var table = "user";
            html1 = '<span id="delete-btn-'+value.user_id+'" class="red">  <a href="javascript:void(0);"' +
                '                   onClick=deleteUser1('+value.user_id+');' +
                '                   class="delete"></a></span>'
        }else{
            html1 = '<span id="delete-btn-'+value.user_id+'" class="red"> Deleted </span>'
        }

        if (value.is_active) {
            html =
                `<span id="status`+value.user_id+`"
              onMouseover="tooltip('user','`+value.user_id+`')">
              <span style="cursor:pointer;" onClick="changeStatus('user',0,`+value.user_id+`)">
                        <img src="`+base_url+`/assets/images/right.png"/>
                        </span></span>`

        }
        else {
            html =
                `<span id="status`+value.user_id+`"
              onMouseover="tooltip('user','`+value.user_id+`')">
              <span style="cursor:pointer;" onClick="changeStatus('user',1,`+value.user_id+`)">
                            <img src="`+base_url+`/assets/images/minus.png"/>
                            </span></span>`

        }

        $("#tbl_user_list").append('<tr class="'+customCls+'"><td>' + sno + '</td>' +
            '<td>'+html+'</td><td>' + value.user_id + '</td>' +
            '<td><img src="' + value.profile_pic + '" width="30"/>' +
            '</td><td>' + value.name + '</td>' +
            '<td>' + value.phone_no + '</td>' +
            '<td>'+value.registered+'</td>' +
            '<td>  <a target="_blank" href="' + KALARS_URL + 'home/app_launch/' + value.user_id + '/shivadmin" class="pencil"></a>'+html1+'</td></tr>');

        $(function () {
            $("#status"+value.user_id).wTooltip({
                ajax: site_url + "admin/callback_StatusToolTip/user/"+value.user_id,
                fadeIn: 100,
                offsetY: 20,
                id: 'tip'+value.user_id,
                style: {border: "1px solid gray", padding: "1px"},
                fadeOut: 200
            });
        });

    });
    $('.load-more').val(parseInt(lastID) + 100);
    if(data.count>data.total){
        $("#load-more-btn").css("display","none");
    }
}