<!-- Header-->

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-lg-2 col-md-6 no-padding bg-flat-color-1">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-user text-light"></i>
                    </div>

                    <div class="h4 mb-0 text-light">
                        <span class="count">
                            <?php
                            foreach ($akun as $akun) {
                                echo "" . $akun->akun . "";
                            }
                            ?>
                        </span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Akun</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-2">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-info text-light"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">
                            <?php
                            foreach ($media as $media) {
                                echo "" . $media->media . "";
                            }
                            ?>
                        </span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Media Partner</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-3">
                    <div class="h1 text-right mb-4">
                        <i class="fa fa-home text-light"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">
                            <?php
                            foreach ($kamar as $kamar) {
                                echo "" . $kamar->kamar . "";
                            }
                            ?>
                        </span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Kamar</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-5">
                    <div class="h1 text-right text-light mb-4">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">
                            <?php
                            foreach ($reservasi as $reservasi) {
                                echo "" . $reservasi->reservasi . "";
                            }
                            ?>
                        </span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Reservasi</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-4">
                    <div class="h1 text-light text-right mb-4">
                        <i class="fa fa-arrow-left"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <?php
                        
                        ?>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Check In</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-1">
                    <div class="h1 text-light text-right mb-4">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count">
                            <?php
                            foreach ($checkout as $checkout) {
                                echo "" . $checkout->checkout . "";
                            }
                            ?>
                        </span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Check Out</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
        </div>

    </div>

</div> <!-- .content -->
</div><!-- /#right-panel -->