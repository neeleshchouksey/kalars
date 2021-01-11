<?php echo view('includes/header');?>
<body class="">
	<?php echo view('includes/analyticstracking.php');?>

	<!--openMode-->
	<div id="comming_soon" class="modalbg" align="center">
		<div class="dialog clearfix">
			<a href="<?php echo current_url();?>#close" title="Close" class="close">X</a>
			<div class="row">
				<div id="upload-demo"></div>
				<button class="upload-result" id="upload-result" style="display: block;">Upload</button>
				<img src="<?php echo base_url();?>/assets/images/loader.gif" id="upload-result-loader" style="display: none;">
			</div>
		</div>
	</div>
	<!--openMode-->

	<div class="site-wrap">
		<div class="header-wrap">
				<?php echo view('includes/menu');?>
				
				<div class="header-content-wrap">
					<div class="header-content container">
						<div align="right">
							<form class="page-title" action="" onSubmit="window.location.href = site_url+'user/profile/'+jQuery('#search_by_id').val(); return false;">
								Find member Id <input id="search_by_id" style="margin:0px;"/>
							</form>
						</div>
					</div>
				</div>
				<!-- /content -->
			
			</div>
		
		<div class="content-wrap">
		<section class="site-content container clearfix">