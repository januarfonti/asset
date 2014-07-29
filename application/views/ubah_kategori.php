<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data'); ?>">Master Data</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data/data_kategori'); ?>">Data Kategori</a></li>
                    <li class="active">Ubah Kategori</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-archive"></i> Ubah Data Kategori
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>                        
                            
                            <?php echo form_open("master_data/proses_ubah_kategori",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kode Kategori</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" name="id" type="hidden" id="formGroupInputLarge" value="<?php echo $data_kategori->id; ?>">
                                        <input class="form-control" name="kode_kategori" type="text" id="formGroupInputLarge" value="<?php echo $data_kategori->kode_kategori; ?>">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Kategori</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="nama_kategori" type="text" id="formGroupInputLarge" value="<?php echo $data_kategori->nama_kategori; ?>">
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