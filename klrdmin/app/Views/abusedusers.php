<!--
	This is a view for admin age-group list.
-->
 
<script type="text/javascript" src="<?php echo base_url()?>/assets/javascript/wtooltip.js"></script>
<script>
	$('#abusedusers').css('color','#81BDDA');
</script>

<div id="content">
	
	<h2 class="left">Users</h2>
    <a href="<?php echo base_url()?>/admin/add_user" class="add-affiliate">Add New User</a>
    <table border="0" cellspacing="0" cellpadding="0" class="data-table">
		  <tr>
			<th width="10">S.No.</th>
			<th width="20">Status</th>
			<th width="20">Id</th>
			<th width="250">Name</th>
			<th>Options</th>
		  </tr>
		  <?php  //echo '<pre>';print_r($age_groups);exit;
			if(count($users)>0)
			{
				$count = 0;
				foreach($users as $user_row)
				{
					$count++;
		  ?>
		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"';?>>
			<td><?php echo $count;?></td>
			<td>
				<span id="status<?php echo $user_row['user_id'];?>" onMouseover="tooltip('user','<?php echo $user_row['user_id'];?>')">
				<?php 
				if($user_row['is_active']) 
				{
				?>
					<span style="cursor:pointer;" onClick="changeStatus('user',0,'<?php echo $user_row['user_id'];?>')">
						<img src="<?php echo base_url()?>/assets/images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="changeStatus('user',1,'<?php echo $user_row['user_id'];?>')">
						<img src="<?php echo base_url()?>/assets/images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td><?php echo $user_row['user_id']; ?></td>
			<td><a target="_blank" href="<?php echo base_url()?>/user/profile/<?php echo $user_row['user_id'];?>"><?php echo $user_row['name']; ?> <?php echo $user_row['last_name']; ?></a></td>
			<td> 
				<a href="javascript:void(0);" class="pencil" onclick="addEditCategory('<?php echo $user_row['user_id'];?>');openPopDiv('popupEdit');">
				<a href="javascript:void(0);" onClick="deleteAbusedUser('report_abuse','<?php echo $user_row['user_id'];?>','this user from the list?','abusedusers');" class="delete"></a>
			</td>
		  </tr>
		  <script type="text/javascript">
						$(function(){
							$("#status<?php echo $user_row['user_id'];?>").wTooltip({ 
								ajax: site_url + "admin/callback_StatusToolTip/user/<?php echo $user_row['user_id'];?>",
								fadeIn:100,
								offsetY: 20,
								id: 'tip<?php echo $user_row['user_id'];?>',
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
				echo '<tr><td colspan="4">No abused users found</td></tr>';
			}
		  ?>
	</table>
	<br />
  

	

</div>


<!--PopUp : Start-->
<div id="popupEdit"></div>
<!--PopUp : End-->