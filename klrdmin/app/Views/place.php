<!--
	This is a view for admin age-group list.
-->
 
<script type="text/javascript" src="javascript/wtooltip.js"></script>
<script>
	$('#places').css('color','#81BDDA');
</script>

<div id="content">
	<h2 class="left">Place</h2>
	<?php echo anchor('admin/addEditPlace','Add place','class="add-affiliate"');?>
	<table border="0" cellspacing="0" cellpadding="0" class="data-table">
		<tr>
			<th >
			<?php
			echo '<div style="float:left;margin-right:20px;">';
			echo 'Category : ';
			$category_options["--Select--"] =  '--Select--';
			foreach($category as $category_row)
			{ 
				$category_options[$category_row['category_id']] =  $category_row['category_name'];
			}

			echo form_dropdown('category_id', $category_options, set_value('category_id', $category_id), 'class="input-shadow" id="category_id" onChange="filterPlace(this.value,\'\');"');
			echo '</div>';

			echo '<div style="float:left;"><div style="float:left;margin-top: 5px;">Subcategory :&nbsp;</div><div id="subcategory-div" style="float:right;">';
			$subcategory_options[0] =  '--Select--';
			if($category_id)
			{
				foreach($subcategory as $subcategory_row)
				{ 
					$subcategory_options[$subcategory_row['subcategory_id']] =  $subcategory_row['subcategory_name'];
				}
			}
			echo form_dropdown('subcategory_id', $subcategory_options, set_value('subcategory_id', $subcategory_id), 'class="input-shadow" id="getsubcategory" onChange="filterPlace('.$category_id.',this.value);"');
			echo '</div></div>';
			?>
			</th>
		</tr>
	</table>
    <table border="0" cellspacing="0" cellpadding="0" class="data-table">
		  <tr>
			<th width="10">S.No.</th>
			<th width="20">Status</th>
			<th width="300">First Name</th>
			<th width="90">Category Slider</th>
			<th width="90">Home Featured</th>
			<th width="90">Inner Featured</th>
			<th width="60">Interested</th>
			<th width="50">Random</th>
			<th>Options</th>
		  </tr>
		  <?php //echo '<pre>';print_r($age_groups);exit;
			if(count($place)>0)
			{
				$count = $start;
				foreach($place as $place_row)
				{
					$count++;
		  ?>
		  <tr <?php if($count%2 != 0) echo 'class="blue-bg"';?>>
			<td><?php echo $count;?></td>
			<td>
				<span id="status<?php echo $place_row['place_id'];?>" onMouseover="tooltip('place','<?php echo $place_row['place_id'];?>')">
				<?php 
				if($place_row['is_active']) 
				{
				?>
					<span style="cursor:pointer;" onClick="changeStatus('place',0,'<?php echo $place_row['place_id'];?>')">
						<img src="images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="changeStatus('place',1,'<?php echo $place_row['place_id'];?>')">
						<img src="images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td><?php echo $place_row['place_name']; ?></td>
			<td>
				<span id="category_slider<?php echo $place_row['place_id'];?>" >
				<?php 
				if(in_array($place_row['place_id'],$category_slider)) 
				{
				?>
					<span style="cursor:pointer;" onClick="adddEditAddStatus('category_slider',0,'<?php echo $place_row['place_id'];?>')">
						<img src="images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="adddEditAddStatus('category_slider',1,'<?php echo $place_row['place_id'];?>')">
						<img src="images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td>
				<span id="home_featured<?php echo $place_row['place_id'];?>" >
				<?php 
				if(in_array($place_row['place_id'],$home_featured)) 
				{
				?>
					<span style="cursor:pointer;" onClick="adddEditAddStatus('home_featured',0,'<?php echo $place_row['place_id'];?>')">
						<img src="images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="adddEditAddStatus('home_featured',1,'<?php echo $place_row['place_id'];?>')">
						<img src="images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td>
				<span id="inner_featured<?php echo $place_row['place_id'];?>" >
				<?php 
				if(in_array($place_row['place_id'],$inner_featured)) 
				{
				?>
					<span style="cursor:pointer;" onClick="adddEditAddStatus('inner_featured',0,'<?php echo $place_row['place_id'];?>')">
						<img src="images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="adddEditAddStatus('inner_featured',1,'<?php echo $place_row['place_id'];?>')">
						<img src="images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td>
				<span id="intrested_in<?php echo $place_row['place_id'];?>" >
				<?php 
				if(in_array($place_row['place_id'],$intrested_in)) 
				{
				?>
					<span style="cursor:pointer;" onClick="adddEditAddStatus('intrested_in',0,'<?php echo $place_row['place_id'];?>')">
						<img src="images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="adddEditAddStatus('intrested_in',1,'<?php echo $place_row['place_id'];?>')">
						<img src="images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td>
				<span id="random_place<?php echo $place_row['place_id'];?>" >
				<?php 
				if(in_array($place_row['place_id'],$random_place)) 
				{
				?>
					<span style="cursor:pointer;" onClick="adddEditAddStatus('random_place',0,'<?php echo $place_row['place_id'];?>')">
						<img src="images/right.png" />
					</span>
				<?php
				}
				else
				{
				?>
					<span style="cursor:pointer;" onClick="adddEditAddStatus('random_place',1,'<?php echo $place_row['place_id'];?>')">
						<img src="images/minus.png" />
					</span>
				<?php
				}
				?>
				</span>
			</td>
			<td> 
				<?php echo anchor('admin/addEditPlace/'.$place_row['place_id'],' ','class="pencil"');?>
				<a href="javascript:void(0);" onClick="deleteRecord('place','<?php echo $place_row['place_id'];?>','this place','place');" class="delete"></a>
			</td>
		  </tr>
		  <script type="text/javascript">
						$(function(){
							$("#status<?php echo $place_row['place_id'];?>").wTooltip({
								ajax: site_url + "admin/callback_StatusToolTip/place/<?php echo $place_row['place_id'];?>",
								fadeIn:100,
								offsetY: 20,
								id: 'tip<?php echo $place_row['place_id'];?>',
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
				echo '<tr><td colspan="4">No places found</td></tr>';
			}
		  ?>
	</table>
	<br />
  

	

</div>


<!--PopUp : Start-->
<div id="popupEdit"></div>
<!--PopUp : End-->
