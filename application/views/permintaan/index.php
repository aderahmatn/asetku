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
                                                echo '<span class="badge badge-pill badge-danger">Hold</span>';
                                            }
                                            if ($key->status_permintaan == 'approved') {
                                                echo '<span class="badge badge-pill badge-primary">Approved</span>';
                                            }
                                            if ($key->status_permintaan == 'close') {
                                                echo '<span class="badge badge-pill badge-success">Close</span>';
                                            }
                                            ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-detail<?= $key->id_permintaan ?>" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm"><i class="fas fa-eye" data-tolltip="tooltip" data-placement="top" title="Detail"></i></button>
                                                <?php if ($this->session->userdata('role') == 'user') { ?>
                                                    <a href="<?= base_url('permintaan/edit/') . $key->id_permintaan ?>"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-detail" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm"><i class="fas fa-pencil-alt" data-tolltip="tooltip" data-placement="top" title="Edit"></i></button></a>


                                                    <button type="button" class="btn btn-default btn-sm" onclick="deleteConfirm('<?= base_url() . 'permintaan/delete/' . $key->id_permintaan ?>')" data-tolltip="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                                <?php } ?>
                                                <?php if ($key->approve == 0) { ?>
                                                    <?php if ($this->session->userdata('role') == 'manager') { ?>

                                                        <button type="button" class="btn btn-default btn-sm" onclick="approveConfirm('<?= base_url() . 'permintaan/approve/' . $key->id_permintaan ?>')" data-tolltip="tooltip" data-placement="top" title="Approve"><i class="fas fa-check"></i></button>

                                                    <?php  } ?>
                                                <?php  } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal Detail-->
                                    <div class="modal fade" id="modal-detail<?= $key->id_permintaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <strong>No Permintaan :</strong>
                                                    <?= $key->no_permintaan ?> <br>
                                                    <strong>Status :</strong>
                                                    <?php if ($key->status_permintaan == 'hold') {
                                                        echo '<span class="badge badge-pill badge-danger">Hold</span>';
                                                    }
                                                    if ($key->status_permintaan == 'approved') {
                                                        echo '<span class="badge badge-pill badge-primary">Approved</span>';
                                                    }
                                                    if ($key->status_permintaan == 'close') {
                                                        echo '<span class="badge badge-pill badge-success">Close</span>';
                                                    } ?> <br>
                                                    <strong>Approval By :</strong>
                                                    <?= $key->approve_by == null ? '-' : ucwords($key->approve_by)   ?> <br>
                                                    <strong>Deskripsi Permintaan :</strong><br>
                                                    <p><?= $key->deskripsi_permintaan ?></p>
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
                        <span>Anda akan menyutujui permintaan ini!</span>
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
                        <span>Data yang dihapus tidak akan bisa dikembalikan.</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-approve" class="btn btn-primary" href="#"> Approve</a>
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
</script>