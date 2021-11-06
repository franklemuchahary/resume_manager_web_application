<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Company Info
      
    </h1>
    
  </section>

  <?php 
  if(isset($updated)){
    echo '<script> alert("'.str_replace(array("\r","\n"), '\n', $updated).'"); </script>';
  }
  $message = validation_errors();
  if((isset($message))&&($message!='')){
    echo '<script> alert("'.str_replace(array("\r","\n"), '\n', $message).'"); </script>';
  }
  ?>

  {recruiter_info}
  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-md-12">
      <div class="box">


        <!-- form start -->
        <form role="form" action="<?php echo base_url();?>recruiter/update_company_info" method="post">
          <div class="box-body" style="margin-top:15px">


           <div class="form-group col-md-6">
            <label> Company Name </label>
            <input type="text" class="form-control" value="{company_name}" name="company_name" placeholder="Enter Company Name ">
          </div>
          <div class="form-group col-md-6">
            <label> CTC </label>
            <input type="text" class="form-control" placeholder="Enter CTC " name="ctc" value="{ctc}">
          </div>
          <div class="form-group col-md-12">
            <label> About Company </label>
            <textarea type="text" rows="3" class="form-control" placeholder="Enter About Company" name="about_company">{about_company}</textarea>
          </div>

          <div class="form-group col-md-12">
           <label> Students Eligible </label>
         </div>                   

         <div class="form-group col-md-2">                                        
          <div class="squaredThree">
            <?php
            foreach($recruiter_info as $row){
              $btech = $row['btech'];
              $btech_branches = $row['btech_branches'];
              $mtech = $row['mtech'];
              $mtech_branches = $row['mtech_branches'];
              $mba = $row['mba']; 
            }
            ?>
            <input type="checkbox" id="btech" name="btech"  value="BTech" <?php if(isset($btech)){echo 'checked';}?> />
            <label for="btech"></label>
          </div>
          <label for="btech" class="le">B.Tech</label>
        </div>



        <div class="form-group col-md-2">
         <input type="number" class="form-control" placeholder="Cut-Off" name="btech_cutoff" value="{btech_cutoff}">
       </div>

       <div class="form-group col-md-8">
         <select class="form-control select2" name="btech_branches[]" multiple="multiple" data-placeholder="Choose Eligible Branches" style="width: 100%;">
          <option <?php if(isset($btech_branches)){echo "selected";}?> >{btech_branches}</option>
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

      <div class="form-group col-md-2">                                        
        <div class="squaredThree">
          <input type="checkbox" id="mtech" name="mtech" value="MTech" <?php if(isset($mtech)){echo 'checked';} ?> />
          <label for="mtech"></label>
        </div>                        
        <label for="mtech" class="le">M.Tech</label>
      </div>


      <div class="form-group col-md-2">
       <input type="number" class="form-control" placeholder="Cut-Off" name="mtech_cutoff" value="{mtech_cutoff}">
     </div>

     <div class="form-group col-md-8">
       <select class="form-control select2" multiple="multiple" name="mtech_branches[]" data-placeholder="Choose Eligible Branches" style="width: 100%;">
        <option <?php if(isset($mtech_branches)){echo "selected";}?>>{mtech_branches}</option>
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



    <div class="form-group col-md-2">                                        
      <div class="squaredThree">
        <input type="checkbox" id="mba" name="mba" value="MBA" <?php if(isset($mba)){echo 'checked';}?> />
        <label for="mba"></label>
      </div>                        
      <label for="mba" class="le">MBA</label>
    </div>



    <div class="form-group col-md-2">
     <input type="number" class="form-control" placeholder="Cut-Off " name="mba_cutoff" value="{mba_cutoff}">
   </div>

   <div class="form-group col-md-12">
    <label> Job Description  </label>
    <textarea type="text" rows="3" class="form-control" placeholder="Enter Job Description" name="job_description">{job_description}</textarea>
  </div>                   

  <div class="form-group col-md-6">
    <label> Location </label>
    <input type="text" class="form-control" placeholder="Enter Location of Job" name="location" value="{location}">
  </div>

  <div class="form-group col-md-6">
    <label> Co-Ordinator Responsible </label>
    <input type="text"  class="form-control" placeholder="Enter Co-Ordinator Responsible" name="coordinator" value="{coordinator}">
  </div>
  
  <div class="form-group col-md-6">
    <label> Date of Visit </label>
    <input type="date" class="form-control" placeholder="dd-mm-yy" name="date_of_visit" value="{date_of_visit}">
  </div>
  
  <div class="form-group col-md-6">
    <label> Application Deadline </label>
    <input type="datetime" id="date_foo" class="form-control" placeholder="dd-mm-yyyy" name="application_deadline" value="{application_deadline}">
  </div>

  <div class="form-group col-md-12">
    <label> Note </label>
    <textarea type="text" rows="3" class="form-control" placeholder="Enter additional instructions " name="note">{note}</textarea>
  </div>

  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />

  <div class="form-group col-md-12 text-center">
    <button type="submit" class="update_button">Update</button>
  </div>


</div><!-- /.box-body -->
</form>

</div><!-- /.box -->
</div>
</div>




</section><!-- /.content -->
{/recruiter_info}
</div><!-- /.content-wrapper -->

