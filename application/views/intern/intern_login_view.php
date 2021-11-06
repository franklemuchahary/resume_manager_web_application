<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Resume Manager | T&P DTU</title>

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
          <h1>Resume Manager For Interns</h1>

        </div><!-- /row -->
      </div><!-- /container -->




      <div class="container">
       <div class="row">

         <div class="form col-md-6 col-sm-8 col-sm-push-2 col-md-push-3 col-xs-11 ">

          <ul class="tab-group">
            <li class="tab active"><a href="#student">Intern Student</a></li>
            <li class="tab"><a href="#recruiters">Intern Recruiter</a></li>
          </ul>

          <div class="tab-content">

            <div id="student">   
              <?php echo validation_errors(); ?>
              <form action="<?php echo base_url();?>intern/intern_login/student_login_handle" method="post">

                <div class="field-wrap">
                  <label>
                    <i class="fa fa-user"></i>Intern Student Username<span class="req">*</span>
                  </label>
                  <input type="text" id="intern_student_username_rollnumber" name="intern_student_username_rollnumber" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                  <label>
                    <i class="fa fa-lock"></i>Intern Password<span class="req">*</span>
                  </label>
                  <input type="password" id="intern_student_password" name="intern_student_password" required autocomplete="off"/>
                </div>

                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />

                <!--<p class="forgot"><a data-toggle="modal" data-target="#myModal" style="cursor:pointer">Forgot Password?</a></p>-->

                <button type="submit" class="button button-block"/>Log In</button>

              </form>

            </div>

            <div id="recruiters">   
              <?php echo validation_errors(); ?>
              <form action="<?php echo base_url();?>intern/intern_login/recruiter_login_handle" method="post">

                <div class="field-wrap">
                  <label>
                   <i class="fa fa-user-secret"></i>Intern Recruiter Username<span class="req">*</span>
                 </label>
                 <input type="text" required autocomplete="off" name="intern_recruiter_username" />
               </div>

               <input type="text" style="display:none">
               <input type="password" style="display:none">


               <div class="field-wrap">
                <label>
                  <i class="fa fa-lock"></i>Intern Password<span class="req">*</span>
                </label>
                <input type="password" required autocomplete="off" name="intern_recruiter_password" />
              </div>

              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
              
              <button class="button button-block"/>Log In</button>

            </form>

          </div>

        </div><!-- tab-content -->

      </div> <!-- /form -->
    </div><!-- /row -->
  </div><!-- /container -->


   <h2 style="text-align: center; color: white;"><a href="<?php echo base_url()?>">Placements Resume Manager</a></h2>


  <!-- Reset Password Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('reset_password')?>" method="post">
            <input type="text" name="reset_pass_roll_no" placeholder="Roll Number" >
            <input type="email" name="reset_pass_email" placeholder="Email-ID" >
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" /><br>
            <button type="submit" class="button button-block">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url();?>js/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Login Jquery -->
  <script src="<?php echo base_url();?>js/login.js"></script>

</body>

</html>