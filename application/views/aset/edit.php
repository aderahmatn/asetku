<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data Aset</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('alat') ?>">Data Aset</a></li>
                    <li class="breadcrumb-item active">Tambah Data Aset</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-5">
        <div class="card card-navy">
            <div class="card-header">
                <h3 class="card-title">Input data aset</h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" autocomplete="off">
                <input type="hidden" name="fid_aset" value="<?= $aset->id_aset ?>" style="display: none">

                <div class="card-body">
                    <div class="form-group">
                        <label for="fkode_aset">Kode Aset</label>
                        <input type="text" class="form-control <?= form_error('fkode_aset') ? 'is-invalid' : '' ?>" id="fkode_aset" name="fkode_aset" placeholder="Enter Kode Alat" value="<?= $aset->kode_aset ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fkode_aset') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fnama_aset">Nama Aset</label>
                        <input type="text" class="form-control <?= form_error('fnama_aset') ? 'is-invalid' : '' ?>" id="fnama_aset" name="fnama_aset" placeholder="Enter Nama Aset" value="<?= $aset->nama_aset ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fnama_aset') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ftgl_pembelian">Tanggal Pembelian</label>
                        <input type="date" class="form-control <?= form_error('ftgl_pembelian') ? 'is-invalid' : '' ?>" id="ftgl_pembelian" name="ftgl_pembelian" value="<?= $aset->tanggal_pembelian ?>">
                        <div class="invalid-feedback">
                            <?= form_error('ftgl_pembelian') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fsupplier">Supplier</label>
                        <input type="text" class="form-control <?= form_error('fsupplier') ? 'is-invalid' : '' ?>" id="fsupplier" name="fsupplier" placeholder="Enter Supplier" value="<?= $aset->supplier ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fsupplier') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fstatus">Status Aset</label>
                        <select class="form-control <?php echo form_error('fstatus') ? 'is-invalid' : '' ?>" id="fstatus" name="fstatus">
                            <option hidden value="" selected>Pilih Status Aset</option>
                            <option value="use" <?= $aset->status_aset == "use" ? 'selected' : '' ?>>Use</option>
                            <option value="damage" <?= $aset->status_aset == "damage" ? 'selected' : '' ?>>Damage</option>
                            <option value="absolute" <?= $aset->status_aset == "absolute" ? 'selected' : '' ?>>Absolute</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('fstatus') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fdeskripsi">Deskripsi Aset</label>
                        <textarea name="fdeskripsi" class="form-control <?= form_error('fdeskripsi') ? 'is-invalid' : '' ?>" id="fdeskripsi"><?= $aset->deskripsi ?></textarea>
                        <div class="invalid-feedback">
                            <?= form_error('fdeskripsi') ?>
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