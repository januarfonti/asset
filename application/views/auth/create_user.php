<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transjaya Travel - Pendaftaran Member</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/style.css'); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    

<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		
		<?php $attr = array('role' => 'form' ); ?>
		<?php echo form_open("master_data/data_pegawai",$attr);?>
			<h2>Pendaftaran Member<small><i>  Transjaya Travel</i></small></h2>
			<hr class="colorgraph">
			<div class="row">
			<div class="form-group">
			<?php if($message !== false):?>
                    <div class="alert alert-danger"><?php echo $message;?></div>
                    <?php endif; ?>
            </div>

				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        
                        <?php echo form_input(array_merge($first_name, array('class' => 'form-control input-lg','id' => 'first_name','placeholder' => 'Nama Depan','tabindex' => '1')));?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<?php echo form_input(array_merge($last_name, array('class' => 'form-control input-lg','id' => 'last_name','placeholder' => 'Nama Belakang','tabindex' => '2')));?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<?php echo form_input(array_merge($company, array('class' => 'form-control input-lg','id' => 'company','placeholder' => 'Alamat Lengkap','tabindex' => '3')));?>
			</div>
			<div class="form-group">
				
				<?php echo form_input(array_merge($email, array('class' => 'form-control input-lg','id' => 'email','placeholder' => 'Email','tabindex' => '4')));?>
			</div>

			<div class="form-group">
				
				<?php echo form_input(array_merge($phone, array('class' => 'form-control input-lg','id' => 'phone','placeholder' => 'Nomor Telepon','tabindex' => '5')));?>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<?php echo form_input(array_merge($password, array('class' => 'form-control input-lg','id' => 'password','placeholder' => 'Password','tabindex' => '6')));?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<?php echo form_input(array_merge($password_confirm, array('class' => 'form-control input-lg','id' => 'password_confirm','placeholder' => 'Confirm Password','tabindex' => '7')));?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
					</span>
				</div>
				<div class="col-xs-8 col-sm-9 col-md-9">
					 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Daftar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Masuk</a></div>
			</div>
		<?php echo form_close();?>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('dist/js/login.js'); ?>"></script>
  </body>
</html>