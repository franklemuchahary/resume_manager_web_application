<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Content Wrapper. Contains page content --> 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 style="margin-bottom:10px;">
      My Account

    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">

      <!-- PASSWORD CHANGE -->
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Account Settings</h3>
          </div><!-- /.box-header -->

          <?php
          $message = validation_errors();
          if((isset($message))&&($message!='')){
            echo '<script> alert("'.str_replace(array("\r","\n"), '\n', strip_tags($message)).'"); </script>';
          }
          if(isset($password_changed)){
            echo '<script> alert("'.str_replace(array("\r","\n"), '\n', strip_tags($password_changed)).'"); </script>';
          }
          if(isset($security_changed)){
            echo '<script> alert("'.str_replace(array("\r","\n"), '\n', strip_tags($security_changed)).'"); </script>';
          }
          ?>

          <!-- form start -->
          <form role="form" action="<?php echo base_url('intern/intern_recruiter/recruiter_change_password/');?>" method="post">
            <div class="box-body">
              <div class="form-standard text-center">
                <h4>Change Password</h4>
              </div>
              <hr class="stan">
              <div class="form-group col-md-12">
                <label>Old Password</label>
                <input type="password" class="form-control" name="old_password" placeholder="Enter Old Password">
              </div>
              <div class="form-group col-md-12">
                <label>New Password</label>
                <input type="password" class="form-control" name="new_password" placeholder="Enter New Password">
              </div>
              <div class="form-group col-md-12" >
                <label>Confirm New Password</label>
                <input type="password" class="form-control" name="confirm_new_password" placeholder="Enter New Password">
              </div>  
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
              <div class="form-group col-md-12 text-center">
                <button type="submit" class="update_button" style="margin-top:15px;position:relative;">Update</button>
              </div>  
            </div><!-- /.box-body -->
          </form>
        </div> <!-- box ends here-->
      </div> <!-- col-md-6 ends here-->



      <!-- SECURITY QUESTION-->
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Account Settings</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="<?php echo base_url('intern/intern_recruiter/recruiter_change_security_question/');?>" method="post">
            <div class="box-body">
              <div class="form-standard text-center">
                <h4>Secret Question</h4>
              </div>
              <hr class="stan">

              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />

              <div class="form-group col-md-12">
                <label>Security Question</label>
                <input type="text" class="form-control" name="security_question" placeholder="Enter Security Question" autocomplete="off">
              </div>

              <input type="text" style="display:none">
              <input type="password" style="display:none">

              <div class="form-group col-md-12">
                <label>Answer</label>
                <input type="password" class="form-control" name="security_answer" placeholder="Enter Answer" autocomplete="new-password">
              </div> 
              
              <div class="form-group col-md-12 text-center">
                <button type="submit" class="update_button" style="margin-top:15px;position:relative;">Update</button>
              </div>       

            </div><!-- /.box-body -->
          </form>

        </div><!-- /.box -->
      </div>
    </div>


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


