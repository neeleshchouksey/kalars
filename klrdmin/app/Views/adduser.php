<!--
	This is a view for admin age-group list.
-->
 
<script type="text/javascript" src="javascript/wtooltip.js"></script>
<script>
	$('#<?php echo $menu;?>').css('color','#81BDDA');
</script>

<div id="content">
	
	<h2 class="left">Notification</h2>
	
	<?php echo form_open('admin/save_user');?>
    <table border="0" cellspacing="0" cellpadding="0" class="data-table">
	  <tr>
		<th>New User</th>
	  <tr>
		<td><input type="text" name="phone_no" value="" placeholder="Phone No" size="20" /></textarea></td>
	  </tr>
	  
	  <tr>
		<td><input type="submit" name="send" value="Add User"/></td>
	  </tr>
	</table>
	</form>
	
</div>


<!--PopUp : Start-->
<div id="popupEdit"></div>
<!--PopUp : End-->