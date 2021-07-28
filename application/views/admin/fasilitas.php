<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><?= $sub; ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?= site_url('admin'); ?>"><?= $title; ?></a></li>
                    <li><a href="<?= site_url('admin/fasilitas'); ?>"><?= $bab; ?></a></li>
                    <li class="active"><?= $sub; ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><?= $sub; ?></strong>
                        <button type="button" class="btn btn-secondary mb-1 float-right" data-toggle="modal" data-target="#fasilitastambahModal">
                            Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <?= form_error('waktu_fasilitas', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= form_error('reservasi_id', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Fasilitas</th>
                                    <th>Harga Fasilitas</th>
                                    <th>Ketentuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($fasilitas as $f) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $f['jenis_fasilitas']; ?></td>
                                        <td><?= $f['harga_fasilitas']; ?></td>
                                        <td><?= $f['ketentuan']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#fasilitaseditModal<?php echo $f['id_fasilitas']; ?>">Ubah</button>
                                            <a type="button" class="btn btn-danger mb-1" href="<?= site_url('admin/delete_fasilitas/' . md5($f['id_fasilitas'])) ?>">Hapus</a>

                                        </td>
                                    </tr> <?php } ?> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .animated -->
</div><!-- .content -->

<!-- Button trigger modal -->

<!-- Modal Tambah-->
<div class="modal fade" id="fasilitastambahModal" tabindex="-1" aria-labelledby="fasilitastambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/fasilitas'); ?>
                <div class="form-group">
                    <label for="jenis_fasilitas" class="control-label mb-1">Jenis fasilitas</label>
                    <input id="jenis_fasilitas" name="jenis_fasilitas" type="text" class="form-control" aria-required="true" aria-invalid="false">
                </div>
                <div class="form-group">
                    <label for="harga_fasilitas" class="control-label mb-1">Harga fasilitas</label>
                    <input id="harga_fasilitas" name="harga_fasilitas" type="text" class="form-control" aria-required="true" aria-invalid="false">
                </div>
                <div class="form-group">
                    <label for="ketentuan" class="control-label mb-1">Ketentuan</label>
                    <input id="ketentuan" name="ketentuan" type="text" class="form-control" aria-required="true" aria-invalid="false">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>

        </div>
    </div>
</div>

<!-- Modal Edit-->
<?php $no = 0;
foreach ($fasilitas as $f) : $no++; ?>
    <div class="modal fade" id="fasilitaseditModal<?php echo $f['id_fasilitas']; ?>" tabindex="-1" aria-labelledby="fasilitaseditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/fasilitas'); ?>
                    <input type="hidden" name="id_fasilitas" value="<?= md5($f['id_fasilitas']); ?>">

                    <div class="form-group">
                        <label for="jenis_fasilitas" class="control-label mb-1">Jenis fasilitas</label>
                        <input id="jenis_fasilitas" name="jenis_fasilitas" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?= $f['jenis_fasilitas']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="harga_fasilitas" class="control-label mb-1">Harga fasilitas</label>
                        <input id="harga_fasilitas" name="harga_fasilitas" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?= $f['harga_fasilitas']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ketentuan" class="control-label mb-1">Ketentuan</label>
                        <input id="ketentuan" name="ketentuan" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?= $f['ketentuan']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>

</div><!-- /#right-panel -->