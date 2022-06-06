fullurl = window.location.pathname;
baseurl = fullurl.replace('chats', '');
Getchar();

$('.send_msg').on('click', function (event) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    event.preventDefault();
    fullurl = window.location.pathname;
    baseurl = fullurl.replace('chats', '');
    let response_msg = $('[name="response_msg"]').val();
    let employeeId = $('[name="employeeId"]').val();
    let _token = $('meta[name="csrf-token"]').attr('content');
    let chat_email = $('.select_chat').attr('attr_main');

    $.ajax({
        url: 'storeChat',
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
});
$('[name="employeeId"]').val($('.select_chat').attr('attr_id'));
$('.no-gutters .profile-image').attr('src', $('.select_chat img').attr('src'));
$('.no-gutters h5').text($('.select_chat h6').text());
$('[name="mainId"]').val($('.select_chat').attr('attr_main'));

$('.chat_lst').on('click', function () {
    $('.chat-panel.chatPostion').html('');
    $('.chat_lst').each(function () {
        $(this).removeClass('select_chat');
    })
    var employeeID = $('[name="employeeId"]').val($(this).attr('attr_id'));
    $(this).addClass('select_chat');
    $('.no-gutters .profile-image').attr('src', $('.select_chat img').attr('src'));
    $('.no-gutters h5').text($('.select_chat h6').text());
    var mainID = $('[name="mainId"]').val($('.select_chat').attr('attr_main'));

    Getchar();
})


function Getchar() {
    $.ajax({
        type: 'GET',
        url: baseurl + 'chatmap/' + $('.select_chat').attr('attr_id'),
        success: function (data) {
            if (data['time_schedule'].length > 1) {
                MsgArr = [];
                $.each(data, function (index, value) {
                    if (index == 'resive') {
                        for (let r = 0; r < value.length; r++) {
                            MsgArr[value[r]['date']] = '<div class="row no-gutters msg mt-3"><div class="col-1 logoUpdate"><img src="' + baseurl + 'img/Memoji Boys.png" style="width: 60%; margin:10%;"></div><div class="col-md-10"><span class="resive_massage">' + value[r]['message'] + '</span></div></div>';
                        }
                    } else if (index == 'sender') {
                        for (let s = 0; s < value.length; s++) {
                            MsgArr[value[s]['date']] = '<div class="row no-gutters msg mt-3"><div class="col-10 offset-1"><span class="sender_massage">' + value[s]['message'] + '</span></div><div class="col-1 logoUpdate"><img src="' + baseurl + 'img/Memoji Boys.png" style="width: 60%; margin:10%; float: right;"></div></div>';
                        }
                    }
                });
                var chat_msg = '';
                for (let time = 0; time < data['time_schedule'].length; time++) {

                    if (typeof data['time_schedule'][time] === 'string') {
                        chat_msg += MsgArr[data['time_schedule'][time]];
                    }

                }
                $('.chat-panel.chatPostion').html(chat_msg);
                $(".no-gutters.msg").last().attr('id', 'lastmessage');

                var container = $('.chatPostion');
                var scrollTo = $("#lastmessage");
                var position = scrollTo.offset().top - container.offset().top + container.scrollTop();
                container.animate({
                    scrollTop: position
                });
            }
        }

    })
}


setTimeout(function () {
    $.getScript(baseurl + "js/superadmin/chat.js");
}, 1000000);