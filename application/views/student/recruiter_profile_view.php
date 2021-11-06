<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<?php 
if(isset($application_submitted)){
	echo '<script> alert("'.str_replace(array("\r","\n"), '\n', $application_submitted).'"); </script>';
}
if(isset($error_applying)){
	echo $error_applying;
}
if(isset($student_eligible)){
	echo $student_eligible;
}
?>

<?php 
if(isset($specific_recruiter) && !empty($specific_recruiter)):
	foreach($specific_recruiter as $row):
		$btech = $row['btech'];
		$btech_cutoff = $row['btech_cutoff'];
		$mtech = $row['mtech'];
		$mtech_cutoff = $row['mtech_cutoff'];
		$btech_branches = $row['btech_branches'];
		$btech_array = explode(",", $btech_branches);

		$mtech_branches = $row['mtech_branches'];
		$mtech_array = explode(",", $mtech_branches);
?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?php echo $row['company_name'];?>
			</h1>
		</section>

			<?php 
			foreach($student_info as $row2){
				$student_branch_btech = $row2['branchgrad'];
				$student_btech_aggregate = $row2['aggregategrad'];
				$student_branch_mtech = $row2['branchpg'];
				$student_mtech_aggregate = $row2['aggregatepg'];
			}
			?>

			<?php
			if(isset($final_selected) && !empty($final_selected)): 
				foreach($final_selected as $row3){
					$final_selected_company = $row3['company_name'];
				}
			endif;
			?>


			<?php
			if(isset($applied)){
				echo '<h4 class="appd-applied" style="color:green;">'.$applied.'</h4>';
			}
			elseif(isset($final_selected) && !empty($final_selected)){
				echo '<h4 class="appd-applied" style="color:green;">You have already been Finally Selected for '.$final_selected_company.'</h4>';
			}
			else{

				//first check if the application deadline is over
				if(strtotime($row['application_deadline'])>strtotime('now')){
				//check for btech students
					if(!empty($btech) && !empty($student_branch_btech) && empty($student_branch_mtech)){
						$x = 0;
					for($i=0;$i<16;$i++){ //iterating for 15 btech branches
						if(isset($btech_array[$i]) && ($btech_array[$i]==$student_branch_btech)){
							$x = $x + 1;
						}
						else{
							$x = $x + 0;
						}
					}
					if($x == 1){
						if(!empty($student_btech_aggregate)&&$student_btech_aggregate>=$btech_cutoff){
							echo '<h4 class="appd" id="countdown-timer"></h4>';
						}
						else{
							echo '<h4 class="appd">You do not satisfy the required cutoff to apply!</h4>';
						}
					}
					else{
						echo '<h4 class="appd">This Job is not open for your Branch!</h4>';
					}
				}
				//check for mtech students
				elseif(!empty($mtech) && !empty($student_branch_mtech)){
					$y = 0;
					for($j=0;$j<23;$j++){ //iterating for 23 mtech branches
						if(isset($mtech_array[$j]) && ($mtech_array[$j]==$student_branch_mtech)){
							$y = $y + 1;
						}
						else{
							$y = $y + 0;
						}
					}
					if($y == 1){
						if(!empty($student_mtech_aggregate)&&$student_mtech_aggregate>=$mtech_cutoff){
							echo '<h4 class="appd" id="countdown-timer"></h4>';
						}
						else{
							echo '<h4 class="appd">You do not satisfy the required cutoff to apply!</h4>';
						}
					}
					else{
						echo '<h4 class="appd">This Job is not open for your Branch!</h4>';
					}
				}
				//to print if job is not open for mtech
				elseif(empty($mtech) && !empty($student_branch_mtech)){
					echo '<h4 class="appd">This Job is not open for M.Tech</h4>';
				}
				//to print if job is not open for btech
				elseif(empty($btech) && !empty($student_branch_btech)){
					echo '<h4 class="appd">This Job is not open for B.Tech</h4>';
				}	
			}
			else{
				echo '<h4 class="appd">The Application Deadline is Over!</h4>';
			}

		}
		

		?>

	<!-- Main content -->
	<section class="content">

		<!-- Your Page Content Here -->
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">About Company</h3>
					</div>
					<div class="box-body">
						<p><?php echo $row['about_company'];?></p>
					</div>
				</div>
			</div><!--col-->
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Job Description</h3>
					</div>
					<div class="box-body">
						<p><?php echo $row['job_description'];?></p>
					</div>
				</div>
			</div><!--col-->
			<?php 
			if(isset($row['note'])){
				?>
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Note</h3>
						</div>
						<div class="box-body">
							<p><?php echo $row['note'];?></p>
						</div>
					</div>
				</div><!--col-->
				<?php }?>
				<div class="col-md-3">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">CTC</h3>
						</div>
						<div class="box-body">
							<p><?php echo $row['ctc']; ?></p>
						</div>
					</div>
				</div><!--col-->
				<div class="col-md-3">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Location</h3>
						</div>
						<div class="box-body">
							<p><?php echo $row['location'];?></p>
						</div>
					</div>
				</div><!--col-->
				<div class="col-md-3">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Co-Ordinator Responsible</h3>
						</div>
						<div class="box-body">
							<p><?php echo $row['coordinator'];?></p>
						</div>
					</div>
				</div><!--col-->
				<div class="col-md-3">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Date of Visit</h3>
						</div>
						<div class="box-body">
							<p><?php echo $row['date_of_visit']?></p>
						</div>
					</div>
				</div><!--col-->
				<div class="form-group col-md-12 text-center">

					<?php

					if(empty($applied) && empty($final_selected)){
						//first check if the application deadline is over
						if(strtotime($row['application_deadline'])>strtotime('now')){
						//check for btech students
							if(!empty($btech) && !empty($student_branch_btech) && empty($student_branch_mtech)){
								$x = 0;
								for($i=0;$i<16;$i++){
									if(isset($btech_array[$i]) && ($btech_array[$i]==$student_branch_btech)){
										$x = $x + 1;
									}
									else{
										$x = $x + 0;
									}
								}
								if($x == 1){
									if(!empty($student_btech_aggregate)&&$student_btech_aggregate>=$btech_cutoff){
										echo '<a href="'.base_url().'student/submit_application/'.$row['recruiter_username'].'"><button type="submit" class="update_button">Apply</button></a>';
									}
								}
							}
						//check for mtech students
							elseif(!empty($mtech) && !empty($student_branch_mtech)){

								$y = 0;
								for($j=0;$j<23;$j++){
									if(isset($mtech_array[$j]) && ($mtech_array[$j]==$student_branch_mtech)){
										$y = $y + 1;
									}
									else{
										$y = $y + 0;
									}
								}
								if($y == 1){
									if(!empty($student_mtech_aggregate)&&$student_mtech_aggregate>=$mtech_cutoff){
										echo '<a href="'.base_url().'student/submit_application/'.$row['recruiter_username'].'"><button type="submit" class="update_button">Apply</button></a>';
									}
								}
							}	
						}//end of the first if block
					}
					?>
				</div>

			</div><!--row-->

		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->

<?php endforeach; endif;?>
