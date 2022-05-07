<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data aset</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('aset') ?>">Data aset</a></li>
                    <li class="breadcrumb-item active">Edit Data aset</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-5">
        <div class="card card-navy">
            <div class="card-header">
                <h3 class="card-title">Edit data aset</h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" autocomplete="off">
                <input type="hidden" name="fid_aset" style="display: none" value="<?= $aset->id_aset ?>">
                <input type="hidden" name="fno" value="<?= $aset->no_urut ?>" style="display: none">
                <input type="hidden" name="fstatus" value="<?= $aset->status_aset ?>" style="display: none">

                <div class="card-body">
                    <div class="form-group">
                        <label for="fkode_aset">Kode aset</label>
                        <input type="text" class="form-control <?= form_error('fkode_aset') ? 'is-invalid' : '' ?>" id="fkode_aset" name="fkode_aset" placeholder="Enter Kode Alat" value="<?= $aset->kode_aset ?>" readonly>
                        <div class="invalid-feedback">
                            <?= form_error('fkode_aset') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fserial_number">Serial Number</label>
                        <input type="text" class="form-control <?= form_error('fserial_number') ? 'is-invalid' : '' ?>" id="fserial_number" name="fserial_number" placeholder="Enter Serial Number" value="<?= $aset->serial_number ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fserial_number') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fnama_aset">Nama aset</label>
                        <input type="text" class="form-control <?= form_error('fnama_aset') ? 'is-invalid' : '' ?>" id="fnama_aset" name="fnama_aset" placeholder="Enter Nama aset" value="<?= $aset->nama_aset ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fnama_aset') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fmerk">Merk</label>
                        <input type="text" class="form-control <?= form_error('fmerk') ? 'is-invalid' : '' ?>" id="fmerk" name="fmerk" placeholder="Enter Merk" value="<?= $aset->merk ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fmerk') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fharga_beli">Merk</label>
                        <input type="text" class="form-control <?= form_error('fharga_beli') ? 'is-invalid' : '' ?>" id="fharga_beli" name="fharga_beli" placeholder="Enter Nama aset" value="<?= $aset->harga_beli ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fharga_beli') ?>
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
                        <label for="fsite">Site</label>
                        <select class="form-control <?php echo form_error('fsite') ? 'is-invalid' : '' ?>" id="fsite" name="fsite">
                            <option hidden value="" selected>Pilih Site</option>
                            <option value="SDK" <?= 'SDK' == $aset->site ? 'selected' : '' ?>>SDK</option>
                            <option value="CGS" <?= 'CGS' == $aset->site ? 'selected' : '' ?>>CGS</option>
                            <option value="MJT" <?= 'MJT' == $aset->site ? 'selected' : '' ?>>MJT</option>
                            <option value="MJA" <?= 'MJA' == $aset->site ? 'selected' : '' ?>>MJA</option>
                            <option value="JTP" <?= 'JTP' == $aset->site ? 'selected' : '' ?>>JTP</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('fsite') ?>
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
                        <label for="fkategori">Kategori</label>
                        <select class="form-control <?php echo form_error('fkategori') ? 'is-invalid' : '' ?>" id="fkategori" name="fkategori">
                            <?php $kat = $this->input->post('fkategori') ? $this->input->post('fkategori') : $aset->id_kategori  ?>
                            <option hidden value="" selected>Pilih kategori</option>
                            <?php foreach ($kategori as $key) : ?>
                                <option value="<?= $key->id_kategori ?>" <?= $kat == $key->id_kategori ? 'selected' : '' ?>><?= $key->kategori ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('fkategori') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fdeskripsi">Deskripsi aset</label>
                        <textarea name="fdeskripsi" class="form-control <?= form_error('fdeskripsi') ? 'is-invalid' : '' ?>" id="fdeskripsi"><?= $aset->deskripsi ?></textarea>
                        <div class="invalid-feedback">
                            <?= form_error('fdeskripsi') ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                    <a href="<?= base_url('aset') ?>" class="btn btn-secondary float-left">Batal</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>