<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('kelola_asset'); ?>">Asset</a></li>
                    <li class="active">Mutasi Asset</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-arrow-right"></i> Mutasi Asset
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                            
                            <?php echo form_open("kelola_asset/proses_mutasi_asset",array('role' => 'form','class' => 'form-horizontal'));?>
                                

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Asset</label>
                                    <div class="col-sm-10">
                                         <select name="id_asset" id="bs3Select" class="input-lg selectpicker form-control" data-live-search="true">
                                         <?php foreach ($data_ambil_asset->result() as $row) { ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->kode_asset; ?> - <?php echo $row->nama_asset; ?></option> 
                                         <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-lg">
                                <label class="col-sm-2 control-label" for="formGroupInputLarge">Jenis Mutasi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="jenis_mutasi" type="text" id="formGroupInputLarge">
                                    </div>
                                </div>

                                

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tanggal Mutasi</label>
                                    <div class="col-sm-10">
                                            <div class="input-group date">
                                                <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal_mutasi">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                            </div>
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kantor</label>
                                    <div class="col-sm-10">
                                         <select name="id_kantor" id="bs3Select" class="input-lg selectpicker form-control" data-live-search="true">
                                         <?php foreach ($data_kantor->result() as $row) { ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama_kantor; ?></option> 
                                         <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Ruangan</label>
                                    <div class="col-sm-10">
                                         <select name="id_ruangan" id="bs3Select" class="input-lg selectpicker form-control" data-live-search="true">
                                         <?php foreach ($data_ruangan->result() as $row) { ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama_ruangan; ?></option> 
                                         <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kondisi</label>
                                    <div class="col-sm-10">
                                         <select name="kondisi" id="bs3Select" class="input-lg selectpicker form-control" data-live-search="true">
                                            <option value="Baru">Baru</option> 
                                            <option value="Rusak">Rusak</option> 
                                         
                                        </select>
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
                        <th class="text-center">Nama Asset</th>
                        <th class="text-center">Kantor</th>
                        <th class="text-center">Ruangan</th>
                        <th class="text-center">Tanggal Mutasi</th>
                        <th class="text-center">Detail</th>                        
                        <th class="text-center">Ubah</th>
                        <th class="text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                $no=1;
                if ($data_asset->num_rows()==0){ ?>
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
                
                elseif ($data_asset->num_rows()<>0){ 
                    foreach ($data_asset->result() as $row) { ?>
                    <tr class="isi-tabel-telkom">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nama_asset; ?></td>
                        <td><?php echo $row->nama_kantor; ?></td>
                        <td><?php echo $row->nama_ruangan; ?></td>
                        <td><?php echo $row->tanggal_mutasi; ?></td>
                        <td class="text-center"><a href="<?php echo base_url('kelola_asset/detail_asset'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom"><i class="fa fa-list"></i></a></td>
                        <td class="text-center"><a href="<?php echo base_url('kelola_asset/ubah_asset'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom"><i class="fa fa-edit"></i></a></td>
                        <td class="text-center"><a href="<?php echo base_url('kelola_asset/hapus_asset'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom-warning" onClick="return doconfirm();"><i class="fa fa-times"></i></a></td>

                    </tr>
                <?php $no++ ;} } ?>
                    

                    
                </tbody>
            </table>

        </div><!--table responsive-->
        

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