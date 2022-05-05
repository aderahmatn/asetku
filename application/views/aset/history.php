<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>History Perbaikan Aset <mark><?= $aset->kode_aset ?></mark> </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('aset') ?>">Data Aset</a></li>
                    <li class="breadcrumb-item active">Histort Perbaikan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Detail Aset</h3>
                        <a href="<?= base_url('aset') ?>" class="btn btn-sm btn-primary float-right"> <i class="fas fa-chevron-left"></i> Kembali</a>

                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-1"><strong>Kode Aset</strong></div>
                            <div class="col-md-4"><?= $aset->kode_aset ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"><strong>Nama Aset</strong></div>
                            <div class="col-md-4"><?= ucwords($aset->nama_aset) ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"><strong>User</strong></div>
                            <div class="col-md-4"><?= ucwords($aset->nama_lengkap) ?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-1"><strong>Departemen</strong></div>
                            <div class="col-md-4"><?= ucwords($aset->departemen) ?></div>
                        </div>
                        <hr>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <h6>Data Perbaikan</h6>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Tanggal Perbaikan</th>
                                    <th>User</th>
                                    <th>Keluhan</th>
                                    <th>Tanggal Diperbaiki</th>
                                    <th>PIC Perbaikan</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($perbaikan as $key) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key->tanggal_perbaikan ?></td>
                                        <td><?= ucwords($key->nama_lengkap) ?></td>
                                        <td><?= ucfirst($key->keterangan_perbaikan) ?></td>
                                        <td><?= $key->tanggal_close ?></td>
                                        <td><?= ucwords($key->pic_perbaikan) ?></td>
                                        <td><?= ucfirst($key->tindakan_perbaikan) ?></td>
                                    </tr>
                                    <!-- Modal Detail-->
                                    <div class="modal fade" id="modal-detail<?= $key->id_aset ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"><strong>Detail Aset</strong></h6>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row pb-2">
                                                        <div class="col-5"><strong>Kode Aset </strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= $key->kode_aset ?> <br></div>
                                                    </div>
                                                    <div class="row pb-2 bg-light">
                                                        <div class="col-5"><strong>No Permintaan </strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= $key->no_permintaan ?> <br></div>
                                                    </div>
                                                    <div class="row pb-2 ">
                                                        <div class="col-5"> <strong>User</strong>
                                                        </div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5">
                                                            <?= ucwords($key->nama_lengkap) ?>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-2 bg-light">
                                                        <div class="col-5"> <strong>Departemen</strong>
                                                        </div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= ucwords($key->departemen)   ?></div>
                                                    </div>
                                                    <div class="row pb-2 ">
                                                        <div class="col-5"> <strong>Tanggal Assign</strong>
                                                        </div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5">
                                                            <?= $key->tanggal
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-2 bg-light">
                                                        <div class="col-5"> <strong>Deskripsi Permintaan</strong>
                                                        </div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= $key->deskripsi_permintaan ?></div>
                                                    </div>
                                                    <div class="row pb-2">
                                                        <div class="col-5"> <strong><a href="<?= base_url('aset/history/') . $key->id_aset ?>">[Histori Perbaikan]</a></strong>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class=" modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>
</section>






<!-- page script -->
<script>
    $(document).ready(function() {
        $('#TabelUser').DataTable();
        $('[data-tolltip="tooltip"]').tooltip({
            trigger: "hover"
        })

    });
</script>
<!--Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-exclamation-triangle" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>
                        <span>Data yang dihapus tidak akan bisa dikembalikan.</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#"> Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirm -->
<script type="text/javascript">
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>