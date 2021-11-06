 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>


 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
      <img src=" <?php echo base_url();?>img/recruiter.png" class="img-circle" alt="User Image">
      </div>

    </div>

    <div class="stub">
      <p>
      <?php 
      foreach($recruiter_info as $row){
        echo   $row['company_name'];
      }
      ?>
      </p>

    </div>



    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">

      <li class="<?php if($this->uri->segment(2)==""){echo "active";}?>"><a href="<?php echo base_url();?>recruiter"><i class="fa fa-bell"></i> <span>Notifications</span></a></li>

      <li class="<?php if($this->uri->segment(2)=="push_notifications"){echo "active";}?>"><a href="<?php echo base_url();?>recruiter/push_notifications"><i class="fa fa-android"></i> <span>Push Notifications</span></a></li>
      
      <li class="<?php if($this->uri->segment(2)=="company_info_view"){echo "active";}?>"><a href="<?php echo base_url();?>recruiter/company_info_view"><i class="fa fa-info-circle"></i> <span>Company Info</span></a></li>          
      
      <li class="<?php if($this->uri->segment(2)=="received_applications"){echo "active";}?>"><a href="<?php echo base_url();?>recruiter/received_applications"><i class="fa fa-file"></i> <span>Applications</span></a></li>
      
      <li class="<?php if($this->uri->segment(2)=="final_selected"){echo "active";}?>"><a href="<?php echo base_url();?>recruiter/final_selected"><i class="fa fa-graduation-cap"></i> <span>Final Selection</span></a></li>             
      
      <li class="<?php if($this->uri->segment(2)=="recruiter_myaccount"){echo "active";}?>"><a href="<?php echo base_url();?>recruiter/recruiter_myaccount"><i class="fa fa-cogs"></i> <span>My Account</span></a></li>
      
      <li><a href="<?php echo base_url();?>/logout/recruiter_logout"><i class="fa fa-power-off"></i> <span>Sign Out</span></a></li>

    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->

</aside>