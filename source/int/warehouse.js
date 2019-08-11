console.log('Warehouses is running...')

const warehouseController = ((session) => {
    const setTable = (table, level) => {
        $(table).DataTable({
            columnDefs: [{
                targets: [],
                searchable: true
            }],
            autoWidth: true,
            responsive: true,
            processing: true,
            ajax: {
                url: `${BASE_URL}int/warehouse`,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
                    xhr.setRequestHeader("SCM-INT-KEY", TOKEN)
                }
            },
            columns: [
                { "data": 'id_warehouse' },
                { "data": 'nama_warehouse' },
                { "data": 'alamat' },
                { "data": 'telepon' },
                { "data": 'fax' },
                { "data": 'email' },
                {
                    "data": null, 'render': function (data, type, row) {
                        if (level === 'Admin') {
                            return `
                                <a class="btn btn-sm btn-success" href="#/warehouse/edit/${row.id_warehouse}"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-sm btn-danger btn_delete" data-id="${row.id_warehouse}"><i class="fa fa-trash"></i></button>
                            `
                        } else {
                            return '-'
                        }
                    }
                },
            ],
            order: [[0, 'desc']]
        });
    }

    const deleteData = (DOM) => {
        $(`${DOM.table}`).on('click', DOM.delete, function () {
            let id_warehouse = $(this).data('id');
            let ask = confirm(`Are you sure delete this data ${id_warehouse} ?`);

            if (ask) {
                $.ajax({
                    url: `${BASE_URL}int/warehouse/delete`,
                    type: 'DELETE',
                    dataType: 'JSON',
                    data: { id_warehouse },
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
                        xhr.setRequestHeader("SCM-INT-KEY", TOKEN)
                    },
                    success: function (res) {
                        $(DOM.table).DataTable().ajax.reload();
                        makeNotif('success', 'Failed', res.message, 'bottom-right')
                    },
                    error: function ({ responseJSON }) {
                        makeNotif('error', 'Failed', responseJSON.message, 'bottom-right')
                    }
                })
            }
        });
    }


    return {
        init: (DOM) => {
            console.log('ini initsss')
            session.getUser((user) => {
                setTable(DOM.table, user.level);
                deleteData(DOM);
                
            })
        }
    }
})(sessionController);