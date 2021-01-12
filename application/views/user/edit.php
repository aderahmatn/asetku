<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('alat') ?>">Data User</a></li>
                    <li class="breadcrumb-item active">Edit Data User</li>
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
                <input type="hidden" name="fid_user" style="display: none" value="<?= $user->id_user ?>">
                <input type="hidden" name="fpassword" style="display: none" value="<?= $user->password ?>">

                <div class="card-body">
                    <div class="form-group">
                        <label for="fnama_user">Nama Lengkap</label>
                        <input type="text" class="form-control <?= form_error('fnama_user') ? 'is-invalid' : '' ?>" id="fnama_user" name="fnama_user" placeholder="Enter Nama Lengkap" value="<?= $user->nama_lengkap ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fnama_user') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fdepartemen">Departemen</label>
                        <select class="form-control <?php echo form_error('fdepartemen') ? 'is-invalid' : '' ?>" id="fdepartemen" name="fdepartemen">
                            <?php $dept = $this->input->post('fdepartemen') ? $this->input->post('fdepartemen') : $user->id_departemen  ?>

                            <option hidden value="" selected>Pilih Departemen</option>
                            <?php foreach ($departemen as $key) : ?>
                                <option value="<?= $key->id_departemen ?>" <?= $dept == $key->id_departemen ? 'selected' : '' ?>><?= $key->departemen ?></option>

                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('fdepartemen') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fusername">Username</label>
                        <input type="text" class="form-control <?= form_error('fusername') ? 'is-invalid' : '' ?>" id="fusername" name="fusername" placeholder="Enter Username" value="<?= $user->username ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fusername') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="frole">Level</label>
                        <select class="form-control <?php echo form_error('frole') ? 'is-invalid' : '' ?>" id="frole" name="frole">
                            <?php $role = $this->input->post('frole') ? $this->input->post('frole') : $user->role  ?>

                            <option hidden value="" selected>Pilih Level</option>
                            <option value="user" <?= $role == "user" ? 'selected' : '' ?>>User</option>
                            <option value="manager" <?= $role == "manager" ? 'selected' : '' ?>>Manager</option>
                            <option value="manager it" <?= $role == "manager it" ? 'selected' : '' ?>>Manager IT</option>
                            <option value="admin" <?= $role == "admin" ? 'selected' : '' ?>>Admin IT</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('frole') ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>