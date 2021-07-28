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
                    <li><a href="<?= site_url('admin/media'); ?>"><?= $bab; ?></a></li>
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
                        <button type="button" class="btn btn-secondary mb-1 float-right" data-toggle="modal" data-target="#mediatambahModal">
                            Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <?= form_error('nama_media', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= form_error('media', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Logo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($media as $m) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $m['nama_media']; ?></td>
                                        <td><img width='100' src="<?= base_url('media/images/media_partner/' . $m['media']); ?>"></td>
                                        <td>
                                            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#mediaeditModal<?php echo $m['id_media']; ?>">Ubah</button>
                                            <a type="button" class="btn btn-danger mb-1" href="<?= site_url('admin/delete_media/' . md5($m['id_media'])) ?>">Hapus</a>

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
<div class="modal fade" id="mediatambahModal" tabindex="-1" aria-labelledby="mediatambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/media'); ?>
                <div class="form-group">
                    <label for="nama_media" class="control-label mb-1">Nama</label>
                    <input id="nama_media" name="nama_media" type="text" class="form-control" aria-required="true" aria-invalid="false">
                </div>
                <div class="form-group">
                    <label for="filemedia" class="control-label mb-1">Logo</label>
                    <input type="file" id="filemedia" name="filemedia" class="form-control-file">
                    <small class="form-text text-muted">Format : gif, png, jpg, jpeg, bpm.</small>
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
foreach ($media as $m) : $no++; ?>
    <div class="modal fade" id="mediaeditModal<?php echo $m['id_media']; ?>" tabindex="-1" aria-labelledby="mediaeditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/media'); ?>
                    <input type="hidden" name="id_media" value="<?= md5($m['id_media']); ?>">
                    <div class="form-group">
                        <label for="nama_media" class="control-label mb-1">Nama</label>
                        <input id="nama_media" name="nama_media" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?= $m['nama_media']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="filemedia" class="control-label mb-1">Logo</label>
                        <input type="file" id="filemedia" name="filemedia" class="form-control-file" value="<?= $m['media']; ?>"><?= $m['media']; ?>
                        <small class="form-text text-muted">Format : gif, png, jpg, jpeg, bpm.</small>
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