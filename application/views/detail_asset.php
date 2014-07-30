<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('kelola_asset'); ?>">Asset</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('kelola_asset/tambah_asset'); ?>">Data Asset</a></li>
                    <li class="active">Detail Asset</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-briefcase"></i> Detail Asset
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                            
                            <?php echo form_open_multipart("kelola_asset/proses_tambah_asset",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kode</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="kode_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->kode_asset; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Asset</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->nama_asset; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kategori</label>
                                    <div class="col-sm-10">
                                         <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->nama_kategori; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tanggal Masuk</label>
                                    <div class="col-sm-10">
                                            <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->tanggal_masuk; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tanggal Usia</label>
                                    <div class="col-sm-10">
                                            <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->tanggal_usia; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kantor</label>
                                    <div class="col-sm-10">
                                         <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->nama_asset; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Ruangan</label>
                                    <div class="col-sm-10">
                                         <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->nama_ruangan; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Status milik asset</label>
                                    <div class="col-sm-10">
                                         <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->status_milik; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kondisi</label>
                                    <div class="col-sm-10">
                                         <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->kondisi; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Ditambahkan Oleh</label>
                                    <div class="col-sm-10">
                                         <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->user_tambahasset; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Dimutasi Oleh</label>
                                    <div class="col-sm-10">
                                         <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge" value="<?php echo $data_asset->user_mutasiasset; ?>" disabled>
                                    </div>
                                </div>

                                 

                                 <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Gambar</label>
                                    <div class="col-sm-10">
                                        
                                        <img class="img-responsive img-thumbnail" src="<?php echo base_url('assets/upload'); ?>/<?php echo $data_asset->gambar; ?>">
                                        
                                    </div>
                                </div>

                                

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                        
                                        <a href="<?php echo base_url('kelola_asset/tambah_asset'); ?>" class="btn btn-telkom"><i class="fa fa-arrow-left"></i> Kembali</a>

                                    </div>
                                </div>
                            </form>
                        </div><!--panel body-->
                </div><!--panel telkom-->
            </div><!--col-xs-12-->
        </div><!--row-->

    

    </div><!--container-->

    <script>
        function doconfirm()
        {
        job=confirm("Are you sure to delete permanently?");
        if(job!=true)
        {
        return false;
        }
        }
    </script>