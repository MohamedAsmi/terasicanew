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

    ];

    let table = await initDataTable($('#reservation-list'), tbl1);



});
