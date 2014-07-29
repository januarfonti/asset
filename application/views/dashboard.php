<div class="container" style="padding-top:75px;">

<?php if ($this->ion_auth->is_admin()) {?>

        <div class="page-header"><h4><i class="fa fa-hdd-o"></i> Master Data</h4></div>
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('master_data/data_kantor'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-bank fa-3x pull-left"></i> Data<br>Kantor</a>
            </div>
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('master_data/data_ruangan'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-building fa-3x pull-left"></i> Data<br>Ruangan</a>
            </div>
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('master_data/data_kategori'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-archive fa-3x pull-left"></i> Data<br>Kategori</a>
            </div>
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('master_data/data_pegawai'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-users fa-3x pull-left"></i> Data<br>Pegawai</a>
            </div>
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('master_data/data_jabatan'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-puzzle-piece fa-3x pull-left"></i> Data<br>Jabatan</a>
            </div>
        </div>
        <div class="page-header"><h4><i class="fa fa-briefcase"></i> Asset</h4></div>
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/tambah_asset'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-plus-square fa-3x pull-left"></i> Tambah<br>Asset</a>
            </div>
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/mutasi'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-arrow-right fa-3x pull-left"></i><p style="margin-top:15px;">Mutasi</p></a>
            </div>
            <div class="col-xs-6 col-md-4"><a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/pemusnahan_asset'); ?>" style="width:100%;margin-bottom:5px;;">
                <i class="fa fa-ban fa-3x pull-left"></i> Pemusnahan<br>Asset</a>
            </div>
        </div>

        <div class="page-header"><h4><i class="fa fa-file-text"></i> Laporan</h4></div>
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/laporan_asset'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-file-text fa-3x pull-left"></i> Laporan<br>Asset</a>
            </div>
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/laporan_mutasi'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-file-text fa-3x pull-left"></i>Laporan<br>Mutasi</a>
            </div>
            <div class="col-xs-6 col-md-4"><a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/laporan_pemusnahan'); ?>" style="width:100%;margin-bottom:5px;;">
                <i class="fa fa-file-text fa-3x pull-left"></i> Laporan<br>Pemusnahan</a>
            </div>
        </div>
        <br/>
    

<?php } elseif ($this->ion_auth->in_group('kelola_asset')) { ?>

<div class="page-header"><h4><i class="fa fa-briefcase"></i> Asset</h4></div>
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/tambah_asset'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-plus-square fa-3x pull-left"></i> Tambah<br>Asset</a>
            </div>
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/mutasi'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-arrow-right fa-3x pull-left"></i><p style="margin-top:15px;">Mutasi</p></a>
            </div>
            <div class="col-xs-6 col-md-4"><a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/pemusnahan_asset'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-ban fa-3x pull-left"></i> Pemusnahan<br>Asset</a>
            </div>
        </div>

        <div class="page-header"><h4><i class="fa fa-file-text"></i> Laporan</h4></div>
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/laporan_asset'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-file-text fa-3x pull-left"></i> Laporan<br>Asset</a>
            </div>
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/laporan_mutasi'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-file-text fa-3x pull-left"></i>Laporan<br>Mutasi</a>
            </div>
            <div class="col-xs-6 col-md-4"><a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/laporan_pemusnahan'); ?>" style="width:100%;margin-bottom:5px;;">
                <i class="fa fa-file-text fa-3x pull-left"></i> Laporan<br>Pemusnahan</a>
            </div>
        </div>
        <br/>

<?php } elseif ($this->ion_auth->in_group('laporan')) { ?>


        <div class="page-header"><h4><i class="fa fa-file-text"></i> Laporan</h4></div>
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/laporan_asset'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-file-text fa-3x pull-left"></i> Laporan<br>Asset</a>
            </div>
            <div class="col-xs-6 col-md-4">
                <a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/laporan_mutasi'); ?>" style="width:100%;margin-bottom:5px;">
                <i class="fa fa-file-text fa-3x pull-left"></i>Laporan<br>Mutasi</a>
            </div>
            <div class="col-xs-6 col-md-4"><a class="btn btn-lg btn-menu-utama" href="<?php echo base_url('kelola_asset/laporan_pemusnahan'); ?>" style="width:100%;margin-bottom:5px;;">
                <i class="fa fa-file-text fa-3x pull-left"></i> Laporan<br>Pemusnahan</a>
            </div>
        </div>
        <br/>
<?php } ?>

</div><!--container-->