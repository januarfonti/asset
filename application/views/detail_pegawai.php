<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data'); ?>">Master Data</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data/data_pegawai'); ?>">Data Pegawai</a></li>
                    <li class="active">Detail Pegawai</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i> Detail Data Pegawai
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                            
                            <?php echo form_open("master_data/data_pegawai",array('role' => 'form','class' => 'form-horizontal'));?>
                                
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">NIK</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="nik" name="nik" value="<?php echo $data_pegawai->nik; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo $data_pegawai->first_name; ?> <?php echo $data_pegawai->last_name; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Jabatan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="last_name" name="id_jabatan" value="<?php echo $data_pegawai->nama_jabatan; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="email" name="email" value="<?php echo $data_pegawai->email; ?>" disabled>
                                    </div>
                                </div>

                                
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Alamat</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="alamat" name="alamat" value="<?php echo $data_pegawai->alamat; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">No. Telepon</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="phone" name="phone" value="<?php echo $data_pegawai->phone; ?>" disabled>
                                    </div>
                                </div>

                                

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                        <a href="<?php echo base_url('master_data/data_pegawai'); ?>" class="btn btn-telkom"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        <a href="<?php echo base_url('master_data/ubah_pegawai'); ?>/<?php echo $data_pegawai->id; ?>" class="btn btn-telkom"><i class="fa fa-edit"></i> Ubah</a>
                                        <a href="<?php echo base_url('master_data/hapus_pegawai'); ?>/<?php echo $data_pegawai->id; ?>" class="btn btn-telkom-warning"><i class="fa fa-ban"></i> Hapus</a>
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



