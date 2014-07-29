<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data'); ?>">Master Data</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data/data_kantor'); ?>">Data Kantor</a></li>
                    <li class="active">Detail Kantor</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-building"></i> Detail Ruangan
                    </div>

                        <div class="panel-body">
                        
                            
                            <?php echo form_open("master_data/proses_tambah_kantor",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kode Ruangan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="formGroupInputLarge" name="kode_ruangan" value="<?php echo $data_ruangan->kode_ruangan; ?>" disabled>
                                    </div>
                                </div>

                               

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Ruangan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="formGroupInputLarge" name="nama_ruangan" value="<?php echo $data_ruangan->nama_ruangan; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                        <a href="<?php echo base_url('master_data/data_ruangan'); ?>" class="btn btn-telkom"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        <a href="<?php echo base_url('master_data/ubah_ruangan'); ?>/<?php echo $data_ruangan->id_ruangan; ?>" class="btn btn-telkom"><i class="fa fa-edit"></i> Ubah</a>
                                        <a href="<?php echo base_url('master_data/hapus_ruangan'); ?>/<?php echo $data_ruangan->id_ruangan; ?>" class="btn btn-telkom-warning"><i class="fa fa-ban"></i> Hapus</a>
                                    </div>
                                </div>
                            </form>
                        </div><!--panel body-->
                </div><!--panel telkom-->
            </div><!--col-xs-12-->
        </div><!--row-->

        
    </div><!--container-->