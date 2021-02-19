<!--
	This is a view for admin age-group list.
-->
 
<script type="text/javascript" src="javascript/wtooltip.js"></script>
<script>
	$('#<?php echo $menu;?>').css('color','#81BDDA');
</script>

<div id="content">
	
	<h2 class="left">SMS</h2>
	
	<?php echo form_open('admin/send_sms');?>
	<table border="0" cellspacing="0" cellpadding="0" class="data-table">
		  <tr>
			<th >
				<input type="radio" name="smstype" value="all"/> All
			</th>
			<th >
				<input type="radio" name="smstype" value="profile_incomplete"/> Profile Incomplete
			</th>
			<th >
				<input type="radio" name="smstype" value="download_app"/> Download App
			</th>
			<th >
				<input type="radio" name="smstype" value="all_community"/> All Community
			</th>
		  </tr>
	</table>

    <table border="0" cellspacing="0" cellpadding="0" class="data-table">
		  <tr>
			<th>SMS Body</th>
		  </tr>
		   <tr>
			<td><textarea name="smstext" rows="8" cols="50"></textarea></td>
		  </tr>
		   <tr>
			<td><input type="submit" name="send" value="Send SMS"/></td>
		  </tr>
	</table>
	</form>
	<br />
	<div>Free matrimonial kalars.in app as well: https://play.google.com/store/apps/details?id=com.manifestinfotech.kalars</div>

  

	

</div>


<!--PopUp : Start-->
<div id="popupEdit"></div>
<!--PopUp : End-->