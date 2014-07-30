<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $judul_halaman; ?></title>
    <link href="<?php echo base_url('assets/img/favicon.ico'); ?>" rel="icon" type="image/x-icon" />

    <!-- Bootstrap -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.css'); ?>">

    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker3.css'); ?>">

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <script type="text/javascript">
        $(window).on('load', function () {

            $('.selectpicker').selectpicker({
                'selectedText': 'cat'
            });

            // $('.selectpicker').selectpicker('hide');
        });
    </script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <!-- LOGIN-->

<?php if ($this->ion_auth->is_admin()) {?>
      <nav class="navbar navbar-telkom navbar-default navbar-fixed-top" role="navigation" >
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-home"></i> Asset Informations System</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-hdd-o"></i> Master Data <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url('master_data/data_kantor'); ?>"><i class="fa fa-bank"></i> Data Kantor</a></li>
                  <li><a href="<?php echo base_url('master_data/data_ruangan'); ?>"><i class="fa fa-building"></i> Data Ruangan</a></li>
                  <li><a href="<?php echo base_url('master_data/data_kategori'); ?>"><i class="fa fa-archive"></i> Data Kategori</a></li>
                  <li><a href="<?php echo base_url('master_data/data_pegawai'); ?>"><i class="fa fa-users"></i> Data Pegawai</a></li>
                  <li><a href="<?php echo base_url('master_data/data_jabatan'); ?>"><i class="fa fa-puzzle-piece"></i> Data Jabatan</a></li>
                  
                  
                </ul>
              </li>
            </ul>

            <ul class="nav navbar-nav">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-briefcase"></i> Asset <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url('kelola_asset/tambah_asset'); ?>"><i class="fa fa-plus-square"></i> Tambah Aset</a></li>
                  <li><a href="<?php echo base_url('kelola_asset/mutasi'); ?>"><i class="fa fa-arrow-right"></i> Mutasi</a></li>
                  <li><a href="<?php echo base_url('kelola_asset/pemusnahan_asset'); ?>"><i class="fa fa-ban"></i> Pemusnahan Aset</a></li>
                  
                </ul>
              </li>
            </ul>

            <ul class="nav navbar-nav">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"></i> Laporan<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url('kelola_asset/laporan_asset'); ?>"><i class="fa fa-plus-square"></i> Laporan Data Aset</a></li>
                  <li><a href="<?php echo base_url('kelola_asset/laporan_mutasi'); ?>"><i class="fa fa-arrow-right"></i> Laporan Mutasi</a></li>
                  <li><a href="<?php echo base_url('kelola_asset/laporan_pemusnahan'); ?>"><i class="fa fa-ban"></i> Laporan Pemusnahan Aset</a></li>
                  
                </ul>
              </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user->first_name; ?> <?php echo $user->last_name; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  
                  
                  <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> Keluar</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
  <?php } elseif ($this->ion_auth->in_group('kelola_asset')) { ?>

      <nav class="navbar navbar-telkom navbar-default navbar-fixed-top" role="navigation" >
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Asset Informations System</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            

            <ul class="nav navbar-nav">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-briefcase"></i> Asset <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url('kelola_asset/tambah_asset'); ?>"><i class="fa fa-plus-square"></i> Tambah Aset</a></li>
                  <li><a href="<?php echo base_url('kelola_asset/mutasi'); ?>"><i class="fa fa-arrow-right"></i> Mutasi</a></li>
                  <li><a href="<?php echo base_url('kelola_asset/pemusnahan_asset'); ?>"><i class="fa fa-ban"></i> Pemusnahan Aset</a></li>
                  
                </ul>
              </li>
            </ul>

            <ul class="nav navbar-nav">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"></i> Laporan<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url('kelola_asset/laporan_asset'); ?>"><i class="fa fa-plus-square"></i> Laporan Data Aset</a></li>
                  <li><a href="<?php echo base_url('kelola_asset/laporan_mutasi'); ?>"><i class="fa fa-arrow-right"></i> Laporan Mutasi</a></li>
                  <li><a href="<?php echo base_url('kelola_asset/laporan_pemusnahan'); ?>"><i class="fa fa-ban"></i> Laporan Pemusnahan Aset</a></li>
                  
                </ul>
              </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user->first_name; ?> <?php echo $user->last_name; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  
                  
                  <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> Keluar</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <?php } elseif ($this->ion_auth->in_group('laporan')) { ?>

      <nav class="navbar navbar-telkom navbar-default navbar-fixed-top" role="navigation" >
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Asset Informations System</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            

            <ul class="nav navbar-nav">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"></i> Laporan<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url('kelola_asset/laporan_asset'); ?>"><i class="fa fa-plus-square"></i> Laporan Data Aset</a></li>
                  <li><a href="<?php echo base_url('kelola_asset/laporan_mutasi'); ?>"><i class="fa fa-arrow-right"></i> Laporan Mutasi</a></li>
                  <li><a href="<?php echo base_url('kelola_asset/laporan_pemusnahan'); ?>"><i class="fa fa-ban"></i> Laporan Pemusnahan Aset</a></li>
                  
                </ul>
              </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user->first_name; ?> <?php echo $user->last_name; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  
                  
                  <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> Keluar</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <?php } ?>
    

  <!-- AKHIR LOGIN-->

   <?php echo $content; ?>


    <div class="footer-telkom text-center">Copyright © 2014 <a class ="link-footer" href="http://telkom.co.id" target="_blank">Telkom Indonesia</a></div>








    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>