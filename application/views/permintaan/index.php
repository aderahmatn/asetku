<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data permintaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data permintaan</li>
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
                        <h3 class="card-title">Data permintaan</h3>
                        <a href="<?= base_url('permintaan/create') ?>" class="btn btn-sm btn-primary float-right"> + Tambah</a>

                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <table id="TabelUser" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>No Permintaan</th>
                                    <th>Tgl Permintaan</th>
                                    <th>PIC permintaan</th>
                                    <th>Departemen</th>
                                    <th>Status</th>
                                    <th style="width: 10px">Modify</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($permintaan as $key) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key->no_permintaan ?></td>
                                        <td><?= $key->tanggal_permintaan ?></td>
                                        <td><?= ucwords($key->nama_lengkap)  ?></td>
                                        <td><?= $key->departemen ?></td>
                                        <td><?php
                                            if ($key->status_permintaan == 'hold') {
                                                echo '<span class="badge badge-pill badge-warning">Hold</span>';
                                            }
                                            if ($key->status_permintaan == 'approved') {
                                                echo '<span class="badge badge-pill badge-primary">Approved</span>';
                                            }
                                            if ($key->status_permintaan == 'done') {
                                                echo '<span class="badge badge-pill badge-success">Done</span>';
                                            }
                                            if ($key->status_permintaan == 'reject') {
                                                echo '<span class="badge badge-pill badge-danger">Rejected</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <?php if ($key->status_permintaan != 'done') { ?>
                                                    <?php if ($this->session->userdata('role') == 'admin') { ?>
                                                        <a href="<?= base_url('detail/accept/') . $key->id_permintaan ?>"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-detail" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm"><i class="fas fa-check" data-tolltip="tooltip" data-placement="top" title="Accept"></i></button></a>
                                                    <?php  } ?>
                                                <?php  } ?>

                                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-detail<?= $key->id_permintaan ?>" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm"><i class="fas fa-eye" data-tolltip="tooltip" data-placement="top" title="Detail"></i></button>

                                                <?php if ($this->session->userdata('role') == 'user') { ?>
                                                    <?php if ($key->status_permintaan == 'hold') { ?>
                                                        <a href="<?= base_url('permintaan/edit/') . $key->id_permintaan ?>"><button type="button" class="btn btn-default btn-sm" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm"><i class="fas fa-pencil-alt" data-tolltip="tooltip" data-placement="top" title="Edit"></i></button></a>
                                                        <button type="button" class="btn btn-default btn-sm" onclick="deleteConfirm('<?= base_url() . 'permintaan/delete/' . $key->id_permintaan ?>')" data-tolltip="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($key->approve == 0) { ?>
                                                    <?php if ($this->session->userdata('role') == 'manager') { ?>
                                                        <button type="button" class="btn btn-default btn-sm" onclick="approveConfirm('<?= base_url() . 'permintaan/approve/' . $key->id_permintaan ?>')" data-tolltip="tooltip" data-placement="top" title="Approve"><i class="fas fa-check"></i></button>
                                                        <button type="button" class="btn btn-default btn-sm" onclick="rejectConfirm('<?= base_url() . 'permintaan/reject/' . $key->id_permintaan ?>')" data-tolltip="tooltip" data-placement="top" title="Reject"><i class="fas fa-times"></i></button>
                                                    <?php  } ?>
                                                <?php  } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal Detail-->
                                    <div class="modal fade" id="modal-detail<?= $key->id_permintaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"><strong>Detail Permintaan</strong></h6>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row pb-2 bg-light">
                                                        <div class="col-5"><strong>No Permintaan </strong></div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= $key->no_permintaan ?> <br></div>
                                                    </div>
                                                    <div class="row pb-2">
                                                        <div class="col-5"> <strong>Status</strong>
                                                        </div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5">
                                                            <?php if ($key->status_permintaan == 'hold') { ?>
                                                                <span class="badge badge-danger"><?= ucwords($key->status_permintaan) ?></span>
                                                            <?php } ?>
                                                            <?php if ($key->status_permintaan == 'approved') { ?>
                                                                <span class="badge badge-primary"><?= ucwords($key->status_permintaan) ?></span>
                                                            <?php } ?>
                                                            <?php if ($key->status_permintaan == 'done') { ?>
                                                                <span class="badge badge-success"><?= ucwords($key->status_permintaan) ?></span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-2 bg-light">
                                                        <div class="col-5"> <strong>Approval By</strong>
                                                        </div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5"><?= $key->approve_by == null ? '-' : ucwords($key->approve_by)   ?></div>
                                                    </div>
                                                    <div class="row pb-2 ">
                                                        <div class="col-5"> <strong>Kode Aset</strong>
                                                        </div>
                                                        <div class="col-1">
                                                            <strong>:</strong>
                                                        </div>
                                                        <div class="col-5">
                                                            <?php
                                                            if ($key->kode_aset == null) {
                                                                echo '-';
                                                            } else {
                                                                echo $key->kode_aset;
                                                            }
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
<!--Modal Approve-->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-check" style="font-size: 70px; color:green;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>
                        <span>akan approve permintaan ini!</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default float-left" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-approve" class="btn btn-primary" href="#"> Approve</a>
            </div>
        </div>
    </div>
</div>
<!--Modal reject-->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-times" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>
                        <span>akan reject permintaan ini!</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default float-left" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-reject" class="btn btn-danger" href="#"> Reject</a>
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

    function approveConfirm(url) {
        $('#btn-approve').attr('href', url);
        $('#approveModal').modal();
    }

    function rejectConfirm(url) {
        $('#btn-reject').attr('href', url);
        $('#rejectModal').modal();
    }
</script>