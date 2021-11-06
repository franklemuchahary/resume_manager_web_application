<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>      

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Final Selection
      
    </h1>

    
  </section>
  <section class="buttons">
  <?php
    if(!empty($final_selections)){
      echo '<div class="export_button " style="padding: 6px 15px;"><a href="'.base_url().'intern/intern_excel_exports/intern_excel_final_selected">Export</a></div>';
    }
  ?>                               
  </section>
  <!-- Main content -->
  <section class="content">
   <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          
          <div class="box-tools">
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php echo $this->pagination->create_links(); ?>
              </ul>
            </div>

            <!--<div class="input-group yo" >
              <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>-->

          </div>

        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
           <tr>
            <th>ROLL NUMBER</th>
            <th>NAME</th>                      
            <th>VIEW RESUME</th>
            
          </tr>

          <?php
            foreach($final_selections as $row):
          ?>


          <tr>               
            <td><?php echo $row['student_rollnumber'];?></td>
            <td><?php echo $row['first_name'].' '.$row['last_name'];?></td>                      
            <td><a target="_blank" href="<?php echo $row['resume_link']?>"><i class="fa fa-file-text"></i></a></td>                                                      
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