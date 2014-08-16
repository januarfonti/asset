<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
            
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li class="active">Laporan Data Asset</li>
                </ol>

                <!-- TAB -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#pdf" role="tab" data-toggle="tab">PDF</a></li>
                  <li><a href="#excel" role="tab" data-toggle="tab">Excel</a></li>
                  
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="pdf">
                        <div class="panel panel-telkom">
                            <div class="panel-heading">
                                <i class="fa fa-archive"></i> Laporan Data Semua Asset
                            </div>
                            <div class="panel-body">
                                <?php echo $this->session->flashdata('pesan'); ?>
                                <a href="<?php echo base_url('kelola_asset/cetak_laporan_semua'); ?>" class="btn btn-telkom" style="width:100%;"><i class="fa fa-print"></i>  Cetak PDF Data Semua Laporan Asset</a>
                            </div><!--panel body-->
                        </div><!--panel telkom-->

                        <div class="panel panel-telkom">
                            <div class="panel-heading">
                                <i class="fa fa-archive"></i> Laporan Data Asset
                            </div>
                            <div class="panel-body">
                                <?php echo $this->session->flashdata('pesan'); ?>
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Laporan data asset berdasarkan tanggal masuk.
                                </div>
                                <?php echo form_open("kelola_asset/cetak_laporan",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                        <strong><i>Antara</i></strong>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tanggal Awal</label>
                                    <div class="col-sm-10">
                                                <input type="hidden" name="orientation" value="landscape">
                                                <input type="hidden" name="paper" value="a4">                                            
                                                <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal_awal">
                                            <span class="help-block"><small>Format tanggal <i>yyyy-mm-dd</i>. Contoh 2014-12-01</small></span>
                                            
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                            <strong><i>dan</i></strong>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tanggal Akhir</label>
                                    <div class="col-sm-10">
                                            
                                                <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal_akhir">
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

                       <div class="panel panel-telkom">
                            <div class="panel-heading">
                                <i class="fa fa-archive"></i> Laporan Data Asset Berdasarkan Kantor
                            </div>
                            <div class="panel-body">
                                
                                
                                <?php echo form_open("kelola_asset/cetak_laporan_ruangan",array('role' => 'form','class' => 'form-horizontal'));?>
                                

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
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Jenis Laporan</label>
                                    <div class="col-sm-10">
                                        <div class=" input-lg">
                                            <?php echo form_radio("jenis", "pdf", TRUE); ?> PDF
                                            <?php echo form_radio("jenis", "excel"); ?> Excel
                                        </div>
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


                  </div><!-- AKHIR TAB PDF -->
                  <div class="tab-pane" id="excel">
                        <div class="panel panel-telkom">
                            <div class="panel-heading">
                                <i class="fa fa-archive"></i> Laporan Data Semua Asset
                            </div>
                            <div class="panel-body">
                                <?php echo $this->session->flashdata('pesan'); ?>
                                <a href="<?php echo base_url('kelola_asset/cetak_laporan_semua_excel'); ?>" class="btn btn-telkom" style="width:100%;"><i class="fa fa-print"></i>  Export Excel Data Semua Laporan Asset</a>
                            </div><!--panel body-->
                        </div><!--panel telkom-->

                        <div class="panel panel-telkom">
                            <div class="panel-heading">
                                <i class="fa fa-archive"></i> Laporan Data Asset
                            </div>
                            <div class="panel-body">
                                <?php echo $this->session->flashdata('pesan'); ?>
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Laporan data asset berdasarkan tanggal masuk.
                                </div>
                                <?php echo form_open("kelola_asset/cetak_laporan_excel",array('role' => 'form','class' => 'form-horizontal'));?>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                        <strong><i>Antara</i></strong>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tanggal Awal</label>
                                    <div class="col-sm-10">
                                                <input type="hidden" name="orientation" value="landscape">
                                                <input type="hidden" name="paper" value="a4">                                            
                                                <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal_awal">
                                            <span class="help-block"><small>Format tanggal <i>yyyy-mm-dd</i>. Contoh 2014-12-01</small></span>
                                            
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"></label>
                                    <div class="col-sm-10">
                                            <strong><i>dan</i></strong>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tanggal Akhir</label>
                                    <div class="col-sm-10">
                                            
                                                <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal_akhir">
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


                    


                  </div><!-- AKHIR TAB EXCEL -->
                  
                </div>

                <!-- TAB AKHIR-->


                
            </div><!--col-xs-12-->
        </div><!--row-->

        
    </div><!--container-->

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