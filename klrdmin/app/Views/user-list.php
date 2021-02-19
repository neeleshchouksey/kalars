
		  <?php
			if(count($users)>0)
			{
				$count = $page*100;
				// echo $page;die();
				foreach($users as $user_row)
				{
					$count++;
					$profile_pic = $user_row['profile_pic'] == '' ? KALARS_URL.'/assets/images/default.png' : image_thumb(KALARS_URL.'/uploads/gallery/'.$user_row['user_id']. $user_row['name'].'/', 30, 30, $user_row['user_id'], $user_row['profile_pic']);

					$date = new DateTime($user_row['registered']);
					$registered = $date->format('d-M-Y h:i A');
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
						<img src="<?php echo base_url();?>/assets/images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="changeStatus('user',1,'<?php echo $user_row['user_id'];?>')">
						<img src="<?php echo base_url();?>/assets/images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td><?php echo $user_row['user_id']; ?></td>
			<td><img src="<?php echo $profile_pic;?>" class="avatar" alt="" width="30"></td>
			<td><a target="_blank" href="<?php echo base_url()?>/user/profile/<?php echo $user_row['user_id'];?>"><?php echo $user_row['name']; ?> <?php echo $user_row['last_name']; ?></a></td>
			<td><?php echo $user_row['phone_no']; ?></td>
			<td><?php echo $registered; ?></td>
			<td>
				<a target="_blank" href="<?php echo base_url()?>/home/app_launch/<?php echo $user_row['user_id'];?>/shivadmin" class="pencil">
				<a href="javascript:void(0);" onClick="deleteUser('user','<?php echo $user_row['user_id'];?>','this user','users');" class="delete"></a>
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
				echo '<tr><td colspan="4">No users found</td></tr>';
			}
		  ?>
