<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data aset</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('alat') ?>">Data aset</a></li>
                    <li class="breadcrumb-item active">Tambah Data aset</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Input data aset</h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" autocomplete="off">
                <input type="hidden" name="fid_permintaan" style="display: none" value="<?= $permintaan->id_permintaan ?>">

                <div class="card-body">
                    <div class="form-group">
                        <label for="fkode_aset">No Permintaan</label>
                        <input type="text" class="form-control <?= form_error('fkode_aset') ? 'is-invalid' : '' ?>" id="fkode_aset" name="fkode_aset" placeholder="Enter Kode Alat" value="<?= $permintaan->no_permintaan ?>" readonly>
                        <div class="invalid-feedback">
                            <?= form_error('fkode_aset') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fkode_aset">PIC User</label>
                        <input type="text" class="form-control <?= form_error('fkode_aset') ? 'is-invalid' : '' ?>" id="fkode_aset" name="fkode_aset" placeholder="Enter Kode Alat" value="<?= ucwords($permintaan->nama_lengkap) ?>" readonly>
                        <div class="invalid-feedback">
                            <?= form_error('fkode_aset') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fkode_aset">Departemen</label>
                        <input type="text" class="form-control <?= form_error('fkode_aset') ? 'is-invalid' : '' ?>" id="fkode_aset" name="fkode_aset" placeholder="Enter Kode Alat" value="<?= ucwords($permintaan->departemen) ?>" readonly>
                        <div class="invalid-feedback">
                            <?= form_error('fkode_aset') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fdeskripsi">Deskripsi Permintaan</label>
                        <textarea name="fdeskripsi" class="form-control <?= form_error('fdeskripsi') ? 'is-invalid' : '' ?>" id="fdeskripsi" readonly><?= $permintaan->deskripsi_permintaan ?></textarea>
                        <div class="invalid-feedback">
                            <?= form_error('fdeskripsi') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fid_aset">Aset</label>
                        <select class="form-control <?php echo form_error('fid_aset') ? 'is-invalid' : '' ?>" id="fid_aset" name="fid_aset">
                            <option hidden value="" selected>Pilih Aset</option>
                            <?php foreach ($aset as $key) : ?>
                                <option value="<?= $key->id_aset ?>" <?= $this->input->post('fid_aset') == $key->id_aset  ? 'selected' : '' ?>><?= $key->kode_aset . ' - ' . ucwords($key->nama_aset) ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('fid_aset') ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    <a href="<?= base_url('permintaan') ?>" class="btn btn-secondary float-left">Batal</a>

                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>