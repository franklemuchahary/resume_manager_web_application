<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>   

<tr>
  <th>COMPANY NAME</th>
  <th class="branches">BRANCHES</th>
  <th >APPLICATION DEADLINE</th>
  <th class="ticks">B.TECH</th>
  <th class="ticks">M.TECH</th>
  <th class="ticks">MBA</th>
  <th class="dov">DATE OF VISIT</th>
</tr>

<?php 
foreach($search_result as $row):
  $btech = $row['btech'];
  $mtech = $row['mtech'];
  $mba = $row['mba'];
?>

<tr onclick="void window.open('<?php echo base_url()."student/recruiter_profile/".$row['recruiter_username'];?>')" >                    
  <td><a href="#"><?php echo $row['company_name']; ?></a></td>
  <td><?php echo $row['btech_branches'].",".$row['mtech_branches'];?></td>
  <td><?php echo $row['application_deadline'];?></td>
  <td><i class=<?php if(isset($btech)){echo '"fa fa-check"';}else{echo '"fa fa-close"';} ?>></i></td>
  <td><i class=<?php if(isset($mtech)){echo '"fa fa-check"';}else{echo '"fa fa-close"';} ?>></i></td>
  <td><i class=<?php if(isset($mba)){echo '"fa fa-check"';}else{echo '"fa fa-close"';} ?>></i></td>
  <td><?php echo $row['date_of_visit'];?></td>                                      
</tr>

<?php endforeach;?>
