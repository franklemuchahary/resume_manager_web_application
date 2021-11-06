  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="margin-bottom:10px;">
       My Profile

     </h1>

   </section>

   <!-- Main content -->
   <section class="content">


    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Extra Activities</h3>
          </div><!-- /.box-header -->

          <?php 
            if(isset($profile_updated)){
              echo '<script> alert("'.str_replace(array("\r","\n"), '\n', $profile_updated).'"); </script>';
            }
            $message = validation_errors();
            if((isset($message))&&($message!='')){
              echo '<script> alert("'.str_replace(array("\r","\n"), '\n', $message).'"); </script>';
            }
          ?>

          <!-- form start -->
          <form role="form" action="<?php echo base_url();?>student/change_extra_info/" method="post">
            <div class="box-body">

              {extra_info}
              <div class="form-group col-md-12">
                <label>Other Qualifications (If Any)</label>
                <textarea type="text" rows="3" class="form-control" name="other_qualifications" placeholder="Enter Other Qualifications">{other_qualifications}</textarea>
              </div>
              <div class="form-group col-md-12">
                <label> Professional Societies </label>
                <textarea type="text" rows="3" class="form-control" name="professional_societies" placeholder="Enter Professional Societies">{professional_societies}</textarea>
              </div>
              <div class="form-group col-md-12">
                <label> Extra Curriculars </label>
                <textarea type="text" rows="3" class="form-control" name="extra_curriculars" placeholder="Enter Extra Curricular Activities ">{extra_curriculars}</textarea>
              </div>
              <div class="form-group col-md-12">
                <label> Career Objective  </label>
                <textarea type="text" rows="3" class="form-control" name="career_objective" placeholder="Enter Career Objectives">{career_objective}</textarea>
              </div>
              <div class="form-group col-md-12">
                <label> Technical Skills  </label>
                <textarea type="text" rows="3" class="form-control" name="technical_skills" placeholder="Enter Technical Skills">{technical_skills}</textarea>
              </div>
              <div class="form-group col-md-12">
                <label> Other Skills </label>
                <textarea type="text" rows="3" class="form-control" name="other_skills" placeholder="Enter Other Skills">{other_skills}</textarea>
              </div>
              <div class="form-group col-md-12">
                <label> Hobbies </label>
                <textarea type="text" rows="3" class="form-control" name="hobbies" placeholder="Enter Hobbies">{hobbies}</textarea>
              </div>

              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />

              <div class="form-group col-md-12 text-center">
                <button type="submit" class="update_button">Update</button>
              </div>
              {/extra_info}

            </div><!-- /.box-body -->
          </form>

        </div><!-- /.box -->
      </div>
    </div>





  </section><!-- /.content -->


</section><!-- /.content -->
</div><!-- /.content-wrapper -->

