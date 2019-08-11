<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Add Warehouse</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#/warehouse">Warehouse</a></li>
            <li class="breadcrumb-item active">Add Warehouse</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center"></div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Add Warehouse</h4>
                <form id="form-add-warehouse">
                    <div class="form-group">
                        <label for="group">Group</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pilih group..." readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-md" type="button">Cari</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user">User</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pilih user..." readonly>
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-md" type="button">Cari</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_warehouse">Nama Warehouse</label>
                        <input type="number" class="form-control" name="nama_warehouse">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" name="telepon">
                    </div>
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control" name="fax">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <a href="#/warehouse" class="btn btn-danger btn-md">Batal</a>
                        <button type="submit" class="btn btn-info btn-md" id="btn_submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('source/int/form/add_warehouse.js') ?>" ></script>