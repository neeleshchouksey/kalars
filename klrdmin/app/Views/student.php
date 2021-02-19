<!--
	This is a view for admin age-group list.
-->
 
<script type="text/javascript" src="javascript/wtooltip.js"></script>
<script>
	$('#student').css('color','#81BDDA');
</script>

<div id="content">
	
	<h2 class="left">Students</h2>
    <table border="0" cellspacing="0" cellpadding="0" class="data-table">
		  <tr>
			<th width="10">S.No.</th>
			<th width="20">Status</th>
			<th width="250">First Name</th>
			<th width="20">FOD</th>
			<th>Options</th>
		  </tr>
		  <?php //echo '<pre>';print_r($age_groups);exit;
			if(count($student)>0)
			{
				$count = $start;
				foreach($student as $student_row)
				{
					$count++;
		  ?>
		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"';?>>
			<td><?php echo $count;?></td>
			<td>
				<span id="status<?php echo $student_row['student_id'];?>" onMouseover="tooltip('student','<?php echo $student_row['student_id'];?>')">
				<?php 
				if($student_row['is_active']) 
				{
				?>
					<span style="cursor:pointer;" onClick="changeStatus('student',0,'<?php echo $student_row['student_id'];?>')">
						<img src="images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="changeStatus('student',1,'<?php echo $student_row['student_id'];?>')">
						<img src="images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td><?php echo $student_row['stud_name']; ?></td>
			<td>
				<span id="FOD<?php echo $student_row['student_id'];?>" >
				<?php 
				if($student_row['FOD']) 
				{
				?>
					<script>
						current_fod_id=<?php echo $student_row['student_id'];?>
					</script>
					<span style="cursor:pointer;" onClick="javascript:void(0);">
						<img src="images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="changeFOD('<?php echo $student_row['student_id'];?>')">
						<img src="images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td> 
				<!-- <a href="javascript:void(0);" class="pencil" onclick="addEditCategory('<?php echo $category_row['category_id'];?>');openPopDiv('popupEdit');"> -->
				<a href="javascript:void(0);" onClick="deleteRecord('student','<?php echo $student_row['student_id'];?>','this student','student');" class="delete"></a>
			</td>
		  </tr>
		  <script type="text/javascript">
						$(function(){
							$("#status<?php echo $student_row['student_id'];?>").wTooltip({
								ajax: site_url + "admin/callback_StatusToolTip/student/<?php echo $student_row['student_id'];?>",
								fadeIn:100,
								offsetY: 20,
								id: 'tip<?php echo $student_row['student_id'];?>',
								style: {border: "1px solid gray", padding: "1px"},
								fadeOut:200			   
						   });
						});
			</script>
		  <?php
				}
			}
			else
			{
				echo '<tr><td colspan="4">No students found</td></tr>';
			}
		  ?>
	</table>
	<br />
  

	

</div>


<!--PopUp : Start-->
<div id="popupEdit"></div>
<!--PopUp : End-->