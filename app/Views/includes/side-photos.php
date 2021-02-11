<?php 
//if(isset($logged_in) && $logged_in==true)
//{
?>
<div class="widget clearfix">
	<h4 class="widget-title clearfix">
		<span class="left">Photos</span>
		<span class="widget-options"></span>	
	</h4>
	<div class="themex-slider carousel-slider visible">	
		<?php
		if(isset($photos) && count($photos))
		{
		?>
		<ul style="height: 79px;">
			<li style="display: list-item;" class="clearfix current">
			<?php
			$count = 0;
			foreach($photos as $photo)
			{
				$count++;
				if($count == 3)
				{
					$last = 'last';
				}
				else
				{
					$last = '';
				}
				$img_thumb = image_thumb($user_data['user_id']. $user_data['name'].'/', 200, 200, $user_data['user_id'], $photo['photo']);
			?>
				<div class="fourcol static-column <?php echo $last;?>">
					<div class="profile-preview widget-profile">
						<div class="profile-image demo-gallery">
							<?php
							if(isset($logged_in) && $logged_in==true)
							{
								$full_img = image_thumb($user_data['user_id']. $user_data['name'].'/', 600, 600, $user_data['user_id'], $photo['photo']);
							?>
							<a href="<?php echo $full_img;?>" data-size="600x600" data-med="<?php echo $full_img;?>" data-med-size="600x600" >
							<?php
							}
							else
							{
							?>
							<a href="javascript:void(0);" onClick="window.location.href = site_url +'home/sign_up';">
							<?php
							}
							?>
								<img src="<?php echo $img_thumb;?>" class="avatar" alt="" width="200">
							</a>
							
						</div>
					</div>										
				</div>				
			<?php
			}
			?>
			</li>
		</ul>
		<?php
		}
		else
		{
			echo 'No images uploaded yet';
		}
		?>
	</div>
	</div>
<?php 
//}
?>