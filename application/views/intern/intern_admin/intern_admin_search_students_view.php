<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Search Interns            
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
                <input type="text" name="table_search" data-toggle="tooltip" data-placement="left" title="Eg:2k14/ps/001,electrical,richard..." onkeyup="admin_student_search(this.value)" class="form-control input-sm pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover" id="students_search">
             <tr>
              <th> NAME</th>
              <th> COURSE</th>
              <th> BRANCH</th>
              <th> ROLL NUMBER</th>
              <th> AGGREGATE (% or CGPA)</th>
              <th> MOBILE </th>                      
            </tr>

            <?php foreach($student_info as $row): ?>

             <tr>                    
              <td><?php echo $row['firstname'].' '.$row['lastname'];?></td>
              
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
                  echo $row['branchgrad'];
                  break;
                  case 'mtech': 
                  echo $row['branchpg'];
                  break;
                  case 'mba': 
                  echo $row['pursuing'];
                  break;
                  default:
                  echo 'Unavailable';
                }
                ?>
              </td>

              <td><?php echo $row['username_rollnumber']; ?></td>
              
              <td>
                <?php
                switch($row['pursuing'])
                {
                  case 'btech': 
                  echo $row['aggregategrad'];
                  break;
                  case 'mtech': 
                  echo $row['aggregatepg'];
                  break;
                  case 'mba': 
                  echo $row['aggregatepg'];
                  break;
                  default:
                  echo 'Unavailable';
                }
                ?>
              </td>       

              <td>
                <?php echo $row['mobile'];?>
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

