<?php echo view('includes/header');?>
<body class="">
	<?php echo view('includes/analyticstracking.php');?>
	<div class="site-wrap">
		<div class="header-wrap">
			<?php echo view('includes/menu');?>
			<div class="header-slider themex-slider visible">
				<ul style="width: 4047px; overflow: hidden; left: -1349px; height: 496px;">
					<li style="width: 1349px;">
						<div class="container">
				<div style="top: 121.5px;" class="fivecol column">
<h1>Register for free</h1>
<p>There is NO charges on this site for finding you matches not even for contacting them.</p>
<?php echo anchor('home/sign_up','Register Now','class="button large secondary"');?>
</div><div class="sevencol column last"><img class="alignnone" alt="" src="<?php echo base_url();?>/assets/images/Bride-grom.png"></div><div style="top: 209px;" class="clear"></div>			</div>
		</li>
				<li class="current" style="width: 1349px;">
			<div class="container">
				<div style="top: 121.5px;" class="fivecol column">
<h1>Contact Directly</h1>
<p>You can call them directly if they provided their contact no on the site.</p>
<?php echo anchor('home/sign_up','Register Now','class="button large secondary"');?>
</div><div class="sevencol column last"><img class="alignnone" alt="" src="<?php echo base_url();?>/assets/images/Bride-grom1.png"></div><div style="top: 209px;" class="clear"></div>			</div>
		</li>
			<li style="width: 1349px;">
			<div class="container">
				<div style="top: 121.5px;" class="fivecol column">
<h1>Manage your favourites</h1>
<p>Its easy to manage your favourite profiles on our site so that you can check later whenever you want.</p>
<?php echo anchor('home/sign_up','Register Now','class="button large secondary"');?>
</div><div class="sevencol column last"><img class="alignnone" alt="" src="<?php echo base_url();?>/assets/images/Bride-grom3.png"></div><div style="top: 209px;" class="clear"></div>			</div>
		</li></ul>
	<input class="slider-pause" value="0" type="hidden">
	<input class="slider-speed" value="1000" type="hidden">	
</div>
								<div class="header-content-wrap overlay-wrap">
					<div class="header-content container">
					<div class="header-search-form clearfix">
	<form name="search_form" action="<?php echo base_url().'home/search_results';?>"method="POST" >
		<div class="text-field field-wrap">Hello, I am a</div>
		<div class="field-wrap">
			<div class="select-field">
				<span>man</span>
				<select style="opacity: 0;" id="iam" name="iam">
					<option value="Male" selected="selected">man</option>
					<option value="Female">woman</option>
				</select>			
			</div>
		</div>
		<div class="text-field field-wrap">seeking a</div>
		<div class="field-wrap">
			<div class="select-field">
				<span>woman</span>
				<select style="opacity: 0;" id="gender" name="gender">
					<option value="Male">man</option>
					<option value="Female" selected="selected">woman</option>
				</select>			
			</div>
		</div>
		<div class="text-field field-wrap mobile-hidden">from</div>
		<div class="field-wrap mobile-hidden">
			<div class="select-field">
				<span>18</span>
				<select id="age_from" name="age_from" style="opacity: 0;">
					<?php for($i=18;$i<=60;$i++)
					{
					?>
						<option value="<?php echo $i;?>" ><?php echo $i;?></option>
					<?php
					}
					?>
				</select>			
			</div>
		</div>	
		<div class="text-field field-wrap mobile-hidden">to</div>
		<div class="field-wrap mobile-hidden">
			<div class="select-field">
				<span>35</span>
				<select id="age_to" name="age_to" style="opacity: 0;">
					<?php for($i=18;$i<=60;$i++)
					{
					?>
						<option value="<?php echo $i;?>" <?php if($i==35) echo 'selected';?>><?php echo $i;?></option>
					<?php
					}
					?>
				</select>			
			</div>
		</div>
		<div class="button-field field-wrap">
			<a href="#" class="button submit-button"><span class="button-icon icon-search"></span>Find My Matches</a>
		</div>
		<input name="s" value="" type="hidden">
	</form>
</div>					</div>
				</div>
										<!-- /content -->
		</div>

		<div class="header-content container">
			<div align="right">
				<form class="page-title" action="" onSubmit="window.location.href = site_url+'user/profile/'+jQuery('#search_by_id').val(); return false;">
					Find member Id <input id="search_by_id" style="margin:0px;"/>
				</form>
			</div>
		</div>

		<div class="content-wrap" style="display: none;">
			<section class="site-content container clearfix">