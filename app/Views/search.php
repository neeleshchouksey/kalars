<!-- code for city autocomplete -->
<script type="text/javascript" src="assets/autocity/jquery-ui.js"></script>
<link rel="stylesheet"  href="assets/autocity/jquery-ui.css" type="text/css">
<!-- end code for city autocomplete -->

<h2>Advanced Search</h2>

<form name="search_form" action="<?php echo base_url().'home/search_results';?>"method="POST" class="adv_search_form">
	<table class=''>
		<tbody>
			<tr>
				<td><span class="space">Age from:</span></td>
				<td valign="top">
					<div class="select-field" >
						<span></span>
						<select id="age_from" name="age_from" style="opacity: 0;">
						<?php for($i=18;$i<=60;$i++)
						{
						?>
							<option value="<?php echo $i;?>" <?php if($i==18) echo 'selected';?>><?php echo $i;?></option>
						<?php
						}
						?>
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<td><span class="space">Age to:</span></td>
				<td valign="top">
					<div class="select-field" >
						<span>35</span>
						<select id="age_to" name="age_to" style="opacity: 0;">
						<?php for($i=18;$i<=60;$i++)
						{
						?>
							<option value="<?php echo $i;?>" <?php if($i==35) echo 'selected';?>><?php echo $i;?></option>
						<?php
						}
						?>
						</select>
					</div>
				</td>
			</tr> 

			<tr>
	        	<td><span class="space">Looking for:</span></td>
	       		<td>
					<div class="select-field" id="wrap">
			       		<select style="opacity: 0;" id="gender" name="gender">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
			       		<span></span>
					</div>
	       		</td>
      		</tr>
			<tr>
				<td><span class="space">City:</span></td>
				<td>
					<div >
						<input name="city" id="city" class="margin-0"/>
					</div>
				</td>
			</tr>
      		<tr>
				<td><span class="space">Marital Status:</span></td>
				<td valign="top">
					<div class="select-field" id="wrap">
			       		<select style="opacity: 0;" name="merital_status" id="merital_status">
							<option value="Single" >Single</option>
							<option value="Married">Married</option>
							<option value="Divorsed">Divorsed</option>
						</select>	
			       		<span></span>
					</div>					
				</td>
			</tr>
			<tr>
				<td><span class="space">Star Sign (Nakshatram):</span></td>
				<td valign="top">
					<div class="select-field" id="wrap">
			       		<select style="opacity: 0;" name="star_sign" id="star_sign">
							<option value="">--Select--</option>
							<option value="1">Aswini</option>
							<option value="Bharani">Bharani</option>
							<option value="Karthigai">Karthigai</option>
							<option value="Rohini">Rohini</option>
							<option value="Mrigasheersham">Mrigasheersham</option>
							<option value="Thiruvaathirai">Thiruvaathirai</option>
							<option value="Punarpoosam">Punarpoosam</option>
							<option value="Poosam">Poosam</option>
							<option value="Aayilyam">Aayilyam</option>
							<option value="Makam">Makam</option>
							<option value="Pooram">Pooram</option>
							<option value="Uthiram">Uthiram</option>
							<option value="Hastham">Hastham</option>
							<option value="Chithirai">Chithirai</option>
							<option value="Swaathi">Swaathi</option>
							<option value="Visaakam">Visaakam</option>
							<option value="Anusham">Anusham</option>
							<option value="Kettai">Kettai</option>
							<option value="Moolam">Moolam</option>
							<option value="Pooraadam">Pooraadam</option>
							<option value="Uthiraadam">Uthiraadam</option>
							<option value="Thiruvonam">Thiruvonam</option>
							<option value="Avittam">Avittam</option>
							<option value="Chathayam/Sadayam">Chathayam/Sadayam</option>
							<option value="Poorattathi">Poorattathi</option>
							<option value="Uthirattathi">Uthirattathi</option>
							<option value="Revathi">Revathi</option>
						</select>
			       		<span></span>
					</div>
				</td>
			</tr>
			<tr>
				<td><span class="space">Zodiac Sign (Raasi):</span></td>
				<td valign="top">
					<div class="select-field" id="wrap">
			       		<select style="opacity: 0;" name="zodiac_sign" id="zodiac_sign">
							<option value="">--Select--</option>
							<option value="Aries">Aries</option>
							<option value="Taurus">Taurus</option>
							<option value="Gemini">Gemini</option>
							<option value="Cancer">Cancer</option>
							<option value="Leo">Leo</option>
							<option value="Virgo">Virgo</option>
							<option value="Libra">Libra</option>
							<option value="Scorpio">Scorpio</option>
							<option value="Sagittarius">Sagittarius</option>
							<option value="Capricorn">Capricorn</option>
							<option value="Aquarius">Aquarius</option>
							<option value="Pisces">Pisces</option>
						</select>						
			       		<span></span>
					</div>					
				</td>
			</tr>
			<tr>
				<td><span class="space">Manglik:</span></td>
				<td valign="top">
					<div class="select-field" id="wrap">
			       		<select style="opacity: 0;" name="manglik" id="manglik">
								<option value="No">No</option>
								<option value="Yes">Yes</option>
							</select>	
			       		<span></span>
					</div>
				</td>
			</tr>
			<tr>
				<td><span class="space">Qualification:</span></td>
				<td valign="top">
					<div class="select-field" id="wrap">
			       		<select style="opacity: 0;" name="qualification" id="qualification">
							<option value="">--Select--</option>
							<option value="10th - SSLC/CBSE/ICSE">10th - SSLC/CBSE/ICSE</option>
							<option value="12th - SSLC/CBSE/ICSE">12th - SSLC/CBSE/ICSE</option>
							<option value="Diploma degree">Diploma degree</option>
							<option value="Bachelors degree">Bachelors degree</option>
							<option value="Masters degree">Masters degree</option>
							<option value="PhD / Post Doctoral">PhD / Post Doctoral</option>
							<option value="Others">Others</option>
						</select>	
			       		<span></span>
					</div>					
				</td>
			</tr>
			<tr>
				<td><span class="space">Employment:</span></td>
				<td valign="top">
					<div class="select-field" id="wrap">
						<select style="opacity: 0;" name="employement_status" id="employement_status" class="space">
							<option value="">--Select--</option>
							<option value="Full-time">Full-time</option>
							<option value="Part-time">Part-time</option>
							<option value="Homemaker">Homemaker</option>
							<option value="Retired">Retired</option>
							<option value="Self-employed">Self-employed</option>
							<option value="Student">Student</option>
							<option value="Work at home">Work at home</option>
							<option value="Unemployed">Unemployed</option>
						</select>	
						<span></span>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<table class=''>
			<tbody>
				<tr>
					<td>
						<div id="wrap" class="btn_srch space"  align="center">
							<button type="submit" value="Search" class="button medium submit-button" style="width:100%" name="search" id="search"> <span class="button-icon icon-search "></span>Search</button>
						</div>
					</td>
				</tr>
			</tbody>
	</table>
</form>


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

