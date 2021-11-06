<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>   

<tr>
	<th> NAME</th>
	<th> COURSE</th>
	<th> BRANCH</th>
	<th> ROLL NUMBER</th>
	<th> AGGREGATE (% or CGPA)</th>
	<th> MOBILE </th>                      
</tr>

<?php foreach($student_search_result as $row): ?>

	<tr>                    
		<td><?php echo $row['firstname'].' '.$row['lastname'];?></td>
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
				echo $row['branchgrad'];
				break;
				case 'mtech': 
				echo $row['branchpg'];
				break;
				case 'mba': 
				echo $row['pursuing'];
				break;
				default:
				echo 'Unavailable';
			}
			?>
		</td>
		<td><?php echo $row['username_rollnumber']; ?></td>
		<td>
			<?php
			switch($row['pursuing'])
			{
				case 'btech': 
				echo $row['aggregategrad'];
				break;
				case 'mtech': 
				echo $row['aggregatepg'];
				break;
				case 'mba': 
				echo $row['aggregatepg'];
				break;
				default:
				echo 'Unavailable';
			}
			?>
		</td>       

		<td>
			<?php echo $row['mobile'];?>
		</td>                                       
	</tr>

<?php endforeach; ?>