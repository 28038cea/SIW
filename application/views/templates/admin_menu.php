<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#"><img width=50 src="<?= base_url("media/images/profile/" . $this->session->userdata('profile')); ?>" alt="Logo"></a>
            <a class="navbar-brand hidden" href="#"><img src="<?= base_url("media/images/profile/" . $this->session->userdata('profile')); ?>" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <h3 class="menu-title">Dashboard</h3><!-- /.menu-title -->
                <li class="active">
                    <a href="<?= site_url('admin'); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>
                <h3 class="menu-title">Akun</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Akun</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user"></i><a href="<?= site_url('admin/akun'); ?>">Akun</a></li>
                        <li><i class="fa fa-male"></i><a href="<?= site_url('admin/pegawai'); ?>">Pegawai</a></li>
                        <li><i class="fa fa-user"></i><a href="<?= site_url('admin/role'); ?>">Role</a></li>
                        <li><i class="fa fa-male"></i><a href="<?= site_url('admin/tamu'); ?>">Tamu</a></li>
                    </ul>
                </li>
                <h3 class="menu-title">Informasi</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-info-circle"></i>Informasi</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-envelope"></i><a href="<?= site_url('admin/kontak'); ?>">Kontak</a></li>
                        <li><i class="fa fa-briefcase"></i><a href="<?= site_url('admin/media'); ?>">Media Partner</a></li>
                        <li><i class="fa fa-briefcase"></i><a href="<?= site_url('admin/lokasi'); ?>">lokasi</a></li>
                    </ul>
                </li>
                <h3 class="menu-title">Kamar</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-building-o"></i>Kamar</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-home"></i><a href="<?= site_url('admin/jenis'); ?>">Jenis Kamar</a></li>
                        <li><i class="fa fa-home"></i><a href="<?= site_url('admin/kamar'); ?>">Kamar</a></li>
                        <li><i class="fa fa-home"></i><a href="<?= site_url('admin/fasilitas'); ?>">Fasilitas</a></li>
                    </ul>
                </li>
                <h3 class="menu-title">Reservasi</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-suitcase"></i>Reservasi</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-arrow-right"></i><a href="<?= site_url('admin/checkin'); ?>">Check In</a></li>
                        <li><i class="fa fa-arrow-left"></i><a href="<?= site_url('admin/checkout'); ?>">Check Out</a></li>
                        <li><i class="fa fa-suitcase"></i><a href="<?= site_url('admin/reservasi'); ?>">Reservasi</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
<!-- Left Panel -->