<!--
	This is a view for admin add edit affiliates.
--> 

<?php
if(isset($category))
{
	$category_name = $category['category_name'];
	$is_active = $category['is_active'];
}
else
{
	$category_name = '';
	$is_active = '';
}  
?>
  <h2><?php if($category_id) echo 'Edit';else echo 'Add';?> Category</h2>
  <div class="content" >
  <?php echo form_open('admin/saveCategory/'.$category_id,'name="form_add_department" enctype="multipart/form-data" onSubmit="return validateDepartment(); "');?>
  <table border="0" cellspacing="0" cellpadding="0" class="content-table">
  <tr>
    <td>Category Name</td>
  </tr>
  <tr>
    <td><input type="text" class="input-shadow" name="category_name" id="category_name" value="<?php echo $category_name;?>" size="65"/>
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