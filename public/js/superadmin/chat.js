fullurl = window.location.pathname;
baseurl = fullurl.replace('chats', '');

$('.chat_lst').first().addClass('select_chat');

Getchar();
/////////////////////////////////////////////////////////////////////////////////////////////////
$('.closechatButton').fadeOut();
$('.send_msg').on('click', function (event) {
    event.preventDefault();
    sendMsg();
    // scrollLastMsg();
});
if ($(".chat_lst.select_chat").attr("attr_main") == "group") {
    $(".group_list").removeClass("hide");
} else {
    $(".group_list").addClass("hide");
}
//////////////////////////////////////////////////////////////////////////////////////////////////
$('[name="response_msg"]').keypress(function (e) {
    if (e.which == 13) {
        sendMsg();
        // scrollLastMsg();
    }
});
//////////////////////////////////////////////////////////////////////////////////////////////////
var topPostion = 0;
$('[name="employeeId"]').val($('.select_chat').attr('attr_id'));
$('.no-gutters .profile-image').attr('src', $('.select_chat img').attr('src'));
$('.no-gutters h5').text($('.select_chat h6').text());
$('[name="mainId"]').val($('.select_chat').attr('attr_main'));

/////////////////////////////////////////////////////////////////////////////////////////////////////
$('.chat_lst').on('click', function () {
    $("#select_menu").hide();

    $('.chat-panel.chatPostion').html('');
    $('.chat_lst').each(function () {
        $(this).removeClass('select_chat');
    })
    var employeeID = $('[name="employeeId"]').val($(this).attr('attr_id'));
    $(this).addClass('select_chat');
    $('.no-gutters .profile-image').attr('src', $('.select_chat img').attr('src'));
    $('.no-gutters h5').text($('.select_chat h6').text());
    var mainID = $('[name="mainId"]').val($('.select_chat').attr('attr_main'));

    $("#chat_count").attr('attr', '2');
    Getchar();
    $("#chat_count").attr('se_attr', '2');
    scrollLastMsg();
    if ($(this).attr("attr_main") == "group") {

        $(".group_list").removeClass("hide");
    } else {
        $(".group_list").addClass("hide");
    }
})
///////////////////////////////////////////////////////////////////////////////////////////////////////
function scrollLastMsg() {
    var checkExist = setInterval(function () {
        if ($('#lastmessage').length) {
            var container = $('.chatPostion');
            var scrollTo = $(".content-wrapper.chat_wrapper");

            container.css('overflow', 'unset');
            scrollTo.css('position', 'relative');

            container.animate({ scrollTop: $(document).height() }, 1000);

            container.css('overflow', 'scroll');
            scrollTo.css('position', 'fixed');

            clearInterval(checkExist);
        }
    }, 1000)

}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function Getchar() {
    $.ajax({
        type: 'GET',
        url: baseurl + 'chatmap/' + $('.select_chat').attr('attr_id') + '?type=' + $('.select_chat').attr('attr_main'),
        success: function (data) {
            // console.log(data);
            if (data['time_schedule'].length > 1) {
                MsgArr = [];
                $.each(data, function (index, value) {
                    for (let r = 0; r < value.length; r++) {
                        if (value[r]['date'] != null) {
                            var msgDate = value[r]['date'].split(" ");
                            var msgdate = msgDate[0].split("-");
                            var msgtime = msgDate[1].split(":");
                            var d = new Date();
                            var time = d.toLocaleString('en-GB', { timeZone: 'Europe/Helsinki' }).split(',');
                            var curent_date = time[0].split("/");
                            month = curent_date[1];
                            cu_date = curent_date[0];
                            year = curent_date[2];

                            if (msgdate[2] == cu_date) {
                                date = msgtime[0] + ":" + msgtime[1];
                            } else {
                                if (month == msgdate[1] && year == msgdate[0]) {

                                    if (msgdate[2] == cu_date - 1) {
                                        date = "Yesterday " + msgtime[0] + ":" + msgtime[1];
                                    } else {
                                        date = msgdate[1] + "/" + msgdate[2] + " " + msgtime[0] + ":" + msgtime[1];
                                    }
                                } else {
                                    date = msgdate[1] + "/" + msgdate[2] + " " + msgtime[0] + ":" + msgtime[1];
                                }
                            }

                            if (value[r]['type'] != null && value[r]['type'] == 'group') {
                                var name = value[r]['name'].split(" ");
                                var msgName = name[0] + '  ';
                            } else {
                                var msgName = '';
                            }

                            if (index == 'resive') {
                                MsgArr[value[r]['date'] + '-rs' + value[r]['chat_id']] = '<div class="row no-gutters msg mt-3"><div class="offset-1 col-11 pl-1"><span class="msg_lable msg_lable-resiver">' + msgName + date + '</span></div><div class="col-1"><img src="' + baseurl + 'img/Memoji Boys.png" style="width: 60%; margin:10%;"></div><div class="col-md-10 pt-2"><span class="resive_massage">' + value[r]['message'] + '</span></div></div>';
                            } else if (index == 'sender') {
                                MsgArr[value[r]['date'] + '-rs' + value[r]['chat_id']] = '<div class="row no-gutters msg mt-3"><div class="offset-1 col-10 pl-1"><span class="msg_lable msg_lable-sender text-right">' + date + '</span></div><div class="col-1"></div><div class="col-10 offset-1"><span class="sender_massage">' + value[r]['message'] + '</span></div><div class="col-1 senderDeleteOrUpdate" attr_id="' + value[r]['chat_id'] + Math.random() + '"><img src="' + baseurl + 'img/Memoji Boys.png" style="width: 60%; margin:10%; float: right;"></div></div>';
                            }
                        }
                    }
                });
                var chat_msg = '';
                var num = $("#chat_count").attr('attr');
                x = 0;
                $('.dataLength').attr('totaldata', data['time_schedule'].length);
                if (data['time_schedule'].length > parseInt(num) * 10) {
                    x = data['time_schedule'].length - parseInt(num) * 10;
                }

                for (let time = x; time < data['time_schedule'].length; time++) {

                    if (typeof data['time_schedule'][time] === 'string' && data['time_schedule'][time] != null) {
                        chat_msg += MsgArr[data['time_schedule'][time]];
                    }

                }
                $('.chat-panel.chatPostion').html(chat_msg);
                $(".no-gutters.msg").last().attr('id', 'lastmessage');

            }
        }
    })
    $('.closechatButton').fadeOut();
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function sendMsg() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    fullurl = window.location.pathname;
    baseurl = fullurl.replace('chats', '');
    let response_msg = $('[name="response_msg"]').val();
    let employeeId = $('[name="employeeId"]').val();
    let _token = $('meta[name="csrf-token"]').attr('content');
    let chat_email = $('.select_chat').attr('attr_main');

    $.ajax({
        url: 'storechat',
        type: 'POST',
        dataType: "json",
        data: {
            response_msg: response_msg,
            employeeId: employeeId,
            _token: _token,
            chat_email: chat_email
        },
        success: function (data) {
            Getchar();
        }
    })
    $('[name="response_msg"]').val('');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('body').on({
    'click': function () {
        $(this).addClass('checked');
        $('.senderDeleteOrUpdate .checked').addClass('primary-text-cl-w').css('background-color', '#0099ff');
        $('.senderDeleteOrUpdate .checked').html('<i class="fa-solid fa-check m-auto"></i>');

    }
}, '.senderDeleteOrUpdate .checkbox');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$('body').on({
    'click': function () {
        $(this).html('');
        $(this).removeClass(['primary-text-cl-w', 'checked']).removeAttr('style');
    }
}, '.senderDeleteOrUpdate .checkbox.checked');

$('body').on({
    'click': function () {
        $(this).remove();
        loadContent();
    }
}, '.closechatButton');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
function selectOneByOne() {

    $('.chat-panel.chatPostion').after('<span class="closechatButton"><i class="fa-solid fa-xmark"></i></span>');
    $('.closechatButton').show();
    $(".senderDeleteOrUpdate").load(location.href + " .senderDeleteOrUpdate");
    setTimeout(function () {
        $('.senderDeleteOrUpdate').html('<span class="checkbox rounded-circle"> </span>');

    }, 1000)
    // console.log($('.senderDeleteOrUpdate img').attr('src') != null);
};
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function selectAll() {
    selectOneByOne();
    setTimeout(function () {
        $('.senderDeleteOrUpdate .checkbox').each(function () {
            $(this).addClass('checked');
            $('.senderDeleteOrUpdate .checked').addClass('primary-text-cl-w').css('background-color', '#0099ff');
            $('.senderDeleteOrUpdate .checked').html('<i class="fa-solid fa-check m-auto"></i>');
        });
    }, 1000)
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('.chatPostion').on('scroll', function (event) {
    var scroll = $(this).scrollTop();
    var num = $("#chat_count").attr('attr');
    var se_num = $("#chat_count").attr('se_attr');
    if (scroll == 0 && parseInt(se_num) == parseInt(num)) {

        $("#chat_count").attr('attr', parseInt(num) + 1);
        if (parseInt($('.dataLength').attr('totaldata')) > parseInt(num) * 10 && parseInt($('.dataLength').attr('totaldata')) > parseInt(num) * 10 - 10) {
            Getchar();
            console.log(parseInt($('.dataLength').attr('totaldata')));
        }
        $("#chat_count").attr('se_attr', parseInt(se_num) + 1);
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function deleteConfirmation(value) {
    $('.modal.fade').css({ 'display': 'block', 'opacity': '1' });
    $('.modal.fade .modal-dialog').css('height', '100%');
    $('.modal-content').css('top', '40%');
    $('.addoredit-modal-body .form-content').html('');

    if (value == 'del') {
        $('#EmployeeModal .delete-modal-body').html('<div class="text-center p-2  pt-3 mb-3 model_text primary-text-cl"><h5>Are you sure you want to delete?</h5></div><span class="float-right"><button type="button" class="btn primary-color primary-text-cl-w mt-3 mb-3" attr="close">Close</button><button type="button" class="btn btn-danger mt-3 mb-3 ml-2" attr="delete">Delete</button></span>');
    } else {
        $('#EmployeeModal .delete-modal-body').html('<div class="text-center p-2  pt-3 mb-3 model_text primary-text-cl"><h5>Are you sure you want to delete(' + $('.settings-tray .no-gutters .text h5').text() + ')?</h5></div><span class="float-right"><button type="button" class="btn primary-color primary-text-cl-w mt-3 mb-3" attr="close">Close</button><button type="button" class="btn btn-danger mt-3 mb-3 ml-2" attr="delete-team">Delete</button></span>');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('body').on({
    'click': function () {
        var comment = $(this).attr('attr');
        if (comment == 'delete') {
            deleteMsg();
        } else if (comment == 'delete-team') {
            alert();
        } else {
            $('.modal.fade').css({ 'display': 'none', 'opacity': '0' });
        }
    }
}, '.delete-modal-body button')

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function deleteMsg() {
    let ids = [];
    $('.senderDeleteOrUpdate .checkbox.checked').each(function () {
        ids.push($(this).closest("div").attr('attr_id'));
    })
    if (ids != '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: 'deletechat_msg',
            type: 'POST',
            dataType: "json",
            data: {
                chat_ids: ids
            },
            success: function (data) {

                alert(data['msg']);
                Getchar();
            }
        })
    } else {
        alert("Select the Massages to Delete");
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('#select_menu li').on('click', function () {

    var list_val = $(this).attr('value');

    if (list_val == 'del') {
        deleteConfirmation(list_val);
    } else if (list_val == 'set_a') {
        selectAll();
    } else if (list_val == 'create_team') {
        creatTeam();
    } else if (list_val == 'edit_team') {
        updateTeam();
    } else if (list_val == 'add_emp') {
        addEmloyee();
        // alert();
    } else if (list_val == 'del_team') {
        deleteConfirmation(list_val);
    } else {
        selectOneByOne()
    }
})
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('.chat_menu-icon').on('click', function () {
    if ($('#select_menu').attr('attr') == '1') {
        $('#select_menu').hide().attr('attr', '0');
    } else {
        $('#select_menu').show().attr('attr', '1');
    }
})
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function loadContent() {
    // $.getScript(baseurl + "js/superadmin/chat.js");
    $('#chat_script').load(fullurl + ' #chat_script', function (data) {
        // if(parseInt($('.refreshCount').attr('reloadcount')) > 20){
        //     location.reload();
        // }
        // $('.refreshCount').attr('reloadcount', parseInt($('.refreshCount').attr('reloadcount')) + 1);
        var $script = $(data).find('#chat_script').html();
        $('#chat_script script').remove();
        $('#chat_script').html($script);
    });

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function creatTeam() {
    $('.modal.fade').css({ 'display': 'block', 'opacity': '1' });
    $('.modal.fade .modal-dialog').css('height', '100%');
    $('.modal-content').css('top', '40%');
    $('.addoredit-modal-body form').attr('action', baseurl + 'createteam');
    $('.addoredit-modal-body .form-content').html('<label for="name" class="w-100 text-center mt-3 primary-text-cl"><h2>Lisää uusi tiimi</h2></label><label for="name" class="w-100 text-center mt-3 primary-text-cl"><h4>Työntekijän nimi</h4></label><input type="text" name="TeamName" id="" class="w-100 border border-secondary mb-3" style="border-radius: 5px;"><button type="submit" name="submit" class="btn primary-color primary-text-cl-w mb-4" style="margin-left: 43%;padding: 5px 30px;"><h4>Luo</h4></button>');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function updateTeam() {
    $('.modal.fade').css({ 'display': 'block', 'opacity': '1' });
    $('.modal.fade .modal-dialog').css('height', '100%');
    $('.modal-content').css('top', '40%');
    $('.addoredit-modal-body form').attr('action', baseurl + 'updateteam/' + $('.chat_lst.select_chat').attr('attr_id'));
    $('.addoredit-modal-body .form-content').html('<label for="name" class="w-100 text-center mt-3 primary-text-cl-b"><h2>Muokkaa tiimiä: <span class="primary-text-cl">' + $('.chat_lst.select_chat .text h6').text() + '</span></h2></label><label for="name" class="w-100 text-center mt-3 primary-text-cl"><h4>Tiimin nimi</h4></label><input type="text" name="TeamName" id="" class="w-100 border border-secondary mb-3" style="border-radius: 5px;"><button type="submit" name="submit" class="btn primary-color primary-text-cl-w mb-4" style="margin-left: 43%;padding: 5px 30px;"><h4>Tallenna</h4></button>');
}

$('.close').on('click', function () {
    $('.modal.fade').css({ 'display': 'none', 'opacity': '0' });
})
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function addEmloyee() {
    $('.modal.fade').css({ 'display': 'block', 'opacity': '1' });
    $('.modal.fade .modal-dialog').css('height', '100%');
    $('.modal-content').css('top', '40%');
    $('.addoredit-modal-body form').attr('action', baseurl + 'addemployeetoteam/' + $('.chat_lst.select_chat').attr('attr_id'));
    var allEmployee = '';
    var teamMembers = $('.chat_lst.select_chat .group_lst').attr('attr').split(',');
    if (teamMembers.length <= 21) {
        $('.contect_list .employee_btn').each(function () {
            var ext = false;
            for (let ww = 0; ww < teamMembers.length; ww++) {
                if ($(this).attr('attr') == teamMembers[ww]) {
                    $(this).addClass(['primary-color-b', 'cursorblock']).attr('disabled', true);
                    allEmployee += $(this).closest("p").html();
                    ext = true;
                }
            }
            if (ext === false) {
                $(this).addClass('cursorpoint');
                allEmployee += $(this).closest("p").html();
            }
        })
    }

    $('.addoredit-modal-body .form-content').html('<label for="name" class="w-100 text-center mt-3 primary-text-cl-b"><h2>Lisää työntekijöitä tiimiin</h2></label><label for="name" class="w-100 text-center mt-3 primary-text-cl"><h4>Valitse työntekijät</h4></label><div class="col-12 row employee_fields">' + allEmployee + '</div><input type="hidden" name="employee_ids" id="" class="w-100 border border-secondary mb-3" style="border-radius: 5px;"><button type="submit" name="submit" class="btn primary-color primary-text-cl-w mb-4 mt-3" style="margin-left: 39%;padding: 5px 30px;" disabled><h4>Tallenna</h4></button>');
    $('.employee_fields span').show();
}

$('body').on({
    'click': function () {
        var teamID = $('.chat_lst.select_chat').attr('attr_id');
        var teamMBR = $('[attr_id="' + teamID + '"] .group_lst').attr("attr").split(',');
        var list = true;
        var empId = $(this).attr('attr');
        for (let i = 1; i < teamMBR.length; i++) {
            if (empId == teamMBR[i]) {
                list = false;
            }
        }
        if (list) {
            var ids = $('[name="employee_ids"]').val();
            var mark = '';
            if ((ids) != '') {
                var mark = ',';
            }
            if (ids.indexOf(empId) == -1) {
                $('[name="employee_ids"]').val(ids + mark + empId);
                $('.addoredit-modal-body button').removeAttr('disabled');
                $(this).addClass('primary-color-b');
            }
        }
    }
}, '.employee_btn')
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////