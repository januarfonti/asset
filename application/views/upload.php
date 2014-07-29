
<?php echo $this->session->flashdata('errors'); ?>
                            
                            <?php echo form_open_multipart("kelola_asset/resize",array('role' => 'form','class' => 'form-horizontal'));?>
                                

                                 

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