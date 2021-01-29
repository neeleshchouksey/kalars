	
<div class="column eightcol">
	<div class="section-title">
		<h1>Registration Success</h1>
	</div>
	<!-- Thank you for registration. Please check your email for email verification. -->
	One Time password has been sent to your mobile no. 
	<br />
	<br />
	<form name="verify-form" action="<?php echo base_url().'/home/success';?>" method="post" >
		Enter OTP: <input type="text" name="token"/>
		<input value="Go" name="Go" type="submit" style="margin:0px;">
	</form>
</div>