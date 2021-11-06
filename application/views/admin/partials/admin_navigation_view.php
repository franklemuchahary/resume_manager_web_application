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
        <img src="<?php echo base_url();?>img/recruiter.png" class="img-circle" alt="User Image">
      </div>

    </div>

    <div class="stub">
      <p>
        <?php 
        $session_data =  $this->session->userdata('admin_logged_in');
        echo $session_data['username'];
        ?>
      </p>

    </div>



    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">


      <!-- TREE VIEW FOR PLACEMENTS ADMIN CONTROL-->
      <li class="treeview <?php if($this->uri->segment(3)==""||$this->uri->segment(3)=="index"||$this->uri->segment(3)=="admin_add_notif"||$this->uri->segment(3)=="add_recruiter"||$this->uri->segment(3)=="debarr_student"||$this->uri->segment(3)=="admin_search_recruiter"||$this->uri->segment(3)=="admin_search_students"||$this->uri->segment(3)=="admin_get_all_applications"){echo "active";}?>">
        <a href="#">
          <i class="fa fa-pencil"></i> <span>Placements Admin</span>
          <i class="fa fa-angle-down pull-right"></i>
        </a>
        <ul class="treeview-menu">

          <li class="<?php if($this->uri->segment(3)==""||$this->uri->segment(3)=="index"){echo "active";}?>"><a href="<?php echo base_url();?>admin/admin_main"><i class="fa fa-ban"></i>  <span>Remove Notifications</span></a></li>

          <li class="<?php if($this->uri->segment(3)=="admin_add_notif"){echo "active";}?>"><a href="<?php echo base_url();?>admin/admin_main/admin_add_notif"><i class="fa fa-bell"></i>  <span>Add Notifications</span></a></li>

          <li class="<?php if($this->uri->segment(3)=="add_recruiter"){echo "active";}?>"><a href="<?php echo base_url();?>admin/admin_main/add_recruiter"><i class="fa fa-plus"></i>  <span>Add Recruiter/Student</span></a></li>

          <li class="<?php if($this->uri->segment(3)=="debarr_student"){echo "active";}?>"> <a href="<?php echo base_url();?>admin/admin_main/debarr_student"><i class="fa fa-ban"></i>  <span>Debar Student</span></a></li>

          <li class="<?php if($this->uri->segment(3)=="admin_search_recruiter"){echo "active";}?>"> <a href="<?php echo base_url();?>admin/admin_main/admin_search_recruiter"><i class="fa fa-search"></i>  <span>Search Recruiters</span></a></li>

          <li class="<?php if($this->uri->segment(3)=="admin_search_students"){echo "active";}?>"> <a href="<?php echo base_url();?>admin/admin_main/admin_search_students"><i class="fa fa-search"></i>  <span>Search Students</span></a></li>

          <li class="<?php if($this->uri->segment(3)=="admin_get_all_applications"){echo "active";}?>"> <a href="<?php echo base_url();?>admin/admin_main/admin_get_all_applications"><i class="fa fa-file-o"></i>  <span>All Applications</span></a></li>
        
        </ul>
      </li>

      <!-- TREE VIEW FOR INTERN ADMIN CONTROL-->
      
      

      

      
      
      
      
      
      <!--SIGNOUT-->
      <li><a href="<?php echo base_url()?>logout/admin_logout"><i class="fa fa-power-off"></i> <span>Sign Out</span></a></li>

    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->

</aside>
