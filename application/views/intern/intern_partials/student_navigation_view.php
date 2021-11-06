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
        <img src="<?php echo base_url();?>/uploads/intern_student_photos/<?php foreach($info as $row){ echo $row['photo'];}?>" class="img-circle" alt="User Image">
        </div>
        
      </div>

      <div class="stub">
        <p>
          <?php 
          foreach($info as $row){
            echo $row['firstname']." ".$row['lastname'];
          }
          ?>
        </p>
        <!-- Status -->
        <i class="fa fa-user"></i> 
        <?php
        foreach($info as $row){
          echo $row['username_rollnumber'];
        }
        ?>
      </div>

      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">

        <li class="<?php if($this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url('intern/intern_student');?>"><i class="fa fa-bell"></i> <span>Notifications</span></a></li>
        
        <li class="<?php if($this->uri->segment(3)=="job_openings" || $this->uri->segment(3)=="search_job_openings" ){echo "active";}?>"><a href="<?php echo base_url('intern/intern_student/job_openings');?>"><i class="fa fa-money"></i> <span>Job Openings</span></a></li>
        
        <li class="<?php if($this->uri->segment(3)=="myapplications"){echo "active";}?>"><a href="<?php echo base_url('intern/intern_student/myapplications');?>"><i class="fa fa-file"></i> <span>My Applications</span></a></li>
        
        <li class="treeview  <?php if($this->uri->segment(3)=="personal_info"||$this->uri->segment(3)=="academic_info"||$this->uri->segment(3)=="extra_info"){echo "active";}?>">
          <a href="#">
            <i class="fa fa-pencil"></i> <span>My Profile</span>
            <i class="fa fa-angle-down pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('intern/intern_student/personal_info');?>"><i class="fa fa-ellipsis-v "></i> Personal</a></li>
            <li><a href="<?php echo base_url('intern/intern_student/academic_info');?>"><i class="fa fa-ellipsis-v "></i> Academic</a></li>
            <li><a href="<?php echo base_url('intern/intern_student/extra_info');?>"><i class="fa fa-ellipsis-v "></i> Extra Activities</a></li>
          </ul>
        </li>
        
        <li class="<?php if($this->uri->segment(3)=="myaccount"){echo "active";}?>"><a href="<?php echo base_url('intern/intern_student/myaccount');?>/"><i class="fa fa-cogs"></i> <span>My Account</span></a></li>
        
        <li><a href="<?php echo base_url('logout/intern_student_logout/');?>"><i class="fa fa-power-off"></i> <span>Sign Out</span></a></li>
        
      </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->

  </aside>