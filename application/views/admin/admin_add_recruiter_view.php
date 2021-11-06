<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Add Recruiter            
   </h1>

   <?php
   $errors = validation_errors();
   if(isset($errors)){
    echo $errors;
  }
  ?>

</section>

<!-- Main content -->
<section class="content">

  <!-- Your Page Content Here -->
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Create New Recruiter Account</h3>
        </div><!-- /.box-header -->

        <!-- form start -->
        <form role="form" action="<?php echo base_url()?>admin/admin_main/make_new_recruiter" method="post">
          <div class="box-body">

            <div class="form-group col-md-6">
              <label>Recruiter Username</label>
              <input type="text" class="form-control" name ="recruiter_username" placeholder="Enter Unique Recruiter Username" required>
            </div>
            <div class="form-group col-md-6">
              <label>Company Name</label>
              <input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" required>
            </div>                   
            <div class="form-group col-md-6">
              <label>Placement Coordinator</label>
              <input type="text" class="form-control" name="coordinator" placeholder="Enter Coordinator Responsible" required>
            </div>
            <div class="form-group col-md-6">
              <label>Coordinator Mobile</label>
              <input type="text" class="form-control" name="coordinator_mobile" placeholder="Enter Coordinator Mobile Number" required>
            </div>
            <div class="form-group col-md-6">
              <label >Password</label>
              <input type="password" class="form-control"  name="password" placeholder="Choose Password" required>
            </div>
            <div class="form-group col-md-6">
              <label>Re-enter Password</label>
              <input type="password" class="form-control"  name="confirm_password" placeholder="Re-enter Password" required>
            </div>

            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />

            <div class="form-group col-md-12 text-center">
              <button type="submit" class="update_button" style="position: relative;">Create</button>
            </div>


          </div><!-- /.box-body -->
        </form>

      </div><!-- /.box -->

      <section class="content-header">
        <h1>
         Add Student            
       </h1>
      </section>

     <!-- CREATE A NEW STUDENT ACCOUNT-->
     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Create New Student Account</h3>
      </div><!-- /.box-header -->

      <!-- form start -->
      <form role="form" action="<?php echo base_url();?>admin/admin_main/create_new_student_account" method="post">
        <div class="box-body">

          <div class="form-group col-md-6">
            <label>Username/Roll Number</label>
            <input type="text" class="form-control" name="username_rollnumber" placeholder="Enter Roll Number" required>
          </div>

          <div class="form-group col-md-6">
            <label >Password</label>
            <input type="password" class="form-control" name="password" placeholder="Choose Password" required>
          </div>

          <div class="form-group col-md-6">
            <label >Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" placeholder="Choose Password" required>
          </div>

          <div class="form-group col-md-6">
            <label>Course</label>
            <select class="form-control select2" data-placeholder="Select Course" name="student_course" style="width:100%;">
              <option></option>
              <option value="btech">B.Tech</option>
              <option value="mtech">M.Tech</option>
              <option value="mba">MBA</option>                      
            </select>
          </div>                            

          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />

          <div class="form-group col-md-12 text-center">
            <button type="submit" class="update_button" style="position: relative;">Create</button>
          </div>


        </div><!-- /.box-body -->
      </form>

    </div><!-- /.box -->


  </div>
</div>

</section><!-- /.content -->
      </div><!-- /.content-wrapper -->