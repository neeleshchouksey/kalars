<?php 
if(isset($logged_in) && $logged_in==true)
{
?>
<div class="widget clearfix">
	<a href="<?php echo base_url().'user/favorites';?>">
		<h4 class="widget-title clearfix">
			<span class="left">Favorites</span>
		</h4>
	</a>
	<div class="themex-slider carousel-slider visible">
		<?php
		if(count($favorites))
		{
		?>
		<ul style="height: 79px;">
			<li style="display: list-item;" class="clearfix current">
			<?php
			$count = 0;
			foreach($favorites as $row)
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
				$img_src = $row['profile_pic'] == '' ? base_url().'assets/images/default.png' :  image_thumb('uploads/gallery/'.$row['user_id']. $row['name'].'/', 200, 200, $row['user_id'], $row['profile_pic']);

			?>
				<div class="fourcol static-column <?php echo $last;?>">
					<div>
						<div>
							<a href="<?php echo base_url().'user/profile/'.$row['user_id'];?>"  data-group="photos">
								<img src="<?php echo $img_src;?>" class="fullwidth" alt="">
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
			echo 'No favorites yet';
		}
		?>
	</div>
	</div>
<?php 
}
?>