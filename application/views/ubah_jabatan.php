<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data'); ?>">Master Data</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data/data_jabatan'); ?>">Data Jabatan</a></li>
                    <li class="active">Ubah Jabatan</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-puzzle-piece"></i> Ubah Data Jabatan
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>                        
                            
                            <?php echo form_open("master_data/proses_ubah_jabatan",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kode Jabatan</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" name="id" type="hidden" id="formGroupInputLarge" value="<?php echo $data_jabatan->id; ?>">
                                        <input class="form-control" name="kode_jabatan" type="text" id="formGroupInputLarge" value="<?php echo $data_jabatan->kode_jabatan; ?>">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Jabatan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="nama_jabatan" type="text" id="formGroupInputLarge" value="<?php echo $data_jabatan->nama_jabatan; ?>">
                                    </div>
                                </div>

                                

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-telkom"><i class="fa fa-thumbs-up"></i> Ubah Data Jabatan</button>
                                        <a href="<?php echo base_url('master_data/data_kantor'); ?>" class="btn btn-telkom"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        
                                    </div>
                                </div>
                            </form>
                        </div><!--panel body-->
                </div><!--panel telkom-->
            </div><!--col-xs-12-->
        </div><!--row-->

        
    </div><!--container-->