<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 style="margin-bottom:10px;">
     My Profile

   </h1>

 </section>

 <!-- Main content -->
 <section class="content">

   <?php 
   if(isset($profile_updated)){
    echo '<script> alert("'.str_replace(array("\r","\n"), '\n', $profile_updated).'"); </script>';
  }
  $message = validation_errors();
  if((isset($message))&&($message!='')){
    echo '<script> alert("'.str_replace(array("\r","\n"), '\n', $message).'"); </script>';
  }
  ?>

  <!-- Your Page Content Here -->

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Academic Info</h3>
        </div><!-- /.box-header -->

        {academic_info}
        <!-- form start -->
        <form role="form" action="<?php echo base_url('intern/intern_student/change_academic_info/');?>" method="post">
          <div class="box-body">
            <div class="form-standard text-center">
              <h4>Curriculum Vitae</h4>
            </div>
            <hr class="stan">
            <div class="form-group col-md-12" style="margin-bottom:40px">
              <label>Google Drive Link</label>
              <input type="text" class="form-control" name="resume_link" value="{resume_link}" placeholder="Enter Link">
            </div>
            <div class="form-standard text-center">
              <h4>Xth Standard</h4>
            </div>
            <hr class="stan">
            <div class="form-group col-md-6">
              <label>School Name</label>
              <input type="text" class="form-control" name="schoolname10" value="{schoolname10}" placeholder="Enter School Name">
            </div>
            <div class="form-group col-md-6">
              <label>Board</label>
              <input type="text" class="form-control" name="board10" value="{board10}" placeholder="eg CBSE , ISCE etc">
            </div>                   
            <div class="form-group col-md-6">
              <label>Year</label>
              <select class="form-control select2" name="passingyear10" data-placeholder="Select Year of Passing"  style="width: 100%;">
                <option>{passingyear10}</option>
                <option>2011</option>
                <option>2010</option>
                <option>2009</option>
                <option>2008</option>
                <option>2007</option>
                <option>2006</option>
                <option>2005</option>
                <option>2004</option>
                <option>2003</option>
                <option>2002</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Aggregate</label>
              <input type="text" class="form-control" name="aggregate10" value="{aggregate10}" placeholder="Enter Aggregate">
            </div>
            <div class="form-group col-md-12" style="margin-bottom:40px">
              <label> Subjects</label>
              <input type="text" class="form-control" name="subjects10" value="{subjects10}" placeholder="Enter Subjects Passed">
            </div>

            <div class="form-standard text-center">
              <h4>XIIth Standard</h4>
            </div>
            <hr class="stan">

            <div class="form-group col-md-6">
              <label>School Name</label>
              <input type="text" class="form-control" name="schoolname12" value="{schoolname12}" placeholder="Enter School Name">
            </div>
            <div class="form-group col-md-6">
              <label>Board</label>
              <input type="text" class="form-control" name="board12" value="{board12}" placeholder="eg CBSE , ISCE etc">
            </div>                   
            <div class="form-group col-md-6">
              <label>Year</label>
              <select class="form-control select2" data-placeholder="Select Year of Passing"  name="passingyear12"  style="width: 100%;">
                <option>{passingyear12}</option>
                <option>2013</option>
                <option>2012</option>
                <option>2011</option>
                <option>2010</option>
                <option>2009</option>
                <option>2008</option>
                <option>2007</option>
                <option>2006</option>
                <option>2005</option>
                <option>2004</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label> Aggregate</label>
              <input type="text" class="form-control" name="aggregate12" value="{aggregate12}" placeholder="Enter Aggregate">
            </div>
            <div class="form-group col-md-12"  style="margin-bottom:40px">
              <label> Subjects</label>
              <input type="text" class="form-control" name="subjects12" value="{subjects12}" placeholder="Enter Subjects Passed">
            </div>

            <div class="form-standard text-center">
              <h4>Entrance Exam</h4>
            </div>
            <hr class="stan">

            <div class="form-group col-md-4">
              <label>Entrance</label>
              <input type="text" class="form-control" name="entrance" value="{entrance}" placeholder="Enter Entrance Name">
            </div>
            <div class="form-group col-md-4">
              <label>Category</label>
              <select class="form-control select2" data-placeholder="Select Category" name="entrance_category" style="width: 100%;">
                <option>{entrance_category}</option>
                <option>General</option>
                <option>SC</option>
                <option>ST</option>
                <option>OBC</option>
                <option>PH</option>
                <option>Other</option>
              </select>
            </div>                   
            <div class="form-group col-md-4" style="margin-bottom:40px">
              <label>Rank</label>
              <input type="number" class="form-control" name="rank" value="{rank}" placeholder="Enter Rank">
            </div>
                           

            <div class="form-standard text-center">
              <h4>Score Sheet</h4>
            </div>
            <hr class="stan">
            <h5 class="text-center sub-stan">MTech and MBA students need to fill details of their BTech qualifications</h5>

            <div class="form-group col-md-6">
              <label>Branch</label>
              <select class="form-control select2" data-placeholder="Select Year of Graduation"  style="width: 100%;" name="branchgrad" placeholder="Enter Branch">
                <option>{branchgrad}</option>
                <option>Computer Engineering</option>
                <option>Software Engineering</option> 
                <option>Information Technology</option>
                <option>Electrical and Electronics Engineering</option>
                <option>Electrical Engineering</option>
                <option>Electronics and Communication Engineering</option>            
                <option>Civil Engineering</option>
                <option>Mathematics and Computing Engineering</option>
                <option>Mechanical Engineering</option>
                <option>Mechanical and Automobile Engineering</option>
                <option>Polymer Science and Chemical Technology</option>
                <option>Production and Industrial Engineering</option>
                <option>Engineering Physics</option>
                <option>Environmental Engineering</option>                      
                <option>Biotechnology Engineering</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Year of Graduation</label>
              <select class="form-control select2" name="yearofgradgrad" data-placeholder="Select Year of Graduation"  style="width: 100%;">
                <option>{yearofgradgrad}</option>
                <option>2017</option>
                <option>2018</option>                      
              </select>
            </div>                   
            <div class="form-group col-md-3">
              <label>Semester 1</label>
              <input type="text" class="form-control" name="sem1grad" value="{sem1grad}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-3">
              <label>Semester 2</label>
              <input type="text" class="form-control" name="sem2grad" value="{sem2grad}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-3">
              <label>Semester 3</label>
              <input type="text" class="form-control" name="sem3grad" value="{sem3grad}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-3">
              <label>Semester 4</label>
              <input type="text" class="form-control" name="sem4grad" value="{sem4grad}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-3">
              <label>Semester 5</label>
              <input type="text" class="form-control" name="sem5grad" value="{sem5grad}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-3">
              <label>Semester 6</label>
              <input type="text" class="form-control" name="sem6grad" value="{sem6grad}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-3">
              <label>Semester 7</label>
              <input type="text" class="form-control" name="sem7grad" value="{sem7grad}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-3">
              <label>Semester 8</label>
              <input type="text" class="form-control" name="sem8grad" value="{sem8grad}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-6">
              <label>Aggregate</label>
              <input type="text" class="form-control" name="aggregategrad" value="{aggregategrad}" placeholder="Enter Aggregate">
            </div>
            <div class="form-group col-md-6" style="margin-bottom:40px">
              <label>University (For M-Tech & MBA only) </label>
              <input type="text" class="form-control" name="universitygrad" value="{universitygrad}" placeholder="Enter University">
            </div>
            <div class="form-standard text-center">
              <h4>Post-Graduation Details</h4>
            </div>
            <hr class="stan">

            <div class="form-group col-md-12">
              <label>Branch</label>
              <select class="form-control select2" data-placeholder="Select Year of Graduation"  style="width: 100%;" name="branchpg" placeholder="Enter Branch">
                <option>{branchpg}</option>
                <option>Industrial Bio Technology </option>
                <option>Computer Engineering</option>
                <option>Software Engineering</option>
                <option>Information System</option>
                <option>Geotechnical Engineering</option>
                <option>Hydraulics & Water Resources Engineering</option>
                <option>Structural Engineering</option>
                <option>Microwave and Optical Communication</option>
                <option>Signal Processing & Digital Design</option>
                <option>VLSI Design and Embedded System</option>
                <option>Control and Instrumentation</option>
                <option>Power System</option>
                <option>Environmental Engineering</option>
                <option>Computational Design</option>
                <option>Production Engineering</option>
                <option>Renewable Energy Technology</option>
                <option>Thermal Engineering</option>
                <option>Bio Medical Engineering</option>
                <option>Bioinformatics</option>
                <option>Polymer Technology</option>  
                <option>Nano Science and Technology</option>
                <option>Nuclear Science & Engineering</option>                
              </select>
            </div>                   
            <div class="form-group col-md-3">
              <label>Semester 1</label>
              <input type="text" class="form-control" name="sem1pg" value="{sem1pg}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-3">
              <label>Semester 2</label>
              <input type="text" class="form-control" name="sem2pg" value="{sem2pg}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-3">
              <label>Semester 3</label>
              <input type="text" class="form-control" name="sem3pg" value="{sem3pg}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-3">
              <label>Semester 4</label>
              <input type="text" class="form-control" name="sem4pg" value="{sem4pg}" placeholder="Enter Marks">
            </div>
            <div class="form-group col-md-6">
              <label>Year</label>
              <select class="form-control select2" name="yearofgradpg" data-placeholder="Select Year of Graduation"  style="width: 100%;">
                <option>{yearofgradpg}</option>
                <option>2017</option>
                <option>2018</option>                      
              </select>
            </div>
            <div class="form-group col-md-6" style="margin-bottom:40px">
              <label> Aggregate</label>
              <input type="text" class="form-control" name="aggregatepg" value="{aggregatepg}" placeholder="Enter Aggregate">
            </div>
            <div class="form-standard text-center">
              <h4>Projects and Training</h4>
            </div>
            <hr class="stan">
            <div class="form-group col-md-12" >
              <label> Project </label>
              <textarea type="text" rows="3" class="form-control" name="project" placeholder="Enter Projects">{project}</textarea>
            </div>
            <div class="form-group col-md-12" style="margin-bottom:40px">
              <label> Training</label>
              <textarea type="text" rows="3" class="form-control" name="training" placeholder="Enter Trainings">{training}</textarea>
            </div>

            <div class="form-standard text-center">
              <h4>Gap in Studies</h4>
            </div>
            <hr class="stan">
            <div class="form-group col-md-12" style="margin-bottom:40px">
              <label> Reason</label>
              <textarea type="text" rows="4" class="form-control" name="gapreason" placeholder="Enter Reason if applicable">{gapreason}</textarea>
            </div>
            
            <div class="form-standard text-center">
              <h4>Backlog</h4>
            </div>
            <hr class="stan">
            
            <div class="form-group col-md-12">
              <label>Number of Backlogs</label>
              <input type="text" class="form-control" name="number_of_backlogs"  placeholder="Number of Backlogs(0 if None)" value="{number_of_backlogs}">            
            </div>

            <div class="form-group col-md-12">
              <label> Reason</label>
              <textarea type="text" rows="4" class="form-control" name="backlogreason"  placeholder="Enter Reason if applicable">{backlogreason}</textarea>
            </div>

            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />

            <div class="form-group col-md-12 text-center">
              <button type="submit" class="update_button">Update</button>
            </div>


          </div><!-- /.box-body -->
        </form>
        {/academic_info}

      </div><!-- /.box -->
    </div>
  </div>



</section><!-- /.content -->


</section><!-- /.content -->
</div><!-- /.content-wrapper -->
