<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Asset</title>

     <script type="text/php">

  if ( isset($pdf) ) {

    $font = Font_Metrics::get_font("verdana", "bold");
    $pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));

  }
  </script>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
  <div class="col-md-12 text-center">
      <div class="row"  style="font-size:25px;">
          Laporan Mutasi Asset
      </div>
      <div class="row">
          Periode Tanggal : <strong><?php echo $tanggal1; ?></strong> sampai <strong><?php echo $tanggal2; ?></strong><br>
          Total Asset <strong><?php echo $laporan->num_rows(); ?></strong>
      </div>
  </div>
  <hr/>

  
  <div class="row" style="margin-top:5px;">
      <div class="col-md-12">
          <table class="table table-bordered" style="width:100%;">
              <thead>
                  <tr class="active">
                      <th class="text-center">No</th>
                      <th class="text-center">Kode</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Kategori</th>
                      <th class="text-center">Kantor</th>
                      <th class="text-center">Ruangan</th>
                      <th class="text-center">Tanggal Mutasi</th>
                      <th class="text-center">Jenis Mutasi</th>
                      <th class="text-center">Kondisi</th>
                      <th class="text-center">Dimutasi Oleh</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1; ?>
                  <?php if ($laporan->num_rows()==0){ ?>
                      <tr>
                          <td>Data Kosong</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>    
                  <?php } elseif ($laporan->num_rows()<>0){ 
                      foreach ($laporan->result() as $row) { ?>
                      <tr class="isi-tabel-telkom">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row->kode_asset; ?></td>
                          <td><?php echo $row->nama_asset; ?></td>
                          <td><?php echo $row->nama_kategori; ?></td>
                          <td><?php echo $row->nama_kantor; ?></td>
                          <td><?php echo $row->nama_ruangan; ?></td>
                          <td><?php echo $row->tanggal_mutasi; ?></td>
                          <td><?php echo $row->jenis_mutasi; ?></td>
                          <td><?php echo $row->kondisi; ?></td>
                          <td><?php echo $row->user_mutasiasset; ?></td>
                      </tr>
                  <?php $no++; } } ?>
              </tbody>
          </table>
      </div>
    </div>
  </div><!--container-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
  </body>
</html>