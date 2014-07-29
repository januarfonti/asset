<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data'); ?>">Master Data</a></li>
                    <li class="active">Data Pegawai</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i> Input Data Pegawai
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <div id="infoMessage"><?php echo $message;?></div>
                            <?php echo form_open("master_data/data_pegawai",array('role' => 'form','class' => 'form-horizontal'));?>
                                
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">NIK</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="nik" name="nik">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Depan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="first_name" name="first_name">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Belakang</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="last_name" name="last_name">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="email" name="email">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="password" name="password">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Konfirmasi Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="password_confirm" name="password_confirm">
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
                                            <option value="Pria">Pria</option> 
                                            <option value="Wanita">Wanita</option> 
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Alamat</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="alamat" name="alamat">
                                    </div>
                                </div>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">No. Telepon</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="phone" name="phone">
                                    </div>
                                </div>

                                

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

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="header-tabel-telkom">
                        <th class="text-center">#</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Detail</th>
                        <th class="text-center">Ubah</th>
                        <th class="text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                $no=1;
                if ($data_pegawai->num_rows()==0){ ?>
                    <tr class="isi-tabel-telkom">
                        <td>Data Kosong</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        
                    </tr>    
                    <?php }
                
                elseif ($data_pegawai->num_rows()<>0){ 
                    foreach ($data_pegawai->result() as $row) { ?>
                    <tr class="isi-tabel-telkom">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nik; ?></td>
                        <td><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></td>
                        <td><?php echo $row->nama_jabatan; ?></td>
                        <td><?php echo $row->alamat; ?></td>
                        
                        <td class="text-center"><a href="<?php echo base_url('master_data/detail_pegawai'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom"><i class="fa fa-list"></i></a></td>
                        <td class="text-center"><a href="<?php echo base_url('master_data/ubah_pegawai'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom"><i class="fa fa-edit"></i></a></td>
                        <td class="text-center"><a href="<?php echo base_url('master_data/hapus_pegawai'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom-warning" onClick="return doconfirm();"><i class="fa fa-times"></i></a></td>

                    </tr>
                <?php $no++ ;} } ?>
                    

                    
                </tbody>
            </table>

        </div><!--table responsive-->
        <?php echo $halaman;?>

        
    
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



