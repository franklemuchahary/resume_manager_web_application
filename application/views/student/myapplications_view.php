<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      My Applications

    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
            
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
             <tr>
              <th>COMPANY NAME</th>
              <th>APPLICATION STATUS</th>
              <th>TIME OF SUBMISSION</th>
              <th class="dov">DATE OF VISIT</th>
            </tr>

            <?php 
            foreach($myapplications as $row):
            ?>
            <tr>                    
              <td><a href="<?php echo base_url()."student/recruiter_profile/".$row['recruiter_username'];?>"><?php echo $row['company_name']; ?></a></td>
              <td><?php echo $row['application_status']; ?></td>
              <td><?php echo 'On '.date("d-m-y", strtotime($row['date_time'])).' at '.date("h:i",strtotime($row['date_time'])); ?></td>                      
              <td><?php echo date("d-m-Y",strtotime($row['date_of_visit'])); ?></td>                                      
            </tr>
            <?php
            endforeach;
            ?>

          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div>
  </div>



</section><!-- /.content -->
</div><!-- /.content-wrapper -->

