<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Kalars.in : Admin Section</title>

<script type="text/javascript">
	var site_url = '<?php echo site_url();?>';
	var base_url = '<?php echo base_url();?>';
	var current_url = '<?php echo current_url();?>';
    var KALARS_URL = '<?php echo KALARS_URL;?>';
</script>

<base href="<?php echo base_url();?>">


<script type="text/javascript" src="<?php echo base_url();?>/assets/javascript/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/javascript/functions.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/javascript/dropdown_home.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/javascript/wtooltip.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/javascript/popUpDivJs.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/openwysiwyg/wysiwyg.js"></script>

<link href="<?php echo base_url();?>/assets/css/admin-style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<!-- wrapper div start here-->
<div id="wrapper">

<!-- header div start here-->
<?php
$session = session();
if( $session->get('klrdmin_id') && $session->get('admin_email'))
{
?>
<div id="header">
    <div class="top-left">
      <h1><?php echo anchor('admin/users/user_id','<span id="users">All</span>');?></h1>
    </div>
	<div class="left">
      <h1><?php echo anchor('admin/brides/user_id','<span id="brides">Brides</span>');?></h1>
    </div>
	<div class="left">
      <h1><?php echo anchor('admin/grooms/user_id','<span id="grooms">Grooms</span>');?></h1>
    </div>
  <div class="left">
      <h1><?php echo anchor('admin/inactive_users/user_id','<span id="inactive">Inactive</span>');?></h1>
    </div>
  <div class="left">
      <h1><?php echo anchor('admin/deleted_users/user_id','<span id="deleted">Deleted</span>');?></h1>
    </div>
	<div class="left">
      <h1><?php echo anchor('admin/abusedusers','<span id="abusedusers">Abused</span>');?></h1>
    </div>
	<div class="left">
      <h1><?php echo anchor('admin/notification','<span id="notification">Notification</span>');?></h1>
    </div>
	<div class="left">
      <h1><?php echo anchor('admin/sms','<span id="sms">SMS</span>');?></h1>
    </div>
    <div class="top-right">
    <span><?php echo anchor('admin/changePassword','Administrator','class="logout"');?> | <?php echo anchor('admin/logout','Logout','class="logout"');?></span>
    </div>
</div>
<?php
}
?>
<!-- header div ends here-->
