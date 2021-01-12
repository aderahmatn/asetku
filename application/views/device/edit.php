<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data device</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('alat') ?>">Data device</a></li>
                    <li class="breadcrumb-item active">Tambah Data device</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-5">
        <div class="card card-navy">
            <div class="card-header">
                <h3 class="card-title">Input data device</h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" autocomplete="off">
                <input type="hidden" name="fid_device" value="<?= $device->id_device ?>" style="display: none">

                <div class="card-body">
                    <div class="form-group">
                        <label for="fkode_device">Kode device</label>
                        <input type="text" class="form-control <?= form_error('fkode_device') ? 'is-invalid' : '' ?>" id="fkode_device" name="fkode_device" placeholder="Enter Kode Alat" value="<?= $device->kode_device ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fkode_device') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fnama_device">Nama device</label>
                        <input type="text" class="form-control <?= form_error('fnama_device') ? 'is-invalid' : '' ?>" id="fnama_device" name="fnama_device" placeholder="Enter Nama device" value="<?= $device->nama_device ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fnama_device') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ftgl_pembelian">Tanggal Pembelian</label>
                        <input type="date" class="form-control <?= form_error('ftgl_pembelian') ? 'is-invalid' : '' ?>" id="ftgl_pembelian" name="ftgl_pembelian" value="<?= $device->tanggal_pembelian ?>">
                        <div class="invalid-feedback">
                            <?= form_error('ftgl_pembelian') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fsupplier">Supplier</label>
                        <input type="text" class="form-control <?= form_error('fsupplier') ? 'is-invalid' : '' ?>" id="fsupplier" name="fsupplier" placeholder="Enter Supplier" value="<?= $device->supplier ?>">
                        <div class="invalid-feedback">
                            <?= form_error('fsupplier') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fkategori">Kategori</label>
                        <select class="form-control <?php echo form_error('fkategori') ? 'is-invalid' : '' ?>" id="fkategori" name="fkategori">
                            <?php $kat = $this->input->post('fkategori') ? $this->input->post('fkategori') : $device->id_kategori  ?>
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
                        <label for="fdeskripsi">Deskripsi device</label>
                        <textarea name="fdeskripsi" class="form-control <?= form_error('fdeskripsi') ? 'is-invalid' : '' ?>" id="fdeskripsi"><?= $device->deskripsi ?></textarea>
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