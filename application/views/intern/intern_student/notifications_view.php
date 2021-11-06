 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <?php 
    if(isset($debarred) && !empty($debarred)):
      echo '<h3 style="color:red;text-align:center;">'.$debarred.'</h3>';
    endif;
    ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Notifications
      
    </h1>
 
    <pre>
    <?php print_r($this->session->all_userdata());?>
    </pre>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <!-- The time line -->
        <ul class="timeline">
          <!-- timeline time label -->
          <?php
          foreach($notifications as $row):
            ?>
          <li class="time-label">
            <span class="bg-red">
              <?php 
              echo date("l M j", strtotime($row['date_time']));
              ?>
            </span>
          </li>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <li>
            <i class="fa fa-envelope bg-navy"></i>
            <div class="timeline-item">

              <span class="time"><i class="fa fa-clock-o"></i>&nbsp<?php echo date("h:ia", strtotime($row['date_time']));?></span>
              <h4 class="timeline-header"><a href="<?php echo base_url()."intern/intern_student/recruiter_profile/".$row['recruiter_username'];?>"><?php echo $row['company_name'];?></a></h4>
              <div class="timeline-body">
                
                <?php

                $pattern = '/(<img(?!src).*?)(src=")([^"]*)(")([^>]*)(>)/';

                $string = $row['notification'];

                $split = preg_split($pattern, $string, -1, PREG_SPLIT_NO_EMPTY);

                $x = preg_match($pattern, $string, $matches);

                if(isset($x) && $x == true){
                  echo $split[0].'<a class="image-popup-vertical-fit" href="'.$matches[3].'">'.$matches[0].'</a>'.$split[1];        
                }
                else{
                  if(isset($split[0])):
                    echo $split[0];
                  endif;
                }

                ?>
              </div>             
              <h3 class="timeline-header up">
              <a>
              Posted by : 
              
              <?php 
              if(isset($row['placement_coordinator'])):
                echo $row['placement_coordinator'];
              else:
                echo "Admin";
              endif;
              ?>
              
              </a>
              </h3>
            </div>
          </li>
          <?php
          endforeach;
          ?>
          <!-- END timeline item -->          
        </ul>

        <ul class="pagination pagination-sm pull-right" style="padding-right: 25px">
          <?php echo $this->pagination->create_links(); ?>
        </ul>
      </div><!-- /.col -->
    </div><!-- /.row -->

    
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->



