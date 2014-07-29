<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('master_data'); ?>">Master Data</a></li>
                    <li class="active">Data Jabatan</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-puzzle-piece"></i> Input Data Jabatan
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                            
                            <?php echo form_open("master_data/proses_tambah_jabatan",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kode Jabatan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="kode_jabatan" type="text" id="formGroupInputLarge">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Jabatan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="nama_jabatan" type="text" id="formGroupInputLarge">
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
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama Jabatan</th>
                        
                        
                        <th class="text-center">Ubah</th>
                        <th class="text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                $no=1;
                if ($data_jabatan->num_rows()==0){ ?>
                    <tr class="isi-tabel-telkom">
                        <td>Data Kosong</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        
                    </tr>    
                    <?php }
                
                elseif ($data_jabatan->num_rows()<>0){ 
                    foreach ($data_jabatan->result() as $row) { ?>
                    <tr class="isi-tabel-telkom">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->kode_jabatan; ?></td>
                        <td><?php echo $row->nama_jabatan; ?></td>
                        <td class="text-center"><a href="<?php echo base_url('master_data/ubah_jabatan'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom"><i class="fa fa-edit"></i></a></td>
                        <td class="text-center"><a href="<?php echo base_url('master_data/hapus_jabatan'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom-warning" onClick="return doconfirm();"><i class="fa fa-times"></i></a></td>
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