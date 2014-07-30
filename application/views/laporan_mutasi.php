<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
            
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li class="active">Laporan Mutasi Asset</li>
                </ol>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#pdf" role="tab" data-toggle="tab">PDF</a></li>
                  <li><a href="#excel" role="tab" data-toggle="tab">Excel</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="pdf">
                      
                        <div class="panel panel-telkom">
                        <div class="panel-heading">
                            <i class="fa fa-archive"></i> Laporan Data Semua Mutasi Asset
                        </div>
                        <div class="panel-body">
                            <?php echo $this->session->flashdata('pesan'); ?>
                            <a href="<?php echo base_url('kelola_asset/cetak_laporan_mutasi_semua'); ?>" class="btn btn-telkom" style="width:100%;"><i class="fa fa-print"></i>  Cetak Data Semua Mutasi Asset</a>
                            </div><!--panel body-->
                    </div><!--panel telkom-->

                    <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-archive"></i> Laporan Mutasi Asset
                    </div>
                    

 
                         <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Laporan mutasi asset berdasarkan tanggal mutasi.
                        </div>
                            
                            <?php echo form_open("kelola_asset/cetak_laporan_mutasi",array('role' => 'form','class' => 'form-horizontal'));?>

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

                    </div><!--AKHIR TAB PDF-->

                    <div class="tab-pane" id="excel">
                        
                            <div class="panel panel-telkom">
                        <div class="panel-heading">
                            <i class="fa fa-archive"></i> Laporan Data Semua Mutasi Asset
                        </div>
                        <div class="panel-body">
                            <?php echo $this->session->flashdata('pesan'); ?>
                            <a href="<?php echo base_url('kelola_asset/cetak_laporan_mutasi_semua_excel'); ?>" class="btn btn-telkom" style="width:100%;"><i class="fa fa-print"></i>  Export Excel Data Semua Mutasi Asset</a>
                            </div><!--panel body-->
                    </div><!--panel telkom-->

                    <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-archive"></i> Laporan Mutasi Asset
                    </div>
                    

 
                         <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Laporan mutasi asset berdasarkan tanggal mutasi.
                        </div>
                            
                            <?php echo form_open("kelola_asset/cetak_laporan_mutasi_excel",array('role' => 'form','class' => 'form-horizontal'));?>

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

                    </div><!--AKHIR TAB EXCEL-->
                    


                    </div><!--AKHIR TAB-->


                    
            </div><!--col-xs-12-->
        </div><!--row-->

        
    </div><!--container-->
