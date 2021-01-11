err = 0;
function register_user()
{ 
	if(!err)
	{
		jQuery('#r_error_msg').html('');
	}
	
	err = 0;
	strRegExp = "[^A-Za-z0-9\]";
	charRegExp ="[^A-Za-z \\s]";
	
	var name = jQuery.trim(jQuery('#name').val());
	if(name.length <= 0)
	{ 		
		jQuery('#r_error_msg').html('Please enter your name');
		err=1;	
	}
	else
	{
		charpos = name.search(charRegExp);
		if (charpos >=0)
		{
			jQuery('#r_error_msg').html('Name must be character only.');
			err=1;
		}
	}

	var last_name = jQuery.trim(jQuery('#last_name').val());
	if(!err)
	{ 
		if(last_name.length <= 0)
		{ 		
			jQuery('#r_error_msg').html('Please enter your last name');
			err=1;	
		}
		else
		{
			charpos = last_name.search(charRegExp);
			if (charpos >=0)
			{
				jQuery('#r_error_msg').html('Last_name must be character only.');
				err=1;
			}
		}
	}
	
	phRegExp = "[^0-9\]";
	var phone_no = jQuery.trim(jQuery('#phone_no').val());
	if(!err)
	{
		if(phone_no.length <= 0)
		{ 		
			jQuery('#r_error_msg').html('Please enter phone no');
			err=1;	
		}
		else if(phone_no.length > 11 || phone_no.length < 10)
		{ 		
			jQuery('#r_error_msg').html('Please enter valid phone no');
			err=1;	
		}
		else
		{
			charpos = phone_no.search(phRegExp);
			if (charpos >=0)
			{
				jQuery('#r_error_msg').html('Please enter valid phone no');
				err=1;
			}
		}
	}

	var password = jQuery.trim(jQuery('#password').val());
	if(!err)
	{
		if(password.length <= 0)
		{ 		
			jQuery('#r_error_msg').html('Please enter password');
			err=1;	
		}
	}

	var gender = jQuery.trim(jQuery('#gender').val()); 
	
	if(err == 1)
		return false;
	else
	{
		data = 'name='+name+'&last_name='+last_name+'&phone_no='+phone_no+'&password='+password+'&gender='+gender;
		jQuery.ajax({
			type: "POST",
			url: site_url + "home/register_user",
			data: data,
			success: function (data){ 
				if (data == "error")
				{ 
					jQuery('#r_error_msg').html('Please enter all information');
					err=1;	
				}
				else if (data == "exist")
				{ 
					jQuery('#r_error_msg').html('This phone no is already registered');
					err=1;	
				}
				else
				{
					window.location=site_url + "home/verify_no";
				}
			}
		});
	}
}

function forget_password()
{ 
	if(!err)
	{
		jQuery('#f_error_msg').html('');
	}
	
	err = 0;

	phRegExp = "[^0-9\]";
	var phone_no = jQuery.trim(jQuery('#f_phone_no').val());
	if(!err)
	{
		if(phone_no.length <= 0)
		{ 		
			jQuery('#f_error_msg').html('Please enter phone no');
			err=1;	
		}
		else if(phone_no.length > 11 || phone_no.length < 10)
		{ 		
			jQuery('#f_error_msg').html('Please enter valid phone no');
			err=1;	
		}
		else
		{
			charpos = phone_no.search(phRegExp);
			if (charpos >=0)
			{
				jQuery('#f_error_msg').html('Please enter valid phone no');
				err=1;
			}
		}
	}

	if(err == 1)
		return false;
	else
	{
		data = 'phone_no='+phone_no;
		jQuery.ajax({
			type: "POST",
			url: site_url + "home/forget_password",
			data: data,
			success: function (data)
			{ 
				if (data == "fail")
				{ 
					jQuery('#f_error_msg').html('Invalid phone no');
					err=1;	
				}
				else if(data == "forget_success")
				{
					window.location=site_url + "home/change_password";
				}
			}
		});
	}
}

function markfavorites(favorite_user_id)
{ 
	data = 'favorite_user_id='+favorite_user_id;
	jQuery.ajax({
		type: "POST",
		url: site_url + "user/markfavorites",
		data: data,
		success: function (data)
		{ 
			if (data == "1")
			{ 
				jQuery('#favorite-'+favorite_user_id).addClass('favorite');
			}
			else
			{
				jQuery('#favorite-'+favorite_user_id).removeClass('favorite');
			}
		}
	});
}

function search_by_id()
{ 
	alert('in');return;
	window.location.href = site_url+'user/profile/'+jQuery('#search_by_id').val(); 
	alert('in');
	phRegExp = "[^0-9\]";
	user_id = jQuery('#search_by_id').val();
	charpos = user_id.search(phRegExp);
	if (charpos >=0)
	{alert('in');
		//jQuery('#h_error_msg').html('Please enter valid phone no');
		//err=1;
		return false;
	}
	window.location.href = site_url+'user/profile/'+user_id; 
}




//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++





function cancelTo(page)
{
	window.location = site_url+page;
}


err1=0	;
function checkUserValidation(User_id)
{ 
	jQuery('#e_uname').html('');
	strRegExp = "[^A-Za-z0-9\]";
	var uname = jQuery.trim(jQuery('#uname').val());
	if(uname.length >= 4)
	{
		charpos = uname.search(strRegExp);
		if (charpos >=0)
		{
			jQuery('#e_uname').html('Username should be alpha-numeric only.');
			err1=1;
		}
		else
		{
			jQuery("#e_uname").html('');
			jQuery("#e_uname").html('<img src="images/loader.gif" align="absmiddle">&nbsp;Checking availability...');
			data = 'uname='+uname;
			jQuery.ajax({			
				type: "POST",
				url: site_url + "listing/checkUser/"+User_id,
				data: data,
				success: function(data)			
				{ 
					if(data == 'user'){
						jQuery("#e_uname").html('Username already exist');		
						err1=1;
					}
					else{
						jQuery("#e_uname").html('');
						err1=0;
					}
				}
			});
		}
	}
	else
	{
		jQuery("#e_uname").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
		err1=1;
	}
}

/*function checkEmailValidation(User_id)
{
	jQuery('#e_email').html('');
	var email = jQuery.trim(jQuery('#email').val());
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	
	if(email.length <=0)
	{ 		
		jQuery('#e_email').html('Please enter email.');
		err2=1;
	}
	else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	{
		jQuery('#e_email').html("Please enter a valid email.");
		err2=1;
	}
	else
	{
		jQuery("#e_email").html('<img src="images/loader.gif" align="absmiddle">&nbsp;Checking availability...');
		data = 'email='+email;
		jQuery.ajax({
				type: "POST",				
				url: site_url + "listing/checkUser/"+User_id,
				data: data,
				success: function(data)			
				{
					if(data == 'email'){
						jQuery("#e_email").html('Email already exist');
						err2=1;		
					}
					else{
						jQuery("#e_email").html('');
						err2=0;
					}
				}
		});
	}
}*/


function checkEmailValidation(User_id)
{
	jQuery('#e_email').html('');
	var email = jQuery.trim(jQuery('#email').val());
	var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?jQuery/);
	
	if(email.length <=0)
	{ 		
		jQuery('#e_email').html('Please enter email.');
		err2=1;
	}
	else if (!pattern.test(email))
	{
		jQuery('#e_email').html("Please enter a valid email.");
		err2=1;
	}
	else
	{
		jQuery("#e_email").html('<img src="images/loader.gif" align="absmiddle">&nbsp;Checking availability...');
		data = 'email='+email;
		jQuery.ajax({
				type: "POST",				
				url: site_url + "listing/checkUser/"+User_id,
				data: data,
				success: function(data)			
				{
					if(data == 'email'){
						jQuery("#e_email").html('Email already exist');
						err2=1;		
					}
					else{
						jQuery("#e_email").html('');
						err2=0;
					}
				}
		});
	}
}

function deleteUser(User_id)
{
	var confirmation = confirm("Are you sure you want to delete this user.")
	if(confirmation)
	{ 
		data = 'User_id='+User_id;
		jQuery.ajax({
			type: "POST",
			url: site_url + "listing/deleteUser",
			data: data,
			success: function (data) {
				if(data == '1')
				{
					jQuery("#user_"+User_id).remove();
				}
				else {
					alert('Some error occured during delete.');
				}
			}
		});
		//window.location =site_url+'listing/deleteRecord/'+table+"/"+id+"/"+redirect;
	}
	return false;
}

function interest_send(interest_user_id)
{
	data = 'interest_user_id='+interest_user_id;
	
	jQuery.ajax({
		type: "POST",
		url: site_url + "/user/interest_send",
		data: data,
		success: function (data)
		{ 
			location.reload();
		}
	});	
}

function interest(interest_user_id)
{
	data = 'interest_user_id='+interest_user_id;

	jQuery.ajax({
		type: "POST",
		url: site_url + "/user/user_interest",
		data: data,
		success: function (data)
		{ 
			location.reload();
		}
	});	
}

function accept_interest(accept_user_id)
{
	data = 'accept_id='+accept_user_id;
	
	jQuery.ajax({
		type: "POST",
		url: site_url + "/user/accept_interest",
		data: data,
		success: function (data)
		{ 
			location.reload();
		}
	});
}

function archive_interest(archive_user_id)
{
	
	data = 'archive_id='+archive_user_id;
	
	jQuery.ajax({
		type: "POST",
		url: site_url + "/user/archive_interest",
		data: data,
		success: function (data)
		{ 
			location.reload();
		}
	});
}

function accept_interest_list()
{	
	
	jQuery.ajax({
		type: "POST",
		url: site_url + "/user/accept_interest_list",
		success: function (data)
		{ 
			jQuery('#interest_user_list').html(data);
		}
	});
}

function archive_interest_list()
{
	jQuery.ajax({
		type: "POST",
		url: site_url + "/user/archive_interest_list",
		success: function (data)
		{ 
			jQuery('#interest_user_list').html(data);
		}
	});
}

function filter_user_data()
{	
	var age_from = jQuery('#age_from').val();
	var age_to = jQuery('#age_to').val();
	var gender = jQuery('#gender').val();
	var merital_status = jQuery('#merital_status').val();
	var manglik = jQuery('#manglik').val();
	var qualification = jQuery('#qualification').val();
	var annual_income = jQuery('#annual_income').val();
	
	jQuery.ajax({
		type: "POST",
		url: site_url + "/user/filter_record",
		data: { age_from:age_from, age_to:age_to, gender:gender,  merital_status:merital_status, manglik:manglik, qualification:qualification, annual_income:annual_income },
		//data:  'age_from='+age_from+'age_to='+age_to+'merital_status='+merital_status+'manglik='+manglik+'qualification='+qualification+'annual_income='+annual_income,
		success: function (data)
		{ 
			if(data ==1)
			jQuery('#filter_save_message').html('<center><b>Save Records...</b><center>');
		}
	});
}