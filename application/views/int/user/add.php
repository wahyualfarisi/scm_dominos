<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Add User</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#/user">User</a></li>
            <li class="breadcrumb-item active">Add User</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
        
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Add User</h4>
                <form id="form-add-user">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama</label>
                        <input type="text" class="form-control" name="nama_lengkap">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="number" class="form-control" name="telepon">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" name="level">
                            <option value=""> -- Pilih Level -- </option>
                            <option value="Finance">Finance</option>
                            <option value="Warehouse">Warehouse</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value=""> -- Pilih Status -- </option>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <a href="#/user" class="btn btn-danger btn-md">Batal</a>
                        <button type="submit" class="btn btn-info btn-md" id="btn_submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    (function(LIB) {
    "use strict"

    const addUserURL = (function() {
        const urlString = {
            add: `${BASE_URL}int/user/add`
        }
        return {
            getURL: () => urlString
        }
    })()


    const addUserUI = (function() {
        const domString = {
            form: {
                add: '#form-add-user'
            }
        }

        return {
            getDOM: () => domString
        }
    })()


    const addUserCTRL = (function(URL, UI) {


        const dom = UI.getDOM()
        const url = URL.getURL()
        
        const eventListener = function(){

            $(dom.form.add).validate({
                rules: {
                    nama_lengkap: { required: true },
                    email: { required: true, email: true },
                    telepon: { required: true },
                    jenis_kelamin: { required: true },
                    alamat: { required: true },
                    username: { required: true },
                    level: { required: true },
                    status: { required: true }
                },
                errorPlacement(error, element){
                    error.css('color','red')
                    error.insertAfter(element)
                },
                submitHandler(form){
                    LIB.postResource(url.add, form, '#btn_submit', res => {
                        if(res){
                            location.hash = '#/user'
                        }
                    }, err => console.log(err), 'DONE' )
                }
            })


        }


        return {
            init: () => {
                console.log('init add ')
                eventListener()
            }
        }
    })(addUserURL, addUserUI)

    addUserCTRL.init()


})(myLibraryJS)

</script>