 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			Applications
 			
 		</h1>

 		
 	</section>
 	<section class="buttons"> 
 		<?php
 		if(!empty($applications_received)){
 			echo '<div class="export_button "><a href="'.base_url().'intern/intern_excel_exports/intern_excel_received_applications">Export</a></div>';
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
 								<th colspan="2">APPLICATION STATUS</th>
 								<th>VIEW RESUME</th>
 								
 							</tr>

 							<form action="<?php echo base_url();?>intern/intern_recruiter/application_status" method="post">
 							<?php 
 							foreach($applications_received as $row):
 							?>

 							<tr>               
 								<td><?php echo $row['student_rollnumber'];?></td>
 								
 								<td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
 								
 								<td>
 									<input type="hidden" value="<?php echo $row['student_rollnumber'];?>" name="student_rollnumber[]">
 									<select class="form-control select2" data-placeholder="Select Status"  style="width: 100%;" name="status[]">
 										<?php $status = $row['application_status']?>
 										<option <?php if(isset($status) && $status == "None"){echo "selected";}?> >None</option>
 										<option <?php if(isset($status) && $status == "Shortlisted"){echo "selected";}?> >Shortlisted</option>
 										<option <?php if(isset($status) && $status == "Final Selection"){echo "selected";}?> >Final Selection</option>
 										<option <?php if(isset($status) && $status == "Written + Inteview Process"){echo "selected";}?> >Written + Inteview Process</option>
 									</select>
 								</td>
 								
 								<td>	
 								</td>

 								<td><a target="blank" href="<?php echo $row['resume_link'];?>"><i class="fa fa-file-text"></i></a></td>
 		                    </tr>

 							<?php 
 							endforeach;
 							?>

 							</table>

 					</div><!-- /.box-body -->
 				

 				</div><!-- /.box -->
 				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>"/>
 				<input type="submit" class="update_button" style="margin-top:0px;font-size:16px;" value="Update">
 					</form>

 			</div>
 		</div>
 		
 	</section><!-- /.content -->
 </form>
 </div><!-- /.content-wrapper -->