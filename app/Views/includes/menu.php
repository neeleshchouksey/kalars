<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ua = stripos($user_agent, 'android');
?>
<script> var ua = '<?php echo $ua; ?>';</script>
<header class="site-header container">
	<div class="site-logo left">
		<a href="<?php echo base_url();?>" rel="home">
			<div class="logo">Kalars.in</div>
		</a>
	</div>
	<!-- /logo -->
	<div class="header-options">
		<?php
        $session = session();
        $this->user_data = $session->get('user_data');

        if($session->get('user_id')!='' && $session->get('phone_no')!='')
			{
				echo anchor('user/my_profile','My profile','class="button"');
				echo anchor('home/signout','Log out','class="button secondary" onClick="logout();"');
			}
			else
			{
				echo anchor('#','Log In','class="button secondary header-login-button"');
				echo anchor('home/sign_up','Register','class="button"');
			}
			echo anchor('home/contact','Contact us','class="button secondary"');
		?>
	</div>
	<!-- /options -->
	<nav class="header-menu right">
		<div class="menu">
			<ul id="menu-main-menu" class="menu">
				<li id="menu-item-home" class="">
					<?php echo anchor('home','Home');?>
				</li>
				<li id="menu-item-search" class="">
					<?php echo anchor('home/search','Search');?>
				</li>
				<li id="menu-item-brides" class="">
					<?php echo anchor('user/brides','Brides');?>
				</li>
				<li id="menu-item-grooms" class="">
					<?php echo anchor('user/grooms','Grooms');?>
				</li>
				<?php if($session->get('user_id')!='' && $session->get('phone_no')!='')
				{	
				?>
				<li id="menu-item-favorites" class="">
					<?php echo anchor('user/favorites','Favorites');?>
				</li>
				<li id="menu-item-user_interest" class="">
					<?php echo anchor('user/user_interest','Interests');?>
				</li>
				<?php
				}
				?>
				<li id="menu-item-about" class="">
					<?php echo anchor('home/about','About');?>
				</li>
			</ul>
		</div>					
		<div class="mobile-menu hidden">
			<div class="select-field">
				<span>Home</span>
				<select style="opacity: 0;"><option selected="selected" value="<?php echo base_url().'home';?>">Home</option>
					<option value="<?php echo base_url().'home/search';?>">Search</option>
					<option value="<?php echo base_url().'user/brides';?>">Brides</option>
					<option value="<?php echo base_url().'user/grooms';?>">Grooms</option>
					<?php if($session->get('user_id')!='' && $session->get('phone_no')!='')
					{	
					?>
					<option value="<?php echo base_url().'user/favorites';?>">Favorites</option>
					<?php
					}
					?>
					<option value="<?php echo base_url().'home/about';?>">About</option>
				</select>						
			</div>
		</div>					
	</nav>
	<!-- /menu -->				
</header>
<!-- /header -->

<div class="header-form-wrap container">
	<div class="header-form header-login-form clearfix">
		<form class="ajax-form formatted-form" action="#" method="POST">
			<div class="field-wrap">
				<input  id="h_phone_no" name="phone_no" class="static" type="text" placeholder="Phone no">
			</div>
			<div class="field-wrap">
				<input  id="h_password" name="password" class="static" type="password" placeholder="Password">
			</div>
			<div class="white" id="h_error_msg"></div>
			<a href="#" class="button" onclick="header_login();return false;">Log In</a>
			<a href="#" class="secondary header-password-button forget-pwd" title="Password Recovery">
				<span>Forget Password</span>
			</a>
			<input name="user_action" value="login_user" type="hidden">
			<input class="nonce" value="d0df181745" type="hidden">
			<input class="action" value="themex_update_user" type="hidden">
		</form>
	</div>
	<div class="header-form header-password-form clearfix">					
		<form class="ajax-form formatted-form" action="" method="POST">
			<div style="color: white; padding: 0px 0px 9px;">Forget Password</div>
			<div class="field-wrap">
				<input  id="f_phone_no" name="phone_no" placeholder="Phone no" type="text">
			</div>
			<div class="white" id="f_error_msg"></div>
			<a href="javascript:void(0);" class="button submit-button" onclick="forget_password();return false;">Send OTP</a>
			<input name="user_action" value="reset_password" type="hidden">
			<input class="nonce" value="d0df181745" type="hidden">
			<input class="action" value="themex_update_user" type="hidden">
		</form>
	</div>
</div>
<!-- /forms -->

<?php
$uri = current_url(true);
$menu = $uri->getSegment(2);
?>
<script>
menu = '<?php echo $uri->getSegment(2); ?>';
menu = menu == 'search_results'?'search':menu;
if(menu == '')
{
	jQuery('#menu-item-home').addClass('current-menu-item');
}
else
{
	jQuery('#menu-item-'+menu).addClass('current-menu-item');
}

function logout()
{ 
 	if(ua)
 	{
  		window.KalarInterface.userLogout();
 	}
}
function login()
{ 
	if(!err)
	{
		jQuery('#l_error_msg').html('');
	}
	
	err = 0;

	phRegExp = "[^0-9\]";
	var phone_no = jQuery.trim(jQuery('#l_phone_no').val());
	if(!err)
	{
		if(phone_no.length <= 0)
		{ 		
			jQuery('#l_error_msg').html('Please enter phone no');
			err=1;	
		}
		/*else if(phone_no.length > 11 || phone_no.length < 10)
		{ 		
			jQuery('#l_error_msg').html('Please enter valid phone no');
			err=1;	
		}
		else
		{
			charpos = phone_no.search(phRegExp);
			if (charpos >=0)
			{
				jQuery('#l_error_msg').html('Please enter valid phone no');
				err=1;
			}
		}*/
	}

	var password = jQuery.trim(jQuery('#l_password').val());
	if(!err)
	{
		if(password.length <= 0)
		{ 		
			jQuery('#l_error_msg').html('Please enter password');
			err=1;	
		}
	}
	
	if(err == 1)
		return false;
	else
	{
		data = 'phone_no='+phone_no+'&password='+password;
		jQuery.ajax({
			type: "POST",
			url: site_url + "/home/login",
			data: data,
			success: function (data)
			{ 
				obj = JSON.parse(data);
				if (obj.status == "success")
				{ 
					if(obj.user_agent)
					{
						window.KalarInterface.userLogin(parseInt(obj.user_id), parseInt(obj.token));
					}
					
					window.location=site_url + "/user/my_profile";
				}
				else
				{
					jQuery('#l_error_msg').html('Invalid phone no or password');
					err=1;	
				}
			}
		});
	}
}

function header_login()
{ 
	if(!err)
	{
		jQuery('#h_error_msg').html('');
	}
	
	err = 0;

	phRegExp = "[^0-9\]";
	var phone_no = jQuery.trim(jQuery('#h_phone_no').val());
	if(!err)
	{
		if(phone_no.length <= 0)
		{ 		
			jQuery('#h_error_msg').html('Please enter phone no');
			err=1;	
		}
		else if(phone_no.length > 11 || phone_no.length < 10)
		{ 		
			jQuery('#h_error_msg').html('Please enter valid phone no');
			err=1;	
		}
		else
		{
			charpos = phone_no.search(phRegExp);
			if (charpos >=0)
			{
				jQuery('#h_error_msg').html('Please enter valid phone no');
				err=1;
			}
		}
	}

	var password = jQuery.trim(jQuery('#h_password').val());
	if(!err)
	{
		if(password.length <= 0)
		{ 		
			jQuery('#h_error_msg').html('Please enter password');
			err=1;	
		}
	}
	
	if(err == 1)
		return false;
	else
	{
		data = 'phone_no='+phone_no+'&password='+password;
		jQuery.ajax({
			type: "POST",
			url: site_url + "/home/login",
			data: data,
			async:false,
			success: function (data)
			{ 
				obj = JSON.parse(data);
				if (obj.status == "success")
				{ 
					if(obj.user_agent)
					{
						window.KalarInterface.userLogin(parseInt(obj.user_id), parseInt(obj.token));
					}
					
					window.location=site_url + "/user/my_profile";
				}
				else
				{
					jQuery('#h_error_msg').html('Invalid phone no or password');
					err=1;	
				}
			}
		});
	}
}

</script>