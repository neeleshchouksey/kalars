<?php echo view('includes/slider-top');

$profile_pic = $user_data['profile_pic'] == '' ? base_url().'assets/images/default.png' :  image_thumb('uploads/gallery/'.$user_data['user_id']. $user_data['name'].'/', 600, 600, $user_data['user_id'], $user_data['profile_pic']);

$profile_pic_thumb = $user_data['profile_pic'] == '' ? base_url().'assets/images/default.png' :  image_thumb('uploads/gallery/'.$user_data['user_id']. $user_data['name'].'/', 200, 200, $user_data['user_id'], $user_data['profile_pic']);
?>
<aside class="column threecol">
	<div class="profile-preview">
		<div class="profile-image demo-gallery">
			<a href="<?php echo $profile_pic;?>" data-size="600x600" data-med="<?php echo $profile_pic;?>" data-med-size="600x600" >
				<img src="<?php echo $profile_pic_thumb;?>" class="avatar" alt="" width="200">
			</a>		
		</div>
		<div class="profile-options clearfix">
			<!-- <form class="upload-form" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'user/update_profile_pic';?>"> -->
				<label for="upload" class="button small">Change Photo</label>
				<input type="file" name="user_avatar" id="upload" value="Choose a file" class="shifted" accept="image/*" />
				<a href="user/my_profile#comming_soon" id="hit" style="display:none;">
					<p>&nbsp;&nbsp;</p>
				</a>
			<!-- </form> -->
		</div>
	</div>
	<div class="widget profile-menu">
		<ul>
			<li class="current"><?php echo anchor('user/edit_profile','<div>Edit Profile</div>');?></li>
			<li class="current"><?php echo anchor('user/gallery/'.$user_data['user_id'],'<div>My photos</div>');?></li>
			<li class="current"><?php echo anchor('user/profile/'.$user_data['user_id'],'<div>Public View</div>');?></li>
			<li class="current"><?php echo anchor('user/user_setting','<div>Settings</div>');?></li>
			<li class="current"><?php echo anchor('user/delete_profile','<div>Delete Profile</div>');?></li>
		</ul>
	</div>
</aside><div class="full-profile fivecol column">
	<div class="section-title">
		<h2><?php echo $user_data['name'].' '.$user_data['last_name'];?> (id: <?php echo $user_data['user_id'];?>)</h2>
	</div>
	
	<table class="profile-fields">
		<tbody>
			<tr>
				<th>User ID</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['user_id'];?></div>
				</td>
			</tr>
			<tr>
				<th>Name</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['name'].' '.$user_data['last_name'];?></div>
				</td>
			</tr>
			<tr>
				<th>Gender</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['gender'];?></div>
				</td>
			</tr>
			<tr>
				<th>Age</th>
				<td>
					<div class="field-wrap"><?php echo date_diff(date_create($user_data['dob']), date_create('today'))->y;?></div>
				</td>
			</tr>
			<tr>
				<th>Marital Status</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['merital_status'];?></div>
				</td>
			</tr>
		</tbody>
	</table>	
	<div class="section-title">
		<h2>Basic Information</h2>
	</div>
	<table class="profile-fields">
		<tbody>
			<tr>
				<th>Mother's Name</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['mother'];?></div>
				</td>
			</tr>
			<tr>
				<th>Father's Name</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['father'];?></div>
				</td>
			</tr>
			<tr>
				<th>Parent's Contact No</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['display_phone_no'];?></div>
				</td>
			</tr>
			<tr>
				<th>Email ID</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['email'];?></div>
				</td>
			</tr>
			<tr>
				<th>Address</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['address'];?></div>
				</td>
			</tr>
			<tr>
				<th>Alternative address</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['alternative_address'];?></div>
				</td>
			</tr>	
			<tr>
				<th>City</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['city'];?></div>
				</td>
			</tr>
			<tr>
				<th>Zip / Postal Code</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['zip_code'];?></div>
				</td>
			</tr>	
			<tr>
				<th>About Me</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['about_me'];?></div>
				</td>
			</tr>	
		</tbody>
	</table>	
	<div class="section-title">
		<h2>Horoscope Information</h2>
	</div>
	<table class="profile-fields">
		<tbody>
			<tr>
				<th>Manglik</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['manglik'];?></div>
				</td>
			</tr>	
			<tr>
				<th>Date of Birth and Time</th>
				<td>
					<?php
					$date = new DateTime($user_data['dob']);
					$dob = $date->format('d-M-Y h:i A');
					?>
					<div class="field-wrap"><?php echo $dob;?></div>
				</td>
			</tr>
			<tr>
				<th>Birth Place</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['birth_place'];?></div>
				</td>
			</tr>
			<tr>
				<th>Star Sign (Nakshatram)</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['star_sign'];?></div>
				</td>
			</tr>
			<tr>
				<th>Zodiac Sign (Rashi)</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['zodiac_sign'];?></div>
				</td>
			</tr>
			<tr>
				<th>Gotra</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['gotra'];?></div>
				</td>
			</tr>
			<tr>
				<th>Caste</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['caste'];?></div>
				</td>
			</tr>	
		</tbody>
	</table>	
	<div class="section-title">
		<h2>Education & Work Information</h2>
	</div>
	<table class="profile-fields">
		<tbody>
			<tr>
				<th>Qualification</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['qualification'];?></div>
				</td>
			</tr>	
			<tr>
				<th>Specialization</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['specialization'];?></div>
				</td>
			</tr>
			<tr>
				<th>Employement Status</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['employement_status'];?></div>
				</td>
			</tr>
			<tr>
				<th>Work Place Information</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['work_place'];?></div>
				</td>
			</tr>
			<tr>
				<th>Designation</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['designation'];?></div>
				</td>
			</tr>
			<tr>
				<th>Annual Income (INR)</th>
				<td>
					<div class="field-wrap">Rs <?php echo $user_data['annual_income'];?></div>
				</td>
			</tr>	
		</tbody>
	</table>	
	<div class="section-title">
		<h2>Physical Apprearance and habbits</h2>
	</div>
	<table class="profile-fields">
		<tbody>
			<tr>
				<th>Height</th>
				<td>
					<div class="field-wrap">
					<?php 
						$height = explode(',', $user_data['height']);
						echo $height[0].'" ';
						if(isset($height[1])) echo $height[1]."'";
					?>
					</div>
				</td>
			</tr>	
			<tr>
				<th>Weight (KGS)</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['weight'];?></div>
				</td>
			</tr>
			<tr>
				<th>Diet</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['diet'];?></div>
				</td>
			</tr>
			<tr>
				<th>Smoking</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['smoke'];?></div>
				</td>
			</tr>	
			<tr>
				<th>Drink</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['drink'];?></div>
				</td>
			</tr>
			<tr>
				<th>Skin Complexion</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['complexion'];?></div>
				</td>
			</tr>
			<tr>
				<th>Body Type</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['body_type'];?></div>
				</td>
			</tr>
		</tbody>
	</table>	
	<div class="section-title">
		<h2>I am looking for</h2>
	</div>
	<table class="profile-fields">
		<tbody>
			<tr>
				<th>Height</th>
				<td>
					<div class="field-wrap">
					<?php 
						$p_height = explode(',', $user_data['p_height']);
						echo $p_height[0].'" ';
						if(isset($p_height[1])) echo $p_height[1]."'";
					?>
					</div>
				</td>
			</tr>	
			<tr>
				<th>Weight (KGS)</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['p_weight'];?></div>
				</td>
			</tr>
			<tr>
				<th>Manglik</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['p_manglik'];?></div>
				</td>
			</tr>
			<tr>
				<th>Qualification</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['p_qualification'];?></div>
				</td>
			</tr>	
			<tr>
				<th>Employement Status</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['p_employement_status'];?></div>
				</td>
			</tr>
			<tr>
				<th>Work Place Information</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['p_work_place'];?></div>
				</td>
			</tr>
			<tr>
				<th>Diet</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['p_diet'];?></div>
				</td>
			</tr>
			<tr>
				<th>Smoke</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['p_smoke'];?></div>
				</td>
			</tr>	
			<tr>
				<th>Drink</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['p_drink'];?></div>
				</td>
			</tr>
			<tr>
				<th>Skin Complexion</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['p_complexion'];?></div>
				</td>
			</tr>
			<tr>
				<th>Body Type</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['p_body_type'];?></div>
				</td>
			</tr>
			<tr>
				<th>Minimum Annual Income</th>
				<td>
					<div class="field-wrap">Rs <?php echo $user_data['p_annual_income'];?></div>
				</td>
			</tr>
		</tbody>
	</table>	
</div>
<aside class="sidebar fourcol column last">
	<?php echo view('includes/side-favorites');?>
	<?php echo view('includes/side-photos');?>
	<?php echo view('includes/side-advert');?>
	<?php //include('includes/side-gifts.php');?>
</aside>
<?php echo view('includes/slider-bottom');?>

<!---Photo Crop-->
<script src="assets/crop/js/jquery.min.js"></script>
<script src="assets/crop/js/sweetalert.min.js"></script>
<script src="assets/crop/js/croppie.js"></script>
<script src="assets/crop/js/demo.js"></script>
<script>
	Demo.init();
</script>
<!---Photo Crop-->