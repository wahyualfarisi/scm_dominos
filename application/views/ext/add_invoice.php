<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-black m-b-0 m-t-0">Invoice</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#/invoice">Invoice</a></li>
                <li class="breadcrumb-item active">Add Invoice</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 text-right">
            <a href="#/invoice" class="btn btn-danger"><span class="fas fa-arrow-left"></span> Back</a>
        </div>
    </div>


    <div class="card animated bounceInUp">
        <div class="card-header bg-info">
            <h5 class="text-white">Form Add Invoice</h5>
        </div>
        <div class="card-body">
            <form id="form_invoice">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group" style="margin-top:23px;">
                        <input type="text" class="form-control" id="order" name="order" value="ORD001" placeholder="No Order" readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-warning" id="btn_lookup" type="button"><i class="fas fa-search" style="font-size:25px;"></i></button>
                            </span>
                        </div>
                        <small class="form-text text-danger" id="invalid_order"></small>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>Invoice Date<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="date" id="invoice" name="tgl_invoice" class="form-control">
                                <small class="form-text text-danger" id="invalid_invoice"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>Invoice Due Date <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="date" id="due_date" name="tgl_tempo" class="form-control">
                                <small class="form-text text-danger" id="invalid_due_date"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>Status <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select class="form-control" name="status_invoice" id="status">
                                  <option value="">--Pilih Status--</option>
                                  <option value="open">open</option>
                                  <option value="close">close</option>
                                </select>
                            </div>
                            <small class="form-text text-danger" id="invalid_status"></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="table-responsive" >
                    <table class="table table-hover table-stripped dataTable" id="setting">
                        <thead>
                        <tr>
                            <th style="width:20%;">Description</th>
                            <th style="width:10%;">Price</th>
                            <th style="width:10%;">Qty</th>
                            <th style="width:10%;">PPN</th>
                            <th style="width:10%;">Total Price</th>
                            <th><button type="button" class="btn btn-info btn-sm text-white" id="btn_addrow"><i class="fa fa-plus"></i> Add</button></th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><input type="text" name="deskripsi[]" value=""> </td>
                            <td><input type="number" name="harga[]" value=""> </td>
                            <td><input type="number" name="qty[]" value=""> </td>
                            <td><input type="number" name="ppn[]" value=""> </td>
                            <td><input type="number" name="total_harga[]" value=""> </td>
                          </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <center><button type="submit" class="btn btn-bold btn-pure btn-info" id="btn_add" style="margin-top:35px;">Submit</button><center>
            </form>
        </div>
    </div>

</div>

<div class="modal fade bs-example-modal-lg" id="modal_order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="myLargeModalLabel">Data Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive" >
              <table class="table table-hover dataTable" id="data_" >
                <thead>
                  <tr>
                    <th>Data 1</th>
                    <th>Data 1</th>
                    <th>Data 1</th>
                    <th>Data 1</th>
                    <th>Data 1</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    $(document).ready(function () {
        $('#btn_lookup').on('click',function(){
            $('#modal_order').modal('show')
        })


        $('#form_invoice').validate({
            rules:{
                no_order:'required',
                invoice_date:'required',
                due_date:'required',
                status:'required'
            },
            errorClass:'border-danger',
            errorPlacement:function(error,element){
                var id = $(element).attr('id')
                error.appendTo($('#invalid_'+id))
            },
            submitHandler:function(form){
              $.ajax({
                url: `<?= base_url().'ext/Invoice' ?>`,
                type: 'POST',
                dataType: 'JSON',
                data: $(form).serialize(),
                beforeSend:function(xhr){
                  $('#btn_add').addClass('disabled').attr('disabled','disabled').html('<span>Submit <i class="fas fa-spinner fa-spin"></i></span>')
                  xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
                  xhr.setRequestHeader("SCM-INT-KEY",TOKEN_EXT.token)
                },
                success:function(response){
                    console.log(response)
                  if (response.status === true) {
                    
                    $('#btn_add').removeClass('disabled').removeAttr('disabled','disabled').text('Submit')
                    window.location.replace('#/invoice')
                  }else {
                    console.log('gagal')
                  }
                },
                error:function(err){
                  console.log(err)
                }
              });

            }
        })


        var count = 1
        $('#btn_addrow').on('click',function(){

          count = count + 1

            var html = `
            <tr id="baris-${count}">
            <td><input type="text" name="deskripsi[]" value="" required> </td>
            <td><input type="number" name="harga[]" value="" required> </td>
            <td><input type="number" name="qty[]" value="" required> </td>
            <td><input type="number" name="ppn[]" value="" required> </td>
            <td><input type="number" name="total_harga[]" value="" required> </td>
              <td><button type="button" class="btn btn-danger" data-id="${count}" id="btn_remove"><i class="fas fa-trash"></i></button></td>
            </tr>
            `

          $('#setting tbody').append(html)
      });

      $(document).on('click','#btn_remove',function(){
        var btn_id = $(this).attr('data-id')

        $(`#baris-${btn_id}`).remove()

      })

    });
</script>
