$(document).ready(async function () {
    fullurl = window.location.pathname;
    baseurl = fullurl.replace('Employees', '');
    var employeelist = [];
    var pagination = '';
    var limit = 10;
    $.ajax({
        type: 'GET',
        url: baseurl + 'employeetablemap',
        success: function (data) {
            var table_column = '';
            for (let dd = 0; dd < data.length; dd++) {
                employeelist.push(data[dd]);
                if (dd < limit) {
                    if (dd % 2 === 0) {
                        table_column += "<tr class='odd'><td class='em_name'><span class='circle-logo'><img src='" + baseurl + "img/Memoji Boys.png' style='width: 80%; margin:10%;'></span>" + data[dd]['e_name'] + "</td><td>" + data[dd]['work_task'] + "</td><td>" + data[dd]['n_of_h_week'] + "</td><td>" + data[dd]['last_spot'] + "</td> <td><span class='left_alignment edit_button  row_button' employee_id='"+employeelist[dd]['employee_id']+Math.random()+"'>Muokkaa</span></td><td><span class='left_alignment row_button delete_employee' employee_id='"+employeelist[dd]['employee_id']+Math.random()+"'>Poista</span></td></tr>";
                    }
                    else {
                        table_column += "<tr class='even'><td class='em_name'><span class='circle-logo'><img src='" + baseurl + "img/Memoji Boys.png' style='width: 80%; margin:10%;'></span>" + data[dd]['e_name'] + "</td><td>" + data[dd]['work_task'] + "</td><td>" + data[dd]['n_of_h_week'] + "</td><td>" + data[dd]['last_spot'] + "</td> <td><span class='left_alignment edit_button  row_button' employee_id='"+employeelist[dd]['employee_id']+Math.random()+"'>Muokkaa</span></td><td><span class='left_alignment row_button delete_employee' employee_id='"+employeelist[dd]['employee_id']+Math.random()+"'>Poista</span></td></tr>";
                    }

                }

            }
            if (limit < data.length) {
                var totalPage = "" + employeelist.length / 10;
                pageCount = totalPage.split('.');
                pagination = '<div><nav class="navigation-t" aria-label="Page navigation example"><ul class="pagination justify-content-end"><li class="page-item disabled" attr="prv"><a class="page-link" tabindex="-1">Previous</a></li><li class="page-item selected disabled" attr="1"><a class="page-link">1</a></li><li class="page-item" attr="2"><a class="page-link" >2</a></li><li class="page-item" attr="nxt"><a class="page-link" tabindex="+1">Next</a></li></ul></nav></div>';
            }

            $("#employee_list tbody").html(table_column);
            $("#employee_list").after(pagination);
        }

    });

    $('body').on({
        'click': function () {
            cuPage = $('li.page-item.selected').attr('attr');
            currentpage = $(this).attr('attr');

            var totalPage = "" + employeelist.length / 10;
            pageCount = totalPage.split('.');
            if (pageCount[1] != '') {
                totalPageCount = parseInt(pageCount[0]) + 1;
            } else {
                totalPageCount = pageCount[0];
            }
            PageList = [
                '0', ''
            ];
            if (currentpage == 'nxt') {
                xs = parseInt(cuPage) + 1;
            } else if (currentpage == 'prv') {
                xs = parseInt(cuPage) - 1;
            } else {
                xs = currentpage;
            }

            if (parseInt(totalPageCount) >= xs && xs > 0) {
                table_column = '';
                $('.page-item').each(function () {
                    $(this).removeClass(['disabled', 'selected']);
                })

                if (parseInt(currentpage) == 1) {
                    x = 1; y = 2;
                    nextAndPrv(x, y);
                    $("li[attr='prv']").addClass('disabled');
                    $("li[attr='1']").addClass(['disabled', 'selected']);
                } else if (parseInt(totalPageCount) == parseInt(currentpage)) {
                    x = parseInt(totalPageCount) - 1; y = parseInt(totalPageCount);
                    nextAndPrv(x, y);
                    $("li[attr='nxt']").addClass('disabled');
                    $("li[attr='" + parseInt(totalPageCount) + "']").addClass(['disabled', 'selected']);
                } else if (currentpage == 'prv') {
                    prvPage = parseInt(cuPage) - 1;

                    if (prvPage == 1) {
                        x = 1; y = 2;
                        nextAndPrv(x, y, first_page = '0');
                        $("li[attr='prv']").addClass('disabled');
                        $("li[attr='1']").addClass(['disabled', 'selected']);
                    }
                    else {
                        x = prvPage - 1; y = prvPage; z = prvPage + 1;
                        pagenation(x, y, z);
                        $("li[attr='" + prvPage + "']").addClass(['disabled', 'selected']);
                    }
                } else if (currentpage == 'nxt') {

                    nxtPage = parseInt(cuPage) + 1;
                    if (nxtPage == parseInt(totalPageCount)) {
                        x = nxtPage - 1; y = nxtPage;
                        nextAndPrv(x, y);
                        $("li[attr='nxt']").addClass('disabled');
                        $("li[attr='" + nxtPage + "']").addClass(['disabled', 'selected']);
                    }
                    else {
                        x = nxtPage - 1; y = nxtPage; z = nxtPage + 1;
                        pagenation(x, y, z);
                        $("li[attr='" + nxtPage + "']").addClass(['disabled', 'selected']);
                    }
                } else {
                    x = parseInt(currentpage) - 1; y = parseInt(currentpage); z = parseInt(currentpage) + 1;
                    pagenation(x, y, z);
                    $("li[attr='" + parseInt(currentpage) + "']").addClass(['disabled', 'selected']);
                }
                if (currentpage == 'nxt') {
                    xss = parseInt(cuPage) + 1;
                    qt = xss * 10;
                    qr = qt - 10;
                    if(qt > employeelist.length){
                        qt = employeelist.length;
                    }
                } else if (currentpage == 'prv') {
                    xss = parseInt(cuPage) - 1;
                    qt = xss * 10;
                    qr = qt - 10;
                    if(qt > employeelist.length){
                        qt = employeelist.length;
                    }
                } else {
                    xss = currentpage;
                    qt = xss * 10;
                    qr = qt - 10;
                    if(qt > employeelist.length){
                        qt = employeelist.length;
                    }
                }
                for (let qe = qr; qe < qt; qe++) {
                    if(employeelist[qe]['e_name'] != ''){
                        if (qe % 2 === 0) {
                            table_column += "<tr class='odd'><td class='em_name'><span class='circle-logo'><img src='" + baseurl + "img/Memoji Boys.png' style='width: 80%; margin:10%;'></span>" + employeelist[qe]['e_name'] + "</td><td>" + employeelist[qe]['work_task'] + "</td><td>" + employeelist[qe]['n_of_h_week'] + "</td><td>" + employeelist[qe]['last_spot'] + "</td> <td><span class='left_alignment  edit_button row_button' employee_id='"+employeelist[qe]['employee_id']+Math.random()+"'>Muokkaa</span></td><td><span class='left_alignment row_button delete_employee' employee_id='"+employeelist[qe]['employee_id']+Math.random()+"'>Poista</span></td></tr>";
                        }
                        else {
                            table_column += "<tr class='even'><td class='em_name'><span class='circle-logo'><img src='" + baseurl + "img/Memoji Boys.png' style='width: 80%; margin:10%;'></span>" + employeelist[qe]['e_name'] + "</td><td>" + employeelist[qe]['work_task'] + "</td><td>" + employeelist[qe]['n_of_h_week'] + "</td><td>" + employeelist[qe]['last_spot'] + "</td> <td><span class='left_alignment  edit_button row_button' employee_id='"+employeelist[qe]['employee_id']+Math.random()+"'>Muokkaa</span></td><td><span class='left_alignment row_button delete_employee' employee_id='"+employeelist[qe]['employee_id']+Math.random()+"'>Poista</span></td></tr>";
                        }
                    }

                }
                $("#employee_list tbody").html(table_column);
            }
        }
    }, 'li.page-item');
    // console.log(employeelist);
    function nextAndPrv(x, y) {

        $(".navigation-t .pagination").html('<li class="page-item " attr="prv"><a class="page-link" tabindex="-1">Previous</a></li><li class="page-item" attr="' + x + '"><a class="page-link">' + x + '</a></li><li class="page-item" attr="' + y + '" ><a class="page-link">' + y + '</a></li><li class="page-item" attr="nxt"><a class="page-link" tabindex="+1">Next</a></li>');

    }

    function pagenation(x, y, z) {

        $(".navigation-t .pagination").html('<li class="page-item " attr="prv"><a class="page-link" tabindex="-1">Previous</a></li><li class="page-item" attr="' + x + '"><a class="page-link">' + x + '</a></li><li class="page-item" attr="' + y + '" ><a class="page-link">' + y + '</a></li><li class="page-item" attr="' + z + '"><a class="page-link">' + z + '</a></li><li class="page-item" attr="nxt"><a class="page-link" tabindex="+1">Next</a></li>');

    }

    $('body').on({
        'click': function () {
        var id = $(this).attr('employee_id');
        var record = id.split('0.');
        var name = $(this).closest('tr').find('.em_name').text();
        $('#EmployeeModal .delete-modal-body').html('<div class="text-center mb-3 model_text primary-text-cl"><h5>Record No: ('+record[0]+') <br>Are you sure you want to delete this employee('+name+')?</h5></div><span class="float-right"><button type="button" class="btn primary-color primary-text-cl-w mt-3 mb-3" attr="close">Close</button><button type="button" class="btn btn-danger mt-3 mb-3 ml-2" attr="delete">Delete</button></span>');
        // "<a href='"+baseurl+"employee/delete/"+employeelist[dd]['employee_id']+""+Math.random()+"'>";
        // "<a href='"+baseurl+"employee/delete/"+employeelist[dd]['employee_id']+""+Math.random()+"'>";
        $('#EmployeeModal').show().css('opacity','1');
        $('#EmployeeModal .modal-dialog').show().css('top','40%');
        $('#EmployeeModal button').attr('attr_id',id);
        $('.delete-modal-body').show();
        $('.addoredit-modal-body').hide();
    }},'.delete_employee');

    $('body').on({
        'click': function () {
       var fuc = $(this).attr('attr');
       var id = $(this).attr('attr_id');
        if(fuc == 'close'){
            $('#EmployeeModal').hide().css('opacity','0');
        }else{
            window.location.href = baseurl + "employee/delete/"+id;
        }
    }},'#EmployeeModal button')

    $(".add_employee").on('click',function(){
        $('.delete-modal-body').hide();
        $('.addoredit-modal-body').show();
        $('#EmployeeModal').show().css('opacity','1');
        $('#EmployeeModal .modal-dialog').show().css('top','20%');
        $('#EmployeeModal .addoredit-modal-body form').attr('action', baseurl+'employee/store');
        $('#EmployeeModal h2.title').text('Lisää uusi työntekijä')
        $('#EmployeeModal .addoredit-modal-body .form-content').html('<label for="name" class="w-100 text-center mt-3 primary-text-cl"><h4>Työntekijän nimi</h4></label><input type="text" name="EmployeeName" id="" class="w-100 border border-secondary" style="border-radius: 5px;"><label for="name" class="w-100 text-center mt-3 primary-text-cl"><h4>Työntekijän sähköpostiosoite</h4></label><input type="email" name="EmployeeEmail" id="" class="w-100 border border-secondary" style="border-radius: 5px;"><select name="team" id="" class="w-100 mt-4 mb-3 border border-secondary" style="border-radius: 5px; height: 35px;"><option value="">Valitse tiimi</option><option value="">{team-name}</option><option value="">{team-name}</option></select><button type="submit" name="submit" class="btn primary-color primary-text-cl-w mb-4" style="margin-left: 43%;padding: 5px 30px;"> Kutsu</button>');
    });

    $('.close_button').on('clcik',function(){
        $('#EmployeeModal').hide();
    })

    $('body').on({
        'click': function () {
            $('.delete-modal-body').hide();
            $('.addoredit-modal-body').show();
            $('#EmployeeModal').show().css('opacity','1');
            $('#EmployeeModal .modal-dialog').show().css('top','20%');
            var id = $(this).attr('employee_id');
            var name = $(this).closest('tr').find('.em_name').text();
            $('#EmployeeModal .addoredit-modal-body form').attr('action', baseurl+'employee/edit');
            $('#EmployeeModal h2.title').html('Muokkaa työntekijää:<br><span class="primary-text-cl">'+name+'</span>');
            $('#EmployeeModal .addoredit-modal-body .form-content').html('<input type="hidden" name="id" value="'+id+'" /><div class="col-md-6 col-12"><label for="name" class="w-100 text-center mt-3 primary-text-cl"><h4>Työntekijän nimi</h4></label><input type="text" name="EmployeeName" id="" class="w-100 border border-secondary" style="border-radius: 5px;"></div><div class="col-md-6 col-12"><label for="name" class="w-100 text-center mt-3 primary-text-cl"><h4>Puhelinnumero</h4></label><input type="tel" name="EmployeeTel" id="" class="w-100 border border-secondary" style="border-radius: 5px;"></div><div class="col-12 row"><div class="col-6"><label for="name" class="w-100 text-center mt-3 primary-text-cl"><h4>Sähköpostiosoite</h4></label></div></div><div class="col-md-6 col-12"><input type="email" name="EmployeeEmail" id="" class="w-100 border border-secondary" style="border-radius: 5px;"></div><div class="col-md-6 col-12"><select name="team" id="" class="w-100 border border-secondary" style="border-radius: 5px; height: 35px;"><option value="">Valitse tiimi</option><option value="">{team-name}</option><option value="">{team-name}</option></select></div><div class="col-md-6 m-auto"><label for="name" class="w-100 text-center mt-3 primary-text-cl"><h4>Viikottainen tuntimäärä</h4></label><input type="number" name="WeeklyHours" id="" class="w-100 border border-secondary" style="border-radius: 5px;"></div><button type="submit" name="submit" class="btn primary-color primary-text-cl-w mb-4 mt-4 offset-4 col-md-4" style="padding: 10px 20px;"> Tallenna</button>');
    }},'.edit_button')
});
