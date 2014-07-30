<?php $mydate=getdate(date("U"));?>


<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('kelola_asset'); ?>">Asset</a></li>
                    <li class="active">Data Asset</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-briefcase"></i> Tambah Asset
                    </div>

                        <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <?php echo $this->session->flashdata('errors'); ?>
                            
                            <?php echo form_open_multipart("kelola_asset/proses_tambah_asset",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kode</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="kode_asset" type="text" id="formGroupInputLarge">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Nama Asset</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="nama_asset" type="text" id="formGroupInputLarge">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kategori</label>
                                    <div class="col-sm-10">
                                         <select name="id_kategori" id="bs3Select" class="input-lg selectpicker form-control" data-live-search="true">
                                         <?php foreach ($data_kategori->result() as $row) { ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama_kategori; ?></option> 
                                         <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tanggal Masuk</label>
                                    <div class="col-sm-10">
                                            
                                                <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal_masuk" value="<?php echo "$mydate[year]-$mydate[mon]-$mydate[mday]"; ?>">
                                                <span class="help-block"><small>Format tanggal <i>yyyy-mm-dd</i>. Contoh 2014-12-01</small></span>
                                            
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tanggal Usia</label>
                                    <div class="col-sm-10">
                                            
                                                <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal_usia">
                                                <span class="help-block"><small>Format tanggal <i>yyyy-mm-dd</i>. Contoh 2014-12-01</small></span>
                                            
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kantor</label>
                                    <div class="col-sm-10">
                                        <div id="kantor">
                                            <?php
                                                echo form_dropdown("id_kantor",$option_kantor,"","id='id_kantor' class='input-lg selectpicker form-control' data-live-search='true' ");
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Ruangan</label>
                                    <div class="col-sm-10">
                                        <div id="ruangan">
                                            <?php
                                                echo form_dropdown("id_ruangan",array('Pilih Ruangan'=>'Pilih Kantor Dahulu'),"","class='input-lg selectpicker form-control' data-live-search='true' disabled");
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Status milik asset</label>
                                    <div class="col-sm-10">
                                         <select name="status_milik" id="bs3Select" class="input-lg selectpicker form-control" data-live-search="true">
                                            <option value="Datel">Datel</option> 
                                            <option value="Seat Manajemen">Seat Manajemen</option> 
                                         
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

                                 

                                 <div class="form-group">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Upload Gambar</label>
                                    <div class="col-sm-10">
                                        <input class="" name="userfile" type="file" id="formGroupInputLarge">
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
                        <th class="text-center">Nama Asset</th>
                        <th class="text-center">Kantor</th>
                        <th class="text-center">Ruangan</th>
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
                        <td><?php echo $row->kode_asset; ?></td>
                        <td><?php echo $row->nama_asset; ?></td>
                        <td><?php echo $row->nama_kantor; ?></td>
                        <td><?php echo $row->nama_ruangan; ?></td>
                        
                        <td class="text-center"><a href="<?php echo base_url('kelola_asset/detail_asset'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom"><i class="fa fa-list"></i></a></td>
                        <td class="text-center"><a href="<?php echo base_url('kelola_asset/ubah_asset'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom"><i class="fa fa-edit"></i></a></td>
                        <td class="text-center"><a href="<?php echo base_url('kelola_asset/hapus_asset'); ?>/<?php echo $row->id; ?>" class="btn btn-telkom-warning" onClick="return doconfirm();"><i class="fa fa-times"></i></a></td>

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
        job=confirm("Apakah anda yakin ingin menghapus data ini secara permanen ?");
        if(job!=true)
        {
        return false;
        }
        }
    </script>

    <script type="text/javascript">
        $("#id_kantor").change(function(){
                var selectValues = $("#id_kantor").val();
                if (selectValues == 0){
                    var msg = "<select name=\"id_ruangan\" class=\"input-lg selectpicker form-control\" data-live-search=\"true\" disabled><option value=\"Pilih Ruangan\">Pilih Kantor Dahulu</option></select>";
                    $('#ruangan').html(msg);
                }else{
                    var id_kantor = {id_kantor:$("#id_kantor").val()};
                    $('#id_ruangan').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('kelola_asset/select_ruangan')?>",
                            data: id_kantor,
                            success: function(msg){
                                $('#ruangan').html(msg);
                            }
                    });
                }
        });
       </script>