<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Asset Information System</title>
        <link href="<?php echo base_url('assets/img/favicon.ico'); ?>" rel="icon" type="image/x-icon" />

        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <!-- LOGIN-->
        <div class="container">    
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="text-center">
                    <img src="<?php echo base_url('assets/img/logo.png'); ?>">
                </div>
        
                <br/>
                <div class="panel panel-telkom" >
                    <div class="panel-heading">
                        <div class="panel-title text-center">Asset Informations System</div>
                    </div>     
                    <div style="padding-top:30px" class="panel-body" >
                        <?php $attr = array('class' => 'hidden','id' => 'remember'); ?>
                        <?php echo form_open("auth/login",array('role' => 'form','class' => 'form-horizontal'));?>
                            <?php if($message !== false):?>
                                <div class="alert alert-danger"><?php echo $message;?></div>
                            <?php endif; ?>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <?php echo form_input(array_merge($identity, array('class' => 'form-control','placeholder' => 'NIK')));?>
                            </div>
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <?php echo form_input(array_merge($password, array('class' => 'form-control','placeholder' => 'Password')));?>
                            </div>
                                        
                            <div class="input-group" style="margin-top:-10px;">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" value="1" id="remember_me" checked="checked"> Remember me
                                    </label>
                                </div>
                            </div>

                            <div style="margin-top:10px" class="input-group" >
                                <button id="btn-login" href="#" class="btn btn-telkom " style="width:100%;">Login  </button>
                            </div>
                        </form>     
                    </div>                     
                </div>  
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    </body>
</html>