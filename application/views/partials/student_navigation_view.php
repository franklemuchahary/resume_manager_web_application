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
        <img src="<?php echo base_url();?>/uploads/student_photos/<?php foreach($info as $row){ echo $row['photo'];}?>" class="img-circle" alt="User Image">
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

        <li class="<?php if($this->uri->segment(2)==""){echo "active";}?>"><a href="<?php echo base_url();?>student"><i class="fa fa-bell"></i> <span>Notifications</span></a></li>
        <li class="<?php if($this->uri->segment(2)=="job_openings" || $this->uri->segment(2)=="search_job_openings" ){echo "active";}?>"><a href="<?php echo base_url();?>student/job_openings"><i class="fa fa-money"></i> <span>Job Openings</span></a></li>
        <li class="<?php if($this->uri->segment(2)=="myapplications"){echo "active";}?>"><a href="<?php echo base_url();?>student/myapplications"><i class="fa fa-file"></i> <span>My Applications</span></a></li>
        <li class="treeview  <?php if($this->uri->segment(2)=="personal_info"||$this->uri->segment(2)=="academic_info"||$this->uri->segment(2)=="extra_info"){echo "active";}?>">
          <a href="#">
            <i class="fa fa-pencil"></i> <span>My Profile</span>
            <i class="fa fa-angle-down pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>student/personal_info"><i class="fa fa-ellipsis-v "></i> Personal</a></li>
            <li><a href="<?php echo base_url();?>student/academic_info"><i class="fa fa-ellipsis-v "></i> Academic</a></li>
            <li><a href="<?php echo base_url();?>student/extra_info"><i class="fa fa-ellipsis-v "></i> Extra Activities</a></li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="myaccount"){echo "active";}?>"><a href="<?php echo base_url();?>/student/myaccount"><i class="fa fa-cogs"></i> <span>My Account</span></a></li>
        <li><a href="<?php echo base_url();?>logout"><i class="fa fa-power-off"></i> <span>Sign Out</span></a></li>
        
      </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->

  </aside>