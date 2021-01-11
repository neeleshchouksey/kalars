<div class="widget widget_themex_search"><h4 class="widget-title">Profile Search</h4><div class="profile-search-form">
	<form name="search_form" action="<?php echo base_url().'home/search_results';?>"method="POST" >
		<table>
			<tbody>
				<tr>
					<td><h5>From</h5></td>
					<td>
						<div class="select-field">
							<span></span>
							<select id="age_from" name="age_from" style="opacity: 0;">
							<?php for($i=18;$i<=60;$i++)
							{
							?>
								<option value="<?php echo $i;?>" <?php if(isset($post_data['age_from']) && $i==$post_data['age_from']) echo 'selected';?>><?php echo $i;?></option>
							<?php
							}
							?>
							</select>						
						</div>
					</td>
				</tr>
				<tr>
					<td><h5>To</h5></td>
					<td>
						<div class="select-field">
							<span></span>
							<select id="age_to" name="age_to" style="opacity: 0;">
						<?php for($i=18;$i<=60;$i++)
						{
							$selected = '';
							if(isset($post_data['age_to']))
							{
								if($i==$post_data['age_to']) $selected = 'selected';
							}
							else
							{
								if($i==35) $selected = 'selected';
							}
						?>
							<option value="<?php echo $i;?>" <?php  echo $selected;?>><?php echo $i;?></option>
						<?php
						}
						?>
						</select>					
						</div>
					</td>
				</tr>
				<tr>
					<td><h5>Looking for</h5></td>
					<td>
						<div class="select-field">
							<span>woman</span>
							<select style="opacity: 0;" id="gender" name="gender">
								<option value="Male">Male</option>
								<option value="Female" <?php if(isset($post_data['gender']) && $post_data['gender']== "Female") echo 'selected';?>>Female</option>
							</select>						
						</div>
					</td>
				</tr>	
				<tr>
					<td><h5>Manglik</h5></td>
					<td valign="top">
						<div class="select-field" id="wrap">
							<select style="opacity: 0;" name="manglik" id="manglik">
									<option value="No">No</option>
									<option value="Yes" <?php if(isset($post_data['manglik']) && $post_data['manglik']== "Yes") echo 'selected';?>>Yes</option>
								</select>	
							<span></span>
						</div>
					</td>
				</tr>
				<tr>
					<td><h5>City</h5></td>
					<td>
						<div class="">
							<input name="city" id="city" style="width: 88%;"/>
						</div>
					</td>
				</tr>	
			</tbody>
		</table>
		<a href="#" class="button medium submit-button"><span class="button-icon icon-search"></span>Find My Matches</a>
		<input name="s" value="" type="hidden">
	</form>
</div></div>