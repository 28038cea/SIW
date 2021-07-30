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
                    <li><a href="<?= site_url('admin'); ?>">Admin</a></li>
                    <li><a href="<?= site_url('admin/lokasi'); ?>"><?= $bab; ?></a></li>
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
                <div class="card" >
                    <div class="card-header">
                        <button type="button" class="btn btn-secondary mb-1 float-right" >
                            Tambah Data
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border border-secondary">
                                <div class="card-body">
                                    <h1>Titik Peta</h>
                                    <hr class="border border-secondary">tampilkan peta dengan titik kordinat by id dari db  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border border-secondary">
                                <div class="card-body">
                                    <h1>Detail Lokasi</h>
                                    <hr class="border border-secondary">
                                    <form>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Lokasi
                                                </div>
                                            </div>
                                            <input type="test" class="form-control" id="inlineFormInputGroup" placeholder="Nama Lokasi" value="<?php echo $lokasi['title'] ?>" disabled>
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend  border border-secondary">
                                                <div class="input-group-text ">
                                                    Deskripsi
                                                </div>
                                                    <div class="card" style="color:black" >
                                                    <?php echo $lokasi['deskripsi'] ?>
                                                    </div> 
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card border border-secondary">
                                <div class="card-body">
                                    <h3>Galeri</h3>
                                    <hr class="border border-secondary">
                                    <button type="button" class="btn btn-secondary mb-4" data-toggle="modal" data-target="#mediatambahModal">
                                        Tambah Data
                                    </button>
                                    <div class="row">
                                        <?php foreach($gambar as $row){?>
                                            <div class="col-md-3">
                                                <img src="<?= base_url('media/images/gambar_lokasi/' . $row['gambar'])  ?>" alt="">
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?= site_url('admin/delete_gambar/' . md5($row['id_gambar'])) ?>">Hapus</a>
                                            </div>
                                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .animated -->
</div><!-- .content -->

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
                <form action="<?= base_url('Admin/tambah_gambar_lokasi') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input  name="id_lokasi" type="hidden" value="<?php echo $lokasi['id_lokasi'] ?>">
                </div>
                <div class="form-group">
                    <label for="filemedia" class="control-label mb-1">Gambar</label>
                    <input type="file" multiple id="filemedia" name="filemedia[]" class="form-control-file" >
                    <small class="form-text text-muted">Format : png, jpg, jpeg</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Button trigger modal -->
