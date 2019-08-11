 <div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-black m-b-0 m-t-0">Delivery</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Shipping</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            
        </div>
    </div>


    <div class="card animated bounceInUp">
        <div class="card-header bg-info">
            <h5 class="text-white">Data Delivery</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive" >
              <table class="table table-hover dataTable" id="data_" >
                <thead>
                  <tr>
                    <th>No. Shipping</th>
                    <th>Invoice </th>
                    <th>Tanggal Shipping</th>
                    <th>No. Order</th>
                    <th>Status Shipping</th>
                  </tr>
                </thead>
                <tbody id="data_shipping">

                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
<script>
    loadshipping()

    function loadshipping()
    {
        $.ajax({
                url: '<?= base_url('ext/Shipping') ?>',
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(xhr){
                    xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
                    xhr.setRequestHeader("SCM-INT-KEY", TOKEN_EXT.token)
                },
                success: function(res){
                    let html = ''
                    if(res.status){
                        res.data.forEach(item => {
                            html += `
                                <tr>
                                    <td>${item.no_shipping} </td>
                                    <td>${item.invoice} </td>
                                    <td>${item.tgl_shipping} </td>
                                    <td>${item.order} </td>
                                    <td>${item.status_shipping} </td>
                                </tr>
                            `
                        })
                        
                    }
                    $('#data_shipping').html(html)
                },
                error: function(error){
                    console.log(error)
                }
            })
    }


</script>

 