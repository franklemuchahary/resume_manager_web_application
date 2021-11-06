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

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Info</h3>
            </div><!-- /.box-header -->
            <?php 
            if(isset($profile_updated)){
              echo '<script> alert("'.str_replace(array("\r","\n"), '\n', strip_tags($profile_updated)).'"); </script>';
            }
            if(isset($error_updating)){
              echo '<script> alert("'.str_replace(array("\r","\n"), '\n', strip_tags($error_updating)).'"); </script>';
            }
            $message = validation_errors();
            if((isset($message))&&($message!='')){
              echo '<script> alert("'.str_replace(array("\r","\n"), '\n', strip_tags($message)).'"); </script>';
            }
            ?>

            {personal_info}
            <!-- form start -->
            <form role="form" action="<?php echo base_url('intern/intern_student/change_personal_info/');?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group col-md-6">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="firstname" value="{firstname}" placeholder="Enter First Name">
                </div>
                <div class="form-group col-md-6">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="lastname" value="{lastname}" placeholder="Enter Last Name">
                </div>                   
                <div class="form-group col-md-6">
                  <label>Guardian's Name</label>
                  <input type="text" class="form-control" name="guardianname" value="{guardianname}" placeholder="Enter Guardian's Name">
                </div>
                <div class="form-group col-md-6">
                  <label >Email address</label>
                  <input type="email" class="form-control" name="email" value="{email}" placeholder="Enter Email-ID">
                </div>

                <div class="form-group col-md-6">
                  <label> Job Interest</label>
                  <input type="text" class="form-control" name="jobinterest" value="{jobinterest}" placeholder="eg Coding, Technical, Business Analyst, Non-tech etc">
                </div>
                <div class="form-group col-md-6">
                  <label> Mobile</label>
                  <input type="number" class="form-control" name="mobile" value="{mobile}" placeholder="Enter Mobile Number">
                </div>
                <div class="form-group col-md-6">
                  <label> Guardian's Mobile</label>
                  <input type="number" class="form-control" name="guardianmobile" value="{guardianmobile}" placeholder="Enter Guardian's Mobile Number">
                </div>
                <div class="form-group col-md-6">
                  <label> Date of Birth</label>
                  <input type="text" class="form-control" name="dob" value="{dob}" placeholder="dd-mm-yyyy">
                </div>
                <div class="form-group col-md-12">
                  <label> Current Address</label>
                  <textarea type="text" rows="3" class="form-control" name="currentaddress" placeholder="Enter Current Address">{currentaddress}</textarea>
                </div>
                <div class="form-group col-md-12">
                  <label> Permanent Address</label>
                  <textarea type="text" rows="3" class="form-control" name="permanentaddress" placeholder="Enter Permanent Address">{permanentaddress}</textarea>
                </div>

                <div class="form-group col-md-3">
                  <label> Sex </label>
                  <select class="form-control select2" name="sex" data-placeholder="Select Sex"  style="width: 100%;">
                    <option>{sex}</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label> Category </label>
                  <select class="form-control select2" name="category" data-placeholder="Select Category"  style="width: 100%;">
                    <option>{category}</option>
                    <option>General</option>
                    <option>SC</option>
                    <option>ST</option>
                    <option>OBC</option>
                    <option>PH</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label> Height (in cms)</label>
                  <input type="number" class="form-control" name="height" value="{height}" placeholder="Enter Height">
                </div>
                <div class="form-group col-md-3">
                  <label> Weight (in kgs)</label>
                  <input type="number" class="form-control" name="weight" value="{weight}" placeholder="Enter Weight">
                </div>
                <div class="form-group col-md-6">
                  <label> Place of Birth</label>
                  <input type="text" class="form-control" name="placeofbirth" value="{placeofbirth}" placeholder="Enter Place of Birth">
                </div>
                <div class="form-group col-md-6">
                  <label> Home Town </label>
                  <input type="text" class="form-control" name="hometown" value="{hometown}" value="" placeholder="Enter Home Town">
                </div>
                <div class="form-group col-md-6">
                  <label> Home State </label>
                  <select class="form-control select2" name="homestate" data-placeholder="Select State" style="width: 100%;">
                    <option>{homestate}</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands </option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                    <option value="Daman and Diu">Daman and Diu</option>
                    <option value="National Capital Territory of Delhi">National Capital Territory of Delhi</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Lakshadweep">Lakshadweep </option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Orissa">Orissa</option>
                    <option value="Puducherry">Puducherry</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Other(Foreign)">Other(Foreign)</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label> Marital Status</label>
                  <select class="form-control select2" name="maritalstatus" data-placeholder="Select Marital Status"  style="width: 100%;">
                    <option>{maritalstatus}</option>
                    <option>Single</option>
                    <option>Married</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label> Citizenship</label>
                  <input type="text" class="form-control" name="citizenship" value="{citizenship}" placeholder="Enter Citizenship">
                </div>
                <div class="form-group col-md-6">
                  <label> Languages</label>
                  <input type="text" class="form-control" name="languages" value="{languages}" placeholder="Enter Languages known">
                </div>
                <div class="form-group col-md-6">
                <label style="margin-bottom: 10px;"> Upload Photo (Max 5 mb and 500x500) </label>
                <input type="file" class="custom-file-input" name="photo" accept="image/*">
              </div>
              
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />

                <div class="form-group col-md-12 text-center">
                  <button type="submit" class="update_button">Update</button>
                </div>


              </div><!-- /.box-body -->
            </form>
            {/personal_info}
            
          </div><!-- /.box -->
        </div>
      </div>



    </section><!-- /.content -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
