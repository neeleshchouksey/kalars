<?php //echo '<pre>';print_r($user_data);exit;?>

<!-- <link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/css/colorbox.css" type="text/css">
<link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/css/css.css" type="text/css">
<link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/css/gwpm_style.css" type="text/css"> -->


<!-- code for datepicker -->
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>/assets/css/bootstrap-combined.min.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>/assets/css/bootstrap-datetimepicker.min.css">
<!-- end code for datepicker -->


<!-- code for city autocomplete -->
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/autocity/jquery-ui.js"></script>

<!-- end code for city autocomplete -->

<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>/assets/css/ui.accordion.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>/assets/css/ui.theme.css">

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/widget.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/accordion.js"></script>


<div id="content" role="main"><h2 class="gwpm-content-title">My Profile</h2>

 

<form name="gwpm-profile-form" action="<?php echo base_url().'/user/save_profile';?>" method="post" >
	<div role="tablist" class="ui-accordion ui-widget ui-helper-reset" id="gwpm_accordion">
		<h3 tabindex="-1" aria-expanded="false" aria-selected="false" aria-controls="ui-id-4" id="ui-id-3" role="tab" class="ui-accordion-header ui-state-default ui-corner-all ui-accordion-icons"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
			<a href="#">Basic Information</a>
		</h3>
		<div aria-hidden="true" role="tabpanel" aria-labelledby="ui-id-3" id="ui-id-4" style="display: none;" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
			<table class="profile-fields">
				<tbody>
				
					<tr>
						<td valign="">First Name:<span class="gwpm-mandatory">*</span></td>
						<td valign="top">
							<div class="field-wrap" id="wrap">
								<input name="name" id="name" value="<?php echo $user_data['name'];?>" maxlength="25">
							</div>
						</td>
					</tr>
					<tr>
						<td valign="">Last Name:<span class="gwpm-mandatory">*</span></td>
						<td valign="top"><div class="field-wrap" id="wrap">
							<input name="last_name" id="last_name" value="<?php echo $user_data['last_name'];?>"></div></td>
					</tr>
					<tr>
					<td valign="">Mother's Name: <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
						<div class="field-wrap" id="wrap">
							<input name="mother" id="mother" value="<?php echo $user_data['mother'];?>">
						 </div>
						</td>
		      		</tr>
		      		<tr>
					<td valign="">Father's Name: <!-- <span class="gwpm-mandatory">*</span> --> </td>
						<td valign="top">
							<div class="field-wrap" id="wrap">
								<input name="father" id="father" value="<?php echo $user_data['father'];?>">
							</div>
						</td>
		      		</tr>
					<tr>
						<td valign="">Email ID: <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="email" id="email" value="<?php echo $user_data['email'];?>"></div></td>
					</tr>
					<tr>
						<td valign="">Parent's Contact No:</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="display_phone_no" id="display_phone_no" maxlength="15"  value="<?php echo $user_data['display_phone_no'];?>"></div></td>
						<!-- <td valign="top"><input type="checkbox" name="gwpm_show_no" id="gwpm_show_no" value="1" >(If checked hide from all users)</td> -->
					</tr>
					<tr>
						<td valign="">Gender:</td>
						<td valign="top">		
							<div class="select-field">
								<span>Bride</span>
								<select style="opacity: 0;" name="gender" id="gender">
									<option value="Male">Male</option>
									<option value="Female" <?php if($user_data['gender'] == 'Female') echo 'selected';?>>Female</option>
								</select>						    
							</div>
						</td>
					</tr>
					
					<tr>
						<td valign="">Address:</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="address" id="address" maxlength="100" value="<?php echo $user_data['address'];?>"></div></td>
					</tr>
					<tr>
						<td valign="">Alternative Address:</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="alternative_address" id="alternative_address" maxlength="100" value="<?php echo $user_data['alternative_address'];?>"></div></td>
					</tr>
					<tr>
						<td valign="">City:</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="city" id="city" maxlength="50" value="<?php echo $user_data['city'];?>"></div></td>
					</tr>
					
					<tr>
						<td valign="">Zip / Postal Code:</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="zip_code" id="zip_code" value="<?php echo $user_data['zip_code'];?>"></div></td>
					</tr>
					<tr>
						<td valign="">About You:</td>
						<td valign="top"><div class="field-wrap" id="wrap">
							<textarea name="about_me" id="about_me" maxlength="500"><?php echo $user_data['about_me'];?></textarea></div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<h3 tabindex="-1" aria-expanded="false" aria-selected="false" aria-controls="ui-id-6" id="ui-id-5" role="tab" class="ui-accordion-header ui-state-default ui-corner-all ui-accordion-icons"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
			<a href="#">Horoscope Information</a>
		</h3>
		<div aria-hidden="true" role="tabpanel" aria-labelledby="ui-id-5" id="ui-id-6" style="display: none;" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
			<table class="profile-fields">
				<tbody>
					<tr>
						<td valign="">Date of Birth: <span class="gwpm-mandatory">*</span></td>
						<td valign="top">
							<div id="datetimepicker" class="input-append date" data-format="MM/dd/yyyy HH:mm:ss PP">
								<input type="text" name="dob" id="dob" value="<?php echo $user_data['dob'];?>" maxlength="25"></input><span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
							</div>
							(Day/Month/Year)
						</td>
					</tr>

					<tr>
						<td valign="">Birth Place:</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="birth_place" id="birth_place" maxlength="50" value="<?php echo $user_data['birth_place'];?>"></div></td>
					</tr>
					
					<tr>
						<td valign="">Marital Status: <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="merital_status" id="merital_status">
								<option value="Unmarried" >Unmarried</option>
								<option value="Divorsed" <?php if($user_data['merital_status'] == 'Divorsed') echo 'selected';?>>Divorsed</option>
								<option value="Widow" <?php if($user_data['merital_status'] == 'Widow') echo 'selected';?>>Widow</option>
							</select>							
							<span>Select</span>
						</div>
						</td>
					</tr>
					<tr>
						<td valign="">Star Sign (Nakshatram): <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="star_sign" id="star_sign">
								<option value="">Select</option>
								<option value="Aswini" <?php if($user_data['star_sign'] == 'Aswini') echo 'selected';?>>Aswini</option>
								<option value="Bharani" <?php if($user_data['star_sign'] == 'Bharani') echo 'selected';?>>Bharani</option>
								<option value="Karthigai" <?php if($user_data['star_sign'] == 'Karthigai') echo 'selected';?>>Karthigai</option>
								<option value="Rohini" <?php if($user_data['star_sign'] == 'Rohini') echo 'selected';?>>Rohini</option>
								<option value="Mrigasheersham" <?php if($user_data['star_sign'] == 'Mrigasheersham') echo 'selected';?>>Mrigasheersham</option>
								<option value="Thiruvaathirai" <?php if($user_data['star_sign'] == 'Thiruvaathirai') echo 'selected';?>>Thiruvaathirai</option>
								<option value="Punarpoosam" <?php if($user_data['star_sign'] == 'Punarpoosam') echo 'selected';?>>Punarpoosam</option>
								<option value="Poosam" <?php if($user_data['star_sign'] == 'Poosam') echo 'selected';?>>Poosam</option>
								<option value="Aayilyam" <?php if($user_data['star_sign'] == 'Aayilyam') echo 'selected';?>>Aayilyam</option>
								<option value="Makam" <?php if($user_data['star_sign'] == 'Makam') echo 'selected';?>>Makam</option>
								<option value="Pooram" <?php if($user_data['star_sign'] == 'Pooram') echo 'selected';?>>Pooram</option>
								<option value="Uthiram" <?php if($user_data['star_sign'] == 'Uthiram') echo 'selected';?>>Uthiram</option>
								<option value="Hastham" <?php if($user_data['star_sign'] == 'Hastham') echo 'selected';?>>Hastham</option>
								<option value="Chithirai" <?php if($user_data['star_sign'] == 'Chithirai') echo 'selected';?>>Chithirai</option>
								<option value="Swaathi" <?php if($user_data['star_sign'] == 'Swaathi') echo 'selected';?>>Swaathi</option>
								<option value="Visaakam" <?php if($user_data['star_sign'] == 'Visaakam') echo 'selected';?>>Visaakam</option>
								<option value="Anusham" <?php if($user_data['star_sign'] == 'Anusham') echo 'selected';?>>Anusham</option>
								<option value="Kettai" <?php if($user_data['star_sign'] == 'Kettai') echo 'selected';?>>Kettai</option>
								<option value="Moolam" <?php if($user_data['star_sign'] == 'Moolam') echo 'selected';?>>Moolam</option>
								<option value="Pooraadam" <?php if($user_data['star_sign'] == 'Pooraadam') echo 'selected';?>>Pooraadam</option>
								<option value="Uthiraadam" <?php if($user_data['star_sign'] == 'Uthiraadam') echo 'selected';?>>Uthiraadam</option>
								<option value="Thiruvonam" <?php if($user_data['star_sign'] == 'Thiruvonam') echo 'selected';?>>Thiruvonam</option>
								<option value="Avittam" <?php if($user_data['star_sign'] == 'Avittam') echo 'selected';?>>Avittam</option>
								<option value="Chathayam/Sadayam" <?php if($user_data['star_sign'] == 'Chathayam/Sadayam') echo 'selected';?>>Chathayam/Sadayam</option>
								<option value="Poorattathi" <?php if($user_data['star_sign'] == 'Poorattathi') echo 'selected';?>>Poorattathi</option>
								<option value="Uthirattathi" <?php if($user_data['star_sign'] == 'Uthirattathi') echo 'selected';?>>Uthirattathi</option>
								<option value="Revathi" <?php if($user_data['star_sign'] == 'Revathi') echo 'selected';?>>Revathi</option>
							</select>							
							<span>Select</span>
						</div>
						</td>
					</tr>
					<tr>
						<td valign="">Zodiac Sign (Raasi): <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="zodiac_sign" id="zodiac_sign">
								<option value="">--Select--</option>
								<option value="Aries" <?php if($user_data['zodiac_sign'] == 'Aries') echo 'selected';?>>Aries</option>
								<option value="Taurus" <?php if($user_data['zodiac_sign'] == 'Taurus') echo 'selected';?>>Taurus</option>
								<option value="Gemini" <?php if($user_data['zodiac_sign'] == 'Gemini') echo 'selected';?>>Gemini</option>
								<option value="Cancer" <?php if($user_data['zodiac_sign'] == 'Cancer') echo 'selected';?>>Cancer</option>
								<option value="Leo" <?php if($user_data['zodiac_sign'] == 'Leo') echo 'selected';?>>Leo</option>
								<option value="Virgo" <?php if($user_data['zodiac_sign'] == 'Virgo') echo 'selected';?>>Virgo</option>
								<option value="Libra" <?php if($user_data['zodiac_sign'] == 'Libra') echo 'selected';?>>Libra</option>
								<option value="Scorpio" <?php if($user_data['zodiac_sign'] == 'Scorpio') echo 'selected';?>>Scorpio</option>
								<option value="Sagittarius" <?php if($user_data['zodiac_sign'] == 'Sagittarius') echo 'selected';?>>Sagittarius</option>
								<option value="Capricorn" <?php if($user_data['zodiac_sign'] == 'Capricorn') echo 'selected';?>>Capricorn</option>
								<option value="Aquarius" <?php if($user_data['zodiac_sign'] == 'Aquarius') echo 'selected';?>>Aquarius</option>
								<option value="Pisces" <?php if($user_data['zodiac_sign'] == 'Pisces') echo 'selected';?>>Pisces</option>
							</select>							
							<span>Select</span>
						</div>
						</td>
					</tr>
					

					<tr>
						<td valign="">Gotra: <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
							<div class="field-wrap" id="wrap">
								<input name="gotra" id="gotra" value="<?php echo $user_data['gotra'];?>">
								<span></span>
							</div>
						</td>
					</tr>
					<tr>
						<td valign="">Manglik: <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="manglik" id="manglik">
								<option value="No">No</option>
								<option value="Yes" <?php if($user_data['manglik'] == 'Yes') echo 'selected';?>>Yes</option>
							</select>							
							<span>Yes</span>
						</div>
						</td>
					</tr>
					<tr>
			        	<td valign="">Caste: <!-- <span class="gwpm-mandatory">*</span> --></td>
			       		<td valign="top">
			       			<div class="field-wrap" id="wrap">
			       				<input name="caste" id="caste" value="<?php echo $user_data['caste'];?>">
						 	</div>
						</td>
			      	</tr>
				</tbody>
			</table>
		</div>
		<h3 tabindex="-1" aria-expanded="false" aria-selected="false" aria-controls="ui-id-8" id="ui-id-7" role="tab" class="ui-accordion-header ui-state-default ui-corner-all ui-accordion-icons"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
			<a href="#">Education &amp; Work Information</a>
		</h3>
		<div aria-hidden="true" role="tabpanel" aria-labelledby="ui-id-7" id="ui-id-8" style="display: none;" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
			<table class="profile-fields">
				<tbody>
					<tr>
						<td valign="">Qualification: <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="qualification" id="qualification">
								<option value="">--Select--</option>
								<option value="10th - SSLC/CBSE/ICSE" <?php if($user_data['qualification'] == '10th - SSLC/CBSE/ICSE') echo 'selected';?>>10th - SSLC/CBSE/ICSE</option>
								<option value="12th - SSLC/CBSE/ICSE" <?php if($user_data['qualification'] == '12th - SSLC/CBSE/ICSE') echo 'selected';?>>12th - SSLC/CBSE/ICSE</option>
								<option value="Diploma degree" <?php if($user_data['qualification'] == 'Diploma degree') echo 'selected';?>>Diploma degree</option>
								<option value="Bachelors degree" <?php if($user_data['qualification'] == 'Bachelors degree') echo 'selected';?>>Bachelors degree</option>
								<option value="Masters degree" <?php if($user_data['qualification'] == 'Masters degree') echo 'selected';?>>Masters degree</option>
								<option value="PhD / Post Doctoral" <?php if($user_data['qualification'] == 'PhD / Post Doctoral') echo 'selected';?>>PhD / Post Doctoral</option>
								<option value="Others" <?php if($user_data['qualification'] == 'Others') echo 'selected';?>>Others</option>
							</select>							
							<span>Select</span>
						</div>
						</td>
					</tr>
					<tr>
						<td valign="">Specialization / Major: <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
						<div class="field-wrap" id="wrap">
							<input name="specialization" id="specialization" maxlength="200" placeholder="e.g. BE/MBBS/PHD/BCom etc" value="<?php echo $user_data['specialization'];?>">
						</div>
					</td>
					</tr>
					<tr>
						<td valign="">Employement Status: <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="employement_status" id="employement_status">
								<option value="">--Select--</option>
								<option value="Full-time" <?php if($user_data['employement_status'] == 'Full-time') echo 'selected';?>>Full-time</option>
								<option value="Part-time" <?php if($user_data['employement_status'] == 'Part-time') echo 'selected';?>>Part-time</option>
								<option value="Homemaker" <?php if($user_data['employement_status'] == 'Homemaker') echo 'selected';?>>Homemaker</option>
								<option value="Retired" <?php if($user_data['employement_status'] == 'Retired') echo 'selected';?>>Retired</option>
								<option value="Self-employed" <?php if($user_data['employement_status'] == 'Self-employed') echo 'selected';?>>Self-employed</option>
								<option value="Student" <?php if($user_data['employement_status'] == 'Student') echo 'selected';?>>Student</option>
								<option value="Work at home" <?php if($user_data['employement_status'] == 'Work at home') echo 'selected';?>>Work at home</option>
								<option value="Unemployed" <?php if($user_data['employement_status'] == 'Unemployed') echo 'selected';?>>Unemployed</option>
							</select>							
							<span>Select</span>
						</div>
						</td>
					</tr>
					<tr>
						<td valign="">Work Place Information:</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="work_place" id="work_place" maxlength="100"  value="<?php echo $user_data['work_place'];?>"></div></td>
					</tr>
					<tr>
						<td valign="">Designation:</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="designation" id="designation" maxlength="100" value="<?php echo $user_data['designation'];?>"></div></td>
					</tr>
					<tr>
						<td valign="">Annual Income (INR):</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="annual_income" id="annual_income" maxlength="30" value="<?php echo $user_data['annual_income'];?>"></div></td>
					</tr>
				</tbody>
			</table>
		</div>

		<h3 tabindex="-1" aria-expanded="false" aria-selected="false" aria-controls="ui-id-10" id="ui-id-9" role="tab" class="ui-accordion-header ui-state-default ui-corner-all ui-accordion-icons"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
			<a href="#">Physical Apprearance and habbits</a>
		</h3>
		<div aria-hidden="true" role="tabpanel" aria-labelledby="ui-id-9" id="ui-id-10" style="display: none;" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
			<table class="profile-fields">
				<tbody>
					<tr>
						<td valign="">Height:</td>
						<td valign="top">
							<div>
								<div class="field-wrap" id="wrap">
									<input name="height_feet" id="height_feet" maxlength="1"  value="<?php echo $user_data['height_feet'];?>"> Feet
								</div>
								<div class="field-wrap" id="wrap">
									<input name="height_inch" id="height_inch" maxlength="2"  value="<?php echo $user_data['height_inch'];?>"> Inch
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td valign="">Weight (KGS):</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="weight" id="weight" maxlength="5"  value="<?php echo $user_data['weight'];?>"></div></td>
					</tr>

					<tr>
						<td valign="">Diet:</td>
						<td valign="top">
							<div class="select-field" id="wrap">
								<select style="opacity: 0;" name="diet" id="diet">
									<option value="">--Select--</option>
									<option value="Veg" <?php if($user_data['diet'] == 'Veg') echo 'selected';?>>Veg</option>
									<option value="Non-Veg" <?php if($user_data['diet'] == 'Non-Veg') echo 'selected';?>>Non-Veg</option>
									<option value="Egg-only" <?php if($user_data['diet'] == 'Egg-only') echo 'selected';?>>Egg-only</option>
								</select>
								<span>Select</span>
							</div>
						</td>
					</tr>

					<tr>
						<td valign="">Smoking:</td>
						<td valign="top">
							<div class="select-field" id="wrap">
								<select style="opacity: 0;" name="smoke" id="smoke">
									<option value="No">No</option>
									<option value="Yes" <?php if($user_data['smoke'] == 'Yes') echo 'selected';?>>Yes</option>									
								</select>
								<span>Select</span>
							</div>
						</td>
					</tr>

					<tr>
						<td valign="">Drink:</td>
						<td valign="top">
							<div class="select-field" id="wrap">
								<select style="opacity: 0;" name="drink" id="drink">
									<option value="No">No</option>
									<option value="Yes" <?php if($user_data['drink'] == 'Yes') echo 'selected';?>>Yes</option>
								</select>
								<span>Select</span>
							</div>
						</td>
					</tr>

					<tr>
						<td valign="">Skin Complexion:</td>
						<td valign="top">
							<div class="select-field" id="wrap">
								<select style="opacity: 0;" name="complexion" id="complexion">
									<option value="">--Select--</option>
									<option value="Fair" <?php if($user_data['complexion'] == 'Fair') echo 'selected';?>>Fair</option>
									<option value="Wheatish" <?php if($user_data['complexion'] == 'Wheatish') echo 'selected';?>>Wheatish</option>
									<option value="Dark" <?php if($user_data['complexion'] == 'Dark') echo 'selected';?>>Dark</option>
								</select>
								<span>Select</span>
								</div>
						</td>
					</tr>

					<tr>
						<td valign="">Body Type:</td>
						<td valign="top">
							<div class="select-field" id="wrap">
								<select style="opacity: 0;" name="body_type" id="body_type">
									<option value="0">--Select--</option>
									<option value="Slim" <?php if($user_data['body_type'] == 'Slim') echo 'selected';?>>Slim</option>
									<option value="Slender" <?php if($user_data['body_type'] == 'Slender') echo 'selected';?>>Slender</option>
									<option value="Average" <?php if($user_data['body_type'] == 'Average') echo 'selected';?>>Average</option>
									<option value="Fit" <?php if($user_data['body_type'] == 'Fit') echo 'selected';?>>Fit</option>
									<option value="Smart" <?php if($user_data['body_type'] == 'Smart') echo 'selected';?>>Smart</option>
									<option value="Athletic" <?php if($user_data['body_type'] == 'Athletic') echo 'selected';?>>Athletic</option>
									<option value="Muscular" <?php if($user_data['body_type'] == 'Muscular') echo 'selected';?>>Muscular</option>
									<option value="Thick" <?php if($user_data['body_type'] == 'Thick') echo 'selected';?>>Thick</option>
									<option value="Fatty" <?php if($user_data['body_type'] == 'Fatty') echo 'selected';?>>Fatty</option>
									<option value="Voluptuous" <?php if($user_data['body_type'] == 'Voluptuous') echo 'selected';?>>Voluptuous</option>
									<option value="Large" <?php if($user_data['body_type'] == 'Large') echo 'selected';?>>Large</option>
								</select>
								<span>Select</span>
							</div>
						</td>
					</tr>

				</tbody>
			</table>
		</div>

		
		
			
<!-- br-->
		<h3 tabindex="-1" aria-expanded="false" aria-selected="false" aria-controls="ui-id-12" id="ui-id-11" role="tab" class="ui-accordion-header ui-state-default ui-corner-all ui-accordion-icons"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
			<a href="#">I am looking for</a>
		</h3>

		<div aria-hidden="true" role="tabpanel" aria-labelledby="ui-id-11" id="ui-id-12" style="" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">

			<table class="profile-fields">
				<tbody>
					<tr>
						<td valign="">Height:</td>
						<td valign="top">
							<div>
								<div class="field-wrap" id="wrap">
									<input name="p_height_feet" id="p_height_feet" maxlength="1"  value="<?php echo $user_data['p_height_feet'];?>"> Feet
								</div>
								<div class="field-wrap" id="wrap">
									<input name="p_height_inch" id="p_height_inch" maxlength="2"  value="<?php echo $user_data['p_height_inch'];?>"> Inch
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td valign="">Weight (KGS):</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="p_weight" id="p_weight	" maxlength="5"  value="<?php echo $user_data['p_weight'];?>"></div></td>
					</tr>

					<tr>
						<td valign="">Manglik:</td>
						<td valign="top">
							<div class="select-field" id="wrap">
								<select style="opacity: 0;" name="p_manglik" id="p_manglik">
									<option value="No">No</option>
								<option value="Yes" <?php if($user_data['p_manglik'] == 'Yes') echo 'selected';?>>Yes</option>
								</select>
								<span>Select</span>
							</div>
						</td>
					</tr>
					
					<tr>
						<td valign="">Qualification: <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="p_qualification" id="p_qualification">
								<option value="">--Select--</option>
								<option value="10th - SSLC/CBSE/ICSE" <?php if($user_data['p_qualification'] == '10th - SSLC/CBSE/ICSE') echo 'selected';?>>10th - SSLC/CBSE/ICSE</option>
								<option value="12th - SSLC/CBSE/ICSE" <?php if($user_data['p_qualification'] == '12th - SSLC/CBSE/ICSE') echo 'selected';?>>12th - SSLC/CBSE/ICSE</option>
								<option value="Diploma degree" <?php if($user_data['p_qualification'] == 'Diploma degree') echo 'selected';?>>Diploma degree</option>
								<option value="Bachelors degree" <?php if($user_data['p_qualification'] == 'Bachelors degree') echo 'selected';?>>Bachelors degree</option>
								<option value="Masters degree" <?php if($user_data['p_qualification'] == 'Masters degree') echo 'selected';?>>Masters degree</option>
								<option value="PhD / Post Doctoral" <?php if($user_data['p_qualification'] == 'PhD / Post Doctoral') echo 'selected';?>>PhD / Post Doctoral</option>
								<option value="Others" <?php if($user_data['p_qualification'] == 'Others') echo 'selected';?>>Others</option>
							</select>
							<span>Select</span>
						</div>
						</td>
					</tr>

					<tr>
						<td valign="">Employement Status: <!-- <span class="gwpm-mandatory">*</span> --></td>
						<td valign="top">
						<div class="select-field">
							<select style="opacity: 0;" name="p_employement_status" id="p_employement_status">
								<option value="">--Select--</option>
								<option value="Full-time" <?php if($user_data['p_employement_status'] == 'Full-time') echo 'selected';?>>Full-time</option>
								<option value="Part-time" <?php if($user_data['p_employement_status'] == 'Part-time') echo 'selected';?>>Part-time</option>
								<option value="Homemaker" <?php if($user_data['p_employement_status'] == 'Homemaker') echo 'selected';?>>Homemaker</option>
								<option value="Retired" <?php if($user_data['p_employement_status'] == 'Retired') echo 'selected';?>>Retired</option>
								<option value="Self-employed" <?php if($user_data['p_employement_status'] == 'Self-employed') echo 'selected';?>>Self-employed</option>
								<option value="Student" <?php if($user_data['p_employement_status'] == 'Student') echo 'selected';?>>Student</option>
								<option value="Work at home" <?php if($user_data['p_employement_status'] == 'Work at home') echo 'selected';?>>Work at home</option>
								<option value="Unemployed" <?php if($user_data['p_employement_status'] == 'Unemployed') echo 'selected';?>>Unemployed</option>
							</select>							
							<span>Select</span>
						</div>
						</td>
					</tr>
					<tr>
						<td valign="">Work Place Information:</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="p_work_place" id="p_work_place" maxlength="30"  value="<?php echo $user_data['p_work_place'];?>"></div></td>
					</tr>

					<tr>
						<td valign="">Annual Income (INR):</td>
						<td valign="top"><div class="field-wrap" id="wrap"><input name="p_annual_income" id="p_annual_income" maxlength="30"  value="<?php echo $user_data['p_annual_income'];?>"></div></td>
					</tr>

					<tr>
						<td valign="">Diet:</td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="p_diet" id="p_diet">
								<option value="">--Select--</option>
								<option value="Veg" <?php if($user_data['p_diet'] == 'Veg') echo 'selected';?>>Veg</option>
								<option value="Non-Veg" <?php if($user_data['p_diet'] == 'Non-Veg') echo 'selected';?>>Non-Veg</option>
								<option value="Egg-only" <?php if($user_data['p_diet'] == 'Egg-only') echo 'selected';?>>Egg-only</option>
							</select>
							<span>Select</span>
						</div>
						</td>
					</tr>

					<tr>
						<td valign="">Smoking:</td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="p_smoke" id="p_smoke">
								<option value="">--Select--</option>
								<option value="No" <?php if($user_data['p_smoke'] == 'No') echo 'selected';?>>No</option>
								<option value="Yes" <?php if($user_data['p_smoke'] == 'Yes') echo 'selected';?>>Yes</option>	
							</select>
							<span>Select</span>
						</div>
						</td>
					</tr>

					<tr>
						<td valign="">Drink:</td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="p_drink" id="p_drink">
								<option value="">--Select--</option>
								<option value="No" <?php if($user_data['p_drink'] == 'No') echo 'selected';?>>No</option>
								<option value="Yes" <?php if($user_data['p_drink'] == 'Yes') echo 'selected';?>>Yes</option>
							</select>
							<span>Select</span>
						</div>
						</td>
					</tr>

					<tr>
						<td valign="">Skin Complexion:</td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="p_complexion" id="p_complexion">
								<option value="">--Select--</option>
									<option value="Fair" <?php if($user_data['p_complexion'] == 'Fair') echo 'selected';?>>Fair</option>
									<option value="Wheatish" <?php if($user_data['p_complexion'] == 'Wheatish') echo 'selected';?>>Wheatish</option>
									<option value="Dark" <?php if($user_data['p_complexion'] == 'Dark') echo 'selected';?>>Dark</option>
							</select>
							<span>Select</span>
						</div>
						</td>
					</tr>

					<tr>
						<td valign="">Body Type:</td>
						<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="p_body_type" id="p_body_type">
								<option value="0">--Select--</option>
								<option value="Slim" <?php if($user_data['p_body_type'] == 'Slim') echo 'selected';?>>Slim</option>
								<option value="Slender" <?php if($user_data['p_body_type'] == 'Slender') echo 'selected';?>>Slender</option>
								<option value="Average" <?php if($user_data['p_body_type'] == 'Average') echo 'selected';?>>Average</option>
								<option value="Fit" <?php if($user_data['p_body_type'] == 'Fit') echo 'selected';?>>Fit</option>
								<option value="Smart" <?php if($user_data['p_body_type'] == 'Smart') echo 'selected';?>>Smart</option>
								<option value="Athletic" <?php if($user_data['p_body_type'] == 'Athletic') echo 'selected';?>>Athletic</option>
								<option value="Muscular" <?php if($user_data['p_body_type'] == 'Muscular') echo 'selected';?>>Muscular</option>
								<option value="Thick" <?php if($user_data['p_body_type'] == 'Thick') echo 'selected';?>>Thick</option>
								<option value="Fatty" <?php if($user_data['p_body_type'] == 'Fatty') echo 'selected';?>>Fatty</option>
								<option value="Voluptuous" <?php if($user_data['p_body_type'] == 'Voluptuous') echo 'selected';?>>Voluptuous</option>
								<option value="Large" <?php if($user_data['p_body_type'] == 'Large') echo 'selected';?>>Large</option>
							</select>
							<span>Select</span>
						</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<table class="">
		<tbody>
			<tr>
				<td style="padding:5px;">
					<div id="wrap" class="btn_srch">
						<input value="Save" name="update" type="submit" style="margin:0px;">
						<input value="Cancel" onclick="javascript:window.history.back();" class="" name="cancel" type="button" style="margin:0px;">
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="padding:5px;"><span class="red">* - Mandatory Fields</span></td>
			</tr>
		</tbody>
	</table>
</form>
<script type="text/javascript">
             
	 jQuery(document).ready(function() {
		
	
		jQuery("#gwpm_accordion").accordion({ heightStyle: "content", collapsible: true, active: 0 });
		jQuery("select").change(function(obj){ 
			if(obj.currentTarget.id == "qualification" && obj.currentTarget.value == '7') {
				jQuery("#qualification_other").removeClass("gwpm_hidden_fields"); 
				jQuery("#qualification_other").val("") ; 
			} else {
				jQuery("#qualification_other").addClass("gwpm_hidden_fields");
				jQuery("#qualification_other").val("none") ; 
			}
		}) ;
	 });
			  
</script>

 <!-- code for datepicker -->
<script type="text/javascript"
 src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
</script>
<script type="text/javascript"
 src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
</script>
<script type="text/javascript"
 src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
</script>
<script type="text/javascript">
  $('#datetimepicker').datetimepicker({
	format: 'dd/MM/yyyy HH:mm:ss PP',
	language: 'en',
	pick12HourFormat: true
  });
</script>
<!-- end code for datepicker -->

<style>
#gwpm_accordion h3{
	margin-bottom:0px;
}
.ui-accordion .ui-accordion-header a{
	padding: 0.3em 0.5em 0.3em 2.2em;
}
</style></div>


<script type="text/javascript">
	 jQuery(function () 
	  {
		 jQuery("#city").autocomplete({
		   source: function (request, response) {
			jQuery.getJSON(
			  "http://gd.geobytes.com/AutoCompleteCity?callback=?&filter=IN&q="+request.term,
			  function (data) {
			   response(data);
			  }
			);
		   },
		   minLength: 3,
			componentRestrictions: {country: "IN"},
		   select: function (event, ui) {
		   var selectedObj = ui.item;
		   jQuery("#city").val(selectedObj.value);
		   var value=$("#city").val();
			},
			open: function () {
			jQuery(this).removeClass("ui-corner-all").addClass("ui-corner-top");
		   },
		   close: function () {
			jQuery(this).removeClass("ui-corner-top").addClass("ui-corner-all");
		   }
		 });
		   jQuery("#city").autocomplete("option", "delay", 100);
		});
  </script>

  <link rel="stylesheet"  href="<?php echo base_url(); ?>/assets/autocity/jquery-ui.css" type="text/css">
