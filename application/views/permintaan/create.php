<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Permintaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('permintaan') ?>">Permintaan</a></li>
                    <li class="breadcrumb-item active">Tambah Permintaan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Input Permintaan</h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" autocomplete="off">
                <input type="hidden" name="fid_user" value="<?= $this->session->userdata('id_user') ?>" style="display: none">
                <input type="hidden" name="fid_departemen" value="<?= $this->session->userdata('id_departemen') ?>" style="display: none">
                <div class="card-body">
                    <div class="form-group">
                        <label for="fno_permintaan">No Permintaan</label>
                        <input type="text" class="form-control <?= form_error('fno_permintaan') ? 'is-invalid' : '' ?>" id="fno_permintaan" name="fno_permintaan" value="<?= 'REQ' . date('dmy') . sprintf("%03s", $no_urut) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fnama">PIC Permintaan</label>
                        <input type="text" class="form-control <?= form_error('fnama') ? 'is-invalid' : '' ?>" id="fnama" name="fnama" placeholder="Enter nama" value="<?= ucwords($this->session->userdata('nama_lengkap')) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fdepartemen">Departemen</label>
                        <input type="text" class="form-control <?= form_error('fdepartemen') ? 'is-invalid' : '' ?>" id="fdepartemen" name="fdepartemen" placeholder="Enter nama" value="<?= $this->session->userdata('departemen') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ftgl_permintaan">Tanggal Permintaan</label>
                        <input type="text" class="form-control <?= form_error('ftgl_permintaan') ? 'is-invalid' : '' ?>" id="ftgl_permintaan" name="ftgl_permintaan" placeholder="Enter nama" value="<?= date('Y-m-d') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fdeskripsi">Deskripsi Permintaan</label>
                        <textarea name="fdeskripsi" class="form-control <?= form_error('fdeskripsi') ? 'is-invalid' : '' ?>" id="fdeskripsi"><?= $this->input->post('fdeskripsi'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= form_error('fdeskripsi') ?>
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