<!--
	This is a view for admin add edit affiliates.
--> 

<?php
if(isset($subcategory))
{
	$subcategory_name	= $subcategory['subcategory_name'];
	$subcategory_desc	= $subcategory['subcategory_desc'];
	$category_id		= $subcategory['category_id'];
	$is_active			= $subcategory['is_active'];
}
else
{
	$subcategory_name	= '';
	$subcategory_desc	= '';
	$category_id		= '';
	$is_active			= '';
}  
?>
  <h2><?php if($category_id) echo 'Edit';else echo 'Add';?> Subcategory</h2>
  <div class="content" >
  <?php echo form_open('admin/saveSubcategory/'.$subcategory_id,'name="form_add_section" enctype="multipart/form-data" onSubmit="return validateSubcategory(); "');?>
  <table border="0" cellspacing="0" cellpadding="0" class="content-table">
  <tr>
    <td>Subcategory Name</td>
  </tr>
  <tr>
    <td><input type="text" class="input-shadow" name="subcategory_name" id="subcategory_name" value="<?php echo $subcategory_name;?>" size="65"/>
	<br /><span class="red" id="e_subcategory_name"></span>
	<br />
	</td>
  </tr>

  <tr>
    <td>Description</td>
  </tr>

  <tr>
	<td>
		<textarea name="subcategory_desc" id="subcategory_desc" class="input-shadow" rows="5" cols="45" ><?php echo $subcategory_desc;?></textarea>
		<br /><span class="red" id="e_subcategory_desc"></span>
		<br />
	</td>
  </tr>	
  
  <tr>
    <td>Select Category</td>
  </tr>
  <tr>
    <td>
	<?php
	$category_options['--Select--'] =  '--Select--';
	foreach($category as $category_row)
	{ 
		$category_options[$category_row['category_id']] =  $category_row['category_name'];
	}

	echo form_dropdown('category_id', $category_options, set_value('category_id', $category_id), 'class="input-shadow" id="category_id"');
	?>
	<br /><span class="red" id="e_category_name"></span>
	</td>
  </tr>

  <tr>
    <td height="12"></td>
    </tr>
  <tr>
    <td>Active</td>
  </tr>
  <tr>
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
	</table>
	<div class="popupbtn">
		<table border="0" cellspacing="0" cellpadding="3">
		  <tr>
			<td><label><input type="submit" name="save" id="save" value="Save" class="submit-left" /></label><label class="submit-right"></label></td>
			<td><strong>Or</strong></td>
			<td><a href="javascript:void(0);" onclick="closePopDiv('popupEdit');">Cancel</a></td>
		  </tr>
		</table>
	</div>
	</form>
</div>