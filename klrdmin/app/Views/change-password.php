<!-- this page is for change admin password -->

<div id="content">
  <?php	echo form_open('admin/savePassword','name="signInForm" save="save"'); ?>
  <table border="0" cellspacing="0" cellpadding="0" class="data-table" style="width:45%;margin:auto;margin-top:100px;">

      <div class="alert alert-danger" role="alert">
          <ul>
              <?php if(isset($errors)){ foreach ($errors as $error) : ?>
                  <li style="color: red"><?= esc($error) ?></li>
              <?php endforeach  ?>
          <?php } ?>
          </ul>
      </div>

		   <?php
			if(isset($msg))
			{
			?>
		   <tr>
				<td colspan="5">
					<?php echo '<span class="green">'.$msg.'</span>';?>
				</td>
		  </tr>
		  <?php
		  }
		  ?>
		  <tr>
				<th colspan="5">Change admin password</th>
		  </tr>
		  <tr class="blue-bg">
				<td width="30%"><strong>Email</strong></td>
				<td width="70%" colspan="4">
					<input name="admin_email" type="text" id="admin_email" size="30" value="<?php echo set_value('email'); ?>" class="input"/>
<!--					<span class="red">--><?php //echo form_error('admin_email'); ?><!--</span>-->
				</td>
		  </tr>
		  <tr class="blue-bg">
				<td><strong>Old Password</strong></td>
				<td colspan="4">
					<input name="admin_password" type="password" id="admin_password" size="30" value="" class="input" />
<!--					<span class="red">--><?php //echo form_error('admin_password'); ?><!--</span>-->
				</td>
		  </tr>
		  <tr class="blue-bg">
				<td><strong>New Password</strong></td>
				<td colspan="4">
					<input name="new_password" type="password" id="new_password" size="30" value="" class="input" />
<!--					<span class="red">--><?php //echo form_error('new_password'); ?><!--</span>-->
				</td>
		  </tr>
		  <tr class="blue-bg">
				<td><strong>Confirm Password</strong></td>
				<td colspan="4">
					<input name="confirm_password" type="password" id="confirm_password" size="30" value="" class="input" />
<!--					<span class="red">--><?php //echo form_error('confirm_password'); ?><!--</span>-->
				</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="4">
				<div style="float:left; margin: 0 0 0 10px;">
					<label><input type="submit" name="button" id="button" value="Save" class="submit-left" /></label>
					<label class="submit-right"></label>
				</div>
			</td>
		  </tr>
	</table>
  </form>
</div>

