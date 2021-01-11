<?php echo view('includes/slider-top');?>

<?php 

//$profile_pic = $user_data['profile_pic'] == '' ? base_url().'assets/images/default.png' : base_url().'uploads/gallery/'.$user_data['user_id']. $user_data['name'].'/'.$user_data['profile_pic'];

$profile_pic = $user_data['profile_pic'] == '' ? base_url().'assets/images/default.png' : image_thumb('uploads/gallery/'.$user_data['user_id']. $user_data['name'].'/', 200, 200, $user_data['user_id'], $user_data['profile_pic']);

$full_profile_pic = $user_data['profile_pic'] == '' ? base_url().'assets/images/default.png' : image_thumb('uploads/gallery/'.$user_data['user_id']. $user_data['name'].'/', 600, 600, $user_data['user_id'], $user_data['profile_pic']);

if(isset($logged_in) && $logged_in==true)
{
	$favorite_url = "markfavorites('".$user_data['user_id']."');";
	$favorite = isset($fav_data) && count($fav_data)?'favorite':'';
}
else
{
	$favorite_url = 'window.location.href = "'.base_url().'home/sign_up";'; 
	$favorite = '';
	echo view('includes/login-message');
}

?>

<aside class="column threecol">	
	<div class="profile-preview">
		<div class="profile-image demo-gallery">
			<a href="<?php echo $full_profile_pic;?>" data-size="600x600" data-med="<?php echo $full_profile_pic;?>" data-med-size="600x600" >
				<img src="<?php echo $profile_pic;?>" class="avatar" alt="" width="200">
			</a>
		</div>
		<div class="profile-options popup-container clearfix">
			<div class="profile-option" onClick="<?php echo $favorite_url;?>">
				<a href="javascript:void(0);" title="Favorites" data-title="Favorites" class="icon-heart submit-button <?php echo $favorite;?>" id="favorite-<?php echo $user_data['user_id'];?>"></a>
			</div>
		</div>
	</div>
	<div class="widget profile-menu">
		<ul>
			<li class="current"><?php echo anchor('user/gallery/'.$user_data['user_id'],'Photo Gallery');?></li>
		</ul>
	</div>

	<?php 
	
	if(isset($logged_in) && $logged_in==true 
		&& $user_data['interest_privacy']==1
		)
    {
		if(($user_data['privacy_filter'] == 0) ||  (($user_data['filter_age_from']<=date_diff(date_create($this->user_data['dob']), date_create('today'))->y) 
			&&($user_data['filter_age_to']>=date_diff(date_create($this->user_data['dob']),date_create('today'))->y) 
			&&($user_data['filter_gender']==$this->user_data['gender']) 
			&&($user_data['filter_merital_status']==$this->user_data['merital_status'])
			&&($user_data['filter_manglik']==$this->user_data['manglik'] )
			&&($user_data['filter_qualification']==$this->user_data['qualification'])
			&&($user_data['filter_annual_income']==$this->user_data['annual_income']))
		)
		{ ?>
			
		<div class="widget profile-menu">
			<ul>
				<?php //echo '<pre>';print_r($is_interest_friend);exit;
				if(count($is_interest_friend))
				{// print_r($is_interest_friend); die;
					if($is_interest_friend['status_interest']==1)
					{
						?>
						<li  class="current"><b> Interest request sent</b></li>
				<?php 
					}
					else if($is_interest_friend['status_interest']==2)
					{
				?>
						<li  class="current"><b>Interest request accepted</b></li>
				 
				<?php 
					}
					else if($is_interest_friend['status_interest']==0)
					{
				?>
						<li  class="current"><b>Interest request sent</b></li>
				<?php 
					}	
				} 
				else
				{
				?>
					<li class="current" style="cursor: pointer;" onclick="interest_send('<?php echo $user_data['user_id']?>')"><b>Show Interest</b></li>
				<?php
				}
				?>
			</ul>
		</div>
		<?php 
		}
	}
		
	?>

	<div class="widget profile-menu">
		<ul>
			<li class="current">
				<?php 
				if(count($abused))
				{
					echo '<span style="color: #f17b97;">Abused Reported</span>';
				}
				else
				{
					echo anchor('user/report_abuse/'.$user_data['user_id'],'Report Abuse');
				}
				?>
			</li>
		</ul>
	</div>
</aside>

<div class="full-profile fivecol column">
	<div class="section-title">
		<h2>
			<a href="user/profile/<?php echo  $user_data['user_id'];?>">
				<?php echo $user_data['name'].' '.$user_data['last_name'];?> (id: <?php echo $user_data['user_id'];?>)
			</a>
		</h2>
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
			<?php
			if($user_data['dob'] != '0000-00-00 00:00:00')
			{
			?>
			<tr>
				<th>Age</th>
				<td>
					<div class="field-wrap"><?php echo date_diff(date_create($user_data['dob']), date_create('today'))->y;?></div>
				</td>
			</tr>
			<?php
			}
			?>
			<tr>
				<th>Marital Status</th>
				<td>
					<div class="field-wrap"><?php echo $user_data['merital_status'];?></div>
				</td>
			</tr>
		</tbody>
	</table>
	<?php 
	if(isset($logged_in) && $logged_in==true)
	{
	?>
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
					<div class="field-wrap"><?php if($user_data['display_phone_no'] != '') echo $user_data['display_phone_no']; else echo $user_data['phone_no'];?></div>
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
	<?php 
	}
	?>
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
			<?php
			if($user_data['dob'] != '0000-00-00 00:00:00')
			{
				$date = new DateTime($user_data['dob']);
				$dob = $date->format('d-M-Y h:i A');
			?>
			<tr>
				<th>Date of Birth and Time</th>
				<td>
					<div class="field-wrap"><?php echo $dob;?></div>
				</td>
			</tr>
			<?php
			}
			?>
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
	<?php 
	if(isset($logged_in) && $logged_in==true)
	{
	?>
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
	<?php 
	}
	?>
</div>
<aside class="sidebar fourcol column last">
	<?php include('includes/side-photos.php');?>
	<?php //include('includes/side-gifts.php');?>
	<?php echo view('includes/side-advert');?>
</aside>
<?php echo view('includes/slider-bottom');?>