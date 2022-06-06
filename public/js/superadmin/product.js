$(document).ready(async function () {
    let tbl1 = [{
            data: 'p_name'
        },
        {
            data: 'osio'
        },
        {
            data: 'hinda'
        },
        {
            data: 'v_muo'
        },
        {
            data: 'status'
        },
        {
            data: 'edit',
            sortable: false,
            searchable: false
        },
        {
            data: 'delete',
            sortable: false,
            searchable: false
        },
    ];

    let table = await initDataTable($('#product_list_update'), tbl1);



});


$(document).on('click', '.delete', function () {
    $('#delete-modal .modal-title').html('Delete Time Inflation Code');
    $('#delete-modal #ajax-form').attr('method', 'DELETE');
    $('#delete-modal #ajax-form').attr('action', $(this).attr('data-url'));
    $('#delete-modal #ajax-form').attr('data-table', 'product_list_update');
    let modal = new bootstrap.Modal(document.getElementById('delete-modal'));
    modal.show();
    
});