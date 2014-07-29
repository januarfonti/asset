<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data'); ?>">Master Data</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data/data_ruangan'); ?>">Data Ruangan</a></li>
                    <li class="active">Ubah Data Ruangan</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-building"></i> Ubah Data Ruangan
                    </div>

                        <div class="panel-body">
                        
                            
                            <?php echo form_open("master_data/proses_ubah_ruangan",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kode Ruangan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="hidden" id="formGroupInputLarge" name="id_ruangan" value="<?php echo $data_ruangan->id_ruangan; ?>">
                                        <input class="form-control" type="text" id="formGroupInputLarge" name="kode_ruangan" value="<?php echo $data_ruangan->kode_ruangan; ?>">
                                    </div>
                                </div>

                               <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Kantor</label>
                                    <div class="col-sm-10">
                                         <select name="id_kantor" id="bs3Select" class="input-lg selectpicker form-control" data-live-search="true">
                                            <option  value="<?php echo $data_ruangan->id_kantor; ?>"><?php echo $data_ruangan->nama_kantor; ?></option>
                                         <?php foreach ($data_kantor->result() as $row) { ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama_kantor; ?></option> 
                                         <?php } ?>
                                            
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Ruangan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="formGroupInputLarge" name="nama_ruangan" value="<?php echo $data_ruangan->nama_ruangan; ?>">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-telkom"><i class="fa fa-thumbs-up"></i> Ubah Data Ruangan</button>
                                        <a href="<?php echo base_url('master_data/data_ruangan'); ?>" class="btn btn-telkom"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        
                                    </div>
                                </div>
                            </form>
                        </div><!--panel body-->
                </div><!--panel telkom-->
            </div><!--col-xs-12-->
        </div><!--row-->

        
    </div><!--container-->