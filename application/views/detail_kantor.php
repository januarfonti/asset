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
                        <i class="fa fa-bank"></i> Detail Kantor
                    </div>

                        <div class="panel-body">
                        
                            
                            <?php echo form_open("master_data/proses_tambah_kantor",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kode Kantor</label>
                                    <div class="col-sm-10">

                                        <input class="form-control" name="kode_kantor" type="text" id="formGroupInputLarge" value="<?php echo $data_kantor->kode_kantor; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Kantor</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="nama_kantor" type="text" id="formGroupInputLarge" value="<?php echo $data_kantor->nama_kantor; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Alamat Kantor</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="alamat_kantor" type="text" id="formGroupInputLarge" value="<?php echo $data_kantor->alamat_kantor; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="email" type="email" id="formGroupInputLarge" value="<?php echo $data_kantor->email; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                        <a href="<?php echo base_url('master_data/data_kantor'); ?>" class="btn btn-telkom"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        <a href="<?php echo base_url('master_data/ubah_kantor'); ?>" class="btn btn-telkom"><i class="fa fa-edit"></i> Ubah</a>
                                        <a href="<?php echo base_url('master_data/hapus_kantor'); ?>" class="btn btn-telkom-warning"><i class="fa fa-ban"></i> Hapus</a>
                                    </div>
                                </div>
                            </form>
                        </div><!--panel body-->
                </div><!--panel telkom-->
            </div><!--col-xs-12-->
        </div><!--row-->

        
    </div><!--container-->