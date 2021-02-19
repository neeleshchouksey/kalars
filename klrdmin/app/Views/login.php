<!-- this page is for login -->

<div id="content">
<form name="signInForm" action="<?php echo base_url(); ?>/admin/signin" method="post">
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php
            if(isset($errors)){ foreach ($errors as $error) : ?>
                <li style="color: red"><?= $error ?></li>
            <?php endforeach  ?>
            <?php } ?>
        </ul>
    </div>
  <table border="0" cellspacing="0" cellpadding="0" class="data-table" style="width:35%;margin:auto;margin-top:100px;">
		  <tr>
				<th colspan="5">Agent Login</th>
		  </tr>
		  <tr>
				<td width="30%"><strong>Email</strong></td>
				<td width="70%" colspan="4">
					<input name="admin_email" type="text" id="admin_email" size="30" value="<?php echo set_value('admin_email'); ?>" class="input"/>
<!--					<span class="red">--><?php //echo form_error('admin_email'); ?><!--</span>-->
				</td>
		  </tr>
		  <tr class="blue-bg">
				<td><strong>Password</strong></td>
				<td colspan="4">
					<input name="admin_password" type="password" id="admin_password" size="30" value="" class="input" />
<!--					<span class="red">--><?php //echo form_error('admin_password'); ?><!--</span>-->
				</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="4">
				<div style="float:left; margin: 0 0 0 10px;">
					<label><input type="submit" name="button" id="button" value="Login" class="submit-left" /></label>
					<label class="submit-right"></label>
				</div>
			</td>
		  </tr>
	</table>
  </form>
</div>

