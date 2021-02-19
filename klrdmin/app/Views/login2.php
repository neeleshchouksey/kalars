<!-- this page is for login -->

<div id="content">
	<form action="" name="login" id="login">
	<table border="0" cellspacing="0" cellpadding="0" class="data-table" style="width:50%;margin:auto;margin-top:100px;">
		  	<tr align="left">
				<th>Domain</th>
				<th>Bandwidth</th>
		  	</tr>
		  	<tr>
				<td width="50%">
					<input name="domain[0]" type="text" size="40" value="https://www.mygov.in" />
				</td>
				<td width="50%">
					<input name="bandwidth[0]" type="text"  size="40"  value="30"/>
				</td>
		  	</tr>
		  	<tr>
				<td width="50%">
					<input name="domain[1]" type="text" size="40" value="https://www.nic.in"/>
				</td>
				<td width="50%">
					<input name="bandwidth[1]" type="text"  size="40"  value="10"/>
				</td>
		  	</tr>
		  	<tr>
				<td width="50%">
					<input name="domain[2]" type="text" size="40"  value="https://www.mudah.my"/>
				</td>
				<td width="50%">
					<input name="bandwidth[2]" type="text" size="40"  value="25"/>
				</td>
		  	</tr>
		  	<tr>
				<td width="50%">
					<input name="domain[3]" type="text"  size="40"  value="https://www.unifi.com.my"/>
				</td>
				<td width="50%">
					<input name="bandwidth[3]" type="text"  size="40"  value="35"/>
				</td>
		  	</tr>
		  	<tr>
				<td width="50%">
					<input name="domain[4]" type="text"  size="40"  value="https://www.usa.gov"/>
				</td>
				<td width="50%">
					<input name="bandwidth[4]" type="text" size="40"  value="25"/>
				</td>
		  	</tr>
		  	<tr>
				<td width="50%">
					<input name="domain[5]" type="text" size="40"  value="https://www.state.gov"/>
				</td>
				<td width="50%">
					<input name="bandwidth[5]" type="text"size="40"  value="40"/>
				</td>
		  	</tr>
		  	<tr>
				<td>&nbsp;</td>
		  	</tr>
		  	<tr>			
				<td>
					<label><input type="button" name="button" id="button" value="Login" class="submit-left" onclick="redirect_to_domain();" /></label>
				</td>
		  	</tr>
	</table>
	</form>
</div>

<script type="text/javascript">
function redirect_to_domain()
{
	data =  $("#login").serialize();
	$.ajax({
			type: "POST",				
			url: site_url + "/home/redirect_to_domain/",
			data: data,
			success: function(data)			
			{
				//alert(data);
				window.open(data, '_blank');
			}
	});
}
</script>