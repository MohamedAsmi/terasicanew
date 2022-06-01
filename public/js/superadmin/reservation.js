$(document).ready(async function () {
    let tbl1 = [{
            data: 'r_name'
        },
        {
            data: 'num_of_book'
        },
        {
            data: 'date'
        },
        {
            data: 'clock_time'
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

    let table = await initDataTable($('#reservation-list'), tbl1);



});
