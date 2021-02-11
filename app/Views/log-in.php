<?php echo view('includes/login-message'); ?>

<div class="column twelvecol last">
	<div class="section-title">
		<h1>Log In</h1>
	</div>
</div>
<div class="column fourcol last">
	<form class="ajax-form formatted-form" action="#" method="POST">
		<div class="message"></div>
		<div class="field-wrap">
			<input  id="l_phone_no" name="phone_no" placeholder="Phone no" type="text">
		</div>
		<div class="field-wrap">
			<input  id="l_password" name="password" placeholder="Password" type="password">
		</div>
		<div class="red" id="l_error_msg"></div>
		<a href="javascript:void(0);" class="button" onclick="login();">Sign In</a>
		<div class="loader"></div>
	</form>
</div>