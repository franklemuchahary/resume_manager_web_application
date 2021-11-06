  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Job Openings
        
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
                  <input type="text" name="table_search" data-toggle="tooltip" data-placement="left" title="Eg:btech,facebook,computer.." class="form-control input-sm pull-right" placeholder="Search" onkeyup="job_openings_search(this.value)">
                  <div class="input-group-btn">
                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding" >
              <table class="table table-hover" id="jobs_search">
               <tr>
                <th>COMPANY NAME</th>
                <th class="branches">BRANCHES</th>
                <th >APPLICATION DEADLINE</th>
                <th class="ticks">B.TECH</th>
                <th class="ticks">M.TECH</th>
                <th class="ticks">MBA</th>
                <th class="dov">DATE OF VISIT</th>
              </tr>
              
              <?php 
              foreach($recruiter_info as $row):
                $btech = $row['btech'];
                $mtech = $row['mtech'];
                $mba = $row['mba'];
              ?>
              
              <tr onclick="void window.open('<?php echo base_url()."student/recruiter_profile/".$row['recruiter_username'];?>')" >                    
                <td><a href="#"><?php echo $row['company_name']; ?></a></td>
                <td><?php echo $row['btech_branches'].",".$row['mtech_branches'];?></td>
                <td><?php echo $row['application_deadline'];?></td>
                <td><i class=<?php if(isset($btech)){echo '"fa fa-check"';}else{echo '"fa fa-close"';} ?>></i></td>
                <td><i class=<?php if(isset($mtech)){echo '"fa fa-check"';}else{echo '"fa fa-close"';} ?>></i></td>
                <td><i class=<?php if(isset($mba)){echo '"fa fa-check"';}else{echo '"fa fa-close"';} ?>></i></td>
                <td><?php echo $row['date_of_visit'];?></td>                                      
              </tr>
              
              <?php endforeach;?>
              
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div>
    </div>
    

    
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


