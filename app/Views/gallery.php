<?php //echo '<pre>';print_r($photos);exit;?>
<?php echo view('includes/slider-top');?>
<div class="column eightcol">
	<div class="section-title">
		<h2><?php //echo '<pre>';print_r($profile_user_data);?>
			<a href="user/profile/<?php echo  $profile_user_data['user_id'];?>">
				<?php echo $profile_user_data['name'].' '.$profile_user_data['last_name'];?> (id: <?php echo $profile_user_data['user_id'];?>)
			</a>
		</h2>
	</div>
	<div class="profiles-listing clearfix">
		<?php
		$count=0;
		for($i=0; $i<6; $i++)
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
			
			$profile_pic = !isset($photos[$i]) ? base_url().'/assets/images/default.png' :  image_thumb($profile_user_data['user_id']. $profile_user_data['name'].'/', 600, 600, $profile_user_data['user_id'], $photos[$i]['photo']);

			$profile_pic_thumb = !isset($photos[$i]) ? base_url().'/assets/images/default.png' :  image_thumb($profile_user_data['user_id']. $profile_user_data['name'].'/', 200, 200, $profile_user_data['user_id'], $photos[$i]['photo']);

		?>
		<div class="column fourcol <?php echo $last;?>">
			<div class="profile-preview">
				<div class="profile-image demo-gallery">
					<a href="<?php echo $profile_pic;?>" data-size="600x600" data-med="<?php echo $profile_pic;?>" data-med-size="600x600" >
						<img src="<?php echo $profile_pic_thumb;?>" class="avatar" alt="" width="200">
					</a>
				</div>
				<?php
				if($profile_user_data['user_id'] == $user_data['user_id'])
				{	
				?>
				<div class="profile-options popup-container clearfix">
					<div class="profile-option">
						<?php
						if(!isset($photos[$i]))
						{	
						?>
							<label for="upload" class="button small">Add Photo</label>
							<input type="file" name="user_avatar" id="upload" value="Choose a file" class="shifted" accept="image/*" />
							<a href="<?php echo base_url();?>/user/gallery/<?php echo $profile_user_data['user_id'];?>#comming_soon" id="hit" style="display:none;">
								<p>&nbsp;&nbsp;</p>
							</a>
						<?php
						}
						else
						{
						?>
							<form class="upload-form" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'user/add_delete_photo';?>">
								<div for="user_avatar" class="button secondary small" onClick="this.parentElement.submit();">Remove Photo</div>
								<input name="photo_id" value="<?php echo $photos[$i]['photo_id'];?>" type="hidden">
								<input name="photo" value="<?php echo $photos[$i]['photo'];?>" type="hidden">
							</form>
						<?php
						}
						?>
					</div>
				</div>
				<?php
				}
				?>
			</div>			
		</div>

		<?php
		}
		?>
		<div class="clear"></div>
	</div>
	<!-- /profiles -->
	<!-- <nav class="pagination"><span class="page-numbers current">1</span>
	<a class="page-numbers" href="http://themextemplates.com/demo/lovestory/profiles/page/2">2</a>
	<a class="next page-numbers" href="http://themextemplates.com/demo/lovestory/profiles/page/2"></a></nav>	 -->
</div>

<aside class="sidebar column fourcol last">
	<?php echo view('includes/side-search');?>
	<?php echo view('includes/side-advert');?>
</aside>
<?php echo view('includes/slider-bottom');?>


<!---Photo Crop-->
<script src="<?php echo base_url();?>/assets/crop/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/crop/js/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>/assets/crop/js/croppie.js"></script>
<script src="<?php echo base_url();?>/assets/crop/js/demo.js"></script>
<script>
	Demo.init();
</script>
<!---Photo Crop-->