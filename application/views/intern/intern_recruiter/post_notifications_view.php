 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Notifications

    </h1>
  </section>

  <pre>
    <?php print_r($this->session->all_userdata());?>
  </pre>


  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="form-group col-md-12">
        <form id="postForm" action="<?php echo base_url('intern/intern_recruiter/post_notifications_recruiter/');?>" method="POST" enctype="multipart/form-data">
            <textarea class="input-block-level" id="summernote" name="summernote_content" rows="18">
            </textarea>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
            <button type="submit" class="update_button" style="margin-top:15px">POST</button>
          </form> 
        </div>
      </div><!-- /.col-->
    </div><!-- ./row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->



