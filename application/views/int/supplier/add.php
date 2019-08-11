<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Add Supplier</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#/supplier">Supplier</a></li>
            <li class="breadcrumb-item active">Add Supplier</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center"></div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <form id="form__add__supplier">

                <div class="row">
                    <div class="col-lg-6"> <!-- start 1 -->
                        
                         <div class="form-group">
                            <label>Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" placeholder="nama supplier .." >
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="alamat" >
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" name="telepon" class="form-control" placeholder="Telepon">
                        </div>
                        <div class="form-group">
                            <label>Fax</label>
                            <input type="text" name="fax" class="form-control" placeholder="Fax" >
                        </div>
                        <div class="form-group">
                            <label>Npwp</label>
                            <input type="text" name="npwp" class="form-control" placeholder="Npwp">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="email">
                        </div>

                        <div class="form-group">
                            <label>Status supplier</label>
                            <select name="status_supplier" class="form-control">
                                <option value=""> -- Status Supplier -- </option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Non Aktif</option>
                            </select>
                        </div>


                    </div> <!-- end start 1 -->

                    <div class="col-lg-6"> <!-- start 2 -->
                        
                            <div class="form-group">
                                <label>Nama PIC</label>
                                <input type="text" name="nama_pic" class="form-control" placeholder="Nama PIC" >
                            </div>

                            <div class="form-group">
                                <label>Handphone</label>
                                <input type="text" name="handphone" class="form-control" placeholder="Handphone">
                            </div>

                            <div class="form-group">
                                <label>Email PIC</label>
                                <input type="text" name="email_pic" class="form-control" placeholder="Email PIC">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" >
                            </div>

                    </div> <!-- end start 2 -->


                    <div class="col-lg-12">
                        <table class="table table-bordered" id="table_account">
                            <tr>
                                <th>Nama Bank</th>
                                <th>Cabang</th>
                                <th>Pemilik Account</th>
                                <th>No. Rekening</th>
                                <th>Group</th>

                                <th><button type="button" class="btn btn-info btn_increase"><i class="fa fa-plus"></i></button>  </th>
                            </tr>
                            <tr>
                                <td> <input type="text" name="nama_bank[]"  id="nama_bank" class="form-control item_nama_bank"> </td>
                                <td> <input type="text" name="cabang[]"  id="cabang" class="form-control item_cabang"> </td>
                                <td> <input type="text" name="pemilik_account[]"  id="pemilik_account" class="form-control item_pemilik_account"> </td>
                                <td> <input type="text" name="no_rekening[]"  id="no_rekening" class="form-control item_no_rekening"> </td>
                                <td> <input type="text" name="id_group[]" value="2" id="group" class="form-control item_group"> </td>
                            </tr>
                        </table>
                    </div>

                    <div class="container text-center" style="margin-top: 16px;" >
                        <button type="submit" class="btn btn-success" id="btn_simpan" >SIMPAN</button>
                    </div>

                </div> <!-- end row -->



            </form>


            </div>
        </div>
    </div>
</div>

<script>
(function(LIB) {
    "use strict"

    const addSupplierURL = (() => {
        const urlString = {
            add: `${BASE_URL}int/supplier/add`
        }
        return {
            getURL: () => urlString
        }
    })()


    const addSupplierUI = (() => {
        const domString = {
            form: {
                add: '#form__add__supplier'
            },
            field: {
                item_nama_bank: '.item_nama_bank',
                item_cabang: '.item_cabang',
                item_pem_acc: '.item_pemilik_account',
                item_norek: '.item_no_rekening',
                item_group: '.item_group'
            },
            btn: {
                increase: '.btn_increase'
            },
            html: {
                tblAcc: '#table_account'
            }
        }

        const renderField = () => {
            let html = '';
            html += `
                <tr>
                     <td> <input type="text" name="nama_bank[]"  id="nama_bank" class="form-control item_nama_bank"> </td>
                     <td> <input type="text" name="cabang[]"  id="cabang" class="form-control item_cabang"> </td>
                     <td> <input type="text" name="pemilik_account[]"  id="pemilik_account" class="form-control item_pemilik_account"> </td>
                     <td> <input type="text" name="no_rekening[]"  id="no_rekening" class="form-control item_no_rekening"> </td>
                     <td> <input type="text" name="id_group[]"  value="2" id="group" class="form-control item_group"> </td>
                     <td> <button type="button" name="remove" class="btn btn-danger btn-remove"><span class="fa fa-minus"></span></button> </td>
                </tr>
            `;
            $(domString.html.tblAcc).append(html)

        }

        return {
            getDOM: () => domString,
            sendField: () => renderField()
        }
    })()


    const addSupplierCTRL = ((URL, UI) => {


        const dom = UI.getDOM()
        const url = URL.getURL()
        
        const eventListener = function(){

            $(dom.form.add).validate({
                rules: {
                    nama_supplier: { required: true },
                    alamat: { required: true },
                    telepon: { required: true },
                    fax: { required: true },
                    npwp: { required: true },
                    email: { required: true },
                    status_supplier: { required: true },
                    nama_pic: { required: true },
                    handphone: { required: true },
                    email_pic: { required: true },
                    username: { required: true }
                },
                errorPlacement(error, element){
                    error.css('color','red')
                    error.insertAfter(element)
                },
                submitHandler: function(form){
                    let error = []


                        $(dom.field.item_nama_bank).each(function() {
                            if($(this).val() === ''){
                                error.push(' Kolom Nama Bank Ada yang belum terisi ')
                            }
                        })

                        $(dom.field.item_cabang).each(function() {
                            if($(this).val() === ''){
                                error.push(' Kolom Cabang Ada Yang Belum Terisi ')
                            }
                        })

                        $(dom.field.item_pem_acc).each(function() {
                            if($(this).val() === ''){
                                error.push(' Kolim Pemilik Ada Yang Belum Terisi ')
                            }
                        })

                        $(dom.field.item_norek).each(function() {
                            if($(this).val() === ''){
                                error.push(' Kolom Rekening Ada Yang Belum Diisi ')
                            }
                        })

                        $(dom.field.item_group).each(function() {
                            if($(this).val() === ''){
                                error.push(' Kolom Group Ada Yang Belum Diisi ')
                            }
                        })


                        if(error.length > 0){
                            error.forEach( (item) => makeNotif('error', 'Failed', `${item}`, 'bottom-right') )
                        }else{
                            LIB.postResource(url.add, form, '#btn_simpan', res => {
                                if(res){
                                    location.hash = '#/supplier';
                                }
                            }, err => console.log(err), 'DONE' )
                        }

                }
            })

            $(dom.btn.increase).on('click', () => UI.sendField() )

            $(dom.html.tblAcc).on('click', '.btn-remove', function() {
                $(this).closest('tr').remove()
            })



        }


        return {
            init: () => {
                console.log('add supplier init..')
                eventListener()
            }
        }
    })(addSupplierURL, addSupplierUI)

    addSupplierCTRL.init()


})(myLibraryJS)

</script>


