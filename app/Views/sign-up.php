<?php echo view('includes/login-message'); ?>

<div class="column twelvecol">
	<div class="section-title">
		<h1>Register</h1>
	</div>

	<!-- image upload -->
	<?php $profile_pic_thumb = base_url().'assets/images/default.png';?>
	<img src="<?php echo $profile_pic_thumb;?>" class="avatar" alt="" width="100" id="registered_image">
	<br />
	<label for="upload" class="button small">Upload Photo</label>
	<input type="file" name="user_avatar" id="upload" value="Choose a file" class="shifted" accept="image/*" />
	<a href="home/sign_up#comming_soon" id="hit" style="display:none;">
		<p>&nbsp;&nbsp;</p>
	</a>
	<br /><br />
	<!-- end image upload -->

	<form class="ajax-form formatted-form" action="#" method="POST">
		<div class="column sixcol">
			<div class="field-wrap">
				<input id="name" name="name" placeholder="First name" type="text">
			</div>
		</div>
		<div class="column sixcol last">
			<div class="field-wrap">
				<input id="last_name" name="last_name" placeholder="Last name" type="text">
			</div>
		</div>
		<div class="clear"></div>
		<div class="column sixcol">
			<div class="field-wrap">
				<input id="phone_no" name="phone_no" placeholder="Phone no" type="text">
			</div>
		</div>
		<div class="column sixcol last">
			<div class="select-field" style="margin-bottom: 13px;">
				<span>woman</span>
				<select style="opacity: 0;" id="gender" name="gender">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>						
			</div>
		</div>
		<div class="clear"></div>
		<div class="column sixcol">
			<div class="field-wrap">
				<input id="password" name="password" placeholder="Password" type="password">
			</div>
		</div> 
		<div class="red" id="r_error_msg"></div>
		<a href="javascript:void(0);" class="button" onclick="register_user();">Register</a>
		<div class="loader"></div>
	</form>
</div>

<!---Photo Crop-->
<script src="assets/crop/js/jquery.min.js"></script>
<script src="assets/crop/js/sweetalert.min.js"></script>
<script src="assets/crop/js/croppie.js"></script>
<script src="assets/crop/js/demo.js"></script>
<script>
	Demo.init();
</script>
<!---Photo Crop-->