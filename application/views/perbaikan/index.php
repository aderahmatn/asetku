<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Perbaikan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Perbaikan</li>
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
                        <h3 class="card-title">Data Perbaikan</h3>
                        <a href="<?= base_url('perbaikan/create') ?>" class="btn btn-sm btn-primary float-right"> + Tambah</a>

                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <table id="TabelUser" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Tanggal</th>
                                    <th>PIC</th>
                                    <th>Kode Aset</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th style="width: 10px">Modify</th>
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
                                        <td><?= $key->kode_aset ?></td>
                                        <td><?= $key->keterangan_perbaikan ?></td>
                                        <td>
                                            <?php
                                            if ($key->status_perbaikan == 'open') {
                                                echo '<span class="badge badge-pill badge-danger">Open</span>';
                                            }
                                            if ($key->status_perbaikan == 'close') {
                                                echo '<span class="badge badge-pill badge-success">Close</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <?php if ($key->status_perbaikan != 'close') { ?>
                                                    <?php if ($this->session->userdata('role') == 'admin') { ?>
                                                        <a href="<?= base_url('perbaikan/tindakan/') . $key->id_perbaikan ?>"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-detail" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm"><i class="fas fa-check" data-tolltip="tooltip" data-placement="top" title="Accept"></i></button></a>
                                                    <?php  } ?>
                                                <?php  } ?>

                                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-detail<?= $key->id_perbaikan ?>" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm"><i class="fas fa-eye" data-tolltip="tooltip" data-placement="top" title="Detail"></i></button>

                                                <a href="<?= base_url('perbaikan/edit/') . $key->id_perbaikan ?>"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-detail" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm"><i class="fas fa-pencil-alt" data-tolltip="tooltip" data-placement="top" title="Edit"></i></button></a>

                                                <button type="button" class="btn btn-default btn-sm" onclick="deleteConfirm('<?= base_url() . 'perbaikan/delete/' . $key->id_perbaikan ?>')" data-tolltip="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal Detail-->
                                    <div class="modal fade" id="modal-detail<?= $key->id_perbaikan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"><strong>Detail Perbaikan</strong></h6>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row pb-2 ">
                                                        <div class="col-5"><strong>Status Perbaikan</strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5">
                                                            <?php if ($key->status_perbaikan == 'open') { ?>
                                                                <span class="badge badge-danger"><?= ucwords($key->status_perbaikan) ?></span>
                                                            <?php } ?>
                                                            <?php if ($key->status_perbaikan == 'close') { ?>
                                                                <span class="badge badge-success"><?= ucwords($key->status_perbaikan) ?></span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-2 bg-light">
                                                        <div class="col-5"><strong>Kode Aset </strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= $key->kode_aset ?> </div>
                                                    </div>
                                                    <div class="row pb-2 ">
                                                        <div class="col-5"><strong>Nama Aset </strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= ucwords($key->nama_aset) ?> <br></div>
                                                    </div>
                                                    <div class="row pb-2 bg-light">
                                                        <div class="col-5"><strong>PIC User</strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= ucwords($key->nama_lengkap) ?> <br></div>
                                                    </div>
                                                    <div class="row pb-2 bg-light">
                                                        <div class="col-5"><strong>Departemen</strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= ucwords($key->departemen) ?> <br></div>
                                                    </div>
                                                    <div class="row pb-2 ">
                                                        <div class="col-5"><strong>Keluhan</strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= ucfirst($key->keterangan_perbaikan) ?> <br></div>
                                                    </div>
                                                    <div class="row pb-2 bg-light">
                                                        <div class="col-5"><strong>PIC Perbaikan</strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= ucfirst($key->pic_perbaikan) ?> <br></div>
                                                    </div>
                                                    <div class="row pb-2">
                                                        <div class="col-5"><strong>Tindakan Perbaikan</strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= ucfirst($key->tindakan_perbaikan) ?> <br></div>
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