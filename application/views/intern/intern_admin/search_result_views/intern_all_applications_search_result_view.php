<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>  

<tr>
	<th> DATE & TIME </th>
	<th> NAME</th>
	<th> COURSE</th>
	<th> BRANCH</th>
	<th> ROLL NUMBER</th>
	<th> AGGREGATE (% or CGPA)</th>
	<th> COMPANY APPLIED</th>
	<th> RESUME LINK </th>
	<th> APPLICATION STATUS </th>                                    
</tr>

<?php foreach($applications_search_result as $row): ?>

	<tr>
		<td><?php echo date('d-m-y h:i a',strtotime($row['date_time']));?></td>

		<td><?php echo $row['first_name'].' '.$row['last_name'];?></td>

		<td>
			<?php 
			switch($row['pursuing'])
			{
				case 'btech': 
				echo 'B.Tech';
				break;
				case 'mtech': 
				echo 'M.Tech';
				break;
				case 'mba': 
				echo 'MBA';
				break;
				default:
				echo 'Unavailable';
			}
			?>
		</td>

		<td>
			<?php 
			switch($row['pursuing'])
			{
				case 'btech': 
				echo $row['branch_ug'];
				break;
				case 'mtech': 
				echo $row['branch_pg'];
				break;
				case 'mba': 
				echo $row['pursuing'];
				break;
				default:
				echo 'Unavailable';
			}
			?>
		</td>

		<td><?php echo $row['student_rollnumber']; ?></td>

		<td>
			<?php
			switch($row['pursuing'])
			{
				case 'btech': 
				echo $row['aggregate_ug'];
				break;
				case 'mtech': 
				echo $row['aggregate_pg'];
				break;
				case 'mba': 
				echo $row['aggregate_pg'];
				break;
				default:
				echo 'Unavailable';
			}
			?>
		</td>       

		<td>
			<?php echo $row['company_name'];?>
		</td> 

		<td>
			<?php echo '<a href="'.$row['resume_link'].'" target="_blank"><i class="fa fa-file-text"></i></a>';?>
		</td>  

		<td>
			<?php echo $row['application_status'];?>
		</td>                                        
	</tr>

<?php endforeach; ?>