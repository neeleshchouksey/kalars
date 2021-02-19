<!--
	This is a view for admin age-group list.
-->
 
<script type="text/javascript" src="javascript/wtooltip.js"></script>
<script>
	$('#<?php echo $menu;?>').css('color','#81BDDA');
</script>

<div id="content">
	
	<h2 class="left">Notification</h2>
	
	<?php echo form_open('admin/send_notification');?>
	<table border="0" cellspacing="0" cellpadding="0" class="data-table">
		  <tr>
			<th >
				<input type="radio" name="notype" value="all"/> All
			</th>
			<th >
				<input type="radio" name="notype" value="profile_incomplete"/> Profile Incomplete
			</th>
		  </tr>
	</table>

    <table border="0" cellspacing="0" cellpadding="0" class="data-table">
		  <tr>
			<th>Notification</th>
		  </tr>
		   <tr>
			<td><textarea name="notext" rows="8" cols="50"></textarea></td>
		  </tr>
		  <tr>
			<th>Notification Image Url</th>
		  </tr>
		   <tr>
			<td><input type="text" name="noimage" value="" placeholder="Image url" size="50" /></textarea></td>
		  </tr>
		  <tr>
			<th></th>
		  </tr>
		  <tr>
			<td><input type="submit" name="send" value="Send Notification"/></td>
		  </tr>
	</table>
	</form>
	<br />
	<div>Hi, please complete your profile so that people can see your bio data and contact you -  kalars.in</div>
	<div>https://lh3.googleusercontent.com/TVcKTTGGH9AAO5HrddZaiDDJVOqxKXqrxBdqu6Foxo1NgJAZg95EuRHsrrHmlBo6Iw=w300-rw</div>

  

	

</div>


<!--PopUp : Start-->
<div id="popupEdit"></div>
<!--PopUp : End-->