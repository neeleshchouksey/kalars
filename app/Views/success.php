	
<div class="column eightcol">
	<?php
	if($success)
	{
	?>
		<div class="section-title">
			<h1>Verification Success</h1>
		</div>
		Thank you for verification. Your account has been activated now.
		You can now <?php echo anchor('home/sign_up','Login');?> here.
	<?php
	}
	else
	{
	?>
		<div class="section-title">
			<h1>Verification Failed</h1>
		</div>
		Your OTP is incorrect. Please <?php echo anchor('home/verify_no','Try Again');?>.
	<?php
	}
	?>
</div>
