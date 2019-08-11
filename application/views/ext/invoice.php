 <div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-black m-b-0 m-t-0">Invoice</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Invoice</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 text-right">
            <a href="#/add_invoice" class="btn btn-info"><span class="fas fa-plus"></span> Add</a>
        </div>
    </div>

    <div class="card animated bounceInUp">
        <div class="card-header bg-info">
            <h5 class="text-white">Data Invoice</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive" >
              <table class="table table-hover dataTable" id="detail_invoice" >
                <thead>
                  <tr>
                    <!-- <th>No Invoice</th> -->
                    <th>No Order</th>
                    <th>Supplier</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

  function loadInvoice(){

    // console.log(TOKEN_EXT.token);


  }

  $(document).ready(function() {
    'use strict'
    // loadInvoice()
    var table = $('#detail_invoice').DataTable({
        // columnDefs:[{
        //   targets:[],
        //   searchable:false
        // },{
        //   targets:[],
        //   orderable:false
        // }],
        // responsive:true,
        // processing:true,
        ajax:{
          url: `<?= base_url().'ext/Invoice'?>`,
          type: 'GET',
          dataType: 'JSON',
          beforeSend: function(xhr) {
              xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
              xhr.setRequestHeader("SCM-INT-KEY",TOKEN_EXT.token)
          },
          dataSrc: function(res){
            return res
          }
        },
        columns:[
          // {"data":null,"render":function(data,type,row){
          //   return `<a href="#/detail_invoice/${row.no_invoice}" class="btn btn-info btn-sm">${row.no_invoice}</a>`
          // }},
          {"data":"no_invoice"},
          {"data":"supplier.nama_supplier"},
          {"data":"tgl_invoice"},
          {"data":"tgl_tempo"},
          {"data":"status_invoice"},
        ],
        // order:[[0,'desc']]
      });

  });
</script>
