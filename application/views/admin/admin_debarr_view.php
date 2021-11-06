<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Student            
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <?php
    echo validation_errors();
    ?>
    <!-- Your Page Content Here -->
    <div class="row">
      <div class="col-md-12">

       <!-- DEBARR STUDENTS -->
       <div class="box">
        <!-- form start -->
        <form role="form" action="<?php echo base_url()?>admin/admin_main/debarr_roll_number" method="post">
          <div class="box-body" style="margin-top: 15px">

            <div class="form-group col-md-12">
              <label>Roll Number</label>
              <input type="text" class="form-control" name="debarr_roll_no" placeholder="Enter Roll Number ( Eg: 2k14/el/90, 2k14/ps/62, 2k14/ce/12) Note:Separate Using Comma(,) 10 max" style="height:40px;margin-bottom: -20px">
            </div>

            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />

            <div class="form-group col-md-6 ">
              <br>
              <button type="submit" class="debar_button">DEBAR</button>
            </div>
          </div><!-- /.box-body -->
        </form>
      </div><!--box-->






      <!--SHOW LIST OF DEBARRED STUDENTS -->
      <div class="box"> <!--box-->
        <div class="box-header with-border" style="text-align:center;">
          <h3 class="box-title">Debarred Students</h3>
        </div><!-- /.box-header -->

        <?php 
        if(isset($debarred_students) && !empty($debarred_students)):
        ?>

        <form role="form" action="<?php echo base_url()?>admin/admin_main/undebarr_student" method="post">

        <div class="box-body table-responsive no-padding">
            <table class="table table-hover" id="students_search">
             <tr>
              <th> CHECKBOX</th>
              <th> ROLL NUMBER</th>
              <th> FULL NAME</th>
              <th> MOBILE</th>
            </tr>

            <?php 
            foreach($debarred_students as $row): 
            ?>
            <tr>
              <td><input type="checkbox" name="undebarr_roll_no[]" value="<?php echo $row['username_rollnumber'];?>" />             
              </td>

              <td><?php echo $row['username_rollnumber'];?></td>
              
              <td><?php echo $row['firstname'].' '.$row['lastname'];?></td>

              <td><?php echo $row['mobile'];?></td>                                       
            </tr>

            <?php endforeach; ?>

        </table>
      </div><!-- /.box-body -->
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />  

    <div class="form-group col-md-3">
      <br><br>
      <button type="submit" class="remove_button" style="width:50%;position:relative;">Remove</button>
    </div>
    <br>
    </form>

    <?php 
    endif;
    ?>

  </div><!-- /.box -->
  <!--END OF DEBARRED STUDENTS-->

</div>
</div>

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
