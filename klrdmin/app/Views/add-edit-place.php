<!--
	This is a view for admin age-group list.
-->
 
<script>
	$('#affiliates').css('color','#81BDDA');
</script>

<?php //echo '<pre>';print_r($place_img);exit;
if(isset($place))
{
	$place_name			= $place['place_name'];
	$site_link			= $place['site_link'];
	$address			= $place['address'];
	$contact1			= $place['contact1'];
	$contact2			= $place['contact2'];
	$place_desc			= $place['place_desc'];
	$detail_desc		= $place['detail_desc'];
	$category_id		= $place['category_id'];
	$subcategory_id		= $place['subcategory_id'];
	$place_img_name		= $place['place_img_name'];
	$is_active			= $place['is_active'];
}
else
{
	$place_name			= '';
	$site_link			= '';
	$address			= '';
	$contact1			= '';
	$contact2			= '';
	$place_desc			= '';
	$detail_desc		= '';
	$category_id		= '';
	$subcategory_id		= '';
	$place_img_name		= '';
	$is_active			= '';
}  
$count = 1;
?>

<div id="content">
	
	<h2 class="left"><?php if($place_id) echo 'Edit';else echo 'Add';?> Place</h2>
	<?php echo form_open('admin/savePlace/'.$place_id,'name="form_add_section" enctype="multipart/form-data" onSubmit="return validatePlace(); "');?>
    <table border="0" cellspacing="0" cellpadding="0" class="data-table">
		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"';?>>
			<th colspan="2"><?php if($place_id) echo 'Edit';else echo 'Add';?> Place	</th>
		  </tr>
		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td width="20%">Place Name</td>
			<td><input type="text" class="input-shadow" name="place_name" id="place_name" value="<?php echo $place_name;?>" size="65"/>
			<br /><span class="red" id="e_place_name"></span>
			<br />
			</td>
		  </tr>

		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td width="20%">Site Link</td>
			<td><input type="text" class="input-shadow" name="site_link" id="site_link" value="<?php echo $site_link;?>" size="65"/>
			<br /><span class="red" id="e_site_link"></span>
			<br />
			</td>
		  </tr>

		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td width="20%">Address</td>
			<td><input type="text" class="input-shadow" name="address" id="address" value="<?php echo $address;?>" size="65"/>
			<br /><span class="red" id="e_address"></span>
			<br />
			</td>
		  </tr>

		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td width="20%">Contact Number</td>
			<td>1. <input type="text" class="input-shadow" name="contact1" id="contact1" value="<?php echo $contact1;?>" size="65"/>
			<br /><span class="red" id="e_contact1"></span>
			<br />
			2. <input type="text" class="input-shadow" name="contact2" id="contact2" value="<?php echo $place_name;?>" size="65"/>
			<br /><span class="red" id="e_contact2"></span>
			</td>
		  </tr>

		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td width="20%">Description</td>
			<td>
				<textarea name="place_desc" id="place_desc" class="input-shadow" rows="5" cols="45" ><?php echo $place_desc;?></textarea>
				<br /><span class="red" id="e_place_desc"></span>
				<br />
			</td>
		  </tr>	
		  
		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td width="20%">Detail Description</td>
			<td>
				<textarea name="detail_desc" id="detail_desc" class="input-shadow" rows="5" cols="45" ><?php echo $detail_desc;?></textarea>
				<br /><span class="red" id="e_detail_desc"></span>
				<br />
			</td>
		  </tr>	
		  
		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td>Select Category</td>
			<td>
			<?php
			$category_options['--Select--'] =  '--Select--';
			foreach($category as $category_row)
			{ 
				$category_options[$category_row['category_id']] =  $category_row['category_name'];
			}

			echo form_dropdown('category_id', $category_options, set_value('category_id', $category_id), 'class="input-shadow" id="category" onChange="getSubcategory(this.value);"');
			?>
			<br /><span class="red" id="e_category"></span>
			</td>
		  </tr>

		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td>Select Subcategory</td>
			<td>
			<div id="subcategory-div">
			<?php
			$subcategory_options['--Select--'] =  '--Select--';
			if(isset($place))
			{
				foreach($subcategory as $subcategory_row)
				{ 
					$subcategory_options[$subcategory_row['subcategory_id']] =  $subcategory_row['subcategory_name'];
				}
			}
			echo form_dropdown('subcategory_id', $subcategory_options, set_value('subcategory_id', $subcategory_id), 'class="input-shadow" id="getsubcategory"');
			?>
			</div>
			<span class="red" id="e_subcategory"></span>
			</td>
		  </tr>

		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td>Select Logo Image</td>
			<td>
			<?php //echo '<pre>';print_r($place_img);exit;
			for($i=0;$i<4;$i++)
			{
			?>
				<input name="is_default" type="radio" value="<?php echo $i;?>" class="mar0" <?php echo set_radio('is_default', '$i', $place_img[$i]['is_default']); ?>/>

				<?php 
				if(isset($place))
				{
					 if($place_img[$i]['place_img_name'] != "")
					 {	
						echo image_thumb('../images/place_images/'.$place_img[$i]['place_img_name'],20,20,4,$place_img[$i]['place_img_name']); 
					 }
				?>
					<input type="hidden" name="logo_path<?php echo $i;?>" id="logo_path<?php echo $i;?>" value="<?php echo $place_img[$i]['place_img_name'];?>"/>
					<input type="hidden" name="img_id<?php echo $i;?>" id="img_id<?php echo $i;?>" value="<?php echo $place_img[$i]['place_img_id'];?>"/>

				<?php
				}	
				?>
				<input type="file" id="place_img<?php echo $i;?>" name="place_img<?php echo $i;?>" class="input-shadow" />
				&nbsp;<span class="red" id="e_place_img<?php echo $i;?>"></span>
				<br />
			<?php
			}
			?>
			&nbsp;Size: 2mb, Format: gif | jpg | png
			</td>
		  </tr>
		 

		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td>Active</td>
			<td><table border="0" cellspacing="0" cellpadding="0" class="nopadtable">
			  <tr>
				<td width="18">
					<input name="is_active" type="radio" value="1" class="mar0" <?php echo set_radio('is_active', '1', TRUE); ?>/>
				</td>
				<td width="40" valign="middle" class="black font11">Yes</td>
				<td width="18">
					<input name="is_active" type="radio" value="0" class="mar0" <?php echo set_radio('is_active', '0', !$is_active); ?>/>
				</td>
				<td valign="middle" class="black font11">No</td>
			  </tr>
			</table></td>
		  </tr>
		  
		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"'; $count++;?>>
			<td colspan="2">
			<table border="0" cellspacing="0" cellpadding="3">
			  <tr>
				<td><label><input type="submit" name="save" id="save" value="Save" class="submit-left" /></label><label class="submit-right"></label></td>
				<td><strong>Or</strong></td>
				<td>
				<?php echo anchor('admin/place','Cancel','class="add-affiliate"');?>
				</td>
			  </tr>
			</table>
			</td>
		  </tr>
	</table>
	</form>
</div>
