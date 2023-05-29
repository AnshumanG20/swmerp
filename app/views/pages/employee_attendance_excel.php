<?php
$filename="report.xls";
header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Type: application/vnd.ms-excel");
?>
<center>
	<table border=1 style='border-style:solid; border-width:1px;border-collapse:collapse; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1;text-align: center;'>
					                
		<thead>
			
			<tr>
				<th style="background-color:#249FC6; color:#fff;">SL.No.</th>
				<th style="background-color:#249FC6; color:#fff;">Employee Name</th>
				<?php
				if(isset($data['month']))
				{
					if($data['month']!='')
					{
						 $first_day=strtotime($data['year'].'-'.$data['month'].'-01');
						$last_day=strtotime(date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-28')));
						$i=1;
						while($first_day <= $last_day)
						{
							$dt_nm= date('Y-m-d', $first_day);
							$dt_nmm= date('d/m/Y', $first_day);
							$first_day = strtotime("+1 day", $first_day);
							?>
							<th style="background-color:#249FC6; color:#fff;">
							<?=$dt_nmm;?>
							<?php 
								$weekendDay = date("D", strtotime($dt_nm));
								if($weekendDay=='Sun') { echo '<br/><span style="color:red;">(Sunday)</span>'; } ?>
						
							</th>
							<?php
						}
					}
				}
				?>
				
			</tr>
		</thead>
		<tbody>
	<?php
	if(isset($data["EmployeeList"])):
		  if($data["EmployeeList"]==""):
	?>
			<tr>
				<td colspan="2" style="text-align: center;">Data Not Available!!</td>
			</tr>
	<?php else:
			$j=1;
			foreach ($data["EmployeeList"] as $value):
	?>
			<tr>
				<td><?=$j++;?></td>
				<td><?php if($value["middle_name"]=='')
				{
					echo $value["first_name"].' '.$value["last_name"];
				}
				else
				{
					echo $value["first_name"].' '.$value["middle_name"].' '.$value["last_name"];
				}
					?><br/>(<?=$value['employee_code'];?>)</td>
				<?php
				if($data['month']!='')
				{
					$first_day=strtotime($data['year'].'-'.$data['month'].'-01');
					$last_day=strtotime(date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-28')));
					$m=1;
					while($first_day <= $last_day)
					{
						$m++;
						$dt_nm= date('Y-m-d', $first_day);
						$first_day = strtotime("+1 day", $first_day);
						?>
						<td>
							<b>InTime:</b> <?=(isset($value[$m]["in_time"]))?$value[$m]["in_time"]:'<span style="color:red;">N/A</span>';?>
							<br/>
							<b>OutTime:</b> <?=(isset($value[$m]["in_time"]))?$value[$m]["out_time"]:'<span style="color:red;">N/A</span>';?>
						</td>
						<?php
					}
				}
				?>
			</tr>
		<?php endforeach;?>
		 <?php endif;  ?>
	<?php endif;  ?>
		</tbody>
	</table>
</center>
		
