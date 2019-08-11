<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Warehouse</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Warehouse</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
        <a style="float: right;" href="#/warehouse/add" class="btn btn-md btn-info">Add</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="t_warehouse">
                        <thead>
                            <tr>
                                <th>ID Warehouse</th>
                                <th>Nama Warehouse</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Fax</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        const DOM = {
            table: '#t_warehouse',
            delete: '.btn_delete'
        }

        warehouseController.init(DOM);
     
    })
</script>