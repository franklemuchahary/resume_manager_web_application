<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Resume Manager | Password Recovery</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico">
	<!-- Google Font -->
	<link href= 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600'>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<!-- Login Page Styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/login.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
    	<div class="container" style="margin-top:25px">
    		<div class="row">
    			<div class="col-md-6 col-sm-8 col-sm-push-2 col-md-push-3 col-xs-10 col-xs-push-1 header">
    				<img src="<?php echo base_url();?>img/dtulogo.png"/> 
    			</div><!-- /col -->
    			<h1>Resume Manager</h1>

    		</div><!-- /row -->
    	</div><!-- /container -->




    	<div class="container">
    		<div class="row">

    			<div class="form col-md-6 col-sm-8 col-sm-push-2 col-md-push-3 col-xs-11 ">

    				<div>

    					<div id="student">   
    						<?php echo validation_errors(); ?>
    						<form action="<?php echo base_url('reset_password/update_new_password');?>" method="post">

                                <div class="field-wrap">
                                    <input type="text" name="email" value="<?php echo $email;?>" required autocomplete="off" readonly/>
                                </div>
    			
    							<div class="field-wrap">
    								<input type="text" name="username_roll" value="<?php echo $username_roll;?>" required autocomplete="off" readonly/>
    							</div>

    							<div class="field-wrap">
    								<input type="hidden" name="hash" value="<?php echo $hash;?>" required autocomplete="off" readonly/>
    							</div>

    							<div class="field-wrap">
    								<label>
    									<i class="fa fa-user"></i>New Password<span class="req">*</span>
    								</label>
    								<input type="password" name="new_password" required autocomplete="new-password"/>
    							</div>

    							<div class="field-wrap">
    								<label>
    									<i class="fa fa-lock"></i>Confirm Password<span class="req">*</span>
    								</label>
    								<input type="password" name="confirm_new_password" required autocomplete="new-password"/>
    							</div>

    							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />

    							<button type="submit" class="button button-block"/>Reset</button>

    						</form>

    					</div>

    				</div><!-- tab-content -->

    			</div> <!-- /form -->
    		</div><!-- /row -->
    	</div><!-- /container -->

    	<!-- REQUIRED JS SCRIPTS -->

    	<!-- jQuery 2.1.4 -->
    	<script src="<?php echo base_url();?>js/jQuery-2.1.4.min.js"></script>
    	<!-- Login Jquery -->
    	<script src="<?php echo base_url();?>js/login.js"></script>

    </body>

    </html>