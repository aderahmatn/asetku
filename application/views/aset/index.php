<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data aset</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active">Data aset</li>
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
                        <h3 class="card-title">Data aset</h3>
                        <a href="<?= base_url('aset/create') ?>" class="btn btn-sm btn-primary float-right"> + Tambah</a>

                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <table id="TabelUser" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Kode aset</th>
                                    <th>SN</th>
                                    <th>Merk</th>
                                    <th>Nama aset</th>
                                    <th>Harga Beli</th>
                                    <th>Kategori</th>
                                    <th>Site</th>


                                    <th>Status</th>
                                    <th style="width: 10px">Modify</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($aset as $key) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key->kode_aset ?></td>
                                        <td><?= $key->serial_number ?></td>
                                        <td><?= $key->merk ?></td>
                                        <td><?= $key->nama_aset ?></td>
                                        <td><?= $key->harga_beli ?></td>
                                        <td><?= $key->kategori ?></td>
                                        <td><?= $key->site ?></td>


                                        <td>
                                            <?php
                                            if ($key->status_aset == 'idle') {
                                                echo '<span class="badge badge-pill badge-success">Idle</span>';
                                            }
                                            if ($key->status_aset == 'used') {
                                                echo '<span class="badge badge-pill badge-primary">Used</span>';
                                            }
                                            if ($key->status_aset == 'damage') {
                                                echo '<span class="badge badge-pill badge-danger">Damage</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-detail<?= $key->id_aset ?>" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm"><i class="fas fa-eye" data-tolltip="tooltip" data-placement="top" title="Detail"></i></button>

                                                <a href="<?= base_url('aset/edit/') . $key->id_aset ?>"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-detail" data-tolltip="tooltip" data-placement="top" <button type="button" class="btn btn-default btn-sm"><i class="fas fa-pencil-alt" data-tolltip="tooltip" data-placement="top" title="Edit"></i></button></a>


                                                <button type="button" class="btn btn-default btn-sm" onclick="deleteConfirm('<?= base_url() . 'aset/delete/' . $key->id_aset ?>')" data-tolltip="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>

                                                <?php if ($key->status_aset != 'damage') { ?>
                                                    <button type="button" class="btn btn-default btn-sm" onclick="damageConfirm('<?= base_url() . 'aset/damage/' . $key->id_aset ?>')" data-tolltip="tooltip" data-placement="top" title="Damage"><i class="fas fa-times"></i></button>
                                                <?php } ?>

                                            </div>
                                        </td>
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
                                                    <div class="row pb-2">
                                                        <div class="col-5"> <strong><a href="<?= base_url('aset/showBarcode/') . $key->kode_aset ?>" target="_blank">[Cetak Barcode]</a></strong>
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
<!--Damage Confirmation-->
<div class="modal fade" id="damageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-times" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>
                        <span>Anda akan merubah status aset menjadi <mark>Damage</mark></span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-damage" class="btn btn-danger" href="#"> Damage</a>
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

    function damageConfirm(url) {
        $('#btn-damage').attr('href', url);
        $('#damageModal').modal();
    }
</script>