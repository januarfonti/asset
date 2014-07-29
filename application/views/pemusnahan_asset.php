<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('kelola_asset'); ?>">Asset</a></li>
                    <li class="active">Pemusnahan Asset</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-ban"></i> Pemusnahan Asset
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                            
                            <?php echo form_open("kelola_asset/proses_pemusnahan_asset",array('role' => 'form','class' => 'form-horizontal'));?>
                                

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
                                <label class="col-sm-2 control-label" for="formGroupInputLarge">Pemusnahan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="pemusnahan" type="text" id="formGroupInputLarge" placeholder="Keterangan">
                                    </div>
                                </div>

                                

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tanggal Keluar</label>
                                    <div class="col-sm-10">
                                            
                                                <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal_keluar">
                                                <span class="help-block"><small>Format tanggal <i>yyyy-mm-dd</i>. Contoh 2014-12-01</small></span>
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
                        <th class="text-center">Tanggal Keluar</th>
                        
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
                        
                        
                        
                    </tr>    
                    <?php }
                
                elseif ($data_asset->num_rows()<>0){ 
                    foreach ($data_asset->result() as $row) { ?>
                    <tr class="isi-tabel-telkom">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nama_asset; ?></td>
                        <td><?php echo $row->nama_kantor; ?></td>
                        <td><?php echo $row->nama_ruangan; ?></td>
                        <td><?php echo $row->tanggal_keluar; ?></td>
                        
                        

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