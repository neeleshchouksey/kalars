<?php //echo '<pre>';print_r($fav_data);exit;?>

<aside class="sidebar column fourcol last">
	<?php echo view('includes/side-search');?>
	<?php echo view('includes/side-advert');?>
</aside>

<div class="column eightcol user-list">
	<div class="profiles-listing clearfix">
	<?php
	$count=0;
	if(count($filtered_user_data))
	{
		foreach($filtered_user_data as $row)
		{ 
			$count++;
			if($count<3)
			{
				$last="";
			}
			else
			{
				$last="last";$count=0;
			}

			$profile_pic = $row['profile_pic'] == '' ? base_url().'assets/images/default.png' :  image_thumb('uploads/gallery/'.$row['user_id']. $row['name'].'/', 200, 200, $row['user_id'], $row['profile_pic']);

			if(isset($logged_in) && $logged_in==true)
			{
				$favorite = in_array($row['user_id'],$fav_data)?'favorite':'';
			}

		?>
		<div class="column fourcol <?php echo $last;?>">
			<div class="profile-preview">
				<div class="profile-image">
					<a href="<?php echo base_url().'user/profile/'.$row['user_id'];?>">
						<img src="<?php echo $profile_pic;?>" class="avatar" alt="" width="200">
					</a>
				</div>
				<div class="profile-text">
					<h5>
						<!-- <span title="Online" class="profile-status online"></span> -->
						<a href="<?php echo base_url().'user/profile/'.$row['user_id'];?>"><?php echo $row['name'];?> <?php echo $row['last_name'];?></a>
					</h5>
					<!-- <p>25 years old man from Berlin, Germany</p> -->
				</div>
				<div class="profile-options popup-container clearfix">
				<?php
				if(isset($logged_in) && $logged_in==true)
				{
				?>
					<div class="profile-option">
						<a href="javascript:markfavorites('<?php echo $row['user_id'];?>');" title="Favorites" data-title="Favorites" class="icon-heart submit-button <?php echo $favorite;?>" id="favorite-<?php echo $row['user_id'];?>"></a>
					</div>
				<?php
				}
				?>
				</div>
			</div>			
		</div>
	<?php
		}
	}
	else
	{
		echo '<h1>No Result Found</h1>';
	}
	?>
		<div class="clear"></div>
	</div>
	<!-- /profiles -->
	<!-- <nav class="pagination"><span class="page-numbers current">1</span>
	<a class="page-numbers" href="http://themextemplates.com/demo/lovestory/profiles/page/2">2</a>
	<a class="next page-numbers" href="http://themextemplates.com/demo/lovestory/profiles/page/2"></a></nav> -->	
</div>
