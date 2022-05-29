$(document).ready(async function () {
    alert('asdas');
    let columns = [{
            data: 'first_name',
            name: 'u.first_name'
        },
        {
            data: 'role_code',
            name: 'r.code'
        },
        {
            data: 'role_name',
            name: 'r.name'
        },
        {
            data: 'actions',
            sortable: false,
            searchable: false
        },
    ];
    let table = await initDataTable($('#reservation-list'), columns);
});
