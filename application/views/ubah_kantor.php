<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data'); ?>">Master Data</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data/data_kantor'); ?>">Data Kantor</a></li>
                    <li class="active">Ubah Kantor</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-bank"></i> Ubah Data Kantor
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>                        
                            
                            <?php echo form_open("master_data/proses_ubah_kantor",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kode Kantor</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" name="id" type="hidden" id="formGroupInputLarge" value="<?php echo $data_kantor->id; ?>">
                                        <input class="form-control" name="kode_kantor" type="text" id="formGroupInputLarge" value="<?php echo $data_kantor->kode_kantor; ?>">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Kantor</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="nama_kantor" type="text" id="formGroupInputLarge" value="<?php echo $data_kantor->nama_kantor; ?>">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Alamat Kantor</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="alamat_kantor" type="text" id="formGroupInputLarge" value="<?php echo $data_kantor->alamat_kantor; ?>">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="email" type="email" id="formGroupInputLarge" value="<?php echo $data_kantor->email; ?>">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-telkom"><i class="fa fa-thumbs-up"></i> Ubah Data Kantor</button>
                                        <a href="<?php echo base_url('master_data/data_kantor'); ?>" class="btn btn-telkom"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        
                                    </div>
                                </div>
                            </form>
                        </div><!--panel body-->
                </div><!--panel telkom-->
            </div><!--col-xs-12-->
        </div><!--row-->

        
    </div><!--container-->