<?php //echo $this->user_data['filter_merital_status'];
//echo '<pre>'; print_r($this->user_data);
//echo $this->session->userdata('user_id');exit;
?>


<!-- <link rel="stylesheet"  href="assets/css/colorbox.css" type="text/css">
<link rel="stylesheet"  href="assets/css/css.css" type="text/css">
<link rel="stylesheet"  href="assets/css/gwpm_style.css" type="text/css"> -->


<!-- code for datepicker -->
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css"  href="assets/css/bootstrap-combined.min.css">
<link rel="stylesheet" type="text/css"  href="assets/css/bootstrap-datetimepicker.min.css">
<!-- end code for datepicker -->

<!-- start age condition-->
<script type="text/javascript" src="assets/autocity/jquery-ui.js"></script>
<link rel="stylesheet"  href="assets/autocity/jquery-ui.css" type="text/css">
<!-- start age condition--->
<!-- code for city autocomplete -->
<script type="text/javascript" src="assets/autocity/jquery-ui.js"></script>

<!-- end code for city autocomplete -->

<link rel="stylesheet" type="text/css"  href="assets/css/ui.accordion.css">
<link rel="stylesheet" type="text/css"  href="assets/css/ui.theme.css">

<script type="text/javascript" src="assets/js/core.js"></script>
<script type="text/javascript" src="assets/js/widget.js"></script>
<script type="text/javascript" src="assets/js/accordion.js"></script>


<div ><h2 >Settings</h2></div>

 

<form name="gwpm-profile-form" action="<?php echo base_url().'/user/select_privacy';?>" method="post" >
	<div role="tablist" class="ui-accordion ui-widget ui-helper-reset" id="gwpm_accordion">
		<h3 tabindex="-1" aria-expanded="false" aria-selected="false" aria-controls="ui-id-4" id="ui-id-3" role="tab" class="ui-accordion-header ui-state-default ui-corner-all ">
			<a >Setting Information</a>
		</h3>
		<div aria-hidden="" role="tabpanel" aria-labelledby="ui-id-3"  style="" class="">
			<table class="profile-fields">
				<tbody>
					<div style=" padding: 10px; ">
						<tr>
							<td valign="top" style="padding-left:10px;">Select Privacy:<span class="">*</span></td>
							<td  style="padding-left:10px;">
								
								<input type="radio" name="rdn_btn" class="rdn_status" value="0" <?php 	if($user_data['interest_privacy']==0)
								{
									echo "checked" ;
								}
								?> 
								 >Public  &nbsp;  &nbsp; &nbsp;
								<input type="radio" name="rdn_btn" class="rdn_status" value="1"
								<?php 	if($user_data['interest_privacy']==1)
								{
									echo "checked" ;
								}
								?> >
								Private
							</td>
						</tr>
					</div>					
				</tbody>
			</table>
		</div> 
	</div>
</form>
	<div style="width: 100%; float: left;border: 1px solid #f3f3f3; ">

	
	

		<div style="width: 75%; float: right;border: 1px solid #f3f3f3; display: none;" class="select_filter">
						
			<table class='' style="left:70%">
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
									<option value="<?php echo $i;?>" <?php if($this->user_data['filter_age_from']==$i) echo 'selected';?>><?php echo $i;?></option>
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
									<option value="<?php echo $i;?>" <?php if($this->user_data['filter_age_to']==$i) echo 'selected';?>><?php echo $i;?></option><?php// echo $i;?>
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
									<option value="Male"
									<?php if($this->user_data['filter_gender']=='Male')
										{ echo "selected" ; } 
									?> >Male</option>
									<option value="Female"
									<?php if($this->user_data['filter_gender']=='Female')
										{ echo "selected" ; } 
									?> >Female</option>
								</select>
					       		<span></span>
							</div>
			       		</td>
		      		</tr>
		      		<tr>
						<td><span class="space">Marital Status:</span></td>
						<td valign="top">
							<div class="select-field" id="wrap">
					       		<select style="opacity: 0;" name="merital_status" id="merital_status">
									<option value="Single"
									<?php if($this->user_data['filter_merital_status']=='Single')
										{ echo "selected" ; } 
									?> >Single</option>
									<option value="Married"
									<?php if($this->user_data['filter_merital_status']=='Married')
										{ echo "selected" ; } 
									?> >Married</option>
									<option value="Divorsed"
									<?php if($this->user_data['filter_merital_status']=='Divorsed')
										{ echo "selected" ; } 
									?> >Divorsed</option>
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
										<option value="No"
										<?php if($this->user_data['filter_manglik']=='No')
										{ echo "selected" ; } 
										?> >No</option>
										<option value="Yes"
										<?php if($this->user_data['filter_manglik']=='Yes')
										{ echo "selected" ; } 
										?> >Yes</option>
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
									<option value="10th - SSLC/CBSE/ICSE"
									<?php if($this->user_data['filter_qualification']=='10th - SSLC/CBSE/ICSE')
									{ echo "selected" ; } 
									?> >10th - SSLC/CBSE/ICSE</option>
									<option value="12th - SSLC/CBSE/ICSE"
									<?php if($this->user_data['filter_qualification']=='12th - SSLC/CBSE/ICSE')
									{ echo "selected" ; } 
									?> >12th - SSLC/CBSE/ICSE</option>
									<option value="Diploma degree"
									<?php if($this->user_data['filter_qualification']=='Diploma degree')
									{ echo "selected" ; } 
									?>  >Diploma degree</option>
									<option value="Bachelors degree"
									<?php if($this->user_data['filter_qualification']=='Bachelors degree')
									{ echo "selected" ; } 
									?>  >Bachelors degree</option>
									<option value="Masters degree"
									<?php if($this->user_data['filter_qualification']=='Masters degree')
									{ echo "selected" ; } 
									?> >Masters degree</option>
									<option value="PhD / Post Doctoral"
								 	<?php if($this->user_data['filter_qualification']=='PhD / Post Doctoral')
									{ echo "selected" ; } 
									?> >PhD / Post Doctoral</option>
									<option value="Others"
									<?php if($this->user_data['filter_qualification']=='Others')
									{ echo "selected" ; } 
									?> >Others</option>
								</select>	
					       		<span></span>
							</div>					
						</td>
					</tr>
					<tr>
						<td><span class="space">Minimum Annual Income:</span></td>
						<td>
							<div >
								<input type="text" name="annual_income" id="annual_income" class="margin-0" value="<?php echo $this->user_data['filter_annual_income']; ?>" />
							</div>
						</td>
					</tr>
					
				</tbody>
			</table>
					<table>
						<tr>
							<td>
								<div  class="btn_srch space"  align="center">
									<button  class="button" style="width:100px; float:right;"  id="save" onclick="filter_user_data()" > Save</button>
								</div>
								<div id="filter_save_message"></div>
							</td>	
						</tr>
					</table>		
<!-- </form> -->
		</div>
	



<script type="text/javascript">
$(document).ready(function(){

		var rdn_val = jQuery('input[type="radio"]:checked').val();
		if(rdn_val==1)
		{
			jQuery(".select_filter").show();
		}
		else
		{
			jQuery(".select_filter").hide();
		}
			
		jQuery('.rdn_status').click(function(){
		var rdn_val = jQuery('input[type="radio"]:checked').val();
		if(rdn_val==1)
		{
			jQuery(".select_filter").show();
		}
		else
		{
			jQuery(".select_filter").hide();
		}
        var url = site_url+'/user/set_interest_privacy';
        $.ajax({
            type   : 'POST',
            url    :  url,
            data   : {rdn_val:rdn_val},
            success: function(data)
            {   
                //location.reload();
            }   
        }); 
	});
});




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