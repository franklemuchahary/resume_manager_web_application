<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<?php 
if(isset($recruiter_info) && !empty($recruiter_info)):
	foreach($recruiter_info as $row):
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $row['company_name'];?>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Your Page Content Here -->
		<div class="row">
			<div class="col-md-4">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">CTC</h3>
					</div>
					<div class="box-body">
						<p><?php echo $row['ctc']; ?></p>
					</div>
				</div>
			</div><!--col-->
			<div class="col-md-4">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Co-ordinator Responsible</h3>
					</div>
					<div class="box-body">
						<p><?php echo $row['coordinator'];?></p>
					</div>
				</div>
			</div><!--col-->
			<div class="col-md-4">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Co-ordinator Mobile</h3>
					</div>
					<div class="box-body">
						<p><?php echo $row['coordinator_mobile']?></p>
					</div>
				</div>
			</div><!--col-->

		</div><!--row-->


	<?php endforeach; ?>



	<section class="content-header">
		<h1>
			Applications Received
		</h1>
	</section>

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
 								<th>MOBILE</th>
 								<th>APPLICATION STATUS</th>
 								<th>VIEW RESUME</th>
 								
 							</tr>

 							<?php 
 							foreach($applications_info as $row):
 								?>
 							<tr>               
 								<td><?php echo $row['student_rollnumber'];?></td>
 								<td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
 								<td><?php echo $row['mobile'];?></td>
 								<td><?php echo $row['application_status']; ?></td>
 								<td><a target="blank" href="<?php echo $row['resume_link'];?>"><i class="fa fa-file-text"></i></a></td>                                                      
 							</tr>

 							<?php 
 							endforeach;
 							?>
 							
 						</table>
 					</div><!-- /.box-body -->
 				</div><!-- /.box -->
 			</div>
 			</div>

 			<?php 
 			$appli_nos = 0;
 			$final_selected = 0;
 			foreach($applications_info as $row):
 				$appli_nos = $appli_nos + 1;
 			if(isset($row['application_status']) && $row['application_status'] == 'Final Selection'){
 				$final_selected = $final_selected + 1;
 			}
 			endforeach;
 			?>
 			<div class="row">
 			<div class="col-md-6">
 				<div class="box">
 					<div class="box-header with-border">
 						<h3 class="box-title">Total Applications</h3>
 					</div>
 					<div class="box-body">
 						<p>
 							<?php  
 							if(isset($appli_nos)){
 								echo $appli_nos;
 							}
 							?>
 						</p>
 					</div>
 				</div>
 			</div><!--col-->

 			<div class="col-md-6">
 				<div class="box">
 					<div class="box-header with-border">
 						<h3 class="box-title">Final Selected Students</h3>
 					</div>
 					<div class="box-body">
 						<p>
 							<?php  
 							if(isset($final_selected)){
 								echo $final_selected;
 							}
 							endif;//the very first if block ends here
 							?>
 						</p>
 					</div>
 				</div>
 			</div><!--col-->

 		</div><!--row-->
	</section>

 </section><!-- /.content -->
</div><!-- /.content-wrapper -->

