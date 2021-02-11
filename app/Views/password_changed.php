	
<div class="column eightcol">
	<?php
	if($success)
	{
	?>
		<div class="section-title">
			<h1>Password changed</h1>
		</div>
		TYour password has been changed now.
		You can now <?php echo anchor('home/sign_up','Login');?> here.
	<?php
	}
	else
	{
	?>
		<div class="section-title">
			<h1>Change password  Failed</h1>
		</div>
		Your OTP is incorrect. Please <?php echo anchor('home/change_password','Try Again');?>.
	<?php
	}
	?>
</div>
