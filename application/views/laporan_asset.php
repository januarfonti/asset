<div class="container" style="padding-top:75px;">
        <div class="row">
            <div class="col-xs-12">
            
                <ol class="breadcrumb">
                    <li><a class="link-breadcumb-telkom" href="<?php echo base_url('dashboard'); ?>">Beranda</a></li>
                    <li class="active">Laporan Data Asset</li>
                </ol>

                <div class="panel panel-telkom">
                    <div class="panel-heading">
                        <i class="fa fa-archive"></i> Laporan Data Semua Asset
                    </div>
                    <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <a href="<?php echo base_url('kelola_asset/cetak_laporan_semua'); ?>" class="btn btn-telkom" style="width:100%;"><i class="fa fa-print"></i>  Cetak Data Semua Laporan Asset</a>
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
            </div><!--col-xs-12-->
        </div><!--row-->

        
    </div><!--container-->
