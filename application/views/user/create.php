<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('alat') ?>">Data User</a></li>
                    <li class="breadcrumb-item active">Tambah Data User</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Input data user</h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" autocomplete="off">
                <div class="card-body">
                    <div class="form-group">
                        <label for="fnama_user">Nama Lengkap</label>
                        <input type="text" class="form-control <?= form_error('fnama_user') ? 'is-invalid' : '' ?>" id="fnama_user" name="fnama_user" placeholder="Enter Nama Lengkap" value="<?= $this->input->post('fnama_user'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fnama_user') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fnik">NIK</label>
                        <input type="text" class="form-control <?= form_error('fnik') ? 'is-invalid' : '' ?>" id="fnik" name="fnik" placeholder="Enter NIK" value="<?= $this->input->post('fnik'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fnik') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fdepartemen">Departemen</label>
                        <select class="form-control <?php echo form_error('fdepartemen') ? 'is-invalid' : '' ?>" id="fdepartemen" name="fdepartemen">
                            <option hidden value="" selected>Pilih Departemen</option>
                            <?php foreach ($departemen as $key) : ?>
                                <option value="<?= $key->id_departemen ?>" <?= $this->input->post('fdepartemen') == "use" ? 'selected' : '' ?>><?= $key->departemen ?></option>

                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('fdepartemen') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fusername">Username</label>
                        <input type="text" class="form-control <?= form_error('fusername') ? 'is-invalid' : '' ?>" id="fusername" name="fusername" placeholder="Enter Username" value="<?= $this->input->post('fusername'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fusername') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fpassword">Password</label>
                        <input type="password" class="form-control <?= form_error('fpassword') ? 'is-invalid' : '' ?>" id="fpassword" name="fpassword" placeholder="Enter Username" value="<?= $this->input->post('fpassword'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fpassword') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="frole">Level</label>
                        <select class="form-control <?php echo form_error('frole') ? 'is-invalid' : '' ?>" id="frole" name="frole">
                            <option hidden value="" selected>Pilih Level</option>
                            <option value="user" <?= $this->input->post('frole') == "user" ? 'selected' : '' ?>>user</option>
                            <option value="manager" <?= $this->input->post('frole') == "manager" ? 'selected' : '' ?>>Manager</option>
                            <option value="manager it" <?= $this->input->post('frole') == "manager it" ? 'selected' : '' ?>>Manager IT</option>
                            <option value="admin" <?= $this->input->post('frole') == "admin" ? 'selected' : '' ?>>Admin IT</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('frole') ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    <a href="<?= base_url('user') ?>" class="btn btn-secondary float-left">Batal</a>

                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>