console.log('Supplier is running...')

const supplierController = ((session) => {
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
                url: `${BASE_URL}int/supplier`,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
                    xhr.setRequestHeader("SCM-INT-KEY", TOKEN)
                }
            },
            columns: [
                { "data": 'id_supplier' },
                { "data": 'nama_supplier' },
                { "data": 'alamat' },
                { "data": 'telepon' },
                { "data": 'fax' },
                { "data": 'email' },
                { "data": 'status_supplier' },
                {
                    "data": null, 'render': function (data, type, row) {
                        if (level === 'Admin') {
                            return `
                                <a class="btn btn-sm btn-success" href="#/supplier/edit/${row.id_supplier}"><i class="fa fa-pencil"></i></a>
                                <button class="btn btn-sm btn-danger btn_delete" data-id="${row.id_supplier}"><i class="fa fa-trash"></i></button>
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
            let id_supplier = $(this).data('id');
            let ask = confirm(`Are you sure delete this data ${id_supplier} ?`);

            if (ask) {
                $.ajax({
                    url: `${BASE_URL}int/supplier/delete`,
                    type: 'DELETE',
                    dataType: 'JSON',
                    data: { id_supplier },
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
            session.getUser((user) => {
                setTable(DOM.table, user.level);
                deleteData(DOM);
            })
        }
    }
})(sessionController);
