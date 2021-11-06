<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     	All Applications Placements           
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
            <div class="box-tools">
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <?php echo $this->pagination->create_links(); ?>
                </ul>
              </div>
              <div class="input-group yo" >
                <input type="text" name="table_search" data-toggle="tooltip" data-placement="left" title="Eg:2k14/ps/001,electrical,facebook..." onkeyup="admin_all_applications_search(this.value)" class="form-control input-sm pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover" id="applications_search">
             <tr>
              <th> DATE & TIME </th>
              <th> NAME</th>
              <th> COURSE</th>
              <th> BRANCH</th>
              <th> ROLL NUMBER</th>
              <th> AGGREGATE (% or CGPA)</th>
              <th> COMPANY APPLIED</th>
			  <th> RESUME LINK </th>
			  <th> APPLICATION STATUS </th>                                    
            </tr>

            <?php foreach($applications_info as $row): ?>

             <tr>
              <td><?php echo date('d-m-y h:i a',strtotime($row['date_time']));?></td>

              <td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
              
              <td>
                <?php 
                switch($row['pursuing'])
                {
                  case 'btech': 
                  echo 'B.Tech';
                  break;
                  case 'mtech': 
                  echo 'M.Tech';
                  break;
                  case 'mba': 
                  echo 'MBA';
                  break;
                  default:
                  echo 'Unavailable';
                }
                ?>
              </td>

              <td>
                <?php 
                switch($row['pursuing'])
                {
                  case 'btech': 
                  echo $row['branch_ug'];
                  break;
                  case 'mtech': 
                  echo $row['branch_pg'];
                  break;
                  case 'mba': 
                  echo $row['pursuing'];
                  break;
                  default:
                  echo 'Unavailable';
                }
                ?>
              </td>

              <td><?php echo $row['student_rollnumber']; ?></td>
              
              <td>
                <?php
                switch($row['pursuing'])
                {
                  case 'btech': 
                  echo $row['aggregate_ug'];
                  break;
                  case 'mtech': 
                  echo $row['aggregate_pg'];
                  break;
                  case 'mba': 
                  echo $row['aggregate_pg'];
                  break;
                  default:
                  echo 'Unavailable';
                }
                ?>
              </td>       

              <td>
                <?php echo $row['company_name'];?>
              </td> 

              <td>
                <?php echo '<a href="'.$row['resume_link'].'" target="_blank"><i class="fa fa-file-text"></i></a>';?>
              </td>  

              <td>
                <?php echo $row['application_status'];?>
              </td>                                        
            </tr>

          <?php endforeach; ?>

        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->

  </div>
</div>


</section><!-- /.content -->
</div><!-- /.content-wrapper -->
