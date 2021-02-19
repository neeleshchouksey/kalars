<!--
	This is a view for admin age-group list.
-->
 
<script type="text/javascript" src="javascript/wtooltip.js"></script>
<script>
	$('#<?php echo $menu;?>').css('color','#81BDDA');
</script>

<div id="content">
	
	<h2 class="left">Users</h2>
    <a href="<?php echo base_url()?>admin/add_user" class="add-affiliate">Add New User</a><br>
    <div align="right">
    		<form id="search" action="javascript:void(0);" method="post">
			<table>
				<tr>
					<td><input type="text" name="search_item" id="search_item" placeholder="Search by id,name or mob nu..."></td>
					<td><button onclick="return search_by();">Search</button></td>
				</tr>
			</table>
			</form>
	</div>
    <table border="0" cellspacing="0" cellpadding="0" class="data-table" id="tbl_user_list">
		  <tr>
			<th width="10">S.No.</th>
			<th width="20">Status</th>
			<th width="30">Id</th>
			<th width="20">image</th>
			<th width="200">Name</th>
			<th width="80">Phone</th>
			<th width="150">Date</th>
			<th>Options</th>
		  </tr>
		  <tr>
		  <?php foreach($search_info as $value){
?>

		  	<td><?php echo $value['name']; ?></td>
		  	<?php
		  	} ?>
		  </tr>
	</table>
	<br />
	<!-- <button onclick="users_list('<?php echo $order_by;?>');">Load More</button> -->
</div>


<!--PopUp : Start-->
<div id="popupEdit"></div>
<!--PopUp : End-->
<!-- <script type="text/javascript">
function search_by()
{
	var dataString = $("#search").serialize();
	// alert(dataString); return false;	
	$.ajax({
	    	type: "POST",
	    	data: dataString,
	        url: site_url+"admin/search_bar",
	        success: function (data) {
	        	if(data == 'success')
	        	{ 
	               	// $("#success9").attr('class', 'green');
	               	// $("#success9").html('Assign leave applied successfully');
	   				// setTimeout(function(){location.reload();},2000);
	            }
	            else
	            {
	            	$("#success9").attr('class', 'red');
	            	$("#success9").html(data);		
	            }
	        }
	    });
	    return false;
	// alert(dataString); return false;
}
</script> -->

<script type="text/javascript">
	//users_list('<?php echo $order_by;?>');
</script>
