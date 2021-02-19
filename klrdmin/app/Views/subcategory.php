<!--
	This is a view for admin age-group list.
-->
 
<script type="text/javascript" src="javascript/wtooltip.js"></script>
<script>
	$('#subcategory').css('color','#81BDDA');
</script>

<div id="content">
	
	<h2 class="left">Subcategory</h2>
    <a href="javascript:void(0);" class="add-affiliate" onclick="addEditSubcategory('');openPopDiv('popupEdit');">Add Subcategory</a>
	<table border="0" cellspacing="0" cellpadding="0" class="data-table">
		<tr>
			<th >
			<?php
			$category_options[0] =  '-- Search by category --';
			foreach($category as $category_row)
			{ 
				$category_options[$category_row['category_id']] =  $category_row['category_name'];
			}

			echo form_dropdown('category_id', $category_options, set_value('category_id', $category_id), 'class="input-shadow" id="category_id" onChange="filterSubcategory(this.value);"');
			?>
			</th>
		</tr>
	</table>
    <table border="0" cellspacing="0" cellpadding="0" class="data-table">
		  <tr>
			<th width="10">S.No.</th>
			<th width="20">Status</th>
			<th width="250">First Name</th>
			<th>Options</th>
		  </tr>
		  <?php //echo '<pre>';print_r($subcategory);exit;
			if(count($subcategory)>0)
			{
				$count = $start;
				foreach($subcategory as $subcategory_row)
				{
					$count++;
		  ?>
		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"';?>>
			<td><?php echo $count;?></td>
			<td>
				<span id="status<?php echo $subcategory_row['subcategory_id'];?>" onMouseover="tooltip('subcategory','<?php echo $subcategory_row['subcategory_id'];?>')">
				<?php 
				if($subcategory_row['is_active']) 
				{
				?>
					<span style="cursor:pointer;" onClick="changeStatus('subcategory',0,'<?php echo $subcategory_row['subcategory_id'];?>')">
						<img src="images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="changeStatus('subcategory',1,'<?php echo $subcategory_row['subcategory_id'];?>')">
						<img src="images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td><?php echo $subcategory_row['subcategory_name']; ?></td>
			<td> 
				<a href="javascript:void(0);" class="pencil" onclick="addEditSubcategory('<?php echo $subcategory_row['subcategory_id'];?>');openPopDiv('popupEdit');">
				<a href="javascript:void(0);" onClick="deleteRecord('subcategory','<?php echo $subcategory_row['subcategory_id'];?>','this subcategory','subcategory');" class="delete"></a>
			</td>
		  </tr>
		  <script type="text/javascript">
						$(function(){
							$("#status<?php echo $subcategory_row['subcategory_id'];?>").wTooltip({
								ajax: site_url + "admin/callback_StatusToolTip/subcategory/<?php echo $subcategory_row['subcategory_id'];?>",
								fadeIn:100,
								offsetY: 20,
								id: 'tip<?php echo $subcategory_row['subcategory_id'];?>',
								style: {border: "1px solid gray", padding: "1px"},
								fadeOut:200			   
						   });
						});
			</script>
		  <?php
				}
			}
			else
			{
				echo '<tr><td colspan="4">No Subcategory found</td></tr>';
			}
		  ?>
	</table>
	<br />
  

	

</div>


<!--PopUp : Start-->
<div id="popupEdit"></div>
<!--PopUp : End-->