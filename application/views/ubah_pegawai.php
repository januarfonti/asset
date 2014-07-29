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
                        <i class="fa fa-users"></i> Ubah Data Pegawai
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <div id="infoMessage"><?php echo $message;?></div>
                            
                            <?php echo form_open(uri_string(),array('role' => 'form','class' => 'form-horizontal'));?>
                                
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">NIK</label>
                                    <div class="col-sm-10">
                                        <?php echo form_input($nik);?>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"><?php echo lang('edit_user_fname_label', 'first_name');?></label>
                                    <div class="col-sm-10">
                                      <?php echo form_input($first_name);?>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Belakang</label>
                                    <div class="col-sm-10">
                                        <?php echo form_input($last_name);?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Jabatan</label>
                                    <div class="col-sm-10">
                                         <select name="id_jabatan" id="bs3Select" class="input-lg selectpicker form-control" data-live-search="true">
                                         <?php foreach ($data_jabatan->result() as $row) { ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama_jabatan; ?></option> 
                                         <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                         <select name="jenis_kelamin" id="bs3Select" class="input-lg selectpicker form-control" data-live-search="true">
                                            
                                         
                                         <option value="<?php echo $user->jenis_kelamin; ?>"><?php echo $user->jenis_kelamin; ?></option> 
                                            <option value="Pria">Pria</option> 
                                            <option value="Wanita">Wanita</option> 
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Email</label>
                                    <div class="col-sm-10">
                                        <?php echo form_input($email);?>
                                    </div>
                                </div>

                                
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Alamat</label>
                                    <div class="col-sm-10">
                                        <?php echo form_input($alamat);?>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">No. Telepon</label>
                                    <div class="col-sm-10">
                                        <?php echo form_input($phone);?>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Password</label>
                                    <div class="col-sm-10">
                                        <?php echo form_input($password);?>
                                        <span class="help-block"><small><i>Jika anda ingin mengganti password</i></small></span>
                                    </div>
                                </div>

                                 <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Konfirmasi Password</label>
                                    <div class="col-sm-10">
                                        <?php echo form_input($password_confirm);?>
                                        <span class="help-block"><small><i>Jika anda ingin mengganti password</i></small></span>
                                    </div>
                                </div>

                                <hr/>

                                <?php if ($this->ion_auth->is_admin() || $this->ion_auth->in_group('master_data')): ?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Hak Akses</label>
                                    <div class="col-sm-10">
                                        <div class="checkbox">


                                        <?php foreach ($groups as $group):?>
                                        <label class="checkbox">
                                        <?php
                                            $gID=$group['id'];
                                            $checked = null;
                                            $item = null;
                                            foreach($currentGroups as $grp) {
                                                if ($gID == $grp->id) {
                                                    $checked= ' checked="checked"';
                                                break;
                                                }
                                            }
                                        ?>
                                        <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>><?php echo $group['description'];?>
                                        </label>
                                        <?php endforeach?>
                                        <?php echo form_hidden('id', $user->id);?>
                              <?php echo form_hidden($csrf); ?>


                                        </div>
                                    </div>
                                </div>
                                <?php endif ?>
                                
                                


                                

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-telkom"><i class="fa fa-thumbs-up"></i> Submit</button>
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